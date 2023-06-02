<?php require '../../config.php' ?>

<!-- Header Links : CSS , Meta tags -->
<?php include INC_URL . '/__headerLinks.php'; ?>

<!-- Sidebar : LEFT -->
<?php include INC_URL . '/__sidebar.php'; ?>

<!-- Navbar : TOP -->
<?php include INC_URL . '/__navbar.php'; ?>

<!-- Main Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <?php if (isset($_SESSION['user'])):?>
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-12">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Select Services </h5>
                            <p class="mb-2">
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit eum necessitatibus aspernatur iste beatae deserunt perferendis magnam incidunt voluptatibus maxime.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                            <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between mb-0">
                                <div class="card-title">
                                    <h5 class="text-nowrap mb-2">Passport Service</h5>
                                    <small class="card-desc mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. </small>
                                </div>
                                <span class="badge bg-label-warning rounded-pill mb-3">Year 2021</span>

                                <a href="<?php echo PAGES_URL."/services/passportService.php"; ?>" class="btn btn-sm btn-outline-primary">Apply Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                            <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between mb-0">
                                <div class="card-title">
                                    <h5 class="text-nowrap mb-2">Adhar Service</h5>
                                    <small class="card-desc mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. </small>
                                </div>
                                <span class="badge bg-label-warning rounded-pill mb-3">Year 2021</span>

                                <a href="javascript:;" class="btn btn-sm btn-outline-primary">Apply Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                            <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between mb-0">
                                <div class="card-title">
                                    <h5 class="text-nowrap mb-2">Passport Service</h5>
                                    <small class="card-desc mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. </small>
                                </div>
                                <span class="badge bg-label-warning rounded-pill mb-3">Year 2021</span>

                                <a href="javascript:;" class="btn btn-sm btn-outline-primary">Apply Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['Authority'])):?>


        <?php 

            require_once('../../db/cls_select.php');

            $obj = new serviceAll();
            $result_allservice  = $obj->allService();

            if ($result_allservice->num_rows > 0) :
                foreach ($result_allservice as $row) :
                    if ($row['service_id']==$_SESSION['Authority_service_id']) :

        ?>

                <div class="col-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                                <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between mb-0">
                                    <div class="card-title">
                                        <h5 class="text-nowrap mb-2"><?php echo $row['service_name']; ?> Service</h5>
                                        <small class="card-desc mb-0"><?php echo $row['service_desc']; ?> </small>
                                    </div>
                                    <span class="badge bg-label-warning rounded-pill mb-3"></span>

                                    <a href="<?php echo PAGES_URL."/services/authorityServicesDetails.php" ?>" class="btn btn-sm btn-outline-primary">View</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



    <?php 
                endif;
            endforeach;
        endif;
    endif; 

    ?>

    </div>
</div>



<!-- Footer : BOTTOM -->
<?php include INC_URL . '/__footer.php'; ?>

<!-- Footer Links : JAVASCRIPT -->
<?php include INC_URL . '/__footerLinks.php'; ?>