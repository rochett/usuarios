<?php

namespace Users;


use Users\Controller\UsersController;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ModuleManager\Feature\ConfigProviderInterface;

class Module implements ConfigProviderInterface
{

    public function getConfig()
    {
        return include __DIR__ ."/../config/module.config.php";
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                Model\UserTable::class => function($container){
                    $tableGateway = $container->get(Model\UserTableGateway::class);
                    return new Model\UserTable($tableGateway);
                },
                Model\UserTableGateway::class => function($container){
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetProtoype = new ResultSet();
                    $resultSetProtoype->setArrayObjectPrototype(new Model\User());

                    return new TableGateway('tb_usuarios_usu', $dbAdapter, null, $resultSetProtoype);
                }
            ]
        ];
    }

    public function getControllerConfig()
    {
        return [
            'factories'=>[
                UsersController::class => function($container){
                    return new UsersController(
                        $container->get(Model\UserTable::class)
                    );
                }
            ]
        ];
    }

}