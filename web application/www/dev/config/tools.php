<?php

function loadFiles($path)
{
//加载配置
    $requireFile = array();
    $files = scandir($path);
    foreach ($files as $file) {
        if (is_file($path . $file)) {
            $_require = require_once $path . $file;
            //print_r($_require);
            if (is_array($_require) && !empty($_require)) {
                array_merge($requireFile, $_require);
            }
        }
    }

    return $requireFile;
}
