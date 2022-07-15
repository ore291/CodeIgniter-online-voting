<main>
    <section class="mt-lg-4 bg-dark py-3">
        <div class="container-flui row py-1 ps-1">

            <img src="<?php echo base_url('assets/images/image-3.jpg') ?> " class="col-lg-4 col-12" alt="">

            <div class="col-lg-8 row col-12 mt-2 mt-lg-0">

                <div class="text-capitalize d-flex col-lg-6 col-12 flex-column gap-2">
                    <h2> <?= esc($contest) ?></h2>
                    <span>sponsored by: delta soap</span>
                    <h4>duration:</h4>
                    <span>july 11 - august 12</span>
                    <br>
                    <h4 class="w-75">Share contestestant's url</h4>
                    <div class="btn-group w-25" role="group" aria-label="Basic mixed styles example">
                        <button type="link" href='/' class="btn btn-dark btn-outline-primary"> <i class="bi bi-facebook w-100"></i> </button>
                        <button type="link" href='/' class="btn btn-dark btn-secondary btn-outline-success"> <i class="bi bi-whatsapp"></i> </button>
                        <button type="link" href='/' class="btn btn-dark btn-secondary  btn-outline-primary"> <i class="bi bi-twitter w-100"></i> </button>
                        <button type="link" href='/' class="btn btn-dark btn-secondary  btn-outline-light"> <i class="bi bi-share-fill"></i> </button>
                    </div>




                </div>

                <div class="text-capitalize d-flex col-lg-6 col-12 flex-column gap-2">




                    <h4>price : &#8358; 50 per vote</h4>
                    <h4>Current Stage :Bronze</h4>
                    <h4></h4>


                </div>


            </div>
        </div>
    </section>
    <section class="container mx-auto mt-lg-3 row bg-dar p-5">
        <div class="col-lg-8 d-flex flex-column gap-3">


            <h3>Contestants name : <?= esc($name) ?></h3>
            <h3>Contestants id : <?= esc($name) ?></h3>
            <h3>Contestants category : <?= esc($name) ?></h3>
            <h4>voting percent: </h4>

        </div>
        <div class="col-lg-4 col-12 pt-4 pt-lg-0">

            <img src="<?php echo base_url('assets/images/image-3.jpg') ?>" alt="" class="w-100">
        </div>
    </section>

    <section>

    </section>



    <section class="border-1 border border-dark w-75 py-3 mx-auto">
        <h2 class="text-warning text-center mx-auto text-capitalize "> vote for <?= esc($name) ?></h2>

        <div class="container col-lg-5 flex-column d-flex ">
            <div class="input-group mb-3 form-outline mt-4 container w-7 mx-auto ">
                <input type="number" id="typeNumber" class="form-control bg-transparent text-white col-lg-12 " min="1" placeholder="0" />
                <label class="form-label" for="typeNumber">Select the number of votes you want</label>

            </div>
            <div class="input-group mb-3 form-outline mt-4 container w-5 mx-auto ">


                <input type="email" required id="name" class="form-control bg-transparent text-white text-capitalize " placeholder="enter a valid email" />
                <label class="form-label" for="name">Enter your Email</label>
            </div>
            <div class="input-group mb-3 form-outline mt-4 container w-5 mx-auto flex-row">
                <p> Price per vote : <strong>&#8358; 50</strong></p>



                <!-- 
                <input type="text" id="name" class="form-control bg-transparent text-white  " placeholder="" />
                <label class="form-label" for="name">Enter your name</label> -->
            </div>
            <button class="btn btn-warning mx-lg-auto px-4  justify self-center" type="submit" id='vote'>Vote now </button>



        </div>



    </section>
</main>