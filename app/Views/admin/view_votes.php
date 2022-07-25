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
            <table class=" table table-striped table-bordered table-responsive align-middle">
                <thead class=" table-light ">
                    <tr>
                        <th scope="col">#</th>
                        <th>Name</th>
                        <th scope="col" class="col-2">Email</th>
                        <th>Reference</th>
                        <th>Cost</th>
                        <th>Vote Count </th>
                        <th>Contestant id </th>
                        <th>Vote Count</th>

                    </tr>
                </thead>
                <tbody class="table-striped">
                    <?php if ($votes) {

                        foreach ($votes as $vote) {
                    ?>



                            <tr class="">
                                <th scope="row"><?= $vote['id'] ?></th>
                                <td class=""><?= $vote['name'] ?></td>
                                <td class="col-1"><?= $vote['email'] ?></td>
                                <td><?= $vote['reference'] ?></td>
                                <td>&#8358;<?= $vote['cost'] ?></td>
                                <td><?= $vote['vote_count'] ?></td>
                                <td><?= $vote['contestant_id'] ?></td>
                                <td><?= $vote['vote_count'] ?></td>

                            </tr>

                        <?php




                        }
                    } else {
                        ?>

                        <tr>
                            <td colspan="9" align="center">
                                <h1>No Results Found</h1>
                            </td>
                        </tr>

                    <?php


                    }
                    ?>







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