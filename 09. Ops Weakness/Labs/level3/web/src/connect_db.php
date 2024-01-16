<?php
$host         = getenv("MYSQL_HOSTNAME");
$db           = getenv("MYSQL_DATABASE");
$user         = getenv("MYSQL_USER");
$password     = getenv("MYSQL_PASSWORD");

// Create connection
try {
  $conn = new mysqli($host, $user, $password, $db);
} catch (Exception $e) {
  die("Connection error: " . $e->getMessage());
}
