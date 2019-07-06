@extends('layouts.master')
@section('request_order', 'active')
@section('page_title', 'Request Order')

@section('content')

<div class="alert bg-pink alert-icon-left alert-arrow-left mb-2" role="alert">
  <span class="alert-icon"><i class="fa fa-info"></i></span>
  <strong>TIPS ! .</strong> Untuk mengecek pembayaran member, gunakan ID Order sebagai kata kunci pencarian pesan.
</div>

<section id="tab-pane1" ng-controller='table'>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Order Request List</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">

                        <div class="table-responsive" style="display: none;">
                            <table class="table table-striped table-bordered" id="example">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>ID Order</th>
                                        <th>Member</th>
                                        <th>Nama Produk</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat='x in datas'>
                                        <td>{* x.tanggal *}</td>
                                        <td>{* x.id *}</td>
                                        <td>{* x.member *}</td>
                                        <td>{* x.produk *}</td>
                                        <td>
                                            <button type="button" class="btn btn-outline-info dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                            <div class="dropdown-menu" x-placement="bottom-start" >
                                              <a class="dropdown-item" ng-click="details($index)" data-toggle="modal" data-target="#detail">
                                                <i class="fa fa-file-o mr-1"></i>Detail</a>  
                                              <div class="dropdown-divider"></div>                           
                                              <a class="dropdown-item" ng-click="confirm($index, $event.currentTarget)">
                                                <i class="fa fa-check mr-1"></i>Konfirmasi</a>     
                                              <a class="dropdown-item" ng-click="reject($index, $event.currentTarget)">
                                                <i class="fa fa-times mr-1"></i>Tolak</a>                                                                                        
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
      @include('modals.orderDetail')
    </div>

</section>


@endsection

@section('customJS')
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/loaders/loaders.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/colors/palette-loader.css">

    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/extensions/responsive.dataTables.min.css">
    <script src="../../../app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="../../../app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
      
    <script src="../../../app-assets/vendors/js/extensions/sweetalert.min.js" type="text/javascript"></script>
    <script src="../../../js/plugin/confirmDialog.js" type="text/javascript"></script>

    <script src="../../../js/view/adminOrder/tableController.js" type="text/javascript"></script>

@endsection
