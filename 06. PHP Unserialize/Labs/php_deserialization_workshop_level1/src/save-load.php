<?php
if (isset($_GET["action"])) {
    $action = $_GET["action"];
    switch ($action) {
        case 'save':
            // Lặp qua từng student và lưu xuống theo dạng KEY1|VALUE1|KEY2|VALUE2 ...
            $message = "";
            foreach ($_SESSION["students"] as $key => $student)
                $message = $message . $key . "|" . serialize($student) . "|";
            // Tải về thành file students.sav
            // Reference: https://stackoverflow.com/questions/13279801/how-can-i-download-a-string-to-the-browser-using-php-not-a-text-file
            header('Content-Type: application/octet-stream');
            header("Content-disposition: attachment; filename=students.sav");
            header("Content-Length: " . strlen($message));
            echo $message;
            die();
            break;
        case 'load':
            $data = file_get_contents($_FILES["data"]["tmp_name"]);
            $students_data = explode("|", $data);
            $students = array();
            for ($idx = 0; $idx < count($students_data); $idx = $idx + 2) {
                $key = $students_data[$idx];
                $value = $students_data[$idx + 1];
                // Xử lý khi unserialize bị lỗi
                // Reference: https://stackoverflow.com/questions/12684871/how-to-catch-unserialize-exception
                $value = unserialize($value);
                $students[$key] = $value;
                $_SESSION["students"] = $students;
            }
            echo "Loaded";
            echo '<meta http-equiv="refresh" content="1;url='. $_SERVER['PHP_SELF']. '">';
            die();
            break;
        case 'clear':
            $_SESSION["students"] = array();
            echo "Cleared";
            echo '<meta http-equiv="refresh" content="1;url='. $_SERVER['PHP_SELF']. '">';
            die();
            break;
        default:
            break;
    }
}
