<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


if(isset($_POST['email']))
{
    $email = $_POST['email'];
    $typee = $_POST['type'];


    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->Username   = 'triptrikker@gmail.com';                     //SMTP username
        $mail->Password   = 'xdrwxvnnxqvcrsdx';                               //SMTP password

        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //ENCRYPTION_SMTPS 465 - Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('triptrikker@gmail.com');
        $mail->addAddress($email);     
        //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'triptrikker';

        if($typee == "hotel"){
            $bodyContent = '<div>Your Hotel has been reserved</div>';
        }else{
            $bodyContent = '<div>Your ticket has been reserved</div>';
        }

        $mail->Body = $bodyContent; 
        
        if($mail->send())
        {
            echo "send";
        }
        else
        {
            echo "not send";
        }
        
       
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
else
{
    header('Location: index.php');
    exit(0);
}

?>