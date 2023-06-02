<?php
	session_start();
	require '../config.php';
	session_destroy();

	header('Location:'.HOST_URL.'/Pages/login.php');
	
?>