<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('bootstrap.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('helpers.css') ?>
    <?= $this->Html->css('themes/green.css') ?>

    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <?php echo $this->Html->script('http://code.jquery.com/jquery.min.js'); ?>
</head>
<body>
  <!-- header -->
	<header data-type="parallax" data-speed="4" class="cover" >
		<div class="header-color">
			<div class="header">
				<div class="container">
					<span class="bar hide"></span>
					<img class="logo pull-left" style="width:345px;height:100px;"  src="https://s3-sa-east-1.amazonaws.com/strike7-image/site_assinaturas/logoreta.png" alt="Strike7 Games">
				<!--	<a href="index.html" class="logo pull-left"><i class="ion-flash"></i> STRIKE7 GAMES</a> -->

				<!--	<div class="advertisement advertisement-sm pull-left">
						<a href="index.html"><img src="img/468.png" alt="" /></a>
					</div>
				-->
					<ul class="list-inline pull-right hidden-xs hidden-sm hidden-sm-lg">
						<li><a href="#" class="btn btn-social-icon btn-circle" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#" class="btn btn-social-icon btn-circle" data-toggle="tooltip" data-placement="bottom"  title="Facebook"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#" class="btn btn-social-icon btn-circle" data-toggle="tooltip" data-placement="bottom"  title="Google"><i class="fa fa-google-plus"></i></a></li>
					</ul>
				</div>
			</div>

			<!-- navigation -->
			<nav>
				<div class="container">
					<!--
					<ul>
						<li><a href="index.html">Home</a></li>
					</ul>
					<ul>
						<li><a href="index.html">Estante</a></li>
					</ul>

					<ul>
						<li><a href="index.html">Regras</a></li>
					</ul>
					<ul>
						<li><a href="index.html">Planos Assinaturas</a></li>
					</ul>
					-->

					<!-- search -->
					<div id="search" class="pull-right hidden-sm">
						<form method="post" class="form-inline">
							<input type="text" class="form-control" placeholder="Search..." />
							<button type="submit" class="btn btn-primary no-shadow"><i class="ion-search"></i></button>
						</form>
					</div>
				</div>
			</nav>
			<!-- /.navigation -->
		</div><!-- /.header-color -->
	</header>
	<!-- /.header -->



	<div class="container">
		<!-- wrapper-->
		<div id="wrapper" class="no-padding">

      <?= $this->fetch('content') ?>

		</div><!-- /.wrapper -->
	</div>

    <!-- footer -->
    <footer>
      <div class="container">
        <!--    <div class="widget row"> -->
          <!-- about -->
        <!--  <div class="col-md-4 col-xs-12 no-padding-sm-lg">
            <h4 class="title">About GameForest</h4>
            <div class="text">
              <span>GameForest is a perfect theme for gaming, news and entertainment websites. Built on latest Twitter Bootstrap. Template is available in 4 colors.</span>
              <a href="http://themeforest.net/item/gameforest-online-magazine-html-template/5007730" class="btn btn-success btn-bold">Purchase <i class="fa fa-shopping-cart"></i></a>
            </div>
          </div>
        -->

          <!-- categories -->
          <!--  <div class="col-md-2 col-xs-12 visible-md-block visible-lg-block no-padding-sm-lg">
            <h4 class="title">Categories</h4>
            <ul class="nav">
              <li><a href="#"><i class="fa fa-chevron-right"></i> Playstation 4</a></li>
              <li><a href="#"><i class="fa fa-chevron-right"></i> XBOX ONE</a></li>
              <li><a href="#"><i class="fa fa-chevron-right"></i> PC</a></li>
              <li><a href="#"><i class="fa fa-chevron-right"></i> PS3</a></li>
            </ul>
          </div>
        -->

          <!-- latest tweet -->
         <!--
          <div class="col-md-3 col-xs-12 visible-md-block visible-lg-block no-padding-sm-lg">
            <h4 class="title">Latest Tweet</h4>
            <script src="plugins/twitter/twitter.js"></script>
            <div id="twitter"></div>
          </div>
          -->
          <!-- social buttons -->
          <!--
          <div class="col-md-3 col-xs-12 no-padding-sm-lg">
            <h4 class="title">Follow Us</h4>
            <ul class="list-inline">
              <li><a href="#" class="btn btn-circle btn-social-icon btn-twitter" data-toggle="tooltip" title="Follow us on Twitter"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#" class="btn btn-circle btn-social-icon btn-facebook" data-toggle="tooltip" title="Follow us on Facebook"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#" class="btn btn-circle btn-social-icon btn-google-plus" data-toggle="tooltip" title="Follow us on Google"><i class="fa fa-google-plus"></i></a></li>
              <li><a href="#" class="btn btn-circle btn-social-icon btn-flickr" data-toggle="tooltip" title="Follow us on Flickr"><i class="fa fa-flickr"></i></a></li>
              <li><a href="#" class="btn btn-circle btn-social-icon btn-github" data-toggle="tooltip" title="Follow us on Github"><i class="fa fa-github"></i></a></li>
              <li><a href="#" class="btn btn-circle btn-social-icon btn-pinterest" data-toggle="tooltip" title="Follow us on Pinterest"><i class="fa fa-pinterest"></i></a></li>
            </ul>
            <h4 class="title margin-top-20">Email Newsletters</h4>
            <p class="line-height-16 margin-bottom-15">Subscribe to our newsletter and get notification when new games are available.</p>
            <form method="post" class="margin-top-10 btn-inline">
              <input type="text" class="form-control form-inverse input-lg no-border no-shadow padding-right-40" placeholder="Email..." />
              <button type="submit" class="btn btn-link color-white margin-top-5"><i class="ion-checkmark color-white"></i></button>
            </form>
          </div>
        </div>
      -->
        <!-- /.footer widget -->
        <!--  </div>-->

      <!-- footer bottom -->
      <div class="footer-bottom">
        <div class="container">
          <ul class="pull-left">
            <li>&copy; 2015 STRIKE7. Todos os direitos reservados.</li>
          </ul>
          <ul class="pull-right hidden-xs">
            <li><a href="#">Politica de Privacidade</a></li>
            <li><a href="#">Termos de Uso</a></li>
          </ul>
        </div>
      </div>
      <!-- /.footer bottom -->
    </footer>
    <!-- /.footer -->
    <!-- Javascript -->
    <?= $this->Html->script('bootstrap/js/bootstrap.min.js') ?>
    <?= $this->Html->script('holder/holder.js') ?>
    <?= $this->Html->script('core.js') ?>
</body>
</html>
