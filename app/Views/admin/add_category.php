<?= $this->extend('Layout/admin_layout') ?>

<?= $this->section('content') ?>




<section class="mt-lg-2">

    <div class="container shadow shadow-sm p-4 col-lg-10">


        <h2 class="mb-5">Add Category</h2>
        <form class="row gx-3 gy-2 align-items-center text-black">
            <div class="col-12 col-md-12 form-outline mb-2 pb-2" id="category-div">

                <label class="form-label text-black" for="category-title">Category Title</label>
                <input class="form-control text-black" id="category-title" type="text" placeholder="category title" aria-label="title">

            </div>
            <div class="col-12 col-md-12 mb-2 pb-2">
                <label class="form-label text-black" for="picture">Category Picture</label>
                <div class="d-flex gap-4 ">

                    <input class="form-control w-50 " required name="picture" accept="image/png, image/gif, image/jpeg" id="picture" type="file" />

                    <select class="form-select text-black text-capitalize w-50" name="category" id="category" placeholder="">
                        <option value="" disabled selected="selected">Choose allowed gender </option>
                        <option>male</option>
                        <option>female</option>
                        <option>all</option>
                    </select>
                </div>


            </div>

            <div class="col-12 col-md-12   form-outline mb-2 pb-2" id="category-div">
                <label for="Textarea">category Desciption </label>
                <div class="form-floating">
                    <textarea class="form-control text-black" name="categoryDescription" placeholder="Leave a comment here" id="Textarea"></textarea>

                </div>

            </div>




            <button type="submit" class="btn btn-warning col-md-6 col-12 mx-auto ">submit</button>


        </form>

    </div>

</section>















<script src="<?php echo base_url('assets/js/admin.js') ?>"></script>




<?= $this->endSection() ?>