<?php
// Replace contact@example.com with your real receiving email address
$receiving_email_address = 'kaden.chien@gmail.com';
include('config.php');

// Check if the required fields are provided
if (!isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['subject']) || !isset($_POST['message'])) {
    die('Please fill all required fields.');
}

// Collect form data
$from_name = $_POST['name'];
$from_email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Set up email headers
$headers = "From: $from_name <$from_email>" . "\r\n";
$headers .= "Reply-To: $from_email" . "\r\n";
$headers .= "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// Set up email body
$body = "From: $from_name\n";
$body .= "Email: $from_email\n";
$body .= "Message:\n$message";

// Use PHP's mail function to send email
if (mail($receiving_email_address, $subject, $body, $headers)) {
    echo 'Email sent successfully.';
} else {
    echo 'Unable to send email. Please try again later.';
}
?>