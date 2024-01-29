<?php
error_reporting(E_ERROR | E_PARSE);

include("hidden_feature.php");

$error = $content = '';
if (isset($_GET['url'])) {
    if (!filter_var($_GET['url'], FILTER_VALIDATE_URL)) {
        $error = 'Not a valid url';
    } else {
        $content = base64_encode(file_get_contents($_GET['url']));
    }
}
?>
<html>

<head>
    <!-- For UX/UI only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">Preview service</a>
        <a class="nav-item nav-link" href="/feature.php">Feature</a>
        <a class="nav-item nav-link" href="/shutdown.php">Shutdown</a>
        <a class="nav-item nav-link" href="/admin.php">Admin</a>
    </nav>
    <div class="container">
        <br />
        <br /><br />
        <h4>Image preview service</h4>
        <p>Let us get image for you</p>
        <form>
            <input type="text" name="url" class="form-control" placeholder="https://i.pinimg.com/originals/23/86/e3/2386e3023848e6754b8f0ad9597676a7.jpg"><br />
            <input type="submit" class="button btn btn-success" value="Submit">
        </form>
        <?php if (strlen($content) > 0) {
            echo '<img src="data:image/png;base64, ' . $content . '">';
        } ?>
        <p class="text-danger"><?php echo $error; ?></p>
    </div>
</body>

</html>