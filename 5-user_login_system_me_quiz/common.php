<?php
session_start();
//check if user registered,his data(username,password) is correct ,if yes set  session and cookie
function user_login($username, $password)
{
    if (user_exists($username) == FALSE) { // check if user exists
        return "You are not a registered member";
    }
    else if (confirm_user($username, md5($password)) === FALSE) { // check if login data is correct
        return "Authentication error";
    }
    else {
        $_SESSION['logged'] = true ;
        //echo $_SESSION['logged'];exit();
        
        $_SESSION['username'] = $username;
        $_SESSION['user_pass'] = $password;
        $row = dbFetchAssoc(confirm_user($username, md5($password)));
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['last_login'] = $row['last_login'];
        // if choose remember_me save his login in the cookie
        if (isset($_POST['remember_me'])) {
            $_SESSION['user_rem'] = $_POST['remember_me'];
            setcookie("cookname", $_SESSION['username'], time() + 60 * 60 * 24 * COOKIE_TIME_OUT);
            setcookie("cookpass", $_SESSION['user_pass'], time() + 60 * 60 * 24 * COOKIE_TIME_OUT);
            setcookie("cookrem", $_SESSION['user_rem'], time() + 60 * 60 * 24 * COOKIE_TIME_OUT);
        } else {
            //destroy any previously set cookie
            setcookie("cookname", '', time() - 60 * 60 * 24 * COOKIE_TIME_OUT);
            setcookie("cookpass", '', time() - 60 * 60 * 24 * COOKIE_TIME_OUT);
            setcookie("cookrem", '', time() - 60 * 60 * 24 * COOKIE_TIME_OUT);
        }

        //Login history
        $sql = "UPDATE users  SET last_login= NOW()  WHERE username='" . $username . "'";

        dbQuery($sql);
        
        header('Location:' . WEB_ROOT . 'index.php'."?username=$username");
        exit;
    }
}

//do user logout
function user_logout()
{
    session_start();
    $_SESSION = array(); // reset session array
    session_destroy();   // destroy session.
    //delete from cookie if expires
    setcookie("cookname", '', time() - 60 * 60 * 24 * COOKIE_TIME_OUT);
    setcookie("cookpass", '', time() - 60 * 60 * 24 * COOKIE_TIME_OUT);
    setcookie("cookrem", '', time() - 60 * 60 * 24 * COOKIE_TIME_OUT);
    $_SESSION['logged']= false ;
    header('Location: ' . WEB_ROOT . 'login.php');
    exit;
}

//check if user exist
function user_exists($username)
{
    $sql = "SELECT ua.username,ua.username,ua.last_login FROM users ua
            WHERE ua.username='$username'"
        . " LIMIT 1";

    $result = dbQuery($sql);

    if (!$result || (dbNumRows($result) < 1)) {
        return FALSE; //Indicates username failure
    }

    return $result;
}

//check if the username and password are correct
function confirm_user($username, $password)
{

    /* Verify that user is in database */
    $sql = "SELECT ua.username,ua.username,ua.last_login FROM users ua
            WHERE ua.username='$username'
                AND ua.password='$password' LIMIT 1";

    $result = dbQuery($sql);

    if (!$result || (dbNumRows($result) < 1)) {
        return FALSE; //Indicates username failure
    }

    return $result;
}

// create function for register
function register()
{
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
                $_SESSION['logged']= true ;
                $_SESSION['username'] = $username;
                $_SESSION['age'] = $age;
                header("Location: index.php");
            }
            else {
                echo "Failed to register";
            }
        }
    }
}

if(isset($_POST['submit'])){
    register();
}

/*
 * End of common.php
 */