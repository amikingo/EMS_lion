<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['osghsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
$name=$_POST['name'];
$gender=$_POST['gender'];
$mobnum=$_POST['mobilenumber'];
$address=$_POST['address'];
$idtype=$_POST['idtype'];
$idnum=$_POST['idnum'];
$propic=$_FILES["propic"]["name"];
$extension = substr($propic,strlen($propic)-4,strlen($propic));
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
if(!in_array($extension,$allowed_extensions))
{
  $alertStyle = "danger";
$statusMsg = "Profile Pics has Invalid format. Only jpg / jpeg/ png /gif format allowed";
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
// echo "<script>alert('Profile Pics has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{

$propic=md5($propic).time().$extension;
 move_uploaded_file($_FILES["propic"]["tmp_name"],"images/".$propic);
$sql="insert into tblguard(Profilepic,Name,gender,MobileNumber,Address,IDtype,IDnumber,isTrainer)values(:pics,:name,:gender,:mobilenumber,:address,:idtype,:idnum, 1)";
$query=$dbh->prepare($sql);
$query->bindParam(':pics',$propic,PDO::PARAM_STR);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':gender',$gender,PDO::PARAM_STR);
$query->bindParam(':mobilenumber',$mobnum,PDO::PARAM_STR);
$query->bindParam(':address',$address,PDO::PARAM_STR);
$query->bindParam(':idtype',$idtype,PDO::PARAM_STR);
$query->bindParam(':idnum',$idnum,PDO::PARAM_STR);
 $query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    $alertStyle = "success";
$statusMsg = "Security Employee has been added!!";
// Add CSS to the success message
echo "<style>
 .success {
  background-color: #d4edda;
   color: green;
   font-weight: bold;
 }
</style>";
    
// $_SESSION['msg'] = " Security Employee has been added!!";
// echo "<script>window.location.href ='add-security-guard.php'</script>";
  
  // else
  //   {
  // $_SESSION['delmsg'] = " Created !!";
  //   }

  
  }}
}
?>
<!DOCTYPE html>
<html>
<head>
  
  <title>Lion Security Services | Add Security Employee</title>
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
            <h1>Add Security Employee</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Add Security Employee</li>
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
                <h3 class="card-title">Add Security Employee</h3>
              </div>
              <?php //if (isset($_POST['submit'])) { ?>
										<!-- <div class="alert alert-success">
											<button type="button" class="close" data-dismiss="alert">×</button>
											<strong>Well done!</strong> <?//php// echo htmlentities($_SESSION['msg']); ?><?//php //echo htmlentities($_SESSION['msg'] = ""); ?>
										</div> -->
									<?//php //} ?>
                  <strong> <div class="<?php echo $alertStyle;?>" role="alert"><?php echo $statusMsg;?></strong></div>


              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Profile Pics</label>
                    <input type="file" class="form-control" id="propic" name="propic" required="true">
                  </div>
                     <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" required="true">
                  </div>
                  <div class="form-group">
                  <label for="gender">Gender:</label>
               <input type="radio" name="gender" value="0" id="0">
                   <label for="male">Male</label>
           <input type="radio" name="gender" value="1" id="1">
                     <label for="female">Female</label>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mobile Number</label>
                    <input type="text" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Mobile Number" maxlength="10" pattern="[0-9]+" required="true">
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <textarea type="text" class="form-control" id="address" name="address" placeholder="Address" required="true"></textarea>
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputEmail1">ID Type</label>
                     <select type="text" name="idtype" id="idtype" value="" class="form-control" required="true">
<option value="">Choose ID Type</option>
                                                        
<option value="Kebele Card">Kebele Card</option>


            
                                                        
                                                    </select>
                  </div>  
                  <div class="form-group">
                    <label for="exampleInputEmail1">ID Number</label>
                    <input type="text" class="form-control" id="idnum" name="idnum" placeholder="Enter ID Number" required="true">
                  </div>
                </div>
              
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit">Add</button>
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