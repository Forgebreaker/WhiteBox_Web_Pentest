<?php
#========================================#
#    Các class dùng để tạo ra trainer    #
#========================================#
include_once("game_config.php");

class Trainer
{
    public $name;
    public $pokemon;
    public function __construct($name, $pokemon_name, $pokemon_type)
    {
        $this->name = $name;
        $health = rand(GlobalConfig::BASE_HEALTH_MIN, GlobalConfig::BASE_HEALTH_MAX);
        $damage = rand(GlobalConfig::BASE_DMG_MIN, GlobalConfig::BASE_DMG_MAX);
        $this->pokemon = new Pokemon($health, $damage, $pokemon_name, $pokemon_type);
    }

    /** 
     *   Hàm xử lý việc đánh nhau của Pokemon, Pokemon sẽ tăng sức mạnh sau khi kết thúc trận đấu
     *
     *   @param Pokemon $wild_pokemon: Pokemon hoang dã mà người chơi gặp trong lúc di chuyển
     *   @return Array Cho thấy số máu của Pokemon qua từng vòng đấu, cột đầu tiên là máu Pokemon của người chơi, cột thứ hai là máu của quái
     *
     */
    public function fight(Pokemon $wild_pokemon)
    {
        $result = array();
        // Đánh nhau cho đến khi 1 trong 2 Pokemon hết máu
        while ($this->pokemon->health > 0 && $wild_pokemon->health > 0) {
            $this->pokemon->health = $this->pokemon->health - $wild_pokemon->damage;
            $wild_pokemon->health = $wild_pokemon->health - $this->pokemon->damage;
            array_push($result, array($this->pokemon->health, $wild_pokemon->health));
        }
        $this->pokemon->levelUp();
        return $result;
    }


    /** 
     *   Kiểm tra Pokemon của người chơi có còn sống hay không
     *
     *   @return Boolean true khi còn sống, false khi đã chết 
     *
     *
     */
    public function checkAlive()
    {
        if ($this->pokemon->health < 0) {
            return false;
        }
        return true;
    }

    /** 
     *   Xử lý khi người chơi không muốn đánh nhau. 
     *   Tỉ lệ chạy trốn thành công tùy thuộc vào config
     *   Nếu chạy trốn thất bại, máu của Pokemon giảm 1/10
     *   @return Boolean true khi chạy trốn thành công, false ngược lại 
     *
     *
     */
    public function run()
    {
        $rate = rand(0, 100);
        if ($rate > GlobalConfig::RUN_CHANCE) {
            return true;
        }
        $this->pokemon->health = $this->pokemon->health - intval($this->pokemon->health / 10);
        return false;
    }

    public function __toString() {
        return json_encode($this);
    }

}

class TrumCuoi extends Trainer
{
    /** 
     *   TrumCuoi là Trainer với khả năng đặc biệt one-round KO    
     *   Đọc hàm fight() của class Trainer để có thêm thông tin
     */
    public function fight(Pokemon $wild_pokemon)
    {
        return Array(Array(1, 0)); // đặt số máu của Pokemon hoang dã = 0
    }
}