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
                <small class="text-muted">Nama Produk</h6>
                <h6 class="my-0">{* d.product_name *}</small>
              </div>
              <span class="fa fa-glass"></span>
            </li>

            <li class="list-group-item d-flex justify-content-between">
              <div>
                <small class="text-muted">Jumlah Pengiriman</h6>
                <h6 class="my-0">{* d.qty *} {* d.product_type *}</small>
              </div>
              <span class="fa fa-shopping-cart"></span>
            </li>

            <li class="list-group-item d-flex justify-content-between">
              <div>
                <small class="text-muted">Dipesan lewat</h6>
                <h6 class="my-0">{* d.order_via *}</small>
              </div>
              <span class="fa fa-pencil-square-o"></span>
            </li>

            <li class="list-group-item d-flex justify-content-between">
              <div>
                <small class="text-muted">Kurir Pengiriman</h6>
                <h6 class="my-0">{* d.courier *}</small>
              </div>
              <span class="fa fa-truck"></span>
            </li>

           <li class="list-group-item d-flex justify-content-between">
              <div>
                <small class="text-muted">Nama Penerima</h6>
                <h6 class="my-0">{* d.receiver_name *}</small>
              </div>
              <span class="fa fa-user"></span>
            </li>

           <li class="list-group-item d-flex justify-content-between">
              <div>
                <small class="text-muted">Alamat Penerima</h6>
                <h6 class="my-0">{* d.address *}</small>
              </div>
              <span class="fa fa-address-card-o"></span>
            </li>

            <li class="list-group-item d-flex justify-content-between">
              <div>
                <small class="text-muted">Total Berat Barang</h6>
                <h6 class="my-0">{* round( (d.qty * d.product_weight) / 1000 ) *} kg</small>
              </div>
              <span class="fa fa-paperclip"></span>
            </li>

          </ul>                 
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-success" data-dismiss="modal">Done</button>
        </div>
    </div>
</div>