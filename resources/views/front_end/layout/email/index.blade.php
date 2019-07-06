
@extends('layouts.master')
@section('email', 'active')
@section('page_title', 'Pesan')

@section('customHead')
<link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/loaders/loaders.min.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/colors/palette-loader.css">

<link href="../../../filepond/dist/filepond.css" rel="stylesheet">
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/js/gallery/photo-swipe/photoswipe.css">
  <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/js/gallery/photo-swipe/default-skin/default-skin.css">
@endsection


@section('content')
<div ng-controller='mail'>
    <div class="row" style="margin-bottom: 10px;">
        <div class="col-12">
            <button ng-disabled='onSending' data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#composeMail" class="btn btn-info pull-right">
            <i class="fa fa-pencil" style="margin-right: 7px;"></i>Tulis Pesan</button>          
        </div>  
    </div>

    <section id="tab-pane">
        <div class ="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div ng-view></div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </section>
       
    @include('modals.composeMail')    
</div>
@endsection

@section('customJS')

    <script src="../../../app-assets/vendors/js/extensions/sweetalert.min.js" type="text/javascript"></script>
    <script src="../../../js/plugin/confirmDialog.js" type="text/javascript"></script>
    <script src="../../../js/plugin/leftToastr.js" type="text/javascript"></script>

    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="../../../filepond/dist/filepond.min.js"></script>

  <script src="../../../app-assets/vendors/js/gallery/photo-swipe/photoswipe.min.js"
  type="text/javascript"></script>
  <script src="../../../app-assets/vendors/js/gallery/photo-swipe/photoswipe-ui-default.min.js"
  type="text/javascript"></script>
  

    <script src="../../../js/view/mail/router.js"></script>
    <script src="../../../js/view/mail/mainController.js"></script>
    <script src="../../../js/view/mail/mailboxController.js"></script>
    <script src="../../../js/view/mail/detailController.js"></script>
@endsection