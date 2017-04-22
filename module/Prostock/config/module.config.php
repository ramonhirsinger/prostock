<?php

return array(
     'controllers' => array(
         'invokables' => array(
             'Prostock\Controller\Prostock' => 'Prostock\Controller\ProstockController',
         ),
     ),  
    'view_manger' => array(
        'template_path_stack' => array(
            'prostock' => __DIR__ . '/../view',
        ),
    ),
);