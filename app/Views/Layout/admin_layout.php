<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/admin.css') ?>" type="text/css">
    <!-- <script type="text/javascript" src="<?php echo base_url('bootstrap/js/bootstrap.js') ?>"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>



</head>

<body>



    <?php
    $user = session()->get('user');
    ?>

    <!-- Sidebar Start -->
    <div class="sidebar pe-4 bg-black text-white pb-3">
        <nav class="navbar bg-black  navbar-dark">
            <a href="<?= base_url() ?>" class="navbar-brand mx-4 mb-3">
                <h3 class="text-warning">online voting</h3>
            </a>
            <div class="d-flex align-items-center ms-4 mb-4">
                <div class="position-relative">
                    <img class="rounded-circle border-secondary border" src="/images/<?php if (isset($user)) {
                                                                                            echo $user->picture;
                                                                                        } else {
                                                                                            echo null;
                                                                                        } ?>" alt="" style="width: 50px; height: 50px;">
                    <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                </div>
                <div class="ms-3">
                    <h6 class="mb-0 text-white text-capitalize"><?php if (isset($user)) {
                                                                    echo $user->full_name;
                                                                } else {
                                                                    echo null;
                                                                } ?></h6>
                    <span class="text-secondary">Admin</span>
                </div>
            </div>
            <div class="navbar-nav w-100">
                <a href="/admin" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                <div class="nav-item dropdown text-capitalize">
                    <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>contests</a>
                    <div class="dropdown-menu bg-transparent border-0 flex-column mx-auto ">
                        <a href="/admin/add-contest" class="dropdown-item">add contest</a>
                        <a href="/admin/view-contest" class="dropdown-item">view contest</a>
                        <!-- <a href="element.html" class="dropdown-item">Other Elements</a> -->
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="" class="nav-item nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-th me-2"></i>Users</a>
                    <div class="dropdown-menu bg-transparent border-0 text-sm">
                        <a href="/admin/users" class="dropdown-item">Users</a>
                        <a href="/admin/sponsors" class="dropdown-item"></a>

                    </div>
                </div>

                <div class="nav-item dropdown">
                    <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Categories</a>
                    <div class="dropdown-menu bg-transparent border-0 text-sm">
                        <a href="/admin/add-category" class="dropdown-item">Add Category</a>
                        <a href="/admin/categories" class="dropdown-item">Categories</a>

                    </div>
                </div>

                <a href="/admin/view-votes" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Votes</a>
                <div class="nav-item dropdown">
                    <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Sponsors</a>
                    <div class="dropdown-menu bg-transparent border-0 text-sm">
                        <a href="/admin/add-sponsors" class="dropdown-item">Register Sponsor</a>
                        <a href="/admin/sponsors" class="dropdown-item">Sponsors</a>

                    </div>
                </div>
                <a href="/admin/settings" class="nav-item nav-link "><i class="fas fa-cog"></i>Settings</a>
            </div>
        </nav>
    </div>
    <!-- Sidebar End -->


    <div class="content">
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand bg-black navbar-ligh text-white sticky-top px-0 py-2">

            <a href="#" class="sidebar-toggler flex-shrink-0">
                <i class="fa fa-bars"></i>
            </a>
            <!-- <form class="d-non d-md-flex d-block ms-4">
                <input class="form-control border-0" type="search" placeholder="Search">
            </form> -->
            <div class="navbar-nav align-items-center ms-auto">
                <div class="nav-item dropdown">
                    <a href="" class="text-warning me-5"></a>

                    <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">

                    </div>
                </div>
                <div class="nav-item dropdown">

                    <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">

                    </div>
                </div>


            </div>
        </nav>
        <!-- Navbar End -->








        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <?= $this->renderSection('content') ?>







        <script src="<?php echo base_url('assets/js/easing.min.js') ?>"></script>

        <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

        <script src="<?php echo base_url('assets/js/admin.js') ?>"></script>
</body>

</html>