<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["content"])) {
        include "libs/db.php";
        exec_query(
            'INSERT INTO notifications (content) VALUES (?)',
            $_POST["content"]
        );
        header('Refresh:2; url=system_notification.php'); // Redirect về system_notification.php sau 2s
        die("Notification pushed.");
    } else {
        header('Refresh:2; url=system_notification.php'); // Redirect về system_notification.php sau 2s
        die("Empy content.");
    }
}

include "static/html/header.html";
?>

<div class="row justify-content-sm-center">
    <div class="col-sm-12 mt-5 text-center">
        <h2>Admin push notifications</h2>
    </div>
    <div class="col-sm-4">
        <form action="/system_notification.php" method="POST">
            <div class="form-group">
                <label for="content">Content</label>
                <input type="text" class="form-control" id="content" name="content">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>