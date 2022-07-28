<?= $this->extend('Layout/main') ?>


<?= $this->section('content') ?>



<main class="contest-page">
    <section class="mt-lg-4 bg-dark py-3 ">
        <div class="container overflow-hidden">
            <div class=" row g-0">

                <div class="col-lg-4 col-12  ">
                    <img src="/images/<?= $contest->picture ?>" class="w-100 contest-img" style="object-fit: cover; " alt="">
                </div>

                <div class="col-lg-8 row col-12 mt-2 mt-lg-0">

                    <div class="text-capitalize d-flex col-lg-6 col-12 flex-column gap-md-2">
                        <h1 class="text-warning text-center"> <?= esc($contest->title) ?></h1>
                        <?php

                        if (isset($contest->sponsor_id)) {
                        ?>
                            <span>Sponsored by: <?= esc($contest->sponsor->brand) ?></span>

                        <?php
                        }
                        ?>

                        <span>Duration: <?= date(' D d M, Y', strtotime($contest->start_date)) ?> - <?= date('D d M, Y', strtotime($contest->end_date)) ?></span>

                        <span>Registered Contestants : <span class="text-warning"><?= $contest->contestants_count ?></span></span>

                        <br>
                        <!-- <h3>Share contest</h3>
                    <div class="btn-group w-25" role="group" aria-label="Basic mixed styles example">
                        <button type="link" href='/' class="btn btn-dark btn-outline-primary"> <i class="bi bi-facebook w-100"></i> </button>
                        <button type="link" href='/' class="btn btn-dark btn-secondary btn-outline-success"> <i class="bi bi-whatsapp"></i> </button>
                        <button type="link" href='/' class="btn btn-dark btn-secondary  btn-outline-primary"> <i class="bi bi-twitter w-100"></i> </button>
                        <button type="link" href='/' class="btn btn-dark btn-secondary  btn-outline-light"> <i class="bi bi-share-fill"></i> </button>
                    </div> -->




                    </div>

                    <div class="text-capitalize d-flex col-lg-6 col-12 flex-column gap-2">
                        <h4 class="mt-lg-2" id="countdown-announce"></h4>

                        <div id='counter' class="row d-flex gap-lg-1 mx-lg-auto  w-100 ms-auto text-warning" style="flex-wrap: nowrap !important;font-size:30px ;">


                            <span id='days' class="bg-black mx-lg-auto col-3 p-auto d-flex justify-content-center align-items-center"></span>
                            <span id='hours' class="bg-black mx-lg-auto col-3 p-auto d-flex justify-content-center align-items-center"></span>
                            <span id='minutes' class="bg-black mx-lg-auto col-3 p-auto d-flex justify-content-center align-items-center"></span>
                            <span id='seconds' class="bg-black mx-lg-auto col-3 p-lg-4 p-4 d-flex justify-content-center align-items-center"></span>




                        </div>
                        <p class="text-center d-flex justify-content-evenly gap-5  mx-auto col-9 col-lg-12">
                            <span class="px-auto">days</span>
                            <span class="px-auto">hours</span>
                            <span class="px-auto">minutes</span>
                            <span class="px-auto">seconds</span>

                        </p>


                        <h4>price : &#8358;<?= $contest->price_per_vote ?> per vote</h4>

                        <?php

                        $loggedInUser = session()->get("loggedInUser");
                        $user = session()->get("user");

                        if (isset($loggedInUser)) {

                            if ($category['allowed_gender'] ===  'all' or $category['allowed_gender'] === $user->gender) {
                        ?>

                                <form action="<?= base_url(
                                                    'contest/join'
                                                ) ?>" method="post">
                                    <input type="number" style="display: none" name="contest_id" placeholder value="<?= $contest->id ?>">

                                    <button class="btn btn-outline-success w-100" type="submit">
                                        ENTER CONTEST
                                    </button>


                                </form>
                                <?php
                                if (!empty(session()->getFlashdata("fail"))) {
                                ?>

                                    <div class="alert alert-danger">
                                        <?= session()->getFlashdata("fail") ?>
                                    </div>
                                <?php
                                }

                                ?>

                            <?php
                            } else {
                            ?>

                            <?php
                            }
                        } else {
                            ?>

                            <a href="/login" class="btn btn-outline-info" type="link">

                                LOGIN

                            </a>


                        <?php
                        }


                        ?>




                    </div>


                </div>
            </div>
        </div>

    </section>

    <section class="mt-5 ">

        <?php

        $user = session()->get("user");
        if (isset($user) and $user->role == "admin") {
        ?>
            <h1 class="text-center text-warning text-uppercase">Disqualify Stages</h1>
            <p class="text-center">Disqualify contestants in the following stages,please confirm before you proceed!</p>
            <div class="d-flex  justify-content-center align-items-center">

                <button type="button" data-bs-toggle="modal" data-bs-target="#unstageModal" class="btn btn-danger mx-2">Unstaged</button>
                <button data-bs-toggle="modal" data-bs-target="#bronzeModal" type="button" class="btn btn-danger mx-2">Bronze</button>
                <button data-bs-toggle="modal" data-bs-target="#silverModal" type="button" class="btn btn-danger mx-2">Silver</button>
                <button data-bs-toggle="modal" data-bs-target="#goldModal" type="button" class="btn btn-danger mx-2">Gold</button>
            </div>
            <div class="modal fade" id="unstageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered text-black">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Evict Contestants</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body ">
                            Disqualify all contestants not having up to a 100 votes?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <form action="<?= base_url('contest/evict') ?>" method="post">
                                <input type="number" name="contest_id" id="contest_id" value="<?= $contest->id ?>" style="display: none;" />
                                <input type="number" name="stage" id="stage" value="99" style="display: none;" />
                                <button type="submit" class="btn btn-danger">Yes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="bronzeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered text-black">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Evict Contestants</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body ">
                            Disqualify all contestants not having up to a 200 votes?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <form action="<?= base_url('contest/evict') ?>" method="post">
                                <input type="number" name="contest_id" id="contest_id" value="<?= $contest->id ?>" style="display: none;" />
                                <input type="number" name="stage" id="stage" value="1" style="display: none;" />
                                <button type="submit" class="btn btn-danger">Yes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="silverModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered text-black">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Evict Contestants</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body ">
                            Disqualify all contestants not having up to a 300 votes?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <form action="<?= base_url('contest/evict') ?>" method="post">
                                <input type="number" name="contest_id" id="contest_id" value="<?= $contest->id ?>" style="display: none;" />
                                <input type="number" name="stage" id="stage" value="2" style="display: none;" />
                                <button type="submit" class="btn btn-danger">Yes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="goldModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered text-black">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Evict Contestants</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body ">
                            Disqualify all contestants not having up to a 350 votes?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <form action="<?= base_url('contest/evict') ?>" method="post">
                                <input type="number" name="contest_id" id="contest_id" value="<?= $contest->id ?>" style="display: none;" />
                                <input type="number" name="stage" id="stage" value="3" style="display: none;" />
                                <button type="submit" class="btn btn-danger">Yes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-0 overflow-hidden mt-2">
                <?php
                if (!empty(session()->getFlashdata("success"))) {
                ?>

                    <div class="col-6 offset-3 alert alert-success">
                        <?= session()->getFlashdata("success") ?>
                    </div>
                <?php
                }

                ?>

                <?php
                if (!empty(session()->getFlashdata("fail"))) {
                ?>

                    <div class="col-6 offset-3  alert alert-danger">
                        <?= session()->getFlashdata("fail") ?>
                    </div>
                <?php
                }

                ?>
            </div>


        <?php
        }



        ?>




        <div class="container overflow-hidden">

            <div class="row g-0 my-5">
                <form method='get' action="<?= base_url('contest/title/' . $contest->slug) ?>" id="searchForm" class="d-flex px-2 col-12 col-md-6 offset-md-3  ">
                    <input class="form-control me-2" name="search" type="search" value='<?= $search ?>' placeholder="Search for contestants" aria-label="Search">
                    <button class="btn btn-warning btn-outline-dark " type="submit">Search</button>
                </form>
            </div>
        </div>




        <div class="contestants-container">
            <div class="container overflow-hidden">
                <div class="row gx-0 gy-2 g-md-2">
                    <?php foreach ($contestants as $contestant) : ?>
                        <?php $string = str_replace('&AMP;', 'and', htmlspecialchars(urlencode($contest->title))) ?>
                        <div class="mt-1 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-img-top card-click " style="background-image: url(/images/<?= $contestant->image ?>); background-repeat: no-repeat; background-position:top center;">
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
                                            <a re="noopener" target="_blank" href="<?php echo 'https://wa.me/?text=Vote%20for%20' . $contestant->user->full_name . '%20on%20the%20' . $string . '%20voting%20contest ' . $contestant->share_url   ?>" data-action="share/whatsapp/share">
                                                <img src="https://res.cloudinary.com/ademolamadelewi/image/upload/f_auto,q_auto/v1610570958/farmers/Group_90_ovpara.svg" alt="icon"></a>
                                            <a href=" <?= base_url('images/' . $contestant->image) ?>"download><i class="bi bi-cloud-arrow-down-fill m-auto position-absolute ps-1 text-black py-auto" style="font-size: 1.3em;"></i></a>

                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">

                                    <div class="mb-0 text-center card-title text-uppercase"><?= $contestant->user->full_name ?></div>
                                    <div class="text-center card-text">
                                        <!-- <p>
                                        CANDIDATE NUMBER:<span class="font-weight-bold">001</span>
                                    </p> -->
                                        <div class="my-3 d-flex align-items-center justify-content-between">
                                            <?php
                                            if ($contestant->votes > 0) {
                                            ?>
                                                <p>Voting Percent: <?= number_format(($contestant->votes / $contest->total_votes) * 100, 2) ?>%</p>
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
                                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="<?= ($contestant->votes / $contest->total_votes) * 100 ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?= ($contestant->votes / $contest->total_votes) * 100 ?>%">
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
                                                Vote Now
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


    </section>

    <div id="Modal" class="modal  bg-gradient   overflow-hidden col-10" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content bg-black w-100 overflow-hidden">
                <div class="modal-header">

                    <h2 class="modal-title col-12 text-center">Contestant name</h2>
                </div>
                <div class="modal-body">
                    <p>Is this the contestant you will like to vote for ?</p>
                    <button class="btn-warning text-capitalize btn">vote now</button>
                    <h2></h2>
                </div>
                <div class="modal-footer">
                    <a href=""> <button type="button" id='dismiss' class="btn btn-danger" data-dismiss="modal">Close</button></a>
                </div>
            </div>

        </div>
    </div>
</main>

<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>

<script>
    // Set the date we're counting down to

    const diff = new Date().getTime() - new Date('<?= $contest->start_date ?>').getTime();
    const end_diff = new Date().getTime() - new Date('<?= $contest->end_date ?>').getTime();

    if (diff > 0) {
        document.getElementById("countdown-announce").innerHTML = "Countdown to end of Contest";
        var countDownDate = new Date('<?= $contest->end_date ?>').getTime();
    } else {
        document.getElementById("countdown-announce").innerHTML = "Countdown to contest ";
        var countDownDate = new Date('<?= $contest->start_date ?>').getTime();
    }





    // Update the count down every 1 second
    var x = setInterval(function() {

        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result in the element with id="demo"
        document.getElementById("days").innerHTML = days + "";
        document.getElementById("hours").innerHTML = hours + " ";
        document.getElementById("minutes").innerHTML = minutes + " ";
        document.getElementById("seconds").innerHTML = seconds + " ";

        // If the count down is finished, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("counter").innerHTML = "CONTEST HAS ENDED";
        }
    }, 1000);
</script>

<?= $this->endSection() ?>