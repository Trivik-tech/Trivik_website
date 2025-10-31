<?php
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

    // Email content
    $to = "info@triviktech.com"; // Replace with your email address
    $email_subject = "New Message from Contact Form";
    $email_body = "You have received a new message from $first_name $last_name.\n\n".
                  "Here are the details:\n".
                  "First Name: $first_name\n".
                  "Last Name: $last_name\n".
                  "Email: $email\n".
                  "Subject: $subject\n".
                  "Message:\n$message";

    $headers = "From: noreply@triviktech.com\n"; // Replace with your domain
    // $headers .= "Reply-To: $email";

    // Send email
    if (mail($to, $email_subject, $email_body, $headers)) {
        // Redirect to thank you page
        header('Location: thank_you.php');
        exit();
    } else {
        echo "Failed to send message.";
    }
} else {
    echo "Invalid request method.";
}
?>
