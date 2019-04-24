<!DOCTYPE html>
<html lang="en">
<head>
	@include('front_end.layout.master')
</head>
<body class="horizontal-layout horizontal-menu horizontal-menu-padding 2-columns   menu-expanded" data-open="hover" data-menu="horizontal-menu" data-col="2-columns">

	@include('front_end.layout.menu')

    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-dark navbar-without-dd-arrow navbar-shadow" role="navigation" data-menu="menu-wrapper">
      <div class="navbar-container main-menu-content container center-layout" data-menu="menu-container">
        <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">

        	<!-- Dashboard -->
          <li class="nav-item"><a class="nav-link" href="home"><i class="icon-home"></i>Home</a>
          </li>

          <!-- Order -->
          <li class="nav-item"><a class="nav-link" href="order"><i class="icon-basket-loaded"></i>Order</a>
          </li>

          <!-- Input Alamat Pengiriman -->
          <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="icon-note"></i><span data-i18n="nav.layouts.temp">Input Alamat Pengiriman</span></a>
            <ul class="dropdown-menu">
              <li class="dropdown" data-menu="dropdown"><a class="dropdown-item" href="#" data-toggle="dropdown"><i class="fa fa-pencil-square-o"></i>Input Baru</a>
              </li>
              <li class="dropdown dropdown" data-menu="dropdown-"><a class="dropdown-item" href="#" data-toggle="dropdown"><i class="fa fa-bookmark"></i>Status Pengiriman</a>
              </li>
            </ul>
          </li>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>

    <div class="app-content container center-layout mt-2">
      <div class="content-wrapper">
        <div class="content-body">
          <div class="card">
            <div class="card-content">
            <div class="card-body">

    <!-- TAB MENU -->
            <ul class="nav nav-tabs nav-top-border no-hover-bg">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab1" data-toggle="tab" href="#home1" aria-controls="home1" aria-expanded="true"><i class="fa fa-inbox"></i>Status Order</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab1" data-toggle="tab" href="#profile1" aria-controls="profile1" aria-expanded="false"><i class="fa fa-flag"></i>History Order</a>
              </li>
            </ul> 
        <div class="tab-content px-1 pt-1">

        <!-- TAB OnProgress -->
        <div  role="tabpanel" class="tab-pane active" id="home1" aria-labelledby="home-tab1" aria-expanded="true">
            <!-- Custom view start -->
                    <table class="table table-striped table-bordered javascript-sourced" width="100%">
                    </table>
            <!-- Custom view end -->
        </div>

        <!-- Tab History Order -->
        <div class="tab-pane" id="profile1" aria-labelledby="profile-tab1">
             <!-- Custom view start -->
                    <table class="table table-striped table-bordered javascript-sourced" width="100%">
                    </table>
            <!-- Custom view end -->
        </div>

        </div>

            </div>
            </div>
        </div>
      </div>
   </div>
</div>

    <footer class="footer footer-static footer-light navbar-shadow">
      <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2 container center-layout"><span class="float-md-left d-block d-md-inline-block">Copyright  &copy; 2018 <a class="text-bold-800 grey darken-2" href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" target="_blank">PIXINVENT </a>, All rights reserved. </span><span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">Hand-crafted & Made with <i class="ft-heart pink"></i></span></p>
    </footer>

   <!-- BEGIN VENDOR JS-->
    <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="../../../app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <script src="../../../app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
        <script src="../../../app-assets/vendors/js/tables/datatable/dataTables.responsive.js"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN ROBUST JS-->
    <script src="../../../app-assets/js/core/app-menu.js"></script>
    <script src="../../../app-assets/js/core/app.js"></script>
    <!-- END ROBUST JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="../../../app-assets/js/scripts/tables/datatables-extensions/datatables-sources.js"></script>
    <!-- END PAGE LEVEL JS-->
    <!-- END PAGE LEVEL JS-->


  </body>
</html>