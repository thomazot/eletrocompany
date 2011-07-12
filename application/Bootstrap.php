<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    /**
     * Carrega as configuracoes do .ini
     */
    protected function _initConfig() {
        $config = new Zend_Config_Ini(APPLICATION_PATH . '/configs/application.ini', APPLICATION_ENV);
        Zend_Registry::set('config', $config);
    }
    
    /**
     * Carrega as bibliotecas adicionais
     * 
     * @return object
     */
    protected function _initAutoLoader() {
        $autoloader = Zend_Loader_Autoloader::getInstance();
        $autoloader->registerNamespace('thomazot');
        
        return $autoloader;
    }
    
    /**
     * View inicializa o header do html
     */
    protected function _initViews(){
        $this->bootstrap('view');
        $view = $this->getResource('view');
        
        $view->doctype('XHTML1_STRICT');
        $view->headMeta()->appendHttpEquiv('Content-Type', 'text/html; charset=UTF-8');
        $view->headTitle('ZFModelo');
        
        Zend_Registry::set('view', $view);
    }
    
    /**
     * ZFDebug Inicia o ZFDebug se estiver abilitado no configs ZFDebug.enabled
     */
    protected function _initZFDebug() {
        $config = Zend_Registry::get('config');
        $ZFDebug = $config->ZFDebug;
        
        if($ZFDebug->enabled) {
            $autoloader = Zend_Loader_Autoloader::getInstance();
            $autoloader->registerNamespace('ZFDebug');

            $options = array(
                'plugins' => array('Variables', 
                                   'File' => array('base_path' => '/path/to/project'),
                                   'Memory', 
                                   'Time', 
                                   'Registry', 
                                   'Exception')
            );

            # Instantiate the database adapter and setup the plugin.
            # Alternatively just add the plugin like above and rely on the autodiscovery feature.
            if ($this->hasPluginResource('db')) {
                $this->bootstrap('db');
                $db = $this->getPluginResource('db')->getDbAdapter();
                $options['plugins']['Database']['adapter'] = $db;
            }

            # Setup the cache plugin
            if ($this->hasPluginResource('cache')) {
                $this->bootstrap('cache');
                $cache = $this-getPluginResource('cache')->getDbAdapter();
                $options['plugins']['Cache']['backend'] = $cache->getBackend();
            }

            $debug = new ZFDebug_Controller_Plugin_Debug($options);

            $this->bootstrap('frontController');
            $frontController = $this->getResource('frontController');
            $frontController->registerPlugin($debug);
        }
    }
}

