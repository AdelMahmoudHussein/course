<?php
    include "functions.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <title>Pagination with PHP</title>
    <link rel="stylesheet" href="print.css" media="print" type="text/css">
</head>
<body>
    <!-- Make Menu Header / Navbar -->
    <nav class="navbar navbar-inverse" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#" style="color: white;"><b>Pagination with PHP</b></a>
            </div>
        </div>
    </nav>

    <div style="padding: 0 15px;">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <form action="functions.php" method="POST" id="delete_form"></form>
                <tr>
                    <th>
                        <button class="btn btn-danger" form="delete_form" 
                                type="submit" name="delete_checked" 
                                value = 1>Delete Checked</button>
                    </th>
                    <th class="text-center">NO</th>
                    <th>NIS</th>
                    <th>NAME</th>
                <!--<th>GENDER</th>-->
                    <th>TEL</th>
                    <th>ADDRESS</th>
                    <th>options</th>
                </tr>
                <?php
                // Check whether there is data on the page URL
                $page = (isset($_GET['page']) && $_GET['page'] >= 1) ? $_GET['page'] : 1;

                 // Make a query to display to what number will be displayed in a table in the database
                 $limit_start = 0;

                 // Create a query to display student data according to the specified limit
                 $sql = $pdo->prepare ("SELECT * FROM student" );

                $sql->execute (); // Execute the query
             // $sql->debugDumpParams();

                $no = 1; // For table numbering
                while ($data = $sql->fetch ()) 
                {// Get all data from the results of the execution of $sql

                ?>
                    <tr <?= ($no % 2 == 0) ? "class='warning' " : ""?>>
                        <td class="align-middle text-center">
                            <input form="delete_form" type="checkbox" value="<?php echo $data['nis']; ?>" name="ids[]"></td>
                        <td class="align-middle text-center"> <?php echo $no; ?> </td>
                        <td class="align-middle"> <?php echo $data['nis']; ?> </td>
                        <td class="align-middle"> <?php echo $data['name']; ?> </td>
                    <!--<td class="align-middle"> <?php // echo $data['gender']; ?> </td>-->
                        <td class="align-middle"> <?php echo $data['tel']; ?> </td>
                        <td class="align-middle"> <?php echo $data['address']; ?> </td>
                        <td class="align-middle"> 
                            <a class="btn btn-danger" href="?delete&id=<?php echo $data['nis'];?>">Delete</a>
                            <a class="btn btn-success" href="">Active</a>
                            <a class="btn btn-info" href="">InActive</a>
                        </td>
                        <p<?= ($no%5 == 0)? ' class="pageBreak"' : "" ?>></p>
                    </tr>
                <?php
                    
                    $no++; // Add 1 for each looping
                }
                ?>
            </table>
            <div class="text-center">
                <button class="btn btn-primary" onClick="window.print()" id="print_btn">Print</button>
        </div>    
        </div>
    </div>
</body>
</html>