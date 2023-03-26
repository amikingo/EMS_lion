<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['osghsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$rid=$_GET['bookingid'];
    $ressta=$_POST['status'];
    $remark=$_POST['restremark'];

$guards=implode(',',$_POST['guards']);
$sql="update tblhiring set Status=:ressta,Remark=:remark,GuardAssign=:guards where BookingNumber=:rid";
$query=$dbh->prepare($sql);
$query->bindParam(':ressta',$ressta,PDO::PARAM_STR);
$query->bindParam(':remark',$remark,PDO::PARAM_STR);
$query->bindParam(':guards',$guards,PDO::PARAM_STR);
$query->bindParam(':rid',$rid,PDO::PARAM_STR);
 $query->execute();

   $query->execute();

    echo '<script>alert("Booking status has been updated")</script>';
echo "<script type='text/javascript'> document.location ='all-booking-request.php'; </script>";
  }
  ?>
<!DOCTYPE html>
<html>
<head>
  
  <title>Online Security Gauard Hiring System | View Booking Detail</title>
    
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
            <h1>View Booking Detail</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">View Booking Detail</li>
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
                <h3 class="card-title">View Booking Detail</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
                
                <div class="card-body">

                  <div class="form-group">
                    <table id="example1" class="table table-bordered table-striped">
                       <?php
$rid=$_GET['bookingid'];
$sql="SELECT * from tblhiring
where BookingNumber=:rid";
$query = $dbh -> prepare($sql);
$query-> bindParam(':rid', $rid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
  <tr>
    <th>Booking Number</th>
    <td><?php  echo htmlentities($row->BookingNumber);?></td>
    <th>Name</th>
    <td><?php  echo htmlentities($row->FirstName);?> <?php  echo htmlentities($row->LastName);?></td>
  </tr>
   <tr>
    <th>Mobile Number</th>
    <td><?php  echo htmlentities($row->MobileNumber);?></td>
    <th>Email</th>
    <td><?php  echo htmlentities($row->Email);?></td>
  </tr>
  <tr>
    <th>Address</th>
    <td><?php  echo htmlentities($row->Address);?></td>
    <th> Guard Requirement Number</th>
    <td><?php  echo htmlentities($row->RequirementNumber);?></td>
  </tr>
   <tr>
    <th>Shift</th>
    <td><?php  echo htmlentities($row->Shift);?></td>
    <th> Guard Gender Requirement</th>
    <td><?php  echo htmlentities($row->Gender);?></td>
  </tr>
  <tr>
    <th>Booking Status</th>
    <td><?php $status= $row->Status;
if($row->Status=="Accepted")
{
  echo "Guard Hiring Requirement Accepted";
}


if($row->Status=="Rejected")
{
  echo "Guard Hiring Requirement Rejected";
}

if($row->Status=="")
{
  echo "Wait for approval";
}

  ?></td>
  <th>Date of Booking</th>
  <td><?php  echo htmlentities($row->Dateofbooking);?></td>
  </tr>
                      <tr>

    <th>Remark</th>
   <?php if($row->Remark==""){ ?>

                     <td><?php echo "Not Updated Yet"; ?></td>
<?php } else { ?>
  <td><?php  echo $row->Remark;?></td>
<?php } ?>
    <th>Guard Assign</th>
    <?php if($row->GuardAssign==""){ ?>

                     <td><?php echo "Not Updated Yet"; ?></td>
    <?php } else { ?>

    <td><?php  echo $row->GuardAssign;?></td>
    <?php } ?>
  </tr>
  
                    
                    <?php $cnt=$cnt+1;}} ?></table>
                    <table class="table table-bordered data-table">
<?php

  if($status=="" ){ ?>
<form name="submit" method="post"> 
<tr>
    <th>Remark :</th>
    <td colspan="6">
    <textarea name="restremark" placeholder="" rows="5" cols="14" class="form-control" required="true"></textarea></td>
  </tr>

  <tr>
    <th>Status :</th>
    <td>
   <select name="status" class="form-control" required="true" >
     <option value="Accepted" selected="true"> Accepted</option>
          <option value="Rejected">Rejected</option>
     
   </select></td>
  </tr>
   <tr>
    <th>Assign Guard :</th>
    <td>
   <select name="guards[]" class="form-control"  multiple="multiple">
    <option value="">Choose Guard</option>
    <?php
$sql="SELECT * from tblguard";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row1)
{               ?>
     <option value="<?php echo htmlentities ($row1->Name);?>"> <?php echo htmlentities ($row1->Name);?></option>
          <?php $cnt=$cnt+1;}} ?>
     
   </select></td>
  </tr>
    <tr align="center" style="text-align: center';">
    <td><button type="submit" name="submit" class="btn btn-primary">Update</button></td>
  </tr>
</form>

</table>

<?php } ?>
</div>
            </div></div>
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
<?php } ?>