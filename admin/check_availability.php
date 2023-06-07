<?php 
require_once("includes/dbconnection.php");

if(!empty($_POST["UserName"])) {
$userName= $_POST["UserName"];
	
$result =mysqli_query($conn,"SELECT UserName FROM tbladmin WHERE UserName='$userName'");
		$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'> User Name already exists .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> User Name available for Registration .</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}


?>
