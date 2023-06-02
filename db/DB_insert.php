<?php

	session_start();
	require '../config.php';

	if (isset($_POST['verify'])) {
		if ($_POST['OTP']==$_SESSION['otp']) {

			require_once("cls_insert.php");
			
			$obj = new regiUser();
		    $obj->email = $_SESSION['email'];
		    $obj->phone = $_SESSION['phone'];
		    $obj->password = $_SESSION['password'];
		    $obj->role = 2;
			
			$result = $obj->userRegi();

		    if ($result == true) {
		        header('Location:'.PAGES_URL. '/login.php');
		    } else {
		        header('Location:'.HOST_URL. '/pages/register.php');
		    }
		}
		else{
			header('location:'.PAGES_URL.'/verifyOTP.php');
		}

			
	}

	

?>