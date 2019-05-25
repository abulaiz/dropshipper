<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header bg-success">
            <h4 class="modal-title" style="color:white">Detail Order</h4>
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
          <ul class="list-group mb-3 card hd">
            <li class="list-group-item d-flex justify-content-between">
              <div>
                <small class="text-muted">ID Order</h6>
                <h6 class="my-0">{* d.id *}</small>
              </div>
              <span class="fa fa-qrcode"></span>
            </li>            
            <li class="list-group-item d-flex justify-content-between">
              <div>
                <small class="text-muted">Nama Pengorder</h6>
                <h6 class="my-0">{* d.nama *}</small>
              </div>
              <span class="fa fa-user"></span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <div>
                <small class="text-muted">Email Pengorder</h6>
                <h6 class="my-0">{* d.email *}</small>
              </div>
              <span class="fa fa-address-card-o"></span>
            </li>                    
            <li class="list-group-item d-flex justify-content-between">
              <div>
                <small class="text-muted">Nama Produk</h6>
                <h6 class="my-0">{* d.nama_produk *}</small>
              </div>
              <span class="fa fa-briefcase"></span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <div>
                <small class="text-muted">Jumlah Pembelian</h6>
                <h6 class="my-0">{* d.jumlah *}</small>
              </div>
              <span class="fa fa-shopping-cart"></span>
            </li> 
           <li class="list-group-item d-flex justify-content-between">
              <div>
                <small class="text-muted">Total Pembayaran</h6>
                <h6 class="my-0">{* d.total | currency: "Rp " : 0 *}</small>
              </div>
              <span class="fa fa-money"></span>
            </li>             
          </ul>                 
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-success" data-dismiss="modal">Done</button>
        </div>
    </div>
</div>