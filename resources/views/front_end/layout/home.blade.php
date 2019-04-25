@extends('layouts.master')
@section('home', 'active')

@section('content')

<!-- Sales stats -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 col-sm-12 border-right-blue-grey border-right-lighten-5">
                            <div class="pb-1">
                                <div class="clearfix mb-1">
                                    <i class="icon-star font-large-1 blue-grey float-left mt-1"></i>
                                    <span class="font-large-2 text-bold-300 info float-right">5,879</span>
                                </div>
                                <div class="clearfix">
                                    <span class="text-muted">Products</span>
                                    <span class="info float-right"><i class="ft-arrow-up info"></i> 16.89%</span>
                                </div>
                            </div>
                            <div class="progress mb-0" style="height: 7px;">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-12 border-right-blue-grey border-right-lighten-5">
                            <div class="pb-1">
                                <div class="clearfix mb-1">
                                    <i class="icon-user font-large-1 blue-grey float-left mt-1"></i>
                                    <span class="font-large-2 text-bold-300 danger float-right">423</span>
                                </div>
                                <div class="clearfix">
                                    <span class="text-muted">Orders</span>
                                    <span class="danger float-right"><i class="ft-arrow-up danger"></i> 5.14%</span>
                                </div>
                            </div>
                            <div class="progress mb-0" style="height: 7px;">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-12 border-right-blue-grey border-right-lighten-5">
                            <div class="pb-1">
                                <div class="clearfix mb-1">
                                    <i class="icon-shuffle font-large-1 blue-grey float-left mt-1"></i>
                                    <span class="font-large-2 text-bold-300 success float-right">61%</span>
                                </div>
                                <div class="clearfix">
                                    <span class="text-muted">Conversion</span>
                                    <span class="success float-right"><i class="ft-arrow-down success"></i> 2.24%</span>
                                </div>
                            </div>
                            <div class="progress mb-0" style="height: 7px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-12">
                            <div class="pb-1">
                                <div class="clearfix mb-1">
                                    <i class="icon-wallet font-large-1 blue-grey float-left mt-1"></i>
                                    <span class="font-large-2 text-bold-300 warning float-right">$6,87M</span>
                                </div>
                                <div class="clearfix">
                                    <span class="text-muted">Profit</span>
                                    <span class="warning float-right"><i class="ft-arrow-up warning"></i> 43.84%</span>
                                </div>
                            </div>
                            <div class="progress mb-0" style="height: 7px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Sales stats -->

<!-- Custom view start -->
<section id="select-inputs">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">List View Barang</h4><br>
                    <button class="ui-button ui-widget ui-corner-all btn-danger mb-2" data-toggle="modal" data-target="#tambahorder"><i class="fa fa-plus"></i>  Order</button>


                        <div class="card-content collapse show">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered datatable-select-inputs" id="example">
                                <thead>
                                    <tr>
                                        <th>Nama Produk</th>
                                        <th>Jumlah</th>
                                        <th>Keterangan</th>
                                        <th>Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
                                        <td>$320,800</td>
                                    </tr>
                                    <tr>
                                        <td>Garrett Winters</td>
                                        <td>63</td>
                                        <td>2011/07/25</td>
                                        <td>$170,750</td>
                                    </tr>
                                    <tr>
                                        <td>Ashton Cox</td>
                                        <td>66</td>
                                        <td>2009/01/12</td>
                                        <td>$86,000</td>
                                    </tr>
                                    <tr>
                                        <td>Cedric Kelly</td>
                                        <td>22</td>
                                        <td>2012/03/29</td>
                                        <td>$433,060</td>
                                    </tr>
                                    <tr>
                                        <td>Airi Satou</td>
                                        <td>33</td>
                                        <td>2008/11/28</td>
                                        <td>$162,700</td>
                                    </tr>
                                    <tr>
                                        <td>Brielle Williamson</td>
                                        <td>61</td>
                                        <td>2012/12/02</td>
                                        <td>$372,000</td>
                                    </tr>
                                </tbody>
                            </table>
                    </div>
                </div>
                </div>
                </div>
            </div>
        </div>
</section>
<!-- Custom view end -->
@include('modals.addOrder')
@endsection

@section('customJS')
    <script src="../../../app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="../../../app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready(function() {
    var table = $('#example').DataTable( {
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        responsive: true
    } );
} );
    </script>
@endsection