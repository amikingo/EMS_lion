<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['osghsaid']) == 0) {
    header('location:logout.php');
    exit();
} else {
?>
<!DOCTYPE html>
<html>
<head>
  <title>All Employee List</title>
  <!-- Tell the browser to be responsive to screen width -->
  <link href="dist/img/fav.png" rel="icon">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
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
            <h1>Employee List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard_store.php">Home</a></li>
              <li class="breadcrumb-item active">New Order</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">New Order</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                <th>Full Name</th>
                    <th>Gender</th>
                    <th>ID Number</th>
                    <th>Address</th>
                    <th>Mobile Number</th>
                    <th>Expire Date</th>
                    <th>Remaining Time</th>
                    <th>Action</th>
                  </tr>
                </thead>

                <?php
                $sql = "SELECT * FROM tblguard WHERE isAssigned='1' AND expir_date <= DATE_ADD(CURDATE(), INTERVAL expiration_interval MONTH) AND expir_date >= CURDATE()";
                $query = $dbh->prepare($sql);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);

                $cnt = 1;
                if ($query->rowCount() > 0) {
                    foreach ($results as $row) {
                ?>
                <tr>
                    <td><?php echo htmlentities($cnt); ?></td>
                    <td><?php echo htmlentities($row->Name); ?></td>
                    <td><?php  if($row->gender =="0")
  {
        echo "Male";
      }
  elseif($row->gender =="1"){
    echo "Female";
  }

      ;?></td>
                    <td><?php echo htmlentities($row->ID); ?></td>
                    <td><?php echo htmlentities($row->Address); ?></td>
                    <td><?php echo htmlentities($row->MobileNumber); ?></td>
                    <td>
                        <?php echo htmlentities($row->expir_date); ?>
                       
                    </td>
                    <td> <span id="countdown_<?php echo $cnt; ?>"></span></td>
                    <td><a href="employeeDetailsStore.php?editid=<?php echo htmlentities($row->ID);?>" class="btn btn-primary">View</a></td>
                </tr>
                <script>
                    // Calculate countdown for each row
                    var expiryDate_<?php echo $cnt; ?> = new Date("<?php echo $row->expir_date; ?>").getTime();
                    var countdownElement_<?php echo $cnt; ?> = document.getElementById("countdown_<?php echo $cnt; ?>");

                    // Update countdown every second
                    var countdownInterval_<?php echo $cnt; ?> = setInterval(function() {
                        var now_<?php echo $cnt; ?> = new Date().getTime();
                        var distance_<?php echo $cnt; ?> = expiryDate_<?php echo $cnt; ?> - now_<?php echo $cnt; ?>;

                        // Calculate days, hours, minutes, and seconds
                        var days_<?php echo $cnt; ?> = Math.floor(distance_<?php echo $cnt; ?> / (1000 * 60 * 60 * 24));
                        var hours_<?php echo $cnt; ?> = Math.floor((distance_<?php echo $cnt; ?> % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        var minutes_<?php echo $cnt; ?> = Math.floor((distance_<?php echo $cnt; ?> % (1000 * 60 * 60)) / (1000 * 60));
                        var seconds_<?php echo $cnt; ?> = Math.floor((distance_<?php echo $cnt; ?> % (1000 * 60)) / 1000);

                        // Display the countdown
                        countdownElement_<?php echo $cnt; ?>.innerHTML = days_<?php echo $cnt; ?> + "d " + hours_<?php echo $cnt; ?> + "h " + minutes_<?php echo $cnt; ?> + "m " + seconds_<?php echo $cnt; ?> + "s";

                        // If the countdown is finished, display expired message
                        if (distance_<?php echo $cnt; ?> < 0) {
                            clearInterval(countdownInterval_<?php echo $cnt; ?>);
                            countdownElement_<?php echo $cnt; ?>.innerHTML = "Expired";
                        }
                    }, 1000);
                </script>
                <?php
                    $cnt++;
                    }
                }
                ?>
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
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
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
<?php } ?>
