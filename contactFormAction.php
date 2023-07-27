<?php
include("dbFunctions.php");
$fname = $_POST['firstName'];
$lname = $_POST['lastName'];
$visitor_email = $_POST['email'];
$message = $_POST['message'];

$name = $fname . ' ' . $lname;

require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// passing true in constructor enables exceptions in PHPMailer
$mail = new PHPMailer(true);

try {
    $to = base64_decode('bWlsa3RvYXN0dGVhbUBnbWFpbC5jb20=');
    $email_subject = 'New Query submission for Waggin Wheels';
    $email_body = "You have received a new message from the user: $fname $lname.\n" .
    "Here is the message:\n $message" .

    // Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER; // for detailed debug output
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->Username = "milktoastteam@gmail.com";
    $mail->Password = "gyusjvwwfxovktcu";

    // Sender and recipient settings
    $mail->setFrom($visitor_email, $name);
    $mail->addAddress($to);
    $mail->addReplyTo($visitor_email, $name);

    //Setting the email content
    $mail->IsHTML(true);
    $mail->Subject=$email_subject;
    $mail->Body=$email_body;

    $mail->send();
    echo "Email message sent.";

} catch (Exception $e) {
    echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
}

?>