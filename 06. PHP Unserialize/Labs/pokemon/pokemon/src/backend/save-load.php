<?php
#======================================================#
#    Đoạn code giúp save và load dữ liệu người chơi    #
#======================================================#

include("helper/all_libs.php");
session_start();

if (!isset($_SESSION["username"]))
	die('{"msg": "You are not logged in"}');

if (isset($_GET["action"])) {
	if ($_GET["action"] == "save") {
		if (!isset($_SESSION["trainer"]))
			die('{"msg": "You havent started the game yet"}');
				
		$message = serialize($_SESSION["trainer"]);
		// Tải về thành file pokemon.sav
		// Reference: https://stackoverflow.com/questions/13279801/how-can-i-download-a-string-to-the-browser-using-php-not-a-text-file
		header('Content-Type: application/octet-stream');
		header("Content-disposition: attachment; filename=pokemon.sav");
		header("Content-Length: " . strlen($message));
		echo $message;
	}
	else if ($_GET["action"] == "load") {
		if (isset($_FILES["data"])) {
			$data = file_get_contents($_FILES["data"]["tmp_name"]);
			// Xử lý khi unserialize bị lỗi
			// Reference: https://stackoverflow.com/questions/12684871/how-to-catch-unserialize-exception
			$trainer = @unserialize($data);
			if ($trainer == null) {
				echo "Something went wrong";
			}
			else {
				$_SESSION["trainer"] = $trainer;
				echo "Load successfully";
			}
		}
		else {
			echo "Empty data";
		}
	}
}
else {
	echo '{"msg": "Empty action"}';
}
