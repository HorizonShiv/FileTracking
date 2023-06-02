<?php require '../../config.php' ?>

<!-- Header Links : CSS , Meta tags -->
<?php include INC_URL . '/__headerLinks.php'; ?>

<link rel="stylesheet" href="<?php echo ASSETS_URL . "/css/progress.css"; ?>" />

<!-- Sidebar : LEFT -->
<?php include INC_URL . '/__sidebar.php'; ?>

<!-- Navbar : TOP -->
<?php include INC_URL . '/__navbar.php'; ?>

<!-- Main Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h5 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Services / Passport Service / </span> Track Service </h4>

        <div class="row">
            <aside id="layout-menu" class="card bg-menu-theme w-100">
                <?php
                require_once('../../db/cls_select.php');

                $service_id = $_GET['service_id'];
                $tracking_id = $_GET['tracking_id'];
                $user_id = $_SESSION['user_id'];

                $docobj = new document();

                $obj = new serviceTable();
                $obj->service_id = $service_id;
                $result  = $obj->tableService();
                $result_serviceAll  = $obj->tableServiceAll();

                $row = $result->fetch_assoc();

                $count = $row['table_count'];

                $obj_process = new serviceProcess();
                $obj_process->service_id = $service_id;
                $obj_process->tracking_id = $tracking_id;
                $obj_process->user_id = $user_id;
                $result_process  = $obj_process->processService();

                if ($result_process->num_rows > 0) {
                    foreach ($result_process as $row) {
                        $temp = $row['table_id'];
                    }
                }

                //Table id fetching 
                $temp_table_id = explode('_', $temp);
                $table_id = end($temp_table_id);


                if ($result_serviceAll->num_rows > 0) {
                    $j = 1;
                    foreach ($result_serviceAll as $row) {
                        ${"table_id" . $j} = $row['table_id'];
                        ${"services_authority" . $j} = $row['services_authority'];
                        $j++;
                    }
                }

                $docprocess = new docProcess();
                $result_status = $docprocess->getDocumentStatus();

                for ($i = 1; $i <= $count + 1; $i++) {
                    ${"status" . $i} = "";
                }
                $rejected = [];



                function findStatus($arr)
                {
                    // Fetching only Status Column
                    $statusArr = array_column($arr, 'status');

                    // check if all values are same in array Status
                    if (count(array_unique($statusArr)) === 1) {
                        // if all values are Zero
                        if ($statusArr[0] == 0) {
                            return 'Documents are pending for Verification';
                        }
                        // if all values are One
                        else if ($statusArr[0] == 1 || $statusArr[0] == 3) {
                            return 'Document Verified';
                        }
                        // if all values are Two 
                        else if ($statusArr[0] == 2) {
                            $_SESSION['global_status'] = 2;
                            $status = printRejectStatus($arr);
                            return $status;
                        }
                    }
                    // if any one value is Two
                    else {
                        $status = printRejectStatus($arr);
                        return $status;
                    }
                }



                function printRejectStatus($arr)
                {
                    global $rejected;
                    global $doc_id_arr;
                    foreach ($arr as $row) {
                        if ($row['status'] == 2) {
                            global $docobj;
                            $docobj->id = $row['document_id'];
                            $doc_id_arr[] = $row['document_id'];
                            // array_push($doc_id_arr, $row['document_id']);

                            global $reason;
                            $reason = $row['reason'];

                            $docresult = $docobj->getDocumentNameById();

                            if ($docresult->num_rows > 0) {
                                foreach ($docresult as $row1) {
                                    $rejected[] = $row1['doc_name'];
                                }
                            }
                        }
                    }
                    if (gettype($rejected) == 'array') {

                        if (count($rejected) > 0) {
                            unset($_SESSION['global_status']);
                            $rejected = implode(",", $rejected);
                            $rejected = "Rejected Documents are " . $rejected;
                        }
                    }
                    return $rejected;
                }

                //Find the table id for status 
                for ($i = 0; $i <= (count($temp_table_id) - 1); $i++) {
                    if ($i == 0) {
                        $tableid_for_status = $temp_table_id[0];
                    } elseif ($i == (count($temp_table_id) - 1)) {
                        $tableid_for_status = $tableid_for_status . '_';
                    } else {
                        $tableid_for_status = $tableid_for_status . '_' . $temp_table_id[$i];
                    }
                }



                if ($result_status->num_rows > 0) {
                    foreach ($result_status as $row) {
                        for ($i = 1; $i <= $table_id; $i++) {
                            if ($row['table_id'] == $tableid_for_status . $i . '') {
                                ${"array" . $i}[] = $row;
                            }
                        }
                    }

                    for ($i = 1; $i <= $table_id; $i++) {
                        $are = ${"array" . $i};
                        // print_r();
                        ${"status" . $i} = findStatus($are);
                    }
                }

                ?>

                <section class="p-5">
                    <div class="rt-container">
                        <div class="col-rt-12">
                            <div class="Scriptcontent">
                                <!-- Stepper HTML -->
                                <?php for ($i = 1; $i <= $count + 1; $i++) { ?>
                                    <div class="step <?= $table_id == $i || $table_id >= $i ? "step-active" : ""; ?>">
                                        <div>
                                            <div class="circle">

                                                <?= $table_id >= $i + 1 ? "<i class='bx bx-check'></i>" : $i; ?>
                                            </div>
                                        </div>
                                        <div>


                                            <div class="title 
                                        <?php
                                        if (isset($_SESSION['global_status']) == 2 || $table_id == $i && isset($doc_id_arr)) {
                                            $reject_doc_code = 2;
                                            echo 'text-danger';
                                        } elseif ($table_id == $i || $table_id >= $i) {
                                            echo 'text-primary';
                                            unset($_SESSION['global_status']);
                                        } else {
                                            echo '';
                                            unset($_SESSION['global_status']);
                                        }
                                        ?>">
                                                <?php
                                                if ($table_id > $i) {
                                                    echo 'Done';
                                                } elseif ($table_id == $i) {
                                                    echo 'Current Step';
                                                } elseif ($i == $count + 1) {
                                                    echo 'Last Step';
                                                } else {
                                                    echo 'Next Step';
                                                }
                                                ?>


                                                <?= ($i - 1) != $count ? ' ( Table Location: ' . ${"table_id" . $i} . ' -- Authority: ' . ${"services_authority" . $i} . ' )' : ""; ?></div>


                                            <?php if (($i - 1) != $count) : ?>
                                                <div class="caption"><?= ${"status" . $i} ? ${"status" . $i} : "Documents are pending for Verification" ?> <?php
                                                                                                                                                            if (isset($reject_doc_code) == 2 && $table_id == $i && isset($doc_id_arr)) {


                                                                                                                                                                // $doc_id_pass = implode(",", $doc_id_arr);
                                                                                                                                                                $doc_id_pass = "'" . implode("','", $doc_id_arr) . "'";
                                                                                                                                                                echo '</br>Reason: ' . $reason . ' ';
                                                                                                                                                                echo '<a href="reUploadDoc.php?doc_id=' . $doc_id_pass . '&track_id=' . $tracking_id . '&service_id=' . $service_id . '&table_id=' . $temp . '">Re-upload</a><br>';
                                                                                                                                                                $reject_doc_code = 0;
                                                                                                                                                            }
                                                                                                                                                            ?></div>


                                            <?php endif; ?>

                                            <?php if (($i - 1) == $count) : ?>
                                                <div class="caption">Finished</div>
                                            <?php endif; ?>




                                        </div>
                                    </div>
                                <?php } ?>

                                <!-- End Stepper HTML -->
                            </div>
                        </div>
                    </div>
                </section>

            </aside>
        </div>
</div>

<!-- Footer : BOTTOM -->
<?php include INC_URL . '/__footer.php'; ?>

<!-- Footer Links : JAVASCRIPT -->
<?php include INC_URL . '/__footerLinks.php'; ?>