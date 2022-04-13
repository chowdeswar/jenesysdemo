
<?php
	
	
	$includePath='main/';
	
	include_once("config.php");
	include_once("classes/sendMail.cls.php");

	include_once("classes/Email.cls.php");
	include_once("classes/EmailTemplate.cls.php");
	include_once("classes/class.phpmailer.php");
	include_once("classes/class.smtp.php");
	
	$clsSendMail = new clsSendMail();
	$clsSendMail->setPostVars();			
	$clsSendMail->setGetVars();	
	$success="";
	if ($clsSendMail->submitted == 1 && $clsSendMail->action == "CONTACTUS") 
	{
		$clsSendMail->sendMail($clsSendMail->action);
	}
	if ($clsSendMail->submitted == 1 && $clsSendMail->action == "POSTENQUIRY") 
	{
		$success = $clsSendMail->sendMail($clsSendMail->action);
		if($success)
		{
			$success="sent");
		}
		else
		{
			$success="notsent");

		}

		header("Location: ".constant('_ROOT_PATH')."online.php?form_action=".$success);
		exit;

	}



	
?>	

