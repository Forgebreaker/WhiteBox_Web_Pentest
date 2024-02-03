<?php
  include './db.php';

  if(isset($_GET["debug"])) die(highlight_file(__FILE__));

  // If is login
  if (isset($_SESSION['name'])) {
    header('Location: /');
    die();
  }
  $error = '';
  if (isset($_POST["name"])) {
    $name = strval($_POST["name"]);
    if (!preg_match('/^[a-z0-9]+$/', $name)) {
      $error = 'Name must be [a-z0-9]+';
    } else {
      $user = $db->select_user_by_username($name);
      if (!!$user) {
        $error = 'Name already exist';
      } else {
        $_SESSION["name"] = $name;
        $db->create_user($name);
        // Create place for upload
        $dir = '/var/www/html/upload/' . $name;
        if ( !file_exists($dir) )
          mkdir($dir);
        die(header('Location: /'));
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include './views/header.html'; ?>
        <style>
          .form-register {
            background-color: white;
            radius: 5px;
            width: 60%;
            margin-left: 20%;
            padding: 20px;
            margin-top: 10%;
          }
          .form-title {
            text-align: center;
          }
          .form-input {
            width: 100%;
          }
          body {
            background-color: #c3c3c3;
          }
        </style>
    </head>

    <body>
      <form class="form-register" method="POST">
          <h1 class="form-title">Create account</h1>
          <label for="name">Name</label>
          <input class="form-input" type="text" name="name">
          <br><br>
          <input type="submit">
          <p style="color: red"><?php echo $error; ?></p>
      </form>
    </body>

</html>
