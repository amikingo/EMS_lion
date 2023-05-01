<?php
include "../config.php";
connect_db();
session_start();

$msg = "";

if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
	$msg = "-invalid email.";
else if(!data_exist("user", "email", $_POST["email"]))
	$msg = "-You dont have an account with this email.";
else{
	$msg = "+reset password link sent, check your inbox   // TODO This...!";
}

echo $msg;
?>