<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/contests.css') ?>" type="text/css">
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>

<body>



    <nav class="navbar fixed navbar-expand-lg navbar-dark scrolling-navbar border-1 border-bottom">
        <div class="container my-lg-2">

            <!-- Brand -->
            <a class="navbar-brand h-25" href="/" target="">
                <!-- <img src="https://picsum.photos/id/684/600/400" class="nav-img " alt=""> -->
                <strong style="color: orange;">online voting</strong>
            </a>

            <!-- Collapse -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Links -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <!-- Left -->
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item ">
                        <a class="nav-links" href="/">Home

                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-links contest" href="<?php echo base_url('contests') ?>" target="">Contests</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-links" href="/about" target="">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-links" href="/contact-us" target="">Contact Us</a>
                    </li>
                </ul>

                <!-- Right -->
                <?php

                $userModel = new App\Models\UserModel();
                $loggedInUser = session()->get("loggedInUser");

                $user = $userModel->find($loggedInUser);


                if (isset($loggedInUser)) {
                ?>

                    <div class="dropdown d-flex align-items-center">

                        <span class="me-1"><?= esc(
                                                $user->first_name
                                            ) ?></span>
                        <a href="#" class="d-block text-warning text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="<?=
                                        base_url('images/' . $user->picture)
                                        ?>" alt="mdo" width="40" height="40" class="rounded-circle">
                        </a>
                        <ul class="dropdown-menu  text-small" aria-labelledby="dropdownUser1" style="left: -50px;">
                            <li><a class="dropdown-item" href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="<?php echo base_url('auth/logout') ?>">Sign out</a></li>
                        </ul>



                    </div>

                <?php
                } else {

                ?>

                    <ul class="navbar-nav nav-flex-icons">


                        <li class="nav-item">
                            <div class="navbar-nav pl-5">
                                <a class="nav-links pt-1 " href="<?php echo base_url('login') ?>">Login</a>

                            </div>
                        </li>
                        <li class="nav-item me-5">
                            <a href="<?php echo base_url('sign-up') ?>" style='border-radius:50px !important;padding:auto 15px;color:black !important;' class="nav-links border border-light b px-3 btn-warning btn text-black rounded " target="_blank">
                                Sign Up
                            </a>
                        </li>
                        <li class="nav-item">

                        </li>
                    </ul>
                <?php
                }



                ?>


            </div>

        </div>
    </nav>

    <main>
        <section class="mt-lg-4 bg-dark py-3">
            <div class=" row py-1 ">
                <div class="col-12 col-md-4">
                    <img src="/images/<?= $contest->picture ?>" class="object-contain" style="object-fit: contain; width: 100%; height: 100%; max-width: 100%;" alt="">
                </div>


                <div class="col-md-4  col-12 ">

                    <div class="text-capitalize d-flex flex-column gap-2">
                        <h2> <?= esc($contest->title) ?></h2>
                        <span>sponsored by: delta soap</span>
                        <span style="">duration: <?= date(' D d M, Y', strtotime($contest->start_date)) ?> - <?= date('D d M, Y', strtotime($contest->end_date)) ?></span>
                        <br>
                        <h4 class="">Share contestestant's url</h4>
                        <div class="btn-group w-25" role="group" aria-label="Basic mixed styles example">
                            <a type="link" re="noopener" target="_blank" href="https://telegram.me/share/url?url=<?= $contestant->share_url ?>&amp;text=Vote%20for%20<?= $contestant->user->full_name ?>%20on%20the%20<?= $contest->title ?>%20voting%20contest <?= $contestant->share_url ?>" class="btn btn-dark btn-outline-primary"> <i class="bi bi-telegram w-100"></i> </a>
                            <a type="link" re="noopener" target="_blank" href="https://wa.me/?text=Vote%20for%20<?= $contestant->user->full_name ?>%20on%20the%20<?= $contest->title ?>%20voting%20contest <?= $contestant->share_url ?>" data-action="share/whatsapp/share" class="btn btn-dark btn-secondary btn-outline-success"> <i class="bi bi-whatsapp"></i> </a>
                            <a type="link" re="noopener" target="_blank" href="https://twitter.com/intent/tweet?text=Vote for <?= $contestant->user->full_name ?> on the <?= $contest->title ?> contest&amp;url=<?= $contestant->share_url ?>" class="btn btn-dark btn-secondary  btn-outline-primary"> <i class="bi bi-twitter w-100"></i> </a>
                        </div>
                        <div class="dflex">
                            <input type="text" id="share_url" value="<?= $contestant->share_url ?>">
                            <button onClick="copyUrl()"><i class="fa fa-clone"></i></button>
                        </div>
                        <script>
                            const copyUrl = () => {
                                url = document.getElementById("share_url").value
                                navigator.clipboard.writeText(url).then(function() {
                                    alert("copied to clipboard")
                                }, function() {
                                    console.log('Copy error')
                                });
                            }
                        </script>





                    </div>




                </div>
                <div class="text-capitalize d-flex col-lg-4 col-12 flex-column ">




                    <h4>Cost : &#8358;<?= $contest->price_per_vote ?> per vote</h4>
                    <h4>Current Stage : <span class="text-uppercase text-warning"><?= $contestant->stage_data->name ?></span></h4>
                    <h4>Contestant Votes: <?= $contestant->votes ?></h4>




                </div>
            </div>
        </section>
        <section class="container mx-auto mt-lg-3 row p-5">
            <div class="col-md-6 d-flex flex-column justify-content-center gap-3">


                <h3>Contestant's Name : <span class="text-capitalize"><?= esc($contestant->user->full_name) ?></span></h3>
                <h3>Contestant's ID : <?= sprintf('%03d', $contestant->id) ?></h3>
                <?php
                if ($contestant->votes > 0) {
                ?>
                    <h4>Voting Percent: <?= number_format(($contestant->votes / $contest->total_votes) * 100, 2) ?>%</h4>
                <?php
                } else {
                ?>
                    <h4>Voting Percent: 0%</h4>
                <?php
                }

                ?>


            </div>
            <div class="col-md-6 col-12 ">

                <img src="/images/<?= $contestant->image ?>" alt="" class="w-100 " style="max-height: 300px; object-fit: contain;">
                <?php
                $id = session()->get("loggedInUser");
                if ($id == $contestant->user_id) {
                ?>
                    <form enctype="multipart/form-data" action="<?= base_url(
                                                                    'contest/update-profile/' . $contestant->id
                                                                ) ?>" method="post">

                        <div class="d-flex mt-2">

                            <input class="form-control " required name="picture" accept="image/png, image/gif, image/jpeg" id="picture" type="file" />
                            <button type="submit" class="ms-2 btn btn-success btn-sm">Update</button>
                        </div>



                    </form>
                    <?php
                    if (!empty(session()->getFlashdata("fail"))) {
                    ?>

                        <div class="alert alert-danger text-small">
                            <?= session()->getFlashdata("fail") ?>
                        </div>
                    <?php
                    }

                    ?>
                <?php
                }

                ?>
            </div>
        </section>





        <section class="border-1 border border-dark py-3 mx-auto">
            <h2 class="text-warning text-center mx-auto text-uppercase "> vote for <?= esc($contestant->user->full_name) ?></h2>
            <p class="text-center">Ensure the contestant is who you actually want to vote. There would be no refund or reversal of vote if you choose a wrong contestant.</p>

            <div class="container row">
                <form class="col-12 col-md-6 offset-md-3 mt-3" id="voteUser">
                    <div class=" mb-3 form-outline ">
                        <input type="number" name="vote_count" id="vote_count" required class="form-control bg-transparent text-white col-lg-12 " min="1" placeholder="0" />
                        <label class="form-label" for="vote_count">Select the number of votes you want</label>

                    </div>
                    <div class=" form-outline my-4   ">
                        <input type="text" required id="voter-name" name="name" class="form-control bg-transparent text-white " />
                        <label class="form-label" for="name">Enter your Name</label>
                    </div>
                    <div class=" form-outline my-4   ">
                        <input type="email" required id="email-address" name="email-address" class="form-control bg-transparent text-white " placeholder="enter a valid email" />
                        <label class="form-label" for="email-address">Enter your Email</label>
                    </div>
                    <div class=" mb-3 ">
                        <p> Price per vote : <strong>&#8358;<?= $contest->price_per_vote ?></strong></p>
                    </div>

                    <div class="form-submit row">
                        <button type="submit" class="btn btn-success col-12 btn-block w-full"> Pay Now </button>
                    </div>


                </form>





            </div>



        </section>
    </main>






    <footer class="row bg-black  mt-5 mx-auto pt-5  w-100" style="left:0 ;right:0;">

        <div class="row bg-black text-white font-weight-bolder text-left">




            <div class="col-lg-4 col-12 offset- mx-auto">
                <div>
                    <img src="https://picsum.photos/id/684/600/400" class="card-img-top footer-img mx-auto w-50 mx-lg-0" style='margin:15px' alt="">
                    <ul class="list-unstyled d-flex">
                        <li class="ms-3">
                            <a class="link-dark" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                                    <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                                </svg>
                            </a>
                        </li>
                        <li class="ms-3"><a class="link-dark" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                                </svg>
                            </a>
                        </li>
                        <li class="ms-3"><a class="link-dark" href="#"> <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                                </svg>
                            </a>
                        </li>
                        <li class="ms-3"><a class="link-dark" href="#">

                                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                    <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>





            <div class="col-lg-2 col-6 my-5 my-lg-1  text-capitalize ">
                <h5>Quick Links</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="/" class="nav-link p-0 text-secondary">Home</a></li>
                    <li class="nav-item mb-2"><a href="/contests" class="nav-link p-0 text-secondary">Contests</a></li>
                    <li class="nav-item mb-2"><a href="/contact-us" class="nav-link p-0 text-secondary">Contact Us</a></li>
                    <li class="nav-item mb-2"><a href="about/faqs" class="nav-link p-0 text-secondary">FAQs</a></li>
                    <li class="nav-item mb-2"><a href="/about" class="nav-link p-0 text-secondary">About</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-6 my-5 my-lg-1">
                <h5>Sponsors</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-secondary"></a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-secondary"></a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-secondary"></a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-secondary"></a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-secondary"></a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-6 text- my-lg-1 ">
                <h5 class="offset-1">Legal</h5>
                <ul class="nav flex-column text-left">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-secondary">Privacy Policy </a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-secondary">Terms & Conditions</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-secondary">Pricing</a></li>







                    <div class="col-lg-2 col-6 my-lg-1 footer-link">
                        <h5 class="text-white text-capitalize">contact</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><span href="#" class="nav-link p-0 text-secondary">Voice Call: <br> +2348057880646</span></li>
                            <li class="nav-item mb-2"><span href="#" class="nav-link p-0 text-secondary">Whatsapp Only: <br>
                                    +2348057880646</span></li>
                            <li class="nav-item mb-2"><span href="#" class="nav-link p-0 text-secondary">Email Address: <br>
                                    onlinevoting@gmail.com</span></li>

                        </ul>
                    </div>



            </div>

            <div class="d-flex justify-content-center py-1   " style="border-top: 1px solid rgb(33, 28, 34);">
                <p class="text-muted">&copy; <?= date('Y') ?> Kight Tech, Inc. All rights reserved.</p>
                <!-- <div class="d-flex col-6 col-lg-5  justify-content-sm-around justify-content-lg-center align-items-center">
<a href="#" class="fa fa-facebook">
</a>
<a href="#" class="fa fa-twitter"></a>
<a href="#" class="fa fa-instagram"></a>
</div> -->

            </div>

    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="https://js.paystack.co/v1/inline.js"></script>

    <!-- <script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script> -->
    <script type="text/javascript" src="<?php echo base_url('assets/js/main.js') ?>"></script>
    <script>
        function payWithPaystack() {
            let handler = PaystackPop.setup({
                key: 'pk_test_9da36d88c1d36b3beaab17754e6a92d2ad64ccaf', // Replace with your public key
                email: document.getElementById("email-address").value,
                amount: document.getElementById("vote_count").value * <?= $contest->price_per_vote ?> * 100,
                onClose: function() {
                    alert('Window closed.');
                },
                callback: function(response) {
                    const reference = response.reference;
                    const data = {
                        "email": document.getElementById("email-address").value,
                        "cost": document.getElementById("vote_count").value * <?= $contest->price_per_vote ?>,
                        "name": document.getElementById("voter-name").value,
                        "vote_count": document.getElementById("vote_count").value
                    }
                    $.ajax({
                        type: "post",
                        url: `/contest/vote/${reference}/<?= $contestant->id ?>`,
                        contentType: "application/json; charset=utf-8",
                        data: JSON.stringify(data),
                        success: function(response) {
                            var res = JSON.parse(response)

                            if (res.data.status === "success") {
                                alert("Payment Successful");
                                window.location.reload();
                            } else {
                                alert("Payment Failed");
                            }
                        }
                    });
                }
            });

            handler.openIframe();
        }


        $("#voteUser").submit(function(e) {
            e.preventDefault();
            payWithPaystack();

        });
    </script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
</body>





</html>