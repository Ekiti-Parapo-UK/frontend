<section>
    <div class="container pb-0">
        <div class="section-title mb-10">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="mt-0 text-uppercase font-28 line-bottom line-height-1">Our <span class="text-theme-color-2 font-weight-400">Administrators</span></h2>
                </div>
            </div>
        </div>
        <div class="row mtli-row-clearfix">
            <div class="col-md-12">
                <div class="owl-carousel-4col">
                    <?php
                    $scho = $ezzzy->runQuery("SELECT * FROM dir_scholars");
                    foreach ($scho as $row) {
                        ?>
                        <div class="item">
                            <div class="team-members maxwidth400">
                                <div class="team-thumb">
                                    <img class="img-fullwidth" alt="260x230" src="">
                                </div>
                                <div class="team-bottom-part border-bottom-theme-color-2-2px bg-lighter border-1px text-center p-10 pt-20 pb-10">
                                    <h4 class="text-uppercase font-raleway font-weight-600 m-0"><a class="text-theme-color-2" href="./?lnk=scholar_det&id=<?php echo $row['id']; ?>"> <?php echo $row['title'] . " " . $row['name']; ?></a></h4>
                                    <h5 class="text-theme-color"><?php echo $row['rank']; ?></h5>
                                    <ul class="styled-icons icon-sm icon-dark icon-theme-colored">
                                        <li><a href="<?php echo $row['facebook']; ?>"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="<?php echo $row['twitter']; ?>"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fa fa-skype"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>