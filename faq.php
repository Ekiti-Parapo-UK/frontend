<?php
$mytitle = "FAQ";
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
              <h2 class="title text-white">FAQ</h2>
              <ol class="breadcrumb text-left text-black mt-10">
                <li><a href="./?lnk=home">Home</a></li>
                <li class="active text-gray-silver">FAQs</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Divider: Contact -->
    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div id="accordion1" class="panel-group accordion transparent">
                <?php
                  $j = 11;
                    $faq = $ezzzy->runQuery("SELECT * FROM faqs order by id desc limit 5");
                    foreach ($faq as $row){
                   ?>
              <div class="panel">
                <div class="panel-title"> <a data-parent="#accordion1" data-toggle="collapse" href="#accordion<?php echo $j; ?>" class="<?php if($j == 11){ echo "active"; }?>" aria-expanded="true"> <span class="open-sub"></span> <strong>Q. <?php echo $row['question']; ?></strong></a> </div>
                <div id="accordion<?php echo $j; ?>" class="panel-collapse collapse <?php if($j == 11){ echo "in"; }?>" role="tablist" aria-expanded="true">
                  <div class="panel-content">
                    <p><?php echo $row['answer']; ?></p>
                  </div>
                </div>
              </div>
                <?php
                  $j++;
                    }//end of the foreach for thr faq
                  ?>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!-- divider: what makes us different -->
    <section class="divider parallax layer-overlay overlay-white-9" data-parallax-ratio="0.1" data-bg-img="images/web/tede1.jpg">
      <div class="container">
        <div class="section-content text-center">
          <div class="row">
            <div class="col-md-12">
              <h3 class="mt-0">Did not find your answer?</h3>
              <h2>Just call at <span class="text-theme-color-2">(+234) 80 64980757</span> for emergency service</h2>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- end main-content -->
  
  <!-- Footer -->
  <?php include_once('pages/footer.php');