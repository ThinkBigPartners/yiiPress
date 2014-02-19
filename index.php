<?php

define('WP_SITEURL', 'http://' . $_SERVER['SERVER_NAME'] . '/wp');
define('WP_HOME',    'http://' . $_SERVER['SERVER_NAME']);
define('WP_CONTENT_DIR', $_SERVER['DOCUMENT_ROOT'] . '/wp-content');
define('WP_CONTENT_URL', 'http://' . $_SERVER['SERVER_NAME'] . '/wp-content');


require 'vendor/autoload.php';
$redirects = require_once(dirname(__FILE__).'/protected/config/redirects.php');
$request_uri = $_SERVER['REQUEST_URI'];

if (array_key_exists($request_uri, $redirects)) {
	$redirect = $redirects[$request_uri];
	if ($redirect['type'] == 301) {
		header("HTTP/1.1 301 Moved Permanently"); 
	}
	if (isset($redirect['url']) && $redirect['url'] != "") {
		header("Location: " . $redirect['url']); 
	}
	else {
		$baseURL = "http://";
		if ($_SERVER['HTTPS']) {
			$baseURL = "https://";
		}
		$baseURL .= $_SERVER['SERVER_NAME'];
		header("Location: " . $baseURL . $redirect['path']);
	}
	die();
}
$yii=dirname(__FILE__).'/vendor/yiisoft/yii/framework/yii.php';

$isProduction = false;
if (strstr ($_SERVER['HTTP_HOST'], 'localhost') !== false || strstr ($_SERVER['HTTP_HOST'], '.local') !== false) {
	define('DB_NAME', 'yiiPress');
	define('DB_USER', 'root');
	define('DB_PASSWORD', 'abc');
	define('DB_HOST', 'localhost');
	define('DB_CHARSET', 'utf8');
	define('DB_COLLATE', '');
	$env_config = dirname(__FILE__).'/protected/config/main_local.php';
} elseif (strstr($_SERVER['HTTP_HOST'], 'staging') !== false) {
	$env_config = dirname(__FILE__).'/protected/config/main_staging.php';
} elseif (strstr($_SERVER['HTTP_HOST'], 'dev') !== false) {
	$env_config = dirname(__FILE__).'/protected/config/main_dev.php';
} else {
	$env_config = dirname(__FILE__).'/protected/config/main_prod.php';
	$isProduction = true;
}

define('WP_USE_THEMES', true);
$wp_did_header = true;
require_once('wp/wp-load.php');

 
require_once(dirname(__FILE__) . '/protected/components/ExceptionHandler.php');
$router = new ExceptionHandler();

if (!$isProduction) {
	// remove the following lines when in production mode
	defined('YII_DEBUG') or define('YII_DEBUG',true);
	// specify how many levels of call stack should be shown in each log message
	defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
}

require_once($yii);

Yii::createWebApplication($env_config)->run();