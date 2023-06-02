<?php require '../../config.php' ?>

<!-- Header Links : CSS , Meta tags -->
<?php include INC_URL . '/__headerLinks.php'; ?>

<!-- Sidebar : LEFT -->
<?php include INC_URL . '/__sidebar.php'; ?>

<!-- Navbar : TOP -->
<?php include INC_URL . '/__navbar.php'; ?>

<!-- Main Content -->

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Services / Passport Service / Track Service /</span> Rejected Documents</h4>

    <?php

    require_once('../../db/cls_select.php');

    $docObj = new docProcess();

    // $rejected_doc_arr = explode(' ', $_GET['doc_id']);
    $docObj->document_id = $_GET['doc_id'];
    $result =  $docObj->getRejectedDocument();
    ?>
    <div class="row">
        <div class="col-xl-12">
            <div class="nav-align-top mb-4">

                <div class="tab-content">

                    <!-- Adhar Card -->
                    <?php
                    $passing = ""; ?>
                    <form enctype="multipart/form-data" method="post" action="../../db/DB_update.php">
                        <?php foreach ($result as $value) : ?>
                            <div class="row d-flex align-items-center mb-3">
                                <label for="html5-range" class="col-md-3 col-form-label"><?php echo $value['doc_name']; ?></label>
                                <div class="col-5">
                                    <input class="form-control-sm form-control" required type="file" accept="application/pdf" name="<?php echo $value['document_id']; ?>" />
                                </div>
                                <?php
                                $passing .= $value['document_id'] . ' ';
                                ?>
                                <!-- <div class="col-3">
                                <input id="aadharno" class="form-control form-control-sm" type="number" placeholder="Aadhar Number" />
                            </div> -->
                            </div>
                        <?php endforeach; ?>
                        <div>
                            <?php
                            $_SESSION['track_id'] = $_GET['track_id'];
                            $_SESSION['table_id'] = $_GET['table_id'];
                            $_SESSION['service_id'] = $_GET['service_id'];
                            $_SESSION['passing'] = $passing;
                            ?>
                            <input type='submit' class="btn btn-primary mt-3" value="Upload" name="reupload"></input>
                        </div>
                    </form>

                </div>
            </div>



        </div>




    </div>
</div>
</div>
</div>
</div>
</div>


<!-- Footer : BOTTOM -->
<?php include INC_URL . '/__footer.php'; ?>

<!-- Footer Links : JAVASCRIPT -->
<?php include INC_URL . '/__footerLinks.php'; ?>