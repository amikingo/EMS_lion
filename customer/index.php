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
   $shift=$_POST['shift'];
   $gender=$_POST['gender'];
 
$sql="insert into tblhiring(BookingNumber,FirstName,LastName,Email,MobileNumber,Address,RequirementNumber,Shift,Gender)values(:booknum,:fname,:lname,:email,:mobnum,:add,:reqnum,:shift,:gender)";
$query=$dbh->prepare($sql);
$query->bindParam(':booknum',$booknum,PDO::PARAM_STR);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':lname',$lname,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':mobnum',$mobnum,PDO::PARAM_STR);
$query->bindParam(':add',$add,PDO::PARAM_STR);
$query->bindParam(':reqnum',$reqnum,PDO::PARAM_STR);
$query->bindParam(':shift',$shift,PDO::PARAM_STR);
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
	<title>Online Security Gauard Hiring System |Guard Hiring</title>	
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/nice-select.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>
	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="css/style.css"/>
</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>
	<!-- Header Section -->
	<?php include_once('header.php');?>
	<section class="page-top-section set-bg" data-setbg="">
		
	</section>
	<!-- Page top Section end -->

	<!-- Contact Section -->
	<section class="contact-page-section spad overflow-hidden">
		<div class="container"  !important;>
			
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
							<div class="col-md-6">
								<label style="padding-bottom: 10px;">Requirement Number<small style="color:red;">(Number of Guards)</small></label>
								<input type="text" placeholder="Requirement Number" name="reqnum" class="form-control" required="true">
							</div>
							<div class="col-md-6">
								<label style="padding-bottom: 10px;">Shift Requirement</label>
							
								<select name="shift" required="true" class="form-control">
									<option value="">Choose Shift</option>
									<option value="Day">Day</option>
									<option value="Night">Night</option>
									<option value="24hrs">24hrs</option>
								</select>
							</div>
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
							<div class="col-md-8">
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
	<div class="footer-bottom">
				<div class="row">
				
					<div class="col-md-8 text-md-right">
						<div class="copyright">
							<p style="color: red">Online Security Gauard Hiring System</p>
						</div>
					</div>
				</div>
			</div>
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
