<?php
include('dbconnection.php');
session_start();
error_reporting(0);

 if(isset($_POST['submit']))
  {

$booknum=mt_rand(100000000, 999999999);
$user_id = $_SESSION["user_id"];




     $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $mobnum=$_POST['mobnum'];
    $add=$_POST['add'];
   $reqnum=$_POST['reqnum'];
   $gender=$_POST['gender'];
   $companyName=$_POST['companyName'];
 

$sql="insert into tblhiring(BookingNumber,FirstName,LastName,Email,MobileNumber,Address,RequirementNumber,Gender,companyName)values(:booknum,:fname,:lname,:email,:mobnum,:add,:reqnum,:gender,:companyName)";
$query=$dbh->prepare($sql);
$query->bindParam(':booknum',$booknum,PDO::PARAM_STR);
$query->bindParam(':companyName',$companyName,PDO::PARAM_STR);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':lname',$lname,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':mobnum',$mobnum,PDO::PARAM_STR);
$query->bindParam(':add',$add,PDO::PARAM_STR);
$query->bindParam(':reqnum',$reqnum,PDO::PARAM_STR);
$query->bindParam(':gender',$gender,PDO::PARAM_STR);
 $query->execute();
   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
	$alertStyle = "success alert-dismissible fade show\" role=\"alert\"";
	$statusMsg = "request has been book successfully. Booking Number is " . $booknum;
     // Add CSS to the success message
     echo "<style>
      .success {
       background-color: #d4edda;
        color: green;
        font-weight: bold;
      }
     </style>";
	
//    echo '<script>alert("Hiring request has been book successfully. Booking Number is "+"'.$booknum.'")</script>';
// echo "<script>window.location.href ='index.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>lion security services |Request Guard</title>
	<link href="assets/img/fav.png" rel="icon">	
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/nice-select.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>
	<!--<link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet"> -->
	<link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="css/style.css"/>
	<link rel="stylesheet" href="css/header.css"/>
	
</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>
	<!-- Header Section -->
	</head>
   <!-- ======= Header ======= -->
   <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
      <a class="navbar-brand" href="index.php"></a>
   
	  <img alt="logo" src="../assets/img/LOGO.png" style="width: 800px;height: 50px;">
      

      <nav class="nav-menu d-none d-lg-block"style="margin-left: 400px;">
	  <ul>
  <li><a href="Home.php"><button type="button" class="btn btn-primary">Home</button></a></li>
  <li><a href="About us.php"><button type="button" class="btn btn-primary">About Us</button></a></li>
  <li><a href="contact us.php"><button type="button" class="btn btn-primary">Contact Us</button></a></li>
  <li class="drop-down">
    <button type="button" class="btn btn-primary">Request</button>
    <ul class="submenu">
      <li class="active"><a href="index.php">Request Employee</a></li>
      <li><a href="search-request.php">Check Request</a></li>

    </ul>
  </li>
  <li class="drop-down">
    <button type="button" class="btn btn-primary">My Account</button>
    <ul class="submenu">
      <li><a href="login/profile.php">Profile</a></li>
      <li><a href="login/change-password.php">Change Password</a></li>
      <li><a href="login/logout.php">Logout</a></li>
    </ul>
  </li>
</ul>
      </nav>
    </div>
  </header>
	<?php //include_once('header.php');?>
	<section class="page-top-section set-bg" data-setbg="">
		
	</section>
	<!-- Page top Section end -->

	<!-- Contact Section -->
	<section class="contact-page-section spad overflow-hidden">
		<div class="container">
			
			<div class="row">
				<div class="col-lg-8">
					<form class="singup-form contact-form" method="post">
					 <div class="<?php echo $alertStyle;?>" role="alert"><?php echo $statusMsg;?></div>
						<div class="row">
						<?php	
						$aid=$_SESSION['user_id'];
						$sql="SELECT * from users Where id=:aid";
						$query = $dbh -> prepare($sql);
						$query->bindParam(':aid',$aid,PDO::PARAM_STR);
						$query->execute();
						$results=$query->fetchAll(PDO::FETCH_OBJ);
						$cnt=1;
						if($query->rowCount() > 0)
							{
foreach($results as $row)
{               ?>
						
							<div class="col-md-6">
								<label style="padding-bottom: 10px;">First Name</label>
					<input type="text" placeholder="First Name" name="fname"  class="form-control" required="true" value="<?php  echo $row->FirstName;?>"readonly>
							</div>
							<?php $cnt=$cnt+1;}} ?> 
							<div class="col-md-6">
								<label style="padding-bottom: 10px;">Last Name</label>
								<input type="text" placeholder="Last Name" name="lname" class="form-control" required="true" value="<?php  echo $row->LastName;?>" readonly>
							</div>
							<div class="col-md-6">
								<label style="padding-bottom: 10px;">Your Email</label>
								<input type="text" placeholder="Your Email" name="email" class="form-control" required="true" value="<?php  echo $row->email;?>" readonly>
							</div>
							<div class="col-md-6">
								<label style="padding-bottom: 10px;">Phone Number</label>
								<input type="text" placeholder="Phone Number" class="form-control" name="mobnum" required="true" maxlength="10" pattern="[0-9]+">
							</div>
							<div class="col-md-8">
								<label style="padding-bottom: 10px;">Requirement Number<small style="color:red;">(Number of Guards)</small></label>
								<input type="text" placeholder="Requirement Number" name="reqnum" class="form-control" required="true">
							</div>

						<?php	
						$aid=$_SESSION['user_id'];
						$sql="SELECT * from users Where id=:aid";
						$query = $dbh -> prepare($sql);
						$query->bindParam(':aid',$aid,PDO::PARAM_STR);
						$query->execute();
						$results=$query->fetchAll(PDO::FETCH_OBJ);
						$cnt=1;
						if($query->rowCount() > 0)
							{
foreach($results as $row)
{               ?>
								<div class="col-md-6">
								<label style="padding-bottom: 10px;">Company Name</label>
								<input type="text" placeholder="Phone Number" class="form-control" name="companyName" required="true" maxlength="10" pattern="[0-9]+"  value="<?php  echo $row->companyName;?>"readonly>
								
							</div>
							 <?php $cnt=$cnt+1;}} ?> 

					
							<!-- <div class="col-md-6">
								<label style="padding-bottom: 10px;">Shift Requirement</label>
							
								<select name="shift" required="true" class="form-control">
									<option value="">Choose Shift</option>
									<option value="Day">Day</option>
									<option value="Night">Night</option>
									<option value="24hrs">24hrs</option>
								</select> -->
								<!-- <input type = "hidden" name="shift" value="123"> -->
								<!-- <input type="file" name="lis"> -->
							<!-- </div> -->
							<div class="col-md-6">
								<label style="padding-top: 10px;">Gender</label>
								<select name="gender" required="true" class="form-control">
									<option value="">Choose Gender</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
									<option vlaue="Both">Both</option>
								</select>
							</div>
							<br>
							<div class="col-md-12">
								<label style="padding-top: 10px;">Address</label>
								<textarea placeholder="Enter Address" name="add" required="true"></textarea>
								 <input type="submit" class="btn btn-primary" value="send" name="submit">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<!-- Trainers Section end -->

	
	<!-- Footer Section -->
	<footer id="footer">

<div class="footer-top">
  <div class="container">
	<div class="row">

	<div class="col-lg-9 col-md-6 footer-contact">
		<h3>Lion Security Services</h3>
		<p>
		  Ethiopia Addis Ababa,<br>
		  Mekanisa,<br><br>
		  <strong>Phone:</strong> +251 116 683333 , +251 930 519202<br>
		  <strong>Email:</strong> www.lionsecurityservices.com<br>
		</p>
	  </div>
	  <div class="col-lg-2 col-md-6 footer-links">
		<h4>Useful Links</h4>
		<ul>
		  <li><i class="bx bx-chevron-right"></i> <a href="Home.php">Home</a></li>
		  <li><i class="bx bx-chevron-right"></i> <a href="About us.php" style="color:black !important;">About us</a></li>
		  <li><i class="bx bx-chevron-right"></i> <a href="contact us.php" style="color:black !important;">Contact us</a></li>
		</ul>
	  </div>
	
<div class="container d-md-flex py-4">

  <div class="mr-md-auto text-center text-md-left">
	<div class="copyright">
	  &copy; <strong><span>Lion Security Services PLC</span></strong> - <?php echo date('Y');?> - Developed By REHA TECH
	</div>
	<div class="credits">
	</div>
  </div>
  <div class="social-links text-center text-md-right pt-3 pt-md-0">
	<a href="#" class="twitter"><i  style="color:#fff;" class="bx bxl-twitter"></i></a>
	<a href="#" class="facebook"><i style="color:#fff;" class="bx bxl-facebook"></i></a>
	<a href="#" class="instagram"><i style="color:#fff;" class="bx bxl-instagram"></i></a>
	<a href="#" class="google-plus"><i style="color:#fff;" class="bx bxl-skype"></i></a>
	<a href="#" class="linkedin"><i style="color:#fff;" class="bx bxl-linkedin"></i></a>
  </div>
</div>
</footer>
	<!-- Footer Section end -->
	
	<div class="back-to-top"><img src="img/icons/up-arrow.png" alt=""></div>

	<!-- Search model -->
	
	<!--====== Javascripts & Jquery ======-->
	<script src="js/vendor/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/main.js"></script>

	</body>
</html>
