<?php
return CMap::mergeArray(
	require(dirname(__FILE__).'/main.php'),
	array(
		'modules'=>array(
			// uncomment the following to enable the Gii tool
			'gii'=>array(
				'class'=>'system.gii.GiiModule',
				'password'=>'abc',
				// If removed, Gii defaults to localhost only. Edit carefully to taste.
				'ipFilters'=>array('127.0.0.1','::1'),
			),
			
		),
		'components'=>array(
			'db'=>array(
				'connectionString' => 'mysql:host=localhost;dbname=yiiPress',
				'emulatePrepare' => true,
				'username' => 'root',
				'password' => 'abc',
				'charset' => 'utf8',
			)
		)
	)
);