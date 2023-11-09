<?php
/**
 * This example shows sending a message using PHP's mail() function.
 */
require 'phpmailer/PHPMailerAutoload.php';
//Create a new PHPMailer instance
$mail = new PHPMailer;
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['number']) && isset($_POST['message'])) {
	//Important - UPDATE YOUR RECEIVER EMAIL ID, NAME AND SUBJECT
		
	// Please enter your email ID 	
	// $to_email = 'pmrlsivas@gmail.com';
	$to_email = 'info@hagitdesigns.com';
	
	// Please enter your name		
	$to_name = "Hagit";
	// Please enter your Subject
	$subject = "Hagit Madurai Quotation";
	
	$sender_name = $_POST['name'];
	$from_mail    = $_POST['email'];
	$number    = $_POST['number'];
	$message   	  = $_POST['message'];
		
	$mail->SetFrom( $from_mail , $sender_name );
	$mail->AddReplyTo( $from_mail , $sender_name );
	$mail->AddAddress( $to_email , $to_name );
	$mail->Subject = $subject;
	
	$received_content  =  "<div>NAME : ". $sender_name ."</div>";
	$received_content .=  "<div>EMAIL : ". $from_mail ."</div>";
	$received_content .=  "<div>MOBILE NUMBER : ". $number ."</div>";
	$received_content .=  "<div>MESSAGE : ". $message ."</div>";
	
	$mail->MsgHTML( $received_content );
	
	echo $mail->Send();
	exit;	
}