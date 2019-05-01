@extends('layouts.master')
@section('order', 'active')

@section('content')

<section id="tab-pane1" ng-controller='table'>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Order Progres List</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">

                        <div class="table-responsive" style="display: none;">
                            <table class="table table-striped table-bordered dt-responsive" id="example">
                                <thead>
                                    <tr>
                                        <th>Nama Produk</th>
                                        <th>Jumlah</th>
                                        <th>ID Order</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat='x in datas1'>
                                        <td>{* x.nama_produk *}</td>
                                        <td>{* x.qty *}</td>
                                        <td>{* x.id *}</td>
                                        <td>{* x.tanggal *}</td>
                                        <td>{* x.status *}</td>
                                        <td>
                                            <button ng-click="cancel($index)" class="btn btn-sm btn-outline-danger">
                                                <i class="fa fa-times"></i>
                                                Batalkan
                                            </button>
                                        </td>
                                    </tr>                                    
                                    <tr ng-repeat='x in datas2'>
                                        <td>{* x.nama_produk *}</td>
                                        <td>{* x.qty *}</td>
                                        <td>{* x.id *}</td>
                                        <td>{* x.tanggal *}</td>
                                        <td>{* x.status *}</td>
                                        <td>-</td>
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

    <script src="../../../js/view/memberOrder/tableController.js" type="text/javascript"></script>
@endsection
