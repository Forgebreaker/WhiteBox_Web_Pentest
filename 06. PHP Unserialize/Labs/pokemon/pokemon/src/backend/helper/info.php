<?php
#=========================================================================#
#    Đoạn code giúp in ra thông tin trainer khi nhấn View Info từ menu    #
#=========================================================================#
include("all_libs.php");
session_start();

if (!isset($_SESSION["username"]))
    die('{"msg": "You are not logged in"}');

if (!isset($_SESSION["trainer"]))
    die('{"msg": "You havent started the game yet"}');

echo $_SESSION["trainer"];
