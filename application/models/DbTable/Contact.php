<?php

class Application_Model_DbTable_Contact extends Zend_Db_Table_Abstract
{

    protected $_name = 'contact';
    protected $_primary = 'id';

    protected $_referenceMap = array(
    	'User'=>array(
    		'columns'=>array('user_id'),
    		'refTableClass'=>'Application_Model_DbTable_User',
    		'refColumns'=>array('id'),
    	),
    );
}