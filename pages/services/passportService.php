<?php require '../../config.php' ?>

<!-- Header Links : CSS , Meta tags -->
<?php include INC_URL . '/__headerLinks.php'; ?>

<!-- Sidebar : LEFT -->
<?php include INC_URL . '/__sidebar.php'; ?>

<!-- Navbar : TOP -->
<?php include INC_URL . '/__navbar.php'; ?>

<!-- Main Content -->

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Services /</span> Passport Services</h4>

    <div class="row">
        <div class="col-xl-12">
            <div class="nav-align-top mb-4">
                <ul class="nav nav-pills mb-3" role="tablist">
                    <li class="nav-item">
                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-home" aria-controls="navs-pills-top-home" aria-selected="true">
                            Personal Details
                        </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-profile" aria-controls="navs-pills-top-profile" aria-selected="false">
                            Other Details
                        </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-messages" aria-controls="navs-pills-top-messages" aria-selected="false">
                            Upload Documents
                        </button>
                    </li>
                </ul>
                <div class="tab-content">

                    <!-- Personal Details Form -->
                    <div class="tab-pane fade show active" id="navs-pills-top-home" role="tabpanel">
                        <!-- Full Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input class="form-control" type="text" id="name" placeholder="Surname Firstname Fathername" />
                        </div>

                        <!-- Mobile Number -->
                        <div class="mb-3">
                            <label for="mobile" class="form-label">Mobile number</label>
                            <input class="form-control" type="number" id="mobile" placeholder="Mobile number" />
                        </div>

                        <!-- email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" placeholder="name@example.com" readonly value="abc@gmail.com" />
                        </div>

                        <!-- Address -->
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" id="address" rows="3"></textarea>
                        </div>

                        <div class="row">
                            <!-- City -->
                            <div class="col-3">
                                <div class="mb-3">
                                    <label for="city" class="form-label">City</label>
                                    <input class="form-control" type="text" id="city" placeholder="City" />
                                </div>
                            </div>
                            <!-- State -->
                            <div class="col-3">
                                <div class="mb-3">
                                    <label for="state" class="form-label">State</label>
                                    <input class="form-control" type="text" id="state" placeholder="State" />
                                </div>
                            </div>
                            <!-- Country -->
                            <div class="col-3">
                                <div class="mb-3">
                                    <label for="country" class="form-label">Country</label>
                                    <input class="form-control" type="text" id="city" placeholder="Country" />
                                </div>
                            </div>
                            <!-- Pincode -->
                            <div class="col-3">
                                <div class="mb-3">
                                    <label for="pincode" class="form-label">Pincode</label>
                                    <input class="form-control" type="number" id="pincode" placeholder="Pincode" />
                                </div>
                            </div>
                        </div>

                        <!-- Date of birth -->
                        <div class="mb-3">
                            <label for="dob" class="form-label">Date of Birth</label>
                            <input class="form-control" type="date" value="2021-06-18" id="dob" />
                        </div>

                        <!-- Gender -->
                        <div class="row mb-3">
                            <div class="col-md">
                                <label for="dob" class="form-label">Select Gender</label>
                                <div class="form-check">
                                    <input name="Gender" class="form-check-input" type="radio" value="" id="male" />
                                    <label class="form-check-label" for="male"> Male </label>
                                </div>
                                <div class="form-check">
                                    <input name="Gender" class="form-check-input" type="radio" value="" id="Female" />
                                    <label class="form-check-label" for="Female"> Female </label>
                                </div>
                            </div>
                        </div>

                        <!-- Qualification -->
                        <div class="mb-3">
                            <label for="qualification" class="form-label">Qualification</label>
                            <select id="qualification" class="form-select">
                                <option disabled selected>-- SELECT QAULIFICATION --</option>
                                <option value="1">10th Pass</option>
                                <option value="2">12th Pass</option>
                                <option value="3">BE / B.TECH / BCA / BCOM / BBA</option>
                            </select>
                        </div>

                        <div class="row mt-3">
                            <div class="col-6"> <label for="profilepic" class="form-label">Profile Picture</label></div>
                            <div class="col-6"> <label for="profilepic" class="form-label">Signature</label></div>
                        </div>

                        <div class="row mb-3">
                            <!-- Upload Profile Photo -->
                            <div class="col-6">
                                <div class="d-flex align-items-start gap-4">
                                    <img src="<?php echo ASSETS_URL . "/img/avatars/1.png"; ?>" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                                    <div class="button-wrapper">
                                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                            <span class="d-none d-sm-block">Upload new photo</span>
                                            <i class="bx bx-upload d-block d-sm-none"></i>
                                            <input type="file" id="upload" class="account-file-input" hidden accept="image/png, image/jpeg" />
                                        </label>
                                        <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                            <i class="bx bx-reset d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Reset</span>
                                        </button>

                                        <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Upload Signature -->
                            <div class="col-6">
                                <div class="d-flex align-items-start gap-4">
                                    <img style="width: 150px; height:50px;" src="<?php echo ASSETS_URL . "/img/avatars/1.png"; ?>" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                                    <div class="button-wrapper">
                                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                            <span class="d-none d-sm-block">Upload new photo</span>
                                            <i class="bx bx-upload d-block d-sm-none"></i>
                                            <input type="file" id="upload" class="account-file-input" hidden accept="image/png, image/jpeg" />
                                        </label>
                                        <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                            <i class="bx bx-reset d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Reset</span>
                                        </button>

                                        <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-0" />
                        <div class="row mt-3">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-danger mx-3">reset</button>
                            </div>
                        </div>

                    </div><!-- Other Details -->

                    <div class="tab-pane fade" id="navs-pills-top-profile" role="tabpanel">
                        <div>
                            <div class="mb-3">
                                <label for="fathername" class="form-label">Father Name</label>
                                <input class="form-control" type="text" id="fname" placeholder="Surname Firstname Fathername" />
                            </div>
                            <div class="mb-3">
                                <label for="foccupation" class="form-label">Father Occupation</label>
                                <select id="foccupation" class="form-select">
                                    <option selected>-- Select Occupation --</option>
                                    <option value="1">Job</option>
                                    <option value="2">Business</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="mothername" class="form-label">Mother Name</label>
                                <input class="form-control" type="text" id="mname" placeholder="Surname Firstname Husbandname" />
                            </div>

                            <div class="mb-3">
                                <label for="moccupation" class="form-label">Mother Occupation</label>
                                <select id="moccupation" class="form-select">
                                    <option selected>-- Select Occupation --</option>
                                    <option value="1">Housewife</option>
                                    <option value="2">Job</option>
                                    <option value="3">Business</option>
                                </select>
                            </div>
                            <!-- Mobile Number -->
                            <div class="mb-3">
                                <label for="econtact" class="form-label">Emergency contact number</label>
                                <input class="form-control" type="number" id="mobile" placeholder="Emergency contact number" />
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-danger">reset</button>
                                </div>
                            </div>




                        </div>
                    </div>

                   


                    <div class="tab-pane fade" id="navs-pills-top-messages" role="tabpanel">
                        <!-- Adhar Card -->
                        <div class="row d-flex align-items-center mb-3">
                            <label for="html5-range" class="col-md-2 col-form-label">Aadharcard</label>
                            <div class="col-5">
                                <input class="form-control-sm form-control" type="file" id="aadharcard" accept="application/pdf" />
                            </div>
                            <div class="col-3">
                                <input id="aadharno" class="form-control form-control-sm" type="number" placeholder="Aadhar Number" />
                            </div>
                            <div class="col-2">
                                <a class="btn btn-primary btn-sm" href="<?php echo PAGES_URL . "/services/serviceDetails.php"; ?>">Upload</a>
                            </div>
                        </div>

                        <!-- Pan Card -->
                        <div class="row d-flex align-items-center mb-3">
                            <label for="html5-range" class="col-md-2 col-form-label">Pancard</label>
                            <div class="col-5">
                                <input class="form-control-sm form-control" type="file" id="pancard" accept="application/pdf" />
                            </div>
                            <div class="col-3">
                                <input id="pancardno" class="form-control form-control-sm" type="number" placeholder="Pan Number" />
                            </div>
                            <div class="col-2">
                                <a class="btn btn-primary btn-sm" href="<?php echo PAGES_URL . "/services/serviceDetails.php"; ?>">Upload</a>
                            </div>
                        </div>
                        <!-- VoterID Card -->
                        <div class="row d-flex align-items-center mb-3">
                            <label for="html5-range" class="col-md-2 col-form-label">VoterID</label>
                            <div class="col-5">
                                <input class="form-control-sm form-control" type="file" id="pancard" accept="application/pdf" />
                            </div>
                            <div class="col-3">
                                <input id="pancardno" class="form-control form-control-sm" type="number" placeholder="VoterID Number" />
                            </div>
                            <div class="col-2">
                                <a class="btn btn-primary btn-sm" href="<?php echo PAGES_URL . "/services/serviceDetails.php"; ?>">Upload</a>
                            </div>
                        </div>

                        <!-- Electricity Bill -->
                        <div class="row d-flex align-items-center mb-3">
                            <label for="elecricity" class="col-md-2 col-form-label">Electricity Bill</label>
                            <div class="col-5">
                                <input class="form-control-sm form-control" type="file" id="elecricity" accept="application/pdf" />
                            </div>
                            <div class="col-3">
                                <input id="elecricityno" class="form-control form-control-sm" type="number" placeholder="Bill Number" />
                            </div>
                            <div class="col-2">
                                <a class="btn btn-primary btn-sm" href="<?php echo PAGES_URL . "/services/serviceDetails.php"; ?>">Upload</a>
                            </div>
                        </div>

                        <!-- Tax Bill -->
                        <div class="row d-flex align-items-center mb-3">
                            <label for="texbill" class="col-md-2 col-form-label">Tax Bill</label>
                            <div class="col-5">
                                <input class="form-control-sm form-control" type="file" id="taxbill" accept="application/pdf" />
                            </div>
                            <div class="col-3">
                                <input id="taxbillno" class="form-control form-control-sm" type="number" placeholder="TaxBill Number" />
                            </div>
                            <div class="col-2">
                                <a class="btn btn-primary btn-sm" href="<?php echo PAGES_URL . "/services/serviceDetails.php"; ?>">Upload</a>
                            </div>
                        </div>

                        <!-- 10th Marksheet -->
                        <div class="row d-flex align-items-center mb-3">
                            <label for="marksheet10" class="col-md-2 col-form-label">10th Marksheet</label>
                            <div class="col-5">
                                <input class="form-control-sm form-control" type="file" id="marksheet10" accept="application/pdf" />
                            </div>
                            <div class="col-3">
                                <input id="marksheetno10" class="form-control form-control-sm" type="number" placeholder="Marksheet Number" />
                            </div>
                            <div class="col-2">
                                <a class="btn btn-primary btn-sm" href="<?php echo PAGES_URL . "/services/serviceDetails.php"; ?>">Upload</a>
                            </div>
                        </div>

                        <!-- 12th Marksheet -->
                        <div class="row d-flex align-items-center mb-3">
                            <label for="marksheet12" class="col-md-2 col-form-label">12th Marksheet</label>
                            <div class="col-5">
                                <input class="form-control-sm form-control" type="file" id="marksheet12" accept="application/pdf" />
                            </div>
                            <div class="col-3">
                                <input id="marksheetno12" class="form-control form-control-sm" type="number" placeholder="Marksheet Number" />
                            </div>
                            <div class="col-2">
                                <a class="btn btn-primary btn-sm" href="<?php echo PAGES_URL . "/services/serviceDetails.php"; ?>">Upload</a>
                            </div>
                        </div>

                        <!-- School Leaving -->
                        <div class="row d-flex align-items-center mb-3">
                            <label for="leaving" class="col-md-2 col-form-label">School Leaving</label>
                            <div class="col-5">
                                <input class="form-control-sm form-control" type="file" id="leaving" accept="application/pdf" />
                            </div>
                            <div class="col-3">
                                <input id="leaving" class="form-control form-control-sm" type="number" placeholder="School Leaving Number" />
                            </div>
                            <div class="col-2">
                                <a class="btn btn-primary btn-sm" href="<?php echo PAGES_URL . "/services/serviceDetails.php"; ?>">Upload</a>
                            </div>
                        </div>

                        <!-- Birth Certificate -->
                        <div class="row d-flex align-items-center mb-3">
                            <label for="birthcertificate" class="col-md-2 col-form-label">Birth Certificate</label>
                            <div class="col-5">
                                <input class="form-control-sm form-control" type="file" id="birthcertificate" accept="application/pdf" />
                            </div>
                            <div class="col-3">
                                <input id="birthcertificate" class="form-control form-control-sm" type="number" placeholder="Birth Certificate Number" />
                            </div>
                            <div class="col-2">
                                <a class="btn btn-primary btn-sm" href="<?php echo PAGES_URL . "/services/serviceDetails.php"; ?>">Upload</a>
                            </div>
                        </div>


                        <div>
                            <a class="btn btn-primary mt-3" href="<?php echo PAGES_URL . "/services/serviceDetails.php"; ?>">Submit</a>
                        </div>
                    </div>
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