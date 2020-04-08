<?php
session_start();
session_destroy();
session_start(); 

require 'db.php';
require 'send_mail2.php';
$sql = "SELECT * FROM priority";
if (!$result = $db->query($sql)) {
    printf("Error message: %s\n", $db->error);
    exit();
}

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <style>
            /* Chrome, Safari, Edge, Opera */
            input::-webkit-outer-spin-button,
            input::-webkit-inner-spin-button {
              -webkit-appearance: none;
              margin: 0;
            }
            /* Firefox */
            input[type=number] {
              -moz-appearance: textfield;
            }
        </style>
    </head>
    <body>
        <div class="container">  
            <form id="contact" method="post" action="" enctype="multipart/form-data">
                <h3>Quick Contact ME</h3>
                <h4>Contact us today, and get reply with in 24 hours!</h4>

                <fieldset>

                    <select name='priority' required autofocus tabindex="1">
                        <option value='' disabled selected>--Choose Priority --</option>
                        <?php 
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='{$row['priority_id']}'>{$row['priority_name']}</option>";
                        }
                        ?>
                    </select>
                    <p><?php if (!empty($_SESSION['priority_error'])) echo $_SESSION['priority_error']; ?></p>
                </fieldset>

                <fieldset>
                    <input placeholder="Full Name" type="text" name="name" tabindex="2" required  
                           value="<?= (!empty($_POST['name'])) ? $_POST['name'] :'' ;?>">
                    <p><?php if (!empty($_SESSION['name_error'])) echo $_SESSION['name_error']; ?></p>
                </fieldset>
                
                <fieldset>
                    <input placeholder="Email Address" type="email" name="email" tabindex="3" required 
                           value="<?= (!empty($_POST['email'])) ? $_POST['email'] :'' ;?>">
                    <p><?php if (!empty($_SESSION['email_error'])) echo $_SESSION['email_error']; ?></p>
                </fieldset>
                
                <fieldset>
                    <input placeholder="Age" type="number" name="age" tabindex="4" required max="130" min="12"
                           value="<?= (!empty($_POST['age'])) ? $_POST['age'] :'' ;?>">
                    <p><?php if (!empty($_SESSION['age_error'])) echo $_SESSION['age_error']; ?></p>
                </fieldset>
                
                <fieldset>
                    <input placeholder="Subject" type="text" name="subject" tabindex="5" required 
                           value="<?= (!empty($_POST['subject'])) ? $_POST['subject'] :'' ;?>">
                    <p><?php if (!empty($_SESSION['subject_error'])) echo $_SESSION['subject_error']; ?></p>
                </fieldset>

                <fieldset>
                    <textarea placeholder="Type your Message Here...." name="message" tabindex="6" required 
                             ><?= (!empty($_POST['message'])) ? $_POST['message'] :'' ;?></textarea>
                    <p><?php if (!empty($_SESSION['message_error'])) echo $_SESSION['message_error']; ?></p>
                </fieldset>
                
                <fieldset>
                    <input type="file" name="attachment" tabindex="7" required>
                    <p><?php //if (!empty($_SESSION['file_error'])) echo $_SESSION['file_error']; ?></p>
                </fieldset>
                <fieldset>
                    <button name="submit" type="submit" id="contact-submit" tabindex="8" >Submit</button>
                    <!-- data-submit="...Sending" ??? -->
                </fieldset>
          </form> 
        </div>
    </body>
</html>