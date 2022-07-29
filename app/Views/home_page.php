<main>



  <!-- current contests section -->
  <?php

  $random_contest = $contests[array_rand($contests, 1)];

  if ($contests > 0) {

  ?>

    <section class="container-fluid">
      <div class="text-center my-2 my-md-5">

        <h1 class=" text-uppercase">current Contests</h1>
      </div>


      <div class="container-fluid ">
        <div class="row g-0">
          <div class="col-lg-8 col-12 current-con">
            <div class=" row g-0 current-cont " style="padding : 10px; background-image: linear-gradient(rgba(0, 0, 0, 0.712),rgba(0, 0, 0, 0.7)), url(<?= base_url('images/' . $random_contest->cover) ?>);">

              <div class="col-md-7 col-12 flex-column gap-lg-0 p-md-2">
                <!-- <h3 class="my-3">Contest Event</h3> -->
                <h2 class="mb-3 text-capitalize text-warning"><?= $random_contest->title ?></h2>
                <h4 class="">Date:<br>
                  <span class="text-warning"><?= date(' D d M, Y', strtotime($random_contest->start_date)) ?>-<?= date('D d M, Y', strtotime($random_contest->end_date)) ?></span>
                </h4>
                <p class="my-4 " style='max-width:fit-content;'>Sign up now to take part in the <span class="text-capitalize"><?= $random_contest->title ?></span> contest </p>
                <span class="nav-item ms-2 ps-2 w-50">
                  <a href="<?= base_url('contest/title/' . $random_contest->slug) ?>" style='border-radius:50px !important;padding:auto 15px;color:black !important;' class="nav-link  border border-0 b px- ms-2 py-2 btn-warning btn btn-outline-light w-50 btn-lg text-black rounded ">
                    Apply Now
                  </a>
                </span>
              </div>

              <?php

              if (isset($random_contest->sponsor)) {
              ?>

                <div class="text-md-end justify-content-md-end  col-md-5 col-12   justify-items-md-end align-md-end p-2">

                  <p>

                    Proudly Sponsored by <span class="text-warning">
                      <?= $random_contest->sponsor->brand ?>
                    </span>
                  </p>


                </div>

              <?php
              }


              ?>





            </div>

          </div>




          <div class='col-lg-4 col-12 mt-3 mt-lg-0'>
            <div class="container-fluid">
              <?php foreach (array_slice($contests, 0, 3) as $contest) : ?>
                <div class="row g-1 my-1">

                  <div class="col-4">
                    <img src="/images/<?= $contest->picture ?>" alt="" style="width:100%; height:100px; object-fit:cover; object-align:center">

                  </div>
                  <div class="col-8">

                    <h4 class="text-warning"><?= $contest->title ?></h4>
                    <span style='font-size:small'><?= date(' D d M, Y', strtotime($random_contest->start_date)) ?> - <?= date('D d M, Y', strtotime($random_contest->end_date)) ?></span>

                  </div>
                </div>
              <?php endforeach; ?>


            </div>

          </div>
        </div>
      </div>
    </section>

    <!-- current contests section end -->

  <?php
  }





  ?>


  <div class="d-flex align-items-center justify-content-center w-100 my-4">



    <a href="/contact-us" style='border-radius:50px !important;padding:auto 15px;color:black !important;' class="nav-link border border-0 b px-1 py-2 btn-warning btn btn-outline-light w-50 btn-lg text-black rounded ">
      Become a Sponsor
    </a>




  </div>




  <!-- <section class="container-fluid mt-3">



    <div class="container-fluid ">
      <div class="row g-0 ">
        <div class="col-lg-8 col-12 p-2">
          
          <h1 class="text-warning text-capitalize "> Become a sponsor</h1>

          <p>
          Simply put, without our generous sponsors, Voting inc would not be able to organize and conduct these contests. A sponsorship allows us to offer incentives, network with others, and contribute to the open source WordPress project. By donating to WordCamp US you further the project’s mission to democratize publishing through Open Source, GPL software.
          </p>

          <span class="nav-item w-50">
                  <a href="/sign-up" style='border-radius:50px !important;padding:auto 15px;color:black !important;' class="nav-link border border-light b px-1 py-2 btn-warning btn btn-outline-light w-50 btn-lg text-black rounded " target="_blank">
                    Become a Sponsor
                  </a>
                </span>

        </div>


        <div class='col-lg-4 col-12'>
          <div class="container-fluid">
            <div class="row g-0 my-">

              <div class="col-lg-12 col-12">
                <h4>Sponsor</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                <a href="/contact-us" target="_blank" rel="noopener noreferrer">
                  <span class="text-warning" style='font-size:small'>Apply Now <i class="bi bi-arrow g-0-right"></i></span></a>

              </div>
            </div>
            <div class="row g-0 my-4">

              <div class="col-lg-12 col-12">
                <h4>Partner</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                <a href="/contact-us" target="_blank" rel="noopener noreferrer">
                  <span class="text-warning" style='font-size:small'>Apply Now <i class="bi bi-arrow g-0-right"></i></span></a>

              </div>
            </div>
            <div class="row g-0 my-">

              <div class="col-lg-12 col-12">
                <h4>Investor</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                <a href="/contact-us" target="_blank" rel="noopener noreferrer">
                  <span class="text-warning" style='font-size:small'>Apply Now <i class="bi bi-arrow g-0-right"></i></span></a>

              </div>
            </div>

          </div>

        </div>
      </div>
    </div>
  </section> -->


  <div class="text-center my-2 my-md-5">

    <h1 class=" text-uppercase">Recent Winners of our Contests</h1>
  </div>
  <section class="d-flex">
    <button class="prev page-link mx-2 py-lg-2 btn bg-black vi " aria-label="Next" style="border-radius: 50px;">
      <span aria-hidden="true">&laquo;</span>

    </button>




    <div class="carousel slick-slider center col-10 mx-auto slick-slider">







      <?php foreach ($contests_winners as $contests_winner) : ?>


        <div class="d-flex justify-content-evenly  -circle text-center text-capitalize " style="height: max-content; ">
          <div class=" col-md-10 col-11 app">

            <img src="<?php echo base_url('images/' . $contests_winner->winner->user->picture) ?>" class="card-img-top img-fluid mb-lg-2  mx-auto" alt="..." style="max-height: 250px;object-fit:contain;">

            <h5 class="text- mb-lg-"> <?= $contests_winner->winner->full_name ?> </h5>
            <h5 class="text-nowrap text-truncate mx-lg-auto scrolle" style="overflow:;"><?= $contests_winner->title ?></h5>

          </div>






          <!-- <div class="car" >
         
          <div class="card-body">
           
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div> -->
        </div>

      <?php endforeach; ?>




    </div>
    <button class="next page-link mx-2 py-lg-2 btn bg-black vi" aria-label="Next" style="border-radius: 50px;">
      <span aria-hidden="true">&raquo;</span>

    </button>
    <!-- <nav aria-label="Page navigation example  " class=" d-flex justify-content-center">
      <ul class="pagination">
        <li class="page-item ">
          <button class="prev page-link mx-2 py-lg-2 btn bg-black " aria-label="Next" style="border-radius: 50px;">
            <span aria-hidden="true">&laquo;</span>

          </button>
          
        </li>
        <li class="page-item  mx-lg-5">
          <button class="next page-link mx-2 py-lg-2 btn bg-black " aria-label="Next" style="border-radius: 50px;">
            <span aria-hidden="true">&raquo;</span>

          </button>
         
        </li>
      </ul>
    </nav> -->

  </section>



</main>