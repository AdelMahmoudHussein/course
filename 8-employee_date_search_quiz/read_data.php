<?php


$sql = "SELECT COUNT(*) AS total FROM employee WHERE 1"; // For Count
$emp_query = "SELECT * FROM employee WHERE 1";           // For fetch data

if(isset($_REQUEST['fromDate']) && !empty($_REQUEST['fromDate']))
{
    $fromDate = $_REQUEST['fromDate'];
    $sql .= " AND date_of_join >= '$fromDate'";
    $emp_query .= " AND date_of_join >= '$fromDate'";
    $search_string .= "&fromDate=$fromDate"; 
}

if(isset($_REQUEST['endDate']) && !empty($_REQUEST['endDate']))
{
    $endDate = $_REQUEST['endDate'];
    $sql .= " AND date_of_join <= '$endDate'";
    $emp_query .= " AND date_of_join <= '$endDate'";
    $search_string .= "&endDate=$endDate";
}

if(isset($_REQUEST['gender']) && in_array($_REQUEST['gender'], ['male','female']))
{
    $gender = $_REQUEST['gender'];
    $sql .= " AND gender = '".$gender."' ";
    $emp_query .= " AND gender = '".$gender."' ";
    $search_string .= "&gender=$gender";
}

$get_total = mysqli_query($con,$sql);
$total_page = ceil(mysqli_fetch_assoc($get_total)['total'] / $limit); // Count the number of pages

// Check whether there is data on the page URL
$page = (isset($_GET['page']) && $_GET['page'] >= 1) ? $_GET['page'] : 1;
$page = (isset($_GET['page']) && $_GET['page'] > $total_page) ?  $total_page : $page;

// Make a query to display to what number will be displayed in a table in the database
$limit_start = ($page - 1) * $limit;  

// Sort
$emp_query .= " ORDER BY date_of_join DESC";

// Create a query to display student data according to the specified limit
$emp_query .= " LIMIT  $limit_start , $limit  ";

$employeesRecords = mysqli_query($con,$emp_query); 

$no = $limit_start + 1; // For table numbering
?>