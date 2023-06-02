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
  $obj->authority_id = $_SESSION['Authority_id'];
  $obj->service_id = $_SESSION['Authority_service_id'];
  $obj->table_id = $_SESSION['Authority_table_id'];
  $result_dpsall  = $obj->ALLdps();
?>

  <div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="card">
        <h5 class="card-header">Users for Passport</h5>
        <div class="table-responsive text-nowrap">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>User ID</th>
                <th>Service ID</th>
                <th>Tracking ID</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              <?php
              $temp = '';
              if ($result_dpsall->num_rows > 0) :
                foreach ($result_dpsall as $row) :
                  if ($temp == $row['tracking_id']) {
                  } else {

              ?>
                    <tr>
                      <td><i class="fab fa-angular fa-lg me-3"><?php echo $row['user_id']; ?></i></td>
                      <td><?php echo $row['service_id']; ?></td>
                      <td><?php echo $row['tracking_id']; ?></td>
                      <td><span class="badge bg-label-primary me-1">Active</span></td>
                      <td><a href="<?php echo PAGES_URL . "/services/authority_doc_view.php?user_id=" . $row['user_id']; ?>" class="badge bg-label-primary me-1">View</a></td>
                    </tr>
              <?php
                    $temp = $row['tracking_id'];
                  }
                endforeach;
              endif;

              ?>
            </tbody>
          </table>
        </div>
      </div>

    </div>

  </div>

<?php endif; ?>



<!-- Footer : BOTTOM -->
<?php include INC_URL . '/__footer.php'; ?>

<!-- Footer Links : JAVASCRIPT -->
<?php include INC_URL . '/__footerLinks.php'; ?>