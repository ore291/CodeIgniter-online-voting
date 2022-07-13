<main class="main-banner">

    <section>
        <div class="mt- p-5 bg-transparent text-white text-center rounded">
            <h1 class="text-warning text-center"> Current Contests</h1>
            <p class="col-lg-6 mx-auto" style="font-size: 25px;">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reprehenderit harum nulla quaerat maiores similique, est placeat omnis modi esse voluptatem adipisci deleniti saepe perspiciatis quam ea perferendis neque aut exercitationem.
            </p>
        </div>


    </section>





</main>
<h1 class="text-center text-warning text-capitalize my-5 my-lg-1">view contest by categories</h1>
<section class="mt-lg-5">
    <div class="m-4">
        <ul class="nav nav-tabs text-white d-flex justify-content-evenly" id="myTab">
            <li class="nav-item">
                <a href="#home" class="nav-link active text-secondary" data-bs-toggle="tab">Most Handsome</a>
            </li>
            <li class="nav-item">
                <a href="#hom" class="nav-link  text-secondary" data-bs-toggle="tab">Home</a>
            </li>
            <li class="nav-item">
                <a href="#ho" class="nav-link  text-secondary" data-bs-toggle="tab">Home</a>
            </li>
            <li class="nav-item">
                <a href="#h" class="nav-link  text-secondary" data-bs-toggle="tab">Home</a>
            </li>
            <li class="nav-item">
                <a href="#profile" class="nav-link text-secondary" data-bs-toggle="tab">Profile</a>
            </li>
            <li class="nav-item">
                <a href="#messages" class="nav-link text-secondary" data-bs-toggle="tab">Messages</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="home">
                <?php $posts = ['title 1', 'title 2', 'title 3', 'title 4', 'title 5', 'title 6', 'title7']; ?>

                <div class="grid">
                    <?php foreach ($posts as $post) : ?>
                        <div class="w-100 ">
                            <div class="card mb-3 bg-dark  mx-auto mb-lg-1 mt-2" style="width: 25rem;">
                                <img src="<?php echo base_url('assets/images/image-3.jpg') ?>" class="card-img-top p-2" alt="...">
                                <div class="card-body p-">
                                    <h5 class="card-title"><?= $post ?></h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <p>11th july - 12th august</p>
                                    <a href="contests/<?= $post ?>" class="btn btn-warning">View contest</a>
                                </div>
                            </div>
                        </div>


                    <?php endforeach; ?>
                </div>
            </div>
            <div class="tab-pane fade" id="profile">
                <h4 class="mt-2">Profile tab content</h4>
                <p>Vestibulum nec erat eu nulla rhoncus fringilla ut non neque. Vivamus nibh urna, ornare id gravida ut, mollis a magna. Aliquam porttitor condimentum nisi, eu viverra ipsum porta ut. Nam hendrerit bibendum turpis, sed molestie mi fermentum id. Aenean volutpat velit sem. Sed consequat ante in rutrum convallis. Nunc facilisis leo at faucibus adipiscing.</p>
            </div>
            <div class="tab-pane fade" id="messages">
                <h4 class="mt-2">Messages tab content</h4>
                <p>Donec vel placerat quam, ut euismod risus. Sed a mi suscipit, elementum sem a, hendrerit velit. Donec at erat magna. Sed dignissim orci nec eleifend egestas. Donec eget mi consequat massa vestibulum laoreet. Mauris et ultrices nulla, malesuada volutpat ante. Fusce ut orci lorem. Donec molestie libero in tempus imperdiet. Cum sociis natoque penatibus et magnis.</p>
            </div>
        </div>
    </div>
</section>