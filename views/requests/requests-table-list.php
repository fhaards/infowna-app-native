<div class="table-responsive py-5 px-2 text-left" id="table">
    <table id="table-request" class="dataTables table table-bordered table-hover table-striped mt-5 w-full">
        <thead>
            <tr>
                <th class="p-2">Request Id</th>
                <?php if ($_SESSION["user"]["user_group"] == 'admin') : ?>
                    <th class="p-2">Name</th>
                <?php endif; ?>
                <th class="p-2">Permit Type</th>
                <th class="p-2">Date</th>
                <th class="p-2">Status</th>
                <th class="p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fetch as $item) : ?>
                <?php $reqid = $item['req_id']; ?>
                <tr>
                    <td class="py-3" width="20%">
                        <a href="javscript:void(0)" class="detail-request" reqid="<?= $reqid; ?>" data-bs-toggle="modal" data-bs-target="#detailRequestModal">
                            <?= $reqid; ?>
                        </a>
                    </td>
                    <?php if ($_SESSION["user"]["user_group"] == 'admin') : ?>
                        <td class="py-3" width="20%"><?= $item['name'] ?></td>
                    <?php endif; ?>
                    <td class="py-3"><?= $item['requests_type'] ?></td>
                    <td class="py-3"><?= date('d - m - Y', strtotime($item['created_at'])); ?></td>
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