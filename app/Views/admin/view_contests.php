<?= $this->extend('Layout/admin_layout') ?>

<?= $this->section('content') ?>

<section class="mt-lg-2">


    <div class="container shadow shadow-lg p-4 col-lg-12">

        <h2 class="mb-5">Contests</h2>


        <form method="get" action="view_contest" class="d-flex col-lg-6 m-4" id='searchForm'>
            <input type="text" class='form-control me-2 text-black' name="search" value="<?= $search ?>">
            <input type="button" name="searchBtn" class="btn btn-block btn-warning" value="search" onclick="document.getElementById('searchForm').submit();">


        </form>
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

        <div class="table-responsive">
            <table class=" table table-stripe table-light table-bordered table-responsive align-middle">
                <thead class=" table-light " style="white-space: nowrap;">
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th>picture</th>
                        <th>Title</th>
                        <th scope="col" class="col-1">Category</th>
                        <th style="white-space: nowrap;">Price per Vote</th>
                        <th>Total votes</th>

                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Action</th>
                        <th>Winner</th>



                    </tr>
                </thead>
                <tbody class="table-striped" style="white-space:nowra;  ">


                    <?php $model = new \App\Models\ContestModel();









                    ?>




                    <?php if ($contests) {

                        foreach ($contests as $contest) {
                    ?>

                            <tr class="text-center">
                                <th scope="row"><?= $contest->id ?></th>
                                <th scope=""> <img class=" rounded- mx-lg-auto p- contest-im " style="width: 135px;height:135px;" src="<?= $contest->picture ?>" alt=""></th>

                                <td class="text-capitalize " style="white-space:nowrap;  "><?= $contest->title ?></td>
                                <td><?= $contest->category ?></td>
                                <td>&#8358;<?= $contest->price_per_vote ?></td>
                                <td class="truncate"><?= $contest->total_votes ?></td>
                                <td><?= date('d-m-Y', strtotime($contest['start_date'])) ?></td>
                                <td><?= date('d-m-Y', strtotime($contest->end_date)) ?></td>

                                <td class="w-50">
                                    <div class="d-flex align-items-center mx-auto col-12 justify-content-center flex-row">
                                        <a href="/admin/edit-contest/<?= $contest->id ?>">
                                            <button type="button" class="btn btn-  px-4 me-2 btn-block btn-success btn-rounded " data-mdb-ripple-color="dark">
                                                Edit
                                            </button>
                                        </a>

                                        <a href="<?= base_url('/admin/delete-contest/' . $contest->id) ?>">

                                            <button class="btn btn-block btn-danger ms-3">Delete</button>
                                        </a>
                                    </div>
                                </td>

                                <td>
                                    <?= $contest['winner'] ?>
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




            <div class=" d-flex justify-content-center">
                <?= $pager->links() ?>



            </div>


        </div>
    </div>











</section>




<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>




<?= $this->endSection() ?>