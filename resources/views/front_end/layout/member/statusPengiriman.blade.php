@extends('layouts.master')
@section('statusSending', 'active')

@section('content')

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
                                        <td>{* x.nama_produk *}</td>
                                        <td>{* x.jumlah *}</td>
                                        <td>{* viewStatus(x.status) *}</td>
                                        <td>
                                            <button type="button" class="btn btn-outline-info dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                            <div class="dropdown-menu" x-placement="bottom-start" >
                                              <a class="dropdown-item" ng-click="detail($index)" data-toggle="modal" data-target="#detail">
                                                <i class="fa fa-file-o mr-1"></i>Detail</a> 
                                              <div ng-if="x.status == '1' || x.status == '2'">
                                                  <div class="dropdown-divider"></div>                               
                                                  <a class="dropdown-item" ng-click="cancel($index, $event.currentTarget)">
                                                    <i class="fa fa-times mr-1"></i>Batalkan</a>                                               
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
</section>


@endsection

@section('customJS')
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/loaders/loaders.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/colors/palette-loader.css">

    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/datatables.min.css">
    <script src="../../../app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
      
    <script src="../../../app-assets/vendors/js/extensions/sweetalert.min.js" type="text/javascript"></script>
    <script src="../../../js/plugin/confirmDialog.js" type="text/javascript"></script>

    <script src="../../../js/view/memberSending/statusSendingController.js" type="text/javascript"></script>

@endsection
