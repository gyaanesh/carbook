<?php
require __DIR__ . '/twilio-php-main/src/Twilio/autoload.php';
// include '../include/config_inc.php';
include_once '../include/adminConfig.php';

use Twilio\Rest\Client;
// In production, these should be environment variables.
$account_sid = 'ACe6584e2f01a091275cbbc79a41823d98';
$auth_token = '915ef251297d4179165fb787667c7173';
$twilio_number = "+18456683976"; // Twilio number you own
$client = new Client($account_sid, $auth_token);
// Below, substitute your cell phone
$mobile = $_POST['mobile'];
echo $six_digit_random_number = random_int(100000, 999999);

// FIRST IS USER REGISTERED
  
  $result = mysqli_query($conn, "SELECT * FROM users WHERE Phone= $mobile" );
  	if (mysqli_num_rows($result) > 0) 
	{
  		
  		$result = mysqli_query($conn, "SELECT * FROM loginotpverification WHERE mobile= $mobile" );
  		if (mysqli_num_rows($result) > 0) 
  		{
  			 $result = mysqli_query($conn,"UPDATE `loginotpverification` SET `otp` = $six_digit_random_number WHERE mobile = $mobile");
  			 if ($result) 
  			 {
  			 	$smsStatus = $client->messages->create(
					    '+91'.$mobile,  
					    [
					        'from' => $twilio_number,
					        'body' => 'Your Otp is #'.$six_digit_random_number
					    ] 
					);
					session_start();
					$_SESSION['mobile']= "$mobile";
					$_SESSION['OTP']= "false";

					header("Location: ../verifyOtp.php");
			}			
  		}
  		else
  		{
  			$query  = " INSERT INTO `loginotpverification` ( `mobile`, `otp`) VALUES ('$mobile', '$six_digit_random_number')"; 
  			$addedInDb = mysqli_query($conn, $query);
  			if ($addedInDb) 
			{
				$smsStatus = $client->messages->create(
				    '+91'.$mobile,  
				    [
				        'from' => $twilio_number,
				        'body' => 'Your Otp is #'.$six_digit_random_number
				    ] 
				);
				session_start();
				$_SESSION['mobile']= "$mobile";
				$_SESSION['OTP']= "false";
				header("Location: ../verifyOtp.php");
			}
  		}
	}
	else
	{
		echo "User Must Sign Up First";
  	}
// Loginotpverification




?>