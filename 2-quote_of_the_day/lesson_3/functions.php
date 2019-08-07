<?php
/**
 * Created by PhpStorm.
 * User: Ahmed.Fakhr
 * Date: 2019-07-14
 * Time: 5:19 PM
 */
// read // write // delete /edit
# the problem with arrays it's not suitable for hard coded large data
if (isset($_REQUEST['delete'])) {
    $id = $_REQUEST['id'];
    delete($id);
} elseif (isset($_REQUEST['create'])) {
    create();
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

function create()
{
    #example 3 append to the file
    $afile = fopen("quotes.txt", "a");
    $txt = PHP_EOL . $_REQUEST['quote'];
    fwrite($afile, $txt);
    fclose($afile);
    header('Location: ' . 'index.php');
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
    // @todo complete
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


/*
The GET method produces a long string that appears in your server logs, in the browser's Location: box.
The GET method is restricted to send up to 1024 characters only.
Never use GET method if you have password or other sensitive information to be sent to the server.
GET can't be used to send binary data, like images or word documents, to the server.
The data sent by GET method can be accessed using QUERY_STRING environment variable.
The PHP provides $_GET associative array to access all the sent information using GET method.

The POST method does not have any restriction on data size to be sent.
The POST method can be used to send ASCII as well as binary data.
The data sent by POST method goes through HTTP header so security depends on HTTP protocol.
 By using Secure HTTP you can make sure that your information is secure.
The PHP provides $_POST associative array to access all the sent information using POST method.
*/

/* Summary
 * handle form actions with super global($REQUEST-$_GET-$POST)
 * local scope - global scope
 * handle all actions with global conditions
 * what is create functionality and how its works
 * what is edit functionality and how its works
 * using header to redirect to another page
*/
/* resources
*/
/* quiz
how to Make $size_recommendation = -1 using type casting ?
*/