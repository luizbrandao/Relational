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
        $where = 'id = 2';
        $result = $this->_db->fetchAll('Application_Model_Accounts', $where);

        $this->view->resultado = $result;
    }

    public function addAction()
    {
        // action body
        $model = new Application_Model_Accounts();

        //$model->setId(3);
        $model->setUsername(utf8_decode('Luiz'));
        $model->setPassword('654321');
        $model->setEmail('luiz@teste.com');
        $model->setPhone('65-92667415');
        $model->setFax('65-3615-8000');
        $model->setAddress1('rua dos testes');
        $model->setAddress2('rua dos validacoes');
        $model->setTypeId(2);

        
        $res = $this->_db->save($model);

        $this->view->resultado = $res;
    }
}