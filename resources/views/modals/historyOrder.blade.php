<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header bg-success">
            <h4 class="modal-title" style="color:white">Riwayat Order - {* name *}</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">                  
        <div class="loader-wrapper" id="detail-loader">
          <div class="loader-container">
            <div class="ball-beat loader-success">
              <div></div>
              <div></div>
              <div></div>
            </div>
          </div>
        </div>  
          <ul class="list-group mb-3 card hd" style="max-height: 400px; overflow-y: auto;">
            <li class="list-group-item d-flex justify-content-between mt-1" ng-repeat="x in details">
              <div>
                <small class="text-muted">{* x.name *}</small><br>
                <small class="text-muted">{* x.qty *} {* x.type *}</small><br>
                <small class="text-muted">{* x.created_at *}</small>
              </div>
              <span ng-if="x.status == '1'" title="Menunggu Konfirmasi" class="text-muted fa fa-clock-o"></span>
              <span ng-if="x.status == '2'" title="Berhasil" class="text-muted fa fa-check"></span>
              <span ng-if="x.status == '3'" title="Ditolak Admin" class="text-muted fa fa-times"></span>
            </li>                       
          </ul>                 
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-success" data-dismiss="modal">Done</button>
        </div>
    </div>
</div>