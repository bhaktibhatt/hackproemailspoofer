<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $sender_name = $_POST['s_name'];
    $sender_email = $_POST['s_email'];
    $subject = $_POST['subject'];
    $receiver_email = $_POST['r_email'];
    $message = $_POST['message'];

    // Compose the email headers
    $headers = "From: $sender_name <$sender_email>\r\n";
    $headers .= "Reply-To: $sender_email\r\n";
    $headers .= "Content-type: text/html\r\n";

    // Send the email
    ini_set("SMTP", "smtp.gmail.com");
    ini_set("smtp_port", 587);



    $mail_success = mail($receiver_email, $subject, $message, $headers);

    if ($mail_success) {
        echo "Email sent successfully!";
    } else {
        echo "Error sending email. Please check your configuration.";
    }
}
?>
