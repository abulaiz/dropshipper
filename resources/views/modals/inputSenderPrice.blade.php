<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info">
          <h4 class="modal-title" style="color:white">Biaya Pengiriman</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
          <div class="form-group">
              <label for="name">Berat Akumulatif</label>
              <input type="text" class="form-control" disabled value="{* berat *} kg" ></input>
          </div>                    
          <div class="form-group">
              <label for="name">Biaya Per KG</label>
              <input type="text" ng-model="price_per_kg" ng-keyup='setTotal()' class="form-control money"></input>
          </div>
          <div class="form-group">
              <label for="name">Total Biaya</label>
              <input type="text" class="form-control" value="{* total_harga *}"></input>
          </div>          
      </div>   
      <div class="modal-footer">
          <button type="button" class="btn btn-info" ng-click='kirim()' data-dismiss="modal">Kirim</button>
      </div>      
    </div>
</div>