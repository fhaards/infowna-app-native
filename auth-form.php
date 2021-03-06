<!-- <div class="text-center mb-3">
    <img src="assets/img/baseapp/logo-sws-w.svg" height="65px" class="w-100 p-3 bg-dark bg-gradient rounded">
</div> -->

<?php include "auth-proccess.php"; ?>
<div class="col-md-6"></div>
<div class="col-md-6">
    <div class="d-flex flex-column w-100">
        <ul class="nav nav-pills flex flex-row gap-3 mb-3 bg-white" role="tablist">
            <li class="nav-item flex-grow-1">
                <a class="nav-link border active text-center" data-bs-toggle="pill" href="#pill-login">Login</a>
            </li>
            <li class="nav-item flex-grow-1">
                <a class="nav-link border text-center" data-bs-toggle="pill" href="#pill-register">Register</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="card">
            <div class="card-body">
                <div class="tab-content w-100">
                    <div id="pill-login" class="col-12 container tab-pane active"><br>
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Login</h3>
                                <form class="pt-4" action="" method="POST">
                                    <!-- Email input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="loginName">Email</label>
                                        <input type="email" id="loginName" name="email" class="form-control" placeholder="Input Youre Email Address" required />
                                    </div>

                                    <!-- Password input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="loginPassword">Password</label>
                                        <input type="password" id="loginPassword" name="password" placeholder="Input Youre Password" class="form-control" required />
                                    </div>

                                    <!-- 2 column grid layout -->
                                    <div class="row mb-4 d-flex flex-md-row flex-column">
                                        <div class="col-md-6 d-flex">
                                            <div class="form-check mb-3 mb-md-0">
                                                <label class="form-check-label" for="loginCheck"> Remember me </label>
                                                <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
                                            </div>
                                        </div>

                                        <!-- <div class="col-md-6 d-flex justify-content-md-end">
                                            <a href="#!">Forgot password?</a>
                                        </div> -->
                                    </div>

                                    <!-- Submit button -->
                                    <button type="submit" name="login" class="btn btn-primary bg-gradient shadow-lg btn-block mb-4 d-flex w-100 justify-content-center gap-3 align-items-center">
                                        <i class="fas fa-sign-in-alt"></i>
                                        <span>Sign in</span>
                                    </button>

                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="pill-register" class="container tab-pane fade"><br>
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Register</h3>
                                <form class="pt-4 w-full" method="POST" action="">
                                    <!-- Name input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="registerName">Name</label>
                                        <input type="text" id="registerName" name="name" class="form-control" placeholder="Input Youre Name" required />
                                    </div>

                                    <!-- Email input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="registerEmail">Email</label>
                                        <input type="email" id="registerEmail" name="email" class="form-control" placeholder="Input Youre Email" required />
                                    </div>

                                    <!-- Password input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="registerPassword">Password</label>
                                        <input type="password" id="registerPassword" name="password" class="form-control" placeholder="Input Youre Passwod" required />
                                    </div>

                                    <!-- Submit button -->
                                    <button type="submit" class="btn btn-primary btn-block mb-4 bg-gradient d-flex w-100 shadow-lg justify-content-center gap-3 align-items-center" name="register">
                                        <i class="fas fa-check"></i>
                                        <span>Register</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>