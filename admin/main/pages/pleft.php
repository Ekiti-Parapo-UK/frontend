<div class="tab-content">

        <!-- ################# MAIN MENU ################### -->

        <div class="tab-pane active" id="mainmenu">
          <h5 class="sidebar-title">Favorites</h5>
          <ul class="nav nav-pills nav-stacked nav-quirk">
            <li class="active"><a href="./?lnk=home"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
          </ul>

          <h5 class="sidebar-title">Main Menu</h5>
          <ul class="nav nav-pills nav-stacked nav-quirk">
            <li class="nav-parent <?php if(isset($module) && $module == "registry"){ echo "active"; }?>">
              <a href="#"><i class="icon ion-person-stalker"></i> <span>Registries</span></a>
              <ul class="children">
                <li class="<?php if(isset($shet) && $shet == "member"){ echo "active"; } ?>"><a href="./?lnk=dir_members">Members' Directory</a></li>
                <li class="<?php if(isset($shet) && $shet == "staff"){ echo "active"; } ?>"><a href="./?lnk=dir_staff">Staff Directory</a></li>
                <li class="<?php if(isset($shet) && $shet == "faculty"){ echo "active"; } ?>"><a href="./?lnk=server_scholar">Administrators</a></li>
              </ul>
            </li>
                        
            <li class="nav-parent <?php if(isset($module) && $module == "administration"){ echo "active"; }?>">
              <a href="#"><i class="fa fa-check-square"></i> <span>Administration</span></a>
              <ul class="children">
                  <li class="<?php if(isset($shet) && $shet == "siteinfo"){ echo "active"; } ?>"><a href="./?lnk=sett_siteinfo">Site Information</a></li>
                  <li class="<?php if(isset($shet) && $shet == "project"){ echo "active"; } ?>"><a href="./?lnk=server_project">Projects</a></li>
                  <li class="<?php if(isset($shet) && $shet == "senated"){ echo "active"; } ?>"><a href="./?lnk=server_senated">Senatorial District</a></li>
                  <li class="<?php if(isset($shet) && $shet == "testimony"){ echo "active"; } ?>"><a href="./?lnk=server_testimony">Testimonials</a></li>
                  <li class="<?php if(isset($shet) && $shet == "faq"){ echo "active"; } ?>"><a href="./?lnk=server_faq">FAQs</a></li>
                  <li class="<?php if(isset($shet) && $shet == "upload"){ echo "active"; } ?>"><a href="./?lnk=server_upload">Uploads</a></li>
              </ul>
            </li>
            <li class="nav-parent <?php if(isset($module) && $module == "gallery"){ echo "active"; }?>">
              <a href="#"><i class="fa fa-picture-o"></i> <span>Gallery</span></a>
              <ul class="children">
                  <li class="<?php if(isset($shet) && $shet == "siteinfo"){ echo "active"; } ?>"><a href="./?lnk=server_gallery">Photos</a></li>
              </ul>
            </li>
            
            <li class="nav-parent <?php if(isset($module) && $module == "newsevent"){ echo "active"; }?>"><a href="#"><i class="fa fa-gears"></i> <span>News, Events &amp; Blog</span></a>
              <ul class="children">
                <li class="<?php if(isset($shet) && $shet == "news"){ echo "active"; } ?>"><a href="./?lnk=server_news">News</a></li>
                <li class="<?php if(isset($shet) && $shet == "event"){ echo "active"; } ?>"><a href="./?lnk=server_events">Events</a></li>
                <li class="<?php if(isset($shet) && $shet == "blog"){ echo "active"; } ?>"><a href="./?lnk=server_blog">Blogs</a></li>                
              </ul>
            </li>
            
            <li class="nav-parent <?php if(isset($module) && $module == "subhead"){ echo "active"; }?>"><a href="#"><i class="fa fa-money"></i> <span>Income & Expenses</span></a>
              <ul class="children">
                <li class="<?php if(isset($shet) && $shet == "subhead"){ echo "active"; } ?>"><a href="./?lnk=server_subhead">Subhead</a></li>
                <li class="<?php if(isset($shet) && $shet == "expenditure"){ echo "active"; } ?>"><a href="./?lnk=server_expenditure">Expenditures</a></li>
                <li class="<?php if(isset($shet) && $shet == "income"){ echo "active"; } ?>"><a href="./?lnk=server_income">Income</a></li>
              </ul>
            </li>
            
            <li class="nav-parent <?php if(isset($module) && $module == "userroles"){ echo "active"; }?>"><a href="#"> <i class="fa fa-lock"></i><span>ROLES MANAGEMENT</span></a>
              <ul class="children">
                <li class="<?php if(isset($shet) && $shet == "priv"){ echo "active"; } ?>"><a href="./?lnk=sys_mroles">Manage Roles</a></li>
                <li class="<?php if(isset($shet) && $shet == "checkr"){ echo "active"; } ?>"><a href="#">Assign Roles</a></li>
              </ul> 
            </li>
            
            <li class="nav-parent <?php if(isset($module) && $module == "report"){ echo "active"; }?>"><a href="#"><i class="fa fa-print"></i> <span>Reports</span></a>
              <ul class="children">
                <li class="<?php if(isset($shet) && $shet == "reportdebtors"){ echo "active"; } ?>"><a href="./?lnk=report_debtors">Debtors</a></li>
                <li class="<?php if(isset($shet) && $shet == "reportexpense"){ echo "active"; } ?>"><a href="./?lnk=report_expense">Expenses Report</a></li>
                <li class="<?php if(isset($shet) && $shet == "reportincome"){ echo "active"; } ?>"><a href="./?lnk=report_income">Income Report</a></li>
              </ul>
            </li>
            <li class="active"><a target="email" href="https://premium121.web-hosting.com:2096/"><i class="fa fa-mail-forward"></i> <span>Webmail</span></a></li>
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
          </ul>
        </div><!-- tab-pane -->

        <!-- #################### SETTINGS ################### -->

        <div class="tab-pane" id="settings">
            <div class="sidebar-btn-wrapper">
                <button class="btn btn-danger btn-block" data-toggle="modal" data-target="#myModalSett">CURRENT SETTINGS</button>
            </div>
            <center>...</center>
            <hr>

            <h5 class="sidebar-title">Working Parameters</h5>
            <ul class="nav nav-pills nav-stacked nav-quirk nav-mail">
                <li><a href="#"><i class="fa fa-gear"></i> ...</a></li>
                <li><a href="#"><i class="fa fa-gear"></i> ...</a></li>
                <li><a href="#"><i class="fa fa-gear"></i> ...</a></li>
            </ul>
        </div><!-- tab-pane -->



      </div><!-- tab-content -->