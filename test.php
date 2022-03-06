<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<?php //get_header() ?>

<?php

require '../../../wp-config.php';

$custom_logo_id = get_theme_mod( 'custom_logo' );
$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );

$content_dom = wpautop( get_post_meta( 5, 'text_email_dominancia', true ) );

?>

<table style="max-width:600px; margin: auto; border: 1px solid #999; padding: 5px">

    <tr style="text-align: center; border-bottom: 1px solid #eeeeee;">
        <td>
            <img src="<?=  esc_url( $logo[0] )  ?>" alt="">
        </td>
    </tr>

    <tr><td>Olá wil</td></tr>

    <tr><td>Segue abaixo seu relatório gerado pelo site <?= bloginfo('name') ?>, tomando como base o TESTE DE PERFIL COMPORTAMENTAL DISC que você respondeu em 03/03/2022.</td></tr>

    <tr style="display: flex; flex-wrap: wrap">
        <td width="100%">
            <table style="flex-basis: 100%; display: flex; justify-content: space-between; font-size: 1.5em; margin: 8px 0">
                <tbody style="flex-basis: 100%; display: flex; justify-content: space-between; font-size: 1.5em; margin: 8px 0">
                    <tr style="flex-basis: 35%; text-align: right">
                        <span style="margin: 0 8px;">30%</span>
                    </td>
                    <td style="text-transform: uppercase; margin: 0 8px">D</td>
                    <td style="flex-basis: 60%; display:flex;">
                        <table width="100%" style="width: 100%; border: 1px solid; margin: 0 8px">
                            <tbody width="30%" style="height: 100%; background-color: red"></tbody>
                        </table>
                    </td>
                </tbody> 
            </table>

            <table style="flex-basis: 100%; display: flex; justify-content: space-between; font-size: 1.5em; margin: 8px 0">
                <tr>
                    <tr style="flex-basis: 35%; text-align: right">
                        <span style="margin: 0 8px;">30%</span>
                    </td>
                    <td style="text-transform: uppercase; margin: 0 8px">I</td>
                    <td style="flex-basis: 60%; display:flex;">
                        <table width="100%" style="border: 1px solid; margin: 0 8px">
                            <tr width="30%" style="height: 100%; background-color: yellow"></tr>
                        </table>
                    </td>
                </tr> 
            </table>

            <table style="flex-basis: 100%; display: flex; justify-content: space-between; font-size: 1.5em; margin: 8px 0">
                <tr>
                    <tr style="flex-basis: 35%; text-align: right">
                        <span style="margin: 0 8px;">30%</span>
                    </td>
                    <td style="text-transform: uppercase; margin: 0 8px">S</td>
                    <td style="flex-basis: 60%; display:flex;">
                    <table width="100%" style="border: 1px solid; margin: 0 8px">
                            <tr width="30%" style="height: 100%; background-color: green"></tr>
                        </table>
                    </td>
                </tr> 
            </table>

            <table style="flex-basis: 100%; display: flex; justify-content: space-between; font-size: 1.5em; margin: 8px 0">
                <tr>
                    <tr style="flex-basis: 35%; text-align: right">
                        <span style="margin: 0 8px;">30%</span>
                    </td>
                    <td style="text-transform: uppercase; margin: 0 8px">C</td>
                    <td style="flex-basis: 60%; display:flex;">
                        <table width="100%" style="border: 1px solid; margin: 0 8px">
                            <tr width="30%" style="height: 100%; background-color: blue"></tr>
                        </table>
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
        <td>
            <strong>SEUS PRINCIPAIS PADRÕES</strong>
        </td>
    </tr>

    <tr><td><h2 style="font-weight: 300; margin: 40px 0 10px; text-transform: uppercase">Seus Principais Padrões:</h2></td></tr>

</table>

</body>
</html>
<?php //get_footer() ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Demystifying Email Design</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body style="margin: 0; padding: 0;">
 <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
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
    <td>
        <?= $content_dom; ?>
    </td>
</tr>
 </table>
</body>
</html>