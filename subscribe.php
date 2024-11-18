<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Adjust the path if you downloaded PHPMailer manually

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com'; // Replace with your SMTP server
            $mail->SMTPAuth   = true;
            $mail->Username   = 'your_email@gmail.com'; // Your email address
            $mail->Password   = 'your_email_password'; // Your email password or app password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            // Recipients
            $mail->setFrom('your_email@gmail.com', 'Outback Nursery');
            $mail->addAddress($email);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Welcome to Outback Nursery Newsletter!';
            $mail->Body    = '
                <h1>Welcome to Outback Nursery!</h1>
                <p>Thank you for subscribing to our newsletter. Stay tuned for the latest gardening tips and updates!</p>
                <p>- Outback Nursery Team</p>
            ';

            $mail->send();
            echo "<script>alert('Thank you for subscribing! A confirmation email has been sent.'); window.location.href='index.php';</script>";
        } catch (Exception $e) {
            echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}'); window.location.href='index.php';</script>";
        }
    } else {
        echo "<script>alert('Invalid email address. Please try again.'); window.location.href='index.php';</script>";
    }
}
?>
