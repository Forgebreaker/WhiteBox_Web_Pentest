<?php
#==========================================#
#    Đoạn code sử dụng ở phần đăng nhập    #
#==========================================#
include("all_libs.php");
session_start();
if (isset($_POST["username"]) && isset($_POST["password"])) {
	$user = $db->query_user($_POST["username"], $_POST["password"]);
	if (isset($user)) {
		$_SESSION["username"] = $user["username"];
		$message = "<font color='green'>Login successfully, redirecting...</font><meta http-equiv='refresh' content='1;url=./new_game.html'/>";
	} else
		$message = "<font color='red'>Wrong username or password</font>";
}
if (isset($message))
	echo $message;
