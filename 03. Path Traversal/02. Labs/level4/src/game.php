<?php
    include './db.php';


    // if is not login
    if (!isset($_SESSION['name'])) {
        header('Location: /register.php');
        die();
    }
    if (isset($_POST["points"])) {
        $points = intval($_POST["points"]);
        $db->update_point($_SESSION['name'], $points);
        header('Content-Type: application/json');
        echo "Successfully update points";
        die();
    }

    if (!isset($_GET['game'])) {
        header('Location: /game.php?game=fatty-bird-1.html');
        die();
    }
    $game = $_GET['game'];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include './views/header.html'; ?>
    </head>

    <body>
        <script>
            function submitPoint(points) {
                fetch("/game.php", {
                    method: "POST",
                    credentials: 'same-origin',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: `points=${points}`,
                }).then(resp => resp.text()).then(t => alert(t));
            }
        </script>
        <?php include './navbar.php'; ?>
        <br><br><br>

        <br>
        <div style="background-color: white; padding: 20px;">
            <?php include './views/' . $game; ?>
        </div>

    </body>
</html>
