<?= $this->extend('Layout/main') ?>


<?= $this->section('content') ?>

<main>
    <div class="w-100 my-4">
        <h1 class="text-center text-warning">
            MY CONTESTS
        </h1>
    </div>
    <div class="contestants-container">
        <div class="container overflow-hidden">
            <div class="row gx-0 gy-2 g-md-2">
                <?php foreach ($contestants as $contestant) : ?>
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

                                        <a re="noopener" target="_blank" href="https://twitter.com/intent/tweet?text=Vote for <?= $contestant->user->full_name ?> on the <?= $contestant->contest->title ?> contest&amp;url=<?= $contestant->share_url ?>">
                                            <img src="https://res.cloudinary.com/ademolamadelewi/image/upload/f_auto,q_auto/v1610570958/farmers/Group_89_wd6035.svg" alt="icon"></a>
                                        <a re="noopener" target="_blank" href="https://telegram.me/share/url?url=<?= $contestant->share_url ?>&amp;text=Vote%20for%20<?= $contestant->user->full_name ?>%20on%20the%20<?= $contestant->contest->title ?>%20voting%20contest <?= $contestant->share_url ?>">
                                            <img src="https://res.cloudinary.com/ademolamadelewi/image/upload/f_auto,q_auto/v1610570958/farmers/Group_87_hlxuxz.svg" alt="icon"></a>
                                        <a re="noopener" target="_blank" href="https://wa.me/?text=Vote%20for%20<?= $contestant->user->full_name ?>%20on%20the%20<?= $contestant->contest->title ?>%20voting%20contest <?= $contestant->share_url ?>" data-action="share/whatsapp/share">
                                            <img src="https://res.cloudinary.com/ademolamadelewi/image/upload/f_auto,q_auto/v1610570958/farmers/Group_90_ovpara.svg" alt="icon"></a>


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