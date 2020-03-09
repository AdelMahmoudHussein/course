<?php
/**
 * Created by PhpStorm.
 * User: Ahmed.Fakhr
 * Date: 2019-07-14
 * Time: 5:19 PM
 * Solved by Apache NetBeans 11.2
 * User: Adel.Mahmoud
 * Date: 2020-01-25
 * Time: 04:30 PM
 */
                                    // read // write // delete /edit

# improve Crud operation
/*
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
*/

# improve Crud operation
switch (true) {
    case isset($_REQUEST['delete']):
        $id = $_REQUEST['id'];
        delete($id);
        break;

    case isset($_REQUEST['create']):
        create();
        break;    

    case isset($_REQUEST['edit']):
        $id = $_GET['id'];
        edit($id);
        break;
        
    case isset($_REQUEST['update']):
        update();
        break;

    case isset($_REQUEST['delete_checked']):
        $ids = $_REQUEST['ids'];
        delete_checked($ids);
        break;    
}


# This is the original function
/*
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
*/

# Using file() instead of fopen()
/*
function read()
{
    #example 1 read the file
    $quotes = file("quotes.txt");
    return $quotes;
}
*/

# Use for loop instead of while in read function
/*
function read()
{
    #example 1 read the file
    $filename = "quotes.txt";
    if(!file_exists($filename)){
        die("$filename Not Found!");
    } else {
        $rfile = fopen($filename, "r");
        $quotes = array();
        for ($i=1;$i>0;$i++) {
            if(! feof($rfile)){
                $quotes[] = fgets($rfile);
            }else{
                break;
            } 
        }
        return $quotes;
    }  
}
*/

# Change read function to show only 10 lines in the quotes list
/*
function read()
{
    #example 1 read the file
    $filename = "quotes.txt";
    if(!file_exists($filename)){
        die("$filename Not Found!");
    } else {
        $rfile = fopen($filename, "r");
        $quotes = array();
        for ($i=1;$i>0;$i++) {
            if(! feof($rfile)){
                $quotes[] = fgets($rfile);
            }else{
                break;
            } 
        }
        return array_slice($quotes, 0, 10,true);
        // true means every item will be with the original key
        //return array_slice($quotes, 0, 10);
    }  
}
*/

# Change read function to read lines from bottom to above order
/**
 * the function read all lines from file and show them in a page
 * @return array type 
 */
function read()
{
    #example 1 read the file
    $filename = "quotes.txt";
    if(!file_exists($filename)){
        die("$filename Not Found!");
    } else {
        $rfile = fopen($filename, "r");
        $quotes = array();
        for ($i=1;$i>0;$i++) {
            if(! feof($rfile)){
                $quotes[] = fgets($rfile);
            }else{
                break;
            } 
        }
        return array_slice(array_reverse($quotes,true), 0, 10,true);
        // true means every item will be with the original key in slice & reverse
        //return array_slice(array_reverse($quotes), 0, 10);
    }  
}


function delete($id = NULL)
{
    #example 4 remove specific line from file
    $filename = "quotes.txt";
    if(!file_exists($filename)){
        die("$filename Not Found!");
    } else {
        $lines = file($filename, FILE_IGNORE_NEW_LINES);
        unset($lines[$id]);
        $data = implode(PHP_EOL, $lines);
        file_put_contents($filename, $data);
        header('Location: ' . 'index.php');
    }
}

/**
 * The function delete multiple checked lines
 * @param array type $ids
 * NO Return
 */
function delete_checked($ids = NULL)
{
    #example 4 remove specific line from file
    $filename = "quotes.txt";
    if(!file_exists($filename)){
        die("$filename Not Found!");
    } else {
        $lines = file($filename, FILE_IGNORE_NEW_LINES);
        foreach($ids as $id){
            unset($lines[$id]);
        }
        $data = implode(PHP_EOL, $lines);
        file_put_contents($filename, $data);
        header('Location: ' . 'index.php');       
    }
}


function create()
{
    #example 3 append to the file
    $afile = fopen("quotes.txt", "a");
    $txt = PHP_EOL . $_POST['quote'];
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
