<!-- Awal Modal Edit -->
<div class="modal animated pulse text-left" id="edituser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="myModalLabel35"><oh i class="fa fa-pencil-square-o primary">&nbspMasukkan Password Baru</i></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
          <fieldset>
            <label>Password baru: </label>   
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3"><i class="fa fa-key"></i></span>
                </div>
                    <input type="text" id="password" autocomplete="off" class="form-control" aria-describedby="basic-addon3" name="password">
            </div>
          </fieldset><br>
      </div>
      <div class="modal-footer">
          <input type="reset" class="btn btn-primary" data-dismiss="modal" value="Kembali" id="close">
          <button ng-click="edituser()" class="btn btn-danger">Simpan Perubahan</button>
      </div>

    </div>
  </div>
</div>
  <!-- Akhir Modal Edit -->
