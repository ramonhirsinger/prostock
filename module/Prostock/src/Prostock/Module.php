<?php

namespace Prostock;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
/**
 * Description of Module
 *
 * @author Ramon Hirsinger
 */
class Module implements AutoloaderProviderInterface, ConfigProviderInterface{
    
    public function getAutoloaderConfig(){
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . 'autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
              'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
              ),
            ),
        );
    }

    public function getConfig() {
        return include __DIR__ . '/config/module.config.php';
    }
    
    public function getServiceConfig() {
        return array(
            'factories' => array(
                'Prostock\Model\StockTable' => function($sm) {
                    $tableGateway = $sm->get('StockTableGateway');
                    $table = new Model\StockTable($tableGateway);
                    return $table;
                },
                'StockTableGateway' => function($sm) {
                    $dbAdapter = $sm->get('Tend\Db\Adapter\Adapter');
                    $resultSetPrototype = new \Zend\Db\ResultSet\ResultSet();
                    return new \Zend\Db\TableGateway\TableGateway('stock', $dbAdapter, null, $resultSetPrototype);
                },        
            ),
        );
    }

}
