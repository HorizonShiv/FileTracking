<?php

require_once('cls_select.php');
require_once('cls_insert.php');
require_once('cls_update.php');

$dpsobj = new dpsALL();
$stobj = new serviceTable();
$dpsinsertObj = new doc_process_status();
$changeStatusObj = new authority_actions();

$isDonecount = 0;

if (isset($_GET['last'])) {
    if ($_GET['last'] == 0) {

        $temp_docId_arr = explode(',', $_GET['temp_document_id']);
        $len = count($temp_docId_arr) - 1;
        for ($i = 0; $i < $len; $i++) {
            $dpsobj->dps_id = $temp_docId_arr[$i];
            $result = $dpsobj->getDocumentBydpsId();

            if ($result->num_rows > 0) {
                foreach ($result as $row) {

                    // Fetched data from dps table
                    $doc_id = $row['document_id'];
                    $doc_path = $row['doc_path'];
                    $user_id = $row['user_id'];
                    $service_id = $row['service_id'];
                    $tracking_id = $row['tracking_id'];

                    // Getting table id and increment id by 1 to shift from this to next table
                    $temp = explode('_', $row['table_id']);
                    $temp_table = end($temp);
                    $table_id = $service_id . '_' . $temp_table + 1;

                    //find authority cooresponding table id
                    $stobj->table_id = $table_id;
                    $authority_id = $stobj->getAuthorityNameByTableId()->fetch_assoc();

                    //Update status to 3
                    $changed = $changeStatusObj->changeStatusToThree($temp_docId_arr[$i], 3);

                    // Inserting data after changing table and authority
                    $isInserted = $dpsinsertObj->allDpsinsert($doc_id, $doc_path, $user_id, $table_id, $service_id, $authority_id['services_authority'], $tracking_id);
                }
            }

            $isDonecount++;
        }

        if ($len == $isDonecount) {
            header("location:../pages/services/authority_doc_view.php?user_id=" . $user_id);
        }
    }
}
