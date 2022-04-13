<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to Magic Lamp</title>
<link rel="stylesheet" href="css/css.css" type="text/css" />
<link rel="stylesheet" href="fonts/stylesheet.css" type="text/css" />
<!--VALIDATION START-->
<script type="text/javascript">
/**
 * DHTML phone number validation script. 
 */

// Declaring required variables
var digits = "0123456789";
// non-digit characters which are allowed in phone numbers
var phoneNumberDelimiters = "()- ";
// characters which are allowed in international phone numbers
// (a leading + is OK)
var validWorldPhoneChars = phoneNumberDelimiters + "+";
// Minimum no of digits in an international phone no.
var minDigitsInIPhoneNumber = 7;
var minDigitsInIage = 1;

function isInteger(s)
{   var i;
    for (i = 0; i < s.length; i++)
    {   
        // Check that current character is number.
        var c = s.charAt(i);
        if (((c < "0") || (c > "9"))) return false;
    }
    // All characters are numbers.
    return true;
}
function trim(s)
{   var i;
    var returnString = "";
    // Search through string's characters one by one.
    // If character is not a whitespace, append to returnString.
    for (i = 0; i < s.length; i++)
    {   
        // Check that current character isn't whitespace.
        var c = s.charAt(i);
        if (c != " ") returnString += c;
    }
    return returnString;
}
function stripCharsInBag(s, bag)
{   var i;
    var returnString = "";
    // Search through string's characters one by one.
    // If character is not in bag, append to returnString.
    for (i = 0; i < s.length; i++)
    {   
        // Check that current character isn't whitespace.
        var c = s.charAt(i);
        if (bag.indexOf(c) == -1) returnString += c;
    }
    return returnString;
}

function checkInternationalPhone(strPhone){
var bracket=3
strPhone=trim(strPhone)
if(strPhone.indexOf("+")>1) return false
if(strPhone.indexOf("-")!=-1)bracket=bracket+1
if(strPhone.indexOf("(")!=-1 && strPhone.indexOf("(")>bracket)return false
var brchr=strPhone.indexOf("(")
if(strPhone.indexOf("(")!=-1 && strPhone.charAt(brchr+2)!=")")return false
if(strPhone.indexOf("(")==-1 && strPhone.indexOf(")")!=-1)return false
s=stripCharsInBag(strPhone,validWorldPhoneChars);
return (isInteger(s) && s.length >= minDigitsInIPhoneNumber);
}
function checkage(strPhone){
var bracket=3
strPhone=trim(strPhone)
if(strPhone.indexOf("+")>1) return false
if(strPhone.indexOf("-")!=-1)bracket=bracket+1
if(strPhone.indexOf("(")!=-1 && strPhone.indexOf("(")>bracket)return false
var brchr=strPhone.indexOf("(")
if(strPhone.indexOf("(")!=-1 && strPhone.charAt(brchr+2)!=")")return false
if(strPhone.indexOf("(")==-1 && strPhone.indexOf(")")!=-1)return false
s=stripCharsInBag(strPhone,validWorldPhoneChars);
return (isInteger(s) && s.length >= minDigitsInIage);
}

function checkData()
{
	var frm = document.frmsMail;
	
	if(trim(frm.first_name.value)=="")
	{
		alert("Please enter your name.");
		frm.first_name.focus();
		return;
	}
	if(trim(frm.company.value)=="")
	{
		alert("Please enter your company.");
		frm.company.focus();
		return;
	}
	if(trim(frm.email_id.value)=="")
	{
		alert("Please enter your e-mail ID.");
		frm.email_id.focus();
		return;
	}
	var err = checkEmail(trim(frm.email_id.value));	
	if (err != "") 
	{	
		alert(err);
		frm.email_id.select();
		return;	
	}
	if ((frm.telephone.value==null)||(frm.telephone.value==""))
				{
					alert("Please enter your phone number.");
					frm.telephone.focus();
					return;
				}
			if (checkInternationalPhone(frm.telephone.value)==false)
				{
					alert("Please enter a valid phone number.");
								
					frm.telephone.select();
					return;
				}
	
	if(trim(frm.gender.value)=="")
	{
		alert("Please enter testing/development topics.");
		frm.gender.focus();
		return;
	}
	if(trim(frm.requirment.value)=="")
	{
		alert("Please describe your requirement.");
		frm.requirment.focus();
		return;
	}
	if(trim(frm.gender1.value)=="Select Types of Testing")
	{
		alert("Please select the type of testing carried out in your organization.");
		frm.gender1.focus();
		return;
	}
	if(trim(frm.gender2.value)=="Select Automation tools")
	{
		alert("Please select automation tools used in testing.");
		frm.gender2.focus();
		return;
	}
	if(trim(frm.gender3.value)=="Select Technologies")
	{
		alert("Please select technologies used in application development.");
		frm.gender3.focus();
		return;
	}
	if(trim(frm.gender4.value)=="Select testing products being considered for evaluation")
	{
		alert("Please select testing products for your upcoming QA projects.");
		frm.gender4.focus();
		return;
	}
	if(trim(frm.gender5.value)=="Procurement Plan")
	{
		alert("Please select Procurement Plan.");
		frm.gender5.focus();
		return;
	}
	
	
	frm.submitted.value=1;
	frm.form_action.value="CONTACTUS";
	frm.action="enquiry.php";
	frm.submit();
}
function trim(TXT)
{
	if(TXT!="")
	return TXT.replace(/(^\s+)|(\s+$)/g,"");
	else
		return "";
}
function limitText(field,maxlimit,remark) {
	if (field.value.length > maxlimit) {
		field.value = field.value.substring(0, maxlimit);
	}
	else {
		if(remark) {
			remark.value = maxlimit - field.value.length;
		}
	}	
}
function checkEmail(strng)
{
	
	var error = "";
	var emailFilter=/^.+@.+\..{2,4}$/;
	if (strng == "") 
		{
		error = "You didn't enter an email ID.\n";
		}
	
	else if (!(emailFilter.test(strng))) 
		{ 
		error = "Please enter a valid email ID.\n";
		}
	var illegalChars= /[\(\)\<\>\,\;\:\\\/\"\[\]]/;
	if (strng.match(illegalChars))
		{
		error = "The email ID contains illegal characters.\n";
		}
	return error;
}
</script>
<!--VALIDATION END-->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-34241276-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</head>

<body>
	<div class="body_repet">
		<div class="main_div">
			<div class="logo"><a href="index.html"><img src="images/logo.jpg" width="181" height="49" alt="" /></a></div>
			<div class="top_menu_div">
				<div class="top_menu_txt"><a href="enquiry.php">Enquiry</a></div>
				<div class="top_menu_spliter"></div>
				<div class="top_menu_txt"><a href="contact_us.html">Contact</a></div>
				<div class="top_menu_spliter"></div>
				<div class="top_menu_txt"><a href="site_map.html">Sitemap</a></div>
					<div class="clear"></div>
			</div>
				<div class="clear"></div>
			<div class="menu_left"></div>
			<div class="menu_bg_rep">
				<div class="menu_div">
					<div class="mainmenu"></div>
					<div class="menu_txt"><a href="index.html">Home</a></div>
					<div class="mainmenu_right"></div>
					<div class="menu_spliter"></div>
					
					<div class="mainmenu"></div>
					<div class="menu_txt"><a href="overview.html">Overview</a></div>
					<div class="mainmenu_right"></div>
					<div class="menu_spliter"></div>
					
					<div class="mainmenu"></div>
					<div class="menu_txt"><a href="solution.html">Solution</a></div>
					<div class="mainmenu_right"></div>
					<div class="menu_spliter"></div>
					
					<div class="mainmenu"></div>
					<div class="menu_txt"><a href="benefits.html">Benefits</a></div>
					<div class="mainmenu_right"></div>
					<div class="menu_spliter"></div>
					
					<div class="mainmenu"></div>
					<div class="menu_txt"><a href="resources.html">Resources</a></div>
					<div class="mainmenu_right"></div>
						<div class="clear"></div>
				</div>
			</div>
			<div class="menu_right"></div>
				<div class="clear"></div>
			<div class="inner_banner"><a href="why_magic_lamp.html"><img src="images/inner_banner.jpg" width="896" height="237" alt="" /></a></div>
				<div class="clear"></div>
			<table border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td valign="top">
						<div class="body_left_div">
							<div class="innertop_space">&nbsp;</div>
							<div class="body_head">ENQUIRY</div>
							<div class="body_txt">
								<form action="enquiry.php" name="frmsMail" method="post" autocomplete="off">
									<input type="hidden" name="submitted" value="0" />
									<input type="hidden" name="form_action" value="0" />
									<? 
													
										if($success=="sent")
											{
									?>
									<script type="text/javascript">
									var frm= document.frmsMail;
									frm.submitted.value=2;
									frm.action="enquiry.php";
									frm.submit();
									</script>
									<?
											}
												
										if($clsSendMail->submitted==2)
											{
												echo '<div class="out-form_txt">
														<b>Thank you for your enquiry!</b><br /> 
															We will get in touch with you soon.
														 </div>';
												echo '<div class="back_form">
														<A href="enquiry.php">Submit a new enquiry</A>
													</div>';
											}
											else
											{
									 ?>
																	
									 <?
											if($error!="")
												{
									 ?>
											<div><?php getMessage($error); ?></div>
													
									 <?
											$error="";
												}
			
											if($clsSendMail->submitted==1 && $clsSendMail->action=="")
												{
									 ?>
									<script type="text/javascript">
										var frm= document.frmsMail;
										frm.submitted.value=2;
										frm.form_action.value="";
										frm.action="enquiry.php";
										frm.submit();
									</script>
									 <?
										}
									 ?>
									<div class="enquiry_name">Name</div>
									<div class="left"><input type="text" name="first_name" class="enquiry_txt_box" /></div>
										<div class="clear"></div>
									<div class="enquiry_name">Company</div>
									<div class="left"><input type="text" name="company" class="enquiry_txt_box" /></div>
										<div class="clear"></div>
									<div class="enquiry_name">E-mail</div>
									<div class="left"><input type="text" name="email_id" class="enquiry_txt_box" /></div>
										<div class="clear"></div>
									<div class="enquiry_name">Contact No</div>
									<div class="left"><input type="text" name="telephone" class="enquiry_txt_box" /></div>
										<div class="clear"></div>
									<div class="enquiry_name">Testing/Development topics</div>
									<div class="left"><input type="text" name="gender" class="enquiry_txt_box" /></div>
										<div class="clear"></div>
									<div class="enquiry_name">Comments</div>
									<div class="left"><textarea name="requirment" class="enquiry_textarea_box"></textarea></div>
										<div class="clear"></div>
									<div class="enquiry_name">Types of Testing carried out in your organization</div>
									<div class="left">
										<select name="gender1" class="enquiry_select_box">
											<option value="Select Types of Testing">Select Types of Testing</option>
											<option value="Regression">Regression</option>
											<option value="Performance">Performance</option>
											<option value="WhiteBox">WhiteBox</option>
											<option value="Static Analysis">Static Analysis</option>
										</select>
									</div>
										<div class="clear"></div>
									<div class="enquiry_name">Automation tools used in Testing</div>
									<div class="left">
										<select name="gender2" class="enquiry_select_box">
											<option value="Select Automation tools">Select Automation tools</option>
											<option value="QTP">QTP</option>
											<option value="HP-Quality Center">HP-Quality Center</option>
											<option value="Rational Robot">Rational Robot</option>
											<option value="Silk Test">Silk Test</option>
											<option value="Silk Performer">Silk Performer</option>
										</select>
									</div>
										<div class="clear"></div>
									<div class="enquiry_name">Technologies used in Applications development</div>
									<div class="left">
										<select name="gender3" class="enquiry_select_box">
											<option value="Select Technologies">Select Technologies</option>
											<option value="Microsoft">Microsoft</option>
											<option value="Java technologies">Java technologies</option>
										</select>
									</div>
										<div class="clear"></div>
									<div class="enquiry_name">Are you evaluating any testing products for your upcoming QA projects?</div>
									<div class="left">
										<select name="gender4" class="enquiry_select_box">
											<option value="Select Are you evaluating any testing products">Select Are you evaluating any testing products</option>
											<option value="HP">HP</option>
											<option value="IBM">IBM</option>
											<option value="MICROFOCUS">MICROFOCUS</option>
										</select>
									</div>
										<div class="clear"></div>
									<div class="enquiry_name">Are you planning to procure any Testing tools in the near future?</div>
									<div class="left">
										<select name="gender5" class="enquiry_select_box">
											<option value="Select planning to procure any Testing">Select planning to procure any Testing</option>
											<option value="3 months">3 months</option>
											<option value="6 months">6 months</option>
											<option value="12 months">12 months</option>
										</select>
									</div>
										<div class="clear"></div>
									<div class="enquiry_name2">Would you like our Sales/Support team to call on you/send mail about our products and services?</div>
									<div class="enquiry_name3">Yes</div>
									<div class="enquradio"><input type="radio" name="fax_a" value="Yes" checked="checked" /></div>
									<div class="enquiry_name3">No</div>
									<div class="enquradio"><input type="radio" name="fax_a" value="No" /></div>
										<div class="clear"></div>
									<div class="enquiry_name2">Would you be interested in a demo/presentation on our Magic Lamp static analysis tool?</div>
									<div class="enquiry_name3">Yes</div>
									<div class="enquradio"><input type="radio" name="fax_b" value="Yes" checked="checked" /></div>
									<div class="enquiry_name3">No</div>
									<div class="enquradio"><input type="radio" name="fax_b" value="No" /></div>
										<div class="clear"></div>
									<div class="enquir_submi"><a href="javascript:checkData();"><img src="images/submit.jpg" width="85" height="31" alt="" /></a></div>
									<div class="left"><a href="javascript:document.frmsMail.reset();"><img src="images/reset.jpg" width="85" height="31" alt="" /></a></div>
										<div class="clear"></div>
									<?
										}
									?>				
								</form>
								<br /><br />
							</div>
						</div>
						
					</td>
					<td valign="top" class="body_spliter_repe">
						<div class="body_spliter_top"></div>
					</td>
					<td valign="top" width="100%">
						<div class="body_right_div">
							<div class="innertop_space">&nbsp;</div>
							<div class="body_head">BENEFITS</div>
							<div class="benifit_bul"></div>
							<div class="benift_bulltxt">It reduces costs and increases productivity especially for fixed-price/outcome-based projects.</div>
								<div class="clear"></div>
							<div class="benifit_bul"></div>
							<div class="benift_bulltxt">Pro-active error detection leads to less rework, on-time delivery.</div>
								<div class="clear"></div>
							<div class="benifit_bul"></div>
							<div class="benift_bulltxt">Compensate for lack of skills at bottom of skill pyramid.</div>
								<div class="clear"></div>
							<div class="benifit_bul"></div>
							<div class="benift_bulltxt">Reduce attrition impact codifying audit rules.</div>
								<div class="clear"></div>
							<div class="benift_readmor"><a href="benefits.html">Read more...</a></div>
								<div class="clear"></div>
						</div>
							<div class="clear"></div>
						<div class="inner_shadow_right"></div>
						<div class="inner_right">
							<div class="inner_softstimu"><a href="overview.html"><img src="images/soft-ware_inner.png" width="218" height="52" alt="" /></a></div>
								<div class="clear"></div>
						</div>
						<div class="inner_right">
							<div class="inner_softstimu"><a href="solution.html"><img src="images/static-testing_inner.png" width="165" height="52" alt="" /></a></div>
								<div class="clear"></div>
						</div>
						<div class="inner_right">
							<div class="inner_softstimu"><a href="overview.html"><img src="images/value-inner.png" width="132" height="52" alt="" /></a></div>
								<div class="clear"></div>
						</div>
						<div>&nbsp;<br /><br /><br /></div>
					</td>
				</tr>
			</table>
			<!--footer start-->
			<div class="footer_bgrep">
				<div class="footer_left_txt">
					<a href="index.html">Home</a> &nbsp;|&nbsp; <a href="overview.html">Overview</a> &nbsp;|&nbsp; <a href="solution.html">Solution</a> &nbsp;|&nbsp; <a href="benefits.html">Benefits</a> &nbsp;|&nbsp; <a href="resources.html">Resources</a> &nbsp;|&nbsp; <a href="enquiry.php">Enquiry</a> &nbsp;|&nbsp; <a href="contact_us.html">Contact</a><br />
					&copy; 2012-13 Magic Lamp. All rights reserved. 
				</div>
				<div class="footer_right_txt"><a href="http://thecommunicatory.in/" target="_blank">The Communicatory</a></div>
					<div class="clear"></div>
			</div>
			<!--footer end-->
		</div>
	</div>
</body>
</html>
