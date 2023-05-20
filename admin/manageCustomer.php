<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['osghsaid']==0)) {
  header('location:logout.php');
  } else{

//Code for Deletion
 if ($_GET['delid']) {
$gid=$_GET['delid'];
$query=$dbh -> prepare("delete from users where id='$gid'");
$query->execute();
$alertStyle = "danger";
$statusMsg = "Record has been deleted.";
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
   //echo '<script>alert("Record has been deleted")</script>';
//echo "<script>window.location.href ='manageCustomer.php'</script>";
    }   

  ?>
<!DOCTYPE html>
<html>
<head>
 
  <title>Manage Customers</title>
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
            <h1>Manage Customers</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Manage Customers</li>
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
              <h3 class="card-title">Manage Customers</h3>
            </div>
            <!-- /.card-header -->
            <strong> <div class="<?php echo $alertStyle;?>" role="alert"><?php echo $statusMsg;?></strong></div>
            <div class="card-body">
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>First Name</th>
                  <th>Last Name</th>                  
                  <th>Email Address</th>
                  <th>Comapny Name</th>
                  <th>Status Of Account</th>
                  <th>Edit</th>
                  <th>Delete</th>
                
                </tr>
                </thead>
                 <?php
$sql="SELECT * from users";
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
                  <td><?php  echo htmlentities($row->FirstName);?></td>
                  <td><?php  echo htmlentities($row->LastName);?></td>
                  <td><?php  echo htmlentities($row->email);?></td>
                  <td><?php  echo htmlentities($row->companyName);?></td>
                  <td><?php  if (htmlentities($row->status) == 1){
                    echo 'Account is Approved';
                }else if(htmlentities($row->status) == 0){
                    echo 'Account is Rejected';
                }else if (htmlentities($row->status) == 2){
                    echo 'Account is on Pending';
                } 
                  ?></td>
     <td><a href="editCustomer.php?editid=<?php echo htmlentities ($row->id);?>" title="View"><i class="fa fa-edit fa-1x"></i></a></td>             
<td><a onclick="return confirm('Are you sure you want to delete?')" href="manageCustomer.php?delid=<?php echo htmlentities($row->id);?>" title="Delete Customer"><i class="fa fa-trash fa-1x"></i></a></td>
                </tr>

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
<?php }  ?>