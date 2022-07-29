<!DOCTYPE html>
<html lang="en">



<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= esc($title) ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap.css') ?>" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/index.css') ?>" type="text/css">
  <!-- <script type="text/javascript" src="<?php echo base_url('bootstrap/js/bootstrap.js') ?>"></script> -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,700&display=swap" rel="stylesheet">

  <style>
    .header-logged {
      left: -50px;
    }

    @media screen and (min-width: 500px) {
      .header-logged {
        right: 0px;
        left: 0px;
      }
    }
  </style>
</head>

<body>

  <main class="main-banner">

    <?php

    $loggedInUser = session()->get("loggedInUser");

    $user = session()->get("user");
    $settings_model = new App\Models\SettingsModel();
    $logo = $settings_model->find(1);


    ?>



    <nav class="navbar fixed navbar-expand-lg w-100 navbar-dark scrolling-navbar border-1 border-botto">
      <div class="container my-lg-2">

        <!-- Brand -->
        <a class="navbar-brand h-25" href="/" target="">
          <img src="/images/<?= $logo['logo'] ?>" width="60" height="60" class="rounded-circle bg-transparent" alt="">
          <strong style="color: orange;">Face of MOA</strong>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <!-- Left -->
          <ul class="navbar-nav mx-auto ">
            <li class="nav-item ">
              <a class="nav-links" href="/">Home

              </a>
            </li>
            <li class="nav-item">
              <a class="nav-links contest" href="<?php echo base_url('contests') ?>" target="">Contests</a>
            </li>
            <li class="nav-item">
              <a class="nav-links" href="/about-us" target="">About</a>
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
            <ul class="navbar-nav nav-flex-icons">


              <li class="nav-item">
                <div class="dropdown d-flex align-items-center justify-content-center">

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
              </li>
            </ul>

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
                <a href="<?php echo base_url('sign-up') ?>" style='border-radius:50px !important;padding:auto 15px;color:black !important;' class="nav-links border border-0 b px-3 btn-warning btn text-black rounded " target="">
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
        <!-- <li class="nav-item me-">
              <a href="/sign-up" style='border-radius:50px !important;padding:auto auto !important;color:black !important;' class="nav-links border border-light b px-3 btn-warning btn text-black rounded " target="">
                Sign Up
              </a>
            </li> -->



      </div>

      </div>
    </nav>




  </main>