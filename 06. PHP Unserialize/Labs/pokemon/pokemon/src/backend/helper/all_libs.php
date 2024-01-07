<?php
#===========================================================================================================#
#    Đoạn code giúp include mọi file .php trong thư mục libs                                                #
#    Reference: https://stackoverflow.com/questions/599670/how-to-include-all-php-files-from-a-directory    #
#===========================================================================================================#
$libs_path = $_SERVER["DOCUMENT_ROOT"]. '/backend/libs/*.php';
foreach (glob($libs_path) as $filename) {
	include $filename;
}
