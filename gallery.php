<?php
$mytitle = "Photo Gallery";
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
                        <h2 class="title text-white">Gallery</h2>
                        <ol class="breadcrumb text-left text-black mt-10">
                            <li><a href="./?lnk=home">Home</a></li>
                            <li class="active text-gray-silver">Photo Gallery</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Grid 3 -->
    <section>
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Portfolio Filter -->
                        <div class="portfolio-filter font-alt align-center mb-6 0">
                            <a href="#" class="active" data-filter="*">All</a>
                            <?php
                            $cat = $ezzzy->runQuery("SELECT id,title FROM gallery order by title");
                            foreach ($cat as $rows) {
                                ?>
                            <a href="#<?php echo "gc".$rows['id']; ?>" class="" data-filter=".<?php echo "gc".$rows['id']; ?>"><?php echo $rows['title']; ?></a>
                                <?php
                            }
                            ?>
                        </div>
                        <!-- End Portfolio Filter -->

                        <!-- Portfolio Gallery Grid -->
                        <div id="grid" class="gallery-isotope grid-4 clearfix">
                            <?php
                            $pics = $ezzzy->runQuery("SELECT * FROM gallerypic order by title");
                            foreach ($pics as $row) {
                                $i = 1;
                                ?>
                                <!-- Portfolio Item Start -->
                                <div class="gallery-item">
                                    <div class="thumb">
                                        <img class="img-fullwidth photo" src="<?php echo "admin/main/".$row['padd']; ?>" alt="project">
<!--                                        <div class="hidden">
                                            <a data-rel="prettyPhoto[gallery<?php echo $i; ?>]" title="Sample Title" href="images/gallery/full/2.jpg"></a>
                                            <a data-rel="prettyPhoto[gallery<?php echo $i; ?>]" title="Sample Title" href="images/gallery/full/3.jpg"></a>
                                            <a data-rel="prettyPhoto[gallery<?php echo $i; ?>]" title="Sample Title" href="images/gallery/full/4.jpg"></a>
                                            <a data-rel="prettyPhoto[gallery<?php echo $i; ?>]" title="Sample Title" href="images/gallery/full/5.jpg"></a>
                                            <a data-rel="prettyPhoto[gallery<?php echo $i; ?>]" title="Sample Title" href="images/gallery/full/6.jpg"></a>
                                        </div>-->
                                        <div class="overlay-shade"></div>
                                        <div class="text-holder">
                                            <div class="title text-center"><?php echo $row['title']; ?></div>
                                        </div>
                                        <div class="icons-holder">
                                            <div class="icons-holder-inner">
                                                <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                                                    <a data-rel="prettyPhoto[gallery8]" title="<?php echo $row['title']; ?>" href="<?php echo "admin/main/".$row['padd']; ?>" class="hover-link"></a>
                                                    <a href="#"><i class="fa fa-link"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a data-rel="prettyPhoto[gallery<?php echo $i; ?>]" title="<?php echo $row['title']; ?>" href="<?php echo "admin/main/".$row['padd']; ?>" class="hover-link"></a>
                                </div>
                                <!-- Portfolio Item End -->
                                <?php
                                $i++;
                            }//end of the gallery
                            ?>
                        </div>
                        <!-- End Portfolio Gallery Grid --> 

                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
<!-- end main-content -->

<!-- Footer -->
<?php
include_once('pages/footer.php');
