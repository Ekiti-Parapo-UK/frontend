<?php
$mytitle = "Our Fellows";
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
              <h2 class="title text-white">Fellows</h2>
              <ol class="breadcrumb text-left text-black mt-10">
                <li><a href="./?lnk=home">Home</a></li>
                <li class="active text-gray-silver"> Our Fellows</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: Team -->
    <section id="team">
      <div class="container">
        <div class="row mtli-row-clearfix">
            <?php
               $scho = $ezzzy->runQuery("SELECT * FROM dir_fellows");
               foreach ($scho as $row){
              ?>
          <div class="col-xs-12 col-sm-6 col-md-3 sm-text-center mb-30 mb-sm-30">
            <div class="team-members maxwidth400">
              <div class="team-thumb">
                <img class="img-fullwidth" alt="260x230" src="">
              </div>
              <div class="team-bottom-part border-bottom-theme-color-2-2px bg-lighter border-1px text-center p-10 pt-20 pb-10">
                <h4 class="text-uppercase font-raleway font-weight-600 m-0"><a class="text-theme-color-2" href="./?lnk=scholar_det&id=<?php echo $row['id']; ?>"> <?php echo $row['title']. " ".$row['name']; ?></a></h4>
                <h5 class="text-theme-color"><?php echo $row['rank']; ?></h5>
                <ul class="styled-icons icon-sm icon-dark icon-theme-colored">
                  <li><a href="<?php echo $row['facebook']; ?>"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="<?php echo $row['twitter']; ?>"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                  <li><a href="#"><i class="fa fa-skype"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
            <?php
            }
            ?>
          
        </div>
      </div>
    </section>
  </div>
  <!-- end main-content -->
  
  <!-- Footer -->
   <?php include_once('pages/footer.php');