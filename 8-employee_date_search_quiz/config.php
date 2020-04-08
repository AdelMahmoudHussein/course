<?php
session_start();

$host = "localhost";    /* Host name */
$user = "root";         /* User */
$password = "123456789";         /* Password */
$dbname = "demo";   /* Database name */

if(isset($_POST['btn_limit']))
{
    $_SESSION['limit'] = $_POST['limit'];
}
$limit = (isset($_SESSION['limit'])) ? $_SESSION['limit'] : 10; // Amount of data per page

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con){
    die("Connection failed: " . mysqli_connect_error());
}