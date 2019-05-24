@extends('layouts.master')
@section('historyOrder', 'active')

@section('content')

            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a>
                  </li>
                  <li class="breadcrumb-item active"><i class="fa fa-pencil-square-o">&nbspInput Alamat Pengiriman</i>
                  </li>
                </ol>
              </div>

<section id="morris-charts">
 <!-- Smooth Area Chart -->
 <div class="container padding-cont">
    <div class="row">
        <div class="col-12">
            <div class="card">
<!--                 <div class="card-header">
                    <h4 class="card-title">Input Alamat Pengiriman</h4><br>
                </div> -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                    <form method="POST" id="" action="" ng-submit=''>
                    <table class="table">
                      <thead class="thead-dark">
                        <tr>
                          <th colspan="2">FORM INPUT PENGIRIMAN</th>
                        </tr>
                      </thead>
                </table>
                    <fieldset>
                    <label>Nama Penerima : </label>   
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3"><i class="fa fa-user"></i></span>
                        </div>
                            <input type="text" class="form-control" placeholder="Masukkan Nama Penerima" aria-describedby="basic-addon3">
                    </div>
                    </fieldset>
                    <br>
                    <fieldset>
                        <label>Produk : </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon3"><i class="fa fa-tag"></i></span>
                            </div>
                        <select class="form-control" required ng-model='product_id' name="product_id">
                          <option value="" ng-disabled='product_default_option'>- Pilih Produk -</option>  
                          <option value="{* x.id *}" ng-repeat='x in product_options'> {* x.name *} </option>
                        </select>
                        </div>
                    </fieldset>
                    <br>
                    <fieldset>
                        <label>Jumlah</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon3"><i class="fa fa-tags"></i></span>
                            </div>
                        <input type="number" class="form-control" placeholder="Masukkan Nama Penerima" aria-describedby="basic-addon3">
                        </div>
                    </fieldset>
                    <br>
                    <fieldset>
                    <label>Alamat Penerima : </label>  
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3"><i class="fa fa-bookmark"></i></span>
                        </div>
                            <textarea class="form-control" placeholder="Masukkan Alamat Penerima"></textarea>
                    </div>
                    </fieldset>
                    <br>
                    <fieldset>
                    <label>Nomer Penerima : </label>    
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3"><i class="fa fa-phone-square"></i></span>
                        </div>
                            <input type="text" class="form-control" placeholder="Masukkan Nomer Penerima" aria-describedby="basic-addon3">
                    </div>
                    </fieldset>
                    <br>
                    <fieldset>
                    <label>Pengirim : </label>    
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3"><i class="fa fa-user-circle"></i></span>
                        </div>
                            <input type="text" class="form-control" placeholder="Masukkan Nama Pengirim" aria-describedby="basic-addon3">
                    </div>
                    <br>
                    </fieldset>
                    <fieldset>
                    <!-- <input type="reset" class="btn btn-primary btn-lg" value="RESET">
                    <input type="submit" ng-disabled='requested' class="btn btn-danger btn-lg" value="SUBMIT"> -->
<!--                 <label>Form Alamat Pengiriman :</label>
                <div class="table-responsive">
                    <table class="table">
                      <thead class="thead-dark">
                        <tr>
                          <th colspan="2"><center>STOCKISTMOC DROPSHIPPER</center></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td width="190px">Nama Penerima &nbsp&nbsp&nbsp&nbsp: </td>
                          <td>Otto</td>
                        </tr>
                        <tr>
                          <td>Alamat Penerima &nbsp&nbsp: </td>
                          <td>Thornton</td>
                        </tr>   
                        <tr>
                          <td>Nomer Penerima &nbsp&nbsp: </td>
                          <td>the Bird</td>
                        </tr>
                        <tr>
                          <td>Nama Pengirim &nbsp&nbsp&nbsp&nbsp&nbsp: </td>
                          <td>the Bird</td>
                        </tr>
                      </tbody>
                    </table>
                </div> -->
                </fieldset>
                <fieldset>
                    <label>Tujuan Kecamatan/Negara (LUAR NEGERI) : </label>    
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3"><i class="fa fa-map-pin"></i></span>
                        </div>
                            <input type="text" class="form-control" placeholder="Masukkan Tujuan Kecamatan/Negara (LUAR NEGERI)" aria-describedby="basic-addon3">
                    </div>
                </fieldset>
                </form>
                        </div>
                        
                        <div class="col-sm-6 ml-auto">

            <fieldset class="form-group">  
                
                <table class="table">
                      <thead class="thead-dark">
                        <tr>
                          <th colspan="2">JENIS ORDERAN</th>
                        </tr>
                      </thead>
                </table>
                <label>Via Media Sosial :</label><br>

                  <label class="btn">
                  <input type="radio" name="test" onclick="javascript:yesnoCheck();" value="small" id="noCheck">
                  <img src="../../../img/wa.png" width="40px" height="40px">
                  </label>

                    <label class="btn">
                      <input type="radio" name="test" onclick="javascript:yesnoCheck();" value="big" id="noCheck">
                      <img src="../../../img/ig.png" width="40px" height="40px">
                    </label>

                    <label class="btn">
                      <input type="radio" name="test" onclick="javascript:yesnoCheck();" value="big" id="noCheck">
                      <img src="../../../img/ln.png"  width="40px" height="40px">
                    </label><br>

                <label>Via Toko Online :</label><br>

                    <label class="btn">
                      <input type="radio" name="test" onclick="javascript:yesnoCheck();" value="small" id="yesCheck">
                      <img src="../../../img/bl.png" width="80px" height="60px">
                    </label>

                    <label class="btn">
                      <input type="radio" name="test" onclick="javascript:yesnoCheck();" value="big" id="iya">
                      <img src="../../../img/tp.png" width="75px" height="70px">
                    </label>

                    <label class="btn">
                      <input type="radio" name="test" onclick="javascript:yesnoCheck();" value="big" id="checks">
                      <img src="../../../img/sp.png" width="70px" height="70px">
                    </label>

            </fieldset>

            <div id="ifYes" style="visibility:hidden">
            <fieldset>
            <div class="d-inline-block custom-control custom-radio mr-1">
                <input type="radio" onclick="javascript:hiddenCheck();" class="custom-control-input" name="colorRadio" id="gratis">
                <label class="custom-control-label" for="gratis">Ongkir Gratis</label>
              </div>
              <div class="d-inline-block custom-control custom-radio mr-1">
                <input type="radio" onclick="javascript:hiddenCheck();" class="custom-control-input" name="colorRadio" id="nogratis" checked>
                <label class="custom-control-label" for="nogratis">Ongkir Bayar</label>
              </div>
            </fieldset>
            <br>

            <fieldset>
            <div id="ifFree" style="visibility:hidden">
               <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3"><i class="fa fa-tag"></i></span>
                        </div>
                            <input type="text" class="form-control" placeholder="Masukkan Kode Booking" aria-describedby="basic-addon3">
                    </div>
                </div>
            </fieldset>
            <br>
            <fieldset>

                    <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01">
                                <label class="custom-file-label" for="inputGroupFile01">Masukkan Bukti Orderan Via E-Commerce</label>
                    </div>

            </fieldset>
        </div>
            <br>
            <div id="ongkirK" style="visibility:visible;">
            <label>Jumlah Ongkos Kirim 1/Kg : </label>
            <div class="row">
            <div class="col-sm-4">
            <fieldset>    
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3"><i class="fa fa-usd"></i></span>
                        </div>
                            <input type="text" class="form-control" placeholder="10.000" aria-describedby="basic-addon3">
                    </div>
                    </fieldset>
            </div>
            x
            <div class="col-sm-4">
            <fieldset>    
                    <div class="input-group">
                        <div class="input-group-prepend">
                        </div>
                            <input type="text" class="form-control" placeholder="" aria-describedby="basic-addon3">
                    </div>
                    <br>
                    </fieldset>
            </div>
            </div>
            </div>


            <br>
            <fieldset class="form-group">  
                
                <table class="table">
                      <thead class="thead-dark">
                        <tr>
                          <th colspan="2">JASA KURIR</th>
                        </tr>
                      </thead>
                </table>

                  <label class="btn">
                  <input type="radio" name="test"  value="small">
                  <img src="../../../img/sc.jpg" width="75px" height="75px">
                  </label>

                    <label class="btn">
                      <input type="radio" name="test" value="big">
                      <img src="../../../img/jn.jpg" width="75px" height="75px">
                    </label>

                    <label class="btn">
                      <input type="radio" name="test" value="big">
                      <img src="../../../img/jt.png"  width="75px" height="75px">
                    </label>
                    <br>
                    <div align="right"></div>

            </fieldset>
                        </div>

                    <button class="btn btn-lg btn-block font-medium-1 btn-outline-danger mb-1 block-page">PROSES SEMUA</button>

                    </div>
                </div>
            </div>       
        </div>
    </div>
</div>
</section>

  @endsection

@section('customJS')
    
    <!-- Add On Block -->

    <script src="../../../app-assets/js/scripts/extensions/block-ui.js"></script>
    <!-- Radio & Check -->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/forms/icheck/icheck.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/forms/icheck/custom.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/Radioes-radios.css">
    <script src="../../../app-assets/vendors/js/forms/icheck/icheck.min.js"></script>
    <script src="../../../app-assets/js/scripts/forms/Radio-radio.js"></script>
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


        function yesnoCheck(){

            if (document.getElementById('yesCheck').checked) {
            document.getElementById('ifYes').style.visibility = 'visible';
             } else if (document.getElementById('iya').checked) {
                document.getElementById('ifYes').style.visibility = 'visible';
            } else if (document.getElementById('checks').checked) {
                document.getElementById('ifYes').style.visibility = 'visible';
            } 
            else document.getElementById('ifYes').style.visibility = 'hidden';
        }

        function hiddenCheck(){

            if (document.getElementById('gratis').checked) {
                if (document.getElementById('ifFree').style.visibility = 'visible') {
                    document.getElementById('ongkirK').style.visibility = 'hidden'};
             }  else if (document.getElementById('nogratis').checked) {
                if (document.getElementById('ifFree').style.visibility = 'hidden') {
                    document.getElementById('ongkirK').style.visibility = 'visible'};
                }
            }        

            $('#dpMonths').datepicker();


    </script>
@endsection
