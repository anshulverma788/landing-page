<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name        = isset($_POST['name']) ? strip_tags(trim($_POST['name'])) : '';
    $phone       = isset($_POST['phone']) ? strip_tags(trim($_POST['phone'])) : '';
    $email       = isset($_POST['email']) ? strip_tags(trim($_POST['email'])) : '';
    $city        = isset($_POST['city']) ? strip_tags(trim($_POST['city'])) : '';
    $destination = isset($_POST['destination']) ? strip_tags(trim($_POST['destination'])) : '';

    // Receiver Email Address
    $to = "himachaldestination@gmail.com";
    $subject = "New Travel Inquiry from Himachal Destination: " . $name;

    // Email Body Construction
    $body = "You have received a new inquiry from your website:\n\n";
    $body .= "Full Name: " . $name . "\n";
    $body .= "Phone Number: " . $phone . "\n";
    $body .= "Email Address: " . $email . "\n";
    $body .= "City: " . $city . "\n";
    $body .= "Selected Package: " . $destination . "\n\n";
    $body .= "Date & Time: " . date("Y-m-d H:i:s") . "\n";

    // Email Headers
    $headers = "From: noreply@himachaldestination.com\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";

    // Attempt to send mail
    @mail($to, $subject, $body, $headers);

    // Redirect to Thank You Page
    header("Location: thank-you.html");
    exit();
} else {
    // Direct access redirect
    header("Location: index.html");
    exit();
}
?>
