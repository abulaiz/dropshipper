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