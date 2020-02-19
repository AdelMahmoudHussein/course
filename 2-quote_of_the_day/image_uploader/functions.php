<?php
/**
 * Created by PhpStorm.
 * User: Ahmed.Fakhr
 * Date: 2019-07-14
 * Time: 5:19 PM
 */
ini_set('display_errors', 1);
session_start();

# client still have to add line by line manually but how about adding multiple lines ?
# client need to validate actions and see response ?

if (isset($_REQUEST['delete'])) {
    $id = $_REQUEST['id'];
    delete($id);
} elseif (isset($_REQUEST['upload'])) {
    upload_images();
} elseif (isset($_REQUEST['edit'])) {
    $id = $_GET['id'];
    edit($id);
} elseif (isset($_REQUEST['update'])) {
    update();
}


function read(){
    $dir = "uploaded_images/";
    $images = array();
    // Open a known directory, and proceed to read its contents
    if (is_dir($dir)) {
        if ($dh = opendir($dir)) {
            while (($file = readdir($dh)) !== false) {
                if ($file != "." && $file != "..") {
                    //echo "<img src=".$dir.$file." width=200 height=200>";
                    $images[]= $dir.$file ;
                }
            }
            closedir($dh);
        }
    }
    return $images;
}

function delete($id = NULL){
    unlink($id);
    header('Location: index.php');
}

function upload_images()
{
    #step one check  if the request POST has sent,
    #step two check  if there is a file with your restrictions and no error
    #step three read all data from file and convert it to array
    #step four add all lines to the current file
    #step five redirect to the index page
    $uploads_dir = 'uploaded_images';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $ext = pathinfo($_FILES["images"]["name"], PATHINFO_EXTENSION);
        if ($_FILES["images"]["error"] != 0) {
            $_SESSION['message'] = 'File has an issue.';
        } elseif ($ext !== 'jpg' AND $ext !== 'png') {
            $_SESSION['message'] = "the extension is wrong";
        } elseif (($_FILES['images']['size'] >= 102400) || ($_FILES["images"]["size"] == 0)) {
            $_SESSION['message'] = 'File too large. File must be less than 100 Kilobytes.';
        } else {
            if ($_FILES["images"]["error"] == 0) {
            //if ($_FILES["images"]["error"] == UPLOAD_ERR_OK) {
                $tmp_name = $_FILES["images"]["tmp_name"];
                // basename() may prevent filesystem traversal attacks;
                // further validation/sanitation of the filename may be appropriate
                $name = basename($_FILES["images"]["name"]);
                move_uploaded_file($tmp_name, "$uploads_dir/$name");
                $_SESSION['message'] = 'Image uploaded successfully';
            }
        }
        header('Location: index.php');
    }
}

function edit($id)
{
    #example 5 read specific line from file
    $filename = "quotes.txt";
    $lines = file($filename, FILE_IGNORE_NEW_LINES);
    $current_line = $lines[$id];
    $current_id = $id;
    include 'edit.php';
}

function update()
{
    #example 5 edit specific line from file
    $filename = "quotes.txt";
    $updated_line = $_REQUEST['quote'];
    $line_id = $_REQUEST['current_id'];

    if (!file_exists("$filename")) {
        die("File not found");
    } else {
        $lines = file($filename, FILE_IGNORE_NEW_LINES);
        $lines[$line_id] = $updated_line;
        $data = implode(PHP_EOL, $lines);
        file_put_contents($filename, $data);
        header('Location: ' . 'index.php');
    }
}
