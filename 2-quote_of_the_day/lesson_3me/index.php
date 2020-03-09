<!DOCTYPE html>
<html>
<head>
    <title>quote of the day</title>
</head>
<body>
<?php
// control all quotes
include "functions.php" ;
    $quotes = read();
 ?>
<form action="functions.php" method="post">
    <input type="text" name="quote" value="">
    <button type="submit" name="create" value="1">Submit</button>
</form>
<table border="1">
    <thead>
    <td>
        <form action="functions.php" method="POST" id="delete_form">
            <button type="submit" name="delete_checked" value = 1>Delete Checked</button>
        </form>
    </td>
    <td>Name</td>
    <td>Options</td>
    </thead>
    <tbody>
        <?php
        foreach ($quotes as $key => $quote) { ?>
            <tr>
                <td><input form="delete_form" type="checkbox" value="<?= $key ?>" name="ids[]"></td>
                <td><?= $quote ?></td>
                <td>
                    <a href="functions.php?delete&id=<?= $key ?>">Delete</a> ||
                    <a href="functions.php?edit&id=<?= $key ?>">Edit</a>
                </td>
            </tr>
        <?php };?>
    </tbody>
    <tfoot>
        <!--# add numbers of quotes on the bottom of index.php file into table footer tag--> 
        <tr>
            <td colspan="3"><?php echo count($quotes);?></td>
        </tr>
    </tfoot>
</table>
</body>

</html>