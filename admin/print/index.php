<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
	</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<a class="navbar-brand" href="https://sourcecodester.com">Lion Security Services PLC</a>
		</div>
	</nav>
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary">Print Accepted Booking</h3>
		<hr style="border-top:1px dotted #ccc;" />
		
		<br /><br />
		<a href="print.php" target="_blank" class="btn btn-success pull-right"><span class="glyphicon glyphicon-print"></span> Print</a>
		<br />
		<br />
		<table class="table table-bordered">
			<thead class="alert-success">
				<tr>
					<th>Booking Number</th>
					<th>Company Name</th>
					<th>Date Of Booking</th>
					<th>Date of Acceptance</th>
				</tr>
			</thead>
			<tbody style="background-color:#fff;">
				<?php
					require 'conn.php';
					
					$query = $conn->query("SELECT * FROM `tblhiring` where Status='Accepted'");
					while($fetch = $query->fetch_array()){
						
				?>
				
				<tr>
					<td><?php echo $fetch['BookingNumber']?></td>
					<td><?php echo $fetch['companyName']?></td>
					<td><?php echo $fetch['Dateofbooking']?></td>
					<td><?php echo $fetch['UpdationDate']?></td>
				</tr>
				
				<?php
					}
				?>
			</tbody>
		</table>
	</div>
	

</body>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.js"></script>
</html>