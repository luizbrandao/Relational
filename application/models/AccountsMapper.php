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
                $model = new Application_Model_Accounts();//new $className;
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

    public function save($contato){
        $dados = array();
        foreach ($contato as $row) {
           $dados = array(
                'id' => $row->getId(),
                'username' => utf8_encode($row->getUsername()),
                'email' => $row->getEmail(),
                'phone' => $row->getPhone(),
                'fax' => $row->getFax(),
                'address_count' => $row->getAddressCount()
            );
        }

        if($contato->getId() == null){
            // $this->getDbTable()->findDependentRowset(
            //     'Application_Model_DbTable_Address',
            //     'User'
            // );

            $res = $this->getDbTable()->insert($dados);
            return $res;
        } else {
            $res = $this->getDbTable()->update($dados,'id = '. $contato->getId());
            return $res;
        }
    }
}