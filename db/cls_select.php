<?php

require_once("DBConnection.php");

// Login Check for all user 
class login
{
    public $email;
    public $password;
    public function DBlogin()
    {
        $conn = dbconnection();
        $sql = "SELECT `name`, `email`, `password`, `role`, `aasign_table`,`assign_services` FROM `user` WHERE  email='$this->email' and password='$this->password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row['role'] == 0) {
                    if ($row['name'] != NULL) {
                        $_SESSION['Admin'] = $row['name'];
                        $_SESSION['Admin_id'] = $row['email'];
                    } else {
                        $_SESSION['Admin'] = 'Admin';
                        $_SESSION['Admin_id'] = $row['email'];
                    }
                } elseif ($row['role'] == 1) {
                    if ($row['name'] != NULL) {
                        $_SESSION['Authority'] = $row['name'];
                        $_SESSION['Authority_id'] = $row['email'];
                        $_SESSION['Authority_service_id'] = $row['assign_services'];
                        $_SESSION['Authority_table_id'] = $row['aasign_table'];
                    } else {
                        $_SESSION['Authority'] = 'Authority';
                        $_SESSION['Authority_id'] = $row['email'];
                        $_SESSION['Authority_service_id'] = $row['assign_services'];
                        $_SESSION['Authority_table_id'] = $row['aasign_table'];
                    }
                } elseif ($row['role'] == 2) {
                    if ($row['name'] != NULL) {
                        $_SESSION['user'] = $row['name'];
                        $_SESSION['user_id'] = $row['email'];
                    } else {
                        $_SESSION['user'] = 'User';
                        $_SESSION['user_id'] = $row['email'];
                    }
                }
            }
            return true;
        } else {
            // $_SESSION['Invalid'] = 'Invalid User Id or Password';
            return false;
        }
    }
}

class appliedServices
{

    public function SericesApplied()
    {
        $user_id = $_SESSION['user_id'];
        $conn = dbconnection();
        $sql = "SELECT tracking_process.*, services.* from `services` JOIN `tracking_process` ON services.service_id=tracking_process.service_id AND tracking_process.user_id='$user_id' ";
        $result = $conn->query($sql);
        return $result;
    }
}


class serviceTable
{
    public $service_id;
    public function tableService()
    {
        $conn = dbconnection();
        $sql = "SELECT COUNT(services_id) as table_count FROM table_services WHERE `services_id`='$this->service_id'";
        $result = $conn->query($sql);
        return $result;
    }

    public function countTables()
    {
        $conn = dbconnection();
        $sql = "SELECT COUNT(table_id) as table_count FROM table_services WHERE `services_id`='$this->service_id'";
        $result = $conn->query($sql);
        return $result;
    }

    public function tableServiceAll()
    {
        $conn = dbconnection();
        $sql = "SELECT `table_id`, `table_name`, `services_id`, `services_city`, `services_authority` FROM `table_services` WHERE `services_id`='$this->service_id'";
        $result = $conn->query($sql);
        return $result;
    }
    public $table_id;
    public function getAuthorityNameByTableId()
    {
        $conn = dbconnection();
        $sql = "SELECT `services_authority` FROM `table_services` WHERE `table_id`='$this->table_id'";
        $result = $conn->query($sql);
        return $result;
    }
}

class serviceProcess
{
    public $service_id;
    public $tracking_id;
    public $user_id;

    public function processService()
    {
        $conn = dbconnection();
        $sql = "SELECT `dps_id`, `document_id`, `user_id`, `table_id`, `service_id`, `authority_id`, `tracking_id`, `status` FROM `doc_process_status` WHERE `service_id`='$this->service_id' AND `user_id`='$this->user_id' AND `tracking_id`='$this->tracking_id'";
        $result = $conn->query($sql);
        return $result;
    }
}

class docProcess
{
    public $service_id;
    public $user_id;
    public $document_id;

    public function getDocumentStatus()
    {

        $this->user_id = $_SESSION['user_id'];
        $this->service_id = $_GET['service_id'];

        $conn = dbconnection();
        $sql = "SELECT `dps_id`, `document_id`, `user_id`, `table_id`, `service_id`, `authority_id`, `reason`, `status` FROM `doc_process_status` WHERE `user_id` = '$this->user_id' AND `service_id` = '$this->service_id'";
        $result = $conn->query($sql);
        return $result;
    }

    public function getRejectedDocument()
    {

        $this->user_id = $_SESSION['user_id'];

        $conn = dbconnection();

        $sql = "SELECT `document_id`,`doc_name` FROM `user_document` WHERE document_id IN ($this->document_id) &&  user_id='$this->user_id'";
        $result = $conn->query($sql);
        return $result;
    }
}

class serviceAll
{
    public function allService()
    {
        $conn = dbconnection();
        $sql = "SELECT `service_id`, `service_name`, `service_desc`, `services_city`, `service_status` FROM `services` WHERE 1";
        $result = $conn->query($sql);
        return $result;
    }
}

class dpsALL
{
    public $authority_id;
    public $service_id;
    public $table_id;
    public function ALLdps()
    {
        $conn = dbconnection();
        $sql = "SELECT `dps_id`, `document_id`,`doc_path`, `user_id`, `table_id`, `service_id`, `authority_id`, `tracking_id`, `status` FROM `doc_process_status` WHERE `authority_id`='$this->authority_id' AND `service_id`='$this->service_id' AND `table_id`='$this->table_id' ";
        $result = $conn->query($sql);
        return $result;
    }

    public function getAllDocumentByUserId()
    {
        $conn = dbconnection();
        $sql = "SELECT doc_process_status.*, user_document.*  FROM `doc_process_status` JOIN `user_document` ON user_document.document_id = doc_process_status.document_id WHERE `authority_id`='$this->authority_id' AND `service_id`='$this->service_id' AND `table_id`='$this->table_id' ";
        $result = $conn->query($sql);
        return $result;
    }

    public $dps_id;
    public function getDocumentBydpsId()
    {
        $conn = dbconnection();
        $sql = "SELECT *  FROM `doc_process_status` WHERE`dps_id`='$this->dps_id' ";
        $result = $conn->query($sql);
        return $result;
    }
}

class document
{
    public $id;
    public function getDocumentNameById()
    {
        $conn = dbconnection();
        $sql = "SELECT * FROM `user_document` WHERE `document_id` = '$this->id'";
        $result = $conn->query($sql);
        return $result;
    }
}
