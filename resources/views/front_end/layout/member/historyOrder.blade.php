@extends('layouts.master')
@section('historyOrder', 'active')
@section('page_title', 'Riwayat Order')

@section('content')

    <div class="breadcrumb-wrapper col-12">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a>
          </li>
          <li class="breadcrumb-item active"><i class="fa fa-shopping-cart">&nbspHistory Order</i>
          </li>
        </ol>
    </div>

    <div class="row" ng-controller='historyOrder' style="margin: 5px;">
        <div class="col-md-3" style="margin-bottom: 20px;">
            <div class="input-group row">
                <div class="input-group-prepend">
                    <span onclick="showPanel(this)" class="input-group-text add-on"><i class="ft-calendar"></i></span>
                </div>
                <input name="startDate" id="startDate" class="date-picker" style="width: 78%;" placeholder="Pilih Bulan dan Tahun" />
            </div>
        </div>

        <div class="col-md-12" style="padding: unset;">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Rincian Total</h4>
              <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
              <div class="heading-elements">
                <ul class="list-inline mb-0">
                  <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                </ul>
              </div>
            </div>
            <div class="card-content collapse show">
              <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Nama Produk</th>
                                <th>Total Order</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat='x in all_data'>
                                <td>{* x.product_name *}</td>
                                <td>{* x.qty *}</td>
                                <td>{* x.description *}</td>
                            </tr>  
                            <tr ng-if='all_data.length == 0'>
                                <td colspan="3" style="text-align: center;">No data available in table</td>
                            </tr>                                                                       
                        </tbody>
                    </table>
                </div>
                <div class="loader-wrapper" style="display: none;">
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

        <div class="col-md-12" style="padding: unset;">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Rincian Per Tanggal</h4>
              <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
              <div class="heading-elements">
                <ul class="list-inline mb-0">
                  <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                </ul>
              </div>
            </div>
            <div class="card-content collapse show">
              <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Nama Produk</th>
                                <th>Jumlah</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat='x in periode_data'>
                                <td>{* x.date *}</td>
                                <td>{* x.product_name *}</td>
                                <td>{* x.qty *}</td>
                                <td>{* x.description *}</td>
                            </tr>  
                            <tr ng-if='periode_data.length == 0'>
                                <td colspan="4" style="text-align: center;">No data available in table</td>
                            </tr>                                  
                        </tbody>
                    </table>
                </div>
                <div class="loader-wrapper" style="display: none;">
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


  @endsection

@section('customJS')

    <!-- Loader -->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/loaders/loaders.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/colors/palette-loader.css">

    <!-- DataTables -->
   <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.0/css/jquery.dataTables.css">
   <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.7.1.min.js"></script>
   <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.0/jquery.dataTables.min.js"></script>

    <!-- Datepicker -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/base/jquery-ui.css">

    <style>
    .ui-datepicker-calendar {
        display: none;
    }
    </style>

    <script type="text/javascript" src="../../../js/view/memberOrder/historyController.js"></script>
@endsection
