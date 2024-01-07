<?php
#=============================#
#    Đoạn code xử lí map 3    #
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
else if ($action == "boss") {
    $health = rand(5000, 10000);
    $damage = rand(100, 300);
    $wild_pokemon = new Pokemon($health, $damage);
    $_SESSION["boss"] = $wild_pokemon;
    // Kĩ năng đặc biệt của Boss: giảm sát thương của kẻ địch về 1
    $_SESSION["trainer"]->pokemon->health = 1;
    $_SESSION["trainer"]->pokemon->damage = 1;
    echo json_encode([$_SESSION["trainer"]->pokemon, $wild_pokemon]);
    die();
} 
else if ($action == "fight_boss") {
    if (!isset($_SESSION["boss"])) {
        // Khi chưa khởi tạo đối thủ
        // Trả về mảng rỗng thể hiện không có sự đánh nhau nào
        echo json_encode([]);
        die();
    }
    // Kĩ năng đặc biệt của Boss: giảm sát thương và máu của kẻ địch về 1
    $_SESSION["trainer"]->pokemon->health = 1;
    $_SESSION["trainer"]->pokemon->damage = 1;
    $result = $_SESSION["trainer"]->fight($_SESSION["boss"]);
    // Nếu đánh thắng 1 con boss, sẽ trả về FLAG ở header
    if ($_SESSION["trainer"]->checkAlive()) {
        header("Flag: " . getenv("BOSS2_FLAG"));
    }
    $_SESSION["boss"] = null;
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
