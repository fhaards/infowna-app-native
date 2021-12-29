<section class="lg:text-left mb-5">
    <div class="max-w-xl mx-auto lg:ml-0">
        <h4 class="text-sm font-medium text-primary font-capitalize">
            User Table
        </h4>
        <h5 class="mt-2 text-3xl font-bold sm:text-4xl">
            <span class="text-blue-800">List of Users</span>
        </h5>
    </div>
</section>
<div class="table-responsive py-5" id="table">
    <table class="dataTables table table-bordered table-striped mt-5 user-Table">
        <thead>
            <tr>
                <th class="p-2" width="50px">No</th>
                <th class="p-2">UUID</th>
                <th class="p-2">Name</th>
                <th class="p-2">Email</th>
                <th class="p-2">Created At</th>
                <th class="p-2 text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM users where user_group = 'user' order by created_at";
            $row = $db->prepare($sql);
            $row->execute();
            $fetch = $row->fetchAll();
            $a = 1;
            foreach ($fetch as $item) {
                $uuid = $item['uuid'];
                $getparse = $uuid;
            ?>
                <tr>
                    <td><?= $a ?></td>
                    <td><?= $item['uuid'] ?></td>
                    <td><?= $item['name'] ?></td>
                    <td><?= $item['email']; ?></td>
                    <td><?= date('d/m/Y - H:i', strtotime($item['created_at'])); ?></td>
                    <td style="text-align: center;">
                        <!-- <a onclick="return confirm('Apakah yakin data akan di hapus?')" href="index.php?users=delete&uuid=<?= $uuid; ?>" class="btn btn-danger btn-sm">
                            <span class="fa fa-trash"></span>
                        </a> -->
                        <button tableContents="user" deleteId="<?= $uuid; ?>" class="delete-btn btn btn-danger btn-sm">
                            <span class="fa fa-trash"></span>
                        </button>
                    </td>
                </tr>
            <?php
                $a++;
            }
            ?>
        </tbody>
    </table>
</div>