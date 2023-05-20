<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['osghsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$eid=$_GET['editid'];
$name=$_POST['name'];
$UniformAssigned=1;
$mobnum=$_POST['mobilenumber'];
$address=$_POST['address'];
$idtype=$_POST['idtype'];
$idnum=$_POST['idnum'];
$expiration_interval=$_POST['expiration_interval'];
$expir_date = $_POST['expir_date'];

$sql="update tblguard set Name=:name,UniformAssigned=:UniformAssigned,MobileNumber=:mobilenumber,Address=:address,IDtype=:idtype,IDnumber=:idnum,expiration_interval=:expiration_interval, expir_date=:expir_date where ID=:eid";
$query=$dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':UniformAssigned',$UniformAssigned,PDO::PARAM_STR);
$query->bindParam(':expir_date',$expir_date,PDO::PARAM_STR);
$query->bindParam(':mobilenumber',$mobnum,PDO::PARAM_STR);
$query->bindParam(':address',$address,PDO::PARAM_STR);
$query->bindParam(':idtype',$idtype,PDO::PARAM_STR);
$query->bindParam(':idnum',$idnum,PDO::PARAM_STR);
$query->bindParam(':expiration_interval',$expiration_interval,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
 $query->execute();
 $alertStyle = "success alert-dismissible fade show\" role=\"alert\"";
 $statusMsg = "Security Employee Detail has been updated.";
     // Add CSS to the success message
     echo "<style>
      .success {
       background-color: #d4edda;
        color: green;
        font-weight: bold;
      }
     </style>";

    // echo '<script>alert("Security Guard Detail has been updated")</script>';

  }
  ?>
<!DOCTYPE html>
<html>
<head>
  
  <title>Lion Security Services | View More</title>
    
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
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
            <h1>View More About Security Guard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">View More About Security Guard</li>
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
                <h3 class="card-title">View More About Security Guard</h3>
              </div>
              <!-- /.card-header -->
              <strong> <div class="<?php echo $alertStyle;?>" role="alert"><?php echo $statusMsg;?></strong></div>
              <!-- form start -->
              <form role="form" method="post" enctype="multipart/form-data">
                <?php
                   $eid=$_GET['editid'];
$sql="SELECT * from tblguard where ID=$eid";
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
                    <label for="exampleInputEmail1">Profile Pics</label><br>
                    <img src="images/<?php echo $row->Profilepic;?>"class="img circle" width="100" height="100" value="<?php  echo $row->Profilepic;?>"><br>

                  </div>
                     <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlentities($row->Name);?>" required="true" readonly>
                  </div>

                 <div class="form-group">
                    <label for="exampleInputEmail1">Is Uniform Assigned</label>
                    <input type="text" class="form-control" id="UniformAssigned" name="UniformAssigned" value="<?php
  $uniformAssigned = htmlentities($row->UniformAssigned);
  $isUniformAssigned = ($uniformAssigned == 0) ? 'not Assigned' : 'is Assigned';
  echo $isUniformAssigned;
?>" required="true" readonly>
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mobile Number</label>
                    <input type="text" class="form-control" id="mobilenumber" name="mobilenumber" value="<?php echo htmlentities($row->MobileNumber);?>" maxlength="10" pattern="[0-9]+" required="true" readonly>
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <textarea type="text" class="form-control" id="address" name="address" placeholder="Address" required="true" readonly><?php echo htmlentities($row->Address);?></textarea>
                  </div>  
                  <div class="form-group">
                    <label for="exampleInputEmail1">ID Type</label>

                                                        
                    <textarea type="text" class="form-control" id="idtype"   required="true" readonly><?php echo htmlentities($row->IDtype);?></textarea>

            
                                                        
                                                  
                  </div>  
                  <div class="form-group">
                    <label for="exampleInputEmail1">ID Number</label>
                    <input type="text" class="form-control" id="idnum" name="idnum" required="true" value="<?php echo htmlentities($row->IDnumber);?>"readonly>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Registration Date</label>
                    <input type="text" class="form-control" readonly="true" value="<?php echo htmlentities($row->RegistrationDate);?>"readonly>
                  </div>
                  <div>
                    <label for="exampleInputEmail1">PreExpire</label>
                        <select name="expiration_interval" id="status"  class="form-control">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
    </select>
                  </div>
                     <div class="form-group">
                    <label for="exampleInputEmail1">Expire Date:</label>
                    <input type="date" class="form-control" id="fromdate" name="expir_date" value="" required='true'>
                  </div>
                </div>
              <?php $cnt=$cnt+1;}} ?> 
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit">Order Uniform</button>
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