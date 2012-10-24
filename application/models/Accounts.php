<?php

class Application_Model_Accounts
{

	protected $id;
	protected $username;
	protected $password;
	protected $email;
	protected $phone;
	protected $fax;
	protected $address1;
	protected $address2;
	protected $type_id;

	public function setId($id){
		$this->_id = (int) $id;

		return $this;
	}

	public function getId(){
		return $this->id;
	}

	public function getUsername ()
	{
		return $this->username;
	}

	public function setUsername ($username)
	{
        $this->username = (string) $username;
        return $this;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getEmail ()
    {
        return $this->email;
    }

  

    public function setEmail ($email)
    {
        $this->email = (string) $email;
        return $this;
    }

    public function getPhone ()
    {
        return $this->phone;
    }

    public function setPhone ($phone)
    {
        $this->phone = (string) $phone;
        return $this;
    }

    public function getFax ()
    {
        return $this->fax;
    }

    public function setFax ($fax)
    {
        $this->fax = (string) $fax;
        return $this;
    }

    public function getAddress1(){
        return $this->address1;
    }

    public function setAddress1($address){
        $this->address1 = (string) $address;
        return $this;
    }

    public function getAddress2() {
        return $this->address2;
    }

    public function setAddress2($address2){
        $this->address2 = (string) $address2;
        return $this;
    }

    public function getTypeId()
    {
        return $this->type_id;
    }

    public function setTypeId($addressCount)
    {
        $this->type_id = (int) $addressCount;
        return $this;
    }

    public function getAddressCount ()
    {
        return $this->addressCount;
    }

    public function setAddressCount ($addressCount)
    {
        $this->addressCount = (int) $addressCount;
        return $this;
    }

    public function getMapper()
    {
        if (null === $this->mapper) {
            $this->setMapper('Application_Model_AccountsMapper');
        }
        return $this->mapper;
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
        if (isset($row->password)) {
            $this->setPassword($row->password);
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

        if (isset($row->address1)) {
            $this->setAddress1($row->address1);
        }
        if (isset($row->address2)) {
            $this->setAddress2($row->address2);
        }
        if (isset($row->type_id)) {
            $this->setTypeId($row->type_id);
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