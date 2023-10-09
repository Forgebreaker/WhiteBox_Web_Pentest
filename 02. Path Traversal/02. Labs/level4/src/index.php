<?php
    include './db.php';

    // if is not login
    if (!isset($_SESSION['name'])) {
        header('Location: /register.php');
        die();
    }

    $arr = $db->select_all_users_with_point();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
      <?php include './views/header.html'; ?>
      <style>
        table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }

        td, th {
          border: 1px solid #dddddd;
          text-align: left;
          padding: 8px;
        }

        tr:nth-child(even) {
          background-color: #dddddd;
        }
      </style>
    </head>

    <body>
      <?php include './navbar.php'; ?>

      <h1>Goal: RCE</h1>

      <table>
        <tr>
          <th>Avatar</th>
          <th>Name</th>
          <th>Points</th>
        </tr>

        <?php foreach ($arr as $row) : ?>
          <tr>
            <th><img width="50px" src="/upload/<?php echo $row["name"] ?>/avatar.jpg"></th>
            <th><?php echo $row["name"] ?></th>
            <th><?php echo $row["points"] ?></th>
          </tr>
        <?php endforeach; ?>

      </table>
    </body>
</html>
