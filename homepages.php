<?php
include "config/connection.php";
$getCompany    = "SELECT * FROM about WHERE id = 1";
$rowCompany    = $db->prepare($getCompany);
$rowCompany->execute();
$getRowComp = $rowCompany->fetch();
$getAbouts = $getRowComp['about'];
$getVision = $getRowComp['vision'];
$getMision = $getRowComp['mission'];
?>
<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-12 row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">Hello , <br> Welcome to <br> SWS Consultant</h1>
                    <!-- <h2 data-aos="fade-up" data-aos-delay="400">Learning new systems and processes is not mandatory...but neither is staying in business</h2> -->

                </div>
                <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <img src="assets/img/hero-img-2.svg" height="100%" class="img-fluid">
                    <!-- <img src="assets/img/hero-img.png" class="img-fluid" alt=""> -->
                </div>
            </div>
        </div>
    </div>
</section><!-- End Hero -->

<main id="main">
    <!-- <div class="row justify-content-center">
        <div class="col-lg-11 col-12"> -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="row">

                        <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                            <div class="content h-100 rounded-xl">
                                <h3>Who We Are</h3>
                                <?= htmlspecialchars_decode($getAbouts); ?>
                            </div>
                        </div>

                        <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                            <img src="assets/img/about.jpg" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= F.A.Q Section ======= -->
    <section id="faq" class="faq">
        <div class="container" data-aos="fade-up">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <header class="section-header">
                        <h2>About</h2>
                        <p>Vision & Mission</p>
                    </header>
                    <div class="row">
                        <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                            <img src="assets/img/visi-mision.svg" height="100%" class="img-fluid">
                            <!-- <img src="assets/img/about.jpg" class="img-fluid" alt=""> -->
                        </div>
                        <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                            <div class="content px-5">
                                <h3>Our Vision</h3>
                                <?= htmlspecialchars_decode($getVision); ?>
                                <h3>Our Mission</h3>
                                <?= htmlspecialchars_decode($getMision); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <header class="section-header">
                        <h2>Contact</h2>
                        <p>Contact Us</p>
                    </header>
                    <div class="row gy-4 g-3">
                        <div class="col-md-4">
                            <div class="info-box d-flex flex-row h-100">
                                <div class="col-md-3 col-3 mx-2"> <i class="bi bi-geo-alt"></i></div>
                                <div class="col-md-9 col">
                                    <h3>Address</h3>
                                    <p><?= $getRowComp['address']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info-box d-flex flex-row h-100">
                                <div class="col-md-3 col-3 mx-2"> <i class="bi bi-telephone"></i></div>
                                <div class="col-md-9 col">
                                    <h3>Call Us</h3>
                                    <p><?= $getRowComp['phone']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info-box d-flex flex-row h-100 w-100">
                                <div class="col-md-3 col-3 mx-2"> <i class="bi bi-envelope"></i></div>
                                <div class="col-md-9 col">
                                    <h3>Email Us</h3>
                                    <p><?= $getRowComp['email']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= Contact Section ======= -->
    <section id="login" class="contact login-pages">
        <div class="container" data-aos="fade-up">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <header class="section-header">
                        <h2>Login</h2>
                        <p>Login to</p>
                    </header>
                    <div class="row gy-4">
                        <?php include "auth-form.php"; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- </div>
    </div> -->
</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span>SWS Consultant</span></strong>. All Rights Reserved
        </div>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center btn btn-primary"><i class="bi bi-arrow-up-short"></i></a>