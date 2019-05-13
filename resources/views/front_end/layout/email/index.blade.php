
@extends('layouts.master')
@section('email', 'active')

@section('content')
<div ng-controller='mail'>
    <div class="row" style="margin-bottom: 10px;">
        <div class="col-12">
            <button ng-disabled='onSending' data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#composeMail" class="btn btn-danger btn-sm pull-right">
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
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/loaders/loaders.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/colors/palette-loader.css">

    <script src="../../../js/view/mail/router.js"></script>
    <script src="../../../js/view/mail/mainController.js"></script>
    <script src="../../../js/view/mail/mailboxController.js"></script>
    <script src="../../../js/view/mail/detailController.js"></script>
@endsection