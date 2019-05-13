@extends('layouts.master')
@section('historyOrder', 'active')

@section('content')

            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Home</a>
                  </li>
                  <li class="breadcrumb-item active">History Order
                  </li>
                </ol>
              </div>

<!-- Custom view start -->
<section id="select-inputs" ng-controller='table'>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">List View Barang</h4><br>
                    <button class="ui-button ui-widget ui-corner-all btn-danger mb-2" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#tambahorder"><i class="fa fa-plus"></i>  Order</button>
                    <div class="card-content collapse show">
                        <div class="table-responsive" style="display: none;">
                            <table class="table table-striped table-bordered dt-responsive" id="example">
                                <thead>
                                    <tr>
                                        <th>Nama Produk</th>
                                        <th>Stok</th>
                                        <th>Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat='x in datas'>
                                        <td>{* x.name *}</td>
                                        <td>{* x.qty *}</td>
                                        <td>{* x.price *}</td>
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
<!-- Custom view end -->

  @endsection

@section('customJS')
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/extensions/responsive.dataTables.min.css">
    <script src="../../../app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="../../../app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready(function() {
    var table = $('#order').DataTable( {
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        responsive: true
    } );
    </script>
@endsection
