@extends('layouts.master')
@section('prosesAlamat', 'active')
@section('page_title', 'Riwayat Member')

@section('content')

            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a>
                  </li>
                  <li class="breadcrumb-item active"><i class="fa fa-edit mr-1"> Detail Produk</i>
                  </li>
                </ol>
              </div>

<section id="morris-charts">
 <!-- Smooth Area Chart -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">DETAIL PRODUK</h4><br>
                    <div class="card border-success text-center bg-transparent">
                        <div class="card-content">
                            <div class="card-body">


<section class="card">
    <div id="invoice-template" class="card-body">
        <!-- Invoice Company Details -->
        <div id="invoice-company-details" class="row">
            <div class="col-md-6 col-sm-12 text-center text-md-left">
                <div class="media">
                    <img src="../../../img/logo.png" width="160" height="90" alt="company logo" class=""/>
                    <div class="media-body">
                        <ul class="ml-2 px-0 list-unstyled">
                            <li class="text-bold-800">STOCKISTMOC DROPSHIPPER</li>
                            <li>4025 Oak Avenue,</li>
                            <li>Melbourne,</li>
                            <li>Florida 32940,</li>
                            <li>Indonesia</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 text-center text-md-right">
                <h2>INVOICE</h2>
                <p class="pb-3"># INV-001001</p>
            </div>
        </div>
        <!--/ Invoice Company Details -->

        <!-- Invoice Customer Details -->
        <div id="invoice-customer-details" class="row pt-2">
            <div class="col-sm-12 text-center text-md-left">
                <p class="text-muted">Pembayaran Kepada :</p>
            </div>
            <div class="col-md-6 col-sm-12 text-center text-md-left">
                <ul class="px-0 list-unstyled">
                    <li class="text-bold-800">Mr. Bret Lezama</li>
                    <li>4879 Westfall Avenue,</li>
                    <li>Albuquerque,</li>
                    <li>Indonesia-40721.</li>
                </ul>
            </div>
            <div class="col-md-6 col-sm-12 text-center text-md-right">
                <p><span class="text-muted">Tanggal Faktur :</span> 06/05/2017</p>
                <p><span class="text-muted">Ketentuan :</span> Due on Receipt</p>
                <p><span class="text-muted">Jatuh Tempo :</span> 10/05/2017</p>
            </div>
        </div>
        <!--/ Invoice Customer Details -->

        <!-- Invoice Items Details -->
        <div id="invoice-items-details" class="pt-2">
            <div class="row">
                <div class="table-responsive col-sm-12">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>NO</th>
                          <th>PRODUCT</th>
                          <th class="text-right">NAMA PENERIMA</th>
                          <th class="text-right">ALAMAT</th>
                          <th class="text-right">JUMLAH</th>
                          <th class="text-right">TOTAL</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>
                            <p>Create PSD for mobile APP</p>
                            <p class="text-muted">Simply dummy text of the printing and typesetting industry.</p>
                          </td>
                          <td class="text-right">Kelvin Peter</td>
                          <td class="text-right">BOJONG SOANG</td>
                          <td class="text-right">120</td>
                          <td class="text-right">$ 2400.00</td>
                        </tr>
                      </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7 col-sm-12 text-center text-md-left">
                    <p class="lead">Metode Order :</p>
                    <div class="row">
                        <div class="col-md-8">
                        <table class="table table-borderless table-sm">
                            <tbody>
                                <tr>
                                    <td>Order Via:</td>
                                    <td class="text-right">WhatsApp</td>
                                </tr>
                                <tr>
                                    <td>Jasa Kurir Via:</td>
                                    <td class="text-right">JNE</td>
                                </tr>
                                <tr>
                                    <td>Tujuan Kecamatan:</td>
                                    <td class="text-right">Kelapa Gading</td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-2 ml-auto">
                    <a href="{{ route('my_file') }}"><button type="button" class="btn btn-info btn-lg my-1"><i class="fa fa-print mr-1"></i>PDF</button></a>
                </div>

            </div>
        </div>

    </div>
</section>                                
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
