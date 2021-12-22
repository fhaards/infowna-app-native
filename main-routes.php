<?php
switch ($request) {
    case $url . '/dashboard':
        require "views/dashboard.php";
        break;
    case $url . '/users':
        require "views/users/users-table.php";
        break;
    case $url . '/requests':
        if ($_SESSION["user"]["user_group"] == 'admin') :
            require "views/requests/requests-table.php";
        else :
            require "views/requests/requests-form.php";
        endif;
        break;
    default:
        http_response_code(404);
        echo "404";
        break;
}
