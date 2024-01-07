<?php
if (isset($_GET["id"])) {
    try {
        include("db.php");
        $database = make_connection("posts_db");

        $id = $database->real_escape_string($_GET["id"]);
        $sql = "SELECT content FROM posts WHERE id=" . $id;
        $db_result = $database->query($sql);
        
        if ($db_result->num_rows > 0) {
            $row = $db_result->fetch_assoc(); // Get the first row
            $message = "<iframe height='800px' width='100%' src='" . $row["content"] . "'></iframe>";
        } else {
            $message = "ID not found";
        }
    } catch (mysqli_sql_exception $e) {
        $message = $e->getMessage();
    }
} else {
    header("Location: level6.php?id=1");
}

include("static/html/blog.html");
