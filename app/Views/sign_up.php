<?= $this->extend('Layout/main') ?>

<?= $this->section('content') ?>



<script>
    $(document).ready(function() {
        $('input[type="radio"]').click(function() {
            var inputValue = $(this).attr("value");
            if (inputValue === 'female') {
                $('#male-category').hide();
                $('#female-category').show();
            } else {
                $('#male-category').show();
                $('#female-category').hide();
            }
        });
    });
</script>

<main class="">
    <section class="main-banner mt-lg-2 bg-dark  ">
        <h1 class="text-capitalize text-warning mb-5">Register Now!</h1>
        <h2 class="col-lg-6 col-10 mt-3 mt-lg-1 mx-auto text-capitalize" style="line-height: 2.5rem;">sign up now to take part in our exciting contests and be celebrated for who you are</h2>

    </section>
    <section class="h-100 h-custom bg-dark mb-lg-1 mb-2">
        <div class="container pt- h-100">
            <div class="row justify-content-center  align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7 bg-dark mb-3">
                    <div class="card shadow-2-strong bg-black card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-4">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
                            <form action="<?= base_url(
                                                'auth/register'
                                            ) ?>" method="post">
                                <?= csrf_field() ?>
                                <div class="row">
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <label class="form-label" for="firstName">First Name</label>
                                            <input type="text" id="firstName" name="firstName" required class="form-control " />

                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <label class="form-label" for="lastName">Last Name</label>
                                            <input type="text" id="lastName" name="lastName" required class="form-control " />

                                        </div>

                                    </div>
                                </div>

                                <div class="row mb-2">

                                    <div class="col-12 mb-2 d-flex">

                                        <h6 class="me-2">Gender: </h6>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" required name="gender" id="female" value="female" checked />
                                            <label class="form-check-label" for="femaleGender">Female</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" required name="gender" id="male" value="male" />
                                            <label class="form-check-label" for="maleGender">Male</label>
                                        </div>



                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12  mb-2 pb-2">

                                        <div class="form-outline">
                                            <label class="form-label" for="email">Email</label>
                                            <input type="email" required id="email" name="email" class="form-control" />

                                        </div>

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-2 pb-2">
                                        <script>
                                            function togglePassword() {
                                                var x = document.getElementById("password");
                                                if (x.type === "password") {
                                                    x.type = "text";

                                                } else {
                                                    x.type = "password";

                                                }
                                            }
                                        </script>

                                        <div class="form-outline"> <label class="form-label ms-1" for="password">Password</label>
                                            <input type="password" required id="password" value="" name="password" default class="form-control " />

                                            <br>
                                            <input type="checkbox" c onclick="togglePassword()"><span class="ms-1">Show Password</span>
                                        </div>


                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-2 pb-2">

                                        <div class="form-outline"> <label class="form-label" for="phone">Phone No.</label>
                                            <input type="text" required id="phone" name="phone" class="form-control " />

                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-2 pb-2">
                                        <label class="form-label" for="state">State</label>
                                        <div class="form-outline">
                                            <select name="state" class="form-select " required id="state">
                                                <option value="" disabled selected>- Select a State -</option>
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

                                            </select>

                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-2 pb-2">

                                        <div class="form-outline"><label class="form-label" for="occupation">Occupation</label>
                                            <input type="text" required id="occupation" name="occupation" class="form-control " value="" />

                                        </div>

                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-12 col-md-6 mb-2 pb-2"> <label for="picture" class="mb-2 text-white ">Upload your picture</label>
                                        <input class="form-control " required name="picture" accept="image/png, image/gif, image/jpeg" id="picture" type="file" />

                                    </div>
                                    <div class="col-12 col-md-6 form-outline mb-2 pb-2" id="category-div">
                                        <label class="form-label select-label">Choose category</label>
                                        <select style="display: none" class="form-select  text-capitalize" name="category" id="male-category" placeholder="">
                                            <option value="" disabled selected="selected">Choose a category</option>


                                            <?php

                                            $males_cats = array_filter($categories, function ($e) {
                                                return $e['allowed_gender'] != "female";
                                                //Use this to be sure
                                                //return strtolower($e['type']) == "good";
                                            });

                                            foreach ($males_cats
                                                as $category) : ?>

                                                <option value="<?= $category['id'] ?>"><?= esc(
                                                                                            $category['title']
                                                                                        ) ?></option>


                                            <?php endforeach; ?>


                                        </select>
                                        <select class="form-select  text-capitalize" name="category" id="female-category" placeholder="">
                                            <option value="" disabled selected="selected">Choose a category</option>


                                            <?php

                                            $females_cats = array_filter($categories, function ($e) {
                                                return $e['allowed_gender'] != "male";
                                                //Use this to be sure
                                                //return strtolower($e['type']) == "good";
                                            });

                                            foreach ($females_cats
                                                as $category) : ?>

                                                <option value="<?= $category['id'] ?>"><?= esc(
                                                                                            $category['title']
                                                                                        ) ?></option>


                                            <?php endforeach; ?>


                                        </select>


                                    </div>
                                </div>



                                <div class="row mt-4 ">

                                    <input class="btn btn-warning col-12 col-md-8 mx-auto " type="submit" />


                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- <script type="text/javascript">
   
   $("gender").click(function(){
       var val = $("input[type='radio']:checked").val();
       alert(val);
   });
  
</script> -->
</main>

<?= $this->endSection() ?>