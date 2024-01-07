<?php
#===================================#
#    Class dùng để tạo ra pokemon   #
#===================================#
include_once("game_config.php");

class Pokemon
{
    public $name;
    public $type;
    public $health;
    public $damage;
    public function __construct($health, $damage, $name = "", $type = "pikachu")
    {
        $this->name = $name;
        $this->type = $type;
        $this->health = $health;
        $this->damage = $damage;
    }

    public function levelUp()
    {
        $this->damage = $this->damage + GlobalConfig::DMG_INCREASE;
        $this->health = $this->health + GlobalConfig::HEALTH_INCREASE;
    }

    public function __toString()
    {
        return json_encode($this);
    }
}
