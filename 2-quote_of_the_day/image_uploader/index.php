<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <title>Image Uploader</title>
</head>
<body>
<?php
ini_set('display_errors', 1);
// control all quotes
include "functions.php";
$images = read();

?>
<form action="functions.php" method="post" enctype="multipart/form-data">
    <input type="file" name="images">
    <div id='alert'>
        <div class=' alert alert-block alert-info fade in center'>
            <?= isset($_SESSION['message']) ? $_SESSION['message'] : ""; ?>
        </div>
    </div>
    <button type="submit" name="upload" value="1">Submit</button>
</form>

<table>
    <thead>
    <td>Name</td>
    <td>Image</td>
    <td>Options</td>
    </thead>
    <?php
    foreach ($images as $key => $image) { ?>
        <tr>
            <td><?= explode('/', $image)[1] ?></td>
            <td><?= "<img src=".$image." width=300 height=200>" ?></td>
            <td>
                <a href="functions.php?delete&id=<?= $image ?>">Delete</a> ||
                <a href="functions.php?edit&id=<?= $image ?>">Edit</a>
            </td>
        </tr>
    <?php }
    session_unset();

    session_destroy(); ?>

</table>

</body>
</html>