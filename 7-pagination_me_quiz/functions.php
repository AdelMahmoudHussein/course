<?php
include "db.php";
switch (true) {
    case isset($_REQUEST['delete']):
        $id = $_REQUEST['id'];
        delete($id, $pdo);
        break;

    case isset($_REQUEST['delete_checked']):
        $ids = $_REQUEST['ids'];
        delete_checked($ids,$pdo);
        break;    
}


function delete($id = NULL, $pdo)
{
    $sql = $pdo->prepare ("DELETE FROM `student` WHERE `student`.`nis` = '$id';" );
    $sql->execute ();
    header('Location: ' . 'index.php');  
}

/**
 * The function delete multiple checked lines
 * @param array type $ids
 * NO Return
 */
function delete_checked($ids = NULL,$pdo)
{
    foreach($ids as $id){
        $sql = $pdo->prepare ("DELETE FROM `student` WHERE `student`.`nis` = '$id';" );
        $sql->execute (); // Execute the query
    }
    header('Location: ' . 'index.php');       
}

