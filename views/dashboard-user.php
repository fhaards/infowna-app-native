<?php
$dashReq      = "SELECT * FROM requests WHERE uuid=? ";
$dashRowReq   = $db->prepare($dashReq);
$dashRowReq->execute(array($getIdUser));
$fetchRowReq  = $dashRowReq->fetchAll();
$countRequest = $dashRowReq->rowCount();
?>
<div class="card">
    <div class="card-header">
        My Requests
    </div>
    <?php
    if (empty($countRequest)) :
    ?>
        <div class="card-body d-flex flex-row justify-content-center gap-3 align-items-center">
            You Have no requests .. 
        </div>
    <?php
    else :
    ?>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table w-100">
                    <tr>
                        <th>Request Id</th>
                        <th>Created Date</th>
                        <th>Status</th>
                    </tr>
                    <?php
                    foreach ($fetchRowReq as $itemDashReq) {
                    ?>
                        <tr>
                            <td>
                                <a href="index.php?requests=data">
                                    <?= $itemDashReq['req_id']; ?>
                                </a>
                            </td>
                            <td><?= date('d/m/Y - H:i', strtotime($itemDashReq['created_at'])); ?></td>
                            <td>
                            <?php 
                                if($itemDashReq['req_status'] == 'Waiting') :
                                    $classto = 'badge-warning bg-warning';
                                elseif($itemDashReq['req_status'] == 'Approved') :
                                    $classto = 'badge-primary bg-primary';
                                else: 
                                    $classto = 'badge-danger bg-danger';  
                                endif;
                            ?>
                                <span class="flex-grow-1 badge p-2 <?= $classto; ?> d-flex 
                                    align-items-center justify-content-center">
                                    <small> <?= $itemDashReq['req_status']; ?></small>
                                </span>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    <?php
    endif;
    ?>
</div>