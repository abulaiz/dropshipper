<div class="alert bg-primary alert-icon-left alert-arrow-left mb-2" role="alert">
  <span class="alert-icon"><i class="fa fa-info"></i></span>
  <strong>TIPS ! .</strong> Untuk memilih pesan, klik atau tap pada avatar pesan (icon bulat sebelah kiri).
</div>

<div class="nav-vertical" ng-controller='mailbox'>

    <ul class="nav nav-tabs nav-underline">
        <li class="nav-item">
            <a ng-click='tabs()' class="nav-link ng-class:{'active' : inboxTabActivate};"><i class="ft-inbox"></i>Inbox</a>
        </li>
        <li class="nav-item">
            <a ng-click='tabs()' class="nav-link ng-class:{'active' : !inboxTabActivate};"><i class="fa fa-paper-plane-o"></i>Sent</a>
        </li>
    </ul>

    <div class="tab-content">

        <div role="tabpanel" class="tab-pane ng-class:{'active' : inboxTabActivate};">
            <div class="pull-left mb-1 mt-1 ml-1">
                <!-- <p>Klik / tap avatar untuk memilih pesan.</p>  -->
                <button class="btn btn-outline-danger" ng-click="delete()" ng-disabled='!onSelectedMail'><i class="fa fa-trash mr-1"></i>Hapus pesan terpilih</button>               
            </div>
            <input type="text" class="mb-1 mt-1 pull-right mr-1 form-control search-f" style="width: 230px;" placeholder="Search Subject here ..." ng-keyup="search($event.currentTarget, 'inbox')">
            <div id="inbox-fly" class="email-app-list-wraper col-md-12 card p-0" style="max-height: 400px; overflow-y: scroll;">
                <div class="email-app-list">
                    <div id="users-list" class="list-group">
                        <div class="users-list-padding media-list">
                            <div ng-repeat='x in inbox_data'>
                                <a class="media ng-class:{ 'unread': !x.readed , 'border-bottom-grey border-bottom-1' : inbox_data.length > 1};">
                                    <div class="media-left pr-1" ng-click='select($event.currentTarget, $index, "inbox")' id="aVinbox-{* $index *}">
                                        <span class="avatar avatar-md">
                                            <span class="media-object rounded-circle text-circle ng-class:avatarColour(x.flag, x.email);">{* x.flag == 'M' ? x.email[0].toUpperCase() : x.flag *}</span>
                                        </span>
                                    </div>
                                    <div class="media-body w-100" ng-click='read($index, "inbox")'>
                                        <h6 style="font-weight: bold;" class="list-group-item-heading">{* x.name *}
                                            <span class="font-small-2 float-right">{* getDate(x.created_at) *}</span>
                                        </h6>
                                        <p class="list-group-item-text text-truncate mb-0">{* x.subject *}</p>
                                    </div>                                  
                                </a>                                                           
                            </div>
                            <div ng-if='inbox_data.length == 0'>
                                <a class="media">
                                    <div class="media-body w-100">
                                        <p class="list-group-item-text text-truncate mb-0">Belum ada pesan masuk</p>
                                    </div>
                                </a>                                  
                            </div>                                                 
                        </div>
                    </div>
                </div>
                <div class="loader-wrapper" style="display: none;" id="search-inbox-loader">
                  <div class="loader-container">
                    <div class="ball-clip-rotate-multiple loader-primary">
                      <div></div>
                      <div></div>
                    </div>
                  </div>
                </div> 
                <div class="loader-wrapper mt-3 mb-4" style="display: none;" id="inbox-loader">
                  <div class="loader-container">
                    <div class="ball-beat loader-danger">
                      <div></div>
                      <div></div>
                      <div></div>
                    </div>
                  </div>
                </div>                                   
            </div>
        </div>

        <div role="tabpanel" class="tab-pane ng-class:{'active' : !inboxTabActivate};">
            <div class="pull-left mb-1 mt-1 ml-1">
                <!-- <p>Klik / tap avatar untuk memilih pesan.</p>  -->
                <button class="btn btn-outline-danger" ng-click="delete()" ng-disabled='!onSelectedMail'><i class="fa fa-trash mr-1"></i>Hapus pesan terpilih</button>               
            </div>
            <input type="text" class="mb-1 mt-1 pull-right mr-1 form-control search-f" style="width: 230px;" placeholder="Search Subject here ..." ng-keyup="search($event.currentTarget, 'sent')">
            <div id="sent-fly" class="email-app-list-wraper col-md-12 card p-0" style="max-height: 400px; overflow-y: scroll;">
                <div class="email-app-list">
                    <div id="users-list" class="list-group">
                        <div class="users-list-padding media-list">
                            <div ng-repeat='x in sent_data'>
                                <a class="media ng-class:{'border-bottom-grey border-bottom-1' : sent_data.length > 1};">
                                    <div class="media-left pr-1" ng-click='select($event.currentTarget, $index, "sent")' id="aVsent-{* $index *}">
                                        <span class="avatar avatar-md">
                                            <span class="media-object rounded-circle text-circle ng-class:avatarColour(x.flag, x.email);">{* x.flag == 'M' ? x.email[0].toUpperCase() : x.flag *}</span>
                                        </span>
                                    </div>
                                    <div class="media-body w-100" ng-click='read($index, "sent")'>
                                        <h6 style="font-weight: bold;" class="list-group-item-heading">{* x.name *}<span class="font-small-2 float-right">{* getDate(x.created_at) *}</span></h6>
                                        <p class="list-group-item-text text-truncate mb-0">{* x.subject *}</p>
                                    </div>
                                </a>                                                           
                            </div>  
                            <div ng-if='sent_data.length == 0'>
                                <a class="media">
                                    <div class="media-body w-100">
                                        <p class="list-group-item-text text-truncate mb-0">Belum ada pesan keluar</p>
                                    </div>
                                </a>                                  
                            </div>                                                                            
                        </div>
                    </div>
                </div>
                <div class="loader-wrapper" style="display: none;" id="search-sent-loader">
                  <div class="loader-container">
                    <div class="ball-clip-rotate-multiple loader-primary">
                      <div></div>
                      <div></div>
                    </div>
                  </div>
                </div>  
                <div class="loader-wrapper mt-3 mb-4" style="display: none;" id="sent-loader">
                  <div class="loader-container">
                    <div class="ball-beat loader-danger">
                      <div></div>
                      <div></div>
                      <div></div>
                    </div>
                  </div>
                </div>                                  
            </div>
        </div>

    </div> 

</div>