<?php
function statusBadge($params)
{
    $badgestyle = "";
    if ($params == 'Waiting') :
        $badgestyle = 'badge-warning bg-warning rounded-pill';
    elseif ($params == 'Approved') :
        $badgestyle = 'badge-success bg-success rounded-pill';
    else :
        $badgestyle = 'badge-danger bg-danger rounded-pill';
    endif;
    return $badgestyle;
}

function categoryBadge($params)
{
    $badgestyle = "";
    if ($params == 'New') :
        $badgestyle = 'text-info';
    else :
        $badgestyle = 'text-success';
    endif;
    return $badgestyle;
}

function ifExtendNull($params)
{
    $results = "";
    $newdate = date('d - M- Y', strtotime($params));
    if ($params == NULL) :
        $results = '<span class="text-danger">- No Data -</span>';
    else :
        $results = "<span class='d-none'>$newdate</span>$newdate";
    endif;
    return $results;
}

function ifDateISNull($params)
{
    $results = "";
    $newdate = date('d - M- Y', strtotime($params));
    if ($params == NULL) :
        $results = ' - ';
    else :
        $results = "<span class='d-none'>$params</span>$newdate";
    endif;
    return $results;
}
