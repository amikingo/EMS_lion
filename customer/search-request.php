<?php
include('dbconnection.php');
session_start();
error_reporting(0);
 
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Online Security Gauard Hiring System |Search Request</title>	
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
			
			<div class="row">
		
				<div class="col-lg-8">
					<form class="singup-form contact-form" method="post">
						<div class="row">
							<div class="col-md-12">
								<label style="padding-bottom: 10px;">Search Booking</label>
								<input id="searchdata" type="text" name="searchdata" required="true" class="form-control" placeholder="Enter Your Booking Number">
							</div>
							<br>
							<div class="col-md-12">
								 <button type="submit" class="btn btn-primary" name="search" id="submit">Search</button>
							</div>
						</div>
					</form>
				</div>
<div class="form-body">
                  <?php
if(isset($_POST['search']))
{ 

$sdata=$_POST['searchdata'];
  ?>
  <h4 align="center">Result against "<?php echo $sdata;?>" keyword </h4>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Booking Number</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th>Status</th>
                    <th>Name of Guard</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                    <?php
$sql="SELECT * from tblhiring where BookingNumber like '$sdata%'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                  <tr>
                    <td><?php echo htmlentities($cnt);?></td>
                    <td><?php  echo htmlentities($row->BookingNumber);?></td>
                    <td><?php  echo htmlentities($row->FirstName);?> <?php  echo htmlentities($row->LastName);?>
                    </td>
                    <td><?php  echo htmlentities($row->Email);?></td>
                    <td> <?php  echo htmlentities($row->MobileNumber);?></td>
                    <?php if($row->Status==""){ ?>

                     <td><?php echo "Not Updated Yet"; ?></td>


<?php } else { ?>
                                        <td>
                                            <span class="badge badge-primary"><?php  echo htmlentities($row->Status);?></span>
                                        </td>
<?php } ?> 
<?php if($row->Status==""){ ?>
 	 <td><?php echo "Not Updated Yet"; ?></td>
 	<?php } ?>
 <?php if($row->Status=="Rejected"){ ?>
 	 <td><?php echo "Rejected"; ?></td>
 	 <?php } else { ?>
                    <td> <?php  echo htmlentities($row->GuardAssign);?></td><?php } ?>
                  </tr>
                  </tbody>

                  <?php 
$cnt=$cnt+1;
} } else { ?>
  <tr>
    <td colspan="8"> No record found against this search</td>

  </tr>
  <?php } }?>
                 

                </table>

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
