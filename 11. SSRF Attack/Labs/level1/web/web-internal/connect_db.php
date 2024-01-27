<?php
// Create connection
$conn = new mysqli(getenv('MYSQL_HOSTNAME'), getenv('MYSQL_USER'), getenv('MYSQL_PASSWORD'), getenv('MYSQL_DATABASE'));
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
