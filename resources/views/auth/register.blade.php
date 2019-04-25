<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <head>
    @include('front_end.layout.master')
  </head>
  <body class="vertical-layout vertical-menu 1-column   menu-expanded blank-page blank-page" data-open="click" data-menu="vertical-menu" data-col="1-column">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><section class="flexbox-container">
    <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="col-md-4 col-10 box-shadow-2 p-0">
			<div class="card border-grey border-lighten-3 px-2 py-2 m-0">
				<div class="card-header border-0">
					<div class="card-title text-center">
						<img src="../../../IMG/logo.png" alt="branding logo" width="200">
					</div>
					<h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span>Create Account</span></h6>
				</div>
				<div class="card-content">	
					<div class="card-body">
						<form class="form-horizontal form-simple" action="index.html" novalidate>
							<fieldset class="form-group position-relative has-icon-left mb-1">
								<input type="text" class="form-control form-control-lg input-lg" id="user-name" placeholder="User Name">
								<div class="form-control-position">
								    <i class="ft-user"></i>
								</div>
							</fieldset>
							<fieldset class="form-group position-relative has-icon-left mb-1">
								<input type="email" class="form-control form-control-lg input-lg" id="user-email" placeholder="Your Email Address" required>
								<div class="form-control-position">
								    <i class="ft-mail"></i>
								</div>
							</fieldset>
							<fieldset class="form-group position-relative has-icon-left">
								<input type="password" class="form-control form-control-lg input-lg" id="user-password" placeholder="Enter Password" required>
								<div class="form-control-position">
								    <i class="fa fa-key"></i>
								</div>
							</fieldset>
							<button type="submit" class="btn btn-warning btn-lg btn-block"><i class="ft-unlock"></i> Register</button>
						</form>
					</div>
					<p class="text-center">Already have an account ? <a href="login" class="card-link">Login</a></p>
				</div>
			</div>
		</div>
	</div>
</section>
        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- BEGIN VENDOR JS-->
    <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="../../../app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN ROBUST JS-->
    <script src="../../../app-assets/js/core/app-menu.min.js"></script>
    <script src="../../../app-assets/js/core/app.min.js"></script>
    <!-- END ROBUST JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="../../../app-assets/js/scripts/forms/form-login-register.min.js"></script>
    <!-- END PAGE LEVEL JS-->
  </body>
</html>