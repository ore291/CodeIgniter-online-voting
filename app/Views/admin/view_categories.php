<?= $this->extend('Layout/admin_layout') ?>

<?= $this->section('content') ?>



<section>

    <div class="container-fluid pt-4 px-">
        <div class="row g-">
            <div class="col-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4 table-responsive">
                    <h6 class="mb-4">Male Categories</h6>
                    <table class="table table-responsive table-bordered table-light" ">
                        <thead>
                            <tr>
                                <th scope=" col">id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col" class="text-center">Action</th>

                        </tr>
                        </thead>
                        <tbody>
                            <?php if ($male_categories) {

                                foreach ($male_categories as $male_category) {
                            ?>
                                    <tr>
                                        <th><?= $male_category['id'] ?></th>
                                        <td scope=" row" class='col-lg-3  text-capitalize text-nowrap'><?= $male_category['title'] ?></td>
                                        <td class="col-lg-7 col-9 flex-lg-wrap flex-nowrap"><?= ucFirst($male_category['description']) ?></td>
                                        <td class="w-50">
                                            <div class="d-flex align-items-center mx-auto col-12 justify-content-center flex-row">
                                                <a href="/admin/edit-category/<?= $male_category['id'] ?>">
                                                    <button type="button" class="btn btn-  px-4 me-2 btn-block btn-success btn-rounded " data-mdb-ripple-color="dark">
                                                        Edit
                                                    </button>
                                                </a>

                                                <a href="<?= base_url('/admin/delete-contest/' . $male_category['id']) ?>">

                                                    <button class="btn btn-block btn-danger ms-3">Delete</button>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                <?php

                                }
                            } else {
                                ?>

                                <tr>
                                    <td colspan="5" align="center">
                                        <h1>No Results Found</h1>
                                    </td>
                                </tr>

                            <?php


                            }
                            ?>




                        <tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid pt-4 px-4">
        <div class="ro g-">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded table-responsive h-100 p-4">
                    <h6 class="mb-4">Female Categories</h6>
                    <table class="table table-responsive  table-bordered table-light" ">
                        <thead>
                            <tr>
                                <th scope=" col">id</th>
                        <th scope="col">Title</th>
                        <th scope="col"class="text-nowrap">Description</th>
                        <th scope="col" class="text-center">Action</th>

                        </tr>
                        </thead>
                        <tbody>
                            <?php if ($female_categories) {

                                foreach ($female_categories as $female_category) {
                            ?>
                                    <tr class="">
                                        <th class="col-1"><?= $female_category['id'] ?></th>
                                        <td scope="col-2" class='col-lg- text-capitalize text-nowrap'><?= $female_category['title'] ?></td>
                                        <td  class="col-8"><?= ucFirst($female_category['description']) ?></td>
                                        <td class="col-1">
                                            <div class="d-flex align-items-center mx-auto col-1 justify-content-center flex-row">
                                                <a href="/admin/edit-category/<?= $female_category['id'] ?>">
                                                    <button type="button" class="btn btn-  px-4 me-2 btn-block btn-success btn-rounded " data-mdb-ripple-color="dark">
                                                        Edit
                                                    </button>
                                                </a>

                                                <a href="<?= base_url('/admin/delete-category/' . $female_category['id']) ?>">

                                                    <button class="btn btn-block btn-danger ms-3">Delete</button>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                <?php

                                }
                            } else {
                                ?>

                                <tr>
                                    <td colspan="5" align="center">
                                        <h1>No Results Found</h1>
                                    </td>
                                </tr>

                            <?php


                            }
                            ?>




                        <tbody>

                    </table>
                </div>
            </div>
            <div class="container-fluid pt-4 px-">
                <div class="row g-">
                    <div class="col-12 col-xl-12">
                        <div class="bg-light rounded h-100 p-4 table-responsive">
                            <h6 class="mb-4">General Categories</h6>
                            <table class="table table-responsive table-bordered table-light" ">
                        <thead>
                            <tr>
                                <th scope=" col">id</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col" class="text-center">Action</th>


                                </tr>
                                </thead>
                                <tbody>
                                    <?php if ($all_categories) {

                                        foreach ($all_categories as $all_category) {
                                    ?>
                                            <tr>
                                                <th><?= $all_category['id'] ?></th>
                                                <td scope=" row" class='col-lg-3  text-capitalize text-nowrap'><?= $all_category['title'] ?></td>
                                                <td class="col-lg-7 col-9 flex-lg-wrap flex-nowrap"><?= ucFirst($all_category['description']) ?></td>
                                                <td class="w-50">
                                                    <div class="d-flex align-items-center mx-auto col-12 justify-content-center flex-row">
                                                        <a href="/admin/edit-category/<?= $all_category['id'] ?>">
                                                            <button type="button" class="btn btn-  px-4 me-2 btn-block btn-success btn-rounded " data-mdb-ripple-color="dark">
                                                                Edit
                                                            </button>
                                                        </a>
                                                        <a href="<?= base_url('/admin/delete-category/' . $all_category['id']) ?>">

                                                            <button class="btn btn-block btn-danger ms-3">Delete</button>
                                                        </a>


                                                    </div>
                                                </td>
                                            </tr>

                                        <?php

                                        }
                                    } else {
                                        ?>

                                        <tr>
                                            <td colspan="5" align="center">
                                                <h1>No Results Found</h1>
                                            </td>
                                        </tr>

                                    <?php


                                    }
                                    ?>




                                <tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>















</section>





























<?= $this->endSection() ?>