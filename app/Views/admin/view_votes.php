<?= $this->extend('Layout/admin_layout') ?>

<?= $this->section('content') ?>


<section class="mt-lg-2">





    <div class="container shadow shadow-lg p-4 col-lg-12">

        <h2 class="mb-5">Votes</h2>
        <form method="get" action="view_votes" class="d-flex col-lg-6 m-4" id='searchForm'>
            <input type="text" class='form-control me-2 text-black' name="search" value="<?= $search ?>">
            <input type="button" name="searchBtn" class="btn btn-warning btn-block" value="search" onclick="document.getElementById('searchForm').submit();">


        </form>

        <div class="table-responsive">
            <table class=" table table-striped table-bordered  align-middle">
                <thead class=" table-light ">
                    <tr>
                        <th scope="col">#</th>
                        <th>Name</th>
                        <th scope="col" class="w-25">Email</th>
                        <th>Reference</th>
                        <th>Cost</th>
                        <th>Vote Count </th>
                        <th>Contestant id </th>

                    </tr>
                </thead>
                <tbody class="table-striped">
                    

                    <?php foreach ($votes as $vote) : ?>



                        <tr class="">
                            <th scope="row"><?= $vote['id'] ?></th>
                            <td class="p-5"><?= $vote['name'] ?></td>
                            <td><?= $vote['email'] ?></td>
                            <td><?= $vote['reference'] ?></td>
                            <td><?= $vote['cost'] ?></td>
                            <td><?= $vote['vote_count'] ?></td>
                            <td><?= $vote['contestant_id'] ?></td>

                        </tr>


                    <?php endforeach; ?>




                </tbody>
            </table>

            <div class="d-flex justify-content-center">
                <?= $pager->only(['search', 'order'])->links() ?>

            </div>


        </div>
    </div>













</section>













<script src=" <?php echo base_url('assets/js/admin.js') ?>">
</script>




<?= $this->endSection() ?>