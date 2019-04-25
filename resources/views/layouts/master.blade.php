<!DOCTYPE html>
<html>
<head>
    @include('layouts.head')
</head>
<body class="horizontal-layout horizontal-menu horizontal-menu-padding 2-columns   menu-expanded" data-open="hover" data-menu="horizontal-menu" data-col="2-columns" ng-app='main'>
    @include('layouts.navbar')
    @include('layouts.sidebar')
    <div class="app-content container center-layout mt-2">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            @yield('content')
        </div>
        </div>
    </div>
    @include('layouts.footer')
    <!-- BEGIN VENDOR JS-->
    <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN ROBUST JS-->
    <script src="../../../app-assets/js/core/app-menu.js"></script>
    <script src="../../../app-assets/js/core/app.js"></script>
    <script src="../../../app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="../../../app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js"></script>
    <script src="../../../app-assets/vendors/js/tables/datatable/dataTables.responsive.js"></script>
    <script src="../../../app-assets/js/scripts/customizer.js" type="text/javascript"></script>
    <script src="../../../app-assets/js/scripts/tables/datatables/datatable-advanced.js"></script>
    <!-- END ROBUST JS-->

    @yield('customJS')    
</body>
</html>