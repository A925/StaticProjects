<?php
/*
Credits: Bit Repository
URL: http://www.bitrepository.com/
*/

include 'config.php';

error_reporting (E_ALL ^ E_NOTICE);

$post = (!empty($_POST)) ? true : false;

if($post)
{

$phone = (!empty($_POST['phone'])) ? $_POST['phone'] : '';

$name =  '=?UTF-8?B?'.base64_encode( stripslashes($_POST['name']) ).'?=';
$email = trim($_POST['email']);
$subject = '=?UTF-8?B?'.base64_encode( stripslashes($_POST['subject']) ).'?=';
$message = stripslashes($_POST['message']) .';'.stripslashes($phone);

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$headers .= 'To: Alexandr <'.WEBMASTER_EMAIL.">\r\n";
$headers .= "From: ".$name." <".$email.">\r\n";
$headers .= "Reply-To: ".$email."\r\n";
$headers .= "X-Mailer: PHP/" . phpversion();

$error = '';

if(!$error)
{
$mail = mail(WEBMASTER_EMAIL, $subject, $message,$headers);


if($mail)
{
echo 'OK';
}

}


}
?>