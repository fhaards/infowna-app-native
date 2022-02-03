<section id="faq" class="section-content">
    <div class="max-w-xl px-md-3 mx-auto lg:ml-0 d-flex flex-md-row justify-content-between" data-aos="fade-up">
        <header class="section-header">
            <h2>Requests Application</h2>
            <p>Residence Permit</p>
        </header>
        <?php if ($_SESSION["user"]["user_group"] == 'user') : ?>
            <div class="">
                <a href="<?= $baseUrl; ?>/index.php?requests=data" class="btn btn-primary">
                    <i class="fa fa-plus-circle"></i>
                    <span class="mx-2">Add Requests</span>
                </a>
            </div>
        <?php else : ?>
            <div class="">
                <a href="views/requests/requests-print-recap.php" target="_blank" class="btn btn-dark">
                    <i class="fa fa-print"></i> <span class="mx-2">Print Recapt</span>
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>

<div class="card mb-3">
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-md-6">
                <label class="h-5 lead font-weight-bold">Filter </label>
            </div>
            <div class="col-md-6">
                <form class="row">
                    <div class="form-group col-md-6 mb-2 mb-md-0">
                        <select name="filby_permit" class="form-control">
                            <option>All Categories</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6 mb-2 mb-md-0">
                        <select name="filby_permit" class="form-control">
                            <option>All Permit Type</option>
                        </select>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="card mb-3">
    <div class="card-body">
        <?php

        if ($_SESSION["user"]["user_group"] == 'user') :
            $sql = $db->prepare("SELECT * FROM requests WHERE uuid = ? order by created_at ");
            $sql->execute(array($getIdUser));
        else :
            $sql =  $db->prepare("SELECT * FROM requests order by created_at");
            $sql->execute();
        endif;
        $fetch = $sql->fetchAll();
        $a = 1;

        include "views/requests/requests-table-list.php";
        ?>
    </div>
</div>