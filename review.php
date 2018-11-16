<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $product = $_POST['product'];
    $message = $_POST['message'];

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
        $mail->SMTPDebug = 0;                                            // Enable verbose debug output
        $mail->isSMTP();                                                 // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';                                  // Specify main and backup SMTP servers
        $mail->Port = 587;                                               // TCP port to connect to
        $mail->SMTPAuth = true;                                          // Enable SMTP authentication
        $mail->SMTPSecure = 'tls';                                       // Enable TLS encryption, `ssl` also accepted
        $mail->Username = 'sksharma.sharma87@gmail.com';                 // SMTP username
        $mail->Password = 'shar2103';                                    // SMTP password
                                            

        //Recipients
        $mail->setFrom('sksharma.sharma87@gmail.com', 'Sumit');
        $mail->addAddress($email, $name);     // Add a recipient // Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        //Content
        $mail->isHTML(true);       
        $mail->Subject = 'Review on: '. $product;
        $mail->Body    = 'Your message has been received';
        $mail->AltBody = $message;

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }

}else{
    echo "Message Not Sent";
}

?>