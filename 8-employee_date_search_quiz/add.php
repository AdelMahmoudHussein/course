<?php 
require "functions.php";
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Add New Employee</title>
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
                <h1>Add New Employee</h1>
            </div>

            <div class="row">
            <!-- Search filter -->
                <form class="form" method='post' action=''>
                    <div class="form-group">
                        <label>Name </label>
                        <input type='text' class='form-control' required name='name' value='<?php if(isset($_POST['name'])) echo $_POST['name']; ?>'>
                    </div>
                    
                    <div class="form-group">
                        <label>Image </label>
                        <input type='file' class='form-control' required name='image'>
                    </div>
                    
                    
                    <div class="form-group">
                        <label>Join Date </label>
                        <input type='text' class='dateFilter form-control' required name='join_date' value='<?php if(isset($_POST['join_date'])) echo $_POST['join_date']; ?>'>
                    </div>
                    
                    <div class="form-group">
                        <label>Gender </label>
                        <select name="gender" required>
                            <option value="" disabled selected >--Select Gender--</option>
                            <option value="male"> Male </option>
                            <option value="female"> Female </option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Email </label>
                        <input type='email' class='form-control' name='email' required value='<?php if(isset($_POST['email'])) echo $_POST['email']; ?>'>
                    </div>
                    
                    <div class="form-group">
                        <input type='submit' class="btn btn-info" name='btn_add' value='Save'>
                        <input type='submit' class="btn btn-info" name='btn_add_another' value='Save and Add Another'>
                        <a class="btn btn-danger" href="index.php">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>


