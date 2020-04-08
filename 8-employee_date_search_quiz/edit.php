<?php require 'functions.php';?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Update Employee Data</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <!-- CSS -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <!-- Script -->
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script type='text/javascript'>
        $(document).ready(function(){
            $('.dateFilter').datepicker({
                dateFormat: "yy-mm-dd"
            });
        });
        </script>
    </head>
    <body>
        <div class="container">
            <div class="jumbotron">
                <h1>Update Employee Data</h1>
            </div>
            <?php 
                $id = $_GET['id'];
                $query = "SELECT * FROM employee WHERE id='$id' ";
                $employeeData = mysqli_query($con,$query);
                if(mysqli_num_rows($employeeData) > 0){
                    while($empRecord = mysqli_fetch_assoc($employeeData)){
                        $id = $empRecord['id'];
                        $emp_name = $empRecord['emp_name'];
                        $date_of_join = $empRecord['date_of_join'];
                        $gender = $empRecord['gender'];
                        $email = $empRecord['email'];
                        $image_name = $empRecord['image_name'];
                    }
                }
            ?>
            <div class="row">
            <!-- Search filter -->
                <form class="form" method='post' action=''>
                    <div class="form-group">
                        <label>Name </label>
                        <input type='text' class='form-control' required name='name' value='<?= $emp_name; ?>'>
                    </div>
                    
                    <div class="form-group">
                        <label>Image </label>
                        <input type='file' class='form-control' required name='image'>
                        <img width="70" height="70" src="images/<?= $image_name; ?>">
                    </div>
                    
                    
                    <div class="form-group">
                        <label>Join Date </label>
                        <input type='text' class='dateFilter form-control' required name='join_date' value='<?= $date_of_join; ?>'>
                    </div>
                    
                    <div class="form-group">
                        <label>Gender </label>
                        <select name="gender" required>
                        <option value="male" <?= ($gender == 'male') ? 'selected':'' ?> > Male </option>
                        <option value="female" <?= ($gender == 'female') ? 'selected':'' ?>> Female </option>
                   </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Email </label>
                        <input type='email' class='form-control' name='email' required value='<?= $email; ?>'>
                    </div>
                    
                    <!-- SEND HIDDEN VALUES  -->
                    <input type='text' name='id' hidden value='<?= $_GET['id']; ?>'>
                    <input type='text' name='page' hidden value='<?= $_GET['page']; ?>'>
                    
                    <div class="form-group">
                        <input type='submit' class="btn btn-info" name='btn_update' value='Update'>
                        <a class="btn btn-danger" href="index.php?page=<?= $_GET['page']; ?>">Cancel</a>
                    </div>
                    
                </form>
            </div>
        </div>
    </body>
</html>