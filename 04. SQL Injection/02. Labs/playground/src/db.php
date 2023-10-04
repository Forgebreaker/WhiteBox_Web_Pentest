<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
function make_connection($database_name) {
    return new mysqli(getenv('MYSQL_HOSTNAME'), 
                      getenv('MYSQL_USER'), 
                      getenv('MYSQL_PASSWORD'), 
                      $database_name);
}
?>