<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions


class SendEmail
{
    private $mail;
    private $host = 'smtp.gmail.com';
    private $username   = 'jovalfa24@gmail.com';
    private $password   = 'lpozazjdqnyhjkkn';
    private $port       =  465;

    public function __construct()
    {
        
        try {
            $this->mail = new PHPMailer(true);
            $this->mail->isSMTP();               
            
            $this->mail->Host       = $this->host;                     
            $this->mail->SMTPAuth   = true;                                   
            $this->mail->Username   = $this->username;                     
            $this->mail->Password   = $this->password;                             
            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
            $this->mail->Port       = $this->port;    
        } catch (Exception $e) {
            print_r($e);
            throw $e;
        }
        
    }
    public function sendMail($recepient, $recepientname)
    {
        
        $this->mail->addAddress($recepient, $recepientname);
        $this->mail->addCC('cc@example.com');
        $this->mail->addBCC('bcc@example.com');
        $this->mail->isHTML(true);                                  //Set email format to HTML
        $this->mail->Subject = 'Registration';
        $this->mail->Body    = "Thank you for registering at MARP <br/><form action='http://localhost/ecommerce/confirm.php' method='POST'><input value='{$recepient}' name='email' style='display:none;' /><button type='submit'>CONFIRM</button></form>";
        $this->mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $this->mail->send();
    }
}
