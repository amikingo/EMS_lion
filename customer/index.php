<?php
include('dbconnection.php');
session_start();
error_reporting(0);
 if(isset($_POST['submit']))
  {

$booknum=mt_rand(100000000, 999999999);
     $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $mobnum=$_POST['mobnum'];
    $add=$_POST['add'];
   $reqnum=$_POST['reqnum'];
   $gender=$_POST['gender'];
 
$sql="insert into tblhiring(BookingNumber,FirstName,LastName,Email,MobileNumber,Address,RequirementNumber,Gender)values(:booknum,:fname,:lname,:email,:mobnum,:add,:reqnum,:gender)";
$query=$dbh->prepare($sql);
$query->bindParam(':booknum',$booknum,PDO::PARAM_STR);
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
   echo '<script>alert("Hiring request has been book successfully. Booking Number is "+"'.$booknum.'")</script>';
echo "<script>window.location.href ='index.php'</script>";
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
          <li ><a href="Home.php">Home</a></li>
		  <li ><a href="About us.php">About Us</a></li>
		  <li ><a href="contact us.php">Contact Us</a></li>
          <li class="drop-down">
            <a href="">Request & complain </a> 
            <ul >
              <li class="active"><a href="index.php">Request Employee</a></li>
              <li><a href="search-request.php">Check Request</a></li>
              <li><a href="invest.php" >Complain</a></li>
            </ul>
          </li>
          <li class="drop-down">
            <a href="">My Account </a> 
            <ul >
              <li><a href="login/profile.php">Profile</a></li>
              <li><a href="login/change-password.php">Change Password</a></li>
              <li><a href="login/logout.php" >Logout</a></li>
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
						<div class="row">
							<div class="col-md-6">
								<label style="padding-bottom: 10px;">First Name</label>
								<input type="text" placeholder="First Name" name="fname"  class="form-control" required="true">
							</div>
							<div class="col-md-6">
								<label style="padding-bottom: 10px;">Last Name</label>
								<input type="text" placeholder="Last Name" name="lname" class="form-control" required="true">
							</div>
							<div class="col-md-6">
								<label style="padding-bottom: 10px;">Your Email</label>
								<input type="text" placeholder="Your Email" name="email" class="form-control" required="true">
							</div>
							<div class="col-md-6">
								<label style="padding-bottom: 10px;">Phone Number</label>
								<input type="text" placeholder="Phone Number" class="form-control" name="mobnum" required="true" maxlength="10" pattern="[0-9]+">
							</div>
							<div class="col-md-8">
								<label style="padding-bottom: 10px;">Requirement Number<small style="color:red;">(Number of Guards)</small></label>
								<input type="text" placeholder="Requirement Number" name="reqnum" class="form-control" required="true">
							</div>
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
