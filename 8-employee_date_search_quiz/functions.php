<?php
require "config.php";

$search_string = "";

if(isset($_GET['delete']))
{   
    $id = $_GET['id'];
    $page = $_GET['page'];
    if(delete($con, $id))
    {
        header('Location:index.php?page='.$page);
    } else {
        die("Some thing wrong happened when trying to delete an employee with id: $id");
    }
}


if(isset($_GET['edit']))
{
    $id = $_GET['id'];
    $page = $_GET['page'];
    edit($con, $id, $page);
}


if(isset($_POST['btn_update']))
{
    $page = $_POST['page'];
    $id = $_POST['id'];
    $emp_name = $_POST['name'];
    $date_of_join = $_POST['join_date'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $image_name = $_POST['image'];
    
    
    if(update($con, $id, $emp_name, $gender, $date_of_join, $email, $image_name))
    {
        header('Location:index.php?page='.$page);
    } else {
        die("Some thing wrong happened when trying to update an employee with id: $id");
    }
}


if(isset($_POST['btn_add']))
{
    $emp_name = $_POST['name'];
    $date_of_join = $_POST['join_date'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $image_name = $_POST['image'];

    if(add($con, $emp_name, $gender, $date_of_join, $email, $image_name))
    {
        header('Location:index.php');
    } 
    else 
    {
        die("Some thing wrong happened when trying to Add new employee");
    }
}


if(isset($_POST['btn_add_another']))
{
    $emp_name = $_POST['name'];
    $date_of_join = $_POST['join_date'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $image_name = $_POST['image'];
    
    
    if(add($con, $emp_name, $gender, $date_of_join, $email, $image_name))
    {
    } else {
        die("Some thing wrong happened when trying to Add new employee");
    }
}


/**
 * 
 * @param type $param
 */
function add($con, $emp_name, $gender, $date_of_join, $email, $image_name) 
{
        $sql = "INSERT INTO employee(emp_name, gender, date_of_join, email, image_name) VALUES "
            . "('$emp_name'"
            . ",'$gender'"
            . ",'$date_of_join'"
            . ",'$email'"
            . ",'$image_name')";
    return mysqli_query($con,$sql);
}


/**
 * 
 * @param type $param
 */
function edit($con, $id,$page) 
{
    header('Location:edit.php?page='.$page.'&id='.$id);
}


/**
 * Delete an Employee From db and redirect to index.php
 * @param string $id <p>The ID of Employee want to delete</p>
 * @return bool <p>Return True if No Error Happen <br>otherwise Return False</p>
 */
function delete($con,$id) 
{
    $sql = "DELETE FROM employee WHERE id='$id'";
    return mysqli_query($con,$sql);
}


/**
 * 
 * @param type $param
 */
function update($con, $id, $emp_name, $gender, $date_of_join, $email, $image_name)
{
    $sql = "UPDATE employee SET "
            . "emp_name='$emp_name'"
            . ",gender='$gender'"
            . ",date_of_join='$date_of_join'"
            . ",email='$email'"
            . ",image_name='$image_name'"
            . " WHERE id='$id'";
    return mysqli_query($con,$sql);
}