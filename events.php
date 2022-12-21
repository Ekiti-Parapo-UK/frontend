<?php
$mytitle = "Events";
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
              <h2 class="title text-white">Events</h2>
              <ol class="breadcrumb text-left text-black mt-10">
                <li><a href="./?lnk=home">Home</a></li>
                <li class="active text-gray-silver"><?php echo ucfirst($which); ?> Events</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: Upcoming Events -->
    <section id="upcoming-events" class="divider parallax layer-overlay overlay-white-8" data-bg-img="images/web/tede1.jpg">
      <div class="container pb-50 pt-80">
        <div class="section-content">
          <div class="row">
              <?php
              $event = "";
              if($which == "today"){
                  $today = date('Y-m-d');
                $event = $ezzzy->runQuery("SELECT * FROM news WHERE ntype='EVENT' and dates='$today' order by id desc");
              }
              else if($which == "upcoming"){
                  $today = date('Y-m-d');
                  $event = $ezzzy->runQuery("SELECT * FROM news WHERE ntype='EVENT' and dates>='$today' order by id desc");                  
              }
              else if($which == "past"){
                  $today = date('Y-m-d');
                  $event = $ezzzy->runQuery("SELECT * FROM news WHERE ntype='EVENT' and dates<'$today' order by id desc");                  
              }
              $count = count($event);
              if($count == 0){
                  ?>
              <div class="alert alert-warning" role="alert">No Event</div>
              <?php
              }
               foreach ($event as $row){
              ?>
            <div class="col-sm-6 col-md-4 col-lg-4">
              <div class="schedule-box maxwidth500 bg-light mb-30">
                <div class="thumb">
                    <img class="img-thumbnail" width="220" height="160" alt="" src="<?php echo "admin/main/".$row['picture']; ?>">
                  <div class="overlay">
                    <a href="#"><i class="fa fa-calendar mr-5"></i></a>
                  </div>
                </div>
                <div class="schedule-details clearfix p-15 pt-10">
                    <h5 class="font-16 title"><a href="./?lnk=event_det&amp;id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></h5>
                  <ul class="list-inline font-11 mb-20">
                    <li><i class="fa fa-calendar mr-5"></i> DEC 31/2019</li>
                    <li><i class="fa fa-map-marker mr-5"></i> <?php echo $row['venue']; ?></li>
                  </ul>
                  <p><?php echo substr($row['descp'],0,100); ?></p>
                  <div class="mt-10">
                   <a class="btn btn-dark btn-theme-colored btn-sm mt-10" href="./?lnk=event_det&amp;id=<?php echo $row['id']; ?>">Register</a>
                   <a href="./?lnk=event_det&amp;id=<?php echo $row['id']; ?>" class="btn btn-dark btn-sm mt-10">Details</a>
                  </div>
                </div>
              </div>
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