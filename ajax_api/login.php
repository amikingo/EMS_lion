<?php
include "../funcs.php";
connect_db();
session_start();

$msg = NULL;

if(isset($_POST["username"]) && isset($_POST["password"])){
	if(!data_exist("user", "username", $_POST["username"]))
		$msg = "Username you've entered does'nt match any account.";
	else{
		$ret = password_match($_POST["username"], $_POST["password"]);
		if(!$ret)
			$msg = "Incorrect password.";
		elseif($ret == -1)
			$msg = "This Account is not activated yet! you will recieve email when your account is activated!";
		elseif($ret == -2)
			$msg = "Your account is suspended!";
		else {
			login($ret);
			if(!isset($_SESSION["admin"])) 
				die("index.php");
			die("dashboard");
		}
	}
}

echo "-".$msg;

close_db();
?>