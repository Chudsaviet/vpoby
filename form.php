
<?php
header('Content-Type: text/html; charset=utf-8');
$method = $_SERVER['REQUEST_METHOD'];
$email_addresses = "vpo@vpo.by, snegana_kor@tut.by, lincosmail@gmail.com";

//Script Foreach
$c = true;
if ( $method === 'POST' ) {

 $project_name = trim($_POST["project_name"]);
 $form_subject = trim($_POST["form_subject"]);

 foreach ( $_POST as $key => $value ) {
  if ( $value != "" && $key != "project_name" && $key != "admin_email" && $key != "form_subject" ) {
   $message .= "
   " . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
    <td style='padding: 10px; border: #e9e9e9 1px solid;'><b>$key</b></td>
    <td style='padding: 10px; border: #e9e9e9 1px solid;'>$value</td>
   </tr>
   ";
  }
 }
} else if ( $method === 'GET' ) {

 $project_name = trim($_GET["project_name"]);
 $form_subject = trim($_GET["form_subject"]);

 foreach ( $_GET as $key => $value ) {
  if ( $value != "" && $key != "project_name" && $key != "admin_email" && $key != "form_subject" ) {
   $message .= "
   " . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
    <td style='padding: 10px; border: #e9e9e9 1px solid;'><b>$key</b></td>
    <td style='padding: 10px; border: #e9e9e9 1px solid;'>$value</td>
   </tr>
   ";
  }
 }
}

$message = "<table style='width: 100%;'>$message</table>";

mail($email_addresses, $form_subject, $message, "From: $project_name" . "\r\n" . "Reply-To: $email_addresses" . "\r\n" . "X-Mailer: PHP/" . phpversion() . "\r\n" . "Content-type: text/html; charset=\"utf-8\"");
