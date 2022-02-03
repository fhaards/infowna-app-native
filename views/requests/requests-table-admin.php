<div class="table-responsive py-5 px-2 text-left" id="table">
    <table id="table-request" class="dataTables table table-bordered table-striped mt-5" style="width:100%">
        <thead>
            <tr>
                <th class="p-2" width="50px">No</th>
                <th class="p-2">Request Id</th>
                <th class="p-2">Name</th>
                <th class="p-2">Email</th>
                <th class="p-2">Date</th>
                <th class="p-2">Status</th>
                <th class="p-2 text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM requests order by created_at";
            $row = $db->prepare($sql);
            $row->execute();
            $fetch = $row->fetchAll();
            $a = 1;
            foreach ($fetch as $item) {
                $reqid = $item['req_id'];
            ?>
                <tr>
                    <td class="py-3"><?= $a ?></td>
                    <td class="py-3">
                        <a href="javscript:void(0)" class="detail-request" reqid="<?= $reqid; ?>" data-bs-toggle="modal" data-bs-target="#detailRequestModal">
                            <?= $reqid; ?>
                        </a>
                    </td>
                    <td class="py-3"><?= $item['name'] ?></td>
                    <td class="py-3"><?= $item['email']; ?></td>
                    <td class="py-3"><?= date('d/m/Y - H:i', strtotime($item['created_at'])); ?></td>
                    <td class="py-3 d-flex gap-2">
                        <?php
                        if ($item['req_status'] == 'Waiting') :
                            $classto = 'badge-warning bg-warning';
                        elseif ($item['req_status'] == 'Approved') :
                            $classto = 'badge-primary bg-primary';
                        else :
                            $classto = 'badge-danger bg-danger';
                        endif;
                        ?>
                        <span class="flex-grow-1 badge <?= $classto; ?> d-flex 
                                align-items-center justify-content-center">
                            <small> <?= $item['req_status']; ?></small>
                        </span>
                        <button class="change-status-requests btn btn-secondary btn-sm" reqid="<?= $reqid; ?>" reqstatus="<?= $item['req_status']; ?>" <?= ($item['req_status'] == 'Reject') ? ' disabled ' : ''; ?>>
                            <span class="fas fa-sync"></span>
                        </button>
                    </td>
                    <td class="py-3" style="text-align: left;">
                        <button tableContents="requests" deleteId="<?= $reqid; ?>" class="delete-btn btn btn-danger btn-sm">
                            <span class="fa fa-trash"></span>
                        </button>
                        <!-- <a onclick="return confirm('Apakah yakin data akan di hapus?')" href="index.php?users=delete&uuid=<?= $reqid; ?>" class="btn btn-danger btn-sm">
                            <span class="fa fa-trash"></span>
                        </a> -->
                        <a href="views/requests/requests-print.php?reqid=<?= $reqid; ?>" target="_blank" class="btn btn-dark btn-sm
                        <?= ($item['req_status'] != 'Approved') ? ' d-none ' : ''; ?>">
                            <span class="fa fa-print"></span>
                        </a>
                    </td>
                </tr>
            <?php
                $a++;
            }
            ?>
        </tbody>
    </table>
</div>