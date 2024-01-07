<?php
include_once("paragraphs.php");
class Thesis
{
    public $paragraphs;
    public function __construct()
    {
        $this->paragraphs = new Paragraphs();
    }

    public function write($text)
    {
        $this->paragraphs->text = $this->paragraphs->text . " " . $text;
    }

    public function __destruct()
    {
        $point = $this->paragraphs->get_point();
        echo "Finish Thesis with " . $point;
    }
}
