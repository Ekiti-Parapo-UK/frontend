<?php
$mytitle = "Oriki Ilu Tede";
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
              <h2 class="title text-white"><?php echo $mytitle; ?></h2>
              <ol class="breadcrumb text-left text-black mt-10">
                <li><a href="./?lnk=home">Home</a></li>
                <li class="active text-gray-silver"><?php echo $mytitle; ?></li>
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
              <h6 class="letter-space-4 text-gray-darkgray text-uppercase mt-0 mb-0">Oriki</h6>
              <h2 class="text-uppercase font-weight-600 mt-0 font-28 line-bottom">Ilu Tede</h2>
              <p><?php echo $ezzzy->getval("page","oriki","siteinfo","detail"); ?></p>
            </div>
            <div class="col-md-6">
              <div class="video-popup">                
                  <audio controls autoplay loop>
                    <source src="admin/main/uploads/Oriki_ilu_tede.m4a" type="audio/ogg">
                    <source src="admin/main/uploads/Oriki_ilu_tede.m4a" type="audio/m4a">
                  Your browser does not support the audio element.
                  </audio>
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