<?php
/*
Class clsEmailTemplate - This is the class used for email management
-Language : PHP 5
-Written By : Anez.A
-Last Modified On : 15-Nov-2008
*/
class clsEmailTemplate
{
	
	

#constructor function		
	function __construct() 
	{
	}

    function sendMail($sub,$body,$to_add,$to_bcc='',$attach_file='')
    {    
		$mail=new PHPMailer();

		//$mail->IsSMTP();
		$mail->IsSendmail();

		/*$mail->SMTPAuth   = false;                  // enable SMTP authentication
		$mail->SMTPSecure = constant('_SMTP_SECURE');                 // sets the prefix to the servier
		$mail->Host       = constant('_SMTP_SERVER');      // sets GMAIL as the SMTP server
		$mail->Port       = constant('_PORT');                   // set the SMTP port 

		$mail->Username   = constant('_SMTP_USER_NAME');  // GMAIL username
		$mail->Password   = constant('_SMTP_USER_PASSWORD');            // GMAIL password */

		$mail->From       = constant('_EMAIL_FROM');
		$mail->FromName   = constant('_EMAIL_FROM_NAME');
		$mail->Subject    = $sub;
		$mail->Body       = $body;                      //HTML Body

		$mail->WordWrap   = 50; // set word wrap

		$mail->AddAddress($to_add);
		$mail->AddBCC($to_bcc,"");
		
    	if ($attach_file != '') 
    	{
	    	$path = "attachment";				
			$flag = 0;
			if(!is_dir($path)) 
			{
				if(!mkdir($path, 0777)) 
				{
					$this->error[] = "Cannot create ".$path." directory. Please check whether there is enough permission creating directory." ;				
				}
			}
			$newname = "attachment/" . $attach_file ;
			$copied = copy ( $_FILES [ 'attach_file' ] [ 'tmp_name' ], $newname ) ;
			$mail->AddAttachment ( $newname, $attach_file, 'base64', 'application/octet-stream' ) ;
			
			if ($attach_file [ "type" ] == 'image/jpeg' || $attach_file [ "type" ] == 'image/gif' || $attach_file [ "type" ] == 'image/bmp') {
				$newname = "attachment/" . $attach_file ;
				$copied = copy ( $_FILES [ 'attach_file' ] [ 'tmp_name' ], $newname ) ;
				$mail->AddEmbeddedImage ( $newname, 'mdi123', $attach_file, 'base64', 'image/jpeg' ) ;
			}
		}
		
		$mail->AddReplyTo(constant('_EMAIL_FROM'),"Home In Kochi");

		$mail->IsHTML(true); // send as HTML

		if(!$mail->Send()) {
		  echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
		  return 1;
		}
		return;				  
    }
	
}
?>