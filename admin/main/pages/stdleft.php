<div class="tab-content">

        <!-- ################# MAIN MENU ################### -->

        <div class="tab-pane active" id="mainmenu">
          <h5 class="sidebar-title">Favorites</h5>
          <ul class="nav nav-pills nav-stacked nav-quirk">
            <li class="active"><a href="./?lnk=dashboard_std"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
          </ul>

          <h5 class="sidebar-title">Main Menu</h5>
          <ul class="nav nav-pills nav-stacked nav-quirk">
            <li class="nav-parent <?php if(isset($module) && $module == "payment"){ echo "active"; }?>"><a href="#"><i class="fa fa-money"></i> <span>PAYMENT ACTIVITIES</span></a>
              <ul class="children">
                <li class="<?php if(isset($shet) && $shet == "payf"){ echo "active"; } ?>"><a href="./?lnk=dashboard_std&amp;action=payfees">Pay Fees</a></li>
                <li class="<?php if(isset($shet) && $shet == "pays"){ echo "active"; } ?>"><a href="./?lnk=dashboard_std&amp;action=pstatus">Payment Status</a></li>
              </ul>
            </li>
            <li class="<?php if(isset($shet) && $shet == "results"){ echo "active"; } ?>"><a href="./?lnk=dashboard_std&amp;action=creg"><i class="fa fa-suitcase"></i> Course Registration</a></li>
            <li class="nav-parent <?php if(isset($module) && $module == "report"){ echo "active"; }?>"><a href="#"><i class="fa fa-book"></i> <span>RESULTS</span></a>
              <ul class="children">
                <li class="<?php if(isset($shet) && $shet == "raw"){ echo "active"; } ?>"><a href="./?lnk=dashboard_std&amp;action=rawsc">Raw Scores</a></li>
                <li class="<?php if(isset($shet) && $shet == "prog"){ echo "active"; } ?>"><a href="#">Check Result</a></li>
              </ul>
            </li>
            <li class="nav-parent <?php if(isset($module) && $module == "report"){ echo "active"; }?>"><a href="#"><i class="fa fa-book"></i> <span>REPORTS</span></a>
              <ul class="children">
                <li class="<?php if(isset($shet) && $shet == "prog"){ echo "active"; } ?>"><a href="./?lnk=dashboard_std&amp;action=payclear">Payment Clearance</a></li>
                <li class="<?php if(isset($shet) && $shet == "prog"){ echo "active"; } ?>"><a href="./?lnk=dashboard_std&amp;action=courseregreport">Course Registration</a></li>
              </ul>
            </li>
            <li class="<?php if(isset($shet) && $shet == "logout"){ echo "active"; } ?>"><a href="./?lnk=logout"><i class="fa fa-certificate"></i> Logout</a></li>
              
          </ul>
        </div><!-- tab-pane -->

        <!-- ######################## EMAIL MENU ##################### -->

        <div class="tab-pane" id="emailmenu">
          <div class="sidebar-btn-wrapper">
            <a href="compose.html" class="btn btn-danger btn-block">Compose</a>
          </div>

          <h5 class="sidebar-title">Mailboxes</h5>
          <ul class="nav nav-pills nav-stacked nav-quirk nav-mail">
            <li><a href="email.html"><i class="fa fa-inbox"></i> <span>Inbox (3)</span></a></li>
            <li><a href="email.html"><i class="fa fa-pencil"></i> <span>Draft (2)</span></a></li>
            <li><a href="email.html"><i class="fa fa-paper-plane"></i> <span>Sent</span></a></li>
          </ul>
        </div><!-- tab-pane -->

        <!-- ################### CONTACT LIST ################### -->

        <div class="tab-pane" id="contactmenu">
          <div class="input-group input-search-contact">
            <input type="text" class="form-control" placeholder="Search contact">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
            </span>
          </div>
          <h5 class="sidebar-title">My Contacts</h5>
          <ul class="media-list media-list-contacts">
            <li class="media">
              <a href="#">
                <div class="media-left">
                    <img class="media-object img-circle" src="../images/photos/user1.png" alt="">
                </div>
                <div class="media-body">
                  <h4 class="media-heading"><?php echo $_SESSION['name']; ?></h4>
                  <span><i class="fa fa-phone"></i> <?php echo $ezzzy->getval("id",$adminid,"_accounts","phone"); ?></span>
                </div>
              </a>
            </li>
            <li class="media">
              <a href="#">
                <div class="media-left">
                  <img class="media-object img-circle" src="../images/photos/user2.png" alt="">
                </div>
                <div class="media-body">
                  <h4 class="media-heading">Floyd M. Romero</h4>
                  <span><i class="fa fa-mobile"></i> +1614-650-8281</span>
                </div>
              </a>
            </li>
            <li class="media">
              <a href="#">
                <div class="media-left">
                  <img class="media-object img-circle" src="../images/photos/user3.png" alt="">
                </div>
                <div class="media-body">
                  <h4 class="media-heading">Jennie S. Gray</h4>
                  <span><i class="fa fa-phone"></i> 310-757-8444</span>
                </div>
              </a>
            </li>
            <li class="media">
              <a href="#">
                <div class="media-left">
                  <img class="media-object img-circle" src="../images/photos/user4.png" alt="">
                </div>
                <div class="media-body">
                  <h4 class="media-heading">Alia J. Locher</h4>
                  <span><i class="fa fa-mobile"></i> +1517-386-0059</span>
                </div>
              </a>
            </li>
            <li class="media">
              <a href="#">
                <div class="media-left">
                  <img class="media-object img-circle" src="../images/photos/user5.png" alt="">
                </div>
                <div class="media-body">
                  <h4 class="media-heading">Nicholas T. Hinkle</h4>
                  <span><i class="fa fa-skype"></i> nicholas.hinkle</span>
                </div>
              </a>
            </li>
            <li class="media">
              <a href="#">
                <div class="media-left">
                  <img class="media-object img-circle" src="../images/photos/user6.png" alt="">
                </div>
                <div class="media-body">
                  <h4 class="media-heading">Jamie W. Bradford</h4>
                  <span><i class="fa fa-phone"></i> 225-270-2425</span>
                </div>
              </a>
            </li>
            <li class="media">
              <a href="#">
                <div class="media-left">
                  <img class="media-object img-circle" src="../images/photos/user7.png" alt="">
                </div>
                <div class="media-body">
                  <h4 class="media-heading">Pamela J. Stump</h4>
                  <span><i class="fa fa-mobile"></i> +1773-879-2491</span>
                </div>
              </a>
            </li>
            <li class="media">
              <a href="#">
                <div class="media-left">
                  <img class="media-object img-circle" src="../images/photos/user8.png" alt="">
                </div>
                <div class="media-body">
                  <h4 class="media-heading">Refugio C. Burgess</h4>
                  <span><i class="fa fa-mobile"></i> +1660-627-7184</span>
                </div>
              </a>
            </li>
            <li class="media">
              <a href="#">
                <div class="media-left">
                  <img class="media-object img-circle" src="../images/photos/user9.png" alt="">
                </div>
                <div class="media-body">
                  <h4 class="media-heading">Ashley T. Brewington</h4>
                  <span><i class="fa fa-skype"></i> ashley.brewington</span>
                </div>
              </a>
            </li>
            <li class="media">
              <a href="#">
                <div class="media-left">
                  <img class="media-object img-circle" src="../images/photos/user10.png" alt="">
                </div>
                <div class="media-body">
                  <h4 class="media-heading">Roberta F. Horn</h4>
                  <span><i class="fa fa-phone"></i> 716-630-0132</span>
                </div>
              </a>
            </li>
          </ul>
        </div><!-- tab-pane -->

        <!-- #################### SETTINGS ################### -->

        <div class="tab-pane" id="settings">
            <div class="sidebar-btn-wrapper">
                <button class="btn btn-danger btn-block" data-toggle="modal" data-target="#myModalSett">CURRENT SETTINGS</button>
            </div>
            <center>2nd Term, 2017/2018 Session</center>
            <hr>

            <h5 class="sidebar-title">Working Parameters</h5>
            <ul class="nav nav-pills nav-stacked nav-quirk nav-mail">
                <li><a href="sett_sections.php"><i class="fa fa-gear"></i> Sections (2)</a></li>
                <li><a href="sett_classes.php"><i class="fa fa-gear"></i> Classes (6)</a></li>
                <li><a href="sett_time_table.php"><i class="fa fa-gear"></i> Time Table</a></li>
            </ul>
        </div><!-- tab-pane -->



      </div><!-- tab-content -->