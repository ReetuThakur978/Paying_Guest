<?php

//$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    
    <?= $this->element('header')?>
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
