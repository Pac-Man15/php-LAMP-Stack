<?php
declare(strict_types=1);

define('APP_ROOT', dirname(__DIR__));

$configFile = APP_ROOT . '/config.php';
$GLOBALS['config'] = is_file($configFile)
    ? require $configFile
    : require APP_ROOT . '/config.sample.php';

require APP_ROOT . '/app/helpers.php';

ini_set('display_errors', config('debug') ? '1' : '0');
error_reporting(E_ALL);

require APP_ROOT . '/app/data.php';
require APP_ROOT . '/app/layout.php';
