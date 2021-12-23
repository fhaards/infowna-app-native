<div class="d-flex align-items-start  mb-3 justify-content-center w-100">
    <div class="col-md-5 col-lg-4  col-11 py-5 w-full">

        <div class="text-center mb-3 m-2">
            <img src="assets/img/baseapp/logo-sws-w.svg" height="65px" class="w-100 p-3 bg-dark bg-gradient rounded">
        </div>

        <?php include "auth-proccess.php"; ?>

        <ul class="nav nav-pills px-2 flex flex-row gap-3 mb-3" role="tablist">
            <li class="nav-item flex-grow-1">
                <a class="nav-link border active text-center" data-bs-toggle="pill" href="#pill-login">Login</a>
            </li>
            <li class="nav-item flex-grow-1">
                <a class="nav-link border text-center" data-bs-toggle="pill" href="#pill-register">Register</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="card mx-2 shadow-sm">
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
                                        <input type="email" id="loginName" name="email" class="form-control" required />
                                    </div>

                                    <!-- Password input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="loginPassword">Password</label>
                                        <input type="password" id="loginPassword" name="password" class="form-control" required />
                                    </div>

                                    <!-- 2 column grid layout -->
                                    <div class="row mb-4 d-flex flex-md-row flex-column">
                                        <div class="col-md-6 d-flex">
                                            <div class="form-check mb-3 mb-md-0">
                                                <label class="form-check-label" for="loginCheck"> Remember me </label>
                                                <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
                                            </div>
                                        </div>

                                        <div class="col-md-6 d-flex justify-content-md-end">
                                            <a href="#!">Forgot password?</a>
                                        </div>
                                    </div>

                                    <!-- Submit button -->
                                    <button type="submit" name="login" class="btn btn-primary shadow-lg btn-block mb-4 d-flex w-100 justify-content-center gap-3 align-items-center">
                                        <i class="fas fa-sign-in-alt"></i>
                                        <span>Sign in</span>
                                    </button>

                                    <!-- Register buttons -->
                                    <div class="text-center">
                                        <p>Not a member? <a href="#!">Register</a></p>
                                    </div>
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
                                        <input type="text" id="registerName" name="name" class="form-control" required />
                                    </div>

                                    <!-- Email input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="registerEmail">Email</label>
                                        <input type="email" id="registerEmail" name="email" class="form-control" required />
                                    </div>

                                    <!-- Password input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="registerPassword">Password</label>
                                        <input type="password" id="registerPassword" name="password" class="form-control" required />
                                    </div>

                                    <!-- Submit button -->
                                    <button type="submit" class="btn btn-primary btn-block mb-4 d-flex w-100 shadow-lg justify-content-center gap-3 align-items-center" name="register">
                                        <i class="fas fa-save"></i>
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
    <!-- <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab" aria-controls="pills-login" aria-selected="true">Login</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="#pills-register" role="tab" aria-controls="pills-register" aria-selected="false">Register</a>
        </li>
    </ul>

    <div class="tab-content">

        <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">

        </div>
        <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">

        </div>
    </div> -->
</div>
</div>