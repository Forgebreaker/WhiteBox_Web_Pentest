<?php
class Paragraphs
{
    public $text;
    /** 
     *   Tính toán điểm số cho đoạn văn
     *   Đơn giản nhất là đếm số từ của đoạn văn
     *   TODO: Suy nghĩ cách chấm điểm tốt hơn
     *
     *   @return Int Điểm số của đoạn văn
     *
     */
    public function get_point()
    {
        return strlen($this->text);
    }
}
