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
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
 
  
  <!-- Content Wrapper. Contains page content -->
 

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
              <?php 
              $Guards = $_POST['Guards'];
              ?>
              <input type="text" name="Guards" value="<?php echo $Guards;?>">
              <!-- Split The Guards In terms of Comma ',' And Display it in the Table -->
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>ID</th>
                    <th>Contact Number</th>                    
                  </tr>
                </thead>
                <tr>
                    <td><?php echo htmlentities($cnt);?></td>
                    <td><?php  echo htmlentities($row->Name);?></td>
                    <td><?php  echo htmlentities($row->Address);?></td>
                    <td><?php  echo htmlentities($row->IDnumber);?></td>
                    <td> <?php  echo htmlentities($row->MobileNumber);?></td>
                  </tr>     
                 
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
