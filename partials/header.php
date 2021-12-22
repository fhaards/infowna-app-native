<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light py-3 shadow-0 border-bottom">
    <div class="container">
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse px-2" id="navbarSupportedContent">
            <!-- Navbar brand -->
            <a class="navbar-brand mt-2 mt-lg-0" href="#">
                <img src="assets/img/baseapp/logo-sws-b.svg" height="30px" class="d-md-block d-none">
            </a>
            <ul class="navbar-nav me-auto mb-5 mb-lg-0 px-2 px-md-5">
                <li class="nav-item px-md-3">
                    <a class="nav-link" href="<?= $url . '/dashboard'; ?>">Dashboard</a>
                </li>
                <li class="nav-item px-md-3">
                    <a class="nav-link" href="<?= $url . '/requests'; ?>">Requests</a>
                </li>
                <?php if ($_SESSION["user"]["user_group"] == 'admin') : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $url . '/users'; ?>">Users</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>



        <div class="d-flex align-items-center px-2">
            <!-- Notifications -->
            <div class="dropdown">
                <a class="text-reset me-5 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-bell"></i>
                    <span class="badge rounded-pill badge-notification bg-danger">1</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end mt-3" aria-labelledby="navbarDropdownMenuLink">
                    <li>
                        <a class="dropdown-item" href="#">Some news</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Another news</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </li>
                </ul>
            </div>

            <!-- Avatar -->
            <div class="dropdown">
                <a class="text-reset dropdown-toggle d-flex align-items-center hidden-arrow" href=" #" id="dropdownProfile" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user "></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end mt-3" aria-labelledby="dropdownProfile">
                    <li>
                        <a class="dropdown-item" href="#">My profile</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Settings</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="auth-destroy.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>

    </div>

</nav>