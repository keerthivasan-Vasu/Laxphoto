<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize it
    $name    = htmlspecialchars(trim($_POST["form-name"]));
    $email   = filter_var(trim($_POST["form-email"]), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(trim($_POST["form-message"]));

    // Set recipient email
    $to = "keerthivasandigiworq@gmail.com"; // <-- Replace with your email

    // Set email subject and body
    $subject = "New Contact Form Message from $name";
    $body = "You received a new message:\n\n"
          . "Name: $name\n"
          . "Email: $email\n"
          . "Message:\n$message\n";

    // Set headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "<script>alert('Message sent successfully.');</script>";
    } else {
        echo "<script>alert('Failed to send message.');</script>";
    }
}
?>
