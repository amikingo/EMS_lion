
<?php
//session_start();
error_reporting(0);
include('includes/dbconnection.php');

$aid=$_SESSION['osghsaid'];
$sql="SELECT * from  tbladmin where ID=:aid";
$query = $dbh -> prepare($sql);
$query->bindParam(':aid',$aid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{
  if($row->adminTypeId == 1){
    include_once('includes/sidebar_sadmin.php');
  }
  else if ($row->adminTypeId == 2){
    include_once('includes/sidebar_HR.php');
  }
  
}
}
 
?>