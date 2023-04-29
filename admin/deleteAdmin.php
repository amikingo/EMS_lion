<?php
 include('../includes/dbconnection.php');


$delid = $_GET['delid'];

$query = mysqli_query($con,"DELETE FROM tbladmin WHERE ID='$delid'");


if ($query === TRUE) {

    $query2 = mysqli_query($con,"DELETE FROM tbladmin WHERE ID='$delid'");

    if ($query2 === TRUE) {

    echo "<script type = \"text/javascript\">
    window.location = (\"viewAdmin.php\")
    </script>";  
    
    }
}

?>

