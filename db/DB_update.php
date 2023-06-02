<?php

session_start();
require '../config.php';
require_once("cls_update.php");
if(isset($_GET['action_status']) || isset($_GET['document_id']) || isset($_GET['user_id'])){
    

    $obj = new authority_actions();
    $obj->status = $_GET['action_status'];
    $obj->doc_id = $_GET['document_id'];
    $obj->service_id =  $_SESSION['Authority_service_id'];
    $obj->table_id = $_SESSION['Authority_table_id'];
    $obj->auth_id = $_SESSION['Authority_id'];
    $result_action_auth = $obj->changeStatus();

    if ($result_action_auth==True) {
        header('location:' . PAGES_URL . '/services/authority_doc_view.php?user_id='.$_GET['user_id']);
    }
   
}

if(isset($_POST['reupload'])){
    $temp_passing=$_SESSION['passing'];

    $passing=explode(' ',$temp_passing);

    for($i=0;$i<(count($passing)-1);$i++){
        //dynamic fetch
        $passing_document = $_FILES[$passing[$i]];

        $fileName = $_FILES[$passing[$i]]['name'];
        $fileTmpname = $_FILES[$passing[$i]]['tmp_name'];
        $fileSize = $_FILES[$passing[$i]]['size'];
        $fileError = $_FILES[$passing[$i]]['error'];
        $fileType = $_FILES[$passing[$i]]['type'];

		$fileExt=explode('.', $fileName);
		$fileActualExt=strtolower(end($fileExt));

		$allowed= array('jpg','jpeg','png','pdf');

		if (in_array($fileActualExt, $allowed)) {
			if ($fileError === 0) {
				if ($fileSize < 50000000) {
					$fileNameNew = uniqid('',true).".".$fileActualExt;
				    $fileDestination = '../user_documents/'.$fileNameNew;
					move_uploaded_file($fileTmpname, $fileDestination);
					echo $fileNameNew;
				}
			}
		}
		
		require_once("cls_update.php");
		$obj=new user_action();
		$obj->doc_id=$passing[$i];
		$obj->doc_path=$fileNameNew;
    	$result=$obj->reupload();

        $obj_doc=new user_action();
		$obj_doc->doc_id=$passing[$i];
		$obj_doc->doc_path=$fileNameNew;
        $obj_doc->service_id=$_SESSION['service_id'];
        $obj_doc->track_id=$_SESSION['track_id'];
        $obj_doc->table_id=$_SESSION['table_id'];
    	$result_doc=$obj_doc->doc_change_reupload();

        
        
        // echo "<pre>";
        // print_r($passing_document);
        // echo "</pre>";
    }

    if($result==true && $result_doc==true){

        unset($_SESSION['service_id']);
        unset($_SESSION['track_id']);
        unset($_SESSION['table_id']);
        unset($_SESSION['passing']);
        echo '<script>alert("Updated Succesfull")
        location="../index.php";
        </script>';
        // header('Location:../index.php');
    }
    else{
        echo 'Fuck';
    }
    


}
?>