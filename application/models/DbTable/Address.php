<?php

class Application_Model_DbTable_Address extends Zend_Db_Table_Abstract
{

    protected $_name = 'address';
    protected $_primary = 'id';
    
    protected $_referenceMap = array(
    	'User'=>array(
    		'columns'=>array('user_id'),
    		'refTableClass'=>'Application_Model_DbTable_User',
    		'refColumns'=>array('id')
    	),
        
    	'Type'=>array(
    		'columns'=>array('type_id'),
    		'refTableClass'=>'Application_Model_DbTable_AddressType',
    		'refColumns'=>array('id'),
    	),
    );
}