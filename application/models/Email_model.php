<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Email_model extends CI_Model {


    public function __construct() {
        parent::__construct();
        $this->load->library('My_PHPMailer');
    }


    public function enviar_mail($email="",$subject="",$body=""){
        $mail = new PHPMailer();
        $mail->IsSMTP(); // we are going to use SMTP
        $mail->CharSet = 'UTF-8';
        $mail->SMTPDebug  =0; 
        $mail->SMTPAuth   = true; // enabled SMTP authentication
        $mail->SMTPSecure = "tls";  // prefix for secure protocol to connect to the server
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
                )
            );
        $mail->Host = "smtp.gmail.com";
        $mail->Port       = 587;                   // SMTP port to connect to GMail
        $mail->Username   = "virtualmallecu@gmail.com";  // user email address
        $mail->Password   = "code17bwbtj";            // password in GMail
        $mail->SetFrom('virtualmallecu@gmail.com', 'Servidor Correos VM');  //Who is sending the email

        $mail->Subject = $subject;
        $mail->Body = $body;

        $mail->AddAddress($email);
        $mail->AddAttachment(base_url()."img/logo.png");      // some attached files
       // $mail->AddAttachment("images/phpmailer_mini.gif"); // as many as you want
        if(!$mail->Send()) {
          echo "Error: " . $mail->ErrorInfo; //  $data["message"] = "Error: " . $mail->ErrorInfo;
      } else {
         echo "Message sent correctly!";  // $data["message"] = "Message sent correctly!";
     }


 }


 public function enviar_mail2() {
    $mail = new PHPMailer();
        $mail->IsSMTP(); // we are going to use SMTP
        $mail->CharSet = 'UTF-8';
        $mail->SMTPDebug  =3; 
        $mail->SMTPAuth   = true; // enabled SMTP authentication
        $mail->SMTPSecure = "tls";  // prefix for secure protocol to connect to the server
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
                )
            );
        $mail->Host = "smtp.gmail.com";
        $mail->Port       = 587;                   // SMTP port to connect to GMail
        $mail->Username   = "virtualmallecu@gmail.com";  // user email address
        $mail->Password   = "code17bwbtj";            // password in GMail
        $mail->SetFrom('virtualmallecu@gmail.com', 'Servidor Correos VM');  //Who is sending the email
        //$mail->AddReplyTo("response@yourdomain.com","Firstname Lastname");  //email address that receives the response
        $mail->Subject    = "Prueba de email";
        $mail->Body      = "HTML message";
        $mail->AltBody    = "Plain text message";
        $destino = "juancarlos100pl@gmail.com"; // Who is addressed the email to
        $mail->AddAddress($destino, "Juan Pinargo");

        $mail->AddAttachment(base_url()."img/logo.png");      // some attached files
       // $mail->AddAttachment("images/phpmailer_mini.gif"); // as many as you want
        if(!$mail->Send()) {
          echo "Error: " . $mail->ErrorInfo; //  $data["message"] = "Error: " . $mail->ErrorInfo;
      } else {
         echo "Message sent correctly!";  // $data["message"] = "Message sent correctly!";
     }
 }


 public function enviar_mail3($arr=array(),$subject="",$body="") {
    $mail = new PHPMailer();
        $mail->IsSMTP(); // we are going to use SMTP
        $mail->CharSet = 'UTF-8';
        $mail->SMTPDebug  =3; 
        $mail->SMTPAuth   = true; // enabled SMTP authentication
        $mail->SMTPSecure = "tls";  // prefix for secure protocol to connect to the server
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
                )
            );
        $mail->Host = "smtp.gmail.com";
        $mail->Port       = 587;                   // SMTP port to connect to GMail
        $mail->Username   = "virtualmallecu@gmail.com";  // user email address
        $mail->Password   = "code17bwbtj";            // password in GMail
        $mail->SetFrom('virtualmallecu@gmail.com', 'Servidor Correos VM');  //Who is sending the email
        //$mail->AddReplyTo("response@yourdomain.com","Firstname Lastname");  //email address that receives the response

        
        if(count($arr)>0){

            foreach ($arr as $key => $value) {
                $destino=$value->email;

                $mail->Subject    = $subject;
                $mail->Body      = $body;
              //  $mail->AltBody    = "Plain text message";
        $destino = "juancarlos100pl@gmail.com"; // Who is addressed the email to
        $mail->AddAddress($destino, "Juan Pinargo");
        $mail->AddAttachment(base_url()."img/logo.png");      // some attached files
       // $mail->AddAttachment("images/phpmailer_mini.gif"); // as many as you want
        if(!$mail->Send()) {
          echo "Error: " . $mail->ErrorInfo; //  $data["message"] = "Error: " . $mail->ErrorInfo;
      } else {
         echo "Message sent correctly!";  // $data["message"] = "Message sent correctly!";
     }


 }
}





        //$this->load->view('sent_mail',$data);
}


}
