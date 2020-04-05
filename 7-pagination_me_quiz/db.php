<?php
$host = 'localhost'; // The hostname
$username = 'root'; // username
$password = '123456789'; // Password (Fill in if using a password)
$database = 'demo'; // The name of the database

$limit = 10; // Amount of data per page

// Connection to MySQL with PDO

try {
    $pdo = new PDO('mysql:host='.$host.';dbname='.$database, $username, $password);
    
    // Create a query to count all amounts of data
            $sql2 = $pdo->prepare("SELECT COUNT(*) AS total FROM student");
            $sql2->execute(); // Execute the query
            $get_total = $sql2->fetch();

            $total_page = ceil($get_total['total'] / $limit); // Count the number of pages
            
            
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}


