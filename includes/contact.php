<?php
$result_success = '';
$result_error = '';
$full_Name_error = $email_error = $msg_error = '';
$full_Name = $email = $msg = $phoneNumber = '';
$full_Name_test = $email_test = $msg_test = '';

//when the form is submitted POST Method and must be clicked on submit button

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['form-submit'])) {
    $full_Name = $_POST['fullName'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $msg = $_POST['message'];
    // Form Validation for fullname
    if (empty($full_Name)) {
        $full_Name_error = "Name is required";
    } else {
        $full_Name_test = test_input($full_Name);
        if (!preg_match("/^[a-z A-Z]*$/", $full_Name_test)) {
            $full_Name_error = "Only letters and white spaces are allowed";
        }
    }
    //Form Validation for email
    if (empty($email)) {
        $email_error = "Email is required";
    } else {
        $email_test = test_input($email);
        if (!filter_var($email_test, FILTER_VALIDATE_EMAIL)) {
            $email_error = "Invalid Email format";
        }
    }
    //Form Validation for message
    if (empty($msg)) {
        $msg_error = "Say atleast Hello!";
    } else {
        $msg_test = test_input($msg);
    }
    if ($full_Name_error == '' and $email_error == '' and $msg_error == '') {
        // Here starts PHP Mailer 
        date_default_timezone_set('Etc/UTC');
        // Edit this path if PHPMailer is in a different location.
        require './PHPMailer/PHPMailerAutoload.php';
        $mail = new PHPMailer;
        $mail->isSMTP();
        /*Server Configuration*/
        $mail->Host = 'smtp.gmail.com'; // Which SMTP server to use.
        $mail->Port = 587; // Which port to use, 587 is the default port for TLS security.
        $mail->SMTPSecure = 'tls'; // Which security method to use. TLS is most secure.
        $mail->SMTPAuth = true; // Whether you need to login. This is almost always required.
        $mail->Username = "your Gmail address example@gmail.com"; // Your Gmail address.
        $mail->Password = "your Gmail password"; // Your Gmail login password or App Specific Password.
        /*Message Configuration*/
        $mail->setFrom($email, $full_Name); // Set the sender of the message.
        $mail->addAddress('your Gmail address example@gmail.com'); // Set the recipient of the message.
        $mail->Subject = 'Contact form submission from your Website'; // The subject of the message
        /*Message Content - Choose simple text or HTML email*/
        $mail->isHTML(true);
        // Choose to send either a simple text email...
        $mail->Body = 'Name: ' . $full_Name . '<br>' . 'PhoneNumber:  ' . $phoneNumber . '<br>' . 'Email:  ' . $email . '<br><br>' . 'Message:  ' . '<h4>' . $msg . '</h4>'; // Set a plain text body.
        // ... or send an email with HTML.
        //$mail->msgHTML(file_get_contents('contents.html'));
        // Optional when using HTML: Set an alternative plain text message for email clients who prefer that.
        //$mail->AltBody = 'This is a plain-text message body'; 
        // Optional: attach a file
        //$mail->addAttachment('images/phpmailer_mini.png');
        if ($mail->send()) {
            $result_success = "Your message was sent successfully!  " . $full_Name;
            $full_Name = false;
            $email = false;
            $phoneNumber = false;
            $msg = false;
        } else {
            $result_error = "Something went wrong. Check your Network connection and Please try again.".$mail->ErrorInfo;
        }
    }
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}