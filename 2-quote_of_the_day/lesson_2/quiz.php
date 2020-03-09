<!DOCTYPE html>
<html>
<head>
    <title>Quiz2</title>
    <style>
        h3 {color: #0000FF;
            background-color: #ccc;
        }
        .q{
            color: #FF0000;
        }
    </style>
</head>
<body>
    
<?php
/**
 * Created by PhpStorm.
 * User: Ahmed.Fakhr
 * Date: 2019-08-27
 * Time: 4:47 PM
 * Solved by Apache NetBeans 11.2
 * User: Adel.Mahmoud
 * Date: 2020-01-21
 * Time: 06:01 PM
 */
ini_set('display_errors', 1);

echo 'display_errors = ' . ini_get('display_errors') . "<br>";
echo 'register_globals = ' . ini_get('register_globals') . "<br>";
echo 'post_max_size = ' . ini_get('post_max_size') . "<br>"; // return 8M
//ini_set('post_max_size', "2M"); // Why not work even after restart apache server


echo '<br>Start<br>===================================<br>';


# use while to print numbers from 10 to -9
echo "<h3  >NO. 1</h3>";
$i = 10;
while ($i >= -9){
    echo "$i ";
    $i--;
}


# use for loop to print numbers from 10 to -9
echo "<h3  >NO. 2</h3>";
for ($i=10; $i >= -9; $i--){
    echo "$i ";
}


# use foreach to print array numbers from 10 to -9
echo "<h3  >NO. 3 First Solution</h3>";
foreach (range(10, -9, -1) as $num) {
    echo "$num ";
    
}

echo "<h3  >NO. 3 Second Solution without step</h3>";
foreach (range(10, -9) as $num) {
    echo "$num ";
    
}


# how to use $_GET with update function to send a param to update data rather than "John Daa"
echo "<h3  >NO. 4</h3>";
echo '<p>First : in index.php we add new td containing a link like delede</p>';
echo "<p>But with 'functions.php?update&id=' then the id by php code </p>";
echo "<p>Then in the functions file we will check for 'GET['update']'</p>";
echo '<p>just like what we do with delete</p>';
echo '<p>then edit the update function to take id argument with default of null </p>';
echo '<p>and to retreive data from id then put it in $remove_line variable </p>';
echo '<p>finnaly add header to redirect to index.php</p>';
echo '<p>But we better need to make a page to show quite and edit it as I wish</p>';

# redirect to google.com using header
echo "<h3  >NO. 5</h3>";
echo "We use header('location: https://www.google.com/');";
//header('location: https://www.google.com/');

 

# redirect to this page with this get value (name=ahmed) and (age=35) and print it
echo "<h3  >NO. 6</h3>";
echo "<p class='q'>If we activate header line it will make infinite loop of redirection. How to avoid that ?</p>";
echo "<p>By Not redirecting to the same page .</p>";

$header = "header('location: ". '$_SERVER[PHP_SELF]'."?name=ahmed&age=35)";
echo 'this is header: <br>' . $header . '<br>';
// header("location: ". $_SERVER['PHP_SELF'].'?name=ahmed&age=35');
echo $_SERVER['PHP_SELF'].'?name=ahmed&age=35';


# what is the maximum size of $_GET - google it ?
echo "<h3  >NO. 7</h3>";
echo '<p>Maximum size of \$_GET is : </p>';
echo '<p>By trying 8124 chars</p>';
echo '<p>php default limit is 500 chars</p>';
echo '<p>most browser support around 2000 chars</p>';
echo '<p>Apache server default is 8000 chars</p>';
echo '<p>It sets in php.ini file post_max_size = 8M  </p>';
echo "<p class='q'>Q: why?: We can change it manually from file ,but not affected untill restart apache!</p>";
echo "<p class='q'>Q: After change to 1M and restart apache and appear in calling as 1M it still accept url of 8124 bytes ! Why?</p>";
echo "<p class='q'>Q: why ini_set('post_max_size','2M'); Not work even after restart apache ?</p>";

//ini_set('post_max_size', "2M"); // NOT WORKING NO ERROR NO AFFECT

/* In php.ini file in php7 folder
 *  ; Maximum size of POST data that PHP will accept.
 * ; Its value may be 0 to disable the limit. It is ignored if POST data reading
 * ; is disabled through enable_post_data_reading.
 * ; http://php.net/post-max-size
 * post_max_size = 8M
 */



# when we should not use $_GET - google it ?
echo "<h3  >NO. 8</h3>";
echo '<p>We should not use $_GET when sending private data like password</p>';
echo '<p>and When we want to make scenario of processing secret</p>';
echo '<p>So use $_POST instead of.</p>';


# what is the different between $_GET and $_POST - google it ?
echo "<h3  >NO. 9</h3>";
echo '<p>$_GET send data public through the url, Not secured, used with small files</p>';
echo '<p>&_POST send data private in header , more secure, used with big files</p>';



# how to redirect using header after 10 seconds - google it ?
echo "<h3  >NO. 10 First Solution Bad way</h3>";
echo '<p>Use sleep(10); just before header function</p>';
echo "<p class='q'>Q: why page not show any content and wait seconds then redirect?</p>";
/*
sleep()             Delay execution in seconds
usleep()            Delay execution in microseconds
time_nanosleep()    Delay for a number of seconds and nanoseconds
time_sleep_until()  Make the script sleep until the specified time
*/

sleep(2);
//header("location: index.php");

//time_nanosleep(2, 100000);



echo "<h3  >NO. 10 Second Solution Good way</h3>";
echo '<p>Use header("Refresh: 5; url=index.php")</p>';
//header("Refresh: 5; url=index.php");

echo '<br>===================================<br>End<br>';

?>

</body>
</html>