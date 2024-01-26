<?php
    // error_reporting(0);
    if (!isset($_GET['game'])) {
        header('Location: /?game=fatty-bird-1.html');
    }
    $game = $_GET['game'];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include './views/header.html'; ?>
    </head>

    <body>
        <br><br>
        <p class="display-5 text-center">Goal: RCE me</p>

        <br>
        <div style="background-color: white; padding: 20px;">
            <?php include './views/' . $game; ?>
        </div>

    </body>

    <?php include './views/footer.html' ?>
</html>
