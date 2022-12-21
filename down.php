<?php
$mytitle = "Downloads";
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

    <!-- Section: News & Blog -->
    <section id="news">
      <div class="container">
        <div class="section-content">
          <div class="row">
              <?php
               $blog = $ezzzy->runQuery("SELECT * FROM news WHERE ntype='FILE' order by id desc");
               foreach ($blog as $row){
                   $dates = explode("-",$row['adates']);
                   $monthName = date("M", strtotime($row['adates']));
              ?>
            <div class="col-sm-6 col-md-4">
              <article class="post clearfix mb-30 mb-sm-30">
                <div class="entry-header">
                  <div class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                      <a href="<?php echo "admin/main/".$row['picture']; ?>" target="_blank"><img src="images/doc.png" width="100" title="Click to Download document" height="100" /></a>
                    </div>
                </div>
                <div class="entry-content p-20 pr-10 bg-lighter">
                  <div class="entry-meta media mt-0 no-bg no-border">
                    <!--<div class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                      <ul>
                        <li class="font-16 text-white font-weight-600 border-bottom"><?php echo $dates[2]; ?></li>
                        <li class="font-12 text-white text-uppercase"><?php echo $monthName.",".$dates[0]; ?></li>
                      </ul>
                    </div>-->
                    <div class="media-body pl-15">
                      <div class="event-content pull-left flip">
                        <h4 class="entry-title text-dark text-uppercase m-0 mt-5"><?php echo $row['title']; ?></h4>
                        <span class="mb-10 text-gray-darkgray mr-10 font-13"><a href="<?php echo "admin/main/".$row['picture']; ?>" target="_blank"><i class="fa fa-download mr-5 text-theme-colored"></i> Download</a></span>                       
                        <!--<span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-heart-o mr-5 text-theme-colored"></i> 895 Likes</span>-->
                      </div>
                    </div>
                  </div>
                    <p class="mt-10"><?php echo $row['descp']; //substr($row['descp'], 0,100); ?></p>
                  <!--<a href="./?lnk=blog_det&amp;id=<?php echo $row['id']; ?>" class="btn-read-more">Read more</a>-->
                  <div class="clearfix"></div>
                </div>
              </article>
            </div>
              <?php
              }
              ?>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- end main-content -->
  
  <!-- Footer -->
  <?php include_once('pages/footer.php');