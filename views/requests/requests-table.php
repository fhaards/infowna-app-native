<section class="lg:text-left mb-5">
    <div class="max-w-xl mx-auto lg:ml-0">
        <h4 class="text-sm font-medium text-primary font-capitalize">
            Requests Application
        </h4>
        <h5 class="mt-2 text-3xl font-bold sm:text-4xl">
            <span class="text-blue-800">Residence Permit</span>
        </h5>
    </div>
</section>
<div class="table-responsive py-5 px-2 text-left">
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
                        <span class="flex-grow-1 badge <?= ($item['req_status'] == 'Waiting') ? 'badge-warning bg-warning' : 'badge-primary bg-primary'; ?> d-flex 
                                align-items-center justify-content-center">
                            <small> <?= $item['req_status']; ?></small>
                        </span>
                        <a href="javscript:void(0)" class="change-status-requests btn btn-secondary btn-sm" reqid="<?= $reqid; ?>" reqstatus="<?= $item['req_status']; ?>">
                            <span class="fas fa-sync"></span>
                        </a>
                    </td>
                    <td class="py-3" style="text-align: center;">
                        <a onclick="return confirm('Apakah yakin data akan di hapus?')" href="index.php?users=delete&uuid=<?= $reqid; ?>" class="btn btn-danger btn-sm">
                            <span class="fa fa-trash"></span>
                        </a>
                        <a href="views/requests/requests-print.php?reqid=<?= $reqid; ?>" target="_blank" class="btn btn-dark btn-sm">
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