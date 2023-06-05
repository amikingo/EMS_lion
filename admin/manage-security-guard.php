<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

include('includes/dbconnection.php');
if (empty($_SESSION['osghsaid'])) {
    header('location:logout.php');
} else {
    // Code for Deletion
    if (isset($_GET['delid'])) {
        $gid = $_GET['delid'];
        $query = $dbh->prepare("UPDATE tblguard SET isAssigned = '0', trash = '1', companyName = '', expiration_interval = '0', expir_date = '0000-00-00'  WHERE ID = :gid");
        $query->bindParam(':gid', $gid, PDO::PARAM_STR);
        if ($query->execute()) {
            $alertStyle = "success";
            $statusMsg = "Record has been deleted.";
        } else {
            $alertStyle = "danger";
            $statusMsg = "Failed to delete record.";
        }
    }

    // Add CSS to the error message
    echo "<style>
    .danger {
        background-color: #f8d7da;
        color: red;
        font-weight: bold;
        align-items: center;
        justify-content: center;
        display: flex;
        padding: 10px;
    }
    </style>";

    // Rest of the code
?>
<!DOCTYPE html>
<html>
<head>
 
  <title>Security Employee</title>
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
            <h1>Manage Security Employee</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Manage Security Employee</li>
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
              <h3 class="card-title">Manage Security Employee</h3>
            </div>
            <!-- /.card-header -->
            <strong> <div class="<?php echo $alertStyle;?>" role="alert"><?php echo $statusMsg;?></strong></div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>Name</th>
                  <th>Mobile Number</th>                  
                  <th>Registration Date</th>
                  <th>Status</th>
                  <th>Action</th>
                
                </tr>
                </thead>
                 <?php
$sql="SELECT * from tblguard where isTrainer = '0' AND trash = '0'";
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
                  <td><?php  echo htmlentities($row->MobileNumber);?></td>
              <td><?php  echo htmlentities($row->RegistrationDate);?></td>
              <td><?php  if($row->isAssigned =="1")

{
echo "Assigned";

} else{



 ($row->isAssigned=="0");
 {
echo "Unsigned";
 }

 ;}?> </td>
                  <td> <a href="edit-guard-detail.php?editid=<?php echo htmlentities ($row->ID);?>" class="btn btn-primary">Edit</a>

<a href="manage-security-guard.php?delid=<?php echo htmlentities ($row->ID);?>" onClick="return confirm('Do you really want to delete?');" class="btn btn-danger">Delete</a>

                  </td>
                </tr>      
                <?php $cnt=$cnt+1;}} ?> 
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

