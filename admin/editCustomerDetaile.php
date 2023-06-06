<?php
session_start();
//error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['osghsaid']) == 0) {
  header('location:logout.php');
} else {
  if (isset($_POST['submit'])) {
    $eid = $_GET['editid'];
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $email = $_POST['email'];
    $companyName = $_POST['companyName'];

    $sql = "UPDATE users SET FirstName=:FirstName, LastName=:LastName, email=:email, companyName=:companyName WHERE id=:eid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':FirstName', $FirstName, PDO::PARAM_STR);
    $query->bindParam(':LastName', $LastName, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':companyName', $companyName, PDO::PARAM_STR);
    $query->bindParam(':eid', $eid, PDO::PARAM_INT);
    $query->execute();

    $alertStyle = "success alert-dismissible fade show\" role=\"alert\"";
    $statusMsg = "Customer Status has been updated";

    

    echo "<style>
      .success {
        background-color: #d4edda;
        color: green;
        font-weight: bold;
      }
    </style>";
  }
?>
<!DOCTYPE html>
<html>
<head>
  
  <title>Lion Security Services | Update Customer details</title>
  <link href="dist/img/fav.png" rel="icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
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
            <h1>Update Customer Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Update Customer Details</li>
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
                <h3 class="card-title">Update Customer Details</h3>
              </div>
              <!-- /.card-header -->
              <strong> <div class="<?php echo $alertStyle;?>" role="alert"><?php echo $statusMsg;?></strong></div>
              <!-- form start -->
              <form role="form" method="post" enctype="multipart/form-data">
                <?php
                   $eid=$_GET['editid'];

$sql="SELECT * from users where id=$eid";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                <div class="card-body">
                     <div class="form-group">
                    <label for="exampleInputEmail1">First Name</label>
                    <input type="text" class="form-control" id="name" name="FirstName" value="<?php echo htmlentities($row->FirstName);?>" required="true" >
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Last Name</label>
                    <input type="text" class="form-control" id="mobilenumber" name="LastName" value="<?php echo htmlentities($row->LastName);?>" required="true" >
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email Address</label>
                    <textarea type="text" class="form-control" id="address" name="email" placeholder="Address" required="true" ><?php echo htmlentities($row->email);?></textarea>
                  </div>  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Company Name</label>
                    <input type="text" class="form-control" id="mobilenumber" name="companyName" value="<?php echo htmlentities($row->companyName);?>" required="true" >
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputEmail1">About Company Attachable File </label>
                    <button><a href="../customer/login/cfile/<?php echo htmlentities($row->file); ?>" target="_blank/">View File</a></button>

                  </div>  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Status</label>
                    <input type="text" class="form-control" id="idnum" name="idnum" required="true" value="<?php if (htmlentities($row->status) == 1){
                    echo 'Account is Approved';
                }else if(htmlentities($row->status) == 0){
                    echo 'Account is Rejected';
                }else if (htmlentities($row->status) == 2){
                    echo 'Account is on Pending';
                }else if (htmlentities($row->status) == 3){
                    echo 'Account is Banned!!';
                }

                 ?>" readonly>
                  </div>             
                </div>
              <?php $cnt=$cnt+1;}} ?> 
                <div class="card-footer">
                  <button onclick="return confirm('Are you sure you want to Apply Changes?')" type="submit" class="btn btn-primary" name="submit">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
          <!-- right column -->
         
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
<?php }  ?>