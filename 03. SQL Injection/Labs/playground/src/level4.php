<?php
function loginHandler($post_username, $post_password)
{
	try {
		include("db.php");
		$database = make_connection("hashed_db");

		$sql = "SELECT username, password FROM users WHERE username='$post_username'";
		$query = $database->query($sql);
		$user = $query->fetch_assoc(); // Get the first row

		if ($user === NULL)
			return "Username not found"; // No result

		$username = $user["username"];
		$password = $user["password"];
		$post_password = md5($post_password);

		if ($password !== $post_password)
			return "Wrong username or password";

		if ($username === "admin")
			return "Wow you can log in as admin, here is your flag CBJS{FAKE_FLAG_FAKE_FLAG}, but how about <a href='level5.php'>THIS LEVEL</a>!";
		else
			return "You log in as $username, but then what? You are not an admin";
	} catch (mysqli_sql_exception $e) {
		return $e->getMessage();
	}
}

if (isset($_POST["username"]) && isset($_POST["password"])) {
	$post_username = $_POST["username"];
	$post_password = $_POST["password"];
	$message = loginHandler($post_username, $post_password);
}

include("static/html/login.html");
