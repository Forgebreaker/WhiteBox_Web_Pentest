<?php
session_start();
include("libs/db.php");

if (isset($_GET["action"])) {
    switch ($_GET["action"]) {
        case "login":
            $res = select_one(
                "SELECT user_id, username FROM users WHERE username = ? AND password = ?",
                $_POST['username'],
                $_POST['password']
            );
            //var_dump($res);
            if ($res) {
                $_SESSION['user_id'] = $res['user_id'];
                header("Location: /wall.php");
                echo "Login successfully";
            } else {
                header('Refresh:2; url=index.php'); // Redirect về index.php sau 2s
                echo "Wrong username or password";
            }
            die();
        case "register":
            $res = select_one(
                "SELECT username FROM users WHERE username = ?",
                $_POST['username']
            );
            if ($res) {
                header('Refresh:2; url=index.php'); // Redirect về index.php sau 2s
                echo "Sorry this username already registered";
            } else {
                exec_query(
                    "INSERT INTO users (username, password) VALUES (?, ?)",
                    $_POST['username'],
                    $_POST['password']
                );
                header('Refresh:2; url=index.php'); // Redirect về index.php sau 2s
                echo "Registered successfully";
            }
            die();
        case "logout":
            unset($_SESSION["user_id"]);
            header("Location: /index.php");
            die();
    }
}

include("static/html/header.html");
?>


<div class="container mt-5">
    <div class="row justify-content-md-center">
        <div class="col-md-5 mt-5 my-auto">
            <h1 class="text-primary font-weight-bolder">fakebook v1</h1>
            <h3 class="font-weight-normal">Fakebook helps you connect <br>and stalk your crush.</h3>
        </div>
        <div class="col-md-5">
            <div class="card shadow">
                <div class="card-body">
                    <!-- login form -->
                    <h4>Login</h4>
                    <form action="/index.php?action=login" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                        </div>
                        <button type="submit" class="btn btn-primary">Sign in</button>
                    </form>
                    <hr>
                    <!-- register form -->
                    <h4>Register</h4>
                    <form action="/index.php?action=register" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                        </div>
                        <button type="submit" class="btn btn-success">Sign up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>