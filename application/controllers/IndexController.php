<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
        $this->_db = new Application_Model_AccountsMapper();

        $frontController = Zend_Controller_Front::getInstance();
        $zfDebug = $frontController->getPlugin('ZFDebug_Controller_Plugin_Debug');
    }

    public function indexAction()
    {
        $result = $this->_db->fetchAll('Application_Model_DbTable_User');

        $this->view->resultado = $result;
    }

    public function addAction()
    {
        // action body
        $model = new Application_Model_Accounts();

        $model->setId(3);
        $model->setUsername(utf8_decode('Luiz Teste'));
        $model->setEmail('ze@teste.com');
        $model->setPhone('1-800-555-1234');
        $model->setFax('1-800-555-1234');
        $model->setAddressCount(2);
        
        $res = $this->_db->save($model);

        $this->view->resultado = $res;
    }
}