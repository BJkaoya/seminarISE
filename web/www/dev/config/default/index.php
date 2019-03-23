<?php

require __DIR__ . '/config/bootstrap.php';

$config =  \yii\helpers\ArrayHelper::merge(
  /* ['1',3],
   ['2',343],*/
    require __DIR__ . '/config/main.php',
    require __DIR__ . '/config/main-local-c.php', //db_config
    require __DIR__ . '/config/main-local.php',
    require __DIR__ . '/config/main_c.php'
);
//print_r($config);
//die;
return $config;
