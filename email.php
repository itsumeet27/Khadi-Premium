<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
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
        $mail->setFrom($email, $name);
        $mail->addAddress('sksharma.sharma87@gmail.com', 'Sumit Sharma');     // Add a recipient // Name is optional
        $mail->addReplyTo($email, $name);
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Inquiry on: '. $subject;
        $mail->Body    = $message;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent. Thank You '. $name;
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }

}else{
    echo "Message Not Sent";
}

?>
