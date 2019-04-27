@extends('layouts.master')
@section('order', 'active')

@section('content')

<section id="tab-pane1">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-top-border no-hover-bg">
                          <li class="nav-item">
                            <a class="nav-link active" id="home-tab1" data-toggle="tab" href="#home1" aria-controls="home1" aria-expanded="true"><i class="fa fa-inbox"></i>Status Order</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="profile-tab1" data-toggle="tab" href="#profile1" aria-controls="profile1" aria-expanded="false"><i class="fa fa-flag"></i>History Order</a>
                          </li>
                        </ul> 
                        <div class="tab-content px-1 pt-1">
                            <div  role="tabpanel" class="tab-pane active" id="home1" aria-labelledby="home-tab1" aria-expanded="true">
                                <!-- Custom view start -->
                                                <div class="card-content collapse show">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered datatable-select-inputs" id="order">
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
                                <!-- Custom view end -->
                            </div>
                            <div class="tab-pane" id="profile1" aria-labelledby="profile-tab1">
                                 <!-- Custom view start -->
                                         <table class="table table-striped table-bordered datatable-select-inputs" id="order2" width="100%">
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
    </div>
</section>

@endsection

@section('customJS')
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

var table = $('#order2').DataTable( {
rowReorder: {
selector: 'td:nth-child(2)'
},
responsive: true
});
        });
    </script>
@endsection
