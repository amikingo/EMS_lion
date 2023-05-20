<?php
include "../funcs.php";

session_start();
if_not_login_die("Access Denied!");
connect_db();

$user_data = get_user_info_by_id($_SESSION["user_id"]);
$new_pass = md5($_POST['f_pass']);

if($user_data["Password"] != md5($_POST['o_pass']))
	die("-Incorrect password, please re-enter you current password correctly!");

$db->query("UPDATE user SET Password = '$new_pass' WHERE UserID = $_SESSION[user_id]");

echo "Account information updated!";

?>