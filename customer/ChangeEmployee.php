<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'dbconnection.php';

$editId = isset($_GET['editid']) ? $_GET['editid'] : '';

// ...

// ...

if (isset($_POST['remove'])) {
  $removeId = $_POST['remove'];
  $data = $_POST['data'];
  // Retrieve an unassigned guard from tblguard
  $sql = "UPDATE tblhiring SET data = '$data' WHERE ID = :removeId";
  $query = $dbh->prepare($sql);
  $query->bindParam(':removeId', $removeId, PDO::PARAM_INT);
  $query->execute();

  // Redirect to the same page to reflect the changes
header("Location: viewGuardsList.php?editid=$editId");
  exit;
}

// ...

// Rest of your code goes here

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
      <li ><a href="index.php">Request Employee</a></li>
      <li><a href="search-request.php">Check Request</a></li>
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
	<?php //include_once('header.php');?>
	<section class="page-top-section set-bg" data-setbg="">
		
	</section>
	<!-- Page top Section end -->

	<!-- Contact Section -->
	<section class="contact-page-section spad overflow-hidden">
		<div class="container">
			
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View More About Trainee</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="trainerLists.php">Home</a></li>
              <li class="breadcrumb-item active">View More About Trainee</li>
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
              <h3 class="card-title">All Request</h3>
            </div>
            <div class="card-body">
              <form method="POST" action="">
                <input type="hidden" name="editid" value="<?php echo $editId; ?>">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>S.No</th>
                      <th>ID Number</th>
                      <th>Photo</th>
                      <th>Name</th>
                      <th>Address</th>
                      <th>ID</th>
                      <th>Contact Number</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT * FROM tblguard WHERE ID = :editId";
                    $query = $dbh->prepare($sql);
                    $query->bindParam(':editId', $editId, PDO::PARAM_INT);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    $cnt = 1;
                    if ($results) {
                      foreach ($results as $row) {
                        ?>
            <input type="hidden" name="data" value="<?php echo $row->ID; ?>">
                        <tr>
                          <td><?php echo $cnt ?></td>
                          <td><?php echo $row->ID; ?></td>
                          <td><img src="..images/<?php echo $row->Profilepic; ?>" class="img-circle" width="100"></td>
                          <td><?php echo $row->Name; ?></td>
                          <td><?php echo $row->Address; ?></td>
                          <td><?php echo $row->IDnumber; ?></td>
                          <td><?php echo $row->MobileNumber; ?></td>
                          <td>
                            <button type="submit" name="remove" value="<?php echo $row->ID; ?>">Remove</button>
                          </td>
                        </tr>
                        <?php
                        $cnt++;
                      }
                    } else {
                      echo '<tr><td colspan="8">No data available</td></tr>';
                    }
                    ?>
                  </tbody>
                </table>
              </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
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
