<?php
	session_start();
	require '../config.php';

	if (isset($_POST['Login'])) {

		$email = $_POST["email"];
		$pw = $_POST["password"];

		require_once("cls_select.php");

		$obj = new login();
		$obj->email = $email;
		$obj->password = $pw;
		$result = $obj->DBlogin();


		if ($result == true) {
			$_SESSION['success_login'] = TRUE;
			header('Location:'.HOST_URL.'');
		} else {
			header('Location:'.HOST_URL.'/Pages/login.php');
		}
	}
	
?>	