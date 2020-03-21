<?php 

if(isset($_POST['submit']))
{
    $priority = $_POST['priority'];
    $name = htmlspecialchars(stripslashes(trim($_POST['name'])));
    $email = htmlspecialchars(stripslashes(trim($_POST['email'])));
    $age = htmlspecialchars(stripslashes(trim($_POST['age'])));
    $subject = htmlspecialchars(stripslashes(trim($_POST['subject'])));
    $message = htmlspecialchars(stripslashes(trim($_POST['message'])));
    send_mail($name,$email,$age,$subject,$message);
    send_to_db($db,$priority,$name,$email,$age,$subject,$message);
}
//else
//    {
//        echo "<h1>You must write a message. </h1> 
//        <h3>Please go to <a href='index.php'>Home Page</a></h3>";
//    }

function check_errors($name,$email,$age,$subject,$message)
{
    if (!preg_match("/^[a-zA-Z ]*$/", $name))
    {
        $_SESSION['name_error'] = 'Invalid name';
    }

    if (!preg_match("/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/", $email))
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

    // Check for errors found
    if(!empty($_SESSION['name_error']) || !empty($_SESSION['subject_error'])
            || !empty($_SESSION['email_error']) || !empty($_SESSION['message_error'])
            || !empty($_SESSION['age_error']))
    {
        return false;
    }
    else
    {
        return true;
    }
}

function send_mail($name,$email,$age,$subject,$message)
{

    if(check_errors($name,$email,$age,$subject,$message))
    {
        $to = "email@yahoo.com";
        // change headers to array instead of string to avoid missSpiling \r\n (available from 7.2 version)
        $headers = array(
            'MIME-Version' => '1.0',
            'Content-type' => 'text/html',
            'charset' => 'UTF-8',
            'From' => "{$_POST['name']}<{$_POST['email']}",
            'Reply-To' => "{$_POST['name']}"
        );
        //$headers = 'MIME-Version: 1.0' . "\r\n";
        //$headers .= 'Content-type:text/html; charset=UTF-8' . "\r\n";
        //$headers .= "From: " . $_POST['name'] . "<" . $_POST['email'] . ">\r\n";
        //$headers .= "Reply-To: " . $_POST["email"] . "\r\n";
        
        $mail_subject = 'Messsage received for' . $subject . ' Contact Page';
        $body = $subject . '
            The person that contacted you is  ' . $name . '
             E-mail: ' . $email . '
             Age: ' . $age . '
             Subject: ' . $subject . '
             Message: 
             ' . $message . '	
            |---------END MESSAGE----------|';
        echo "<h1>Thank you for your feedback. I will contact you shortly if needed.</h1>
        <h3>Go to <a href='index.php'>Home Page</a></h3>";
        mail($to, $subject, $body, $headers);
    }
}

function send_to_db($db,$priority,$name,$email,$age,$subject,$message)
{
    if(check_errors($name,$email,$age,$subject,$message))
    {
        $sql= "INSERT INTO contact_us(priority_id,name,email,age,subject,message) "
                . "VALUES('$priority','$name','$email','$age','$subject','$message')";
    
        if (!$result = $db->query($sql)) {
        printf("Error message: %s\n", $db->error);
        exit();
        }
    }
}

?>