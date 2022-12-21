<div class="tab-content">
    <!-- ################# MAIN MENU ################### -->

    <div class="tab-pane active" id="mainmenu">
        <h5 class="sidebar-title">Main Menu</h5>
        <ul class="nav nav-pills nav-stacked nav-quirk">
            <li class="nav-parent <?php if(isset($module) && $module == "payment"){ echo "active"; }?>"><a href="#"><i class="fa fa-money"></i> <span>PAYMENT ACTIVITIES</span></a>
              <ul class="children">
                <li class="<?php if(isset($shet) && $shet == "payf"){ echo "active"; } ?>"><a href="./?lnk=dashboard&amp;action=payfees">Pay Fees</a></li>
                <li class="<?php if(isset($shet) && $shet == "pays"){ echo "active"; } ?>"><a href="./?lnk=dashboard&amp;action=pstatus">Payment Status</a></li>
              </ul>
            </li>
            
            <li class="nav-parent <?php if(isset($module) && $module == "report"){ echo "active"; }?>"><a href="#"><i class="fa fa-book"></i> <span>REPORTS</span></a>
              <ul class="children">
                <li class="<?php if(isset($shet) && $shet == "prog"){ echo "active"; } ?>"><a href="./?lnk=dashboard&amp;action=income">Income</a></li>
                <li class="<?php if(isset($shet) && $shet == "prog"){ echo "active"; } ?>"><a href="./?lnk=dashboard&amp;action=expense">Expenditures</a></li>
              </ul>
            </li>
            <li class="<?php if(isset($shet) && $shet == "logout"){ echo "active"; } ?>"><a href="./?lnk=logout"><i class="fa fa-certificate"></i> Logout</a></li>
              
          </ul>

    </div><!-- tab-pane -->

    <!-- ######################## EMAIL MENU ##################### -->

    <div class="tab-pane active" id="emailmenu">


        <!--<h5 class="sidebar-title">Directories</h5>
        <ul class="nav nav-pills nav-stacked nav-quirk nav-mail">
            <li><a href="#"><i class="fa fa-envelope"></i> <span>Inbox ()</span></a></li>
            <li><a href="#"><i class="fa fa-paper-plane"></i> <span>Sent</span></a></li>
        </ul>-->

    </div><!-- tab-pane -->

    <!-- #################### SETTINGS ################### -->

    <!--<div class="tab-pane" id="settings">
        <div class="sidebar-btn-wrapper">
            <button class="btn btn-danger btn-block" data-toggle="modal" data-target="#myModalSett">CURRENT SETTINGS</button>
        </div>
        <center>,  Session</center>
        <hr>

        <h5 class="sidebar-title">Working Parameters</h5>
        <ul class="nav nav-pills nav-stacked nav-quirk nav-mail">
            <li><a href="#"><i class="fa fa-gear"></i>  ()</a></li>
            <li><a href="#"><i class="fa fa-gear"></i>  ()</a></li>
            <li><a href="#"><i class="fa fa-gear"></i> </a></li>
        </ul>
    </div><!-- tab-pane -->

</div><!-- tab-content -->