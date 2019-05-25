<!-- Awal Modal Add -->
<div ng-controller="modalAlamat" class="modal animated pulse text-left" id="tambahuser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="myModalLabel35"><oh i class="fa fa-pencil-square-o primary">&nbspInput User Member</i></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" id="addAlamat" action="" ng-submit='submit($event)'>
        <div class="modal-body">
            @csrf
                  <fieldset>
                    <label>Nama Lengkap : </label>   
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3"><i class="fa fa-user"></i></span>
                        </div>
                            <input type="text" class="form-control" placeholder="Masukkan Nama Lengkap" aria-describedby="basic-addon3">
                    </div>
                  </fieldset><br>

                  <fieldset>
                    <label>Username : </label>   
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3"><i class="fa fa-user-o"></i></span>
                        </div>
                            <input type="text" class="form-control" placeholder="Masukkan Username" aria-describedby="basic-addon3">
                    </div>
                  </fieldset><br>

                  <fieldset>
                    <label>Email : </label>   
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3"><i class="fa fa-envelope-o"></i></span>
                        </div>
                            <input type="email" class="form-control" placeholder="Masukkan Email" aria-describedby="basic-addon3">
                    </div>
                  </fieldset><br>

                  <fieldset>
                    <label>Password : </label>   
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3"><i class="fa fa-key"></i></span>
                        </div>
                            <input type="password" class="form-control" placeholder="Masukkan Password" aria-describedby="basic-addon3">
                    </div>
                  </fieldset><br>

        </div>
        <div class="modal-footer">
            <input type="reset" class="btn btn-primary btn-lg" data-dismiss="modal" value="Kembali">
            <input type="submit" ng-disabled='requested' class="btn btn-danger btn-lg" value="Tambah User">
        </div>
      </form>
    </div>
  </div>
</div>
  <!-- Akhir Modal Add -->