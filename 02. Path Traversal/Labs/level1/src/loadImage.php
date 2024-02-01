<?php 
$file_name = $_GET['file_name'];
$file_path = '/var/www/html/images/' . $file_name; 
if (file_exists($file_path)) {
    header('Content-Type: image/png');
    readfile($file_path);
}
else { // Image file not found
    echo " 404 Not Found";
}
