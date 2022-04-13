<?php
/*
 * Class clsSendMail - This is used to manage clsSendMail class
 * Language : PHP 5
 * Database : Mysql
 * Modified By : Anez.A
 * Last Modified On : 17-Nov-2008
 */
class clsSendMail 
{
	          
	var $first_name;
	var $last_name;
	var $email_id;
	var $telephone;
	var $gender;
	var $gender1;
	var $gender2;
	var $gender3;
	var $gender4;
	var $gender5;
	var $gender6;
	var $dob;
	var $city;
	var $state;
	var $course;
	var $qualification;
	var $timing;
	var $txt_comments;
	var $address;
	var $captcha_number;
	
	var $requirment;
	var $company;
	var $full_name;
	var $business_mo;
	var $business_mob;
	var $business_mobil;
	var $fax_a;
	var $fax_b;
	var $fax_c;
	var $postcode;
	var $country;
	

	/*
     * constructor for clsSendMail 
     * @param connect and path.
     * @return none.        
     */
	function __construct() 
	{
		$this->first_name = "";
		$this->last_name = "";
		$this->email_id = "";
		$this->telephone = "";
		$this->address = "";
		$this->gender = "";
		$this->gender1 = "";
		$this->gender2 = "";
		$this->gender3 = "";
		$this->gender4 = "";
		$this->gender5 = "";
		$this->gender6 = "";
		$this->dob = "";
		$this->city = "";
		$this->state = "";
		$this->course = "";
		$this->qualification = "";
		$this->timing = "";
		$this->txt_comments = "";
		$this->enquiry = "";
		$this->action="";
		$this->submitted=0;
		$this->captcha_number="";
		
		$this->requirment = "";
		$this->company = "";
		$this->full_name = "";
		$this->business_mo = "";
		$this->business_mob = "";
		$this->business_mobil = "";
		$this->fax_a = "";
		$this->fax_b = "";
		$this->fax_c = "";
		$this->postcode = "";
		$this->country = "";
		
		
	}
	
	/*
     * Function for setting Post Variables 
     * @param none.
     * @return none.        
     */		
	function setPostVars() {
		
		
		if (isset($_POST['first_name']))
			$this->first_name= trim($_POST['first_name']);
					
		if (isset($_POST['last_name']))
			$this->last_name= trim($_POST['last_name']);
		if (isset($_POST['email_id']))
			$this->email_id= trim($_POST['email_id']);
		if (isset($_POST['telephone']))
			$this->telephone= trim($_POST['telephone']);
		if (isset($_POST['gender']))
			$this->gender= trim($_POST['gender']);
		if (isset($_POST['gender1']))
			$this->gender1= trim($_POST['gender1']);
		if (isset($_POST['gender2']))
			$this->gender2= trim($_POST['gender2']);
		if (isset($_POST['gender3']))
			$this->gender3= trim($_POST['gender3']);
		if (isset($_POST['gender4']))
			$this->gender4= trim($_POST['gender4']);
		if (isset($_POST['gender5']))
			$this->gender5= trim($_POST['gender5']);
		if (isset($_POST['gender6']))
			$this->gender6= trim($_POST['gender6']);
		if (isset($_POST['dob']))
			$this->dob= trim($_POST['dob']);
		if (isset($_POST['city']))
			$this->city= trim($_POST['city']);
		if (isset($_POST['state']))
			$this->state= trim($_POST['state']);
		if (isset($_POST['course']))
			$this->course= trim($_POST['course']);
		if (isset($_POST['qualification']))
			$this->qualification= trim($_POST['qualification']);
		if (isset($_POST['timing']))
			$this->timing= trim($_POST['timing']);
		if (isset($_POST['txt_comments']))
			$this->txt_comments= trim($_POST['txt_comments']);
		
		if (isset($_POST['address']))
			$this->address= trim($_POST['address']);
		
		if (isset($_POST['enquiry']))
			$this->enquiry= trim($_POST['enquiry']);
		
				
		if (isset($_FILES['attach_file']['name']))
			$this->attach_file = trim ($_FILES['attach_file']['name']) ;
			
		if (isset($_FILES ['attach_file']))
			$this->attach_file_path = $_FILES['attach_file'] ;
			
		if (isset($_POST['message_body']))
			$this->message_body = trim($_POST['message_body']);	
		
		if (isset($_POST['form_action']))
			$this->action = trim($_POST['form_action']);
		if (isset($_POST['submitted']))
			$this->submitted = trim($_POST['submitted']);		
		if (isset($_POST['captcha_number']))
			$this->captcha_number = trim($_POST['captcha_number']);
			
			if (isset($_POST['requirment']))
			$this->requirment= trim($_POST['requirment']);
			if (isset($_POST['company']))
			$this->company= trim($_POST['company']);
			if (isset($_POST['full_name']))
			$this->full_name= trim($_POST['full_name']);
			if (isset($_POST['business_mo']))
			$this->business_mo= trim($_POST['business_mo']);
			if (isset($_POST['business_mob']))
			$this->business_mob= trim($_POST['business_mob']);
			if (isset($_POST['business_mobil']))
			$this->business_mobil= trim($_POST['business_mobil']);
			if (isset($_POST['fax_a']))
			$this->fax_a= trim($_POST['fax_a']);
			if (isset($_POST['fax_b']))
			$this->fax_b= trim($_POST['fax_b']);
			if (isset($_POST['fax_c']))
			$this->fax_c= trim($_POST['fax_c']);
			if (isset($_POST['postcode']))
			$this->postcode= trim($_POST['postcode']);
			if (isset($_POST['country']))
			$this->country= trim($_POST['country']);
						
	}
	
	/*
     * Function for setting get Variables 
     * @param none.
     * @return none.        
     */	
	function setGetVars() 
	{
	}
	
	/*
     * Function to send mail
     * @param none.
     * @return array.   
     */
	
	function sendMail($action)
	{
		$bcc= constant('_EMAIL_BCC');
		$add = constant('_EMAIL_TO');
		$message_body = $this->setMessageBody($action);
		
		if($action=="CONTACTUS")
		{
			$subject= "Message from MagicLamp[ENQUIRY]";
			$sub=$subject;	
			$clsEmailTmp = new clsEmailTemplate();
			$success = $clsEmailTmp->sendMail($sub,$message_body,$add,$bcc);
		}
		else
		if($action=="POSTENQUIRY")
		{
			$subject= "Message from MagicLamp[POSTENQUIRY FORM]";
			$sub=$subject;	
			$clsEmailTmp = new clsEmailTemplate();
			$success = $clsEmailTmp->sendMail($sub,$message_body,$add,$bcc,$this->attach_file);
		}
			
		if($success)
		{
			$this->message[] = "Mail has been sent.";
			return true;
		}
		else
		{
			return false;
		}
	}
	
	/*
     * Function for setting message body
     * @param none.
     * @return message body.   
     */
	
	function setMessageBody($action)
	{
		$message="";
		switch($action)
		{
			
			case "CONTACTUS" :
								$message = '<html xmlns="http://www.w3.org/1999/xhtml">

									<head>
									<meta content="en-us" http-equiv="Content-Language" />
									<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
									<title>Welcome to MagicLamp</title>
									</head>

									<body>

									<div style=" margin-left:10px;">
									<div style="font-family:Arial, Helvetica, sans-serif; font-weight:bold; font-size:24px; color:#000000; letter-spacing:-1px; padding-left:0px; padding-top:10px; padding-bottom:10px;">
										MagicLamp Email Engine
									</div>
									<div style="font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#333333; font-weight:bold; letter-spacing:-1px; border-bottom-color:#666666; border-bottom-style:solid; border-bottom-width:1px; border-left-color:#666666; border-left-style:solid; border-left-width:1px; border-right-color:#666666; border-right-style:solid; border-right-width:1px; border-top-color:#666666; border-top-style:solid; border-top-width:1px; width:800px; height:70px;">
										<div style="float:left; padding-left:20px; padding-top:25px;">Message From:&nbsp '.$this->first_name.'</div>
										<div style="float:right; padding-right:20px; padding-top:25px;">sub: General comments</div>
										<div style=" clear:both;"></div> 
									</div>

									<div style="font-family:Arial, Helvetica, sans-serif; color:#333333; font-weight:bold; font-size:12px; border-bottom-color:#666666; border-bottom-style:solid; border-bottom-width:1px; border-left-color:#666666; border-left-style:solid; border-left-width:1px; border-right-color:#666666; border-right-style:solid; border-right-width:1px; border-top-color:#666666; border-top-style:solid; border-top-width:1px; width:800px; height:auto; margin-top:10px; padding-top:20px; padding-bottom:10px;">
										<table border="0" cellpadding="0" cellspacing="0" width="100%">
											<tr>
												<td style="font-family:Arial, Helvetica, sans-serif; color:#333333; font-weight:bold; font-size:12px; text-align:right; padding-top:20px;" width="48%">Name</td>
												<td style="font-family:Arial, Helvetica, sans-serif; color:#333333; font-weight:bold; font-size:12px; text-align:center; padding-top:20px;" width="4%">:</td>
												<td style="font-family:Arial, Helvetica, sans-serif; color:#333333; font-weight:bold; font-size:12px; text-align:left; padding-top:20px;" width="48%">'.$this->first_name.'</td>
											</tr>
											<tr>
												<td style="font-family:Arial, Helvetica, sans-serif; color:#333333; font-weight:bold; font-size:12px; text-align:right; padding-top:20px;" width="48%">Company</td>
												<td style="font-family:Arial, Helvetica, sans-serif; color:#333333; font-weight:bold; font-size:12px; text-align:center; padding-top:20px;" width="4%">:</td>
												<td style="font-family:Arial, Helvetica, sans-serif; color:#333333; font-weight:bold; font-size:12px; text-align:left; padding-top:20px;" width="48%">'.$this->company.'</td>
											</tr>
											<tr>
												<td style="font-family:Arial, Helvetica, sans-serif; color:#333333; font-weight:bold; font-size:12px; text-align:right; padding-top:20px;" width="48%">E-mail</td>
												<td style="font-family:Arial, Helvetica, sans-serif; color:#333333; font-weight:bold; font-size:12px; text-align:center; padding-top:20px;" width="4%">:</td>
												<td style="font-family:Arial, Helvetica, sans-serif; color:#333333; font-weight:bold; font-size:12px; text-align:left; padding-top:20px;" width="48%">'.$this->email_id.'</td>
											</tr>
											<tr>
												<td style="font-family:Arial, Helvetica, sans-serif; color:#333333; font-weight:bold; font-size:12px; text-align:right; padding-top:20px;" width="48%">Contact No</td>
												<td style="font-family:Arial, Helvetica, sans-serif; color:#333333; font-weight:bold; font-size:12px; text-align:center; padding-top:20px;" width="4%">:</td>
												<td style="font-family:Arial, Helvetica, sans-serif; color:#333333; font-weight:bold; font-size:12px; text-align:left; padding-top:20px;" width="48%">'.$this->telephone.'</td>
											</tr>
											<tr>
												<td style="font-family:Arial, Helvetica, sans-serif; color:#333333; font-weight:bold; font-size:12px; text-align:right; padding-top:20px;" width="48%">Testing/Development topics</td>
												<td style="font-family:Arial, Helvetica, sans-serif; color:#333333; font-weight:bold; font-size:12px; text-align:center; padding-top:20px;" width="4%">:</td>
												<td style="font-family:Arial, Helvetica, sans-serif; color:#333333; font-weight:bold; font-size:12px; text-align:left; padding-top:20px;" width="48%">'.$this->gender.'</td>
											</tr>
											<tr>
												<td style="font-family:Arial, Helvetica, sans-serif; color:#333333; font-weight:bold; font-size:12px; text-align:right; padding-top:20px;" width="48%">Comments</td>
												<td style="font-family:Arial, Helvetica, sans-serif; color:#333333; font-weight:bold; font-size:12px; text-align:center; padding-top:20px;" width="4%">:</td>
												<td style="font-family:Arial, Helvetica, sans-serif; color:#333333; font-weight:bold; font-size:12px; text-align:left; padding-top:20px;" width="48%">'.$this->requirment.'</td>
											</tr>
											<tr>
												<td style="font-family:Arial, Helvetica, sans-serif; color:#333333; font-weight:bold; font-size:12px; text-align:right; padding-top:20px;" width="48%">Types of Testing carried out in your organization</td>
												<td style="font-family:Arial, Helvetica, sans-serif; color:#333333; font-weight:bold; font-size:12px; text-align:center; padding-top:20px;" width="4%">:</td>
												<td style="font-family:Arial, Helvetica, sans-serif; color:#333333; font-weight:bold; font-size:12px; text-align:left; padding-top:20px;" width="48%">'.$this->gender1.'</td>
											</tr>
											<tr>
												<td style="font-family:Arial, Helvetica, sans-serif; color:#333333; font-weight:bold; font-size:12px; text-align:right; padding-top:20px;" width="48%">Automation tools used in Testing</td>
												<td style="font-family:Arial, Helvetica, sans-serif; color:#333333; font-weight:bold; font-size:12px; text-align:center; padding-top:20px;" width="4%">:</td>
												<td style="font-family:Arial, Helvetica, sans-serif; color:#333333; font-weight:bold; font-size:12px; text-align:left; padding-top:20px;" width="48%">'.$this->gender2.'</td>
											</tr>
											<tr>
												<td style="font-family:Arial, Helvetica, sans-serif; color:#333333; font-weight:bold; font-size:12px; text-align:right; padding-top:20px;" width="48%">Technologies used in Applications development</td>
												<td style="font-family:Arial, Helvetica, sans-serif; color:#333333; font-weight:bold; font-size:12px; text-align:center; padding-top:20px;" width="4%">:</td>
												<td style="font-family:Arial, Helvetica, sans-serif; color:#333333; font-weight:bold; font-size:12px; text-align:left; padding-top:20px;" width="48%">'.$this->gender3.'</td>
											</tr>
											<tr>
												<td style="font-family:Arial, Helvetica, sans-serif; color:#333333; font-weight:bold; font-size:12px; text-align:right; padding-top:20px;" width="48%">Are you evaluating any testing products for your upcoming QA projects?</td>
												<td style="font-family:Arial, Helvetica, sans-serif; color:#333333; font-weight:bold; font-size:12px; text-align:center; padding-top:20px;" width="4%">:</td>
												<td style="font-family:Arial, Helvetica, sans-serif; color:#333333; font-weight:bold; font-size:12px; text-align:left; padding-top:20px;" width="48%">'.$this->gender4.'</td>
											</tr>
											<tr>
												<td style="font-family:Arial, Helvetica, sans-serif; color:#333333; font-weight:bold; font-size:12px; text-align:right; padding-top:20px;" width="48%">Are you planning to procure any Testing tools in the near future?</td>
												<td style="font-family:Arial, Helvetica, sans-serif; color:#333333; font-weight:bold; font-size:12px; text-align:center; padding-top:20px;" width="4%">:</td>
												<td style="font-family:Arial, Helvetica, sans-serif; color:#333333; font-weight:bold; font-size:12px; text-align:left; padding-top:20px;" width="48%">'.$this->gender5.'</td>
											</tr>
											<tr>
												<td style="font-family:Arial, Helvetica, sans-serif; color:#333333; font-weight:bold; font-size:12px; text-align:right; padding-top:20px;" width="48%">like our Sales/Support team to call on you/send mail about our products and services?</td>
												<td style="font-family:Arial, Helvetica, sans-serif; color:#333333; font-weight:bold; font-size:12px; text-align:center; padding-top:20px;" width="4%">:</td>
												<td style="font-family:Arial, Helvetica, sans-serif; color:#333333; font-weight:bold; font-size:12px; text-align:left; padding-top:20px;" width="48%">'.$this->fax_a.'</td>
											</tr>
											<tr>
												<td style="font-family:Arial, Helvetica, sans-serif; color:#333333; font-weight:bold; font-size:12px; text-align:right; padding-top:20px;" width="48%">interested in a demo/presentation on our Magic Lamp static analysis tool?</td>
												<td style="font-family:Arial, Helvetica, sans-serif; color:#333333; font-weight:bold; font-size:12px; text-align:center; padding-top:20px;" width="4%">:</td>
												<td style="font-family:Arial, Helvetica, sans-serif; color:#333333; font-weight:bold; font-size:12px; text-align:left; padding-top:20px;" width="48%">'.$this->fax_b.'</td>
											</tr>
										</table>
									</div>
								</div>
										

									</body>

									</html>';
								break;
			case "POSTENQUIRY":
								$message = '<html xmlns="http://www.w3.org/1999/xhtml">

									<head>
									<meta content="en-us" http-equiv="Content-Language" />
									<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
									<title>Welcome MagicLamp</title>
									</head>

									<body>

									<div style=" margin-left:10px;">
									<div style="font-family:Arial, Helvetica, sans-serif; font-weight:bold; font-size:24px; color:#000000; letter-spacing:-1px; padding-left:0px; padding-top:10px; padding-bottom:10px;">
										MagicLamp
									</div>
									<div style="font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#333333; font-weight:bold; letter-spacing:-1px; border-bottom-color:#666666; border-bottom-style:solid; border-bottom-width:1px; border-left-color:#666666; border-left-style:solid; border-left-width:1px; border-right-color:#666666; border-right-style:solid; border-right-width:1px; border-top-color:#666666; border-top-style:solid; border-top-width:1px; width:800px; height:70px;">
										<div style="float:left; padding-left:20px; padding-top:25px;">Message From:&nbsp '.$this->full_name.'</div>
										<div style="float:right; padding-right:20px; padding-top:25px;">sub: Enquiry</div>
										<div style=" clear:both;"></div> 
									</div>

									<div style="font-family:Arial, Helvetica, sans-serif; color:#333333; font-weight:bold; font-size:12px; border-bottom-color:#666666; border-bottom-style:solid; border-bottom-width:1px; border-left-color:#666666; border-left-style:solid; border-left-width:1px; border-right-color:#666666; border-right-style:solid; border-right-width:1px; border-top-color:#666666; border-top-style:solid; border-top-width:1px; width:800px; height:auto; margin-top:10px; padding-top:20px; padding-bottom:10px;">
										<div style="float:left; padding-left:0px; width:200px; height:20px; padding-bottom:10px; margin-left:100px; text-align:right; ">requirments &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</div>
										<div style="float:right; padding-left:0px; width:400px; height:20px; padding-bottom:10px; margin-right:50px; font-weight:normal;">'.$this->requirment.'</div>
										<div style="clear:both;"></div>
										<div style="float:left; padding-left:0px; width:200px; height:10px; padding-bottom:0px; text-align:right; margin-left:100px;">Company Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</div>										
										<div style="float:right; padding-left:0px; width:400px; height:20px; padding-bottom:10px;  margin-right:50px; font-weight:normal;">'.$this->company.'</div>
										<div style="clear:both;"></div>
										<div style="float:left; padding-left:0px; width:200px; height:10px; padding-bottom:0px; text-align:right; margin-left:100px;">Address&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</div>										
										<div style="float:right; padding-left:0px; width:400px; height:20px; padding-bottom:10px; margin-right:50px; font-weight:normal;">'.$this->address.'</div>
										<div style="clear:both;"></div>
										<div style="float:left; padding-left:0px; width:200px; height:10px; padding-bottom:0px; text-align:right; margin-left:100px;">Full Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</div>
										<div style="float:right; padding-left:0px; width:400px; height:20px; padding-bottom:10px; margin-right:50px; font-weight:normal;">'.$this->full_name.'</div>
										<div style="clear:both;"></div>
										<div style="float:left; padding-left:0px; width:200px; height:10px; padding-bottom:0px; text-align:right; margin-left:100px;">City/State&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</div>
										<div style="float:right; padding-left:0px; width:400px; height:20px; padding-bottom:10px; margin-right:50px; font-weight:normal;">'.$this->city.'</div>
										<div style="clear:both;"></div>
										<div style="float:left; padding-left:0px; width:200px; height:10px; padding-bottom:0px; text-align:right; margin-left:100px;">business E-mail&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</div>
										<div style="float:right; padding-left:0px; width:400px; height:20px; padding-bottom:10px; margin-right:50px; font-weight:normal;">'.$this->email_id.'</div>
										<div style="clear:both;"></div>
										<div style="float:left; padding-left:0px; width:200px; height:10px; padding-bottom:0px; text-align:right; margin-left:100px;">Zip/Postal Code&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</div>
										<div style="float:right; padding-left:0px; width:400px; height:20px; padding-bottom:10px; margin-right:50px; font-weight:normal;">'.$this->postcode.'</div>
										<div style="clear:both;"></div>
										<div style="float:left; padding-left:0px; width:200px; height:10px; padding-bottom:0px; text-align:right; margin-left:100px;">Business Phone/Mobile&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</div>
										<div style="float:right; padding-left:0px; width:400px; height:20px; padding-bottom:10px; margin-right:50px; font-weight:normal;">'.$this->business_mo.'</div>
										<div style="clear:both;"></div>
										<div style="float:left; padding-left:0px; width:200px; height:10px; padding-bottom:0px; text-align:right; margin-left:100px;">country&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</div>
										<div style="float:right; padding-left:0px; width:400px; height:20px; padding-bottom:10px; margin-right:50px; font-weight:normal;">'.$this->country.'</div>
										<div style="clear:both;"></div>
										<div style="float:left; padding-left:0px; width:200px; height:10px; padding-bottom:0px; text-align:right; margin-left:100px;">Business Fax&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</div>
										<div style="float:right; padding-left:0px; width:400px; height:20px; padding-bottom:10px; margin-right:50px; font-weight:normal;">'.$this->fax_a.'</div>
										<div style="clear:both;"></div>
									</div>
								</div>
										
									</body>
									</html>';

								break;
		default: $message=" Mail has sent ";
				break;
		}
		return $message;
	}

	
}	

?>