
<?php 
/*
    session_start();
    $temp = '';
    $errors = '';
    $clss = 'danger';
    if(isset($_POST['submit'])){
        // ??? I notice that it can create an account with the same username and that will make errors in system  
        $username = strip_tags($_POST['username']);
        $password = strip_tags($_POST['password']); // ??? is there any benefits of using strip_tags here with using md5 
        $age = strip_tags($_POST['age']);
        
        if (empty($username) || empty($password) || empty($age)) {
        $errors .= "\nUsername, Password and Age are required.";
        $temp .= "N";
        }

        if (!empty($username) && strlen($username) > 80) {
        $errors .= "\nMax length of User name:80";
        $temp .= "N";
        }

        if ((!empty($password) && strlen($password) > 20)) {
        $errors .= "\nMax length of Password:20";
        $temp .= "N";
        }

        if (empty($temp)) {
            // I delete it from above and add it here to make it possible to check length of password in validation not more than 20
            $password = strip_tags(md5($_POST['password']));
            $_POST['password'] = '';
            $_POST['username'] = '';
            $_POST['age'] = '';
            $clss = 'success';
            
            $db = mysqli_connect("localhost", "root", "123456789", "demo") or die ("Failed to connect");
            $query = "INSERT INTO users(username,password,age) VALUES('$username', '$password','$age')";
            $result = mysqli_query($db,$query);
            if($result) {
                echo "Successfully registered"; // ??? it will never showen is it true and if that why add it
                header("Location: index.php?username=$username&age=$age");
            }
            else {
                echo "Failed to register";
            }
        }
    }
*/
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
</head>
<body>

<div class="container">

    <div class="row">
        <h1>Register</h1>
        <hr>
        <div class="span12">

            <form class="form-horizontal" action="common.php" method="POST">
                <?php
                    if (!empty($errors)) {
                        echo "<p class='alert alert-".$clss . "'>" . nl2br($errors) . "</p>";
                    }
                    ?>
                <fieldset>

                    <div class="form-group">
                        <!-- Username -->
                        <label   for="username">Username</label>
                        <div class="controls">
                            <input type="text" id="username" name="username" placeholder="Enter username" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <!-- Password-->
                        <label  for="password">Password</label>
                        <div class="controls">
                            <input type="password" id="password" name="password" placeholder="Enter password here" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <!-- Age-->
                        <label  for="age">Age</label>
                        <div class="controls">
                            <input type="text" id="age" name="age" placeholder="Enter your age here" class="form-control" required>
                        </div>
                    </div>                    
                    <div class="form-group">
                        <!-- Button -->
                        <div class="controls">
                            <button type="submit" name="submit" value="Register" class="btn btn-success">Register</button>
                            <a href="login.php" class="btn btn-info">Back</a>
                        </div>
                    </div>
                </fieldset>
            </form>

        </div>
    </div>
</div>


</body>
</html>