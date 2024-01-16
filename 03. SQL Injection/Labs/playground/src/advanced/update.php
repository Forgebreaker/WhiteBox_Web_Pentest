<?php
session_start();
include("../db.php");
$database = make_connection("advanced_db");

if (!isset($_SESSION['username']))
    die(header("location: level8.php"));

$username = $_SESSION['username'];
$email = $_POST['email'];
if ($username === 'admin')
    $message = "<h3><b>Wow you can finally log in as admin, here is your flag CBJS{FAKE_FLAG_FAKE_FLAG}</b></h3>";

if (isset($_POST['button'])) {
    try {
        $sql = "UPDATE users SET email='$email' WHERE username='$username'";
        $db_result = $database->query($sql);
        if ($db_result) {
            $message = "Successfully update your Email";
        } else {
            $message = "Failed to update your email";
        }
    } catch (mysqli_sql_exception $e) {
        $message = $e->getMessage();
    }
}

include("../static/html/update.html");
