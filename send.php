<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\htdocs\practice\phpmailer\src\PHPMailer.php';
require 'C:\xampp\htdocs\practice\phpmailer\src\SMTP.php';
require 'C:\xampp\htdocs\practice\phpmailer\src\Exception.php';

if(isset($_POST["send"])){
    try {
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'markivan.light@gmail.com';
        $mail->Password = 'nxlksqmyffhoyzcm';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('markivan.light@gmail.com');

        // Set the fixed recipient email address
        $mail->addAddress('markivan.light@gmail.com');

        $mail->isHTML(true);

        // No need for subject input
        // $mail->Subject = $_POST["subject"];

        // Use the message from the textarea
        $mail->Body = $_POST["message"];

        $mail->send();

        echo
        "<script>
        alert('Sent Successfully');
        document.location.href = 'index.php.';
        </script>
        ";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>