<!DOCTYPE html>
<html>
<head>
    @include('layouts.head')
</head>
<body class="horizontal-layout horizontal-menu horizontal-menu-padding 2-columns  menu-expanded" data-open="hover" data-menu="horizontal-menu" data-col="2-columns" ng-app='main'>
    @include('layouts.navbar')
    @include('layouts.sidebar')
    <div class="app-content container center-layout mt-2">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
      @if(Session::has('_msg'))
        @php
          $e = session()->get('_e'); $msg = session()->get('_msg');
        @endphp
        <div class="alert {{$_alert->bg($e)}} alert-icon-left alert-dismissible mb-2" role="alert">
          <span class="alert-icon"><i class="{{$_alert->icon($e)}}"></i></span>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <strong>{{$_alert->caption($e)}}. </strong>{{$msg}}
        </div>
      @endif        
        <div class="content-body">
            @yield('content')
        </div>
        </div>
    </div>

    <div class="ovnav" style="display: none;"></div>

    @include('layouts.footer')

    <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
    <script type="text/javascript" src="../../../app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <script src="../../../app-assets/js/core/app-menu.js"></script>
    <script src="../../../app-assets/js/core/app.js"></script>

    <script src="../../../assets/js/angular.min.js"></script>
    <script type="text/javascript">
        var app = angular.module("main", [], function($interpolateProvider){
            $interpolateProvider.startSymbol('{*');
            $interpolateProvider.endSymbol('*}');
        });

    </script>    
    <script src="../../../js/config/directive.js"></script>

    <script src="../../../app-assets/js/scripts/customizer.js" type="text/javascript"></script>

    <script src="../../../app-assets/js/scripts/tables/datatables/datatable-advanced.js"></script>
    <script src="../../../app-assets/js/scripts/pages/email-application.js"></script>



    @yield('customJS')    
</body>
</html>