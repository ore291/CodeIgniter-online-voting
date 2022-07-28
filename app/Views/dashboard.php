<?= $this->extend('Layout/main') ?>


<?= $this->section('content') ?>

<main>
    <?php

    $userModel = new App\Models\UserModel();
    $loggedInUser = session()->get("loggedInUser");

    $user = $userModel->find($loggedInUser);
    ?>
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

    <div class="container-fluid my-5">

        <div class="dropdown-center">
            <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Profile Settings
            </button>
            <ul class="dropdown-menu  bg-dark">
                <ul class="nav nav-pills bg-dark d-flex flex-column ">
                    <li class="nav-item">
                        <a class="nav-link active bg-transparent text-wning" data-bs-toggle="pill" href="#msg">Change Profile Picture</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link bg-transparent text-wrning" data-bs-toggle="pill" href="#pass">Change Password</a>
                    </li>
                    <!-- <li class="nav-item ">
                        <a class="nav-link bg-transparent text-waning" data-bs-toggle="pill" href="#set">Setting</a>
                    </li> -->
                </ul>
            </ul>
        </div>


        <!-- Tabs navs -->

        <div class="tab-content mt-lg-0 mt-3">
            <div class="tab-pane container active " id="msg">
                <div class="col-12 col-md-12 text-center ">
                    <div>
                        <img src="<?=
                                    base_url('images/' . $user->picture)
                                    ?>" alt="" class="rounded col-lg-6 col-12 mx-auto 
                            " style="max-width: 100%;height:50vh;object-fit:contain">

                    </div>
                    <span class="text-warning text-center mx-auto w-100"> </span>
                    <div class="d-flex col-lg-6 col-12 mt-2 mx-auto">
                        <form method="post" class="col-12 d-flex" action="<?= base_url('user/update-picture/' . $user->id) ?>" enctype="multipart/form-data">

                            <input class="form-control " required name="picture" accept="image/png, image/gif, image/jpeg" id="picture" type="file" />
                            <button type="submit" class="ms-2 btn btn-success btn-sm">Update</button>

                        </form>
                    </div>

                </div>
            </div>
            <div class="tab-pane container fade" id="pass">
                <div class="col-12 col-md-6 mx-md-auto">
                    <div class="card card-outline-dark bg-black">
                        <div class="card-header">
                            <h3 class="mb-0">Change Password</h3>
                        </div>
                        <div class="card-body">
                            <form class="form" role="form" method="post" autocomplete="off" action="<?= base_url('user/update-password/' . $user->id) ?>" onSubmit="return validate();">
                                <div class="form-group">
                                    <label for="inputPasswordOld">Current Password</label>
                                    <input type="password" required class="form-control" name='oldPassword' id="inputPasswordOld" required="">
                                    <div class="form-switch my-lg-1 my-2">
                                        <input type="checkbox" class="  form-check-input" onclick="togglePassword1('inputPasswordOld')"><span>Show Password</span>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="inputPasswordNew">New Password</label>
                                    <input type="password" required name='newPassword' class="form-control" id="newPassword" required="">
                                    <span class="form-text small text-muted">
                                        The password must be 8-20 characters, and must <em>not</em> contain spaces.
                                    </span>
                                    <div class="form-switch my-lg-1 my-2">
                                        <input type="checkbox" class=" form-check-input" onclick="togglePassword1('newPassword')"><span>Show Password</span>
                                    </div>

                                </div>
                                <div class="form-group ">
                                    <label for="inputPasswordNewVerify">Verify</label>
                                    <input type="password" required class="form-control" id="verifyPassword" required="">
                                    <span class="form-text small text-muted">
                                        To confirm, type the new password again.
                                    </span><br>
                                    <div class="form-switch my-lg-1">
                                        <input type="checkbox" class=" form-check-input" onclick="togglePassword1('verifyPassword')"><span>Show Password</span>
                                    </div>
                                </div>
                                <span class="py-2" id="errmsg"></span>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-lg float-right">Save</button>
                                </div>
                            </form>





                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="tab-pane container fade" id="set">This is a setting tab using pill data-toggle attribute.</div> -->
        </div>

        <!-- Tabs content -->

        <!-- Tabs content -->



    </div>


    </div>
    <div class="w-100 my-4">
        <h1 class="text-center text-warning">
            MY CONTESTS
        </h1>
    </div>
    <div class="contestants-container">
        <div class="container overflow-hidden">
            <div class="row gx-0 gy-2 g-md-2">
                <?php foreach ($contestants as $contestant) : ?>
                    <?php $string = str_replace('&AMP;', 'and', htmlspecialchars(urlencode($contestant->contest->title))) ?>
                    <div class="mt-1 col-md-6 col-lg-4">
                        <div class="card">
                            <div class="card-img-top card-click  " style="background-image: url(/images/<?= $contestant->image ?>); background-repeat: no-repeat; background-position:top center;">
                                <img src="/images/<?= $contestant->image ?>" alt="card-img" class="w-100 contest-card-hero" loading="lazy">
                                <div class="px-2 badge dropdown " id="badge">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="color: white; transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20" class="iconify dropdown-toggle" id="badge" data-icon="dashicons:share" data-inline="false" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <path fill="currentColor" d="M14.5 12c1.66 0 3 1.34 3 3s-1.34 3-3 3s-3-1.34-3-3c0-.24.03-.46.09-.69l-4.38-2.3c-.55.61-1.33.99-2.21.99c-1.66 0-3-1.34-3-3s1.34-3 3-3c.88 0 1.66.39 2.21.99l4.38-2.3c-.06-.23-.09-.45-.09-.69c0-1.66 1.34-3 3-3s3 1.34 3 3s-1.34 3-3 3c-.88 0-1.66-.39-2.21-.99l-4.38 2.3a2.666 2.666 0 0 1 0 1.38l4.38 2.3c.55-.61 1.33-.99 2.21-.99z"></path>
                                    </svg>
                                    <div class="p-2 dropdown-menu " aria-labelledby="dropdownMenuButton" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(8px, 15px, 0px);">
                                        <div re="noopener" target="_blank" class="fb-share-button" data-href="<?= $contestant->share_url ?>" data-layout="button_count">
                                        </div>

                                        <a re="noopener" target="_blank" href="https://twitter.com/intent/tweet?text=Vote for <?= $contestant->user->full_name ?> on the <?= $string ?> contest&amp;url=<?= $contestant->share_url ?>">
                                            <img src="https://res.cloudinary.com/ademolamadelewi/image/upload/f_auto,q_auto/v1610570958/farmers/Group_89_wd6035.svg" alt="icon"></a>
                                        <a re="noopener" target="_blank" href="https://telegram.me/share/url?url=<?= $contestant->share_url ?>&amp;text=Vote%20for%20<?= $contestant->user->full_name ?>%20on%20the%20<?= $string ?>%20voting%20contest <?= $contestant->share_url ?>">
                                            <img src="https://res.cloudinary.com/ademolamadelewi/image/upload/f_auto,q_auto/v1610570958/farmers/Group_87_hlxuxz.svg" alt="icon"></a>
                                        <a re="noopener" target="_blank" href="https://wa.me/?text=Vote%20for%20<?= $contestant->user->full_name ?>%20on%20the%20<?= $string ?>%20voting%20contest <?= $contestant->share_url ?>" data-action="share/whatsapp/share">
                                            <img src="https://res.cloudinary.com/ademolamadelewi/image/upload/f_auto,q_auto/v1610570958/farmers/Group_90_ovpara.svg" alt="icon"></a>

                                        <a href=" <?= base_url('images/' . $contestant->image) ?>" download><i class="bi bi-cloud-arrow-down-fill m-auto position-absolute ps-1 text-black py-auto" style="font-size: 1.3em;"></i></a>



                                    </div>
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="mb-0 text-center card-title text-uppercase"><?= $contestant->contest->title ?></div>
                                <div class="text-center card-text">
                                    <!-- <p>
                                        CANDIDATE NUMBER:<span class="font-weight-bold">001</span>
                                    </p> -->
                                    <!-- <p class="text-info text-uppercase">Contest : <?= $contestant->contest->title ?></p> -->
                                    <div class="my-3 d-flex align-items-center justify-content-between">
                                        <?php
                                        if ($contestant->votes > 0) {
                                        ?>
                                            <p>Voting Percent: <?= number_format(($contestant->votes / $contestant->contest->total_votes) * 100, 2) ?>%</p>
                                        <?php
                                        } else {
                                        ?>
                                            <p>Voting Percent: 0%</p>
                                        <?php
                                        }

                                        ?>


                                        <p>
                                            No of Votes: <span class="font-weight-bold"><?= $contestant->votes ?></span>
                                        </p>
                                    </div>
                                    <?php
                                    if ($contestant->votes > 0) {
                                    ?>

                                        <div class="progress my-3 rounded-pill">
                                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="<?= ($contestant->votes / $contestant->contest->total_votes) * 100 ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?= ($contestant->votes / $contestant->contest->total_votes) * 100 ?>%">
                                            </div>
                                        </div>


                                    <?php
                                    } else {
                                    ?>

                                        <div class="progress my-3 rounded-pill">
                                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                                            </div>
                                        </div>


                                    <?php
                                    }



                                    ?>

                                </div>
                                <div class="mt-3 d-grid gap-2">
                                    <a href="<?= $contestant->share_url ?>">

                                        <button class="btn btn-block btn-success w-100" type="link" href="">
                                            View Profile
                                        </button>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>

            </div>
        </div>
    </div>
</main>


<?= $this->endSection() ?>