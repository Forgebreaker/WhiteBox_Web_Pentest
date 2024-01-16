<?php
#=============================#
#    Đoạn code xử lí map 4    #
#=============================#

if ($action == "new_battle") {
	$health = rand(70, 100);
	$damage = rand(10, 30);
	$wild_pokemon = new Pokemon($health, $damage);
	$_SESSION["enemy"] = $wild_pokemon;
	echo json_encode([$_SESSION["trainer"]->pokemon, $wild_pokemon]);
	die();
} 
else if ($action == "fight") {
	if (!isset($_SESSION["enemy"])) {
		// Khi chưa khởi tạo đối thủ
		// Trả về mảng rỗng thể hiện không có sự đánh nhau nào
		echo json_encode([]);
		die();
	}
	$result = $_SESSION["trainer"]->fight($_SESSION["enemy"]);
	$_SESSION["enemy"] = null;
	echo json_encode($result);
	die();
} 
else if ($action == "run") {
	$result = $_SESSION["trainer"]->run();
	if ($result == true)
		echo "You escaped";
	else
		echo "You failed to escape, and lost a little HP";
	die();
}
