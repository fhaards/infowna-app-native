<div class="d-flex align-items-start  mb-3 justify-content-center w-100">
    <div class="col-md-5 col-lg-4 py-5">

        <div class="text-center mb-3">
            <img src="assets/img/baseapp/logo-sws-b.svg" height="50px" class="m-2 p-2">
        </div>

        <?php include "auth-proccess.php"; ?>
        <!-- Pills navs -->
        <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab" aria-controls="pills-login" aria-selected="true">Login</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="#pills-register" role="tab" aria-controls="pills-register" aria-selected="false">Register</a>
            </li>
        </ul>

        <!-- Pills content -->
        <div class="tab-content">

            <!-- Login content -->
            <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                <form class="pt-4" action="" method="POST">
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" id="loginName" name="email" class="form-control" required />
                        <label class="form-label" for="loginName">Email</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" id="loginPassword" name="password" class="form-control" required />
                        <label class="form-label" for="loginPassword">Password</label>
                    </div>

                    <!-- 2 column grid layout -->
                    <div class="row mb-4">
                        <div class="col-md-6 d-flex">
                            <div class="form-check mb-3 mb-md-0">
                                <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
                                <label class="form-check-label" for="loginCheck"> Remember me </label>
                            </div>
                        </div>

                        <div class="col-md-6 d-flex justify-content-end">
                            <a href="#!">Forgot password?</a>
                        </div>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" name="login" class="btn btn-primary btn-block mb-4 d-flex justify-content-center gap-2 align-items-center">
                        <i class="fas fa-sign-in-alt"></i>
                        <span>Sign in</span>
                    </button>

                    <!-- Register buttons -->
                    <div class="text-center">
                        <p>Not a member? <a href="#!">Register</a></p>
                    </div>
                </form>
            </div>

            <!-- Register content -->
            <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
                <form class="pt-4" method="POST" action="">
                    <!-- Name input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="registerName" name="name" class="form-control" required />
                        <label class="form-label" for="registerName">Name</label>
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" id="registerEmail" name="email" class="form-control" required />
                        <label class="form-label" for="registerEmail">Email</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" id="registerPassword" name="password" class="form-control" required />
                        <label class="form-label" for="registerPassword">Password</label>
                    </div>

                    <!-- Repeat Password input -->
                    <!-- <div class="form-outline mb-4">
                        <input type="password" id="registerRepeatPassword" name="password2" class="form-control" />
                        <label class="form-label" for="registerRepeatPassword">Repeat password</label>
                    </div> -->

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-4 d-flex justify-content-center gap-2 align-items-center" name="register">
                        <i class="fas fa-save"></i>
                        <span>Register</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>