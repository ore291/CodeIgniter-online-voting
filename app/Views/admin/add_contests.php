<?= $this->extend('Layout/admin_layout') ?>

<?= $this->section('content') ?>

<section>

    <div class="container shadow shadow-sm p-4 col-lg-10">
        <h2 class="mb-5">Add a Contest</h2>
        <form class="row gx-3 gy-2 align-items-center text-black">

            <div class="col-12 col-md-12 form-outline mb-2 pb-2" id="category-div">

                <label class="form-label text-black" for="contest-title">Contest Title</label>
                <input class="form-control text-black" id="contest-title" type="text" placeholder="contest title" aria-label="title">

            </div>

            <div class="col-12 col-md-12 form-outline mb-2 pb-2 text-black d-flex gap-4" id="category-div">
                <select class="form-select text-black text-capitalize w-50" name="category" id="category" placeholder="">
                    <option value="" disabled selected="selected">Choose a category</option>
                    <?php foreach ($categories as $category) : ?>

                        <option value="<?= $category['id'] ?>" class="text-black">
                            <?= esc($category['title']) ?>
                        </option>


                    <?php endforeach; ?>


                </select>
                <select class="form-select text-black text-capitalize w-50" name="category" id="category" placeholder="">
                    <option value="" disabled selected="selected">Choose allowed gender </option>
                    <option>male</option>
                    <option>female</option>
                    <option>all</option>
                </select>
            </div>

            <div class="col-12 col-md-12 form-outline mb-2 pb-2" id="category-div">

                <div class="mb-3">
                    <label for="formFile" class="form-label">Upload Cover Image</label>
                    <input class="form-control" type="file" id="formFileMultiple" multiple>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Upload Contest Picture</label>
                    <input class="form-control" type="file" id="formFileMultiple" multiple>
                </div>
            </div>
            <div class="  form-outline  flex-column">
                <label class="form-label text-capitalize" for="typeNumber">Set The price per vote</label>
                <input type="number" id="typeNumber" class="form-control bg-transparent text-black col-lg-6 mx-auto" min="1" placeholder="0" />


            </div>

            <label class="form-label text-black" for="contest-title">Contest Title</label>
            <input class="form-control text-black" id="contest-title" type="text" placeholder="contest title" aria-label="default input example">


            <form class="row">
                <label for="date" class="col-1 col-form-label"> Start Date</label>
                <div class="col-5">
                    <div class="input-group date" id="datepicker">
                        <input type="text" class="form-control" id="date" />
                        <span class="input-group-append">
                            <span class="input-group-text bg-dark d-block">
                                <i class="fa fa-calendar"></i>
                            </span>
                        </span>
                    </div>
                </div>
            </form>

    </div>









    </form>

    </div>




</section>




<!-- 
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
-->
<script src="<?php echo base_url('assets/js/main.js') ?>"></script>




<?= $this->endSection() ?>