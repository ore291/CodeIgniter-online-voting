<?= $this->extend('Layout/main') ?>


<?= $this->section('content') ?>



<section id="contact">

  <h1 class="section-header text-warning">Contact Us</h1>
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

  <div class="contact-wrapper">

    <!-- Left contact page -->



    <form id="contact-form" class="contact-page form-horizontal" action="<?= base_url('/user/sendContactUs') ?>" method="post" role="form">

      <div class="form-group">
        <div class="col-sm-12">
          <input type="text" class="contact-name-1 form-control" id="name" placeholder="NAME" name="name" value="" required>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-12">
          <input type="email" class="contact-email-1 form-control" id="email" placeholder="EMAIL" name="email" value="" required>
        </div>
      </div>

      <textarea class="form-control" rows="10" placeholder="MESSAGE" name="message" required></textarea>

      <button class="btn btn-primary send-button" id="submit" type="submit" value="SEND">
        <div class="alt-send-button">
          <i class="fa fa-paper-plane"></i><span class="send-text">SEND</span>
        </div>

      </button>

    </form>

    <!-- Left contact page -->

    <div class="direct-contact-container">

      <ul class="contact-list">
        <li class="list-item"><i class="fa fa-map-marker fa-2x"><span class="contact-text place">City, State</span></i></li>

        <li class="list-item"><i class="fa fa-phone fa-2x"><span class="contact-text phone"><a title="Give me a call">+2348106442732</a></span></i></li>

        <li class="list-item"><i class="fa fa-envelope fa-2x"><span class="contact-text gmail"><a href="mailto:support@faceofmoa.com" title="Send me an email">support@faceofmoa.com</a></span></i></li>

      </ul>

      <hr>
      <ul class="social-media-list">
        <li><a href="#" target="_blank" class="contact-icon">
            <i class="fa fa-whatsapp" aria-hidden="true"></i></a>
        </li>
        <li><a href="#" target="_blank" class="contact-icon">
            <i class="fa fa-facebook" aria-hidden="true"></i></a>
        </li>
        <li><a href="#" target="_blank" class="contact-icon">
            <i class="fa fa-twitter" aria-hidden="true"></i></a>
        </li>
        <li><a href="#" target="_blank" class="contact-icon">
            <i class="fa fa-instagram" aria-hidden="true"></i></a>
        </li>
      </ul>
      <hr>



    </div>

  </div>

</section>







<?= $this->endSection() ?>