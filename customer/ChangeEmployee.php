<?php
include('dbconnection.php');
session_start();
//error_reporting(0);
 $user_id = $_SESSION["user_id"];
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
<link href="assets/img/fav.png" rel="icon">
	<title>lion security services |Search Request</title>	
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/nice-select.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>
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
      <li><a href="index.php">Request Employee</a></li>
      <li ><a href="search-request.php">Check Request</a></li>
  <li class="active"><a href="ChangeEmployee.php">Change Security</a></li>
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
	
	<section class="page-top-section set-bg" data-setbg="img/page-top-bg.jpg">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 m-auto text-white">
					<h2>Search Request</h2>
				</div>
			</div>
		</div>
	</section>
	<!-- Page top Section end -->

	<!-- Contact Section -->
	<section class="contact-page-section spad overflow-hidden">
		<div class="container">
<div class="form-body">
	<br><br><br>
	<form role="form" method="post" name="printReport" action="">


  
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Booking Number</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th>Company Name</th>
					<th>Remark</th>
                    <th>Guard Ids</th>
                <th>Remark for the change of Guard</th>
    <th>Change Guard</th>
                    

                    
                  </tr>
                  </thead>
                  <tbody>
      <?php
$aid = $_SESSION['user_id'];

//$companyName = $_POST['companyName'];

$mema = "SELECT companyName FROM users WHERE id=:aid";
$mema_query = $dbh->prepare($mema);
$mema_query->bindParam(':aid', $aid, PDO::PARAM_STR);
$mema_query->execute();
$mema_result = $mema_query->fetch(PDO::FETCH_OBJ);
$companyName = $mema_result->companyName;

$sql = "SELECT * FROM tblhiring WHERE  companyName=:companyName ";
$query = $dbh->prepare($sql);
$query->bindParam(':companyName', $companyName, PDO::PARAM_STR);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);

$cnt = 1;
if ($query->rowCount() > 0) {
    foreach ($results as $row) {
?>
        <tr>
            <td><?php echo htmlentities($cnt); ?></td>
            <td><?php echo htmlentities($row->BookingNumber); ?></td>
            <td><?php echo htmlentities($row->FirstName); ?> <?php echo htmlentities($row->LastName); ?></td>
            <td><?php echo htmlentities($row->Email); ?></td>
            <td><?php echo htmlentities($row->MobileNumber); ?></td>
            <td><?php echo htmlentities($row->companyName); ?></td>
			<td><?php echo htmlentities($row->Remark); ?></td>

            <td><?php echo htmlentities($row->GuardAssign)?></td>
<td><textarea name="data" rows="5" cols="50"></textarea></td>
<td><button name="submit" type="submit" class="btn btn-primary">Update</button></td>

           
        </tr>
        <input type="hidden" name="Guards" value="<?php echo htmlentities($row->GuardAssign);?>">
<?php
        $cnt = $cnt + 1;
    }
}
else {
?>
    <tr>
        <td colspan="8"> No record found against this search</td>
    </tr>


  <?php } ?>
                 

                </table>
            </form>
              </div>

			</div>
		</div>
	</section>
	<!-- Trainers Section end -->

	<br><br>
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
