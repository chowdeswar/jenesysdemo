<?php
/*
Class clsEmail - This is the class used for email management
-Language : PHP 5
-Written By : Anez.A
-Last Modified On : 15-Nov-2008

# Usage 
	$mail = new clsEmail("Anez.A ","anez@xxx.com","Test",0); // Set 0 to send in text format, 1 to html
 	$mail->to("somebody@domain.net");
	$mail->cc("somebody@domain.net"); 
	$mail->bcc("somebody@domain.net");
	$mail->attachment("text.zip"); 
	$mail->setBody($body); 
	$mail->send(); 

*/
class clsEmail
{
    var $to = array();
    var $cc = array();
    var $bcc = array();
    var $attachment = array();
    var $boundary = "";
    var $header = "";
    var $subject = "";
    var $body = "";
	var $html = 0;
	var $maxWords = 150;
	var $fromEmail ;
	var $fromName ;
	var $replyTo ;	
	
	var $CRLF ;
	
	var $isSMTPMail ; 
	var $SMTPServer; 
	var $SMTPPort ; 
	var $timeout; 
	var $SMTPUserName ; 
	var $SMTPPassword ; 
	var $localhost ; 
	
	var $error ; 

#constructor function
    function clsEmail($FromName,$FromEmail,$subject,$htmlFormat='0')
	{
		$this->boundary = md5(uniqid(time()));
        $this->header = "From: $FromName <$FromEmail>".$this->CRLF;
	   	$this->fromName = $FromName;
	   	$this->fromEmail = $FromEmail;
		$this->subject = $subject;
		if($htmlFormat == 1)
		{
			$this->html = 1;				
		}
		else 
		{
			$this->html = 0;
		}
		$this->replyTo = "$FromEmail";
		$this->isSMTPMail = constant('_IS_SMTP') ;
		$this->CRLF = "\r\n" ;
		$this->SMTPServer = constant('_SMTP_SERVER'); 
		$this->SMTPPort = "25"; 
		$this->timeout = "60"; 
		$this->SMTPUserName = constant('_SMTP_USER_NAME'); 
		$this->SMTPPassword = constant('_SMTP_USER_PASSWORD'); 
		$this->localhost = constant('_LOCAL_HOST'); 
		
		$this->error = array();
	}

#function to	
    function to($mail)
    {
    	if(is_array($mail))
		{
			
			$this->to=$mail;

		}
		else
			$this->to[] = $mail;
    }

#function cc	
    function cc($mail) {
    	$this->cc[] = $mail;
    }

#function bcc	
    function bcc($mail) {
    	$this->bcc[] = $mail;
    }

#function attachment	
    function attachment($file) {
		$this->attachment[] = $file;
    }

#function to	
    function setReplyTo($mail)
    {
    	$this->replyTo = $mail;
    }

#function setBody		
	function setBody($body,$convert2Text='0') {
		$this->body = $body;
		
		if($convert2Text == 1) {
			$this->body = @$this->html2text($this->body) ;
		}
	}	
	
#function send			
	function send() {
	    # CC 
        $max = count($this->cc);
        if($max>0)
        {
           
			for($i=0;$i<$max;$i++) {
				$this->to[] = $this->cc[$i];
			}
			 /*
			$cc = join($this->cc,',') ;
			$this->header.= $this->CRLF."Cc: $cc".$this->CRLF;
			*/
        }
        # BCC 
        $max = count($this->bcc);
        if($max>0)
        {
           
			for($i=0;$i<$max;$i++) {
				$this->to[] = $this->bcc[$i];
			}
			 /*
			$bcc = join($this->bcc,',') ;
			$this->header.= $this->CRLF."Bcc: $bcc".$this->CRLF;
			*/
        }
		
		if($this->replyTo != "")
			$this->header.= $this->CRLF."Reply-to: $this->replyTo".$this->CRLF ;		

		if($this->html == 1) {
            $this->header.= "MIME-Version: 1.0".$this->CRLF;
            $this->header.= "Content-type: text/html; charset=iso-8859-1".$this->CRLF;
		}
		
        # Attachment 
        $max = count($this->attachment);
        if($max>0)
        {
            for($i=0;$i<$max;$i++)
            {
                $file = fread(fopen($this->attachment[$i], "r"), filesize($this->attachment[$i]));
                $this->header .= "--".$this->boundary.$this->CRLF;
                $this->header .= "Content-Type: application/x-zip-compressed; name=".$this->attachment[$i].$this->CRLF;
                $this->header .= "Content-Transfer-Encoding: base64".$this->CRLF;
                $this->header .= "Content-Disposition: attachment; filename=".$this->attachment[$i].$this->CRLF.$this->CRLF;
                $this->header .= chunk_split(base64_encode($file)).$this->CRLF;
                $file = "";
            }
        }

        foreach($this->to as $mail)
        {
			if($this->isSMTPMail) {
				
				$status = $this->sendSMTPMail($this->fromName,$this->fromEmail,$mail,$this->subject,$this->body);
		}
			else {
				$status = mail($mail,$this->subject,$this->body,$this->header);
			}
        }
		unset($this->to);  # clear the array
		
		return $status;
		
    }

#function sendSMTPMail	
	function sendSMTPMail($fromName,$fromEmail,$to,$subject,$message) { 
	 
		//Connect to the host on the specified port 
		echo "server : ".$this->SMTPServer;
		echo "port :".$this->SMTPPort;
		
		$smtpConnect = fsockopen($this->SMTPServer, $this->SMTPPort,$errno, $errstr, $this->timeout); 
		
		$smtpResponse = fgets($smtpConnect, 515); 
		if(empty($smtpConnect)) { 
			echo "no connection............";
			$error = "Failed to connect: $smtpResponse"; 
			$this->getMessage($error); 
			$this->error[] = $error;
			die();
		} 
		else { 
			$logArray['connection'] = "Connected: $smtpResponse"; 
		} 
		
		//Request Auth Login 
		fputs($smtpConnect,"AUTH LOGIN".$this->CRLF); 
		$smtpResponse = fgets($smtpConnect, 515);		 
		$code = substr($smtpResponse,0,3);
		if($code != 334) {
            $error = "AUTH not accepted from server<br><b>SMTP Code:</b> $code<br><b>SMTP Message:</b> ".substr($smtpResponse,4) ;
			$this->getMessage($error); 
			$this->error[] = $error;
			die();	
        }
		$logArray['authrequest'] = "$smtpResponse";
		
		//Send username 
		fputs($smtpConnect, base64_encode($this->SMTPUserName) . $this->CRLF); 
		$smtpResponse = fgets($smtpConnect, 515); 
		$code = substr($smtpResponse,0,3);
		if($code != 334) {
            $error = "Username not accepted from server<br><b>SMTP Code:</b> $code<br><b>SMTP Message:</b> ".substr($smtpResponse,4) ;
			$this->getMessage($error); 
			$this->error[] = $error;
			die();	
        }
		$logArray['authusername'] = "$smtpResponse"; 
		
		//Send password 
		fputs($smtpConnect, base64_encode($this->SMTPPassword) . $this->CRLF); 
		$smtpResponse = fgets($smtpConnect, 515); 
		$code = substr($smtpResponse,0,3);
		if($code != 235) {
            $error = "Password not accepted from server<br><b>SMTP Code:</b> $code<br><b>SMTP Message:</b> ".substr($smtpResponse,4) ;
			$this->getMessage($error); 
			$this->error[] = $error;
			die();	
        }
		$logArray['authpassword'] = "$smtpResponse"; 
		
		//Say Hello to SMTP 
		fputs($smtpConnect, "HELO $this->localhost" . $this->CRLF); 
		$smtpResponse = fgets($smtpConnect, 515); 
		$code = substr($smtpResponse,0,3);
		if($code != 250) {
            $error = "HELO command not accepted from server<br><b>SMTP Code:</b> $code<br><b>SMTP Message:</b> ".substr($smtpResponse,4) ;
			$this->getMessage($error); 
			$this->error[] = $error;
			die();	
        }
		$logArray['heloresponse'] = "$smtpResponse"; 
		
		//Email From 
		fputs($smtpConnect, "MAIL FROM: $fromEmail" . $this->CRLF); 
		$smtpResponse = fgets($smtpConnect, 515); 
		$code = substr($smtpResponse,0,3);
		if($code != 250) {
            $error = "MAIL not accepted from serve<br><b>SMTP Code:</b> $code<br><b>SMTP Message:</b> ".substr($smtpResponse,4) ;
			$this->getMessage($error); 
			$this->error[] = $error;
			die();	
        }
		$logArray['mailfromresponse'] = "$smtpResponse"; 
		 
		//Email To 
		fputs($smtpConnect, "RCPT TO: $to" . $this->CRLF); 
		$smtpResponse = fgets($smtpConnect, 515); 
		$code = substr($smtpResponse,0,3);
		if($code != 250 && $code != 251) {
            $error = "RCPT not accepted from server<br><b>SMTP Code:</b> $code<br><b>SMTP Message:</b> ".substr($smtpResponse,4) ;
			$this->getMessage($error); 
			$this->error[] = $error;
			die();	
        }
		$logArray['mailtoresponse'] = "$smtpResponse"; 
		
		//The Email 
		fputs($smtpConnect, "DATA".$this->CRLF); 
		$smtpResponse = fgets($smtpConnect, 515); 
		$code = substr($smtpResponse,0,3);
		if($code != 354) {
            $error = "DATA command not accepted from server<br><b>SMTP Code:</b> $code<br><b>SMTP Message:</b> ".substr($smtpResponse,4) ;
			$this->getMessage($error); 
			$this->error[] = $error;
			die();	
        }
		$logArray['data1response'] = "$smtpResponse"; 
	
		fputs($smtpConnect, "To: $to".$this->CRLF);
		fputs($smtpConnect, "Subject: $subject".$this->CRLF);
		fputs($smtpConnect, "$this->header".$this->CRLF);
		
		$message = str_replace("\r\n","\n",$message);
        $message = str_replace("\r","\n",$message);
        $lines = explode("\n",$message);

        $field = substr($lines[0],0,strpos($lines[0],":"));
        $in_headers = false;
        if(!empty($field) && !strstr($field," ")) {
            $in_headers = true;
        }
        $max_line_length = 998; # used below; set here for ease in change
        while(list(,$line) = @each($lines)) {
            $lines_out = null;
            if($line == "" && $in_headers) {
                $in_headers = false;
            }
            while(strlen($line) > $max_line_length) {
                $pos = strrpos(substr($line,0,$max_line_length)," ");
                if(!$pos) {
                    $pos = $max_line_length - 1;
                }
                $lines_out[] = substr($line,0,$pos);
                $line = substr($line,$pos + 1);
                if($in_headers) {
                    $line = "\t" . $line;
                }
            }
            $lines_out[] = $line;

            while(list(,$line_out) = @each($lines_out)) {
                if(strlen($line_out) > 0) {
                    if(substr($line_out, 0, 1) == ".") {
                        $line_out = "." . $line_out;
                    }
                }
                fputs($smtpConnect,$line_out . $this->CRLF);
            }
        }
        fputs($smtpConnect, $this->CRLF . "." . $this->CRLF);
		$smtpResponse = fgets($smtpConnect, 515);
		$logArray['data1response'] = "$smtpResponse"; 
		
		// Say Bye to SMTP 
		fputs($smtpConnect,"QUIT" . $this->CRLF);  
		$smtpResponse = fgets($smtpConnect, 515); 
		$logArray['quitresponse'] = "$smtpResponse";     
		//print_r($logArray);
		
		return 1;  
	} 

#function to convert html format into text format
	function html2text( $badStr ) {
		#remove PHP if it exists
		while( substr_count( $badStr, '<'.'?' ) && substr_count( $badStr, '?'.'>' ) && strpos( $badStr, '?'.'>', strpos( $badStr, '<'.'?' ) ) > strpos( $badStr, '<'.'?' ) ) {
			$badStr = substr( $badStr, 0, strpos( $badStr, '<'.'?' ) ) . substr( $badStr, strpos( $badStr, '?'.'>', strpos( $badStr, '<'.'?' ) ) + 2 ); }
		#remove comments
		while( substr_count( $badStr, '<!--' ) && substr_count( $badStr, '-->' ) && strpos( $badStr, '-->', strpos( $badStr, '<!--' ) ) > strpos( $badStr, '<!--' ) ) {
			$badStr = substr( $badStr, 0, strpos( $badStr, '<!--' ) ) . substr( $badStr, strpos( $badStr, '-->', strpos( $badStr, '<!--' ) ) + 3 ); }
		#now make sure all HTML tags are correctly written (> not in between quotes)
		
		for( $x = 0, $goodStr = '', $is_open_tb = false, $is_open_sq = false, $is_open_dq = false; strlen($chr = $badStr{$x}); $x++ ) {
			#take each letter in turn and check if that character is permitted there
			switch( $chr ) {
				case '<':
					if( !$is_open_tb && strtolower( substr( $badStr, $x + 1, 5 ) ) == 'style' ) {
						$badStr = substr( $badStr, 0, $x ) . substr( $badStr, strpos( strtolower( $badStr ), '</style>', $x ) + 7 ); $chr = '';
					} elseif( !$is_open_tb && strtolower( substr( $badStr, $x + 1, 6 ) ) == 'script' ) {
						$badStr = substr( $badStr, 0, $x ) . substr( $badStr, strpos( strtolower( $badStr ), '</script>', $x ) + 8 ); $chr = '';
					} elseif( !$is_open_tb ) { $is_open_tb = true; } else { $chr = '&lt;'; }
					break;
				case '>':
					if( !$is_open_tb || $is_open_dq || $is_open_sq ) { $chr = '&gt;'; } else { $is_open_tb = false; }
					break;
				case '"':
					if( $is_open_tb && !$is_open_dq && !$is_open_sq ) { $is_open_dq = true; }
					elseif( $is_open_tb && $is_open_dq && !$is_open_sq ) { $is_open_dq = false; }
					else { $chr = '&quot;'; }
					break;
				case "'":
					if( $is_open_tb && !$is_open_dq && !$is_open_sq ) { $is_open_sq = true; }
					elseif( $is_open_tb && !$is_open_dq && $is_open_sq ) { $is_open_sq = false; }
			} 
			$goodStr .= $chr;
		}
		#now that the page is valid (I hope) for strip_tags, strip all unwanted tags
		$goodStr = strip_tags( $goodStr, '<title><hr><h1><h2><h3><h4><h5><h6><div><p><pre><sup><ul><ol><br><dl><dt><table><caption><tr><li><dd><th><td><a><area><img><form><input><textarea><button><select><option>' );
		#strip extra whitespace except between <pre> and <textarea> tags
		$badStr = preg_split( "/<\/?pre[^>]*>/i", $goodStr );
		for( $x = 0; is_string( $badStr[$x] ); $x++ ) {
			if( $x % 2 ) { $badStr[$x] = '<pre>'.$badStr[$x].'</pre>'; } else {
				$goodStr = preg_split( "/<\/?textarea[^>]*>/i", $badStr[$x] );
				for( $z = 0; is_string( $goodStr[$z] ); $z++ ) {
					if( $z % 2 ) { $goodStr[$z] = '<textarea>'.$goodStr[$z].'</textarea>'; } else {
						$goodStr[$z] = preg_replace( "/\s+/", ' ', $goodStr[$z] );
				} }
				$badStr[$x] = implode('',$goodStr);
		} }
		$goodStr = implode('',$badStr);
		#remove all options from select inputs
		$goodStr = preg_replace( "/<option[^>]*>[^<]*/i", '', $goodStr );
		#replace all tags with their text equivalents
		$goodStr = preg_replace( "/<(\/title|hr)[^>]*>/i", "\n          --------------------\n", $goodStr );
		$goodStr = preg_replace( "/<(h|div|p)[^>]*>/i", "\n\n", $goodStr );
		$goodStr = preg_replace( "/<sup[^>]*>/i", '^', $goodStr );
		$goodStr = preg_replace( "/<(ul|ol|br|dl|dt|table|caption|\/textarea|tr[^>]*>\s*<(td|th))[^>]*>/i", "\n", $goodStr );
		$goodStr = preg_replace( "/<li[^>]*>/i", "\n ", $goodStr );
		$goodStr = preg_replace( "/<dd[^>]*>/i", "\n\t", $goodStr );
		$goodStr = preg_replace( "/<(th|td)[^>]*>/i", "\t", $goodStr );
		$goodStr = preg_replace( "/<a[^>]* href=(\"((?!\"|#|javascript:)[^\"#]*)(\"|#)|'((?!'|#|javascript:)[^'#]*)('|#)|((?!'|\"|>|#|javascript:)[^#\"'> ]*))[^>]*>/i", "", $goodStr );
		$goodStr = preg_replace( "/<img[^>]* alt=(\"([^\"]+)\"|'([^']+)'|([^\"'> ]+))[^>]*>/i", "[IMAGE: $2$3$4] ", $goodStr );
		$goodStr = preg_replace( "/<form[^>]* action=(\"([^\"]+)\"|'([^']+)'|([^\"'> ]+))[^>]*>/i", "\n", $goodStr );
		$goodStr = preg_replace( "/<(input|textarea|button|select)[^>]*>/i", "", $goodStr );
		
		#strip all remaining tags (mostly closing tags)
		$goodStr = strip_tags( $goodStr );
		#convert HTML entities
		$goodStr = strtr( $goodStr, array_flip( get_html_translation_table( HTML_ENTITIES ) ) );
		preg_replace( "/&#(\d+);/me", "chr('$1')", $goodStr );
		#wordwrap
		$this->html == 1 ? $breakChar ="<br>" : $breakChar = "\n" ;
		
		//$goodStr = wordwrap($goodStr,$this->maxWords,$breakChar,1);
		
		#make sure there are no more than 3 linebreaks in a row and trim whitespace
		return preg_replace( "/^\n*|\n*$/", '', preg_replace( "/[ \t]+(\n|$)/", "$1", preg_replace( "/\n(\s*\n){2}/", "\n\n\n", preg_replace( "/\r\n?|\f/", "\n", str_replace( chr(160), ' ', $goodStr ) ) ) ) );
	}
	
#function getMessage 	
	function getMessage($msg,$head='Mail Error :') {
?>
		<br><table cellpadding="2" cellspacing="0" width="300" border="1" align="center" bordercolor="#FF0000" style="border-collapse:collapse ">
		<tr>
		<td height="10" class="error"  valign="top"  bgcolor="#FFFFFF">
		<b><font color="#000000"><? echo $head?></font></b><br>
		<? echo $msg?>
		</td></tr></table>
		<table width="100%" ><tr><td height="10"></td></tr></table>
<?php	
	}
	
}
?>