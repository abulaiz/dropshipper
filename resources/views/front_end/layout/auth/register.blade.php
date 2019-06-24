<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <head>
    @include('layouts.head')
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
			<div class="card border-grey border-lighten-3 px-2 py-2 m-0 responsiveCard">
				<div class="card-header border-0">
                    <div class="card-title text-center">
                       <div class="p-1"><img src="../../../img/logo.png" alt="branding logo" width="200"></div>
                    </div>
					<h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span>Buat Akun</span></h6>
				</div>
				<div class="card-content">	
					<div class="card-body">
						<form class="form-horizontal form-simple" method="POST" action="{{ route('register') }}">
							@csrf
							<fieldset class="form-group position-relative has-icon-left mb-1">
								<input type="text" class="form-control form-control-lg input-lg" name="name" placeholder="Nama Anda">
								<div class="form-control-position">
								    <i class="ft-user"></i>
								</div>
							</fieldset>
							<fieldset class="form-group position-relative has-icon-left mb-1">
								<input type="email" class="form-control form-control-lg input-lg" name="email" placeholder="Email Anda" required>
								<div class="form-control-position">
								    <i class="ft-mail"></i>
								</div>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert" style="display: unset;">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif								
							</fieldset>
							<fieldset class="form-group position-relative has-icon-left mb-1">
								<select class="form-control form-control-lg input-lg" name="gender" required style="padding-left: 3.375rem">
									<option value="">Jenis Kelamin</option>
									<option value="1">Laki - laki</option>
									<option value="0">Perempuan</option>
								</select> 
								<div class="form-control-position">
								    <i class="ft-users"></i>
								</div>
							</fieldset>								
							<fieldset class="form-group position-relative has-icon-left mb-1">
								<input type="text" class="form-control form-control-lg input-lg" name="phone" placeholder="No Telepon" required>
								<div class="form-control-position">
								    <i class="ft-phone-call"></i>
								</div>
							</fieldset>
							<fieldset class="form-group position-relative has-icon-left mb-1">
								<input type="text" class="form-control form-control-lg input-lg" name="address" placeholder="Alamat Anda" required>
								<div class="form-control-position">
								    <i class="ft-navigation"></i>
								</div>
							</fieldset>														
							<button type="submit" class="btn btn-info btn-lg btn-block"><i class="ft-edit"></i> Daftar</button>
						</form>
					</div>
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