<?php

// our database information
$servername = "localhost";
$username = "root";
$password = "123456789";
$database = "demo";

//Connection to database(create new object from mysqli class)
$db = new mysqli($servername, $username, $password, $database);

// $db->connect_errno will be zero if no error so will be false 
if($db->connect_errno){
    //stop execution and show Error Message
    die("Connection failed: " . $db->connect_error);
}