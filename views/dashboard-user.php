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
                        <th>Category</th>
                        <th>Permit Type</th>
                        <th>Created at</th>
                        <th>Status</th>
                    </tr>
                    <?php
                    foreach ($fetchRowReq as $itemDashReq) {
                    ?>
                        <tr>
                            <td>
                                <?= $itemDashReq['req_id']; ?>
                            </td>
                            <td>
                                <strong><label class="<?= categoryBadge($itemDashReq['category']); ?>"><?= $itemDashReq['category'] ?></label></strong>

                            </td>
                            <td>
                                <?= $itemDashReq['requests_type']; ?>
                            </td>
                            <td><?= date('Y - M - d', strtotime($itemDashReq['created_at'])); ?></td>
                            <td>
                                <span class="flex-grow-1 p-2 badge <?= statusBadge($itemDashReq['req_status']); ?> d-flex align-items-center justify-content-center">
                                    <small> <?= $itemDashReq['req_status']; ?></small>
                                </span>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
            <div class="d-flex py-3 align-items-center justify-content-center">
                <a href="index.php?requests=table"> See All Data</a>
            </div>
        </div>
    <?php
    endif;
    ?>
</div>