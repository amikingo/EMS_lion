<?php 
require_once("config.php");

if(!empty($_POST["companyName"])) {
	$companyName= $_POST["companyName"];
	
$result =mysqli_query($conn,"SELECT companyName FROM users WHERE companyName='$companyName'");
		$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'> Company Name already exists .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
echo "<span style='color:green'> Company Name available for Registration .</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}


?>