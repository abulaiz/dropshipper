<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header bg-success">
            <h4 class="modal-title" style="color:white">Detail Pengiriman</h4>
            <button type="button" class="close" id="closeModel" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body" style="max-height: 500px; overflow-y: auto;">                  
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
                <small class="text-muted">ID Order</small>
                <h6 class="my-0">{* d.id *}</h6>
              </div>
              <span class="fa fa-qrcode"></span>
            </li>         

            <li class="list-group-item d-flex justify-content-between">
              <div>
                <small class="text-muted">Nama Produk</small>
                <h6 class="my-0">{* d.product_name *}</h6>
              </div>
              <span class="fa fa-glass"></span>
            </li>

            <li class="list-group-item d-flex justify-content-between">
              <div>
                <small class="text-muted">Jumlah Pengiriman</small>
                <h6 class="my-0">{* d.qty *} {* d.product_type *}</h6>
              </div>
              <span class="fa fa-shopping-cart"></span>
            </li>
            
            <li class="list-group-item d-flex justify-content-between">
              <div>
                <small class="text-muted">Total Berat Barang</small>
                <h6 class="my-0">{* round( (d.qty * d.product_weight) / 1000 ) *} kg</h6>
              </div>
              <span class="fa fa-archive"></span>
            </li>

            <li class="list-group-item d-flex justify-content-between">
              <div>
                <small class="text-muted">Nama Penerima</small>
                <h6 class="my-0">{* d.receiver_name *}</h6>
              </div>
              <span class="fa fa-user"></span>
            </li>

            <li class="list-group-item d-flex justify-content-between">
              <div>
                <small class="text-muted">Alamat Penerima</small>
                <h6 class="my-0">{* d.address *}</h6>
              </div>
              <span class="fa fa-address-card-o"></span>
            </li>

            <li ng-hide="d.attachment_path == ''" class="list-group-item d-flex justify-content-between">
              <div class="my-gallery" itemscope>
                <small class="text-muted">Bukti Pemesanan</small>
                <br>
                <div class="row">
                  <figure class="col-12" itemprop="associatedMedia" itemscope id="opensw">
                    <a href="none" itemprop="contentUrl" data-size="680x360" target="blank">
                      <img class="img-thumbnail img-fluid" src="none"
                      itemprop="thumbnail" alt="Memuat ..." id="img" />
                    </a>
                  </figure>                   
                </div>               
              </div>
              <span class="fa fa-paperclip"></span>
            </li>

            <li class="list-group-item d-flex justify-content-between">
              <div>
                <small class="text-muted">Dipesan lewat</small>
                <h6 class="my-0">{* d.order_via *}</h6>
              </div>
              <span class="fa fa-pencil-square-o"></span>
            </li>

            <li class="list-group-item d-flex justify-content-between">
              <div>
                <small class="text-muted">Kurir Pengiriman</small>
                <h6 class="my-0">{* d.courier *}</h6>
              </div>
              <span class="fa fa-truck"></span>
            </li>

            <li class="list-group-item d-flex justify-content-between">
              <div>
                <small class="text-muted">Tujuan Pengiriman</small>
                <h6 class="my-0">{* d.destination *}</h6>
              </div>
              <span class="fa fa-map-signs"></span>
            </li>

            <li class="list-group-item d-flex justify-content-between">
              <div>
                <small class="text-muted">Layanan Pengiriman</small>
                <h6 class="my-0">{* d.courier_service *}</h6>
              </div>
              <span class="fa fa-space-shuttle"></span>
            </li>

            <li ng-show="d.free_code != ''" class="list-group-item d-flex justify-content-between">
              <div>
                <small class="text-muted">Kode Spesial</small>
                <h6 class="my-0">{* d.free_code *}</h6>
              </div>
              <span class="fa fa-wpforms"></span>
            </li>

            <li class="list-group-item d-flex justify-content-between">
              <div>
                <small class="text-muted">Total Pembayaran</small>
                <h6 class="my-0">{* d.price.p *} {* d.price.c *}</h6>
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


        <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: 2000000">
          <!-- Background of PhotoSwipe. 
         It's a separate element as animating opacity is faster than rgba(). -->
          <div class="pswp__bg"></div>
          <!-- Slides wrapper with overflow:hidden. -->
          <div class="pswp__scroll-wrap">
            <!-- Container that holds slides. 
            PhotoSwipe keeps only 3 of them in the DOM to save memory.
            Don't modify these 3 pswp__item elements, data is added later on. -->
            <div class="pswp__container">
              <div class="pswp__item"></div>
              <div class="pswp__item"></div>
              <div class="pswp__item"></div>
            </div>
            <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
            <div class="pswp__ui pswp__ui--hidden">
              <div class="pswp__top-bar">
                <!--  Controls are self-explanatory. Order can be changed. -->
                <div class="pswp__counter"></div>
                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                <button class="pswp__button pswp__button--share" title="Share"></button>
                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
                <!-- element will get class pswp__preloader-active when preloader is running -->
                <div class="pswp__preloader">
                  <div class="pswp__preloader__icn">
                    <div class="pswp__preloader__cut">
                      <div class="pswp__preloader__donut"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div>
              </div>
              <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
              </button>
              <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
              </button>
              <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
              </div>
            </div>
          </div>
        </div>  

  <script src="../../../app-assets/vendors/js/gallery/photo-swipe/photoswipe.min.js"
  type="text/javascript"></script>
  <script src="../../../app-assets/vendors/js/gallery/photo-swipe/photoswipe-ui-default.min.js"
  type="text/javascript"></script>
  <script src="../../../js/view/mail/customPhotoSwipe.js " type="text/javascript"></script>

  <script type="text/javascript">
    function initPhotoSw(){
        initPhotoSwipeFromDOM('.my-gallery');
        if($('.masonry-grid').length > 0){
            $('.masonry-grid').masonry({
                  // options
                  itemSelector: '.grid-item',
                  columnWidth: '.grid-sizer',
                  //cpercentPosition: true
            });
        } 
    }

  </script>