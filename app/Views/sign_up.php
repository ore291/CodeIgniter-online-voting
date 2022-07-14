<?= $this->extend('Layout/main') ?>

<?= $this->section('content') ?>

<main class="">
    <section class="main-banner mt-lg-2 bg-dark pb- ">
        <h1 class="text-capitalize text-warning mb-5">sign up now</h1>
        <h2 class="col-lg-6 col-10 mt-3 mt-lg-1 mx-auto text-capitalize" style="line-height: 2.5rem;">sign up now to take part in our exciting contests and now that you are the best at what you do</h2>

    </section>
    <section class="h-100 h-custom bg-dark mb-lg-1 mb-2">
        <div class="container pt-2 h-100">
            <div class="row justify-content-center  align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7 bg-dark mb-3">
                    <div class="card shadow-2-strong bg-black card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-4">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
                            <form>

                                <div class="row">
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="text" id="firstName" class="form-control form-control-lg" />
                                            <label class="form-label" for="firstName">First Name</label>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="text" id="lastName" class="form-control form-control-lg" />
                                            <label class="form-label" for="lastName">Last Name</label>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <!-- <div class="col-md-6 mb-4 d-flex align-items-center">

                                        <div class="form-outline datepicker w-100">
                                            <input type="text" class="form-control form-control-lg" id="birthdayDate" />
                                            <label for="birthdayDate" class="form-label">Birthday</label>
                                        </div>

                                    </div> -->
                                    <div class="col-md-6 mb-4">

                                        <h6 class="mb-2 pb-1">Gender: </h6>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="femaleGender" value="option1" checked />
                                            <label class="form-check-label" for="femaleGender">Female</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="maleGender" value="option2" />
                                            <label class="form-check-label" for="maleGender">Male</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="otherGender" value="option3" />
                                            <label class="form-check-label" for="otherGender">Other</label>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 mb-2 pb-2">

                                        <div class="form-outline">
                                            <input type="email" id="emailAddress" class="form-control form-control-lg" />
                                            <label class="form-label" for="emailAddress">Email</label>
                                        </div>

                                    </div>
                                    <!-- <div class="col-md-6 mb- pb-">

                                        <div class="form-outline">
                                            <input type="tel" id="phoneNumber" class="form-control form-control-lg" />
                                            <label class="form-label" for="phoneNumber">Phone Number</label>
                                        </div> 

                                    </div> -->
                                </div>
                                <div class="row">
                                    <div class="col-12 my-2 pb-2">
                                        <input class="form-control form-control-lg"   id="formImg" type="file" />
                                        <div class="small text-white mt-2">Upload your picture</div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">

                                        <select class="select form-control-lg text-capitalize">
                                            <option value="1" disabled>Choose a category</option>
                                            <option value="2">Most Handsome </option>
                                            <option value="3">Most Beautiful</option>
                                            <option value="4">most creative</option>
                                            <option value="5">most funny</option>
                                            <option value="6"></option>
                                            <option value="7"></option>
                                        </select>
                                        <label class="form-label select-label">Choose category</label>

                                    </div>
                                </div>

                                <div class="mt-4 pt-">
                                    <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<?= $this->endSection() ?>