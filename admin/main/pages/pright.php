<div class="col-md-3 col-lg-4 dash-right">
    <div class="row">
        <?php
        if ($module == "home") {
            ?>
            <div class="col-sm-5 col-md-12 col-lg-6">
                <div class="panel panel-inverse list-announcement">
                    <div class="panel-heading">
                        <h4 class="panel-title">Options</h4>
                    </div>

                    <div class="panel-footer">
                        <a href="#" class="btn btn-default-active active btn-quirk btn-block">Other Income</a>
                        <a href="#" class="btn btn-default-active btn-quirk btn-block">Expenses</a>
                        <a href="#" class="btn btn-default-active btn-quirk btn-block">Profit &amp; Loss</a>
                        <a href="#" class="btn btn-default-active btn-quirk btn-block"><i class="fa fa-cog"></i> Bank Accounts</a>
                    </div>
                </div>
            </div><!-- col-md-12 -->
            <?php
        } else if($module == "session"){
            ?>
            <div class="col-sm-5 col-md-12 col-lg-6">
                <div class="panel panel-inverse list-announcement">
                    <div class="panel-heading">
                        <h4 class="panel-title">Options</h4>
                    </div>

                    <div class="panel-footer">
                        <a href="./?lnk=server_session" class="btn btn-default-active active btn-quirk btn-block">Sessions</a>
                        <a href="./?lnk=server_session_semester" class="btn btn-default-active btn-quirk btn-block">Semesters</a>
                        <a href="./?lnk=server_session_batch" class="btn btn-default-active btn-quirk btn-block">Batches</a>
                    </div>
                </div>
            </div><!-- col-md-12 -->
            <?php
        } else if($module == "program"){
            ?>
            <div class="col-sm-5 col-md-12 col-lg-6">
                <div class="panel panel-inverse list-announcement">
                    <div class="panel-heading">
                        <h4 class="panel-title">Options</h4>
                    </div>

                    <div class="panel-footer">
                        <a href="./?lnk=server_session" class="btn btn-default-active active btn-quirk btn-block">Program Categories</a>
                        <a href="./?lnk=server_college" class="btn btn-default-active btn-quirk btn-block">Colleges</a>
                        <a href="./?lnk=server_program_faculty" class="btn btn-default-active btn-quirk btn-block">Faculties</a>
                        <a href="./?lnk=server_faculty_dept" class="btn btn-default-active btn-quirk btn-block">Departments</a>
                        <a href="./?lnk=server_dept_prog" class="btn btn-default-active btn-quirk btn-block">Programmes</a>
                        <a href="./?lnk=server_dept_course" class="btn btn-default-active btn-quirk btn-block">Courses</a>
                    </div>
                </div>
            </div><!-- col-md-12 -->
            <?php
        } else if($module == "exam"){
            ?>
            <div class="col-sm-5 col-md-12 col-lg-6">
                <div class="panel panel-inverse list-announcement">
                    <div class="panel-heading">
                        <h4 class="panel-title">Options</h4>
                    </div>

                    <div class="panel-footer">
                        <a href="./?lnk=exm_recordsc" class="btn btn-default-active active btn-quirk btn-block">Record Scores</a>
                        <a href="./?lnk=exm_checkr" class="btn btn-default-active btn-quirk btn-block">Check Results</a>
                    </div>
                </div>
            </div><!-- col-md-12 -->
            <?php
        } else if($module == "bursary"){
            ?>
            <div class="col-sm-5 col-md-12 col-lg-6">
                <div class="panel panel-inverse list-announcement">
                    <div class="panel-heading">
                        <h4 class="panel-title">Options</h4>
                    </div>

                    <div class="panel-footer">
                        <a href="./?lnk=bur_payrec" class="btn btn-default-active active btn-quirk btn-block">Payment Records</a>
                    </div>
                </div>
            </div><!-- col-md-12 -->
            <?php
        } else if($module == "news"){
            ?>
            <div class="col-sm-5 col-md-12 col-lg-6">
                <div class="panel panel-inverse list-announcement">
                    <div class="panel-heading">
                        <h4 class="panel-title">Options</h4>
                    </div>

                    <div class="panel-footer">
                        <a href="./?lnk=server_news" class="btn btn-default-active active btn-quirk btn-block">News</a>
                    </div>
                </div>
            </div><!-- col-md-12 -->
            <?php
        }
        ?>

        <div class="col-sm-5 col-md-12 col-lg-6">
            <div class="panel panel-primary list-announcement">
                <div class="panel-heading">
                    <h4 class="panel-title">Latest Announcements</h4>
                </div>
                <div class="panel-body">
                    <ul class="list-unstyled mb20">
                        <?php
                        $tnews = $ezzzy->runQuery("SELECT * FROM news where ntype='NEWS' order by id desc limit 3");
                        foreach ($tnews as $thnews) {
                            ?>
                            <li>
                                <a href="#"><?php echo $thnews['title']; ?></a>
                                <small><?php echo $thnews['adates']; ?> <a href="#">...</a></small>
                            </li>
                            <?php
                        }//end of the if statement that brings out the news and events
                        ?>
                    </ul>
                </div>
                <div class="panel-footer">
                    <a href="./?lnk=server_news" class="btn btn-primary btn-block">View More Announcements <i class="fa fa-arrow-right"></i></a>
                </div>
            </div>
        </div><!-- col-md-12 -->
    </div><!-- row -->

    <!--<div class="row">
        <div class="col-sm-5 col-md-12 col-lg-6">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h4 class="panel-title">Recent User Activity</h4>
                </div>
                <div class="panel-body">
                    <ul class="media-list user-list">
                        <?php
                        //$tact = $ezzzy->getallresult("_servers");
                        //foreach($tact as $thact){
                        ?>
                        <li class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object img-circle" src="pics/user.png" alt="">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading nomargin"><a href="#">Super Admin</a></h4>
                                <?php //echo $thact['activity']; ?> <a href="#">Today</a>
                                <small class="date"><i class="glyphicon glyphicon-time"></i> <?php //echo $thact['dates'];  ?></small>
                            </div>
                        </li>
                        <?php
                        //}//end of the if statement that brings out the news and events
                        ?>
                    </ul>
                </div>
            </div><!-- panel --
        </div>            
    </div><!-- row -->

</div><!-- col-md-3 -->