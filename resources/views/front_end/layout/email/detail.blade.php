    <div class="card-content" ng-controller='detail'>
       <span class="float-right">
            <i style="cursor: pointer;" id="reply-icon" class="fa fa-reply mr-1" ng-click="reply()" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#composeMail"></i>
            <i style="cursor: pointer;" class="fa fa-arrow-left mr-1" ng-click='back()'></i>
        </span>
        <div class="email-app-title card-body" style="padding-top: 10px; padding-bottom: 0px;">
            <h3 class="list-group-item-heading">{* subject *}</h3>
        </div>

        <div class="media-list">            
            <div class="card-header p-0 ">
                <div class="email-app-sender media border-0" style="padding-top: 10px;">
                    <div class="media-left pr-1">
                        <span class="avatar avatar-md">
                            <span class="media-object rounded-circle text-circle ng-class:avatarColour();">{* flag == 'M' ? email[0].toUpperCase() : flag *}</span>
                        </span>
                    </div>
                    <div class="media-body w-100">
                        <h6 class="list-group-item-heading">{* email *}</h6>
                        <small class="list-group-item-text">{* getDate() *}</small>
                    </div>
                </div>
            </div>

            <div id="collapse2" role="tabpanel" class="border-top-grey border-top-1">
                <div class="card-content">
                    <div class="email-app-text card-body">
                        <div class="loader-wrapper" ng-show='onload'>
                          <div class="loader-container">
                            <div class="ball-pulse loader-secondary">
                              <div></div>
                              <div></div>
                              <div></div>
                            </div>
                          </div>
                        </div>                        
                        <div class="email-app-message" id="contentMail" ng-hide='onload'>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body  my-gallery" itemscope>
          <div class="row">
            <figure ng-repeat="x in attachment" class="col-lg-3 col-md-6 col-12" itemprop="associatedMedia" itemscope>
              <a href="/mailAttachment/{* x *}" itemprop="contentUrl" data-size="680x360">
                <img class="img-thumbnail img-fluid" src="/mailAttachment/{* x *}"
                itemprop="thumbnail" alt="Memuat ..." />
              </a>
            </figure>
          </div>            
        </div>
        <!--/ Image grid -->
        <!-- Root element of PhotoSwipe. Must have class pswp. -->
        <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
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
    </div>

    <script src="../../../js/view/mail/customPhotoSwipe.js " type="text/javascript"></script>
