<!-- Navbar -->
<nav class="navbar navbar-expand-sm fixed-top bg-white navbar-light border-top border-5 border-primary py-0">
    <div class="container d-flex justify-content-md-center px-md-4 py-0">
        <div class="col-md-10 col-12 d-md-flex   border-bottom  py-3">
            <div class="d-flex w-100">
                <a class="navbar-brand px-2 py-2" href="index.php?home=dashboard">
                    <img src="assets/img/baseapp/logo-sws-b.svg" height="30px" class="d-md-block d-none">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse  mt-5 mt-md-0" id="collapsibleNavbar">
                <ul class="navbar-nav  px-md-0 px-3">
                    <li class="nav-item">
                        <a class="nav-link px-md-4" href="index.php?home=dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-md-4" href="index.php?requests=table">Requests</a>
                    </li>
                    <?php if ($_SESSION["user"]["user_group"] == 'admin') : ?>
                        <li class="nav-item">
                            <a class="nav-link px-md-4" href="index.php?users=table">Users</a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <?= $_SESSION['user']['name']; ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="index.php?profile=profile-edit">Setting Profile</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="auth-destroy.php">Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light py-3 shadow-0 border-bottom">
    <div class="container justify-content-md-center">
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse px-2" id="navbarSupportedContent">
            <a class="navbar-brand mt-2 mt-lg-0" href="#">
                <img src="assets/img/baseapp/logo-sws-b.svg" height="30px" class="d-md-block d-none">
            </a>
            <ul class="navbar-nav me-auto mb-5 mb-lg-0 px-2">
                <li class="nav-item px-md-3">
                    <a class="nav-link" href="index.php?home=dashboard">Dashboard</a>
                </li>
                <li class="nav-item px-md-3">
                    <a class="nav-link" href="index.php?requests=table">Requests</a>
                </li>
                <?php if ($_SESSION["user"]["user_group"] == 'admin') : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?users=table">Users</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>

        <div class="d-flex align-items-center px-2">
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
</nav> -->