<?php
    // error_reporting(0);

    // Create store place for each user (we place this in /usr/upload for easily handle)
    session_start();
    if (!isset($_SESSION['dir'])) {
        $_SESSION['dir'] = '/var/www/html/upload/' . bin2hex(random_bytes(16));
    }
    $dir = $_SESSION['dir'];
    if ( !file_exists($dir) )
        mkdir($dir);

    $cmd = '';
    $error = '';
    $success = '';
    $debug = '...';
    if(isset($_FILES["file"])) {
        try {
            // Fixed: Dont save file to user's directory, only use tmp_name
            // unzip the file
            $name = '/tmp/name';
            move_uploaded_file($_FILES["file"]["tmp_name"], $name);

            $cmd = "unzip " . $name . " -d " . $dir;
            $debug = shell_exec($cmd);

            // Remove /usr/ from directory
            $user_dir = str_replace("/var/www/html", "", $dir);
            $success = 'Successfully uploaded and unzip files into <a href="' . $user_dir . '/">' . $user_dir .'</a>';
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

        <title>ZIP SYMLINK UPLOAD</title>

        <!-- This is for UI only -->
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" integrity="sha512-P5MgMn1jBN01asBgU0z60Qk4QxiXo86+wlFahKrsQf37c9cro517WzVSPPV1tDKzhku2iJ2FVgL67wG03SGnNA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    </head>
    <body>
        <br/>
        <br/>
        <h3 class="display-4 text-center">ZIP SYMLINK UPLOAD</h3>

        <br/>
        <div class="container">

            <form method="post" enctype="multipart/form-data">
                Select zip file to upload and extract: <br>
                <input type="file" name="file" id="file">
                <br><br>
                <input type="submit">
            </form>
            <br>
            <p style="color:blue"><?php echo 'Unzipper command: ' . $cmd; ?></p>
            <p style="color:red"><?php echo $error; ?></p>
            <p style="color:green"><?php echo $success; ?></p>

            <br><br>
            <p class="display-5 font-italic">Unzipper debug info:</p>
            <pre>
                <?php echo $debug; ?>
            </pre>
        </div>

    </body>

    <footer class="container">
        <br/>
        <br/>
        <br/>
        
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
