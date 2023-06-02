<?php require '../config.php'; ?>

<!-- Header Links : CSS , Meta tags -->
<?php include INC_URL . '/__headerLinks.php'; ?>

<!-- Sidebar : LEFT -->
<?php include INC_URL . '/__sidebar.php'; ?>

<!-- Navbar : TOP -->
<?php include INC_URL . '/__navbar.php'; ?>

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>

    <div class="row">
        <div class="col-md-12">

            <div class="card mb-4">
                <h5 class="card-header">Profile Details</h5>
                <!-- Account -->
                <div class="card-body">
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img src="../assets/img/avatars/1.png" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
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
                <hr class="my-0" />
                <div class="card-body">
                    <form id="formAccountSettings" method="POST" onsubmit="return false">
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
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Save changes</button>
                            <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                        </div>
                    </form>











                </div>
                <!-- /Account -->
            </div>
            <div class="card">
                <h5 class="card-header">Delete Account</h5>
                <div class="card-body">
                    <div class="mb-3 col-12 mb-0">
                        <div class="alert alert-warning">
                            <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete your account?</h6>
                            <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
                        </div>
                    </div>
                    <form id="formAccountDeactivation" onsubmit="return false">
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation" />
                            <label class="form-check-label" for="accountActivation">I confirm my account deactivation</label>
                        </div>
                        <button type="submit" class="btn btn-danger deactivate-account">Deactivate Account</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer : BOTTOM -->
<?php include INC_URL . '/__footer.php'; ?>

<!-- Footer Links : JAVASCRIPT -->
<?php include INC_URL . '/__footerLinks.php'; ?>