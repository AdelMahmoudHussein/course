<?php
session_start();
session_destroy();
session_start(); 

require 'send_mail.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="container">  
            <form id="contact" method="post" action="">
                <h3>Quick Contact ME</h3>
                <h4>Contact us today, and get reply with in 24 hours!</h4>

                <fieldset>

                    <select>
                        <option value="0">--Choose Priority --</option>
                        <option value="1">High</option>
                        <option value="2">Medium</option>
                        <option value="3">Low</option>
                    </select>
                </fieldset>

                <fieldset>
                    <input placeholder="Full Name" type="text" name="name" tabindex="1" required autofocus 
                           value="<?= (!empty($_POST['name'])) ? $_POST['name'] :'' ;?>">
                    <p><?php if (!empty($_SESSION['name_error'])) echo $_SESSION['name_error']; ?></p>
                </fieldset>
                <fieldset>
                    <input placeholder="Email Address" type="email" name="email" tabindex="2" required 
                           value="<?= (!empty($_POST['email'])) ? $_POST['email'] :'' ;?>">
                    <p><?php if (!empty($_SESSION['email_error'])) echo $_SESSION['email_error']; ?></p>
                </fieldset>
                <fieldset>
                    <input placeholder="Subject" type="text" name="subject" tabindex="3" required 
                           value="<?= (!empty($_POST['subject'])) ? $_POST['subject'] :'' ;?>">
                    <p><?php if (!empty($_SESSION['subject_error'])) echo $_SESSION['subject_error']; ?></p>
                </fieldset>

                <fieldset>
                    <textarea placeholder="Type your Message Here...." name="message" tabindex="4" required 
                              value="<?= (!empty($_POST['message'])) ? $_POST['message'] :'' ;?>"></textarea>
                    <p><?php if (!empty($_SESSION['message_error'])) echo $_SESSION['message_error']; ?></p>
                </fieldset>
                <fieldset>
                    <button name="submit" type="submit" id="contact-submit">Submit</button>
                    <!-- data-submit="...Sending" ??? -->
                </fieldset>
          </form> 
        </div>
    </body>
</html>