@extends('layouts.master')
@section('user', 'active')

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

                    <button class="ui-button ui-widget ui-corner-all btn-danger mb-2" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#tambahuser"><i class="fa fa-user-plus"></i>  Tambah User</button>

                    <div class="table-responsive">
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
                                            <div class="dropdown-menu" x-placement="bottom-start" >          
                                              <a class="dropdown-item" ng-click="updates($index)" data-toggle="modal" data-target="#edituser">
                                                <i class="fa fa-check mr-1"></i>Ubah</a>     
                                              <a class="dropdown-item" ng-click="delete($index, $event.currentTarget)">
                                                <i class="fa fa-times mr-1"></i>Hapus</a>              
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
</section>

    @include('modals.modalsUser.addUser')
    @include('modals.modalsUser.editUser')
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
    <script type="text/javascript" src="../../../js/view/user/tableController.js"></script>
@endsection
