<!--include files  and start session-->
<?php

//Include database connection
include 'db.php';

//Include functions page file
include 'functions.php';

//Starts the session
session_start();
?>

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
<!--container div-->     
<div class="container">
    <!-- jumbotron div Title -->
    <div class="jumbotron">
        <h1>Comments Tutorial</h1>
    </div>
    
    <div class="row">
        <!-- Video iframe to be displayed on the browser-->
        <iframe width="320" height="240"
                src="https://www.youtube.com/embed/tgbNymZ7vqY">
        </iframe>
        <br>

        <!-- The form belows allow the user to login and logout before updating or deleting any comments in the website-->
        <?php

        //This code checks if user is logged in or logout
        if (isset($_SESSION['id'])) 
        {
            $user_id = $_SESSION['id'];
            echo "<div class='alert alert-success'>
                <strong>Success!</strong> You are logged in!
                </div>";
            //if logged in see the comment form and logout form
            echo
            // comment form
               "<form method='post' action='" . setComments($db) . "'>
                    <input type='hidden' name='user_id' value='$user_id'>
                    <div class='form-group'>
                        <label class='control-label'>Title</label>
                        <textarea class='form-control' name='message' required></textarea><br>
                    </div>
                    <div class='form-group'>
                        <label class='control-label'>Description</label>
                        <textarea class='form-control' name='message_description' required rows='8'></textarea><br>
                    </div>                    
                    <button class='btn btn-success' type='submit' name='comment_submit'> Send </button>
                </form>";
            
            echo
            // logout form
               "<form method='post' action='" . userLogout() . "' >
                    <div class='form-group'>
                        <button class='btn btn-info' type='submit' name='logout_submit'> LogOut </button>
                    </div>
                </form>
                  ";
        } 
        
        // if not logged in see login form
        else 
        { 
            echo
               "<form class='form-inline' role='form' method='post' action='" . getLogin($db) . "' >
                    <input type='text' name='user_name'>
                    <input type='password' name='password'>
                    <button type='submit' name='loginSubmit'> LogIn </button>
                </form>";
            echo "You are NOT logged in!";
        }
        ?>

    </div>

    <!-- show comments div -->
    <div class="row">
        <?php
        //The function below is used to get comments from the database
        getComments($db);
        ?>
    </div>
</div>
</body>
</html>