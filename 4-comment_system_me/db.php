<?php


$servername = "localhost";
$username = "root";
$password = "123456789";
$database = "demo";

//Connection to database
$db = new mysqli($servername, $username, $password, $database);

//Returns true if there is NO connection 
//if(!$db){         not work as $db is always an array so !$db is always false 
if($db->connect_errno){
	//Error Message
    die("Connection failed: " . $db->connect_error);
}
