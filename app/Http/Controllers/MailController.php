<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use Session;

class MailController extends Controller
{
    //
    public function sendmail(Request $request){
    	$table_number = Session::get('table');
    	$id = $request->data;

//Create a new PHPMailer instance
    	$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
    	$mail->isSMTP();

//Enable SMTP debugging
// SMTP::DEBUG_OFF = off (for production use)
// SMTP::DEBUG_CLIENT = client messages
// SMTP::DEBUG_SERVER = client and server messages
    	$mail->SMTPDebug = SMTP::DEBUG_OFF;

//Set the hostname of the mail server
    	$mail->Host = 'smtp.mailgun.org';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
    	$mail->Port = 587;

//Set the encryption mechanism to use - STARTTLS or SMTPS
    	$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

//Whether to use SMTP authentication
    	$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
    	$mail->Username = 'postmaster@sandbox3f864691a1904b168d31403822c0fde5.mailgun.org';

//Password to use for SMTP authentication
    	$mail->Password = '269156e17e65b4aae428d95ab4caad00-aa4b0867-e07b690d';

//Set who the message is to be sent from
    	$mail->setFrom('sdrakv@protonmail.com', 'ballu ballu');

//Set an alternative reply-to address
    	// $mail->addReplyTo('sanket@semiqolon.com', 'Sanket Deora');

//Set who the message is to be sent to
    	$mail->addAddress($id['email'], 'ballu');

//Set the subject line
    	$mail->Subject = 'ThankYou for registering for Voila Demo';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
    	$mail->msgHTML('ThankYou for registering for Voila Demo. We will contact you soon regarding the same');

//Replace the plain text body with one created manually
    	$mail->AltBody = 'ThankYou for registering for Voila Demo. We will contact you soon regarding the same';

//Attach an image file
		$mail->addAttachment($table_number.'.jpg');

//send the message, check for errors
    	if (!$mail->send()) {
    // echo 'Mailer Error: '. $mail->ErrorInfo;
    		$responseArray = array('type' => 'danger','message'=>'no');
    		// return response()->json($responseArray);
    	} else {
    // echo 'Message sent!';
    		$responseArray = array('type' => 'success','message'=>'yes');
    		// return response()->json($responseArray);
    	}

    	if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    		$encoded = json_encode($responseArray);

    		header('Content-Type: application/json');

    		echo $encoded;
    	} else {
    		echo $responseArray['message'];
    	}
    }
}
