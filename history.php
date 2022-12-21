<?php
$mytitle = "Our History";
include_once('pages/header.php');
?>
  <!-- Start main-content -->
  <div class="main-content">

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="images/web/tede2.jpg">
      <div class="container pt-70 pb-20">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
              <h2 class="title text-white"><?php echo $mytitle;?></h2>
              <ol class="breadcrumb text-left text-black mt-10">
                <li><a href="./?lnk=home">Home</a></li>
                <li class="active text-gray-silver"><?php echo $mytitle;?></li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: About -->
    <section class="">
      <div class="container">
        <div class="section-content">
          <div class="row">
            <div class="col-md-6">
              <h6 class="letter-space-4 text-gray-darkgray text-uppercase mt-0 mb-0">All About</h6>
              <h2 class="text-uppercase font-weight-600 mt-0 font-28 line-bottom">Tede</h2>
              <p><?php echo $ezzzy->getval("page","history","siteinfo","detail"); ?></p>
              <a class="btn btn-theme-colored btn-flat btn-lg mt-10 mb-sm-30" href="#">Know More →</a>
            </div>
            <div class="col-md-6">
              <div class="video-popup">                
                <!--<a href="https://www.youtube.com/watch?v=pW1uVUg5wXM" data-lightbox-gallery="youtube-video" title="Video">
                  <img alt="" src="http://placehold.it/555x330" class="img-responsive img-fullwidth">
                </a>-->
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Section: Services -->
    <?php include_once('hblog.php'); ?>

    <!-- Divider: Funfact -->
    <?php include_once('hstat.php'); ?>

    <!-- Section: Why Choose Us -->
    <?php include_once('hevent.php'); ?>

    <!-- Divider: Call To Action -->
  
  </div>
  <!-- end main-content -->
  
  <!-- Footer -->
  <?php include_once('pages/footer.php');