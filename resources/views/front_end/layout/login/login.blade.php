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
            <div class="card border-grey border-lighten-3 m-0">
                <div class="card-header border-0">
                    <div class="card-title text-center">
                       <div class="p-1"><img src="../../../img/logo.png" alt="branding logo" width="200"></div>
                    </div>
                    <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span>Login Dropshiper</span></h6>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form-horizontal form-simple" method="POST" action="{{ route('login') }}" novalidate>
                            @csrf
                            <fieldset class="form-group position-relative has-icon-left mb-0">
                                <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Your Username" required autofocus>
                                <div class="form-control-position">
                                    <i class="ft-user"></i>
                                </div>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif                                
                            </fieldset>

                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"  placeholder="Enter Password" required>
                                <div class="form-control-position">
                                    <i class="fa fa-key"></i>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif                                
                            </fieldset>

                            <div class="form-group row">
                                <div class="col-md-6 col-12 text-center text-md-left">
                                    <fieldset>
                                        <input type="checkbox" id="remember-me" class="chk-remember">
                                        <label for="remember-me"> Remember Me</label>
                                    </fieldset>
                                </div>
                                <div class="col-md-6 col-12 text-center text-md-right"><a href="forgot-password" class="card-link">Forgot Password?</a></div>
                            </div>
                            <button type="submit" class="btn btn-warning btn-lg btn-block"><i class="ft-unlock"></i> Login</button>
                        </form>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="">
                        <p class="float-sm-left text-center m-0"><a href="forgot-password" class="card-link">Recover password</a></p>
                        <p class="float-sm-right text-center m-0">New to Moden Admin? <a href="register" class="card-link">Sign Up</a></p>
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
    <script src="../../../app-assets/vendors/js/forms/icheck/icheck.min.js"></script>
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