<?php
#=======================================#
#    Đoạn code sử dụng để start game    #
#=======================================#
include("all_libs.php");
session_start();

if (isset($_POST["pokemon_name"]) && isset($_POST["pokemon_type"]))
	$_SESSION["trainer"] = new Trainer($_SESSION["username"], $_POST["pokemon_name"], $_POST["pokemon_type"]);
	
die(header("Location: ../../frontend/html/map1.html"));
