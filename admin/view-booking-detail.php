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
   $alertStyle = "success alert-dismissible fade show\" role=\"alert\"";
   $statusMsg = "Request status has been updated.";
       // Add CSS to the success message
       echo "<style>
        .success {
         background-color: #d4edda;
          color: green;
          font-weight: bold;
        }
       </style>";
  


   for($i = 0 ; $i < count($_POST['guards']); $i++){
    $companyName=$_POST['companyName'];
      $sql="update tblguard set isAssigned=1,companyName=:companyName where ID=:val";
      $query=$dbh->prepare($sql);
      $query->bindParam(':companyName',$companyName,PDO::PARAM_STR);
      $query->bindParam(":val", $_POST['guards'][$i], PDO::PARAM_STR);
      $query->execute();
   }

//     echo '<script>alert("Booking status has been updated")</script>';
// echo "<script type='text/javascript'> document.location ='all-booking-request.php'; </script>";
  }
  $companyName="-";
  ?>
<!DOCTYPE html>
<html>
<head>
  
  <title>View Request Detail</title>
  <link href="dist/img/fav.png" rel="icon">
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
            <h1>View Request Detail</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">View Request Detail</li>
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
                <h3 class="card-title">View Request Detail</h3>
              </div>
              <!-- /.card-header -->
              <strong> <div class="<?php echo $alertStyle;?>" role="alert"><?php echo $statusMsg;?></strong></div>
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
{
  $companyName = $row->companyName;             ?>
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
    <th> Required Employee Number</th>
    <td><?php  echo htmlentities($row->RequirementNumber);?></td>
  </tr>
  <tr>
    <th>Booking Status</th>
    <td><?php $status= $row->Status;

if($row->Status=="Accepted")
{
  echo "Requirement Accepted";
}


if($row->Status=="Rejected")
{
  echo "Requirement Rejected";
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
  <form role="form" method="post" name="printReport" action="viewEmployeeFromAssigned.php">
<input type="hidden" name="GuardAssign" value="<?= $row->GuardAssign; ?>">
    <td><button type="submit" name="submit" class="btn btn-primary">View Guards List</button></td>
    </form>
    <?php } ?>
  </tr>
  
                    
                    <?php $cnt=$cnt+1;}} ?></table>
                    <table class="table table-bordered data-table">
<?php

  if($status=="" ){ ?>
<form name="submit" method="post">
<input type="hidden" name="companyName" value="<?= $companyName; ?>"> 
<tr>
    <th>Remark :</th>
    <td colspan="6">
    <textarea name="restremark" placeholder="" rows="5" cols="14" class="form-control" required="true"></textarea></td>
  </tr>

<tr>
  <th>Status :</th>
  <td>
    <select name="status" class="form-control" required="true" onchange="toggleCheckboxes(this)">
      <option value="Accepted" selected="true">Accepted</option>
      <option value="Rejected">Rejected</option>
    </select>
  </td>
</tr>
<tr>
  <th>Assign Guard :</th>
  <td>
<!-- ...existing code... -->

<div>
  <input type="checkbox" id="select-all" onchange="selectAllGuards()">
  <label for="select-all">Select All</label>
</div>

<!-- ...existing code... -->

<div id="checkboxes">
  <?php
    $sql = "SELECT * FROM tblguard WHERE isTrainer = 0";
    $query = $dbh->prepare($sql);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0) {
      $count = 0;
      foreach ($results as $row1) {
        if ($row1->isAssigned == 0) {
          $count++;
  ?>
  <!-- TODO: Requirement number select Required guards[] button -->
  <div>
    <input type="checkbox" name="guards[]" value="<?php echo htmlentities($row1->ID); ?>">
    <label><?php echo htmlentities($row1->Name); ?></label>
  </div>
  <?php
        }
      }
      
      $rid = $_GET['bookingid'];
      echo $reqNumber;
      $RequirementNumber = "SELECT * FROM tblhiring WHERE BookingNumber = :rid";
      $query = $dbh->prepare($RequirementNumber);
      $query->bindParam(':rid', $rid, PDO::PARAM_STR);
      $query->execute();
      $results = $query->fetchAll(PDO::FETCH_OBJ);
      
      if ($query->rowCount() > 0) {
        foreach ($results as $row) {
          $reqNumber = $row->RequirementNumber;
          
          if ($count >= $reqNumber) {
            break; // Stop displaying checkboxes after reaching the requirement number
          }
        }
      }
    }
  ?>
</div>

  </td>
</tr>

  </tr>
    <tr align="center" style="text-align: center;">
    <td>
    <button type="submit" name="submit" class="btn btn-primary">Update</button>
    </td>
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
<script>
function selectAllGuards() {
  var checkboxes = document.getElementsByName('guards[]');
  var selectAllCheckbox = document.getElementById('select-all');
  var requirementNumber = <?php echo $reqNumber; ?>;

  var count = 0;
  for (var i = 0; i < checkboxes.length; i++) {
    if (checkboxes[i].checked) {
      count++;
    }
  }

  for (var i = 0; i < checkboxes.length; i++) {
    if (count >= requirementNumber) {
      checkboxes[i].checked = false;
    } else {
      checkboxes[i].checked = selectAllCheckbox.checked;
      count++;
    }
  }
}
</script>
<script>
  function toggleCheckboxes(select) {
    var checkboxes = document.getElementById("checkboxes");
    if (select.value == "Accepted") {
      checkboxes.style.display = "block";
    } else {
      checkboxes.style.display = "none";
    }
  }
</script>


</body>
</html>
<?php } ?>