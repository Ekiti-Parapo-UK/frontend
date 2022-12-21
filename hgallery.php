<section id="gallery" class="">
    <div class="container">
        <div class="section-content">
            <div class="row">
                <div class="col-md-7 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">
                    <h3 class="text-uppercase title line-bottom mt-0 mb-30"><i class="fa fa-photo text-gray-darkgray mr-10"></i>Photo <span class="text-theme-colored">Gallery</span></h3>
                    <!-- Portfolio Gallery Grid -->

                    <div class="gallery-isotope grid-4 gutter-small clearfix" data-lightbox="gallery">
                        <?php
                        $gallery = $ezzzy->runQuery("SELECT * FROM gallerypic order by id desc limit 12");
                        foreach ($gallery as $row) {
                            ?>
                            <!-- Portfolio Item Start -->
                            <div class="gallery-item">
                                <div class="thumb">
                                    <img alt="project" src="<?php echo "admin/main/" . $row['padd']; ?>" class="img-fullwidth">
                                    <div class="overlay-shade"></div>
                                    <div class="icons-holder">
                                        <div class="icons-holder-inner">
                                            <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                                                <a href="<?php echo "admin/main/" . $row['padd']; ?>"  data-lightbox-gallery="gallery"><i class="fa fa-picture-o"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Portfolio Item End -->
                            <?php
                        }
                        ?>
                    </div>
                    <!-- End Portfolio Gallery Grid -->
                </div>
                <div class="col-md-5 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                    <h3 class="text-uppercase title line-bottom mt-0 mb-30 mt-sm-40"><i class="fa fa-newspaper-o text-gray-darkgray mr-10"></i><span class="text-theme-colored">What people say</span></h3>

                    <div class="bxslider bx-nav-top">
                        <?php
                        $i = 1;
                        $test = $ezzzy->runQuery("SELECT * FROM news WHERE ntype='TESTIMONY' order by id desc");
                        foreach ($test as $row) {
                            $lr = "";
                            if ($i % 2 != 0) {
                                //this is left                            
                                ?>
                                <div class="border-1px border-left-theme-color-2-6px media sm-maxwidth400 p-15 mt-0 mb-15">
                                    <div class="testimonial pt-10">
                                        <div class="thumb pull-left mb-0 mr-0 pr-20">
                                            <img width="75" class="img-circle" alt="100x100" src="images/logo_b.jpg">
                                        </div>
                                        <div class="ml-100 ">
                                            <p><?php echo $row['descp']; ?></p>
                                            <p class="author mt-10">- <span class="text-theme-colored"><?php echo $row['title']; ?></span> <small><em>...</em></small></p>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }//end of the else statement that says this is left
                            else {
                                ?>
                                <div class="border-1px border-right-theme-color-2-6px media sm-maxwidth400 p-15 mt-0 mb-15">
                                    <div class="testimonial pt-10">
                                        <div class="thumb pull-left mb-0 mr-0 pr-20">
                                            <img width="75" class="img-circle" alt="100x100" src="images/logo_b.jpg">
                                        </div>
                                        <div class="ml-100 ">
                                            <p><?php echo $row['descp']; ?></p>
                                            <p class="author mt-10">- <span class="text-theme-colored"><?php echo $row['title']; ?></span> <small><em>...</em></small></p>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }//end of the if statwment that says this is right
                            $i++;
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>