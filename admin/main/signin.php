<?php
include_once("pages/head.php");
?>

    <body class="signwrapper">

        <div class="sign-overlay"></div>
        <div class="signpanel"></div>

        <div class="panel signin">
            <div class="panel-heading">
                <h1><?php echo $_SESSION['swtitle']; ?></h1>
                <?php if (@$_SESSION['msg'] == '') { ?>
                    <h4 class="panel-title">Welcome! Please signin.</h4>
                <?php } else { ?>
                    <h4 class="panel-title"><?php echo @$_SESSION['msg']; ?></h4>
                <?php } ?>
            </div>
            <div class="panel-body">

                <form action="check_login.php" method="post">
                    <div class="form-group mb10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input required="true" type="text" class="form-control" placeholder="Username" name="username">
                        </div>
                    </div>
                    <div class="form-group nomargin">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input required="true" type="password" class="form-control" placeholder="Password" name="password">
                        </div>
                    </div>
                    <div><a href="#" class="forgot">Forgot password?</a> | <a href="../../home.php">Back Home</a></div>
                    <div class="form-group">
                        <button class="btn btn-success btn-quirk btn-block" type="submit">Sign In</button>
                    </div>
                </form>
                <hr class="invisible">

            </div>
        </div><!-- panel -->

    </body>
</html>
<?php
$_SESSION['msg'] = '';
?>