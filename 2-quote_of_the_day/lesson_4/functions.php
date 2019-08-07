<?php
/**
 * Created by PhpStorm.
 * User: Ahmed.Fakhr
 * Date: 2019-07-14
 * Time: 5:19 PM
 */
session_start();

# the problem with writing many lines manually so will use upload
if (isset($_REQUEST['delete'])) {
    $id = $_REQUEST['id'];
    delete($id);
} elseif (isset($_REQUEST['upload'])) {
    import_quotes();
} elseif (isset($_REQUEST['edit'])) {
    $id = $_GET['id'];
    edit($id);
} elseif (isset($_REQUEST['update'])) {
    update();
}
function read()
{
    #example 1 read the file
    $rfile = fopen("quotes.txt", "r");
    $quotes = array();
    while (!feof($rfile)) {
        $quotes[] = fgets($rfile);
    }
    return $quotes;
}

function delete($id = NULL)
{
    #example 4 remove specific line from file
    $filename = "quotes.txt";
    $lines = file($filename, FILE_IGNORE_NEW_LINES);
    unset($lines[$id]);
    $data = implode(PHP_EOL, $lines);
    file_put_contents($filename, $data);
    header('Location: ' . 'index.php');
}

function import_quotes()
{
    #step one check the file if not empty and it's extension txt
    #step two read all data from file and convert it to array
    #step three add all lines to the current file
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $ext = pathinfo($_FILES["quotes"]["name"], PATHINFO_EXTENSION);
        if ($_FILES["quotes"]["error"] != 0) {
            $_SESSION['message'] = 'File has an issue.';
        } elseif ($ext !== 'txt') {
            $_SESSION['message'] = "the extension is wrong";
        } elseif (($_FILES['quotes']['size'] >= 2097152) || ($_FILES["quotes"]["size"] == 0)) {
            $_SESSION['message'] = 'File too large. File must be less than 2 megabytes.';
        } else {
            $contents = file_get_contents($_FILES['quotes']['tmp_name']);
            $afile = fopen("quotes.txt", "a");
            fwrite($afile, $contents);
            fclose($afile);
        }
        header('Location: ' . 'index.php');
    }
}

function edit($id)
{
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

/* Summary
 * what is $_FILES as a super global and it's content
 * add validation the form using with $_SESSION -- look to chrome
 * where to add session_start , session_destroy and why ?
 * file input and why should use multipart and post with files
 * issue with handle upload files with 100000 + issue with adding date
*/
/* resources
*/
/* quiz
how to use header with $_GET to show error message
why if order works wrong
*/