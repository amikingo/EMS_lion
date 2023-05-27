<?php include 'dbconnection.php'?>
<!DOCTYPE html>
<html>
<head>
 
  <title>Lion Security Services | View Guards</title>
  <!-- Tell the browser to be responsive to screen width -->

  <link href="../admin/dist/img/fav.png" rel="icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../admin/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/header.css"/>
  <style>
    #footer .social-links a {
    font-size: 18px;
    display: inline-block;
    background: #007bff !important;
    color: #fff;
    line-height: 1;
    padding: 8px 0;
    margin-right: 4px;
    border-radius: 50%;
    text-align: center;
    width: 36px;
    height: 36px;
    transition: 0.3s;
}

#footer .social-links a:hover {
    background: #095bb1 !important;
    color: #fff;
    text-decoration: none;
}
  </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
 
  
  <!-- Content Wrapper. Contains page content -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
      <a class="navbar-brand" href="index.php"></a>
   
      <img alt="logo" src="../assets/img/LOGO.png" style="width: 800px;height: 50px;">
      

      <nav class="nav-menu d-none d-lg-block"style="margin-left: 400px;">
	  <ul>
  <li><a href="Home.php"><button type="button" class="btn btn-primary">Home</button></a></li>
  <li><a href="About us.php"><button type="button" class="btn btn-primary">About Us</button></a></li>
  <li><a href="contact us.php"><button type="button" class="btn btn-primary">Contact Us</button></a></li>
  <li class="drop-down">
    <button type="button" class="btn btn-primary">Request</button>
    <ul class="submenu">
      <li><a href="index.php">Request Employee</a></li>
      <li class="active"><a href="search-request.php">Check Request</a></li>
    </ul>
  </li>
  <li class="drop-down">
    <button type="button" class="btn btn-primary">My Account</button>
    <ul class="submenu">
      <li><a href="login/profile.php">Profile</a></li>
      <li><a href="login/change-password.php">Change Password</a></li>
      <li><a href="login/logout.php">Logout</a></li>
    </ul>

  </li>
</ul>
      </nav>
    </div>
  </header>
  <br><br><br><br><br>

    <!-- Main content -->
    <section class="content">
      <div class="row">
    <div class="col-12">
        
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Gurads List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

              <!-- Split The Guards In terms of Comma ',' And Display it in the Table -->
                <?php 
  $guards = $_POST['Guards'];
  $guard_names = explode(',', $guards);
?>
<input type="hidden" name="Guards" value="<?php echo $guards;?>">

<table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>S.No</th>
      <th>Photo</th>
      <th>Name</th>
      <th>Address</th>
      <th>ID</th>
      <th>Contact Number</th>                    
    </tr>
  </thead>
  <tbody>
    <?php
      $cnt = 1;
      $placeholders = implode(',', array_fill(0, count($guard_names), '?'));
      $sql = "SELECT * FROM tblguard WHERE ID IN ($placeholders)";
      $query = $dbh->prepare($sql);
      $query->execute($guard_names);
      $results = $query->fetchAll(PDO::FETCH_OBJ);
      if ($query->rowCount() > 0) {
        foreach ($results as $row) {
    ?>
    <tr>
      <td><?php echo htmlentities($cnt)?></td>
      <td><img src="../admin/images/<?php echo $row->Profilepic;?>" class="img circle" width="100"></td>
      <td><?php echo htmlentities($row->Name);?></td>
      <td><?php echo htmlentities($row->Address);?></td>
      <td><?php echo htmlentities($row->IDnumber);?></td>
      <td><?php echo htmlentities($row->MobileNumber);?></td>
    </tr>
    <?php
          $cnt++;
        }
      }
    ?>
  </tbody>
</table>

              
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <br><br><br><br><br>
  <footer id="footer">

<div class="footer-top">
  <div class="container">
    <div class="row">

    <div class="col-lg-9 col-md-6 footer-contact">
        <h3>Lion Security Services</h3>
        <p>
          Ethiopia Addis Ababa,<br>
          Mekanisa,<br><br>
          <strong>Phone:</strong> +251 116 683333 , +251 930 519202<br>
          <strong>Email:</strong> www.lionsecurityservices.com<br>
        </p>
      </div>
      <div class="col-lg-2 col-md-6 footer-links">
        <h4>Useful Links</h4>
        <ul>
          <li><i class="bx bx-chevron-right"></i> <a href="index.php">Home</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="About us.php" style="color:black !important;">About us</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="contact us.php" style="color:black !important;">Contact us</a></li>
        </ul>
      </div>
    
<div class="container d-md-flex py-4">

  <div class="mr-md-auto text-center text-md-left">
    <div class="copyright">
      &copy; <strong><span>Lion Security Services PLC</span></strong> - <?php echo date('Y');?> - Developed By REHA TECH
    </div>
    <div class="credits">
    </div>
  </div>
  <div class="social-links text-center text-md-right pt-3 pt-md-0">
    <a href="#" class="twitter"><i  style="color:#fff;" class="bx bxl-twitter"></i></a>
    <a href="#" class="facebook"><i style="color:#fff;" class="bx bxl-facebook"></i></a>
    <a href="#" class="instagram"><i style="color:#fff;" class="bx bxl-instagram"></i></a>
    <a href="#" class="google-plus"><i style="color:#fff;" class="bx bxl-skype"></i></a>
    <a href="#" class="linkedin"><i style="color:#fff;" class="bx bxl-linkedin"></i></a>
  </div>
</div>
</footer><!-- End Footer -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../admin/plugins/datatables/jquery.dataTables.js"></script>
<script src="../admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="../admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../admin/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
</body>
</html>
