<!DOCTYPE html>
<html lang="en">
<head>
	@include('front_end.layout.master')
</head>
<body class="horizontal-layout horizontal-menu horizontal-menu-padding 2-columns   menu-expanded" data-open="hover" data-menu="horizontal-menu" data-col="2-columns">

	@include('front_end.layout.menu')

    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-dark navbar-without-dd-arrow navbar-shadow" role="navigation" data-menu="menu-wrapper">
      <div class="navbar-container main-menu-content container center-layout" data-menu="menu-container">
        <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">

        	<!-- Dashboard -->
          <li class="nav-item active"><a class="nav-link" href="/"><i class="icon-home"></i>Home</a>
          </li>

          <!-- Order -->
          <li class=" nav-item"><a class="nav-link" href="order"><i class="icon-basket-loaded"></i><span data-i18n="nav.templates.main">Order</span></a>
          </li>

          <!-- Pengiriman Produk -->
          <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="icon-note"></i><span data-i18n="nav.layouts.temp">Pengiriman Produk</span></a>
            <ul class="dropdown-menu">
              <li class="dropdown" data-menu="dropdown"><a class="dropdown-item" href="#" data-toggle="dropdown"><i class="fa fa-pencil-square-o"></i>Input Baru</a>
              </li>
              <li class="dropdown dropdown" data-menu="dropdown-"><a class="dropdown-item" href="#" data-toggle="dropdown"><i class="fa fa-bookmark"></i>Status Pengiriman</a>
              </li>
            </ul>
          </li>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>

    <div class="app-content container center-layout mt-2">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">


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



                    <!-- Awal Modal Add -->
                    <div class="modal animated pulse text-left" id="tambahorder" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h3 class="modal-title" id="myModalLabel35"><i class="icon-basket-loaded primary">&nbspOrder Barang</i></h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <form>
                                            <div class="modal-body">
                                                <label for="kategori">Kategori Produk</label>
                                                <fieldset class="form-group position-relative has-icon-left">
                                                    <select class="form-control">
                                                      <option value="">- Pilih Kategori -</option>  
                                                      <option value="">Calcium</option>
                                                      <option value="">SuperGrowUp</option>
                                                      <option value="">Spirulina</option>
                                                    </select>
                                                    <div class="form-control-position">
                                                    <i class="icon-tag"></i>
                                                    </div>
                                                </fieldset>
                                                <label for="produk">Kategori Produk</label>
                                                <fieldset class="form-group position-relative has-icon-left">
                                                    <select class="form-control">
                                                      <option value="">- Pilih Produk -</option>  
                                                      <option value="">Calcium</option>
                                                      <option value="">SuperGrowUp</option>
                                                      <option value="">Spirulina</option>
                                                    </select>
                                                    <div class="form-control-position">
                                                    <i class="icon-tag"></i>
                                                    </div>
                                                </fieldset>
                                                 <label for="jenis">Jenis Produk</label>
                                                <fieldset class="form-group position-relative has-icon-left">
                                                    <input type="text" class="form-control" id="Jumlah" placeholder="" readonly="true">
                                                    <div class="form-control-position">
                                                    <i class="icon-drawer primary"></i>
                                                    </div>
                                                </fieldset>
                                                    <label for="jumlah">Jumlah</label>
                                                <fieldset class="form-group position-relative has-icon-left">
                                                    <input type="text" class="form-control" id="Jumlah" placeholder="">
                                                    <div class="form-control-position">
                                                    <i class="icon-note primary"></i>
                                                    </div>
                                                </fieldset>
                                                <hr>
                                                <pre>
                                                <table width="40%">
                                                    <thead>
                                                        <tr>
                                                            <th>&nbspTOTAL HARGA</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody align="center">
                                                        <tr>
                                                            <td>Kategori             : </td>
                                                            <td>data</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Produk                : </td>
                                                            <td>data</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Jumlah                : </td>
                                                            <td>data</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Harga Satuan    : </td>
                                                            <td>data</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Total                    : </td>
                                                            <td>data</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </pre>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="reset" class="btn btn-primary btn-lg" data-dismiss="modal" value="Kembali">
                                                <input type="submit" class="btn btn-danger btn-lg" value="Order">
                                            </div>
                                          </form>
                                        </div>
                                      </div>
                                    </div>

                            <!-- Akhir Modal Add -->



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
                                    <tr>
                                        <td>Herrod Chandler</td>
                                        <td>59</td>
                                        <td>2012/08/06</td>
                                        <td>$137,500</td>
                                    </tr>
                                    <tr>
                                        <td>Rhona Davidson</td>
                                        <td>55</td>
                                        <td>2010/10/14</td>
                                        <td>$327,900</td>
                                    </tr>
                                    <tr>
                                        <td>Colleen Hurst</td>
                                        <td>39</td>
                                        <td>2009/09/15</td>
                                        <td>$205,500</td>
                                    </tr>
                                    <tr>
                                        <td>Sonya Frost</td>
                                        <td>23</td>
                                        <td>2008/12/13</td>
                                        <td>$103,600</td>
                                    </tr>
                                    <tr>
                                        <td>Jena Gaines</td>
                                        <td>30</td>
                                        <td>2008/12/19</td>
                                        <td>$90,560</td>
                                    </tr>
                                    <tr>
                                        <td>Quinn Flynn</td>
                                        <td>22</td>
                                        <td>2013/03/03</td>
                                        <td>$342,000</td>
                                    </tr>
                                    <tr>
                                        <td>Charde Marshall</td>
                                        <td>36</td>
                                        <td>2008/10/16</td>
                                        <td>$470,600</td>
                                    </tr>
                                    <tr>
                                        <td>Haley Kennedy</td>
                                        <td>43</td>
                                        <td>2012/12/18</td>
                                        <td>$313,500</td>
                                    </tr>
                                    <tr>
                                        <td>Tatyana Fitzpatrick</td>
                                        <td>19</td>
                                        <td>2010/03/17</td>
                                        <td>$385,750</td>
                                    </tr>
                                    <tr>
                                        <td>Michael Silva</td>
                                        <td>66</td>
                                        <td>2012/11/27</td>
                                        <td>$198,500</td>
                                    </tr>
                                    <tr>
                                        <td>Paul Byrd</td>
                                        <td>64</td>
                                        <td>2010/06/09</td>
                                        <td>$725,000</td>
                                    </tr>
                                    <tr>
                                        <td>Gloria Little</td>
                                        <td>59</td>
                                        <td>2009/04/10</td>
                                        <td>$237,500</td>
                                    </tr>
                                    <tr>
                                        <td>Bradley Greer</td>
                                        <td>41</td>
                                        <td>2012/10/13</td>
                                        <td>$132,000</td>
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
        </div>
    </div>
</div>
<!--/ most selling products-->

        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <footer class="footer footer-static footer-light navbar-shadow">
      <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2 container center-layout"><span class="float-md-left d-block d-md-inline-block">Copyright  &copy; 2018 <a class="text-bold-800 grey darken-2" href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" target="_blank">PIXINVENT </a>, All rights reserved. </span><span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">Hand-crafted & Made with <i class="ft-heart pink"></i></span></p>
    </footer>

    <!-- BEGIN VENDOR JS-->
    <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="../../../app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="../../../app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
    <script src="../../../app-assets/vendors/js/charts/raphael-min.js"></script>
    <script src="../../../app-assets/vendors/js/charts/morris.min.js"></script>
    <script src="../../../app-assets/vendors/js/charts/chart.min.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/moment.min.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/underscore-min.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/clndr.min.js"></script>
    <script src="../../../app-assets/vendors/js/charts/echarts/echarts.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/unslider-min.js"></script>
    <script src="../../../app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN ROBUST JS-->
    <script src="../../../app-assets/js/core/app-menu.js"></script>
    <script src="../../../app-assets/js/core/app.js"></script>
    <!-- END ROBUST JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="../../../app-assets/js/scripts/pages/dashboard-ecommerce.js"></script>
    <script src="../../../app-assets/js/scripts/modal/components-modal.js"></script>

    <!-- END PAGE LEVEL JS-->

    <!-- Responsive Datatables -->
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
  </body>
</html>