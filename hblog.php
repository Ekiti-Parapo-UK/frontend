<section id="services" class="bg-lighter">
      <div class="container">
        <div class="section-title">
          <div class="row">
            <div class="col-md-12">
              <h2 class="text-uppercase text-theme-colored title line-bottom">From <span class="text-theme-color-2 font-weight-400">Our Blog</span></h2>
            </div>
          </div>
        </div>
        <div class="row mtli-row-clearfix">
            <?php
               $blog = $ezzzy->runQuery("SELECT * FROM news WHERE ntype='BLOG' order by id desc limit 6");
               foreach ($blog as $row){
              ?>
          <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="icon-box iconbox-theme-colored bg-white p-15 mb-30 border-1px">
              <a class="icon icon-dark border-left-theme-color-2-3px pull-left flip mb-0 mr-0 mt-5" href="./?lnk=blog_det&amp;id=<?php echo $row['id']; ?>">
                <i class="pe-7s-scissors"></i>
              </a>
              <div class="icon-box-details">
                  <h4 class="icon-box-title font-16 font-weight-600 m-0 mb-5"><a href="./?lnk=blog_det&amp;id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></h4>
                <p class="text-gray font-13 mb-0"><?php echo substr($row['descp'],0,70); ?></p>
              </div>
            </div>    
          </div>
            <?php
               }
            ?>
          
        </div>
      </div>
    </section>