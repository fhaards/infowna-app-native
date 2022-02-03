<?php
$getIdUser    = $_SESSION["user"]["uuid"];
include "config/helpers.php";
$checkStatus  = "SELECT * FROM users WHERE uuid = ?";
$rowCekStatus = $db->prepare($checkStatus);
$rowCekStatus->execute(array($getIdUser));
$getStatusUser = $rowCekStatus->fetch();

if (!empty($_GET['users'])) { //USER (NOT AUTH) PAGES
    if ($_SESSION["user"]["user_group"] == 'user') :
        http_response_code(404);
        echo "404";
    else :
        if ($_GET['users'] == 'table') :
            require "views/users/users-table.php";
        endif;
        if ($_GET['users'] == 'delete') :
            require "views/users/users-delete.php";
        endif;
    endif;
} else if (!empty($_GET['profile'])) { //PROFILE PAGES
    if ($_GET['profile'] == 'profile-edit') :
        require "views/profile/profile-edit.php";
    else :
        http_response_code(404);
        echo "404";
    endif;
} else if (!empty($_GET['about'])) { //PROFILE PAGES
    if ($_GET['about'] == 'about-edit') :
        require "views/about/about-edit.php";
    else :
        http_response_code(404);
        echo "404";
    endif;
} else if (!empty($_GET['requests'])) { // REQUEST PAGES

    $getCheckRequests = "SELECT * FROM requests WHERE uuid = ?";
    $rowCekRequests   = $db->prepare($getCheckRequests);
    $rowCekRequests->execute(array($getIdUser));
    // $getCheckRequestsVal = $rowCekRequests->fetch();
    $countRequestsByUuid = $rowCekRequests->rowCount();

    if ($_GET['requests'] == 'table') :
        if ($_SESSION["user"]["user_group"] == 'user') :
            if ($getStatusUser['user_status'] == 0) :
                require "partials/check_status.php";
            else :
                require "views/requests/requests-table.php";
            endif;
        else :
            require "views/requests/requests-table.php";
        endif;
        
    elseif ($_GET['requests'] == 'add') :
        if ($getStatusUser['user_status'] == 0) :
            echo '<script>window.location="index.php?profile=profile-edit"</script>';
        else :
            require "views/requests/requests-form.php";
        endif;
    elseif ($_GET['requests'] == 'data') :
        if ($getStatusUser['user_status'] == 0) :
            echo '<script>window.location="index.php?profile=profile-edit"</script>';
        else :
            require "views/requests/requests-form.php";
        endif;
    elseif ($_GET['requests'] == 'edit') :
        if ($getStatusUser['user_status'] == 0) :
            echo '<script>window.location="index.php?profile=profile-edit"</script>';
        else :
            $reqsIds = $_GET['reqid'];
            require "views/requests/requests-edit-reject.php";
        endif;
    endif;

} else if (!empty($_GET['home'])) { //DASHBOARD PAGES
    if ($_GET['home'] == 'dashboard') :
        require "views/dashboard.php";
        if ($_SESSION["user"]["user_group"] == 'user') :
            if ($getStatusUser['user_status'] == 0) :
                require "partials/check_status.php";
            endif;
            require "views/dashboard-user.php";
        elseif ($_SESSION["user"]["user_group"] == 'admin') :
            require "views/dashboard-admin.php";
        else :
            http_response_code(404);
            echo "404";
        endif;

    endif;
} else {
}

// ORIGINAL PDO ROUTING WITH SPO METHOD
    // <?php
    // $setUri     = "/wna-app-sws";
    // $url        = $setUri;
    // $request    = $_SERVER['REQUEST_URI'];
    // 
    // 
    // $getparse = "";
    // switch ($request) {
    // case $url . '/dashboard':
    // require "views/dashboard.php";
    // break;
    // case $url . '/users':
    // if (!empty($_GET['users'] == 'delete')) {
    // require "views/users/users-delete.php";
    // } else {
    // require "views/users/users-table.php";
    // }
    // break;
    // case $url . '/users-delete&id=' . $_GET['id']:
    // require "views/users/users-delete.php";
    // break;
    // case $url . '/requests':
    // if ($_SESSION["user"]["user_group"] == 'admin') :
    // require "views/requests/requests-table.php";
    // else :
    // require "views/requests/requests-form.php";
    // endif;
    // break;
    // default:
    // http_response_code(404);
    // echo "404";
    // break;
    // }