<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
/*
     'itemTable' => 'auth_item',
     'assignmentTable' => 'auth_assignment',    
     'itemChildTable' => 'auth_item_child',
*/
        ],
    ],
    'modules' => [
        'rbac' =>  [
            'class' => 'johnitvn\rbacplus\Module',
            'userModelClassName'=>null,
            'userModelIdField'=>'id',
            'userModelLoginField'=>'username',
            'userModelLoginFieldLabel'=>null,
            'userModelExtraDataColumls'=>null,
            'beforeCreateController'=>null,
            'beforeAction'=>null,
        ],
        'gridview' =>  [
            'class' => '\kartik\grid\Module'    //此扩展使用于 kartik-v/yii2-grid ，故在此之前必须使用 gridview module
        ],
    ],
];
