<?php
$mytitle = "Welcome";
include_once('pages/header.php');
?>
  
  <!-- Start main-content -->
  <div class="main-content">

    <!-- Section: home -->
    <?php include_once('hslider.php'); ?>

    <!-- Section: home-boxes -->
    <?php include_once('vmg.php'); ?>

    <!-- Section: About -->
    <?php include_once('habout.php'); ?>

    <!-- Section: COURSES -->
    <?php include_once('hcourses.php'); ?>

    <!-- Divider: Funfact -->
    <?php include_once('hstat.php'); ?>

     <!-- Section: team -->
    <?php include_once('hteachers.php'); ?>

    <!-- Section: Gallery -->
    <?php include_once('hgallery.php'); ?>

    <!-- Diver: Video Background  -->
    <!--<section class="divider parallax layer-overlay overlay-theme-colored-9" data-bg-img="http://placehold.it/1920x1280" data-parallax-ratio="0.7">
      <div class="container pt-120 pb-120"> 
        <!-- Section Content --
        <div class="section-content">
          <div class="row">
            <div class="col-md-12 text-center">
              <h3 class="text-white text-uppercase font-30 font-weight-600 mt-0 mb-20">Watch Our Latest Project</h3>
              <a href="https://www.youtube.com/watch?v=pW1uVUg5wXM" data-lightbox-gallery="youtube-video"><i class="fa fa-play-circle text-theme-color-2 font-72"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>-->

    <!-- Section: Why Choose Us -->
    <?php include_once('hevent.php'); ?>

    <!-- Section: blog -->
    <?php include_once('hnews.php'); ?>

    <!-- Divider: Call To Action -->
    <section class="bg-theme-color-2">
      <div class="container pt-10 pb-20">
        <div class="row">
          <div class="call-to-action">
            <div class="col-md-9">
              <h3 class="mt-5 text-white font-weight-600">Ekiti Parapo</h3>
            </div>
            <div class="col-md-3 text-right flip sm-text-center"> 
              <a class="btn btn-flat btn-theme-colored btn-lg mt-5" href="./?lnk=about">Read More<i class="fa fa-angle-double-right font-16 ml-10"></i></a>  
            </div>
          </div>
        </div>
      </div>
    </section>
  <!-- end main-content -->
  </div>

  <!-- Footer -->
  <?php include_once('pages/footer.php');