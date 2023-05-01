<?php

include "../funcs.php";

session_start();
if_not_login_die("Access Denied!");
connect_db();

if(!isset($_REQUEST['id'])) die("ID needed...");

$res = get_courses($_REQUEST['id']);

$arr = array();

while($row = $res->fetch_assoc()){
	$arr_tmp['id']        =  $row["CourseID"];
	$arr_tmp['name']      =  $row["CourseString"];
	$arr_tmp['chapters']  =  $row["Chapters"];
	$arr_tmp['program_id']=  $row["ProgramID"];
	array_push($arr, $arr_tmp);
}
	
echo json_encode($arr); 

?>