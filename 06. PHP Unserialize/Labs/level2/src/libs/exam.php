<?php
class Exam
{
    public $questions;
    public $right_answer;
    public $student_answer;

    // Khởi tạo exam với các câu hỏi và đáp án
    public function __construct($questions, $right_answer)
    {
        $this->questions = $questions;
        $this->right_answer = $right_answer;
    }

    public function test()
    {
        // Cho học sinh trả lời câu hỏi
        for ($idx = 0; $idx < count($this->questions); $idx++) {
            $this->student_answer = $_POST[$idx];
        }
    }
    public function get_point()
    {
        $result = 0;
        // Lặp qua từng câu hỏi, nếu câu trả lời của học sinh giống đáp án thì cộng điểm
        for ($idx = 0; $idx < count($this->questions); $idx++) {
            if ($this->student_answer[$idx] === $this->right_answer[$idx])
                $result = $result + 1;
        }
        return $result;
    }
}
