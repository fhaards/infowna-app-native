<div class="table-responsive py-5 px-2 text-left" id="table">
    <table id="table-request" class="table table-bordered table-striped table-hover mt-5 w-100">
        <thead class="text-center">
            <tr>
                <th class="p-2">Request Id</th>
                <?php if ($_SESSION["user"]["user_group"] == 'admin') : ?>
                    <th class="p-2">Name</th>
                <?php endif; ?>
                <th class="p-2">Category</th>
                <th class="p-2">Permit Type</th>
                <th class="p-2">Created at</th>
                <th class="p-2">Extend at</th>
                <th class="p-2">Expired at</th>
                <th class="p-2">Status</th>
                <th class="p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $getsUser = $_SESSION["user"]["user_group"]; ?>
            <?php foreach ($fetch as $item) : ?>
                <?php $extendDate  = $item['extend_at']; ?>
                <?php $expiredDate = $item['expired_at']; ?>
                <?php $reqid = $item['req_id']; ?>
                <?php $setCurrents = date('Y-m-d H:i:s'); ?>
                <tr>
                    <td class="py-3 text-center">
                        <a href="javscript:void(0)" class="detail-request text-dark btn-link" reqid="<?= $reqid; ?>" data-bs-toggle="modal" data-bs-target="#detailRequestModal">
                            <?= $reqid; ?>
                        </a>
                    </td>
                    <?php if ($_SESSION["user"]["user_group"] == 'admin') : ?>
                        <td class="py-3"><?= $item['name'] ?></td>
                    <?php endif; ?>
                    <td class="py-3 text-center">
                        <strong><label class="<?= categoryBadge($item['category']); ?>"><?= $item['category'] ?></label></strong>
                    </td>
                    <td class="py-3 text-center"><?= $item['requests_type'] ?></td>
                    <td class="py-3 text-center">
                        <span class="d-none"><?= date('d - M- Y', strtotime($item['created_at'])); ?></span>
                        <?= date('d - M - Y', strtotime($item['created_at'])); ?>
                    </td>
                    <td class="py-3">
                        <div class="d-flex flex-row justify-content-center align-items-center">

                            <?= ifExtendNull($extendDate); ?>
                            <?php if (($item['category'] == 'New') && ($item['req_status'] == 'Approved')) : ?>
                                <?php if ($_SESSION["user"]["user_group"] == 'user') : ?>
                                    <?php if ($setCurrents >= $expiredDate) : ?>
                                        <a href="javascript:void(0);" reqid="<?= $reqid; ?>" class="extends-btn mx-2 p-0 btn-link btn-sm" data-bs-toggle="modal" data-bs-target="#extendRequests">+ Extends</a>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endif; ?>

                        </div>
                    </td>
                    <td class="py-3 text-center">
                        <?= ifDateISNull($expiredDate); ?>
                    </td>
                    <td class="py-3">
                        <span class="flex-grow-1 p-2 badge <?= statusBadge($item['req_status']); ?> d-flex align-items-center justify-content-center">
                            <small> <?= $item['req_status']; ?></small>
                        </span>
                    </td>
                    <td class="py-3 d-flex gap-2 flex-row justify-content-center">


                        <?php if ($_SESSION["user"]["user_group"] == 'admin') : ?>

                            <!-- IF ACTION FOR ADMIN -->

                            <button class="change-status-requests btn btn-secondary btn-sm" reqid="<?= $reqid; ?>" reqstatus="<?= $item['req_status']; ?>" <?= ($item['req_status'] == 'Reject') ? ' disabled ' : ''; ?>>
                                <span class="fas fa-sync"></span>
                            </button>
                            <a href="views/requests/requests-print.php?reqid=<?= $reqid; ?>" target="_blank" class="btn btn-dark btn-sm <?= ($item['req_status'] != 'Approved') ? '' : ''; ?>">
                                <span class="fa fa-print"></span>
                            </a>
                            <button tableContents="requests" deleteId="<?= $reqid; ?>" class="delete-btn btn btn-danger btn-sm">
                                <span class="fa fa-trash"></span>
                            </button>


                        <?php else : ?>

                            <!-- IF ACTION FOR USERS -->
                            <a href="<?= $baseUrl ?>/index.php?requests=edit&reqid=<?= $reqid; ?>" class="btn btn-primary btn-sm <?= ($item['req_status'] != 'Reject') ? 'disabled' : ''; ?>">
                                <i class="fa fa-pen"></i>
                            </a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php $a++;
            endforeach; ?>
        </tbody>
    </table>
</div>