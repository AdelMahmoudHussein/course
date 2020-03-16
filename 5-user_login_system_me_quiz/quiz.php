<?php
/**
 * Created by PhpStorm.
 * User: Ahmed.Fakhr
 * Date: 2019-08-27
 * Time: 4:47 PM
 */

# Step 1 : add age to register form in register.php and save save it to users table

/*
 *  Done by addnew div in form & add new variable and send it to database & by add new columnin database with name age
 */

# Step 2 : make the registered users not activated by default using table schema

/*
 *  Done: first make it default 0 in db table & not send it with one in register.php(not send at all)
*/


# Step 3 : print user name and age in the index.php file after welcome message

/* 
 * Done by change redirect from register.php 
 * header("Location: index.php?username=$username&age=$age");
 * and chnge index.php
 * Welcome <?php echo $_GET['username'];
 * , You have successfully logged in.
 * <?= isset($_GET['age']) ?  'Your age is '.$_GET['age'] : "" ;  Thank you.
 */

# Step 4 : try to make validations for register form  like login form in login.php

/*
 * First use front-end validation by add  required attribute to input fields
 * Second use back-end validation like in login page but delete md5 in validation of length of password
 */

# Step 5 : Move register Code from register.php file to common.php file as a function

/*
 * Done and make form action is common.php is it the best solution or not ???
 */

# Step 6 : decrease cookie time to 30 minutes only

/*
 * Done by change it in config.php
 * define("COOKIE_TIME_OUT", 1/48); //specify cookie timeout in days 
 */

# Step 7 : even if you are not login you can access index.php page , fix this by redirect user to login page

/*
 * Done by add session logged true when login or register
 * and make session logged false when logout
 * this code in begining of index.php
 * if($_SESSION['username'] !== true)
    {
        header('Location: login.php');
    }
 * it must be start session in login function or in common to work correctly 
 * and when add it this message appear
 * Notice: session_start(): A session had already been started - ignoring in C:\AppServ\www\webeasystep\5-user_login_system_me_quiz\index.php on line 3
 * so delete session _start() from index and from register and add it to common.php only 
 * is there any other solution ???
 */

# Now if we are logged in then we go to login.php
# it will show login form normally and it is not good 
# so I add this code in login.php
/*
if(isset($_SESSION['logged']))
{
    if($_SESSION['logged'] === true)
    {
        header('Location : index.php');
    }
}
*/
# but when I add this something wrong happen Notice appear in webpage
/*
Internal Server Error
The server encountered an internal error or misconfiguration and was unable to complete your request.

Please contact the server administrator at adelmahmoud1991@gmail.com to inform them of the time this error occurred, and the actions you performed just before this error.

More information about this error may be available in the server error log.
*/