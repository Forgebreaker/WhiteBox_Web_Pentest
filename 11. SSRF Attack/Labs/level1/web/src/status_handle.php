<?php

// Các bạn không cần phải đọc những hàm bên dưới
function do_start()
{
    file_put_contents(".htaccess", "");
}

function do_shutdown()
{
    $content = 'Order Allow,Deny
    <FilesMatch "^up\.php$">
    Allow from all
    </FilesMatch>
    <FilesMatch "^maintain\.html$">
    Allow from all
    </FilesMatch>
    ErrorDocument 403 /maintain.html';
    file_put_contents(".htaccess", $content);
}
