<?php

require '../../../wp-config.php';

$custom_logo_id = get_theme_mod( 'custom_logo' );
$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );

$id_page = 5;

$content_dom = wpautop( get_post_meta($id_page, 'text_email_dominancia', true ) );

//$host = get_option("smtp_host");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'dollff1@gmail.com';                     //SMTP username
    $mail->Password   = 'game.2000';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('from@example.com', 'Mailer');
    $mail->addAddress('wildarte10@gmail.com', 'Joe User');         //Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = '<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
    <tr>
     <td>
     <table  border="0" cellpadding="0" cellspacing="0" width="100%">
      <tr>
      <td align="center" bgcolor="" style="padding: 40px 0 30px 0;">
      <img src="https://cdn.pixabay.com/photo/2015/05/19/07/44/browser-773215__340.png" alt="" width="300" height="" style="display: block;" />
      </td>
      </tr>
      </table>
     </td>
    </tr>
    <tr>
        <td style="padding: 5px;">
          Olá wil
        </td>
    </tr>
    <tr>
        <td style="padding: 5px;">
          Segue abaixo seu relatório gerado pelo site teste perfil, tomando como base o TESTE DE PERFIL COMPORTAMENTAL DISC que você respondeu em 03/03/2022.
        </td>
    </tr>
    <tr>
        <td style="padding: 20px 0;">
            <table width="100%">
                <tr>
                    <td align="right">
                      30%
                    </td>
                    <td align="center">
                        D
                    </td>
                    <td width="70%">
                        <table bgcolor="#ff0000" height="40" width="60%"></table>
                    </td>
                </tr>
  
                <tr>
                    <td align="right">
                      30%
                    </td>
                    <td align="center">
                        I
                    </td>
                    <td>
                        <table bgcolor="#ffff00" height="40" width="10%"></table>
                    </td>
                </tr>
  
                <tr>
                    <td align="right">
                      30%
                    </td>
                    <td align="center">
                        S
                    </td>
                    <td>
                        <table bgcolor="#00ff00" height="40" width="30%"></table>
                    </td>
                </tr>
  
                <tr>
                    <td align="right">
                      30%
                    </td>
                    <td align="center">
                        C
                    </td>
                    <td>
                        <table bgcolor="#0000ff" height="40" width="20%"></table>
                    </td>
                </tr>
            </table>
        </td>
        
    </tr>
    <tr>
    <td>
        <hr>
    </td>
    </tr>
    <tr>
        <td style="color: #5555ff; font-size: 1.5em; font-weight: 600">
            SEUS PRINCIPAIS PADRÕES
        </td>
    </tr>
    <tr>
        <td>
            <h2>INFLUÊNCIA</h2>
        </td>
    </tr>
    <tr>
        <td>'.$content_dom.'</td>
    </tr>
   </table>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
    /*
if($_SERVER['REQUEST_METHOD'] == 'POST'):

    


    if($_POST['null1'] != "" || $_POST['null2'] != ""):
        echo "5"; //caso preencham os campos ocultos
    else:

        if(empty($_POST['nome']) && empty($_POST['email'])):
            echo "4"; //caso algum campo obrigatório esteja vazio
        else:

            $host = get_option('mailserver_url');
            $username = get_option('mailserver_login');
            $password = get_option('mailserver_pass');
            $port = get_option('mailserver_port');

            //$host = get_option("show_host");
            //$username = get_option("show_smtp_username");
            //$password = get_option("show_smtp_senha");
            //$port = get_option("show_smtp_porta");
            $smtp_email = get_option("show_smtp_email");
            //$smtp_secure = get_option("show_smtp_secure");
            $emailContato = get_option("show_email_contato");
            

            //$host = "smtp.gmail.com";
            //$username = "seguiareceitaof@gmail.com";
            //$password = "Wild.1992";
            //$port = "465";
            //$smtp_email = "seguiareceitaof@gmail.com";
            $smtp_secure = "ssl/tls";
            //$emailContato = "wildarte10@gmail.com";

            $nome = "do site";
            $email = $_POST['emailForm'];
            //$whatsapp = $_POST['whatsappForm'];
            //$mensagem = $_POST['mensagemForm'];

            $url = 'localhost';
            $toEmail = 'wildarte10@gmail.com';
            $emailServer = 'formulario@'.$url;
            $assunto = "Mensagem do formulário";

            if(empty($host) || empty($username) || empty($password) || empty($port)):
                
                //caso algum dos campos de configuração de servidor de email esteja vazio

                //Create a new PHPMailer instance
                $mail = new PHPMailer();
                
                //$dominio = $_SERVER['SERVER_NAME'];

                $mail->CharSet = 'UTF-8';
                //Set who the message is to be sent from
                $mail->setFrom('from@'.$dominio, 'Mensagem do site');
                //Set who the message is to be sent to
                $mail->addReplyTo($email, $nome);
                //Set the subject line
                $mail->addAddress($emailContato);
                //Set an alternative reply-to address
                $mail->Subject = $assunto;
                //Read an HTML message body from an external file, convert referenced images to embedded,
                //convert HTML into a basic plain-text alternative body

                $mail->msgHTML("<html> <h3>Você recebeu uma mensagem do seu site</h3> <p><strong>Nome: </strong> {$nome} </p> <p> <strong>e-mail: </strong> {$email} </p> </html>");

                //send the message, check for errors
                if (!$mail->send()) {
                    echo 'Mailer Error without SMTP: ' . $mail->ErrorInfo;
                } else {
                    echo "1";
                }

            else:

                $mail = new PHPMailer();

                //Server settings
                $mail->SMTPDebug = 2;
                $mail->Debugoutput = 'html';
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                $mail->isSMTP();
                if($smtp_secure == "ssl/tls"){                                            //Send using SMTP
                    $mail->Host = "ssl://".$host;                     //Set the SMTP server to send through
                    //echo "smtp_secure é igual a ssl/tls";
                }elseif($smtp_secure == "none"){
                    $mail->Host = $host;
                    //echo "smtp_secure é igual a none";
                }else{
                    $mail->Host = $host;
                    //echo "mail->host é igual a host";
                }
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = $username;                     //SMTP username
                $mail->Password   = $password;                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = $port;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->CharSet = 'UTF-8';
                //Set who the message is to be sent from
                $mail->setFrom($smtp_email, 'Mensagem de '.$nome.'');
                //Set an alternative reply-to address
                $mail->addReplyTo($email, $nome);
                //Set who the message is to be sent to
                $mail->addAddress($emailContato);
                //Set the subject line
                $mail->Subject = $assunto;
                //Read an HTML message body from an external file, convert referenced images to embedded,
                //convert HTML into a basic plain-text alternative body

                $mail->msgHTML("<html> <h3>Mensagem recebida do formulário de contato</h3> <p><strong>Nome: </strong> {$nome} </p> <p> <strong>e-mail: </strong> {$email} </p> </html>");

                if(!$mail->send()):
                    echo 'Mailer Error with SMTP: ' . $mail->ErrorInfo;
                else:
                    echo "1";
                endif;

            endif;
        
        endif;

    endif;
   

else:
    echo "<script> window.location.href = '404'; </script>";
endif;
 */



?>