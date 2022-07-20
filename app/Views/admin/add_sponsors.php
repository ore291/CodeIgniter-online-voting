<?= $this->extend('Layout/admin_layout') ?>

<?= $this->section('content') ?>




<section class="mt-lg-2">

    <div class="container shadow shadow-lg p-4 col-lg-10">

        <h2 class="mb-5">Add Sponsor</h2>
        <form class="row gx-3 gy-2 align-items-center text-black">

            <div class="col-12 col-md-12 form-outline mb-2 pb-2" id="category-div">

                <label class="form-label text-black" for="sponsors-name">Sponsor's Name</label>
                <input class="form-control text-black" name='sponsorName' id="sponsors-name" required type="text" placeholder="" aria-label="name">

            </div>

            <div class="col-12 col-md-6 form-outline mb-2 pb-2" id="category-div">

                <label class="form-label text-black" for="company-title">Company Name</label>
                <input class="form-control text-black" name="company" id="company-title" required type="text" placeholder="Company name" aria-label="name">

            </div>

            <div class="col-12 col-md-6 form-outline mb-2 pb-2" id="category-div">

                <label class="form-label text-black" for="brand-title">Brand</label>
                <input class="form-control text-black" name="brand" id="brand-title" type="text" placeholder="Brand name" aria-label="name">

            </div>

            <div class="col-12 col-md-12   form-outline mb-2 pb-2" id="category-div">

                <label class="form-label text-black " for="contact">Contact</label>
                <div class="d-flex gap-4">

                    <input class="form-control w-50 text-black" name="phone" id="contact" required type="text" placeholder="Phone No." aria-label="name">

                    <input class="form-control w-50 text-black" required id="contact" type="email" placeholder="Email" aria-label="name">
                </div>


            </div>

            <div class="col-12 col-md-12   form-outline mb-2 pb-2" id="category-div">
                <label for="Textarea">Company Desciption or info to be displayed </label>
                <div class="form-floating">
                    <textarea class="form-control text-black" name="companyDescription" placeholder="Leave a comment here" id="Textarea"></textarea>

                </div>

            </div>







            <button type="submit" class="btn btn-warning col-md-6 col-12 mx-auto ">submit</button>


        </form>






    </div>


</section>




<script src="<?php echo base_url('assets/js/admin.js') ?>"></script>




<?= $this->endSection() ?>