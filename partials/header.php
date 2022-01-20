<!-- ======= Header ======= -->
<header id="header" class="header fixed-top mb-5 border-bottom">
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-12">
                <div class="d-flex align-items-center justify-content-between">
                    <a href="index.html" class="logo d-flex align-items-center " style="height:30px">
                        <img src="assets/img/baseapp/logo-sws-b.svg" height="100%" class="img-responsive">
                    </a>

                    <nav id="navbar" class="navbar">
                        <ul>
                            <?php if (isset($_SESSION["login_status"])) { ?>
                                <li><a class="nav-link" href="index.php?home=dashboard">Dashboard</a></li>
                                <li><a class="nav-link" href="index.php?requests=table">Requests</a></li>
                                <?php if ($_SESSION["user"]["user_group"] == 'admin') : ?>
                                    <li><a class="nav-link" href="index.php?users=table">Users</a></li>
                                    <li><a class="nav-link" href="index.php?about=about-edit">About</a></li>
                                <?php endif; ?>
                                <li class="dropdown"><a href="#"><span class="px-3"> <?= $_SESSION['user']['name']; ?></span> <i class="bi bi-chevron-down"></i></a>
                                    <ul>
                                        <li><a href="index.php?profile=profile-edit"><i class="fa fa-user"></i>Setting Profile</a></li>
                                        <li><a href="auth-destroy.php"><i class="fa fa-sign-out-alt"></i>Logout</a></li>
                                    </ul>
                                </li>
                            <?php } else { ?>
                                <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                                <li><a class="nav-link scrollto" href="#about">About Us</a></li>
                                <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                                <li><a class="nav-link scrollto" href="#login">Login</a></li>
                                <!-- <li><a class="nav-link" type="button" data-toggle="modal" data-target="#loginModal" id="loginModalBtn">Login</a></li> -->
                            <?php } ?>
                        </ul>
                        <i class="bi bi-list mobile-nav-toggle"></i>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>