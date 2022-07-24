<?= $this->extend('Layout/admin_layout') ?>

<?= $this->section('content') ?>


<section class="mt-lg-2">




    <div class="container shadow shadow-lg p-4 col-lg-12">

        <h2 class="mb-5">Sponsors</h2>
        <form method="get" action="sponsors" class="d-flex col-lg-6 m-4" id='searchForm'>
            <input type="text" class='form-control me-2 text-black' name="search" value="<?= $search ?>">
            <input type="button" name="searchBtn" class="btn btn-warning btn-block" value="search" onclick="document.getElementById('searchForm').submit();">


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
            <table class=" table table-striped table-bordered table-responsive  align-middle">
                <thead class="text-center table-light ">
                    <tr>
                        <th scope="col">#</th>
                        <th>Name</th>
                        <th scope="col" class="w-25">Company name</th>
                        <th>Brand</th>
                        <th>Email</th>
                        <th>Phone No.</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody class="table-striped">




                    <?php if ($sponsors) {

                        foreach ($sponsors as $sponsor) {
                    ?>


                            <tr class="">
                                <th scope="row"><?= $sponsor->id ?></th>
                                <td class="p-3 text-capitalize"><?= $sponsor->name ?></td>
                                <td><?= $sponsor->company_name ?></td>
                                <td><?= $sponsor->brand ?></td>
                                <td><?= $sponsor->email ?></td>
                                <td><?= $sponsor->phone ?></td>
                                <td><a href="<?= base_url('/admin/delete-sponsor/' . $sponsor->id) ?>"> <button class="btn btn-block btn-danger" onclick="window.location.reload()" value="delete">Delete</button></a>
                                </td>

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