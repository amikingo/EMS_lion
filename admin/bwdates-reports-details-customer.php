<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['osghsaid']==0)) {
  header('location:logout.php');
  } else{



  ?>
<!DOCTYPE html>
<html>
<head>
 
  <title>Lion Security Services | Between dates reports of hiring guards</title>
  <!-- Tell the browser to be responsive to screen width -->


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
            <h1>Between dates reports of guards</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Between dates reports of guards</li>
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
              <h3 class="card-title">Between dates reports of guards</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form role="form" method="post" name="printReportforCustomer" action="print/printCustomerDetailsFromHR/print.php">
              <?php
$fdate=$_POST['fromdate'];
$tdate=$_POST['todate'];
$selectName=$_POST['selectName'];
?>
<h5 align="center" style="color:blue">Report from <?php echo $fdate?> to <?php echo $tdate?> By <?php if($selectName == 2){echo "Pending";}elseif ($selectName == 1) {
  echo "Approved";
}else{
echo "Rejected";}?></h5>  
<input type="hidden" class="form-control" id="formType" name="formType" value="<?php if($selectName == 2){echo "Pending";}elseif ($selectName == 1) {
  echo "Approved";
}else{
echo "Rejected";}
?>" required='true'>
<input type="hidden" class="form-control" id="formType" name="fDate" value="<?php echo $fdate?>" required='true'>
<input type="hidden" class="form-control" id="formType" name="tDate" value="<?php echo $tdate;?>" required='true'>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>S.No</th>
                    <th>Booking Number</th>
                    <th>Name</th>
                    <th>Email</th>

                  </tr>
                </thead>
                 <?php
$sql="SELECT * from users where date(AdminRegdate) between '$fdate' and '$tdate' AND Status = '$selectName'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                <tr>
                    <td><?php echo htmlentities($cnt);?></td>
                    <td><?php  echo htmlentities($row->companyName);?></td>
                    <td><?php  echo htmlentities($row->FirstName);?> <?php  echo htmlentities($row->LastName);?>
                    </td>
                    <td><?php  echo htmlentities($row->email);?></td>
                    
                  </tr>     
                <?php $cnt=$cnt+1;}} ?> 
              </table>
                 <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit">Print</button>
                </div>
            </form>
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
<?php }  ?>