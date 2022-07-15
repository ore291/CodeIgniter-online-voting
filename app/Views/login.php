<?= $this->extend('Layout/main') ?>

<?= $this->section('content') ?>

<main>

    <section class="bg-dark">
        <div class="container py-5 h-10 text-white">
            <div class="row d-flex justify-content-center align-items-center h-10 mb-3">
                <div class="col col-xl-6 mb-3">
                    <div class="card text-white my-auto mx-auto bg-black" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <!-- <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img1.webp" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                            </div> -->
                            <div class="col-md-6 col-lg-12  d-flex align-items-center">
                                <div class="card-body p-2 p-lg-3 ">

                                    <form>

                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                            <span class="h1 fw-bold mb-0 text-warning">Online Voting</span>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                                        <div class="form-outline mb-4">
                                            <input type="email" id="form2Example17" class="form-control form-control-lg" />
                                            <label class="form-label" for="form2Example17">Email address</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <script>
                                                function togglePassword() {
                                                    var x = document.getElementById("passWord");
                                                    if (x.type === "password") {
                                                        x.type = "text";
                                                    } else {
                                                        x.type = "password";
                                                    }
                                                }
                                            </script>
                                            <input type="password" id="passWord" required class="form-control form-control-lg" />
                                            <label class="form-label" for="form2Example27">Password</label>
                                            <br>
                                            <input type="checkbox" onclick="togglePassword()">Show Password
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button class="btn btn-warning btn-lg btn-block" type="button">Login</button>
                                        </div>

                                        <a class="small text-muted" href="#!">Forgot password?</a>
                                        <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="sign-up" style="color: #393f81;">Register here</a></p>
                                        <a href="#!" class="small text-muted">Terms of use.</a>
                                        <a href="#!" class="small text-muted">Privacy policy</a>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<?= $this->endSection() ?>