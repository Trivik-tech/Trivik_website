<?php
// Enable error display for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Adjust path to PHPMailerAutoload.php based on your setup
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $first_name = htmlspecialchars($_POST['first_name']);
    $last_name = htmlspecialchars($_POST['last_name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    // Handle file upload
    if (isset($_FILES['cv']) && $_FILES['cv']['error'] == UPLOAD_ERR_OK) {
        $file_tmp_path = $_FILES['cv']['tmp_name'];
        $file_name = $_FILES['cv']['name'];
        $file_name_cleaned = preg_replace("/[^a-zA-Z0-9_\.-]/", "_", $file_name);
        
        $upload_dir = 'uploads/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }
        $dest_path = $upload_dir . $file_name_cleaned;

        if (!move_uploaded_file($file_tmp_path, $dest_path)) {
            echo "There was an error uploading the file.";
            exit;
        }
    } else {
        echo "No file uploaded or upload error.";
        exit;
    }

    // Email content
    $to = "info@triviktech.com"; // Replace with your email address
    $email_subject = "New Application from Career Form";
    $email_body = "You have received a new application from $first_name $last_name.\n\n".
                  "Here are the details:\n".
                  "First Name: $first_name\n".
                  "Last Name: $last_name\n".
                  "Email: $email\n".
                  "Subject: $subject\n".
                  "Message:\n$message\n";

    // Using PHPMailer to send the email with attachment
    $mail = new PHPMailer(true); // Passing true enables exceptions
    try {
        //Server settings
        $mail->isSMTP(); // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
        $mail->SMTPAuth = true; // Enable SMTP authentication
        $mail->Username = 'info@triviktech.com'; // SMTP username
        $mail->Password = 'cvzzkabnmlduqzdh'; // SMTP password
        $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465; // TCP port to connect to

        //Sender and recipient settings
        $mail->setFrom('noreply@triviktech.com', 'Triviktech Career Form');
        $mail->addAddress($to);

        //Attachments
        $mail->addAttachment($dest_path, $file_name_cleaned); // Add attachments

        //Content
        $mail->isHTML(false); // Set email format to HTML
        $mail->Subject = $email_subject;
        $mail->Body    = $email_body;

        // Send email
        $mail->send();

        // Redirect to thank you page
        header('Location: thanks.php');
        exit();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Invalid request method.";
}
?>
