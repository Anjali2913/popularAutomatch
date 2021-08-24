<?php
session_start();
include('class.dbcon.php');
date_default_timezone_set('Asia/Kolkata');
$con=new Con;
?><script>parent.document.getElementById("submit").disabled = true;</script><?php
$enq_type=$name=$mobile=$email=$location=$brand=$model=$veh_reg_no=$message=$address=$pincode=$km_run=$service_type=$date=$time=$brand_name=$model_name=$Email_InCharge = $cnt_type= '';$ofr_Id=0;

if(isset($_REQUEST['enquiry_on']) && ($_REQUEST['enquiry_on']!='')){
	if(!isset($_POST["name"])){
				 
		echo "<span style='color:red'>Name : Required Field</span>";
		?><script> parent.document.getElementById("name").focus();
        parent.document.getElementById("submit").disabled = false;</script><?php	
	}
	elseif (!preg_match("/^(?:[A-Za-z]+)(?:[A-Za-z ]*)$/",$_POST["name"]))
	{			 
		echo "<span style='color:red'>Name : Only letters and white space allowed</span>";
		?><script> parent.document.getElementById("name").focus();
        parent.document.getElementById("submit").disabled = false;</script><?php
	}
	elseif(!preg_match("/^[6-9][0-9]{9}$/",$_POST['mobile']))
	{
		echo "<span style='color:red'>Phone :Invalid Mobile Number </span>";
		?><script> parent.document.getElementById("mobile").focus();
		parent.document.getElementById("submit").disabled = false;</script><?php	
	}
	elseif(strlen($_POST['mobile'])!=10)
	{
		echo "<span style='color:red'>Phone :Invalid Mobile Number </span>";
		?><script> parent.document.getElementById("mobile").focus();
		parent.document.getElementById("submit").disabled = false;</script><?php	
	}
elseif(($_REQUEST['enquiry_on']=='Service_Booking') && !preg_match("/^[0-9]*$/",test_input($_POST['km_run'])))
	{
		echo"<span style='color:red'>Kilometer Run : Only numbers allowed</span>";
		?><script> parent.document.getElementById("km_run").focus();
        parent.document.getElementById("submit").disabled = false;</script><?php
	}
	elseif(($_REQUEST['enquiry_on']=='Service_Booking') && (strlen(test_input($_POST['pincode'])) < 6))
	{		
		echo"<span style='color:red'>Pincode : Invalid Pincode</span>";
		?><script> parent.document.getElementById("pincode").focus();
        parent.document.getElementById("submit").disabled = false;</script><?php
	}
	elseif(($_REQUEST['enquiry_on']=='Service_Booking') && !preg_match("/^(0[1-9]|[1-2][0-9]|3[0-1])[\/]|[-]|[.](0[1-9]|1[0-2])[\/]|[-]|[.][0-9]{4}$/",$_POST['date'])) 
	{
		echo"<span style='color:red'>Prefered Service Date : Date format should be DD-MM-YYYY</span>";	
			?><script> parent.document.getElementById("date").focus();
            parent.document.getElementById("submit").disabled = false;</script><?php
	}
	elseif(($_REQUEST['enquiry_on']=='Service_Booking') && !Valid_Date($_POST['date']))
	{
		echo"<span style='color:red'>Please Enter a valid Date</span>";	
		?><script> parent.document.getElementById("date").focus();
        parent.document.getElementById("submit").disabled = false;</script><?php				
	}			
	elseif(($_REQUEST['enquiry_on']=='Service_Booking') &&( strtotime(Convert_Date($_POST['date'])) < strtotime(date("d-m-Y"))))
	{
		echo"<span style='color:red'>Prefered Service date must be a future date</span>";
		?><script> parent.document.getElementById("date").focus();
        parent.document.getElementById("submit").disabled = false;</script><?php
	}
	elseif(($_REQUEST['enquiry_on']=='Service_Booking') && (strtotime(Convert_Date($_POST['date']))> strtotime(date('d-m-Y', strtotime("+90 days"))))){
		echo"<span style='color:red'>Sorry, we could not take advance service booking more than 90 days</span>";
		?><script> parent.document.getElementById("date").focus();
        parent.document.getElementById("submit").disabled = false;</script><?php
	}	
	elseif(($_REQUEST['enquiry_on']=='Service_Booking') && !preg_match("/(1[012]|[1-9]):[0-5][0-9](\\s)?(?i)(am|pm)/i",$_POST['time'])){
		echo"<span style='color:red'>Prefered Time : Time format should be HH:MM am|pm</span>";
		?><script> parent.document.getElementById("time").focus();
        parent.document.getElementById("submit").disabled = false;
        </script><?php
	}
	else
	{	
	$name=test_input($_POST['name']);
	$email=test_input($_POST['email']);
	$mobile=test_input($_POST['mobile']);
	$message=test_input($_POST['message']);
	$com = Sanitize($message);
	$message=test_link($com);
	$enq_type = $_REQUEST['enquiry_on'];


		if(isset($_REQUEST['enquiry_on']) && ($_REQUEST['enquiry_on']=='Offer-Scheme')){		
			$location=$_POST['location'];
			$Sql3 ="CALL `SP_Web_Locations`('Loc_Details', '', ?)";
			$Rs = $con->prepare($Sql3);
			$Rs->bindValue(1, $location,PDO::PARAM_INT);
			$Rs->execute();
			$Rs->setFetchMode(PDO::FETCH_ASSOC);										
			$rw3 = $Rs->fetch();
			$branchemail=$rw3['Email'];
			$Email_InCharge =$rw3['Email_InCharge '];
			$displayname=$rw3['Location_DisplayName'];
			$ofr_Id = $_SESSION['Offer_ID'];
			
		}
		elseif(isset($_REQUEST['enquiry_on']) && ($_REQUEST['enquiry_on']=='Contact Us')){
			 $cnt_type=$_POST['cnt_type'];
			if($cnt_type=='Sales'){
				$branchemail='popularautomatch@nanditoyota.com';
				$Email_InCharge ='girish@nanditoyota.com';
			}
			else{
				$branchemail='paservice@nanditoyota.com';
				$Email_InCharge ='prince@nanditoyota.com';
			}
			
			$displayname = 'Popular Automatch';
			
			
		}
		elseif(isset($_REQUEST['enquiry_on']) && ($_REQUEST['enquiry_on']=='Service Booking')){
			$location=$_POST['location'];
			$address=test_input($_POST['address']);
			$com = Sanitize($address);
			$address=test_link($com);
			$veh_reg_no=test_input($_POST['veh_reg_no']);
			$brand=test_input($_POST['brand']);
			$model=test_input($_POST['model']);
			$km_run=test_input($_POST['km_run']);
			if(isset($_POST['service_type'])){$service_type=test_input($_POST['service_type']);}
			$time=test_input($_POST['time']);
			$date1 =Convert_Date($_POST['date']);
			$date = date("Y-m-d", strtotime($date1));
			$location=$_POST['location'];	
			$pincode=test_input($_POST['pincode']);
			
			$Sql3 ="CALL `SP_Web_Locations`('Loc_Details', '', ?)";
			$Rs = $con->prepare($Sql3);
			$Rs->bindValue(1, $location,PDO::PARAM_INT);
			$Rs->execute();
			$Rs->setFetchMode(PDO::FETCH_ASSOC);										
			$rw3 = $Rs->fetch();
			$branchemail=$rw3['Email'];
			$Email_InCharge =$rw3['Email_InCharge '];
			$displayname=$rw3['Location_DisplayName'];
					
			
			$Sql ="CALL `SP_Web_Mas_Vehicle_Model`('Sel_Brand_Name',$brand, '')";			
            $Rs = $con->prepare($Sql);
            $Rs->execute();
            $Rs->setFetchMode(PDO::FETCH_ASSOC);
			$rw = $Rs->fetch();
			$brand_name =$rw['Brand_Name'];
			
			$Sql ="CALL `SP_Web_Mas_Vehicle_Model`('Sel_Model_Name','', $model)";			
            $Rs = $con->prepare($Sql);
            $Rs->execute();
            $Rs->setFetchMode(PDO::FETCH_ASSOC);
			$rw = $Rs->fetch();
			$model_name =$rw['Model_Name'];
			
		}
		
			$Sqls ="CALL `SP_Web_Mas_Settings`()";
			$Rs = $con->prepare($Sqls);
			$Rs->execute();
			$Rs->setFetchMode(PDO::FETCH_ASSOC);										
			$rows = $Rs->fetch();
			require "PHPMailerAutoload.php";
			$mail = new PHPMailer;
			$mail->isSMTP();
			$mail->SMTPDebug = 0;
			$mail->Debugoutput = 'html';
			$mail->Host =$rows['smtp_Server'];
			$mail->Port =$rows['smtp_Port'];
			$mail->SMTPSecure = 'tls';
			$mail->SMTPAuth = true;
			$mail->Username =$rows['smtp_User_ID'];
			$mail->Password =$rows['smtp_User_Password'];
			$mail->setFrom($rows['smtp_User_ID'], 'Web Admin');			
			$mail->addAddress($branchemail, $displayname);
			$mail->AddBCC('info@popularautomatch.com', 'Website Enquiries');
		if($Email_InCharge != ''){
			
			$mail->AddBCC($Email_InCharge, 'Website Enquiries');
		}
		
			$mail->WordWrap = 50;
			$mail->IsHTML(true);
			$mail->SMTPOptions = array(
					'ssl' => array(
						'verify_peer' => false,
						'verify_peer_name' => false,
						'allow_self_signed' => true)
				);	
			
			$now = new DateTime();	
		
			if($_REQUEST['enquiry_on']=='Offer-Scheme')
			{ 
			$mail->Subject = $_POST['offer'].' Schemes and Offers enquiry as on ' . date_format($now,"d/m/Y g:i A");
			}
			else
			{
			$mail->Subject = $_REQUEST['enquiry_on'].' as on ' . date_format($now,"d/m/Y g:i A");
			}		
				
			$mail->IsHTML(true);
			$mail->Body =GetEmailBody($displayname,$message,$address,$brand_name,$model_name);
			
			if (!$mail->send()) 
			{
				echo "<span style='color:red'>Mailer Error: " . $mail->ErrorInfo."</span>";
			} 
			else 
			{	
				
				
				$Sql ="CALL `SP_Web_Enquiries`('Insertion', '$enq_type', $ofr_Id, '$name', '$mobile', '$email', '$location', '$brand', '$model', '', '$veh_reg_no', '$message', '$address', '$pincode', '$km_run', '$service_type', '$date', '$time')";
				$Rs = $con->prepare($Sql);				
				$Result = $Rs->execute();
				echo "<span style='color:red'>Message Sent!</span>";?>
				<script type="text/javascript">
				document.addEventListener('DOMContentLoaded', function() {
   					parent.document.getElementById("form_submit").reset();
					parent.Refresh_Captcha(1);
				});
				</script>
				<?php
			}

}
}
function Sanitize($str)
{
		$str =stripslashes($str);   
		$injections = array('/(\n+)/i',
                '/(\r+)/i',
                '/(\t+)/i',
                '/(%0A+)/i',
                '/(%0D+)/i',
                '/(%08+)/i',
                '/(%09+)/i'
                );
		$str = preg_replace($injections,'',$str);	
		return $str;
}
function test_link($term)
{
	$val = preg_replace('/(?:<|&lt;).+?(?:>|&gt;)/', '', $term);
	$link = preg_replace("/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/", "", $val);
	$link = preg_replace('|https?:/www\.[a-z\.0-9]+|i', '', $link);
	$link = preg_replace('|https?:/.[a-z\.0-9]+|i', '', $link);
    $link = preg_replace('|www\.[a-z\.0-9]+|i', '', $link);
	$link = preg_replace("/(http|https|ftp|ftps)/s","",$link);
	$link = preg_replace("/[^\"+., ?':\/\()@;a-zA-Z0-9-]/s", "",$link);
	return $link;
}
function test_input($data)
{
			   $data = trim($data);
			   $data = stripslashes($data);
			   $data = htmlspecialchars($data);
			   return $data;
}
function Valid_Date($data)
{
				if (strstr($data, "-"))
				{	
				list($dd,$mm,$yyyy) = explode('-',$data);
				return checkdate($mm,$dd,$yyyy);
				}
				elseif (strstr($data, "."))
				{
				list($dd,$mm,$yyyy) = explode('.',$data);
				return checkdate($mm,$dd,$yyyy);
				}
				else
				{
				list($dd,$mm,$yyyy) = explode('/',$data);
				return checkdate($mm,$dd,$yyyy);
				}
}
function Convert_Date($date)
{	
	if (strstr($date, "-") || strstr($date, "/") || strstr($date, "."))
	{
           $date = preg_split("/[\/]|[-]|[.]+/", $date);
           $date = $date[0]."-".$date[1]."-".$date[2];
           return  $date;
    }
}


function GetEmailBody($displayname,$message,$address,$brand_name,$model_name){
	
		$mailbody  = '<!doctype html><html><head><meta charset="utf-8">
<style type="text/css">table {border-collapse: collapse;border-spacing: 0;width: 80%;padding-top: 10px;
    margin-left: 10%; margin-right: 10%;  margin-top: 2%; background-image: linear-gradient(to right, #c1c1c1d1, #f1868670); color: #000000;}th{border: none;text-align: left;padding: 12px;} div{width:100%;}body{background-color:#ffffff;} img{margin-top:10px;margin-bottom:10px;width:30%;} </style></head><body> <div><table border="0" align="center"><tbody><tr><td colspan="3" align="center"><br>';
		$mailbody .= '<h4>Popular Automatch</h4>';
		$mailbody .= 'Respond quickly to '.$_REQUEST['enquiry_on'].' enquiry , that will help increase customers trust and confidence in our website and company<br><br></td></tr>';
		$mailbody .= '<tr><th>Name </th><td>:</td><td>'.$_POST['name'].'</td></tr>';
		$mailbody .= '<tr><th>Mobile No </th><td>:</td><td>'.$_POST['mobile'].'</td></tr>';
		$mailbody .= '<tr><th>Email</th><td>:</td><td>'.$_POST['email'].'</td></tr>';
		$mailbody .= '<tr><th scope="row">Message </th><td>:</td><td>'.$message.'</td></tr>';
	
	if($_REQUEST['enquiry_on']=='Service Booking'){
		
		$mailbody .= '<tr><th>Address</th><td>:</td><td>'.$address.'</td></tr>';
		$mailbody .= '<tr><th>Pincode</th><td>:</td><td>'.$_POST['pincode'].'</td></tr>';
		$mailbody .= '<tr><th>Vehicle Registration No</th><td>:</td><td>'.$_POST['veh_reg_no'].'</td></tr>';
		$mailbody .= '<tr><th>Brand</th><td>:</td><td>'.$brand_name.'</td></tr>';	
		$mailbody .= '<tr><th>Model</th><td>:</td><td>'.$model_name.'</td></tr>';		
		$mailbody .= '<tr><th>Kilometer Run</th><td>:</td><td>'.$_POST['km_run'].'</td></tr>';
		$mailbody .= '<tr><th>Type Of Service</th><td>:</td><td>'.$_POST['service_type'].'</td></tr>';
		$mailbody .= '<tr><th>Preferred Service Date</th><td>:</td><td>'.$_POST['date'].'</td></tr>';
		$mailbody .= '<tr><th>Preferred Service Time</th><td>:</td><td>'.$_POST['time'].'</td></tr>';
		$mailbody .= '<tr><th scope="row">Preferred Branch </th><td>:</td><td>'.$displayname.'</td></tr>';
		
	}
	elseif($_REQUEST['enquiry_on']=='Offer-Scheme'){
		$mailbody .= '<tr><th scope="row">Branch </th><td>:</td><td>'.$displayname.'</td></tr>';
		        
	}
	
		$mailbody .= '<tr><td colspan="3" align="center">This is an automatically generated email &ndash; please do not reply to it. Design by <span>IT Department, Popular Group.<br><br></td></tr>';
		$mailbody.='</tbody></table></div></body></html>';
		return $mailbody ;
}