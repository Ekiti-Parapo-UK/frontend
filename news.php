<?php
$mytitle = "News";
include_once('pages/header.php');
$which = $_GET['which'];
$ptitle = "";
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
              <h2 class="title text-white">News</h2>
              <ol class="breadcrumb text-left text-black mt-10">
                <li><a href="./?lnk=home">Home</a></li>
                <li class="active text-gray-silver"><?php echo ucfirst($which); ?> News</li>
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
              $event = "";
              if($which == "today"){
                  $today = date('Y-m-d');
                $event = $ezzzy->runQuery("SELECT * FROM news WHERE ntype='NEWS' and adates='$today' order by id desc");
              }
              else if($which == "month"){
                  $today = date('Y-m');
                  $event = $ezzzy->runQuery("SELECT * FROM news WHERE ntype='NEWS' and adates like '%$today%' order by id desc");                  
              }
              else if($which == "year"){
                  $today = date('Y');
                  $event = $ezzzy->runQuery("SELECT * FROM news WHERE ntype='NEWS' and adates like '%$today%' order by id desc");                  
              }
              else if($which == "older"){
                  $today = date('Y-m-d');
                  $event = $ezzzy->runQuery("SELECT * FROM news WHERE ntype='NEWS' and adates<='$today' order by id desc");                  
              }
              $count = count($event);
              if($count == 0){
                  ?>
              <div class="alert alert-warning" role="alert">No Content</div>
              <?php
              }
               foreach ($event as $row){
                   $dates = explode("-",$row['adates']);
                   $monthName = date("M", strtotime($row['adates']));
              ?>
            <div class="col-sm-6 col-md-3">              
              <article class="post clearfix mb-30 bg-lighter">
                <div class="entry-header">
                  <div class="post-thumb thumb"> 
                      <img width="330" height="225" src="<?php echo "admin/main/".$row['picture']; ?>" alt="" class="img-responsive img-fullwidth"> 
                  </div>                    
                  <div class="entry-date media-left text-center flip bg-theme-colored border-top-theme-color-2-3px pt-5 pr-15 pb-5 pl-15">
                    <ul>
                      <li class="font-16 text-white font-weight-600"><?php echo $dates[2]; ?></li>
                      <li class="font-12 text-white text-uppercase"><?php echo $monthName; ?></li>
                      <li class="font-12 text-white text-uppercase"><?php echo $dates[0]; ?></li>
                    </ul>
                  </div>
                </div>
                <div class="entry-content p-15 pt-10 pb-10">
                  <div class="entry-meta media no-bg no-border mt-0 mb-10">
                    <div class="media-body pl-0">
                      <div class="event-content pull-left flip">
                        <h4 class="entry-title text-white text-uppercase font-weight-600 m-0 mt-5"><a href="./?lnk=news_det&amp;id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></h4>
                      </div>
                    </div>
                  </div>
                    <p class="mt-5"><?php echo substr($row['descp'],0,100); ?>...</p>
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