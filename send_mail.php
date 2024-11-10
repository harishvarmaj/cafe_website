<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $name = htmlspecialchars(strip_tags($_POST['name']));
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $messageContent = htmlspecialchars(strip_tags($_POST['message']));
    
    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Invalid email address.';
        exit;
    }
    
    // Set up email parameters
    $to = " harishvarmaj7@gmail.com";  // Replace with your email
    $subject = "New Message from Café Contact Form";
    $body = "Name: $name\nEmail: $email\n\nMessage:\n$messageContent";
    
    // Email headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n"; // Optional: reply-to address
    
    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "<script>alert('Thank you for reaching out! We’ll get back to you soon.'); window.location.href = 'index.html';</script>";
    } else {
        echo "<script>alert('Oops! Something went wrong. Please try again later.'); window.location.href = 'index.html';</script>";
    }
} else {
    echo 'Invalid request.';
}
?>
