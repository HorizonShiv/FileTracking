<?php
require_once("DBConnection.php");

// Complaint Registration
class regiUser
{
    public $email;
    public $phone;
    public $password;
    public $role;
    public function userRegi()
    {
        $conn = dbconnection();
        $sql = "INSERT INTO `user` (`email`, `phone`, `password`, `role`) VALUES ('$this->email','$this->phone','$this->password','$this->role')";

        $result = $conn->query($sql);


        if ($result === TRUE) {
            return true;
        } else {
            return false;
        }
    }
}

class doc_process_status
{
    public function allDpsinsert($document_id, $doc_path, $user_id, $table_id, $service_id, $authority_id, $tracking_id)
    {
        $conn = dbconnection();
        $sql = "INSERT INTO `doc_process_status`(`document_id`, `doc_path`, `user_id`, `table_id`, `service_id`, `authority_id`, `tracking_id`, `reason`, `status`) VALUES ('$document_id','$doc_path','$user_id','$table_id','$service_id','$authority_id','$tracking_id',NULL,0)";

        $result = $conn->query($sql);
    }
}
