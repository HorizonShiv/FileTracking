<?php

require_once("DBConnection.php");
// Complaint Registration
class authority_actions
{

    public $status;
    public $doc_id;

    public $service_id;
    public $table_id;
    public $auth_id;

    public function changeStatus()
    {
        $conn = dbconnection();
        $sql = "UPDATE `doc_process_status` SET `status`='$this->status' WHERE`table_id` = '$this->table_id' AND  `service_id` = '$this->service_id' AND `authority_id` = '$this->auth_id' AND `document_id` = '$this->doc_id'";

        $result = $conn->query($sql);


        if ($result === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function changeStatusToThree($dps_id, $status)
    {
        $conn = dbconnection();
        $sql = "UPDATE `doc_process_status` SET `status`='$status' WHERE `dps_id` = '$dps_id'";

        $result = $conn->query($sql);


        if ($result === TRUE) {
            return true;
        } else {
            return false;
        }
    }
}

class user_action
{

    public $user_id;
    public $doc_id;
    public $doc_path;


    public function reupload()
    {
        $this->user_id = $_SESSION['user_id'];
        $conn = dbconnection();
        $sql = "UPDATE `user_document` SET `doc_path`='$this->doc_path' WHERE `user_id`='$this->user_id' && `document_id`='$this->doc_id'";

        $result = $conn->query($sql);


        if ($result === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public $doc_status = 0;
    public $service_id;
    public $track_id;
    public $table_id;

    public function doc_change_reupload()
    {

        $this->user_id = $_SESSION['user_id'];
        $conn = dbconnection();
        $sql = "UPDATE `doc_process_status` SET `doc_path`='$this->doc_path', `reason`=NUll,`status`='$this->doc_status' WHERE `document_id`='$this->doc_id' && `user_id`='$this->user_id' && `service_id`='$this->service_id' && `tracking_id`='$this->track_id' && `table_id`='$this->table_id'";

        $result = $conn->query($sql);


        if ($result === TRUE) {
            return true;
        } else {
            return false;
        }
    }
}
