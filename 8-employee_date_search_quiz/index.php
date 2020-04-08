<?php 
require "functions.php";
?>
<!doctype html>
<html>
    <head>
        <title>jQuery Datepicker to filter records with PHP MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <!-- CSS -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <!-- Script -->
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script type='text/javascript'>
        $(document).ready(function(){
            $('.dateFilter').datepicker({
                dateFormat: "yy-mm-dd"
            });
        });
        </script>
    </head>
    <body>
    <div class="container">
        <div class="jumbotron">
            <h1><a href="index.php">Employee date search Tutorial</a></h1>
        </div>

        <div class="row">
            
        <!-- Search filter -->
            <?php require 'search_filter_form.php'; ?>

        <!-- Limit Select -->
            <?php require 'limit_select_form.php'; ?>
        
        <!-- Employees List -->
            <div style="padding: 0 15px;">
                <br/>
                
            <!-- add new employee form (button) -->
                <?php require 'add_form.php'; ?>
                
                <br/>
                
                <?php
                // table header                     
                    require 'table_header.php';

                // logic  and read data
                    require 'read_data.php';

                // show data in table body
                    require 'table_body.php';
                    
                //include pagination bar code
                    require 'pagination_bar.php';
                ?>
            </div>
        </div>
    </body>
</html>