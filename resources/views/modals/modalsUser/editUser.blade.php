<!-- Awal Modal Edit -->
<div class="modal animated pulse text-left" id="edituser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="myModalLabel35"><oh i class="fa fa-pencil-square-o primary">&nbspInput New Password</i></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" id="editUser" action="{{ route('updateUser') }}" ng-submit='submit($event)'>
        <div class="modal-body">
            @csrf
            <fieldset>
              <label>New Password : </label>   
              <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon3"><i class="fa fa-key"></i></span>
                  </div>
                      <input type="text" id="password" class="form-control" aria-describedby="basic-addon3" name="password">
              </div>
            </fieldset><br>
        </div>
        <div class="modal-footer">
            <input type="reset" class="btn btn-primary btn-lg" data-dismiss="modal" value="Kembali">
            <input type="submit" ng-disabled='requested' class="btn btn-danger btn-lg" value="Change Password">
        </div>
      </form>
    </div>
  </div>
</div>
  <!-- Akhir Modal Edit -->
