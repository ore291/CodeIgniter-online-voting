<head>
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>

    <script>
        // Set the date we're counting down to
        var countDownDate = new Date("July 13, 2022 21:45:25").getTime();

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
                document.getElementById("counter").innerHTML = "EXPIRED";
            }
        }, 1000);
    </script>
</head>


<main>
    <section class="mt-lg-4 bg-dark py-3">
        <div class="container-flui row py-1 ps-1">

            <img src="<?php echo base_url('assets/images/image-3.jpg') ?> " class="col-lg-4 col-12" alt="">

            <div class="col-lg-8 row col-12 mt-2 mt-lg-0">

                <div class="text-capitalize d-flex col-lg-6 col-12 flex-column gap-2">
                    <h2> <?= esc($contest) ?></h2>
                    <span>sponsored by: delta soap</span>
                    <h4>duration:</h4>
                    <span>july 11 - august 12</span>
                    <br>
                    <h3>Share contest</h3>
                    <div class="btn-group w-25" role="group" aria-label="Basic mixed styles example">
                        <button type="link" href='/' class="btn btn-dark btn-outline-primary"> <i class="bi bi-facebook w-100"></i> </button>
                        <button type="link" href='/' class="btn btn-dark btn-secondary btn-outline-success"> <i class="bi bi-whatsapp"></i> </button>
                        <button type="link" href='/' class="btn btn-dark btn-secondary  btn-outline-primary"> <i class="bi bi-twitter w-100"></i> </button>
                        <button type="link" href='/' class="btn btn-dark btn-secondary  btn-outline-light"> <i class="bi bi-share-fill"></i> </button>
                    </div>




                </div>

                <div class="text-capitalize d-flex col-lg-6 col-12 flex-column gap-2">
                    <h4 class="mt-lg-2">countdown to next stage</h4>

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


                    <h4>price : $50 per vote</h4>
                    <h4>Current Stage :Bronze</h4>
                    <h4></h4>


                </div>


            </div>
        </div>
    </section>

    <section class="mt-lg-5 mt-5 pt-2 pt-lg-0">

        <form class="d-flex col-lg-5 col-10 mx-auto mb-3 my-lg-5 ms-lg-3">
            <input class="form-control me-2" type="search" placeholder="Search for contestants" aria-label="Search">
            <button class="btn btn-warning btn-outline-dark" type="submit">Search Contestant</button>
        </form>
        <?php $posts = ['title 1', 'title 2', 'title 3', 'title 4', 'title 5', 'title 6', 'title7']; ?>

        <div class="grid">
            <?php foreach ($posts as $post) : ?>
                <div class="w-100 ">
                    <div class="card mb-3 bg-dark  mx-auto mb-lg-1 mt-2" style="width: 25rem;">
                        <img src="<?php echo base_url('assets/images/image-3.jpg') ?>" class="card-img-top p-2" alt="...">
                        <div class="card-body p-">
                            <h5 class="card-title"><?= $post ?></h5>
                            <p class="card-text">vote result : 14.28%</p>
                            <p class="my-2">Contest no : 1</p>
                            <a href="contest/" style="white-space: nowrap; "> <button class="btn btn-warning btn-outline-success mx-4 px-4" data-bs-toggle="tooltip" data-bs-placement="top" title="Click vote for <?= $post ?>">Vote</button> </a>
                            <a href="<?= $post ?>/contestant/<?= $post ?>" class="btn btn-warning btn-outline- mx-4">View profile</a>
                        </div>
                    </div>
                </div>


            <?php endforeach; ?>
        </div>

    </section>
</main>