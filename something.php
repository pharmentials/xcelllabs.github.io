<?php

if(!isset($_POST['submit']))
{
	//This page should not be accessed directly. Need to submit the form.
	echo "error; you need to submit the form!";
}

$name = $_POST['name'];
$visitor_email = $_POST['mail'];
$subject = $_POST['subject'];
$message = $_POST['message'];

//Validate first
if(empty($name)||empty($visitor_email)) 
{
    echo "Name and email are mandatory!";
    exit;
}



//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');

require 'PHPMailer-master/PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = 'creativeprogrammers1@gmail.com';

//Password to use for SMTP authentication
$mail->Password = 'dear zindagi';

//Set who the message is to be sent from
$mail->setFrom('creativeprogrammers1@gmail.com', 'Creative programmers');

//Set an alternative reply-to address
$mail->addReplyTo('creativeprogrammers1@gmail.com', 'Creative programmers');

 // $gete= implode( ":",$emaildb);
 // echo '<pre>';
 // echo $gete;
 // $getn= implode( ":",$namedb);
  // echo '<pre>';
 // echo $getn;
 
 
//Set who the message is to be sent to
$mail->addAddress( 'chintukush@gmail.com' , 'Chaitanya Panchal' );

//Set the subject line
$mail->Subject = "New Inquiry Form Submission";

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
$andarNoData = "You have a new form submission..!"."<br>"."<br>"."FROM:"."<br>"."<br>"."Name : $name"."<br>"."<br>"."Email: $visitor_email"."<br>"."<br>"."Subject : $subject"."<br>"."<br>"."Message: $message";
//$andarNoData = "Please click on the link below to authenticate yourself: " ."<br>" ."<br>". "http://192.168.43.98/newAttempt/pStep3.php?authorize=$enc";
$mail->Body  = $andarNoData;


//Replace the plain text body with one created manually
$mail->AltBody = 'Not Found.';

//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
	echo "Authentication mail not sent due to technical difficulty..!";
	//$resMSG = "0";
    //echo "Mailer Error: " . $mail->ErrorInfo;
} else {
	echo "You are awesome.! ";
	//$resMSG = "1";
    //echo "Message sent!";
}		

?>