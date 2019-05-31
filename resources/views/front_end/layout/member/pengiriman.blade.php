@extends('layouts.master')

@section('customHead')
<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
@endsection

@section('inputSending', 'active')

@section('content')

<div class="breadcrumb-wrapper col-12">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">Home</a>
      </li>
      <li class="breadcrumb-item active"><i class="fa fa-pencil-square-o">&nbspInput Alamat Pengiriman</i>
      </li>
    </ol>
</div>

<section id="morris-charts" ng-controller='inputForm'>
    <div class="container padding-cont">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table">
                                  <thead class="thead-dark">
                                    <tr>
                                      <th colspan="2">FORM INPUT PENGIRIMAN</th>
                                    </tr>
                                  </thead>
                                </table>
                                <fieldset>
                                    <label>Produk : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-tag"></i></span>
                                        </div>
                                        <select class="form-control" ng-model="product_id">
                                            <option value="" ng-disabled='product_default_option'>- Pilih Produk -</option>  
                                            <option value="{* x.product_id *}" ng-repeat='x in product_options'> {* x.name *} </option>
                                        </select>
                                    </div>
                                </fieldset>
                                <br>
                                <fieldset>
                                    <label>Jumlah {* availableStockCaption *} : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-tags"></i></span>
                                        </div>
                                        <input type="number" class="form-control" min="1" ng-model='qty_sending' placeholder="Jumlah Pengiriman">
                                    </div>
                                </fieldset>
                                <br>                            
                                <fieldset>
                                    <label>Nama Pengirim : </label>    
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-user-circle"></i></span>
                                        </div>
                                        <input type="hidden" name="defaultSender" value="{{ Auth::user()->name }}">
                                        <input type="text" class="form-control" ng-model='sender_name' placeholder="Masukkan Nama Pengirim">
                                    </div>
                                </fieldset>
                                <br>                            
                                <fieldset>
                                    <label>Nama Penerima : </label>   
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Masukkan Nama Penerima" ng-model='receiver_name'>
                                    </div>
                                </fieldset>
                                <br>
                                <fieldset>
                                    <label>Alamat Penerima : </label>  
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-bookmark"></i></span>
                                        </div>
                                        <textarea class="form-control" ng-model='receiver_address' placeholder="Masukkan Alamat Penerima"></textarea>
                                    </div>
                                </fieldset>
                                <br>
                                <fieldset>
                                    <label>Nomer Penerima : </label>    
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-phone-square"></i></span>
                                        </div>
                                        <input type="text" class="form-control" ng-model='phone_number' placeholder="Masukkan Nomer Penerima">
                                    </div>
                                </fieldset>
                                <br>
                                <fieldset>
                                    <label>Tujuan Negara : </label>   
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                                        </div>
                                        <textarea class="form-control" ng-model='destination' placeholder="Opsional Jika Melakukan pengiriman ke luar negri"></textarea>
                                    </div>
                                </fieldset>
                                <br>                            
                            </div>
                            <div class="col-md-6">
                                <fieldset class="form-group">  
                                    <table class="table">
                                          <thead class="thead-dark">
                                            <tr>
                                              <th colspan="2">JENIS ORDERAN</th>
                                            </tr>
                                          </thead>
                                    </table>
                                    <small class="text-muted mb-1" style="font-style: italic; display: block;">* Klik atau tap salah satu icon terpilih</small>
                                    <label>Via Media Sosial :</label><br>
                                        <label class="btn">
                                            <input type="radio" name="orderVia_id" ng-click='setOrderVia(1)'>
                                            <img src="../../../img/wa.png" width="40px" height="40px">
                                        </label>
                                        <label class="btn">
                                            <input type="radio" name="orderVia_id" ng-click='setOrderVia(2)'>
                                            <img src="../../../img/ig.png" width="40px" height="40px">
                                        </label>
                                        <label class="btn">
                                            <input type="radio" name="orderVia_id" ng-click='setOrderVia(3)'>
                                            <img src="../../../img/ln.png"  width="40px" height="40px">
                                        </label>
                                        <br>
                                    <label>Via Toko Online :</label><br>
                                        <label class="btn">
                                          <input type="radio" name="orderVia_id" ng-click='setOrderVia(4)'>
                                          <img src="../../../img/bl.png" width="80px" height="60px">
                                        </label>
                                        <label class="btn">
                                          <input type="radio" name="orderVia_id" ng-click='setOrderVia(5)' ng-click="cek()">
                                          <img src="../../../img/tp.png" width="75px" height="70px">
                                        </label>
                                        <label class="btn">
                                          <input type="radio" name="orderVia_id" ng-click='setOrderVia(6)'>
                                          <img src="../../../img/sp.png" width="70px" height="70px">
                                        </label>
                                </fieldset>
                                <div ng-show='bookedByMarketPlace'>                              
                                    <fieldset>
                                        <label>Masukkan Bukti Pemesanan : </label>
                                        <input type="file" name="attachment">
                                    </fieldset>
                                    <br>
                                    <fieldset>
                                      <div class="custom-control custom-radio">
                                        <input type="radio" ng-click="setOngkirGratis(false)" class="custom-control-input" name="customRadio" id="customRadio1" checked>
                                        <label class="custom-control-label" for="customRadio1">Ongkir berbayar</label>
                                      </div>
                                    </fieldset>
                                    <fieldset>
                                      <div class="custom-control custom-radio">
                                        <input type="radio" ng-click="setOngkirGratis(true)" class="custom-control-input" name="customRadio" id="customRadio2">
                                        <label class="custom-control-label" for="customRadio2">Ongkir gratis</label>
                                      </div>
                                    </fieldset>
                                    <br>                                  
                                    <fieldset ng-show="ongkirGratis">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-tag"></i></span>
                                            </div>
                                            <input type="text" class="form-control" ng-model='freeCode' placeholder="Masukkan Kode Booking">
                                        </div>
                                    </fieldset>                                
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
                                    <small class="text-muted mb-1" style="font-style: italic; display: block;">* Klik atau tap salah satu icon terpilih</small>                                
                                    <label class="btn">
                                        <input type="radio" name="courier_id" ng-click='setCourier(1)'>
                                        <img src="../../../img/sc.jpg" width="75px" height="75px">
                                    </label>
                                    <label class="btn" ng-show='bookedByMarketPlace'>
                                        <input type="radio" name="courier_id" ng-click='setCourier(2)'>
                                        <img src="../../../img/jn.jpg" width="75px" height="75px">
                                    </label>
                                    <label class="btn" ng-show='bookedByMarketPlace'>
                                        <input type="radio" name="courier_id" ng-click='setCourier(3)'>
                                        <img src="../../../img/jt.png"  width="75px" height="75px">
                                    </label>
                                </fieldset>                            
                            </div>
                            <div class="col-md-12 mt-3 mb-1">
                                <button ng-click='submit()' ng-disabled='onsubmit' class="btn btn-block btn-lg font-medium-1 btn-outline-danger">PROSES PENGIRIMAN</button>
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
    
    <!-- Radio & Check -->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/forms/icheck/icheck.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/forms/icheck/custom.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/Radioes-radios.css">
    <script src="../../../app-assets/vendors/js/forms/icheck/icheck.min.js"></script>
    <script src="../../../app-assets/js/scripts/forms/Radio-radio.js"></script>

    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>

    <script type="text/javascript" src="../../../js/view/memberSending/inputFormController.js"></script>

@endsection
