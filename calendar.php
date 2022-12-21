<?php
$mytitle = "Calender";
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
              <h2 class="title text-white">Calender</h2>
              <ol class="breadcrumb text-left text-black mt-10">
                <li><a href="./?lnk=home">Home</a></li>
                <li class="active text-gray-silver">Calendar</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!-- divider: what makes us different -->
    <section class="divider bg-lightest">
      <div class="container">
        <div class="section-content text-center">
          <div class="row">
            <div class="col-md-12">
              <div id="full-event-calendar"></div>
              <!-- JS | Calendar Event Data -->
              <script type="text/javascript">
                  var calendarEvents= [
                      <?php
                        $event = $ezzzy->runQuery("SELECT * FROM news WHERE ntype='EVENT' order by id desc limit 4");
                        foreach ($event as $row){
                       ?>
                    {
                        title: '<?php echo $row['title']; ?>',
                        url: 'http://#/?lnk=eventdet&id=',
                        start: '<?php echo $row['dates']; ?>'
                    },
                            <?php
                        }
                            ?>                    
                  ];
              </script>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- end main-content -->
  
  <!-- Footer -->
  <?php include_once('pages/footer.php');