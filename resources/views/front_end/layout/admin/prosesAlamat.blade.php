@extends('layouts.master')
@section('prosesAlamat', 'active')

@section('content')

<div class="breadcrumb-wrapper col-12">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a>
        </li>
        <li class="breadcrumb-item active"><i class="fa fa-map-signs">&nbsp Proses Alamat Pengiriman</i>
        </li>
    </ol>
</div>

<div class="alert bg-pink alert-icon-left alert-arrow-left mb-2" role="alert">
  <span class="alert-icon"><i class="fa fa-info"></i></span>
  <strong>TIPS ! .</strong> Untuk mengecek pembayaran member, gunakan ID Pengiriman sebagai kata kunci pencarian pesan.
</div>

<section id="tab-pane1" ng-controller='statusSending'>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Order Progres List</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">

                        <div class="table-responsive" style="display: none;">
                            <table class="table table-striped table-bordered" id="example">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>ID</th>
                                        <th>Member</th>
                                        <th>Nama Produk</th>
                                        <th>Jumlah</th>
                                        <th>Status</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat='x in datas'>
                                        <td>{* x.tanggal *}</td>
                                        <td>{* x.id *}</td>
                                        <td>{* x.member *}</td>
                                        <td>{* x.nama_produk *}</td>
                                        <td>{* x.jumlah *}</td>
                                        <td>{* viewStatus(x.status) *}</td>
                                        <td>
                                            <button type="button" class="btn btn-outline-info dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                            <div class="dropdown-menu" x-placement="bottom-start" >
                                              <a class="dropdown-item" ng-click="detail($index)" data-toggle="modal" data-target="#detail">
                                                <i class="fa fa-file-o mr-1"></i>Detail</a> 

                                              <div ng-if="x.status == '2'">
                                                  <a class="dropdown-item" ng-click="payed($index)">
                                                    <i class="fa fa-money mr-1"></i>Konfirmasi Pembayaran</a>                                                  
                                              </div>
                                              
                                              <div ng-if="x.status == '3'">
                                                  <a class="dropdown-item" ng-click="sended($index)">
                                                    <i class="fa fa-money mr-1"></i>Barang Telah dikirim</a>   
                                              </div>

                                              <div ng-if="x.status == '1'">
                                                  <a class="dropdown-item" data-toggle="modal" data-target="#input" ng-click="input($index)">
                                                    <i class="fa fa-money mr-1"></i>Input Harga</a>                                                
                                                  <div class="dropdown-divider"></div>                               
                                                  <a class="dropdown-item" ng-click="cancel($index, $event.currentTarget)">
                                                    <i class="fa fa-times mr-1"></i>Tolak</a>                                               
                                              </div>

                                            </div>                                            
                                        </td>
                                    </tr>                                    
                                </tbody>
                            </table>
                        </div>
                        <div class="loader-wrapper" id="table-loader">
                          <div class="loader-container">
                            <div class="ball-beat loader-info">
                              <div></div>
                              <div></div>
                              <div></div>
                            </div>
                          </div>
                        </div>        

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade text-left" id="detail" tabindex="-1" role="dialog"  aria-hidden="true">
      @include('modals.sendingDetail')
    </div>   
    <div class="modal fade text-left" id="input" tabindex="-1" role="dialog"  aria-hidden="true">
      @include('modals.inputSenderPrice')
    </div>        
</section>

@endsection

@section('customJS')
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/loaders/loaders.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/colors/palette-loader.css">

    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/datatables.min.css">
    <script src="../../../app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
      
    <script type="text/javascript" src="../../../js/cleave/cleave.js"></script>

    <script src="../../../app-assets/vendors/js/extensions/sweetalert.min.js" type="text/javascript"></script>
    <script src="../../../js/plugin/confirmDialog.js" type="text/javascript"></script>

    <script src="../../../js/view/adminSending/requestSendingController.js" type="text/javascript"></script>
@endsection
