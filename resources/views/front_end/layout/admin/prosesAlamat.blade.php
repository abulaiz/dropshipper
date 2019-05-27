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

<section id="morris-charts">
 <!-- Smooth Area Chart -->
    <div class="row">
        <div class="col-12">
            <div class="card">

            <div class="card-header">
                <h4 class="card-title">Proses Alamat Pengiriman</h4><br>
                    <div class="col-md-3">
                        
                        <div class="input-group input-append date" id="dpMonths" data-date="102/2012" data-date-format="dd/mm/yyyy" data-date-viewmode="date" data-date-viewmode="years" data-date-minviewmode="months">
                                <div class="input-group-prepend">
                                    <span class="input-group-text add-on"><i class="ft-calendar"></i></span>
                                </div>
                                <input type="text" class="form-control datepicker-default span2" value="" readonly="" />
                            </div>

                    </div>
                </div>

                <div class="card-body">
                      <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="example">
                                <thead>
                                    <tr>
                                        <th>ID Order</th>
                                        <th>Member</th>
                                        <th>Nama Produk</th>
                                        <th>Jumlah</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>aaa</td>
                                        <td>aaa</td>
                                        <td>aa</td>
                                        <td>aa</td>
                                        <td>
                                            <button type="button" class="btn btn-outline-info dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" size="100">Action</button>
                                            <div class="dropdown-menu" x-placement="bottom-start" >
                                              <a class="dropdown-item" ng-click="" data-toggle="modal" data-target="">
                                                <i class="fa fa-file-o mr-1"></i>Update</a>  
                                              <div class="dropdown-divider"></div>                           
                                              <a class="dropdown-item">
                                                <i class="fa fa-print mr-1"></i>Print</a>                                                                                   
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                </div>       
            </div>
        </div>
    </div>
    </section>

  @endsection

@section('customJS')

    <!-- Datepicker -->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/new_ext/datepicker/datepicker.css">
    <script src="../../../app-assets/new_ext/datepicker/bootstrap-datepicker.js"></script>
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/extensions/responsive.dataTables.min.css">
    <script src="../../../app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="../../../app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable( {
                            rowReorder: {
                                selector: 'td:nth-child(2)'
                            },
                            responsive: true
                        });
        });

            $('#dpMonths').datepicker();

    </script>
@endsection
