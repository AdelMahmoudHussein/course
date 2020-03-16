<?php
require_once 'config.php';
//session_start();
if($_SESSION['logged'] !== true)
{
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Welcome Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="jumbotron">
        Welcome <?php echo $_SESSION['username']; ?>, You have successfully logged in.<?= isset($_SESSION['age']) ?  'Your age is '.$_SESSION['age'] : "" ; ?> Thank you.
        <a href="<?php echo WEB_ROOT; ?>logout.php" onclick="return confirm('Are you sure want to logout?')">Logout</a>
    </div>

</div>
</body>
</html>