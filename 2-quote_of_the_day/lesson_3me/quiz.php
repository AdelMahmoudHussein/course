<!DOCTYPE html>
<html>
<head>
    <title>Quiz3</title>
    <style>
        h3 {color: #0000FF;
            background-color: #ccc;
        }
        .q{
            color: #FF0000;
            font-weight: bold;
        }
    </style>
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: Ahmed.Fakhr
 * Date: 2019-11-15
 * Time: 4:47 PM
 * Solved by Apache NetBeans 11.2
 * User: Adel.Mahmoud
 * Date: 2020-01-25
 * Time: 04:30 PM
 */
ini_set('display_errors', 1);
echo '<br>START<br>===================================<br>';


# Use for loop instead of while in read function
echo "<h3 >NO. 1</h3>";
echo '<p>Done by using For Loop</p>';
echo '<p>Also Done by using file() instead of fopen(), but without for loop</p>';
echo "<p class='q'>Is there any benefits of for over while?</p>";



# Add file_exists into other functions like update function to check file exist
echo "<h3 >NO. 2</h3>";
echo '<p>Done</p>';
echo "<p class='q'>I think that we do not need to add it in create function.Do We?</p>";


# Change read function to show only 10 lines in the quotes list
echo "<h3 >NO. 3</h3>";
echo '<p>Done By using for ($i=1;$i<11;$i++)</p>';
echo '<p>Also Done By using return array_slice($quotes, 0, 10, true);</p>';


# Change read function to read lines from bottom to above order
echo "<h3 >NO. 4</h3>";
echo '<p>Done By using return array_slice(array_reverse($quotes, true), 0, 10, true);</p>';


# add numbers of quotes on the bottom of index.php file into table footer tag
echo "<h3 >NO. 5</h3>";
echo "<p>Done By using tfoot & tr & td then  echo count(quotes) inside php tag</p>";



# Use switch instead of (if elseif) to check $_REQUEST values
echo "<h3 >NO. 6</h3>";
echo "<p>Done By using switch (true) which is the value we check equality of </p>";
echo "<p class='q'>Is true in switch the good practice ?</p>";


# add reset button under submit button and try to click it to show what happens
echo "<h3 >NO. 7</h3>";
echo "<p>Done By using button type reset</p>";
echo "<p>It reset the text to its default befor trying to edit if no submit done</p>";



# Add checkbox to the quotes list ,add bulk_delete function and try to delete check quotes
echo "<h3 >NO. 8</h3>";

echo "<p>Done After 2 hours of trying and searching</p>";
echo "<p class='q'>Important Notes : </p>";
echo "<p><strong>1.use form attribute inside input tag to make it belong to a specific form</strong></p>";
echo "<p><strong>2.use name of checkbox as array like ids[] to extract it from REQUEST as REQUEST['ids']</strong></p>";
echo "<p><strong>3.To send data you must use form submit(post,get) or href(get only)</strong></p>";



# HINT use this keywords to search :
# Delete multiple rows by selecting checkboxes using PHP
# PHP table bulk action delete


# What is the difference between isset function and empty function - google it ?
echo "<h3 >NO. 9</h3>";
echo "<p>isset — Determine if a variable is declared and is different than NULL</p>";
echo "<p>empty — Determine whether a variable is empty</p>";
echo "<p>empty() does not generate a warning if the variable does not exist. </p>";
echo "<p>A variable is considered empty if it does not exist or if its value equals FALSE. </p>";
echo 
"The following values are considered to be empty:     
<br>'' (an empty string)
<br>0 (0 as an integer)
<br>0.0 (0 as a float)
<br>'0' (0 as a string)
<br>NULL
<br>FALSE
<br>array() (an empty array)
";


    
# What is the opposite of implode function - google it ?
echo "<h3 >NO. 10</h3>";
echo "<p>explode() is the opposite of implode function</p>";
echo "<p>implode() turns array into string</p>";
echo "<p>explode() turns string into array</p>";



echo '<br>END<br>===================================<br>';

?>
    
</body>
</html>