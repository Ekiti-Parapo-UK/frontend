<!-- ######################## EMAIL MENU ##################### -->

<div class="tab-pane <?php //if (@$mcat == 'inbox' || @$mcat == 'outbox') { ?>active<?php //} ?>" id="emailmenu">


    <h5 class="sidebar-title">Directories</h5>
    <ul class="nav nav-pills nav-stacked nav-quirk nav-mail">
        <li><a href="messages.php?mcat=inbox"><i class="fa fa-envelope"></i> <span>Inbox ()</span></a></li>
        <li><a href="messages.php?mcat=outbox"><i class="fa fa-paper-plane"></i> <span>Sent</span></a></li>
    </ul>

</div><!-- tab-pane -->

<!-- #################### SETTINGS ################### -->

<div class="tab-pane" id="settings">
    <div class="sidebar-btn-wrapper">
        <button class="btn btn-danger btn-block" data-toggle="modal" data-target="#myModalSett">CURRENT SETTINGS</button>
    </div>
    <center><?php //echo @$_SESSION["jiterm"]; ?>, <?php //echo @$_SESSION["jisession"]; ?> Session</center>
    <hr>

    <h5 class="sidebar-title">Working Parameters</h5>
    <ul class="nav nav-pills nav-stacked nav-quirk nav-mail">
        <li><a href="sett_sections.php"><i class="fa fa-gear"></i> <?php //echo @$lab6; ?> ()</a></li>
        <li><a href="sett_classes.php"><i class="fa fa-gear"></i> <?php //echo @$lab1; ?> ()</a></li>
        <li><a href="sett_time_table.php"><i class="fa fa-gear"></i> Time Table</a></li>
    </ul>
</div><!-- tab-pane -->
