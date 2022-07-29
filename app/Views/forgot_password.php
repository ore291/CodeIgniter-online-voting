<?= $this->extend('Layout/main') ?>


<?= $this->section('content') ?>

<section>
    <div class="container">

        <div class="row d-flex justify-content-center my-5">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                            <h3><i class="fa fa-lock fa-4x"></i></h3>
                            <h2 class="text-center">Forgot Password?</h2>
                            <p>You can reset your password here.</p>
                            <div class="panel-body">
                                <?php
                                if (!empty(session()->getFlashdata("success"))) {
                                ?>

                                    <div class="alert alert-success">
                                        <?= session()->getFlashdata("success") ?>
                                    </div>
                                <?php
                                }

                                ?>

                                <?php
                                if (!empty(session()->getFlashdata("fail"))) {
                                ?>

                                    <div class="alert alert-danger">
                                        <?= session()->getFlashdata("fail") ?>
                                    </div>
                                <?php
                                }

                                ?>
                                <form class="form" method="post" action="<?= base_url('user/reset-password') ?>">
                                    <fieldset>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>

                                                <input name="email" id="email" placeholder="email address" required class="form-control" type="email" oninvalid="setCustomValidity('Please enter a valid email address!')" onchange="try{setCustomValidity('')}catch(e){}" required="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input class="btn btn-lg mt-2 btn-warning btn-block" value="Send My Password" type="submit">
                                        </div>
                                    </fieldset>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>







<?= $this->endSection() ?>