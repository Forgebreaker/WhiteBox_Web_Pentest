<?php
  // error_reporting(0);
  include './db.php';

  // if is not login
  if (!isset($_SESSION['name'])) {
    header('Location: /register.php');
    die();
  }

  $response = "";
  if (isset($_FILES["fileUpload"])) {
    // Always store as avatar.jpg
    move_uploaded_file($_FILES["fileUpload"]["tmp_name"], "/var/www/html/upload/" . $_SESSION["name"] . "/avatar.jpg");
    $response = "Success";
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php include './views/header.html'; ?>
</head>
<body>
  <?php include './navbar.php'; ?>

  <br><br><br>
  <h1>
    Upload avatar
  </h1>

  <form method="post" enctype="multipart/form-data" accept="image/jpg">
    <input type="file" name="fileUpload">
    <input type="submit">
    <p style="color: green"><?php echo $response; ?></p>
  </form>
</body>
</html>
