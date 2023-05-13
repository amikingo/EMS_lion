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
 
  <title>New Order</title>
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
            <h1>New Order</h1>
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
                    <th>Name</th>
                    <th>ID Number</th>
                    <th>Address</th>
                    <th>Mobile Number</th>
                    <th>Action</th>
                  </tr>
                </thead>
                 <?php
$sql="SELECT * from tblguard where isAssigned='1' AND UniformAssigned='0'  AND isTrainer='0' ";
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
                    <td><?php  echo htmlentities($row->Name);?></td>
                    <td><?php  echo htmlentities($row->IDnumber);?></td>
                    <td><?php  echo htmlentities($row->Address);?></td>
                    <td> <?php  echo htmlentities($row->MobileNumber);?></td>
                  

                    <td><a href="employeeDetailsStore.php?editid=<?php echo htmlentities ($row->ID);?>" class="btn btn-primary"> View</td>
                  </tr>     
                <?php $cnt=$cnt+1;}} ?> 
              </table>
              
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
              <br>
       <section class="content">
      <div class="row">
        <div class="col-12">
              <div class="card">
            <div class="card-header">
              <h3 class="card-title">New Order</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <label>Group By Company Name</label>
                            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Company Name</th>
                    <th>PreExpire Month</th>
                    <th>Action</th>
                  </tr>
                </thead>
                
<?php
if(isset($_POST['assignUniform'])) {
    $companyName = $_POST['companyName'];
    $UniformAssigned = 1;
    $expiration_interval = $_POST['expiration_interval'];

    $sql = "UPDATE tblguard SET UniformAssigned=:UniformAssigned, expiration_interval=:expiration_interval WHERE companyName=:companyName AND isAssigned='1' AND UniformAssigned='0' AND isTrainer='0'";
    $query = $dbh->prepare($sql);
    $query->bindParam(':UniformAssigned', $UniformAssigned, PDO::PARAM_INT);
    $query->bindParam(':expiration_interval', $expiration_interval, PDO::PARAM_STR);
    $query->bindParam(':companyName', $companyName, PDO::PARAM_STR);
    $query->execute();

    echo '<script>alert("Security Guard Detail has been updated")</script>';
}

$sql = "SELECT * FROM tblguard WHERE isAssigned='1' AND UniformAssigned='0' AND isTrainer='0' GROUP BY companyName";
$query = $dbh->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);

$cnt = 1;
if ($query->rowCount() > 0) {
    foreach ($results as $row) {
        if (!empty(trim($row->companyName))) {
            ?>
            <tr>
              <form method="POST">
                <td><?php echo htmlentities($cnt);?></td>
                <td><?php echo htmlentities($row->companyName);?></td>
                <td>
                    <select name="expiration_interval" id="status" class="form-control">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </td>
                <td>
                    
                        <a href="groupOrder.php?editid=<?php echo htmlentities($row->ID);?>" class="btn btn-primary">View</a>
                        <input type="hidden" name="companyName" value="<?php echo htmlentities($row->companyName);?>">
                        <button type="submit" name="assignUniform" class="btn btn-primary">Assign Uniform</button>
                    </form>
                </td>
            </tr>
            <?php
            $cnt++;
        }
    }
}
?>

                 </table>
                </div>
              </div></div>
            </div>
              </section>
  </div>

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