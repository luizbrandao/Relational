<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	protected function _initZFDebug()
    {
        // Setup autoloader with namespace
        $autoloader = Zend_Loader_Autoloader::getInstance();
        $autoloader->registerNamespace('ZFDebug');

        // Ensure the front controller is initialized
        $this->bootstrap('FrontController');

        // Retrieve the front controller from the bootstrap registry
        $front = $this->getResource('FrontController');

        // Only enable zfdebug if options have been specified for it
        if ($this->hasOption('zfdebug'))
        {
            // Create ZFDebug instance
            $zfdebug = new ZFDebug_Controller_Plugin_Debug($this->getOption('zfdebug'));

            // Register ZFDebug with the front controller
            $front->registerPlugin($zfdebug);
        }
    }

    protected function _initAutoload()
    {        
        $autoloader = Zend_Loader_Autoloader::getInstance();
        $autoloader->registerNamespace('Plugins_');
    }
       
    protected function _initPlugins()
    {
        // Access plugin
        $front = Zend_Controller_Front::getInstance(); 
        $front->registerPlugin(new Plugins_SelectLayout());
    }
}