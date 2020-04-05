<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Send Email With Attachment</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <form method="POST" action="" enctype="multipart/form-data">
                
                <div class="form-group row">
                    <label for="inputFile">Choose Attachment</label>
                    <input type="file" class="form-control" name="attachment" id="inputFile" required>
                </div>
                <div class="form-group row">
                    <label for="InputName">Name</label>
                    <input type="text" class="form-control" name="name" id="InputName" required>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" required>
                </div>
                <div class="form-group row">
                    <label for="InputSubject">Subject</label>
                    <input type="text" class="form-control" name="subject" id="InputSubject" required>
                </div>
                <div class="form-group row">
                    <textarea placeholder="Type your Message Here...." name="message" required rows="6" cols="50"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="send">Send</button>
            </form>
        </div>
    </body>
</html>

<?php

if(isset($_POST['send']))
{
    //define the receiver of the email
    $to_email = 'youraddress@example.com';
    
    $from_name = $_POST['name'];
    $from_email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    $attachment_name = $_FILES['attachment']['name'];
    $attachment_temp = $_FILES['attachment']['tmp_name'];
    $attachment_type = $_FILES['attachment']['type'];

    // because file name may contain dots like 2.ali.ahmed.png
    $attachment_name_without_ext = trim(implode('.',explode('.', $attachment_name,-1)));
    

    sendAttachment($to_email, $from_name, $from_email, $subject, $message, $attachment_temp, $attachment_type, $attachment_name_without_ext);
}


// Create a function to send attachment
function sendAttachment($to_email, $from_name, $from_email, $subject, $message, $attachment_temp, $attachment_type, $attachment_name_without_ext) 
{
//create a boundary string. It must be unique
//so we use the MD5 algorithm to generate a random hash
$random_hash = md5(date('r', time()));

//define the headers we want passed. Note that they are separated with \r\n
$headers = "From: $from_name<$from_email> \r\nReply-To: $from_name<$from_email>";

//add boundary string and mime type specification
$headers .= "\r\nContent-Type: multipart/mixed; boundary=\"PHP-mixed-".$random_hash."\"";

//read the atachment file contents into a string,
//encode it with MIME base64,
//and split it into smaller chunks
$attachment = chunk_split(base64_encode(file_get_contents($attachment_temp)));

//define the body of the message.
ob_start(); //Turn on output buffering
?>
--PHP-mixed-<?php echo $random_hash; ?> 
Content-Type: multipart/alternative; boundary="PHP-alt-<?php echo $random_hash; ?>"

--PHP-alt-<?php echo $random_hash; ?>
Content-Type: text/plain; charset="utf-8"
Content-Transfer-Encoding: 7bit

--PHP-alt-<?php echo $random_hash; ?> 
Content-Type: text/html; charset="utf-8"
Content-Transfer-Encoding: 7bit

<?php echo $message;?>

--PHP-alt-<?php echo $random_hash; ?>--

--PHP-mixed-<?php echo $random_hash; ?> 
<!--Content-Type: application/zip; name="<?php // echo $_FILES['attachment']['name']; ?> "--> 
<!--make Content-Type flexable-->
Content-Type: <?php echo $attachment_type; ?>; name="<?php echo $attachment_name_without_ext; ?> "
Content-Transfer-Encoding: base64 
Content-Disposition: attachment 

<?php echo $attachment; ?>
--PHP-mixed-<?php echo $random_hash; ?>--

<?php
//copy current buffer contents into $message variable and delete current output buffer
$message = ob_get_clean();

//send the email
$mail_sent = @mail($to_email, $subject, $message, $headers );

//if the message is sent successfully print "Mail sent". Otherwise print "Mail failed"
echo $mail_sent ? "<h3 style='color:GREEN; text-align:center;'>Mail sent</h3>" : "<h3 style='color:RED; text-align:center;'>Mail failed</h3>";
}
?>