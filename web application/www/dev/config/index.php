<?php


/**
 * @todo  router config
 *
 * from url address
 *
 */

define('IS_PROD', true);

function getConfig()
{
    $devConfig = require_once __DIR__ . '/dev.config.php';

    $path = "default";

    if (($path)) {
        $configFilePath = __DIR__ . '/' . $path . '/index.php';
        if (!is_file($configFilePath)) {
            exit(json_encode(['error' => '找不到初始化配置']));
        }
        $config = require_once __DIR__ . '/' . $path . '/index.php';
        if (empty($config)) {
            exit(json_encode(['error' => '配置失败！']));
        }

    } else {
        exit(json_encode(['error' =>   '找不到配置 404 config']));
    }

    return $config;

}