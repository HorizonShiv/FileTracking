<?php require '../../config.php' ?>

<!-- Header Links : CSS , Meta tags -->
<?php include INC_URL . '/__headerLinks.php'; ?>

<!-- Sidebar : LEFT -->
<?php include INC_URL . '/__sidebar.php'; ?>

<!-- Navbar : TOP -->
<?php include INC_URL . '/__navbar.php'; ?>


<?php
if (isset($_SESSION['Authority'])) :

    require_once('../../db/cls_select.php');

    $obj = new dpsALL();
    $temp = $_GET['user_id'];
    $obj->authority_id = $_SESSION['Authority_id'];
    $obj->service_id = $_SESSION['Authority_service_id'];
    $obj->table_id = $_SESSION['Authority_table_id'];
    $result_dpsall  = $obj->getAllDocumentByUserId();


    $objts = new serviceTable();
    $objts->service_id = $_SESSION['Authority_service_id'];
    $totalTable = $objts->countTables()->fetch_assoc();

    $arrStatus;
?>

    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card">
                <h5 class="card-header">Users for Passport</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Document ID</th>
                                <th>Document name</th>
                                <th>Document Number</th>
                                <th>User ID</th>
                                <th>Service ID</th>
                                <th>Tracking ID</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <?php
                            $temp_document_id = NULL;
                            if ($result_dpsall->num_rows > 0) :
                                foreach ($result_dpsall as $row) :
                                    if ($temp == $row['user_id']) :
                                        $arrStatus[] = $row['status'];
                                        $temp_document_id .= $row['dps_id'] . ',';
                            ?>
                                        <tr>
                                            <td><i class="fab fa-angular fa-lg  me-3"><?php echo $row['document_id']; ?></i></td>
                                            <td><?php echo $row['doc_name']; ?></td>
                                            <td><?php echo $row['doc_number']; ?></td>
                                            <td><?php echo $row['user_id']; ?></td>
                                            <td><?php echo $row['service_id']; ?></td>
                                            <td><?php echo $row['tracking_id']; ?></td>
                                            <td><?php if($row['status']==0){Echo 'Pending';}elseif($row['status']==1){Echo 'Checked';}elseif($row['status']==3){echo 'Finished';}else{echo 'Rejected';} ?></td>
                                            <td>
                                                <a target="_blank" href="<?php echo HOST_URL . "/documents/" . $row['doc_path']; ?>" class="badge bg-label-primary me-1"><i class="bx bxs-folder-open"></i></a>
                                                <?php if ($row['status'] == 0) {
                                                    echo '<a href="' . HOST_URL . '/db/DB_update.php?user_id=' . $row['user_id'] . '&document_id=' . $row['document_id'] . '&action_status=2" class="badge bg-label-danger me-1"><i class="bx bx-x"></i></a>';

                                                    echo '<a href="' . HOST_URL . '/db/DB_update.php?user_id=' . $row['user_id'] . '&document_id=' . $row['document_id'] . '&action_status=1" class="badge bg-label-success me-1"><i class="bx bx-check"></i></a>';
                                                }
                                                ?>
                                            </td>
                                        </tr>
                            <?php
                                    endif;
                                endforeach;
                            endif;

                            ?>
                        </tbody>
                    </table>


                </div>
            </div>
            <?php
            $temp_service = explode('_', $_SESSION['Authority_table_id']);
            $temp_service_id = end($temp_service);
            if (count(array_unique($arrStatus)) === 1) {
                // if all values are one - Verified 
                if ($arrStatus[0] == 1) {

                    if ($temp_service_id != $totalTable['table_count']) {

                        echo '
                            <div class="row mt-4">
                            <div class="col-10"></div>
                            <div class="col-2">
                            <a class="btn btn-primary" href="' . HOST_URL . '/db/shuffleTable.php?last=0&temp_document_id=' . $temp_document_id . '">Send to Next Table</a>
                            </div>
                        </div>';
                    } else {
                        echo '
                        <div class="row mt-4">
                        <div class="col-10"></div>
                        <div class="col-2">
                        <a class="btn btn-primary" href="' . HOST_URL . '/db/shuffleTable.php?' . http_build_query($result_dpsall) . '">Send to Next Table</a>
                        </div>
                    </div>';
                    }
                }
                elseif($arrStatus[0] == 3)
                {
                    echo '
                        <div class="row mt-4">
                        <div class="col-10"></div>
                        <div class="col-2">
                        <a class="btn btn-primary" href="#">Finished</a>
                        </div>
                    </div>';
                }
            }

            ?>



        </div>

    </div>

<?php endif; ?>



<!-- Footer : BOTTOM -->
<?php include INC_URL . '/__footer.php'; ?>

<!-- Footer Links : JAVASCRIPT -->
<?php include INC_URL . '/__footerLinks.php'; ?>