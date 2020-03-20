<?php
/**
 * Created by PhpStorm.
 * User: Ahmed.Fakhr
 * Date: 2019-08-27
 * Time: 4:47 PM
 */

# Step 1 : hide edit and delete buttons from not login users  using session
# Done by using if(isset($_SESSION['id']))
#
#
# Step 2 : add another description field to comment form ,use it with add and edit operations
# Done
#
#
# Step 3 : add a required attribute to prevent empty data (client side validation )
# Done by add required attribute in index and edit pages
# 
# 
# Step 4 : add a validation using php functions to prevent empty data (server side validation)
# Done by using 
# if (!empty($_POST['message']) AND !empty($_POST['message_description'])){
# }else {
#       echo "<div class='alert alert-danger'><p>comment can not be empty</p></div>";}
# in setComment function and edit function
# 
# 
# Step 5 : change getComments to make while loop through every comment as a table rows not a div
# Done
# 
#
# Step 6 : change getComments to show username rather than userid in a label
# Done by edit mysql query in get function and use INNER JOIN
# 
# 
# Step 7 : change getComments to simplify edit and delete operations using GET rather than POST
# Done in edit by using <a> 
# Done in delete by replace GET with POST
# 
# 
# Step 8 : add a new user with arabic name , and it's correctly inserted
# First Error : Errormessage: Illegal mix of collations (latin1_swedish_ci,IMPLICIT) and (utf8mb4_0900_ai_ci,COERCIBLE) for operation '='
# Solved by change the collate of tables and columns to utf8_general_ci	
# then make a new user 
# 
# 
# Step 9 : use current_timestamp to save date and time rather than using php date() function
#   Done by 
#   1.change type in db to TIMESTAMP with default CURRENT_TIMESTAMP
#   2.delete <input type='hidden' name='comment_date' value='" . date('Y-m-d H:i:s') . "'>   from index.php
#   3. delete $comment_date = $_POST['comment_date']; from setComment() Function
#   4.delete comment_date from sql query in $sql = "INSERT INTO comments(user_id,comment_date, message, message_description) VALUES('$user_id','$comment_date','$message', '$message_description')";
#
/*
 * Questions
 * 
 */