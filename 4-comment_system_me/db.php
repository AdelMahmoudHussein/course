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

// Example of print_r($db) when connection done
/*mysqli Object
(
    [affected_rows] => 0
    [client_info] => mysqlnd 5.0.12-dev - 20150407 - $Id: 7cc7cc96e675f6d72e5cf0f267f48e167c2abb23 $
    [client_version] => 50012
    [connect_errno] => 0
    [connect_error] => 
    [errno] => 0
    [error] => 
    [error_list] => Array
        (
        )

    [field_count] => 0
    [host_info] => localhost via TCP/IP
    [info] => 
    [insert_id] => 0
    [server_info] => 8.0.17
    [server_version] => 80017
    [stat] => Uptime: 10000  Threads: 2  Questions: 152  Slow queries: 0  Opens: 280  Flush tables: 3  Open tables: 200  Queries per second avg: 0.015
    [sqlstate] => 00000
    [protocol_version] => 10
    [thread_id] => 37
    [warning_count] => 0
)*/

// Example of print_r($db) when connection failed
/*mysqli Object
(
    [affected_rows] => 
    [client_info] => 
    [client_version] => 50012
    [connect_errno] => 1045
    [connect_error] => Access denied for user 'root'@'localhost' (using password: YES)
    [errno] => 
    [error] => 
    [error_list] => 
    [field_count] => 
    [host_info] => 
    [info] => 
    [insert_id] => 
    [server_info] => 
    [server_version] => 
    [stat] => 
    [sqlstate] => 
    [protocol_version] => 
    [thread_id] => 
    [warning_count] => 
)*/