<?= $this->extend('Layout/admin_layout') ?>

<?= $this->section('content') ?>







<!-- Spinner Start -->
<!-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div> -->
<!-- Spinner End -->



<main class="col-md-12 ms-sm-auto mt-lg-2 col-lg-12 ">
    <section class="shadow shadow-lg p-4 col-lg-12">

        <div class="container-fluid pt-4 ">
            <h2>Dashboard</h2>

            <div class="row mt-lg-5 ">

                <div class="col-12 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-lg-between p-4 justify-content-evenly">
                        <i class="bi bi-people fa-3x text-primary"></i>
                        <div class="ms-lg-3 ms-4 ">
                            <h6 class="mb-2">Total Users</h6>
                            <h6 class="mb-0">50</h6>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-lg-between p-4 justify-content-evenly">
                        <i class=" bi bi-trophy fa-3x text-primary"></i>
                        <div class="ms-lg-3 ms-4">
                            <h6 class="mb-2 ">Total Contests</h6>
                            <h6 class="mb-0">50</h6>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-lg-between p-4 justify-content-evenly">
                        <i class="bi bi-award fa-3x text-primary"></i>
                        <div class="ms-lg-3 ms-4">
                            <h6 class="mb-2">Active Contests</h6>
                            <h6 class="mb-0">50</h6>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-lg-between p-4 justify-content-evenly">
                        <i class="bi bi-wallet-fill fa-3x text-primary"></i>
                        <div class="ms-lg-3 ms-4 ">
                            <h6 class="mb-2">Total Earnings</h6>
                            <h6 class="mb-0">&#8358;50</h6>
                        </div>
                    </div>
                </div>

            </div>

        </div>


        <div class="container-fluid pt-4 px-4">
            <div class="bg-light text-center rounded p-4">

                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h4 class="mb-0">Active Contests</h4>
                    <a href="/admin/view-contest">Show All</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-responsive text-start align-middle table-bordered table-hover mb-0">

                        <thead>
                            <tr class="text-dark" style="white-space: nowrap;">
                                <th scope="col">#</th>
                                <!-- <th scope="col">picture</th> -->
                                <th scope="col">Title</th>
                                <th scope="col">Category</th>
                                <th scope="col">Price per Vote</th>
                                <th scope="col">Total votes</th>
                                <th scope="col">End Date</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($contests) {

                                foreach ($contests as $contest) {
                            ?>
                                    <tr>
                                        <th scope="row"><?= $contest->id ?></th>
                                        <!-- <th scope=""> <img class=" rounded- mx-lg-auto p- contest-im " style="width: 135px;height:135px;" src="<?= $contest->picture ?>" alt=""></th> -->

                                        <td class="text-capitalize " style="white-space:nowrap;  "><?= $contest->title ?></td>
                                        <td><?= $contest->category ?></td>
                                        <td>&#8358;<?= $contest->price_per_vote ?></td>
                                        <td class="truncate"><?= $contest->total_votes ?></td>
                                        <td><?= date('d-m-Y', strtotime($contest->end_date)) ?></td>

                                        <td class="col-2">
                                            <div class="d-flex align-items-center mx-auto col-12 justify-content-center flex-row">
                                                <a href="/admin/edit-contest/<?= $contest->id ?>">
                                                    <button type="button" class="btn btn-sm  px-4 me-2 btn-block btn-success btn-rounded " data-mdb-ripple-color="dark">
                                                        Edit
                                                    </button>
                                                </a>

                                                <a href="<?= base_url('/contests/' . $contest->id) ?>">

                                                    <button class="btn btn-block btn-primary btn-sm ms-3">View</button>
                                                </a>
                                            </div>
                                        </td>



                                    </tr>





                                <?php

                                }
                            } else {
                                ?>

                                <tr>
                                    <td colspan="11" align="center">
                                        <h1>No Results Found</h1>
                                    </td>
                                </tr>

                            <?php


                            }
                            ?>
                        </tbody>


                    </table>



                </div>
            </div>



        </div>

    </section>

</main>

<!-- Footer Start -->
<div class="container-fluid g-0 col-12 pt-4 px-">
    <div class="bg-light rounded-top p-4">
        <div class="row">
            <div class="col-12 col-sm-6 text-center  text-sm-start">
                &copy; <a href="#" class="text-warning blockquote">OnlineVoting</a>, All Right Reserved.
            </div>
            <div class="col-12 col-sm-6 text-center text-sm-end">
                <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                Designed By <a href="">Knight Tech</a>
                </br>

            </div>
        </div>
    </div>
</div>
<!-- Footer End -->

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-dark btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>






<?= $this->endSection() ?>




<script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
<script src="dashboard.js"></script>