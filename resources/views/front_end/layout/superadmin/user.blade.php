@extends('layouts.master')
@section('member_terdaftar', 'active')

@section('content')

            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a>
                  </li>
                  <li class="breadcrumb-item active"><i class="fa fa-user">&nbspUser Member</i>
                  </li>
                </ol>
              </div>

<section id="morris-charts" ng-controller='table'>
 <!-- Smooth Area Chart -->
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body">

                    <div class="table-responsive" style="display: none;">
                      <table class="table table-striped table-bordered" id="example">
                              <thead>
                                  <tr>
                                      <th>Nama User</th>
                                      <th>Email</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr ng-repeat='x in datas'>
                                      <td>{* x.name *}</td>
                                      <td>{* x.email *}</td>
                                      <td>
                                          <button type="button" class="btn btn-outline-info dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                          <div class="dropdown-menu" x-placement="bottom-start">                                              
                                            <a class="dropdown-item" ng-click="order_history($index)" data-toggle="modal" data-target="#history_order"><i class="fa fa-pencil-square-o mr-1"></i>Riwayat Order</a>

            <!--                                 <a class="dropdown-item" ng-click="sending_history($index)" data-toggle="modal" data-target="#edituser"><i class="fa fa-external-link mr-1"></i>Riwayat Pengiriman</a> -->

                                            <a class="dropdown-item" ng-click="show_modal_edit_user($index)" data-toggle="modal" data-target="#edituser"><i class="fa fa-key mr-1"></i>Ganti Password</a>                                                                                        
                                            <div class="dropdown-divider"></div>   
                                            <a class="dropdown-item" ng-click="delete($index, $event.currentTarget)">
                                              <i class="fa fa-times mr-1"></i>Hapus Akun</a>              
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

    @include('modals.modalsUser.editUser')

    <div class="modal fade text-left" id="history_order" tabindex="-1" role="dialog"  aria-hidden="true">
      @include('modals.historyOrder')
    </div>    

    <div class="modal fade text-left" id="add" tabindex="-1" role="dialog"  aria-hidden="true">
      @include('modals.addProductStok')
    </div>

</section>

  @endsection

@section('customJS')
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/loaders/loaders.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/colors/palette-loader.css">

    <script src="../../../app-assets/vendors/js/extensions/sweetalert.min.js" type="text/javascript"></script>
    <script src="../../../js/plugin/confirmDialog.js" type="text/javascript"></script>
    <script src="../../../js/plugin/leftToastr.js" type="text/javascript"></script>

    <!-- Datepicker -->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/new_ext/datepicker/datepicker.css">
    <script src="../../../app-assets/new_ext/datepicker/bootstrap-datepicker.js"></script>
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/extensions/responsive.dataTables.min.css">
    <script src="../../../app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="../../../app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="../../../js/view/user/tableController.js"></script>
@endsection
