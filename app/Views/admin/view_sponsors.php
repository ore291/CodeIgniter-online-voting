<?= $this->extend('Layout/admin_layout') ?>

<?= $this->section('content') ?>


<section class="mt-lg-2">




    <div class="container shadow shadow-lg p-4 col-lg-12">

        <h2 class="mb-5">Sponsors</h2>
        <form method="get" action="sponsors" class="d-flex col-lg-6 m-4" id='searchForm'>
            <input type="text" class='form-control me-2 text-black' name="search" value="<?= $search ?>">
            <input type="button" name="searchBtn" class="btn btn-warning btn-block" value="search" onclick="document.getElementById('searchForm').submit();">


        </form>

        <div class="table-responsive">
            <table class=" table table-striped table-bordered table-responsive  align-middle">
                <thead class=" table-light ">
                    <tr>
                        <th scope="col">#</th>
                        <th>Name</th>
                        <th scope="col" class="w-25">Company name</th>
                        <th>Brand</th>
                        <th>Email</th>
                        <th>Phone No.</th>

                    </tr>
                </thead>
                <tbody class="table-striped">

                    <?php
                    function delete($id)
                    {
                        $sponsorModel = new \App\Models\SponsorModel();


                        $sponsorModel->delete($id);
                    }
                    ?>



                    <?php if ($sponsors) {

                        foreach ($sponsors as $sponsor) {
                    ?>


                            <tr class="">
                                <th scope="row"><?= $sponsor['id'] ?></th>
                                <td class="p-3"><?= $sponsor['name'] ?></td>
                                <td><?= $sponsor['company_name'] ?></td>
                                <td><?= $sponsor['brand'] ?></td>
                                <td><?= $sponsor['email'] ?></td>
                                <td><?= $sponsor['phone'] ?></td>
                                <td><button class="btn btn-block btn-danger" onclick="window.location.reload()" onclick="<?= delete($sponsor['id']) ?>" value="delete">Delete</button></td>

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