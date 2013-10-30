<?php
return CMap::mergeArray(
	require(dirname(__FILE__).'/main.php'),
	array(
		'modules'=>array(
			// uncomment the following to enable the Gii tool
			/*
			'gii'=>array(
				'class'=>'system.gii.GiiModule',
				'password'=>'FullyTorqued',
				// If removed, Gii defaults to localhost only. Edit carefully to taste.
				'ipFilters'=>array('127.0.0.1','::1'),
			),
			*/
			
		),
		'components'=>array(
			/*'db'=>array(
				'connectionString' => 'mysql:host=us-cdbr-azure-west-b.cleardb.com;dbname=bfitAGeJ3It0T1AR',
				'emulatePrepare' => true,
				'username' => 'bb059481f0bb40',
				'password' => 'a7963eaf',
				'charset' => 'utf8'
			)*/
		)
	)

);