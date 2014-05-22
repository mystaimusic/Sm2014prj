<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Staimusic',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'defaultController'=>'Site',

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'testpwd',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
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
			'rules'=>array(
				//'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				//'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				//'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
				
				//http://localhost/SM3/index.php/Playlists/viewPlPerTag/id/22		
				//array(
        		//	'class' => 'application.components.CustomTagUrlRule',
				//),					
		
				//'Playlists/viewPlPerTag/<id:\d+>' => 'musica/tag/<title:\w+>',
				//'Playlists/view2/<id:\d+>'=>'musica/playlist/<title:\w+>/<id:\d+>',
				//'tag-musica/<title:\w+>/<id:\d+>.html'=>'Playlists/viewPlPerTag/<id:\d+>'
				'tag-musica/<title>_<id:\d+>.html'=>'Playlists/viewPlPerTag/<id:\d+>',
				//'tag-musica/anni-60_<id:\d+>.html'=>'Playlists/viewPlPerTag/<id:\d+>',
				'playlist-musicali/<title>_<id:\d+>.html'=>'Playlists/view2/<id:\d+>',
				'generi-musicali/<title>_<id:\d+>.html'=>'Genres/viewRandomBandsPerGenres/<id:\d+>'
			),
		),
		
		/*'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		// uncomment the following to use a MySQL database
		
		/*'db'=>array(
			'connectionString' => 'mysql:host=62.149.150.98;dbname=Sql273343_2',
			'emulatePrepare' => true,
			'username' => 'Sql273343',
			'password' => 'rfefrefcerf43',
			'charset' => 'utf8',
		),*/
		
		'db'=>array(
			'connectionString' => 'mysql:host=127.0.0.1;dbname=Sql273343_3',
			//'connectionString' => 'mysql:host=127.0.0.1;dbname=smdb',
			'emulatePrepare' => true,
			'username' => 'testuser',
			'password' => 'testpass',
			'charset' => 'utf8',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning, trace',
					'categories'=>'vardump'	
				),
				// uncomment the following to show log messages on web pages
				
				/*array(
					'class'=>'CWebLogRoute',
					'levels'=>'trace',
					'categories'=>'vardump',
					'showInFireBug'=>true
				),*/
				
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);