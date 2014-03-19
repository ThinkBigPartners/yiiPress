<?php
return CMap::mergeArray(
	require(dirname(__FILE__).'/main.php'),
	array(
		'modules'=>array(
			
		),
		'components'=>array(
			'db'=>array(
				'connectionString' => 'mysql:host=;dbname=',
				'emulatePrepare' => true,
				'username' => '',
				'password' => '',
				'charset' => 'utf8'
			)
		),
		'params' => array(
			
		)
	)

);