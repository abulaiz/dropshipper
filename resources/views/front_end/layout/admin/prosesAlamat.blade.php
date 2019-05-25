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

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card border-danger bg-transparent">
                                <div class="card-content">
                                    <div class="card-body pt-3">
                                        <div class="table-responsive">
                                            <table class="table">
                                              <thead>
                                                <tr>
                                                  <th colspan="2"><center>STOCKISTMOC DROPSHIPPER</center></th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <tr>
                                                  <td width="185px">Nama Product &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</td>
                                                  <td>Super Grow Up 1 Paket</td>
                                                </tr>
                                                <tr>
                                                  <td width="185px">Nama Penerima &nbsp&nbsp&nbsp&nbsp:</td>
                                                  <td>Derrick</td>
                                                </tr>
                                                <tr>
                                                  <td>Alamat Penerima &nbsp&nbsp: </td>
                                                  <td></td>
                                                </tr>   
                                                <tr>
                                                  <td>Nomer Penerima &nbsp&nbsp: </td>
                                                  <td></td>
                                                </tr>
                                                <tr>
                                                  <td>Nama Pengirim &nbsp&nbsp&nbsp&nbsp&nbsp: </td>
                                                  <td></td>
                                                </tr>
                                              </tbody>
                                            </table>
                                        </div>
                                    </div>
                                 </div>    
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card border-danger text-center bg-transparent">
                                <div class="card-content">
                                    <div class="card-body pt-3">
                                        
                                    </div>
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
            var table = $('#order').DataTable( {
                            rowReorder: {
                                selector: 'td:nth-child(2)'
                            },
                            responsive: true
                        });
        });

            $('#dpMonths').datepicker();

    </script>
@endsection
