<?php

require '../../../wp-config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//if($_SERVER['REQUEST_METHOD'] == 'POST'):


$id_page = $_POST['page_id'];//id da página

$nome = utf8_decode($_POST['name']);//nome do destinatario
$email = $_POST['email'];//email do destinatario

$logo = wp_get_attachment_image( get_post_meta($id_page, 'image_email', 1 ), 'medium' );

$email_contato = get_option('show_email_contato');//email para respostas

$email_contato = empty($email_contato) ? "info@email.com" : $email_contato;

$email_assunto = get_post_meta($id_page, 'text_email_assunto', true);//assunto dos emails

$remetente = get_post_meta($id_page, 'text_email_remetente', true);//email from

//rodapé do email
$rodape_email = wpautop(get_post_meta($id_page, 'text_email_rodape', true));


$input_dom = $_POST['input_dom'];
$input_inf = $_POST['input_inf'];
$input_est = $_POST['input_est'];
$input_con = $_POST['input_con'];


//check valor de cada variavel para atribuir os títulos do padrões por email
$t1 = ""; 
$t2 = ""; 
$t3 = ""; 
$t4 = ""; 


//check a primeira varivel que armazena a ordem das respostas
switch($_SESSION['first_default']):
    case "dominancia":
        $t1 = "Dominância";
    break;
    case "influencia":
        $t1 = "Influência";
    break;
    case "estabilidade":
        $t1 = "Estabilidade";
    break;
    case "conformidade":
        $t1 = "Conformidade";
    default:
        "";
endswitch;


//check a segunda variavel que armazena a ordem das respostas
switch($_SESSION['second_default']):
    case "dominancia":
        $t2 = "Dominância";
    break;
    case "influencia":
        $t2 = "Influência";
    break;
    case "estabilidade":
        $t2 = "Estabilidade";
    break;
    case "conformidade":
        $t2 = "Conformidade";
    default:
        "";
endswitch;


//check a terceira variavel que armazena a ordem das respostas
switch($_SESSION['third_default']):
    case "dominancia":
        $t3 = "Dominância";
    break;
    case "influencia":
        $t3 = "Influência";
    break;
    case "estabilidade":
        $t3 = "Estabilidade";
    break;
    case "conformidade":
        $t3 = "Conformidade";
    default:
        "";
endswitch;



//check a quarta variavel que armazena a ordem das respostas
switch($_SESSION['fourth_default']):
    case "dominancia":
        $t4 = "Dominância";
    break;
    case "influencia":
        $t4 = "Influência";
    break;
    case "estabilidade":
        $t4 = "Estabilidade";
    break;
    case "conformidade":
        $t4 = "Conformidade";
    default:
        "";
endswitch;



$content = "";

if(($_SESSION['first_default'] != "")){
    $content = $content."<tr><td><h2>".$t1."</h2></td></tr><tr><td>".get_post_meta($id_page, 'text_email_'.$_SESSION['first_default'], true)."</td></tr>";
}
if(!empty($_SESSION['second_default'])){
    $content = $content."<tr><td><h2>".$t2."</h2></td></tr><tr><td>".get_post_meta($id_page, 'text_email_'.$_SESSION['second_default'], true)."</td></tr>";
}
if(!empty($_SESSION['third_default'])){
    $content = $content."<tr><td><h2>".$t3."</h2></td></tr><tr><td>".get_post_meta($id_page, 'text_email_'.$_SESSION['third_default'], true)."</td></tr>";
}
if(!empty($_SESSION['fourth_default'])){
    $content = $content."<tr><td><h2>".$t4."</h2></td></tr><tr><td>".get_post_meta($id_page, 'text_email_'.$_SESSION['fourth_default'], true)."</td></tr>";
}

$content = utf8_decode($content."<tr><td><hr></td></tr><tr><td>".$rodape_email."</td></tr>");

//$host = get_option("smtp_host");



require './vendor/autoload.php';



//===========================================================================================================================


if($_POST['null1'] != "" || $_POST['null2'] != ""):
    echo "5"; //caso preencham os camapos ocultos
else:

    if(empty($_POST['nome']) || empty($_POST['email'])):
        echo "<p style='color: red'>Preencha os campos</p>"; //caso algum campo obrigatório esteja vazio
    else:

        $host = get_option("show_host");
        $username = get_option("show_username");
        $password = get_option("show_password");
        $port = get_option("show_port");
        $smtp_email = get_option("show_email");
        $smtp_secure = get_option("show_secure");
        $emailContato = get_option("show_email_contato");

        $nome = $_POST['nome'];
        $email = $_POST['email'];

        $url = home_url();
        $toEmail = $email;
        $emailServer = 'formulario@'.$url;
        //$assunto = "Teste Disc";

        if(empty($host) || empty($username) || empty($password) ||empty($port)):
            
            //caso algum dos campos de configuração de servidor de email esteja vazio

            //Create a new PHPMailer instance
            $mail = new PHPMailer();
            
            $dominio = $_SERVER['SERVER_NAME'];

            $mail->CharSet = 'UTF-8';
            //set email subject
            $mail->Subject = $email_assunto;
            //Set who the message is to be sent from
            $mail->setFrom('from@'.$dominio, utf8_decode($remetente));
            //Set who the message is to be sent to
            $mail->addReplyTo($emailContato, 'contato');
            //Set the subject line
            $mail->addAddress($email);
            //Set an alternative reply-to address
            $mail->Subject = utf8_decode($email_assunto);
            //Read an HTML message body from an external file, convert referenced images to embedded,
            //convert HTML into a basic plain-text alternative body

            $mail->msgHTML('<!DOCTYPE html>
            <html lang="pt-br">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>resultado</title>
            </head>
            <body>
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
            <tr>
             <td>
             <table  border="0" cellpadding="0" cellspacing="0" width="100%">
              <tr>
              <td align="center" bgcolor="" style="padding: 40px 0 30px 0;">
              <img src="'.$logo.'" alt="" width="" height="90px" style="display: block;" />
              </td>
              </tr>
              </table>
             </td>
            </tr>
            <tr>
                <td style="padding: 5px;">
                  '.utf8_decode('Olá').' '.$nome.'
                </td>
            </tr>
            <tr>
                <td style="padding: 5px;">
                  Segue abaixo seu '.utf8_decode('relatório').' gerado pelo site '.get_bloginfo('name').', tomando como base o TESTE DE PERFIL COMPORTAMENTAL DISC que '.utf8_decode('você').' respondeu em '.date('d/m/Y').'.
                </td>
            </tr>
            <tr>
                <td style="padding: 20px 0;">
                    <table width="100%">
                        <tr>
                            <td align="right">
                            '.$input_dom.'%
                            </td>
                            <td align="center">
                                D
                            </td>
                            <td width="70%">
                                <table bgcolor="#ff0000" height="40" width="'.$input_dom.'%"></table>
                            </td>
                        </tr>
          
                        <tr>
                            <td align="right">
                            '.$input_inf.'%
                            </td>
                            <td align="center">
                                I
                            </td>
                            <td>
                                <table bgcolor="#ffff00" height="40" width="'.$input_inf.'%"></table>
                            </td>
                        </tr>
          
                        <tr>
                            <td align="right">
                            '.$input_est.'%
                            </td>
                            <td align="center">
                                S
                            </td>
                            <td>
                                <table bgcolor="#00ff00" height="40" width="'.$input_est.'%"></table>
                            </td>
                        </tr>
          
                        <tr>
                            <td align="right">
                            '.$input_con.'%
                            </td>
                            <td align="center">
                                C
                            </td>
                            <td>
                                <table bgcolor="#0000ff" height="40" width="'.$input_con.'%"></table>
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
                    '.utf8_decode('SEUS PRINCIPAIS PADRÕES').'
                </td>
            </tr>
            '.$content.'
           </table>      
           </body>
           </html>');

            //send the message, check for errors
            if (!$mail->send()) {
                echo 'Mailer Error without SMTP: ' . $mail->ErrorInfo;
            } else {
                echo "1";
            }

        else:

            $mail = new PHPMailer();

             //Server settings
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            if($smtp_secure == "ssl"){                                            //Send using SMTP
                $mail->Host = "ssl://".$host;                     //Set the SMTP server to send through
            }elseif($smtp_secure == "tls"){
                $mail->Host = $host;
            }else{
                $mail->Host = $host;
            }
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = $username;                     //SMTP username
            $mail->Password   = $password;                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = $port;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            //$mail->CharSet = 'UTF-8';
            //Set who the message is to be sent from
            $mail->setFrom($smtp_email, utf8_decode($remetente));
            //Set an alternative reply-to address
            $mail->addReplyTo($emailContato, 'contato');
            //Set who the message is to be sent to
            $mail->addAddress($email);
            //Set the subject line
            $mail->Subject = utf8_decode($email_assunto);
            //Read an HTML message body from an external file, convert referenced images to embedded,
            //convert HTML into a basic plain-text alternative body

            $mail->msgHTML('<!DOCTYPE html>
            <html lang="pt-br">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>resultado</title>
            </head>
            <body>
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
            <tr>
             <td>
             <table  border="0" cellpadding="0" cellspacing="0" width="100%">
              <tr>
              <td align="center" bgcolor="" style="padding: 40px 0 30px 0;">
              <img src="'.$logo[0].'" alt="" width="" height="90px" style="display: block;" />
              </td>
              </tr>
              </table>
             </td>
            </tr>
            <tr>
                <td style="padding: 5px;">
                  '.utf8_decode('Olá').' '.utf8_decode($nome).'
                </td>
            </tr>
            <tr>
                <td style="padding: 5px;">
                  Segue abaixo seu '.utf8_decode('relatório').' gerado pelo site '.get_bloginfo('name').', tomando como base o TESTE DE PERFIL COMPORTAMENTAL DISC que '.utf8_decode('você').' respondeu em '.date('d/m/Y').'.
                </td>
            </tr>
            <tr>
                <td style="padding: 20px 0;">
                    <table width="100%">
                        <tr>
                            <td align="right">
                            '.$input_dom.'%
                            </td>
                            <td align="center" style="font-size: 1.4em">
                                D
                            </td>
                            <td width="70%" style="padding: 5px 0">
                                <table bgcolor="#ff0000" height="26" width="'.$input_dom.'%"></table>
                            </td>
                        </tr>
          
                        <tr>
                            <td align="right">
                            '.$input_inf.'%
                            </td>
                            <td align="center" style="font-size: 1.4em">
                                I
                            </td>
                            <td width="70%" style="padding: 5px 0">
                                <table bgcolor="#ffff00" height="26" width="'.$input_inf.'%"></table>
                            </td>
                        </tr>
          
                        <tr>
                            <td align="right">
                            '.$input_est.'%
                            </td>
                            <td align="center" style="font-size: 1.4em">
                                S
                            </td>
                            <td width="70%" style="padding: 5px 0">
                                <table bgcolor="#00ff00" height="26" width="'.$input_est.'%"></table>
                            </td>
                        </tr>
          
                        <tr>
                            <td align="right">
                            '.$input_con.'%
                            </td>
                            <td align="center" style="font-size: 1.4em">
                                C
                            </td>
                            <td width="70%" style="padding: 5px 0">
                                <table bgcolor="#0000ff" height="26" width="'.$input_con.'%"></table>
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
                    '.utf8_decode('SEUS PRINCIPAIS PADRÕES').'
                </td>
            </tr>
            '.$content.'
           </table>      
           </body>
           </html>');

            if(!$mail->send()):
                echo 'Mailer Error with SMTP: ' . $mail->ErrorInfo;
            else:
                echo "1";
            endif;

        endif;
    
    endif;

endif;



//===========================================================================================================================




/*

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'dollff1@gmail.com';                     //SMTP username
    $mail->Password   = 'game.2000';                               //SMTP password
    $mail->SMTPSecure = "PHPMailer::ENCRYPTION_SMTPS";            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('dollff1@gmail.com', utf8_decode('Relatório Teste'));
    $mail->addAddress($email, $nome);         //Name is optional
    $mail->addReplyTo($email_contato, 'contato');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = utf8_decode('Aqui está seu relatório');
    $mail->Body    = '<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>resultado</title>
    </head>
    <body>
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
    <tr>
     <td>
     <table  border="0" cellpadding="0" cellspacing="0" width="100%">
      <tr>
      <td align="center" bgcolor="" style="padding: 40px 0 30px 0;">
      <img src="'.$logo[0].'" alt="" width="" height="90px" style="display: block;" />
      </td>
      </tr>
      </table>
     </td>
    </tr>
    <tr>
        <td style="padding: 5px;">
          '.utf8_decode('Olá').' '.$nome.'
        </td>
    </tr>
    <tr>
        <td style="padding: 5px;">
          Segue abaixo seu '.utf8_decode('relatório').' gerado pelo site '.get_bloginfo('name').', tomando como base o TESTE DE PERFIL COMPORTAMENTAL DISC que '.utf8_decode('você').' respondeu em '.date('d/m/Y').'.
        </td>
    </tr>
    <tr>
        <td style="padding: 20px 0;">
            <table width="100%">
                <tr>
                    <td align="right">
                    '.$input_dom.'%
                    </td>
                    <td align="center">
                        D
                    </td>
                    <td width="70%">
                        <table bgcolor="#ff0000" height="40" width="'.$input_dom.'%"></table>
                    </td>
                </tr>
  
                <tr>
                    <td align="right">
                    '.$input_inf.'%
                    </td>
                    <td align="center">
                        I
                    </td>
                    <td>
                        <table bgcolor="#ffff00" height="40" width="'.$input_inf.'%"></table>
                    </td>
                </tr>
  
                <tr>
                    <td align="right">
                    '.$input_est.'%
                    </td>
                    <td align="center">
                        S
                    </td>
                    <td>
                        <table bgcolor="#00ff00" height="40" width="'.$input_est.'%"></table>
                    </td>
                </tr>
  
                <tr>
                    <td align="right">
                    '.$input_con.'%
                    </td>
                    <td align="center">
                        C
                    </td>
                    <td>
                        <table bgcolor="#0000ff" height="40" width="'.$input_con.'%"></table>
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
            '.utf8_decode('SEUS PRINCIPAIS PADRÕES').'
        </td>
    </tr>
    '.$content.'
   </table>      
   </body>
   </html>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if($mail->send()){
        echo 1;
        session_destroy();
    }else{
        echo "não enviou";
        var_dump($mail->send());
    }
} catch (Exception $e) {
    echo "A mensagem não pode ser enviada. Mailer Error: {$mail->ErrorInfo}";
    var_dump($mail->send());
}


endif;
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