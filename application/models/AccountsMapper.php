<?php

class Application_Model_AccountsMapper
{
	public function getDbTable()
    {
    	$this->_dbTable = null;
        if (null === $this->_dbTable) {
            $this->_dbTable = new Application_Model_DbTable_User();
        }
        return $this->_dbTable;
    }
    
    public function fetchAll($className, $where = null, $order = null, $count = null, $offset = null)
    {
        $entries = array ();
        $model = null;
        if (!is_string($className)) {
            require_once 'Zend/Exception.php';
            throw new Zend_Exception('Model class name should be a string');
        }
        if (is_string($className)) {
            if (!class_exists($className)) {
                require_once 'Zend/Exception.php';
                throw new Zend_Exception('Non-existing model class name provided');
            }
        }
        if (null !== ($resultSet = $this->getDbTable()->fetchAll($where, $order, $count, $offset))) {
            foreach ($resultSet as $row) {
                $model = new $className;

                // if (!$model instanceof Application_Model_Abstract) {
                //     require_once 'Zend/Exception.php';
                //     throw new Zend_Exception('Invalid model class provided');
                // }
                
                // let's get contact details first
                $contacts = $row->findDependentRowset(
                    'Application_Model_DbTable_Contact',
                    'User'
                );
                $contact = $contacts->current();

                $model->populate($contact);
                unset($contacts, $contact);
                
                // let's see how many addresses this contact has
                $addresses = $row->findDependentRowset(
                    'Application_Model_DbTable_Address',
                    'User'
                );
                $addressCount = count($addresses);

                $model->setTypeId($addressCount);

                $model->setAddressCount($addressCount);

                unset($addresses, $addressCount);
                
                // now it's time to add our user details to the model
                $model->populate($row);

                $entries[] = $model;
                unset($model);
            }
        }
        return $entries;
    }

    public function save($accounts){
        if($accounts->getId() == null){
            $this->_insert($accounts);
        } else {
            $this->_update($accounts);
        }
    }
    
    protected function _insert($accounts){
        $usuario = array(
            'username' => utf8_encode($accounts->getUsername()),
            'password' => $accounts->getPassword(),
        );

        $this->_db_usuario = new Application_Model_DbTable_User();
        $id = $this->_db_usuario->insert($usuario);
        $accounts->setId($id);
        
        $contato = array(
            'user_id'=> $accounts->getId(),
            'email' => $accounts->getEmail(),
            'phone' => $accounts->getPhone(),
            'fax' => $accounts->getFax(),
        );

        $this->_db_contato = new Application_Model_DbTable_Contact();
        $this->_db_contato->insert($contato);

        $endereco = array(
            'user_id'=> $accounts->getId(),
            'type_id' => $accounts->getTypeId(),
            'address1'=> $accounts->getAddress1(),
            'address2'=> $accounts->getAddress2()
        );
        
        $this->_db_endereco = new Application_Model_DbTable_Address();
        $this->_db_endereco->insert($endereco);
    }

    protected function _update($accounts){
        $id = $accounts->getId();

        $this->_db_usuario = new Application_Model_DbTable_User();
        $this->_db_contato = new Application_Model_DbTable_Contact();
        $this->_db_endereco = new Application_Model_DbTable_Address();
        
        $usuario = array(
            'username' => utf8_encode($accounts->getUsername()),
            'password' => $accounts->getPassword(),
        );
        $this->_db_usuario->update($usuario, 'id = '.$id);

        $contato = array(
            'user_id'=> $accounts->getId(),
            'email' => $accounts->getEmail(),
            'phone' => $accounts->getPhone(),
            'fax' => $accounts->getFax(),
        );
        $this->_db_contato->update($contato, 'user_id = '. $id);

        $endereco = array(
            'user_id'=> $accounts->getId(),
            'type_id' => $accounts->getTypeId(),
            'address1'=> $accounts->getAddress1(),
            'address2'=> $accounts->getAddress2(),
        );
        $this->_db_endereco->update($endereco, 'user_id = '.$id);
    }
}