@extends('layouts.master')
@section('historyOrder', 'active')

@section('content')

            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a>
                  </li>
                  <li class="breadcrumb-item active"><i class="fa fa-user">&nbspUser Member</i>
                  </li>
                </ol>
              </div>

<section id="morris-charts">
 <!-- Smooth Area Chart -->
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body">

                    <button class="ui-button ui-widget ui-corner-all btn-danger mb-2" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#tambahuser"><i class="fa fa-plus"></i>  Tambah User</button>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="order">
                                <thead>
                                    <tr>
                                        <th>Nama User</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                        </table>
                    </div>
                </div>       
            </div>
        </div>
    </div>
    </section>

    @include('modals.modalsUser.adduser')
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
