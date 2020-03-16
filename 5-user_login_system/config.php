<?php

ini_set('display_errors', 'On');

error_reporting(E_ALL);

//database connection config
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '123456789';
$dbName = 'demo';
// setting up the web root and server root
$thisFile = str_replace('\\', '/', __FILE__); 
// Here we use \\ not \ to escap it and show it 
// __FILE__ => C:\AppServ\www\webeasystep\5-uses-login-system\config.php
// so $thisFile => C:/AppServ/www/webeasystep/5-uses-login-system/config.php

$docRoot = $_SERVER['DOCUMENT_ROOT'];
// so $docRoot => C:/AppServ/www

$webRoot = str_replace(array($docRoot, 'config.php'), '', $thisFile);
// so $webRoot => /webeasystep/5-user_login_system/

$srvRoot = str_replace('config.php', '', $thisFile);
// so  $srvRoot => C:/AppServ/www/webeasystep/5-user_login_system/

define('WEB_ROOT', $webRoot);
define('SRV_ROOT', $srvRoot);

define("COOKIE_TIME_OUT", 1); //specify cookie timeout in days

require_once 'database.php';
require_once 'common.php';

/*
* End of file config.php
*/