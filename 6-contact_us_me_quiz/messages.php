<?php

require 'db.php';

$sql = "SELECT * FROM contact_us";

if (!$result = $db->query($sql)) {
    printf("Error message: %s\n", $db->error);
    exit();
}?>

<!DOCTYPE html>
<html>
   
<head>
    <meta charset='utf-8'>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        body{
            padding: 10px;
        }
        table {
            border-collapse: collapse;
        }
        table tr td, table tr th{
            border: solid 1px #999;
            padding: 5px;
            text-align: left;
        }
        table tr th{
            color: #FFF;
            background: #666;
        }
        table tr:nth-child(2n){
            background: #e4e4e4;
        }
        table tr:hover{
            background: yellow;
        }

    </style>
</head>
<body>
<?php    
echo "<table class='table'>"
        . "<thead>"
            . "<tr>"
            . "<th>Priority</th>"
            . "<th>Name</th>"
            . "<th>Email</th>"
            . "<th>Age</th>"
            . "<th>Subject</th>"
            . "<th>Message</th>"
            . "<th>Attachement</th>"
            . "<th>Send Date</th>"
            . "</tr>"
        . "</thead>"
        . "<tbody>";
while ($row = $result->fetch_assoc()) {
    //div class comment box is used to style the comment box
    echo "<tr>";

    echo "<td>" . $row['priority_id'] . "</th>";
    echo "<td>" . $row['name'] . "</th>";
    echo "<td>" . $row['email'] . "</th>";
    echo "<td>" . $row['age'] . "</td>";

    echo "<td>" . nl2br($row['subject']) . "</td>";
    echo "<td>" . nl2br($row['message']) . "</td>";
    
    echo "<td>" . $row['attachment'] . "</td>";
    echo "<td>" . $row['date_add'] . "</td>";
    echo "</tr>";
}
echo "</tbody></table>";

?>