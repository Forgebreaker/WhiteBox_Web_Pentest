<?php
session_start();
include("../db.php");
$database = make_connection("advanced_db");

if (!isset($_SESSION['username']))
    die(header("Location: level7.php"));

$username = $_SESSION['username'];
if (isset($_POST['button'])) {
    try {
        $sql = "SELECT email FROM users WHERE username='$username'";
        $db_result = $database->query($sql);
        $row = $db_result->fetch_assoc(); // Get the first row

        if (isset($row)) 
            $message = $row['email'];
            
    } catch (mysqli_sql_exception $e) {
        $message = $e->getMessage();
    }
}

include("../static/html/profile.html");
