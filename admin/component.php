
<?php
session_start();
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
    //For System Administrator
    include_once('viewAdmin.php');
  }
  else if ($row->adminTypeId == 2){
    //For HR Manager
    include_once('dashboard.php');
 }
 else if ($row->adminTypeId == 3){
  // For Store Keeper
    include_once('dashboard.php');
  }
  else if ($row->adminTypeId == 4){
    //For Trainer
    include_once('trainerLists.php');
  }
  
}
}
 
?>