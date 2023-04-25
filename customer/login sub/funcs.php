<?php

$db = NULL;

function connect_db(){
	global $db;
	$db = mysqli_connect("localhost", "root", "", "exam_gen");
}

function close_db(){
	global $db;
	mysqli_close($db);
}


function s($s){ // Bad Function name //
	global $db;
	return mysqli_real_escape_string($db, $s);
}

function s_sql($s){
	global $db;
	return mysqli_real_escape_string($db, $s);
}
function redirect_to($str){
	header("Location: " . $str);
	exit;
}

function h_authenticated($str){
	if(!isset($_SESSION["user_id"]))
		redirect_to($str);
}

function if_not_login_die($str = ""){
	if(!isset($_SESSION["user_id"]))
		die($str);
}

function start($path = ""){
	session_start();
	connect_db();
	h_authenticated($path . "get-started.php");
}

function add_user($name, $username, $email, $password, $user_type = 1, $activated = 0, $branch = "", $department = ""){
	global $db;
	$name_r	= s($name);
	$username_r = s($username);
	$email_r = s($email);
	$pass_r = md5($password);
	$user_type_r = (int)$user_type;
	$activated_r = (int)$activated;

	if($branch == "") $branch_r = "NULL";
	else $branch_r = (int)$branch;

	if($department == "") $department_r = "NULL";
	else $department_r = (int)$department;


	$res = $db->query("INSERT INTO user (name, username, email, password, usertype, activated, BranchID, DepartmentID) VALUES ('$name_r', '$username_r', '$email_r', '$pass_r', {$user_type_r}, {$activated_r}, {$branch_r}, {$department_r})");

	if (!$res) die("Server Internal Error");
	return $db->insert_id;
}

function password_match($username, $password){
	global $db;
	$ret = mysqli_fetch_assoc($db->query("SELECT * FROM user WHERE username = '".s($username)."'"));

	if(md5($password) == $ret["Password"]){
		if(!$ret["Activated"]) return -1;
		else if($ret["Activated"] == -1) return -2;
		return (int)$ret["UserID"];
	}
	return 0;
}

function login($user_id){
	global $db;
	if(!isset($_SESSION["user_id"])){
		$_SESSION["user_id"] = $user_id;
		$type = $db->query("SELECT * from user WHERE UserID=" . $user_id)->fetch_assoc()["UserType"];
		$_SESSION["user_type"] = $type;
		if($type != 1) $_SESSION["admin"] = 1;
	}
}

function get_user_info_by_id($id){
	global $db;
	return mysqli_fetch_assoc($db->query("SELECT * FROM user WHERE UserID = '".(int)$id."'"));
}

?>