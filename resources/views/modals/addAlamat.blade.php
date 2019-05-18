<!-- Awal Modal Add -->
<div ng-controller="modalAlamat" class="modal animated pulse text-left" id="tambahalamat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="myModalLabel35"><oh i class="fa fa-pencil-square-o primary">&nbspInput Alamat Pengiriman</i></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" id="addAlamat" action="" ng-submit='submit($event)'>
        <div class="modal-body">
            @csrf
            <label>Produk</label>
            <fieldset class="form-group position-relative has-icon-left">
                <select class="form-control" required ng-model='product_id' name="product_id">
                  <option value="" ng-disabled='product_default_option'>- Pilih Produk -</option>  
                  <option value="{* x.id *}" ng-repeat='x in product_options'> {* x.name *} </option>
                </select>
                <div class="form-control-position">
                <i class="icon-tag"></i>
                </div>
            </fieldset>

            <label for="jenis">Nama penerima</label>
            <fieldset class="form-group position-relative has-icon-left">
                <input type="text" class="form-control moneyformat" ng-model='namaPenerima'>
                <div class="form-control-position">
                <i class="icon-user primary"></i>
                </div>
            </fieldset>

            <label for="jenis">Alamat Penerima</label>
            <fieldset class="form-group position-relative has-icon-left">
                <textarea class="form-control"></textarea>
                <div class="form-control-position">
                <i class="icon-note primary"></i>
                </div>
            </fieldset>

            <label for="jumlah">No. Penerima</label>
            <fieldset class="form-group position-relative has-icon-left">
                <input type="text" class="form-control" ng-change='' ng-keyup='' name="" ng-model=''>
                <div class="form-control-position">
                <i class="icon-screen-smartphone primary"></i>
                </div>
            </fieldset>

            <label for="jenis">Pengirim</label>
            <fieldset class="form-group position-relative has-icon-left">
                <input type="text" class="form-control moneyformat" ng-model='totalPembayaran' readonly="true">
                <div class="form-control-position">
                <i class="icon-user primary"></i>
                </div>
            </fieldset>

            <label>Jenis Orderan</label>
            <fieldset class="form-group position-relative has-icon-left">
                <select class="form-control" required ng-model='' name="">
                  <option value="" ng-disabled=''>- Jenis Orderan -</option>  
                  <option value=""> <i class="icon-tag"> Via Whatsapp </i> </option>
                  <option value=""> Via Line </option>
                  <option value=""> Via Instagram </option>
                  <option value=""> Via Tokopedia </option>
                  <option value=""> Via Shopee </option>
                  <option value=""> Via Bukalapak </option>
                </select>
                <div class="form-control-position">
                <i class="icon-tag"></i>
                </div>
            </fieldset>

        </div>
        <div class="modal-footer">
            <input type="reset" class="btn btn-primary btn-lg" data-dismiss="modal" value="Kembali">
            <input type="submit" ng-disabled='requested' class="btn btn-danger btn-lg" value="Tambah Alamat">
        </div>
      </form>
    </div>
  </div>
</div>
  <!-- Akhir Modal Add -->