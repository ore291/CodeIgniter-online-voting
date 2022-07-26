<?= $this->extend('Layout/admin_layout') ?>

<?= $this->section('content') ?>



<section class=" p-2 col-lg-12">




    <div class="container shadow shadow-sm p-4 col-lg-10">
        <h2 class="mb-5">Settings</h2>


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

        <form method="post" action="<?= base_url('settings/apikey') ?>" class="  d-flex flex-lg-column col-lg-8 m-4 text-black" enctype="multipart/form-data" id='api-key'>
            <label class="form-label text-black" for="api-key">Change Paystack Api Key</label>
            <div class="  d-flex col-lg-12 m- text-black">
                <input type="text" class='form-control me-2 text-black' id='api-key' name="api-key" placeholder="" value="">
                <input type="button" name="searchBtn" class="btn btn-block btn-warning" value="submit" onclick="document.getElementById('api-key').submit();">

            </div>


        </form>




        <form method="post" action="<?= base_url('settings/logo') ?>" id='logo' class="  d-flex flex-lg-column col-lg-8 m-4 text-black" enctype="multipart/form-data" id='searchForm'>


            <label for="formFile" class="form-label">Upload Site Logo</label>
            <div class="  d-flex col-lg-12 m- text-black">
                <input class="form-control" type="file" required accept="image/png, image/gif, image/jpeg ,image/webp" name="logo" required id="formFileMultiple">

                <input type="button" name="searchBtn" class="btn btn-block btn-warning ms-3" value="submit" onclick="document.getElementById('logo').submit();">

            </div>
        </form>

        <form method="post" action="<?= base_url('settings/secretkey') ?>" class="  d-flex flex-lg-column col-lg-8 m-4 text-black" enctype="multipart/form-data" id='secret-key'>
            <label class="form-label text-black" for="secret-key">Change Paystack Secret Key</label>
            <div class="  d-flex col-lg-12 m- text-black">
                <input type="text" class='form-control me-2 text-black' id='secret-key' name="secret-key" placeholder="" value="">
                <input type="button" name="searchBtn" class="btn btn-block btn-warning" value="submit" onclick="document.getElementById('secret-key').submit();">

            </div>


        </form>




</section>
























<?= $this->endSection() ?>