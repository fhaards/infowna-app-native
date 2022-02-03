<?php

function statusBadge($params)
{
    $badgestyle = "";
    if ($params == 'Waiting') :
        $badgestyle = 'badge-warning bg-warning rounded-pill';
    elseif ($params == 'Approved') :
        $badgestyle = 'badge-primary bg-primary rounded-pil';
    else :
        $badgestyle = 'badge-danger bg-danger rounded-pill';
    endif;
    return $badgestyle;
}
