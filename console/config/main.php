<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'console\controllers',
    

    'components' => [
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'itemTable' => 'auth_item',    
     'assignmentTable' => 'auth_assignment',    
     'itemChildTable' => 'auth_item_child',
        ],

        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
    ],
    'params' => $params,
];
/*
   // 'aliases' => [  
  //  '@mdm/admin' => '$PATH\yii2-admin',  
//],  
'modules' => [  
    'admin' => [  
        'class' => 'mdm\admin\Module',  
  
        'layout' => 'left-menu', // it can be '@path/to/your/layout'.  
       
        'controllerMap' => [  
            'assignment' => [  
                'class' => 'mdm\admin\controllers\AssignmentController',  
                'userClassName' => 'app\models\User',  
                'idField' => 'id'  
            ]  
        ],  
        'menus' => [  
            'assignment' => [  
                'label' => 'Grand Access' // change label  
            ],  
            //'route' => null, // disable menu route  
        ]  
    ],  
    'debug' => [  
        'class' => 'yii\debug\Module',  
    ],  
],  
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'site/*',
            'admin/*',
            //'some-controller/some-action',
            // The actions listed here will be allowed to everyone including guests.
            // So, 'admin/*' should not appear here in the production, of course.
            // But in the earlier stages of your development, you may probably want to
            // add a lot of actions here until you finally completed setting up rbac,
            // otherwise you may not even take a first step.
        ]
    ],
    */