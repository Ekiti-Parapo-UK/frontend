<section id="event" class="">
      <div class="container pb-50">
        <div class="section-content">
          <div class="row">
            <div class="col-md-6">
              <h2 class="text-uppercase line-bottom mt-0 line-height-1"><i class="fa fa-calendar mr-10"></i>Upcoming <span class="text-theme-color-2">Events</span></h2>
              <?php
               $event = $ezzzy->runQuery("SELECT * FROM news WHERE ntype='EVENT' order by id desc limit 3");
               foreach ($event as $row){
              ?>
              <article class="post media-post clearfix pb-0 mb-10">
                  <a href="./?lnk=event_det&amp;id=<?php echo $row['id']; ?>" class="post-thumb mr-20"><img width="120" height="120" alt="" src="<?php echo "admin/main/".$row['picture']; ?>"></a>
                <div class="post-right">
                  <h4 class="mt-0 mb-5"><a href="./?lnk=event_det&amp;id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></h4>
                  <ul class="list-inline font-12 mb-5">
                    <li class="pr-0"><i class="fa fa-calendar mr-5"></i> June 26, 2016 |</li>
                    <li class="pl-5"><i class="fa fa-map-marker mr-5"></i><?php echo $row['venue']; ?></li>
                  </ul>
                  <p class="mb-0 font-13"><?php echo substr($row['descp'],0,100); ?></p>
                  <a class="text-theme-colored font-13" href="./?lnk=event_det&amp;id=<?php echo $row['id']; ?>">Read More →</a>
                </div>
              </article>
               <?php } ?>
              
            </div>
            <div class="col-md-6">
              <h2 class="line-bottom mt-0 line-height-1">FAQ<span class="text-theme-color-2">s?</span></h2>
              <p class="mb-10">Find answers to some of your questions</p>
              <div id="accordion1" class="panel-group accordion">
                  <?php
                  $j = 11;
                    $faq = $ezzzy->runQuery("SELECT * FROM faqs order by id desc limit 5");
                    foreach ($faq as $row){
                   ?>
                <div class="panel">
                  <div class="panel-title"> <a class="<?php if($j == 11){ echo "active"; }?>" data-parent="#accordion1" data-toggle="collapse" href="#accordion<?php echo $j; ?>" aria-expanded="true"> <span class="open-sub"></span> <?php echo $row['question']; ?></a> </div>
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
      </div>
    </section>