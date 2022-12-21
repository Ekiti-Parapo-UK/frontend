<section class="bg-lighter">
      <div class="container pb-60">
        <div class="section-title mb-10">
        <div class="row">
          <div class="col-md-8">
            <h2 class="mt-0 text-uppercase font-28 line-bottom line-height-1">Recent <span class="text-theme-color-2 font-weight-400">PROJECTS</span></h2>
         </div>
        </div>
        </div>
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
              <div class="owl-carousel-4col" data-dots="true">
                <?php
                $event = $ezzzy->runQuery("SELECT * FROM news WHERE ntype='PROJECT' order by id desc limit 5");
                foreach ($event as $row){
               ?>
                <div class="item ">
                  <div class="service-block bg-white">
                      <div class="thumb"> <img alt="featured project (265x195 img)" src="images/image.png" width="265" class="img-fullwidth">
                    <h4 class="text-white mt-0 mb-0"><span class="price">--</span></h4>
                    </div>
                    <div class="content text-left flip p-25 pt-0">
                      <h4 class="line-bottom mb-10"><?php echo $row['title']; ?></h4>
                      <p>
                          <?php echo substr($row['descp'],0,100); ?>
                      </p>
                     <a class="btn btn-dark btn-theme-colored btn-sm text-uppercase mt-10" href="./?lnk=#">view details</a>
                    </div>
                  </div>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>