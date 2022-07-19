<?= $this->extend('Layout/admin_layout') ?>

<?= $this->section('content') ?>

<section class="mt-lg-2">


    <div class="container shadow shadow-lg p-4 col-lg-12">

        <h2 class="mb-5">Contests</h2>

        <div class="table-responsive">
            <table class=" table table-striped table-bordered align-middle">
                <thead class=" table-light ">
                    <tr>
                        <th scope="col">#</th>
                        <th>Title</th>
                        <th scope="col" class="col-1">Category</th>
                        <th>Price per Vote</th>
                        <th>Total votes</th>
                       
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Status</th>

                    </tr>
                </thead>
                <tbody class="table-striped">

                    <?php foreach ($contests as $contest) : ?>



                        <tr>
                            <th scope="row"><?= $contest['id'] ?></th>
                            <td class="text-capitalize"><?= $contest['title'] ?></td>
                            <td><?= $contest['category'] ?></td>
                            <td><?= $contest['price_per_vote'] ?></td>
                            <td><?= $contest['total_votes'] ?></td>
                            <td><?= $contest['start_date'] ?></td>
                            <td><?= $contest['end_date'] ?></td>
                            
                            <!-- <td>Otto</td> -->

                        </tr>


                    <?php endforeach; ?>




                </tbody>
            </table>


        </div>
    </div>











</section>






<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>




<?= $this->endSection() ?>