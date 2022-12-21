<?php
$mytitle = "Login";
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
              <h2 class="title text-white">My Account</h2>
              <ol class="breadcrumb text-left text-black mt-10">
                <li><a href="./?lnk=home">Home</a></li>
                <li class="active text-gray-silver">Login</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-push-3">
            <h4 class="text-gray mt-0 pt-5"> Login</h4>
            <hr>
            <p>Start your session</p>
            <form name="login-form" method="post" action="admin/main/check_login.php" class="clearfix">
              <div class="row">
                <div class="form-group col-md-12">
                  <label for="form_username_email">Username</label>
                  <input id="form_username_email" name="username" class="form-control" type="text" required="required" />
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                  <label for="form_password">Password</label>
                  <input id="form_password" name="password" class="form-control" type="password" required="required" />
                </div>
              </div>
              <div class="checkbox pull-left mt-15">
                <label for="form_checkbox">
                  <input id="form_checkbox" name="form_checkbox" type="checkbox">
                  Remember me </label>
              </div>
              <div class="form-group pull-right mt-10">
                <button type="submit" class="btn btn-dark btn-sm">Login</button>
              </div>
              <div class="clear text-center pt-10">
                <a class="text-theme-colored font-weight-600 font-12" href="#">Forgot Your Password?</a>
              </div>
              
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- end main-content -->
  
  <!-- Footer -->
  <?php include_once('pages/footer.php');