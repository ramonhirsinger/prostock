<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'Prostock\Controller\Prostock' => 'Prostock\Controller\StockController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'stock' => array(
                'type' => 'segment',
                'options' => array(
                    'route'         => '/stock[/:action][/:id]',
                    'constraints'   => array(
                        'actions'   => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'        => '[0-9]+',
                    ),
                    'defaults'      => 'Prostock\Controller\Stock',
                    'action'        => 'index',
                ),
            ),
        ),
    ),
    'view_manger' => array(
        'template_path_stack' => array(
            'prostock' => __DIR__ . '/../view',
        ),
    ),
);
