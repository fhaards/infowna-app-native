<section id="faq" class="section-content mb-3 border-bottom">
    <div class="max-w-xl mx-auto lg:ml-0" data-aos="fade-up">
        <header class="section-header">
            <h2> User Table</h2>
            <p>List of Users</p>
        </header>
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