<div class="tab-content">

        <!-- ################# MAIN MENU ################### -->

        <div class="tab-pane active" id="mainmenu">
          <h5 class="sidebar-title">Favorites</h5>
          <ul class="nav nav-pills nav-stacked nav-quirk">
            <li class="active"><a href="./?lnk=dashboard"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
          </ul>

          <h5 class="sidebar-title">Main Menu</h5>
          <ul class="nav nav-pills nav-stacked nav-quirk">
            <li class="nav-parent <?php if(isset($module) && $module == "payment"){ echo "active"; }?>"><a href="#"><i class="fa fa-money"></i> <span>PAYMENT ACTIVITIES</span></a>
              <ul class="children">
                <li class="<?php if(isset($shet) && $shet == "payf"){ echo "active"; } ?>"><a href="./?lnk=dashboard&amp;action=payfees">Pay Fees</a></li>
                <li class="<?php if(isset($shet) && $shet == "pays"){ echo "active"; } ?>"><a href="./?lnk=dashboard&amp;action=pstatus">Payment Status</a></li>
              </ul>
            </li>
            <li class="<?php if(isset($shet) && $shet == "results"){ echo "active"; } ?>"><a href="./?lnk=dashboard&amp;action=creg"><i class="fa fa-suitcase"></i> Course Registration</a></li>
            <li class="nav-parent <?php if(isset($module) && $module == "report"){ echo "active"; }?>"><a href="#"><i class="fa fa-book"></i> <span>RESULTS</span></a>
              <ul class="children">
                <li class="<?php if(isset($shet) && $shet == "raw"){ echo "active"; } ?>"><a href="./?lnk=dashboard&amp;action=rawsc">Raw Scores</a></li>
                <li class="<?php if(isset($shet) && $shet == "prog"){ echo "active"; } ?>"><a href="#">Check Result</a></li>
              </ul>
            </li>
            <li class="nav-parent <?php if(isset($module) && $module == "report"){ echo "active"; }?>"><a href="#"><i class="fa fa-book"></i> <span>REPORTS</span></a>
              <ul class="children">
                <li class="<?php if(isset($shet) && $shet == "prog"){ echo "active"; } ?>"><a href="./?lnk=dashboard&amp;action=payclear">Payment Clearance</a></li>
                <li class="<?php if(isset($shet) && $shet == "prog"){ echo "active"; } ?>"><a href="./?lnk=dashboard&amp;action=courseregreport">Course Registration</a></li>
              </ul>
            </li>
            <li class="<?php if(isset($shet) && $shet == "logout"){ echo "active"; } ?>"><a href="./?lnk=logout"><i class="fa fa-certificate"></i> Logout</a></li>
              
          </ul>
        </div><!-- tab-pane -->

        <!-- ######################## EMAIL MENU ##################### -->

        <div class="tab-pane" id="emailmenu">
          <div class="sidebar-btn-wrapper">
            <a href="#" class="btn btn-danger btn-block">Compose</a>
          </div>

          <h5 class="sidebar-title">Mailboxes</h5>
          <ul class="nav nav-pills nav-stacked nav-quirk nav-mail">
            <li><a href="#"><i class="fa fa-inbox"></i> <span>Inbox (3)</span></a></li>
            <li><a href="#"><i class="fa fa-pencil"></i> <span>Draft (2)</span></a></li>
            <li><a href="#"><i class="fa fa-paper-plane"></i> <span>Sent</span></a></li>
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
                <li><a href="#"><i class="fa fa-gear"></i> Sections (2)</a></li>
                <li><a href="#"><i class="fa fa-gear"></i> Classes (6)</a></li>
                <li><a href="#"><i class="fa fa-gear"></i> Time Table</a></li>
            </ul>
        </div><!-- tab-pane -->



      </div><!-- tab-content -->