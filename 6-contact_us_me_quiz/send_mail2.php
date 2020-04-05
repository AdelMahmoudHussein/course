<?php 

if(isset($_POST['submit']))
{   //define the receiver of the email
    $to_email = 'youraddress@example.com';
    $priority = $_POST['priority'];
    $from_name = htmlspecialchars(stripslashes(trim($_POST['name'])));
    $from_email = htmlspecialchars(stripslashes(trim($_POST['email'])));
    $age = htmlspecialchars(stripslashes(trim($_POST['age'])));
    $subject = htmlspecialchars(stripslashes(trim($_POST['subject'])));
    $message = htmlspecialchars(stripslashes(trim($_POST['message'])));
    $message .= file_get_contents("message.html");
    $attachment_name = $_FILES['attachment']['name'];
    $attachment_temp = $_FILES['attachment']['tmp_name'];
    $attachment_type = $_FILES['attachment']['type'];
//  $attachment_name_without_ext = trim(implode('.',explode('.', $attachment_name,-1)));
    $attachment_name_without_ext = pathinfo($attachment_name, PATHINFO_FILENAME);
    
    sendAttachment($to_email, $priority, $from_name, $from_email, $age, $subject, $message, $attachment_temp, $attachment_type, $attachment_name_without_ext);
    $new_attachment_name = upload_attachment($attachment_name, $attachment_temp);
    send_to_db($db, $priority, $from_name, $from_email, $age, $subject, $message, $new_attachment_name);
}

function check_errors($priority, $from_name, $from_email, $age, $subject, $message)
{
    if (!in_array($priority, ['1','2','3'])) 
    {
        $_SESSION['priority_error'] = 'You Must Choose Valid Priority';
    }
    
    if (!preg_match("/^[a-zA-Z ]*$/", $from_name))
    {
        $_SESSION['name_error'] = 'Invalid name';
    }

    if (!preg_match("/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/", $from_email))
    {
        $_SESSION['email_error'] = 'Invalid email';

    }

    if (!preg_match("/^[0-9]*$/", $age))
    {
        $_SESSION['age_error'] = 'Invalid age';
    } 
    
    elseif ($age > 130) 
    {
        $_SESSION['age_error'] = 'age is too high';
    }
    
    if (!preg_match("/^[A-Za-z .'-]+$/", $subject))
    {
        $_SESSION['subject_error'] = 'Invalid subject';
    }

    if (strlen($message) === 0)
    {
        $_SESSION['message_error'] = 'Your message should not be empty';
    }

    // Check for errors found $_SESSION['priority_error']
    if(    !empty($_SESSION['priority_error']) 
        || !empty($_SESSION['name_error']) 
        || !empty($_SESSION['subject_error'])
        || !empty($_SESSION['email_error']) 
        || !empty($_SESSION['message_error'])
        || !empty($_SESSION['age_error']))
    {
        return false;
    }
    else
    {
        return true;
    }
}

function send_to_db($db,$priority,$from_name,$from_email,$age,$subject,$message, $new_attachment_name)
{
    if(check_errors($priority,$from_name,$from_email,$age,$subject,$message))
    {
        $sql= "INSERT INTO contact_us(priority_id,name,email,age,subject,message, attachment) "
                . "VALUES('$priority','$from_name','$from_email','$age','$subject','$message', '$new_attachment_name')";
    
        if (!$result = $db->query($sql)) {
        printf("Error message: %s\n", $db->error);
        exit();
        }
    }
}

// Create a function to send attachment
function sendAttachment($to_email, $priority, $from_name, $from_email, $age, $subject, $message, $attachment_temp, $attachment_type, $attachment_name_without_ext) 
{
    if(check_errors($priority,$from_name,$from_email,$age,$subject,$message))
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
echo $mail_sent ? "<h1 style='color:GREEN; text-align:center;'>Thank you for your feedback. I will contact you shortly if needed.
        </h1><h3>Go to <a href='index.php'>Home Page</a></h3>" : "<h3 style='color:RED; text-align:center;'>Mail failed</h3>";
}
}


function upload_attachment($attachment_name, $attachment_temp)
{
    $uploads_dir = 'attachments';
    move_uploaded_file($attachment_temp, "$uploads_dir/$attachment_name");
    return $attachment_name;
}

?>