@extends('layouts.master')
@section('pendaftar_baru', 'active')

@section('content')

<section id="tab-pane1" ng-controller='table'>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Pendaftar Baru</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">

                        <div class="table-responsive" style="display: none;">
                            <table class="table table-striped table-bordered" id="example">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>No Tlp</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat='x in datas'>
                                        <td>{* x.created_at.substr(0, 10) *}</td>
                                        <td>{* x.name *}</td>
                                        <td>{* x.email *}</td>
                                        <td>{* x.phone *}</td>
                                        <td>
                                            <button type="button" class="btn btn-outline-info dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                            <div class="dropdown-menu" x-placement="bottom-start" >
                                                
                                                <a class="dropdown-item" ng-click="confirm($index)">
                                                <i class="fa fa-user-plus mr-1"></i>Konfirmasi</a>
 
                                                <div class="dropdown-divider"></div>                           
                                                   
                                                <a class="dropdown-item" ng-click="reject($index)">
                                                <i class="fa fa-user-times mr-1"></i>Tolak</a>                                                                                                
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

    <script src="../../../js/view/user/registrantController.js" type="text/javascript"></script>

@endsection
