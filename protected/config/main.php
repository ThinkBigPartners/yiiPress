<?php
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Web Application',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		/*
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'Enter Your Password Here',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		*/
		'api'
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'urlFormat'=>'path',
			'class' => 'HyphenUrlManager',
			'urlSuffix' => '.html',
			'rules'=>array(
				array('api/default', 'pattern' => 'api'),
				array('api/user/login', 'pattern' => 'api/user/login'),
				array('api/user/signup', 'pattern' => 'api/user/signup'),
				array('api/user/update', 'pattern' => 'api/user/<id:[\w-]+>', 'verb'=>'PUT'),
				array('api/<controller>/index', 'pattern'=>'api/<controller:\w+>'),
				array('api/<controller>/view', 'pattern'=>'api/<controller:\w+>/<id:[\w-]+>', 'verb'=>'GET'),
				array('api/<controller>/create', 'pattern'=>'api/<controller:\w+>/<id:[\w-]+>', 'verb'=>'POST'),
				array('api/<controller>/update', 'pattern'=>'api/<controller:\w+>/<id:[\w-]+>', 'verb'=>'PUT'),
				array('api/<controller>/destroy', 'pattern'=>'api/<controller:\w+>/<id:[\w-]+>', 'verb'=>'DELETE'),
				array('api/<controller>/<action>', 'pattern'=>'api/<controller:\w+>/<id:[\w-]+>/<action:\w+>'),
				array('api/<controller>/<action>', 'pattern'=>'api/<controller:\w+>/<action:\w+>'),
				array('user/signup', 'pattern' => 'signup'),
				array('user/login', 'pattern' => 'login'),
				array('user/logout', 'pattern' => 'logout'),
				array('user/forgotPassword', 'pattern' => 'forgot-password'),
				array('user/resetPassword', 'pattern' => 'reset-password'),
				'<controller:\w+>/<id:[\w-]+>'=>'<controller>/view',
				'<controller:\w+>/<id:[\w-]+>/<action:\w+>/'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
				'<controller:\w+>' => '<controller>/index',
			),
			'showScriptName' => false
		),
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		// uncomment the following to use a MySQL database
		/*
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=testdrive',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		*/
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'error/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
		'apiSecret' => 'SUPERSECRETAPIKEY',
		'emailFromEmail' => 'someone@example.com',
		'emailFromName' => 'Name email is from',
		'mandrilAPIKey' => 'mandril_api'
	),
);
