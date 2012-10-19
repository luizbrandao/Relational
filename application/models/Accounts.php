<?php

class Application_Model_Accounts
{
	protected $_id;
    protected $_username;
    protected $_email;
    protected $_phone;
    protected $_fax;
    protected $_addressCount;
    
    public function setId($id){
        $this->_id = (int) $id;
        return $this;
    }

    public function getId(){
        return $this->_id;
    }

    public function getUsername ()
    {
        return $this->_username;
    }

    public function setUsername ($username)
    {
        $this->_username = (string) $username;
        return $this;
    }

    public function getEmail ()
    {
        return $this->_email;
    }

    public function setEmail ($email)
    {
        $this->_email = (string) $email;
        return $this;
    }

    public function getPhone ()
    {
        return $this->_phone;
    }

    public function setPhone ($phone)
    {
        $this->_phone = (string) $phone;
        return $this;
    }

    public function getFax ()
    {
        return $this->_fax;
    }

    public function setFax ($fax)
    {
        $this->_fax = (string) $fax;
        return $this;
    }

    public function getAddressCount ()
    {
        return $this->_addressCount;
    }

    public function setAddressCount ($addressCount)
    {
        $this->_addressCount = (int) $addressCount;
        return $this;
    }

    public function getMapper()
    {
        if (null === $this->_mapper) {
            $this->setMapper('Application_Model_AccountsMapper');
        }
        return $this->_mapper;
    }
    
    public function populate($row)
    {
        if (is_array($row)) {
            $row = new ArrayObject($row, ArrayObject::ARRAY_AS_PROPS);
        }
        if (isset($row->id)) {
            $this->setId($row->id);
        }
        if (isset($row->username)) {
            $this->setUsername($row->username);
        }
        if (isset($row->email)) {
            $this->setEmail($row->email);
        }
        if (isset($row->phone)) {
            $this->setPhone($row->phone);
        }
        if (isset($row->fax)) {
            $this->setFax($row->fax);
        }
    }
    public function toArray()
    {
        return array (
            'id' => $this->getId(),
            'username' => $this->getUsername(),
            'email' => $this->getEmail(),
            'phone' => $this->getPhone(),
            'fax' => $this->getFax(),
            'address_count' => $this->getAddressCount(),
        );
    }
}