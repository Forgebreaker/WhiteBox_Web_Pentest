<?php
#======================================#
#    Đoạn code xử lí chính của game    #
#======================================#
include("helper/all_libs.php");
session_start();

if (!isset($_SESSION["username"]))
    die('{"msg": "You are not logged in"}');

if (!isset($_SESSION["trainer"]))
    die('{"msg": "You havent started the game yet"}');

if (isset($_GET["level"]) && isset($_POST["action"])) {
    $level = $_GET["level"];
    $action = $_POST["action"];

    switch ($level) {
        // Xử lí theo map
        case 'map1':
            include('map1.php');
            break;
        case 'map2':
            include('map2.php');
            break;
        case 'map3':
            include('map3.php');
            break;
        case 'map4':
            include('map4.php');
            break;
        case 'map5':
            // Không làm gì hết ở đây, đố hack được luôn đó :)
            break;
        default:
            break;
    }
}
