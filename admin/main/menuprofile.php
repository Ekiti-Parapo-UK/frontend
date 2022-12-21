<!-- ################## LEFT PANEL PROFILE ################## -->

<div class="media leftpanel-profile">
    <div class="media-left">
        <a href="#">
            <img src="pics/user.png" alt="" class="media-object img-circle">
        </a>
    </div>
    <div class="media-body">
        <h4 class="media-heading"><?php echo $_SESSION['name']; ?> <a data-toggle="collapse" data-target="#loguserinfo" class="pull-right"><i class="fa fa-angle-down"></i></a></h4>
        <span><?php echo $_SESSION['position']; ?></span>
    </div>
</div><!-- leftpanel-profile -->

<div class="leftpanel-userinfo collapse" id="loguserinfo">

    <h5 class="sidebar-title">Contact</h5>
    <ul class="list-group">
        <li class="list-group-item">
            <label class="pull-left">Email</label>
            <span class="pull-right"><?php echo $_SESSION["em"]; ?></span>
        </li>
        <li class="list-group-item">
            <label class="pull-left">Mobile</label>
            <span class="pull-right"><?php echo $_SESSION["mph"]; ?></span>
        </li>
    </ul>
</div><!-- leftpanel-userinfo -->

<?php
$dmail = $_SESSION["em"];
$dmail_count = mysqli_num_rows(mysqli_query($con,"select id from msg_inbox where receiver_mail='$dmail' and status='<b>'"));