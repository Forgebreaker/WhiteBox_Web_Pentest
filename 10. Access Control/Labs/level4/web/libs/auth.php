<?php 
session_start();
if (!isset($_SESSION["user_id"]))
    die(header("Location: /index.php"));
?>
