<?= $this->extend('Layout/main') ?>


<?= $this->section('content') ?>







<main class="main-banner">

    <section>
        <div class="mt- p-2 bg-transparent text-white text-center rounded">
            <h1 class="text-warning text-center"> Current Contests</h1>
            <p class="col-lg-6 mx-auto" style="font-size: 25px;">
                Here, you can find all of the contests listed in one easy location.
                If you see a contest you'd like to enter here, click on the link for more information.
            </p>
            <div class="row">
                <form method='get' action="contests" id="searchForm" class="col-md-6 col-12 offset-md-3">
                    <div class="form-outline d-flex">
                        <input type='text' name='search' value='<?= $search ?>' class="form-control" placeholder="Enter contest name">
                        <div class="ms-1">
                            <button class="btn btn-warning btn-lg btn-block" type="submit">Search</button>
                        </div>
                    </div>

                </form>
            </div>


        </div>


    </section>
    <section style="margin-top: 20px">
        <div class="row  g-4 px-2">

            <?php
            foreach ($contests
                as $contest) : ?>
                <div class="col-12 col-md-4">
                    <div class="card contest-card" style="min-height: auto; ">
                        <img src="/images/<?= $contest->picture ?>" class="card-img-top contest-card-img" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-uppercase" style="font-size: 18px"><?= esc(
                                                                        $contest->title
                                                                    ) ?></h5>
                            <div class="card-text">
                                <p></p>
                              <span style="color: green;">STARTS</span> :
                                <?= date('h:i A, D d M, Y', strtotime($contest->start_date)) ?> <p></p>
                                <p class=""><span style="color: red;">ENDS</span>:  <?= date('h:i A, D d M, Y', strtotime($contest->end_date)) ?></p>
                            </div>
                            <a href="<?php echo base_url('contest/title/'.$contest->slug) ?>" class="btn btn-outline-success">View Contest</a>
                        </div>
                    </div>
                </div>


            <?php endforeach; ?>






        </div>
        <div style='margin-top: 10px;'>

            <?= $pager->links() ?>

        </div>
    </section>





</main>





<?= $this->endSection() ?>