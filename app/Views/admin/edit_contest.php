<?= $this->extend('Layout/admin_layout') ?>

<?= $this->section('content') ?>

<section>

    <div class="container shadow shadow-sm p-4 col-lg-10">
        <h4 class="mb-">Edit <br>
            <h1 class="mb-3"><?= $contest->title ?></h1>
        </h4>
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
        <form class="row gx-3 gy-2 align-items-center text-black" enctype="multipart/form-data" action="<?= base_url('admin/edit-contest/' . $contest->id) ?>" method="post">

            <div class="row">
                <div class="col-12 col-md-12 form-outline mb-2 pb-2" id="category-div">

                    <label class="form-label text-black" for="contest-title">Contest Title</label>
                    <input name="title" required class="form-control text-black" id="contest-title" type="text" value="<?= $contest->title ?>" aria-label="title">

                </div>

            </div>
            <div class="row">
                <div class="col-12 col-md-12 form-outline text-black  " id="category-div">
                    <label class="form-label text-capitalize" for="typeNumber">Change Contest Sponsor/Organizer</label>
                    <?php

                    if (isset($contest->sponsor[0])) {
                    ?>

                        <select class="form-select text-black text-capitalize " name="sponsor" id="sponsor" value='<?= $contest->sponsor[0]->name ?>' placeholder="mmm">
                            <!-- <option value=0 selected="selected"  aria-required="" class="text-capitalize"><?php if (isset($contest->sponsor[0]->name)) {
                                                                                                                    echo $contest->sponsor[0]->name;
                                                                                                                } else {
                                                                                                                    echo 'No Sponsor';
                                                                                                                } ?></option> -->

                            <?php foreach ($sponsors as $sponsor) : ?>

                                <option value="<?= $sponsor->id ?>" class="text-black text-capitalize ">
                                    <?= esc($sponsor->name) ?>
                                </option>


                            <?php endforeach; ?>


                        </select>


                    <?php
                    } else {
                    ?>

                        <select class="form-select text-black text-capitalize " name="sponsor" id="sponsor" placeholder="">


                            <option value="<?= null ?>">
                                No Sponsor
                            </option>

                            <?php foreach ($sponsors as $sponsor) : ?>

                                <option  value="<?= $sponsor->id ?>" class="text-black text-capitalize ">
                                    <?= esc($sponsor->name) ?>
                                </option>


                            <?php endforeach; ?>


                        </select>



                    <?php
                    }



                    ?>

                    <!-- <select class="form-select text-black text-capitalize w-50" name="category" id="category" placeholder="">
                        <option value="" disabled selected="selected">Choose allowed gender </option>
                        <option>male</option>
                        <option>female</option>
                        <option>all</option>
                    </select> -->
                </div>

            </div>

            <div class="row my-2">


                <div class="col-12 col-md-6 form-outline text-black  " id="category-div">
                    <label class="form-label text-capitalize" for="typeNumber">Contest Category</label>
                    <select class="form-select text-black text-capitalize " value='<?= $contest->category_d['title'] ?>' name="category" id="category" placeholder="">
                        <option value="" selected="selected"><?= $contest->category_d['title'] ?></option>
                        <?php foreach ($categories as $category) : ?>

                            <option value="<?= $category['id'] ?>" class="text-black">
                                <?= esc($category['title']) ?>
                            </option>


                        <?php endforeach; ?>


                    </select>
                    <!-- <select class="form-select text-black text-capitalize w-50" name="category" id="category" placeholder="">
                        <option value="" disabled selected="selected">Choose allowed gender </option>
                        <option>male</option>
                        <option>female</option>
                        <option>all</option>
                    </select> -->
                </div>
                <div class="col-12 col-md-6">
                    <div class="  form-outline ">
                        <label class="form-label text-capitalize" for="typeNumber">Price per vote (₦)</label>
                        <input type="number" name="price" id="typeNumber" class="form-control bg-transparent text-black col-lg-6 mx-auto" min="1" value="<?= $contest->price_per_vote ?>" />


                    </div>
                </div>
            </div>


            <div class="row my-2">


                <div class="col-12 col-md-6">
                    <label for="formFile" class="form-label">Upload Cover Image</label>
                    <input class="form-control" type="file" accept="image/png, image/gif, image/jpeg ,image/webp" name="cover" id="formFileMultiple">
                </div>
                <div class=" col-12 col-md-6">
                    <label for="formFile" class="form-label">Upload Contest Picture</label>
                    <input class="form-control" name="picture" accept="image/png, image/gif, image/jpeg, image/webp" type="file" id="formFileMultiple">
                </div>

            </div>

            <!-- <div class="row my-2">

                <div class="col-12 col-md-6">
                    <label for="startDate" class="form-label">Contest Start Date</label>
                    <input type="date" id="startDate" name="startDate" class="form-control"  value="<?= $contest->start_date ?>">
                </div>
                <div class="col-12 col-md-6">
                    <label for="endDate" class="form-label">Contest End Date</label>
                    <input type="date" id="endDate" name="endDate" class="form-control"  value="<?= $contest->end_date ?>">
                </div>
            </div> -->
            <div class="row my-5">
                <button class="btn btn-warning col-12" type="submit">Submit</button>
            </div>
        </form>


    </div>











    </div>




</section>




<!-- 
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
-->
<!--  -->









<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>



<?= $this->endSection() ?>