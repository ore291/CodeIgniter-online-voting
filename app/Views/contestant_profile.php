<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/contests.css') ?>" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" /> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head> -->




<?= $this->extend('Layout/main') ?>


<?= $this->section('content') ?>

<?php

use App\Models\SettingsModel;

$loggedInUser = session()->get("loggedInUser");

$user = session()->get("user");

$settings_model = new SettingsModel();

$settings = $settings_model->find(1);
$api_key = $settings['paystack_api_key'];


?>
<!-- <main class="main-banne">


       



    </main> -->




<main>
    <section class="mt-lg-4 bg-dark py-3">
        <div class=" row py-1 g-0 ">
            <div class="col-12 col-md-4">
                <img src="/images/<?= $contest->picture ?>" class="object-contain" style="object-fit: contain; width: 100%; height: 100%; max-width: 100%;" alt="">
            </div>


            <div class="col-md-4  col-12 ">

                <div class="text-capitalize d-flex flex-column gap-2 p-2">
                    <h2> <?= esc($contest->title) ?></h2>
                    <?php

                    if (isset($contest->sponsor_id)) {
                    ?>
                        <span>Sponsored by: <?= esc($contest->sponsor->brand) ?></span>

                    <?php
                    }
                    ?>
                    <span style="">duration: <?= date(' D d M, Y', strtotime($contest->start_date)) ?> - <?= date('D d M, Y', strtotime($contest->end_date)) ?></span>
                    <br>
                    <h4 class="">Share contestestant's url</h4>
                    <?php $string = str_replace('&AMP;', 'and', htmlspecialchars(urlencode($contest->title))) ?>
                    <div class="btn-group w-25" role="group" aria-label="Basic mixed styles example">
                        <a type="link" re="noopener" target="_blank" href="https://telegram.me/share/url?url=<?= $contestant->share_url ?>&amp;text=Vote%20for%20<?= $contestant->user->full_name ?>%20on%20the%20<?= $string ?>%20voting%20contest <?= $contestant->share_url ?>" class="btn btn-dark btn-outline-primary"> <i class="bi bi-telegram w-100"></i> </a>
                        <a type="link" re="noopener" target="_blank" href="https://wa.me/send?text=Vote%20for%20<?= $contestant->user->full_name ?>%20on%20the%20<?= $string ?>%20voting%20contest <?= $contestant->share_url ?>" data-action="share/whatsapp/share" class="btn btn-dark btn-secondary btn-outline-success"> <i class="bi bi-whatsapp"></i> </a>
                        <a type="link" re="noopener" target="_blank" href="https://twitter.com/intent/tweet?text=Vote for <?= $contestant->user->full_name ?> on the <?= $string ?> contest&amp;url=<?= $contestant->share_url ?>" class="btn btn-dark btn-secondary  btn-outline-primary"> <i class="bi bi-twitter w-100"></i> </a>

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

                    <a href="<?= base_url('images/' . $contestant->image) ?>" class="btn btn-lin text-decoration-none text-white m-0 btn-sm col-8 text-nowrap btn-warning" download> Share contestant image</a>





                </div>




            </div>
            <div class="text-capitalize d-flex col-lg-4 col-12 flex-column p-2">




                <h4>Cost : &#8358;<?= $contest->price_per_vote ?> per vote</h4>
                <h4>Current Stage : <span class="text-uppercase text-warning"><?= $contestant->stage_data->name ?></span></h4>
                <h4>Contestant Votes: <?= $contestant->votes ?></h4>




            </div>
        </div>
    </section>
    <section class="container mx-auto mt-lg-3 row g-0 p-2 p-md-5">
        <div class="col-md-6 d-flex flex-column justify-content-center gap-3">


            <h3>Contestant's Name : <span class="text-capitalize"><?= esc($contestant->user->full_name) ?></span></h3>
            <h3>Contestant's ID : <?= sprintf('%03d', $contestant->id) ?></h3>
            <?php
            if ($contestant->votes > 0 and $contest->total_votes > 0) {
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


    <?php
    $today = strtotime(date("Y-m-d H:i:s"));

    $startDate = strtotime($contest->start_date);

    if ($today > $startDate) {
    ?>

        <section class="border-1 border border-dark py-3 mx-auto">
            <h2 class="text-warning text-center mx-auto text-uppercase "> vote for <?= esc($contestant->user->full_name) ?></h2>
            <p class="text-center">Ensure the contestant is who you actually want to vote. There would be no refund or reversal of vote if you choose a wrong contestant.</p>

            <div class="container row g-0 p-2 ">
                <form class="col-12 col-md-4 offset-md-4 mt-3 p-2" id="voteUser">
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



                    <button type="submit" class="btn btn-success w-100 btn-block "> Pay Now </button>



                </form>





            </div>



        </section>


    <?php
    }


    ?>



</main>






<footer class="row bg-black  mt-5 mx-auto pt-5  w-100" style="left:0 ;right:0;">



    <div class="d-flex justify-content-center py-1" style="border-top: 1px solid rgb(33, 28, 34);">
        <p class="text-secondary" style="font-size:smaller"> &copy; <?= date('Y') ?> KightTech, All rights reserved.</p>

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
            key: <?= $api_key ?>, // Replace with your public key
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

<?= $this->endSection() ?>