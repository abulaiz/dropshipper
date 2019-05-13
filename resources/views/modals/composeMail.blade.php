<div class="modal animated pulse text-left" id="composeMail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-primary"><i class="icon-note primary mr-1"></i>Kirim Pesan @if(Auth::user()->hasRole('member')) ke Admin @endif</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" id="addOrder" action="{{ route('orderStock') }}" ng-submit='submit($event)'>
        <div class="modal-body">
            @if(!Auth::user()->hasRole('member'))
            <label>Tujuan</label>
            <fieldset class="form-group position-relative has-icon-left">
                <input type="text" ng-model='email' class="form-control">
                <div class="form-control-position">
                    <i class="icon-cursor primary"></i>
                </div>
            </fieldset>
            @else
            <input type="hidden" ng-model='email' ng-init='email=""' placeholder="Email Tujuan">
            @endif

            <label for="jenis">Subject</label>
            <fieldset class="form-group position-relative has-icon-left">
                <input ng-model='subject' type="text" class="form-control" placeholder="Subject">
                <div class="form-control-position">
                    <i class="icon-pin primary"></i>
                </div>
            </fieldset>

            <label for="jenis">Pesan</label>
            <fieldset class="form-group position-relative has-icon-left">
                <textarea ng-model='text' class="form-control position-relative has-icon-left" placeholder="Pesan anda disini ..."></textarea>
                <div class="form-control-position">
                    <i class="icon-drawer primary"></i>
                </div>
            </fieldset>

        </div>
        <div class="modal-footer">
            <input type="reset" ng-click='sentMail()' class="btn btn-primary btn-lg" data-dismiss="modal" value="Kirim">
        </div>
      </form>
    </div>
  </div>
</div>
