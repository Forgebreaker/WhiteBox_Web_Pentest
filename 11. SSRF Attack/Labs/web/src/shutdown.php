<?php
include("status_handle.php");

$userIP = $_SERVER['REMOTE_ADDR'];
if ($_SERVER['REMOTE_ADDR'] === "127.0.0.1") {
    do_shutdown();
    die("Down server to maintain");
}
http_response_code(403);
die("Error 403 forbidden, here is your IP: <b>$userIP</b>, this site can only be accessed by <b>127.0.0.1</b>");
