<!-- Awal Modal Add -->
<div ng-controller="modalOrder" class="modal animated pulse text-left" id="tambahorder" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="myModalLabel35"><oh i class="icon-basket-loaded primary">&nbspOrder Barang</i></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="">
        <div class="modal-body">
            @csrf
            <label>Produk</label>
            <fieldset class="form-group position-relative has-icon-left">
                <select class="form-control" required ng-model='product_id'>
                  <option value="" ng-disabled='product_default_option'>- Pilih Produk -</option>  
                  <option value="{* x.id *}" ng-repeat='x in product_options'> {* x.name *} </option>
                </select>
                <div class="form-control-position">
                <i class="icon-tag"></i>
                </div>
            </fieldset>

            <label for="jenis">Harga Satuan ({* jenisPaket *})</label>
            <fieldset class="form-group position-relative has-icon-left">
                <input type="text" class="form-control moneyformat" ng-model='price' readonly="true">
                <div class="form-control-position">
                <i class="icon-drawer primary"></i>
                </div>
            </fieldset>

            <label for="jenis">Jenis Paket</label>
            <fieldset class="form-group position-relative has-icon-left">
                <input type="text" class="form-control" ng-model='jenisPaket' readonly="true">
                <div class="form-control-position">
                <i class="icon-drawer primary"></i>
                </div>
            </fieldset>

            <label for="jumlah">Jumlah Order (per {* jenisPaket *})</label>
            <fieldset class="form-group position-relative has-icon-left">
                <input type="number" min="1" class="form-control" ng-change='updatePrice()' ng-keyup='updatePrice()' name="qty" ng-model='jumlahOrder'>
                <div class="form-control-position">
                <i class="icon-note primary"></i>
                </div>
            </fieldset>

            <label for="jenis">Total Pembayaran</label>
            <fieldset class="form-group position-relative has-icon-left">
                <input type="text" class="form-control moneyformat" ng-model='totalPembayaran' readonly="true">
                <div class="form-control-position">
                <i class="icon-drawer primary"></i>
                </div>
            </fieldset>

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