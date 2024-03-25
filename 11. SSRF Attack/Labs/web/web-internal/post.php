<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("connect_db.php");

if (isset($_GET['id'])) {
    $sql = "SELECT * FROM Posts WHERE id=" . $_GET['id'];
    $result = $conn->query($sql) or die(mysqli_error($conn));
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<pre>Title: " . $row["title"] . "</pre>";
            echo "<pre>Content: " . $row["content"] . "</pre>";
            echo "<pre>Author: " . $row["author"] . "</pre>";
        }
    } else {
        echo "<pre>Post not found </pre>";
    }
}
