<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class SendEmail extends CI_Controller {

     
     function index(){

        $this->load->library('email'); // load the library
        $this->load->library('My_PHPMailer');  
        $this->sendmail();

     }
      
        public function send_mail() {
        $mail = new PHPMailer();
        $mail->IsSMTP(); // we are going to use SMTP
        $mail->SMTPAuth   = true; // enabled SMTP authentication
        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
        $mail->Host       = "smtp.iguana.arvixe.com";      // setting GMail as our SMTP server
        $mail->Port       = 465;                   // SMTP port to connect to GMail
        $mail->Username   = "shreya@startupedia.co";  // user email address
        $mail->Password   = "anshumaan2";            // password in GMail
        $mail->SetFrom('shreya@startupedia.co', 'Bruce Wayne');  //Who is sending the email
        $mail->Subject    = "Email subject";
        $mail->Body      = "HTML message";
        $mail->AltBody    = "Plain text message";
        $destino = $this->input->post('email'); // Who is addressed the email to
        $mail->AddAddress($destino);

        
        if(!$mail->Send()) {
            $data["message"] = "Error: " . $mail->ErrorInfo;
        } else {
            $data["message"] = "Message sent correctly!";
        }
        
print_r($data);

    }
     
}
?>
