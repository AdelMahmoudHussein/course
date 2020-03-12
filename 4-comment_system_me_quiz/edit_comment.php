<!--// include files-->
<?php
	//date_default_timezone_set()- Sets the timezone you want to get the date in
	date_default_timezone_set('Africa/Nairobi');
	
	//Include database connection
	include 'db.php';
	
	//Include functions page file
	include 'functions.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
	
<!--Input type hidden means the code will not be viewable on the browser-->
<!--date()- Displays the date, Y-m-d(Year,Month, Date) H:i:s(Hour, Minute, Second) -->
<?php
	/*$comment_id= $_POST['comment_id'];
	$user_id= $_POST['user_id'];
	$comment_date= $_POST['comment_date'];
	$message= $_POST['message'];
	$message_description = $_POST['message_description'];
        */
        $comment_id= $_GET['comment_id'];
	$user_id= $_GET['user_id'];
	$comment_date= $_GET['comment_date'];
	$message= $_GET['message'];
	$message_description = $_GET['message_description'];
        
echo "  <form method='post' action='".editComments($db)."'>
            <input type='hidden' name='comment_id' value='".$comment_id."'>
            <input type='hidden' name='user_id' value='".$user_id."'>
            <input type='hidden' name='comment_date' value='".$comment_date."'>
            <div class='form-group'>
                <label class='control-label'>Title</label>
                <textarea class='form-control' name='message' required> ".$message." </textarea><br>
            </div>
            <div class='form-group'>
                <label class='control-label'>Description</label>
                <textarea class='form-control' name='message_description' required  rows='8'>".$message_description."</textarea><br>
            </div>             
            <button class='btn btn-success' type='submit'  name='comment_submit'> Edit </button>
	</form> <br>";

?>
</body>

</html>