<?php

//This function inserts data into the database
function setComments($db)
{
    //Returns true if comment_submit button is clicked
    if (isset($_POST['comment_submit'])) {
        if (!empty($_POST['message']) AND !empty($_POST['message_description'])){
            $user_id = $_POST['user_id'];
            
            $message = filter_input(INPUT_POST,'message',FILTER_SANITIZE_SPECIAL_CHARS);
            $message_description = filter_input(INPUT_POST,'message_description',FILTER_SANITIZE_SPECIAL_CHARS);

            $sql = "INSERT INTO comments(user_id, message, message_description) VALUES('$user_id','$message', '$message_description')";

            //Query the databse and stores it in a variable called result
            if (!$db->query($sql)) {
                printf("Error message: %s\n", $db->error);
                exit();
            }
        } else {
            echo "<div class='alert alert-danger'><p>comment can not be empty</p></div>";
        }
    }
}

//This function retrieves data from the database
function getComments($db)
{
    $sql = "SELECT comments.*, users.username FROM comments INNER JOIN users ON users.id = comments.user_id";

    // Creates a connection($conn) and then queries everything selected from comments table
    if (!$result = $db->query($sql)) {
        printf("Error message: %s\n", $db->error);
        exit();
    }
    //$result->fetch_assoc()- Fetches result row from the database as an array
    //while loop means that everytime we have a result row from the database, it loops until there is no more left
    //while loop helps in echoing all results from the database at once
    echo "<table class='table'>"
        . "<thead>"
            . "<tr>"
            . "<th>User Name</th>"
            . "<th>Comment Date</th>"
            . "<th>Comment Title</th>"
            . "<th>Comment Description</th>"
            . "</tr>"
        . "</thead>"
        . "<tbody>";
    while ($row = $result->fetch_assoc()) {
        //div class comment box is used to style the comment box
        echo "<tr>";

        // Echoes name of the user from the database
        echo "<th>" . $row['username'] . "</th>";
        //- Echoes comment_date from the database
        echo "<td>" . $row['comment_date'] . "</td>";
        // Echoes message from the database
        //nl2br()- Is a function that converts nl to break statements
        echo "<td>" . nl2br($row['message']) . "</td>";
        // Echoes message Description from the database
        echo "<td>" . nl2br($row['message_description']) . "</td>";
        
        
        if(isset($_SESSION['id'])){
            /*
            //The 1st form below deletes comment
            echo "  <td><form class= 'delete-form' method ='POST' action ='" . deleteComments($db) . "'>
                        <input type='hidden' name='comment_id' value='" . $row['comment_id'] . "'>
                        <button class='btn btn-danger' name='commentDelete'> Delete </button>
                    </form></td>";
            */
            
            //The 1st form below deletes comment
            echo "  <td><form class= 'delete-form' method ='GET' action ='" . deleteComments($db) . "'>
                        <input type='hidden' name='comment_id' value='" . $row['comment_id'] . "'>
                        <button type='submit' class='btn btn-danger' name='commentDelete' formaction='" . deleteComments($db,$row['comment_id']) ."'> Delete </button>
                    </form></td>";
            
            //The 2nd form below for editing comment takes information to the next page and updates the database
            /*echo "  <td><form class= 'edit-form' method ='POST' action = 'edit_comment.php'>
                        <input type='hidden' name='comment_id' value='" . $row['comment_id'] . "'>
                        <input type='hidden' name='user_id' value='" . $row['user_id'] . "'>
                        <input type='hidden' name='comment_date' value='" . $row['comment_date'] . "'>
                        <input type='hidden' name='message' value='" . $row['message'] . "'>
                            <input type='hidden' name='message_description' value='" . $row['message_description'] . "'>
                        <button class='btn btn-info' > Edit </button>
                    </form></td>";*/
            
            //The 2nd form below for editing comment takes information to the next page and updates the database
            echo "  <td>
                        <a class='btn btn-info' href ='edit_comment.php?"
                            ."comment_id=".$row['comment_id']
                            ."&user_id=".$row['user_id']
                            ."&comment_date=".$row['comment_date']   
                            ."&message=".$row['message']
                            ."&message_description=".$row['message_description']   
                            . "'> Edit </a>"
                    ."</td>";
        }
        

        echo "</tr>";
    }
    echo "</tbody></table>";
}

//Function for Editing comments
function editComments($db)
{
    if (isset($_POST['comment_submit'])) {
        if (!empty($_POST['message']) AND !empty($_POST['message_description'])){
            $comment_id = $_POST['comment_id'];
            $message = filter_input(INPUT_POST,'message',FILTER_SANITIZE_SPECIAL_CHARS);
            $message_description = filter_input(INPUT_POST,'message_description',FILTER_SANITIZE_SPECIAL_CHARS);


            //Update table comments, set specific column message to new message from user
            $sql = "UPDATE comments SET message= '$message', message_description = '$message_description' WHERE comment_id='$comment_id' ";

            //Query the database and stores it in a variable called result
            if (!$result = $db->query($sql)) {

                printf("Error message: %s\n", $db->error);
                exit();
            }

            //Redirects to the front page
            header("Location: index.php");
        }else {
            echo "<div class='alert alert-danger'><p>comment can not be empty</p></div>";
        }
    }
}

//Function for deleting comments
function deleteComments($db)
{
    if (isset($_GET['commentDelete'])) {
        $comment_id = $_GET['comment_id'];

        //Delete something from comments, where comment_id
        $sql = "DELETE FROM comments WHERE comment_id='$comment_id'  ";

        //Runs the query in the database and stores it in a variable called result
        if (!$result = $db->query($sql)) {
            printf("Error message: %s\n", $db->error);
            exit();
        }
        //Redirects to the front page
        header("Location: index.php");
    }
}

//login function
function getLogin($db)
{

    if (isset($_POST['loginSubmit'])) {

        $user_name = $_POST['user_name'];
        $password = md5($_POST['password']);
        //Selects everything(*) from table comments and stores it in a variable
        $sql = "SELECT * FROM users WHERE username= '$user_name' AND password= '$password' ";
        // Trying to hack login
        /*
        admin'-- ;                                it will hack the system
        admin' OR '1'='1                          it will hack the system
        ngn' OR '1'='1' OR '1'='1                 it return all urers not only one so donot work 
        ngn' OR '1'='1' OR '1'='1' LIMIT 1 -- ;   solved by using limit 1 and comment the rest of line
        */
        
        // Creates a connection($conn) and then query  everything selected from comments table
        
        // donot do any thing unless there is a bad query not wrong user or password like FOM instead of FROM
        // and show cretical data in browser 
        
        // Example of error
        /* Errormessage: You have an error in your SQL syntax; 
         * check the manual that corresponds to your MySQL server version 
         * for the right syntax to use near 
         * 'FOM users WHERE username= 'root' 
         * AND password= '25f9e794323b453885f5181f1b624d0b' at line 1*/
        
        if (!$result = $db->query($sql)) 
        {
            //printf("Errormessage: %s\n", $db->error); 
            echo "<br>Errormessage: $db->error\n";
            exit();
        }
        //mysqli_num_rows() - Counts the number of rows of element or variable between the brackets
        if (mysqli_num_rows($result) == 1) {
            if ($row = $result->fetch_assoc()) {
                $_SESSION['id'] = $row['id'];
                //Sends back to the index.php page and includes a mesaage(loginsuccess) after the url
                header("Location:index.php?loginsuccess");
                //Closes the script and prevents RESUBMISSION of the form
                exit(); // Do not understand why???
            }
        } else {
            header("Location:index.php?loginfailed");
            exit(); // Do not understand why???
        }            
    }
}

//logout function
function userLogout()
{
    if (isset($_POST['logout_submit'])) {
        //Starts the session
        session_start();    // what is the benefits of start a session again before destroy it it work fine without ???
        //Destroys the session
        session_destroy();
        header("Location:index.php");
        exit();
    }
}

