<?= $this->extend('Layout/main') ?>

<?= $this->section('content') ?>

<main class="">
    <section class="main-banner mt-lg-2 bg-dark pb- ">
        <h1 class="text-capitalize text-warning mb-5">sign up now</h1>
        <h2 class="col-lg-6 col-10 mt-3 mt-lg-1 mx-auto text-capitalize" style="line-height: 2.5rem;">sign up now to take part in our exciting contests and now that you are the best at what you do</h2>

    </section>
    <section class="h-100 h-custom bg-dark mb-lg-1 mb-2">
        <div class="container pt- h-100">
            <div class="row justify-content-center  align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7 bg-dark mb-3">
                    <div class="card shadow-2-strong bg-black card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-4">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
                            <form>

                                <div class="row">
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="text" id="firstName" name="firstName" required class="form-control form-control-lg" />
                                            <label class="form-label" for="firstName">First Name</label>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="text" id="lastName" name="lastName" required class="form-control form-control-lg" />
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
                                            <input class="form-check-input" type="radio" name="femaleGender" id="inlineRadioOptions" value="female" checked />
                                            <label class="form-check-label" for="femaleGender">Female</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="maleGender" id="inlineRadioOptions" value="male" />
                                            <label class="form-check-label" for="maleGender">Male</label>
                                        </div>



                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12  mb-2 pb-2">

                                        <div class="form-outline">
                                            <input type="email" required id="emailAddress" name="email" class="form-control form-control-lg" value="" />
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
                                    <div class="col-md-12 mb-2 pb-2">

                                        <div class="form-outline">
                                            <input type="text" required id="phone" name="phone" class="form-control form-control-lg" value="" />
                                            <label class="form-label" for="phone">Phone No.</label>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-2 pb-2">


                                        <div class="form-outline">
                                            <select name="states" class="select form-control-lg text-capitalize" id="">
                                                <option value="" disabled selected="selected">- Select a State -</option>
                                                <option value="Abuja FCT">Abuja FCT</option>
                                                <option value="Abia">Abia</option>
                                                <option value="Adamawa">Adamawa</option>
                                                <option value="Akwa Ibom">Akwa Ibom</option>
                                                <option value="Anambra">Anambra</option>
                                                <option value="Bauchi">Bauchi</option>
                                                <option value="Bayelsa">Bayelsa</option>
                                                <option value="Benue">Benue</option>
                                                <option value="Borno">Borno</option>
                                                <option value="Cross River">Cross River</option>
                                                <option value="Delta">Delta</option>
                                                <option value="Ebonyi">Ebonyi</option>
                                                <option value="Edo">Edo</option>
                                                <option value="Ekiti">Ekiti</option>
                                                <option value="Enugu">Enugu</option>
                                                <option value="Gombe">Gombe</option>
                                                <option value="Imo">Imo</option>
                                                <option value="Jigawa">Jigawa</option>
                                                <option value="Kaduna">Kaduna</option>
                                                <option value="Kano">Kano</option>
                                                <option value="Katsina">Katsina</option>
                                                <option value="Kebbi">Kebbi</option>
                                                <option value="Kogi">Kogi</option>
                                                <option value="Kwara">Kwara</option>
                                                <option value="Lagos">Lagos</option>
                                                <option value="Nassarawa">Nassarawa</option>
                                                <option value="Niger">Niger</option>
                                                <option value="Ogun">Ogun</option>
                                                <option value="Ondo">Ondo</option>
                                                <option value="Osun">Osun</option>
                                                <option value="Oyo">Oyo</option>
                                                <option value="Plateau">Plateau</option>
                                                <option value="Rivers">Rivers</option>
                                                <option value="Sokoto">Sokoto</option>
                                                <option value="Taraba">Taraba</option>
                                                <option value="Yobe">Yobe</option>
                                                <option value="Zamfara">Zamfara</option>
                                                <option value="Outside Nigeria">Outside Nigeria</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-2 pb-2">

                                        <div class="form-outline">
                                            <input type="text" required id="occupation" name="occupation" class="form-control form-control-lg" value="" />
                                            <label class="form-label" for="occupation">Occupation</label>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 mb-2 pb-2">
                                        <script>
                                            function togglePassword() {
                                                var x = document.getElementById("passWord");
                                                if (x.type === "password") {
                                                    x.type = "text";

                                                } else {
                                                    x.type = "password";

                                                }
                                            }
                                        </script>

                                        <div class="form-outline">
                                            <input type="password" required id="passWord" value="" name="passWord" default class="form-control form-control-lg" />
                                            <label class="form-label ms-1" for="passWord">Password</label>
                                            <br>
                                            <input type="checkbox" onclick="togglePassword()">Show Password
                                        </div>
                                        <!-- <script>
                                            function togglePassword() {
                                                var x = document.getElementById("passWord");
                                                if (x.type === "password") {
                                                    x.type = "text";
                                                } else {
                                                    x.type = "password";
                                                }
                                            }
                                        </script> -->

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-12 my-2 pb-2">
                                        <input class="form-control form-control-lg" required name="formPicture" accept="image/png, image/gif, image/jpeg" id="formImg" type="file" />
                                        <div class="small text-white mt-2">Upload your picture</div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 form-outline">

                                        <select class="select form-control-lg text-capitalize" name="formCateory">
                                            <option value="" disabled selected="selected">Choose a category</option>
                                            <option value="most handsome">Most Handsome </option>
                                            <option value="most beautiful">Most Beautiful</option>
                                            <option value="most creative">most creative visual artist</option>
                                            <option value="comedy">most funny</option>
                                            <option value="music">music</option>
                                            <option value="7"></option>
                                        </select>
                                        <label class="form-label select-label">Choose category</label>

                                    </div>
                                </div>

                                <div class="mt-4 pt-">
                                    <input class="btn btn-warning btn-lg" type="submit" value="Submit" />
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