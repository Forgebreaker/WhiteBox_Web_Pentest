<?php
#==================================================#
#    Đoạn code giúp NPC ở map 4 kiểm tra secret    #
#==================================================#
$flag = file_get_contents("/flag");
if (isset($_GET["secret"])) {
	if ($flag === $_GET["secret"])
		die(header("Location: ../../frontend/html/map5.html")); // Corret secret
	die(header("Location: ../../frontend/html/map4.html")); // Wrong secret
}
