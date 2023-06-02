<?php

	session_start();

	if (isset($_POST['register'])){

		$email=$_POST['email'];
		$phone=$_POST['phone'];
		if ($_POST['password']==$_POST['c_password']) {
			$password=$_POST['password'];
		}

		$otp=rand(11111,999999);
		$content="Welcome to File Tracking Portal.\nYour one time password is : ".$otp;


		$fields = array(
		    "message" => "$content",
		    "language" => "english",
		    "route" => "q",
		    "numbers" => "$phone",
		);

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_SSL_VERIFYHOST => 0,
		  CURLOPT_SSL_VERIFYPEER => 0,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => json_encode($fields),
		  CURLOPT_HTTPHEADER => array(
		    "authorization: o8umb51QJ0aFCKwnIeZtlP9qO7AhdzrTYkGVByW6vpcNifH4sUQMcbUEl8aCPxdBqF2gI31teOs4VuZH",
		    "accept: */*",
		    "cache-control: no-cache",
		    "content-type: application/json"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		 //  if (isset($_SESSION['contact'])!=TRUE) {
			// 	$_SESSION['phone_done']=TRUE;
			// }

			$_SESSION['email']=$email;
			$_SESSION['phone']=$phone;
			$_SESSION['password']=$password;
			$_SESSION['otp']=$otp;

		  	header('location:../pages/verifyotp.php');
		}

	}

?>