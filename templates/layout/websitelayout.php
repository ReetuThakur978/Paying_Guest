<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <header>
<section>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <nav class="navbar navbar-expand-lg navbar-light navigation">
          <a class="navbar-brand" href="guest.php">
            <img src="/img/pg.jpg" alt="">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
           aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto main-nav ">
              <li class="nav-item active">
                <!-- <a class="nav-link" href="index.html">Home</a> -->
                <?= $this->Html->link(__('Home'), ['controller'=>'Website','action' => 'home'], ['class' => 'nav-link']) ?>
              </li>
              <li class="nav-item dropdown dropdown-slide">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="">Available for<span><i class="fa fa-angle-down"></i></span>
                </a>

                <!-- Dropdown list -->
                <div class="dropdown-menu">
                  <!-- <a class="dropdown-item" href="dashboard.html"></a> -->
                  <a class="dropdown-item" href="dashboard-my-ads.html">Girls</a>
                  <a class="dropdown-item" href="dashboard-favourite-ads.html">Boys</a>
                  <a class="dropdown-item" href="dashboard-archived-ads.html">Both</a>
                  <!-- <a class="dropdown-item" href="dashboard-pending-ads.html">Dashboard Pending Ads</a> -->
                </div>
              </li>
              <li class="nav-item dropdown dropdown-slide">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Popular area <span><i class="fa fa-angle-down"></i></span>
                </a>
                <!-- Dropdown list -->
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="about-us.html">Sector-37 chandigarh</a>
                  <a class="dropdown-item" href="contact-us.html">Sahibzada Ajit singh Nagar</a>
                  <a class="dropdown-item" href="user-profile.html">Daddu Majra colony</a>
                  <a class="dropdown-item" href="404.html">Shivalik Enclave</a>
                  <a class="dropdown-item" href="package.html">Sector-63 Mohali</a>
                  <a class="dropdown-item" href="single.html">Manimajra</a>
                  <a class="dropdown-item" href="store.html">Sector-22 Chandigarh</a>
                  <a class="dropdown-item" href="single-blog.html">Sector-13 Chandigarh</a>
                  <!-- <a class="dropdown-item" href="blog.html">Blog</a> -->

                </div>
              </li>
              <li class="nav-item dropdown dropdown-slide">
                <?= $this->Html->link(__('Contact us'), ['controller'=>'Website','action' => 'contactus'], ['class' => 'nav-link']) ?>
              </li>
            </ul>
            <ul class="navbar-nav ml-auto mt-10">
              <li class="nav-item">
                <!-- <a class="nav-link login-button" href="login.php">Login</a> -->
                <?php if(!$email): ?>
                <?= $this->Html->link(__('Login'), ['controller'=>'Website','action' => 'login'], ['class' => 'nav-link login-button']) ?>
              <?php endif; ?>
              </li>
              <li class="nav-item">
                <!-- <a class="nav-link text-white add-button" href="register.php">Registeration Page</a> -->
                <?php if(!$email): ?>
                <?= $this->Html->link(__('Registeration Page'), ['controller'=>'Users','action' => 'register'], ['class' => 'nav-link text-white add-button']) ?>
              <?php endif; ?> 
              </li>
<li>  
  <h6>Welcome:-
<?php
$name = $this->getRequest()->getSession()->read('Auth.firstname');
echo $name;
?></h6> 
</li>&nbsp

              <li class="nav-item">
                 
<?= $this->html->link(__('Edit Profile') ,['action'=>'userprofile'],['class'=>'btn btn-primary   fa fa-user-o d-block']); ?></li>&nbsp&nbsp
                <li>
                <?php if($email): ?>
                <?= $this->Html->link(__('Logout'), ['controller'=>'Website','action' => 'logout'], ['class' => 'nav-link text-white add-button']) ?>
              <?php endif; ?> 
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </div>
</section></header>

    <script
              src="https://code.jquery.com/jquery-3.3.1.js"
              integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
              crossorigin="anonymous">
    </script>
    <?= $this->Html->meta('icon') ?>
    <!-- link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.css"> -->
    
    <?= $this->Html->css('style.css') ?>

    


  <?= $this->Html->css('plugins/bootstrap/css/bootstrap.min.css') ?>
  <?= $this->Html->css('plugins/bootstrap/css/bootstrap-slider.css') ?>
  <?= $this->Html->css('plugins/font-awesome/css/font-awesome.min.css') ?>
  <?= $this->Html->css('plugins/slick-carousel/slick/slick.css') ?>
  <?= $this->Html->css('plugins/slick-carousel/slick/slick-theme.css') ?>
  <?= $this->Html->css('plugins/fancybox/jquery.fancybox.pack.css') ?>
  <?= $this->Html->css('plugins/jquery-nice-select/css/nice-select.css') ?>


  <?= $this->Html->script('plugins/jQuery/jquery.min.js') ?>
  <?= $this->Html->script('plugins/bootstrap/js/popper.min.js') ?>
  <?= $this->Html->script('plugins/bootstrap/js/bootstrap.min.js') ?>
  <?= $this->Html->script('plugins/bootstrap/js/bootstrap-slider.js') ?>

  <?= $this->Html->script('plugins/tether/js/tether.min.js') ?>
  <?= $this->Html->script('plugins/raty/jquery.raty-fa.js') ?>
  <?= $this->Html->script('plugins/slick-carousel/slick/slick.min.js') ?>
  <?= $this->Html->script('plugins/jquery-nice-select/js/jquery.nice-select.min.js') ?>
  <?= $this->Html->script('plugins/fancybox/jquery.fancybox.pack.js') ?>
  <?= $this->Html->script('plugins/smoothscroll/SmoothScroll.min.js') ?>

 
  <?= $this->Html->script('script.js') ?>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.css">

   

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>

    <!-- <nav class="top-nav">
        <div class="top-nav-title">
            <a href="/"><span>Cake</span>PHP</a>
        </div> -->
        <!-- <div class="top-nav-links">
            <a target="_blank" href="https://book.cakephp.org/4/">Documentation</a>
            <a target="_blank" href="https://api.cakephp.org/4/">API</a>
        </div> -->
   <!--  </nav> -->

    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <br>
   <?= $this->element('footer') ?>

</body>
</html>
