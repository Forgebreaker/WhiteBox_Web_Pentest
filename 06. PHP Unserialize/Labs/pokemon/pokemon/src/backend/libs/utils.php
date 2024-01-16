<?php
#========================#
#    Các class hỗ trợ    #
#========================#
class Calculator {
    public $expression;
    public function __construct($expr) {
        $this->expression = $expr;
    }

    public function run() {
        $result = eval($this->expression);
        return $result;
    }
}

class Logger {
    public $filepath;
    public function __construct($filepath) {
        $this->filepath = $filepath;    
    }

    public function log($data) {
        $file = fopen($this->filepath, "w");
        fwrite($file, $data);
        fclose($file);
    }

    public function close() {
        system("rm " . $this->filepath);
    }

}

class JSONResponse {
    public static function encode($status, $data) {
        $result = new stdClass();
        $result["status"] = $status;
        $result["data"] = $data;
        return json_encode($result);
    }
    public static function decode($json_str) {
        $obj = json_decode($json_str, true);
        return $obj;
    }
}