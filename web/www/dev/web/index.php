<?php
/**
 * @var $this \yii\web\View
 */
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'test');

define('_ROOT', dirname(__DIR__, 2));
define('YII_LIB_DIR', _ROOT . '/lib/yii2-advanced');
define('LIBS_MODEL_DIR', _ROOT . '/lib/yii2-extend-self');
require YII_LIB_DIR . '/vendor/autoload.php';
require YII_LIB_DIR . '/vendor/yiisoft/yii2/Yii.php';

require '../config/index.php';
$config = getConfig();


(new yii\web\Application($config))->run();