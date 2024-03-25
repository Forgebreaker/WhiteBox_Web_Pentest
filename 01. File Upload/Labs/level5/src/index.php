<?php
    // error_reporting(0);

    // Create folder for each user
    session_start();
    if (!isset($_SESSION['dir'])) {
        $_SESSION['dir'] = 'upload/' . session_id();
    }
    $dir = $_SESSION['dir'];
    if ( !file_exists($dir) )
        mkdir($dir);

    if(isset($_GET["debug"])) die(highlight_file(__FILE__));
    if(isset($_FILES["file"])) {
        $error = '';
        $success = '';
        try {
            $mime_type = $_FILES["file"]["type"];
            if (!in_array($mime_type, ["image/jpeg", "image/png", "image/gif"])) {
                die("Hack detected");
            }
            $file = $dir . "/" . $_FILES["file"]["name"];
            move_uploaded_file($_FILES["file"]["tmp_name"], $file);
            $success = 'Successfully uploaded file at: <a href="/' . $file . '">/' . $file . ' </a><br>';
            $success .= 'View all uploaded file at: <a href="/' . $dir . '/">/' . $dir . ' </a>';
        } catch(Exception $e) {
            $error = $e->getMessage();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>PHP upload Level 5</title>

        <!-- This is for UI only -->
        <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" integrity="sha512-P5MgMn1jBN01asBgU0z60Qk4QxiXo86+wlFahKrsQf37c9cro517WzVSPPV1tDKzhku2iJ2FVgL67wG03SGnNA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    </head>
    <body>
        <br/>
        <br/>
        <h3 class="display-4 text-center">File upload workshop</h3>
        <h4 class="display-4 text-center">Level 5</h4>
        <p class="display-5 text-center">I think I need to check if the uploaded file is truly image or not</p>
        <p class="display-5 text-center">Goal: RCE me</p>

        <br/>
        <div class="container">
            <a href="/?debug">Debug source</a><br/>

            <form method="post" enctype="multipart/form-data">
                Select file to upload:
                <input type="file" name="file" id="file">
                <br/>
                <input type="submit">
            </form>
            <span style="color:red"><?php echo $error; ?></span>
            <span style="color:green"><?php echo $success; ?></span>
        </div>

    </body>

    <footer class="container">
        <br/>
        <br/>
        <br/>
        <button class="float-left btn btn-dark" type="button" onclick="prevLevel()">Previous level</button>
        <button class="float-right btn btn-dark" type="button" onclick="nextLevel()">Next level</button>

        <script>
            function prevLevel() {
                const url = new URL(origin);
                url.port = (parseInt(url.port) - 1).toString();
                location.href = url.toString();
            }
            function nextLevel() {
                const url = new URL(origin);
                url.port = (parseInt(url.port) + 1).toString();
                location.href = url.toString();
            }
        </script>

    </footer>
</html>
