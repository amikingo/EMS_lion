<!DOCTYPE html>
<?php
	require 'conn.php';
?>
<html lang="en">
	<head>
		<style>	
		.table {
			width: 100%;
			margin-bottom: 20px;
		}	
		
		.table-striped tbody > tr:nth-child(odd) > td,
		.table-striped tbody > tr:nth-child(odd) > th {
			background-color: #f9f9f9;
		}
		
		@media print{
			#print {
				display:none;
			}
		}
		@media print {
			#PrintButton {
				display: none;
			}
		}
		
		@page {
			size: auto;   /* auto is the initial value */
			margin: 0;  /* this affects the margin in the printer settings */
		}
	</style>
	</head>
<body>
	<h2>Lion Security Service PLC</h2>
	<br /> <br /> <br /> <br />
	<b style="color:blue;">Date Prepared:</b>
	<?php
		$fdate=$_POST['fDate'];
		$tdate=$_POST['tDate'];
		$allEmp=$_POST['formType'];
		$date = date("Y-m-d", strtotime("+6 HOURS"));
		echo $date;
	?>
<p>The Following Table is A report of <?php echo $allEmp ?> Customers Orders from <?php echo $fdate?> upto <?php echo $tdate;?></p>
	<br /><br />
	<table class="table table-striped">
		<thead>
			<tr>
					<th>Booking Number</th>
					<th>Address</th>
					<th>Requirment Number</th>
					<th>Remark</th>
					
			</tr>
		</thead>
		<tbody>
			<?php
					
					if($allEmp == "Accepted"){
						$sql ="SELECT * from tblhiring where date(Dateofbooking) between '$fdate' and '$tdate' AND Status = 'Accepted' ";
					}elseif ($allEmp == "Rejected") {
						$sql="SELECT * from tblhiring where date(Dateofbooking) between '$fdate' and '$tdate' AND Status = 'Rejected' ";
					}
					
					$query = $conn->query($sql);
					while($fetch = $query->fetch_array()){
						
				?>
			
			<tr>
					<td style="text-align:center;"><?php echo $fetch['BookingNumber']?></td>
					<td style="text-align:center;"><?php echo $fetch['Address']?></td>
					<td style="text-align:center;"><?php echo $fetch['RequirementNumber']?></td>
					<td style="text-align:center;"><?php echo $fetch['Remark']?></td>
					
			</tr>
			
			<?php
				}
			?>
		</tbody>
	</table>
	<center><button id="PrintButton" onclick="PrintPage()">Print</button></center>
</body>
<script type="text/javascript">
	function PrintPage() {
		window.print();
	}
	document.loaded = function(){
		
	}
	window.addEventListener('DOMContentLoaded', (event) => {
   		PrintPage()
		setTimeout(function(){ window.close() },750)
	});
</script>
</html>


