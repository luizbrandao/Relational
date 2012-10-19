<?php

class Application_Model_DbTable_AddressType extends Zend_Db_Table_Abstract
{

    protected $_name = 'address_type';
    protected $_primary = 'id';
    
    protected $_dependentTables = array(
    	'Application_Model_DbTable_Address'
    );
}