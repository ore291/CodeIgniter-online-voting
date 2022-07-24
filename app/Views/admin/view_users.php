<?= $this->extend('Layout/admin_layout') ?>

<?= $this->section('content') ?>





<section class="mt-lg-2">


    <!-- <table class="table align-middle mb-0 bg-white">
        <thead class="bg-light">
            <tr>
                <th>Name</th>
                <th>Title</th>
                <th>Status</th>
                <th>Position</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="https://mdbootstrap.com/img/new/avatars/8.jpg" alt="" style="width: 45px; height: 45px" class="rounded-circle" />
                        <div class="ms-3">
                            <p class="fw-bold mb-1">John Doe</p>
                            <p class="text-muted mb-0">john.doe@gmail.com</p>
                        </div>
                    </div>
                </td>
                <td>
                    <p class="fw-normal mb-1">Software engineer</p>
                    <p class="text-muted mb-0">IT department</p>
                </td>
                <td>
                    <span class="badge badge-success rounded-pill d-inline">Active</span>
                </td>
                <td>Senior</td>
                <td>
                    <button type="button" class="btn btn-link btn-sm btn-rounded">
                        Edit
                    </button>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="https://mdbootstrap.com/img/new/avatars/6.jpg" class="rounded-circle" alt="" style="width: 45px; height: 45px" />
                        <div class="ms-3">
                            <p class="fw-bold mb-1">Alex Ray</p>
                            <p class="text-muted mb-0">alex.ray@gmail.com</p>
                        </div>
                    </div>
                </td>
                <td>
                    <p class="fw-normal mb-1">Consultant</p>
                    <p class="text-muted mb-0">Finance</p>
                </td>
                <td>
                    <span class="badge badge-primary rounded-pill d-inline">Onboarding</span>
                </td>
                <td>Junior</td>
                <td>
                    <button type="button" class="btn btn-link btn-rounded btn-sm fw-bold" data-mdb-ripple-color="dark">
                        Edit
                    </button>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="https://mdbootstrap.com/img/new/avatars/7.jpg" class="rounded-circle" alt="" style="width: 45px; height: 45px" />
                        <div class="ms-3">
                            <p class="fw-bold mb-1">Kate Hunington</p>
                            <p class="text-muted mb-0">kate.hunington@gmail.com</p>
                        </div>
                    </div>
                </td>
                <td>
                    <p class="fw-normal mb-1">Designer</p>
                    <p class="text-muted mb-0">UI/UX</p>
                </td>
                <td>
                    <span class="badge badge-warning rounded-pill d-inline">Awaiting</span>
                </td>
                <td>Senior</td>
                <td>
                    <button type="button" class="btn btn-link btn-rounded btn-sm fw-bold" data-mdb-ripple-color="dark">
                        Edit
                    </button>
                </td>
            </tr>
        </tbody>
    </table> -->






    <div class="container shadow shadow-lg p-4 col-lg-12">


        <h2 class="mb-5">Users</h2>
        <form method="get" action="users" class="d-flex col-lg-6 m-4" id='searchForm'>
            <input type="text" class='form-control me-2 text-black' name="search" value="<?= $search ?>">
            <input type="button" name="searchBtn" class="btn btn-warning btn-block" value="search" onclick="document.getElementById('searchForm').submit();">


        </form>

        <div class="table-responsive">
            <table class=" table table-light table-responsive  align-middle">
                <thead class=" table-light  ">
                    <tr>
                        <th scope="col">#</th>
                        <th>Name</th>
                        <th class="col-2 mx-auto ps-3">Gender/<br>Category</th>
                        <th class="col-2 mx-auto ps-3">Occupation/<br>State</th>
                        <th class="mx-auto ps-3">Created at</th>
                        <th>Phone No. </th>


                    </tr>
                </thead>
                <tbody class="table-striped">
                    <?php if ($users) {

                        foreach ($users as $user) {
                    ?>



                            <tr class="">
                                <th scope="row"><?= $user->id ?></th>
                                <td class="w-25">
                                    <div class="d-flex align-items-center">
                                        <img src="<?= $user->picture ?>" alt="" style="width: 45px; height: 45px" class="rounded-circle" />
                                        <div class="ms-3">
                                            <p class="fw-bold mb-1"><?= $user->full_name ?></p>
                                            <p class="text-muted mb-0"><?= $user->email?></p>
                                        </div>
                                    </div>
                                </td>
                                <td class="col-2">
                                    <div class="d-flex align-items-center w-25">

                                        <div class="ms-3">
                                            <p class="fw-bold mb-1"><?= $user->gender ?></p>
                                            <p class="text-muted mb-0"><?= $user->category ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">

                                        <div class="ms-3">
                                            <p class="fw-bold mb-1"><?= $user->occupation ?></p>
                                            <p class="text-muted mb-0"><?= $user->state ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">

                                        <div class="ms-3">
                                            <p class="fw-bold mb-1"><?=  date('d-m-Y', strtotime($user->created_at)) ?></p>

                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">

                                        <div class="ms-3">
                                            <p class="fw-bold mb-1"><?= $user->phone ?></p>

                                        </div>
                                    </div>
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





















<?= $this->endSection() ?>