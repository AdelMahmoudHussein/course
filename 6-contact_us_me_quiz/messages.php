<?php

require 'db.php';

$sql = "SELECT * FROM contact_us";

if (!$result = $db->query($sql)) {
    printf("Error message: %s\n", $db->error);
    exit();
}?>

<!DOCTYPE html>
<html>
<!--head tag with meta data and css, js-->    
<head>
    <meta charset='utf-8'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
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

    echo "<th>" . $row['priority_id'] . "</th>";
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