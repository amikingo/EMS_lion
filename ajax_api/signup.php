<?php
include "../funcs.php";
connect_db();
session_start();

$msg = "";

$input_arr = array("f_name", "f_lname", "f_username", "f_email", "f_pass", "f_campus", "f_depart");


foreach ($input_arr as $i) {
	if(!isset($_POST[$i])){
		$msg = "-Blank Input Field.";
		break;
	}
}
if(!$msg){
	if(strlen($_POST["f_pass"]) < 8)
		$msg = "-password must be at least 8 characters.";
	else if(!filter_var($_POST["f_email"], FILTER_VALIDATE_EMAIL))
		$msg = "-invalid email.";
	else if(data_exist("user", "username", $_POST["f_username"]))
		$msg = "-Username Already in use";
	else if(data_exist("user", "email", $_POST["f_email"]))
		$msg = "-Email Already in use.";
	else if(!data_exist("branch", "BranchID", $_POST["f_campus"]))
		$msg = "-Invalid Campus?";
	else if(!data_exist("department", "DepartmentID", $_POST["f_depart"]))
		$msg = "-Invalid Department?";
	else{
		add_user($_POST["f_name"]." ".$_POST["f_lname"], $_POST["f_username"], $_POST["f_email"], $_POST["f_pass"], 1, 0, $_POST["f_campus"], $_POST['f_depart']);
	}
}

echo $msg;
?>