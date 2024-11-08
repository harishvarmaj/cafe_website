<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    
    // Set up email parameters
    $to = "harishvarmaj7@gmail.com";  // Replace with your email
    $subject = "New Message from Café Contact Form";
    $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    
    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "<script>alert('Thank you for reaching out! We’ll get back to you soon.'); window.location.href = 'index.html';</script>";
    } else {
        echo "<script>alert('Oops! Something went wrong. Please try again later.'); window.location.href = 'index.html';</script>";
    }
}
?>
