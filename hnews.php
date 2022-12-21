<section id="blog" class="bg-lighter">
      <div class="container">
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
              <h2 class="text-uppercase text-theme-colored title line-bottom line-height-1 mt-0">Latest <span class="text-theme-color-2 font-weight-400">News</span></h2>
              <div class="owl-carousel-3col owl-nav-top" data-nav="true">
              <?php
               $news = $ezzzy->runQuery("SELECT * FROM news WHERE ntype='NEWS' order by id desc limit 4");
               foreach ($news as $row){
              ?>
              <div class="item">
                <article class="post clearfix maxwidth600 mb-sm-30">
                  <div class="entry-header">
                      <div class="post-thumb thumb"> <img width="330" height="225" src="<?php echo "admin/main/".$row['picture']; ?>" alt="" class="img-responsive img-fullwidth"> </div>
                    <div class="entry-meta meta-absolute text-center pl-15 pr-15">
                    <div class="display-table">
                      <div class="display-table-cell">
                        <ul>
                          <!--<li><a class="text-white" href="#"><i class="fa fa-thumbs-o-up"></i> 265 <br> Likes</a></li>
                          <li class="mt-20"><a class="text-white" href="#"><i class="fa fa-comments-o"></i> 72 <br> comments</a></li>-->
                        </ul>
                      </div>
                    </div>
                    </div>
                  </div>
                  <div class="entry-content bg-white border-1px p-20">
                    <h5 class="entry-title mt-0 pt-0"><a href="./?lnk=news_det&id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></h5>
                    <p class="text-left mb-20 mt-15 font-13"><?php echo substr($row['descp'], 0,100); ?></p>
                    <a class="btn btn-flat btn-dark btn-theme-colored btn-sm pull-left" href="./?lnk=news_det&id=<?php echo $row['id']; ?>">Read more</a>
                    <ul class="list-inline entry-date pull-right font-12 mt-5">
                      <li><a class="text-theme-colored" href="#">Admin |</a></li>
                      <li><span class="text-theme-colored"><?php echo $row['adates']; ?></span></li>
                    </ul>
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
        </div>
      </div>
    </section>