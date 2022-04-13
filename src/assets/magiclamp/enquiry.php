<?php
@session_start();
$includePath='main/';
	include_once($includePath."config.php");	
	include_once($includePath."classes/phpmailer.lang-en.php");

	include_once($includePath."classes/sendMail.cls.php");

	include_once($includePath."classes/email.cls.php");
	include_once($includePath."classes/emailTemplate.cls.php");
	include_once($includePath."classes/class.phpmailer.php");
	include_once($includePath."classes/class.smtp.php");
	
	$clsSendMail = new clsSendMail();
	$clsSendMail->setPostVars();			
	$clsSendMail->setGetVars();	
	$success="";
	$error="";
	if ($clsSendMail->submitted == 1 && $clsSendMail->action == "CONTACTUS") 
	{
		$success = $clsSendMail->sendMail($clsSendMail->action);
		if($success)
		{
			$success="sent";
		}
		else
		{
			$success="notsent";
		}			

	}
	include_once("main/templates/enquiry.tmpl.php");

?>