@extends('layouts.master')
@section('stok_produk', 'active')
@section('page_title', 'Stok Barang')

@section('content')

<section id="tab-pane1" ng-controller='table'>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                <button class="pull-right btn btn-danger btn-sm" onclick="window.open('/stokBarang/print');"><i class="fa fa-print mr-1"></i>Cetak Data</button>

                    <h4>Stok Produk</h4>
                    <small class="text-mutted">Last updated at {* last_updated *}</small>
                </div>
                <div class="card-content">
                    <div class="card-body">

                        <div class="table-responsive" style="display: none;">
                            <table class="table table-striped table-bordered" id="example">
                                <thead>
                                    <tr>
                                        <th>Produk</th>
                                        <th>Masuk</th>
                                        <th>Keluar</th>
                                        <th>Sisa</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat='x in datas'>
                                        <td>{* x.name *}</td>
                                        <td>{* x.in *} {* x.type *}</td>
                                        <td>{* x.out *} {* x.type *}</td>
                                        <td>{* x.qty *} {* x.type *}</td>
                                        <td>
                                            <button class="btn btn-success btn-sm" ng-click="prep_add($index)" data-toggle="modal" data-target="#add">
                                             <i class="fa fa-plus mr-1"></i>Tambah Stok</button>  
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

    <div class="modal fade text-left" id="add" tabindex="-1" role="dialog"  aria-hidden="true">
      @include('modals.addProductStok')
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
    <script src="../../../js/plugin/leftToastr.js" type="text/javascript"></script>

    <script src="../../../js/view/productStock/tableController.js" type="text/javascript"></script>

@endsection
