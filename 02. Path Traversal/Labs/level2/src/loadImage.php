<?php 
$file = $_GET['file'];
if (strpos($file, "..") !== false)
    die("Hack detected");
if (file_exists($file)) {
    header('Content-Type: image/png');
    readfile($file);
}
else { // Image file not found
    echo " 404 Not Found";
}?>