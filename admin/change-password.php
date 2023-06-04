<?php
session_start();
include('includes/dbconnection.php');

if (strlen($_SESSION['osghsaid']) == 0) {
  header('location:logout.php');
} else {
  if (isset($_POST['submit'])) {
    $adminid = $_SESSION['osghsaid'];
    $cpassword = md5($_POST['currentpassword']);
    $newpassword = md5($_POST['newpassword']);
    $sql = "SELECT ID FROM tbladmin WHERE ID=:adminid and Password=:cpassword";
    $query = $dbh->prepare($sql);
    $query->bindParam(':adminid', $adminid, PDO::PARAM_STR);
    $query->bindParam(':cpassword', $cpassword, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_OBJ);

    if ($query->rowCount() > 0) {
      $con = "UPDATE tbladmin SET Password=:newpassword, firstTime = '1' WHERE ID=:adminid";
      $chngpwd1 = $dbh->prepare($con);
      $chngpwd1->bindParam(':adminid', $adminid, PDO::PARAM_STR);
      $chngpwd1->bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
      $chngpwd1->execute();

      $alertStyle = "success";
      $statusMsg = "Your password has been successfully changed.";
    } else {
      $alertStyle = "danger";
      $statusMsg = "Your current password is wrong!";
    }
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Lion Security Services | Change Password</title>
  <link href="dist/img/fav.png" rel="icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script type="text/javascript">
    function checkpass() {
      if (document.changepassword.newpassword.value != document.changepassword.confirmpassword.value) {
        alert('New Password and Confirm Password fields do not match');
        document.changepassword.confirmpassword.focus();
        return false;
      }
      return true;
    }
  </script>
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <?php include_once('includes/header.php');?>

    <?php include_once('includes/sidebar.php');?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Change Password</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">Change Password</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Change Password</h3>
                </div>
                <!-- /.card-header -->
                <strong>
                  <div class="<?php echo $alertStyle;?>" role="alert"><?php echo $statusMsg;?></strong></div>
                <!-- form start -->
                <form name="changepassword" method="post" onsubmit="return checkpass();" action="">
                  <div class="card-body card-block">
                    <div class="form-group">
                      <label for="company" class=" form-control-label">Current Password</label>
                      <input type="password" name="currentpassword" id="currentpassword" class="form-control" required="">
                    </div>
                    <div class="form-group">
                      <label for="vat" class=" form-control-label">New Password</label>
                      <input type="password" name="newpassword"  class="form-control" required="">
                    </div>
                    <div class="form-group">
                      <label for="street" class=" form-control-label">Confirm Password</label>
                      <input type="password" name="confirmpassword" id="confirmpassword" value=""  class="form-control">
                    </div>
                  </div>
                  <p style="text-align: center;">
                    <button type="submit" class="btn btn-primary btn-sm" name="submit" id="submit">
                      <i class="fa fa-dot-circle-o"></i> Change
                    </button>
                  </p>
                </form>
              </div>
              <!-- /.card -->
            </div>
            <!--/.col (left) -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php include_once('includes/footer.php');?>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- bs-custom-file-input -->
  <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <script type="text/javascript">
    $(document).ready(function () {
      bsCustomFileInput.init();
    });
  </script>
</body>
</html>
