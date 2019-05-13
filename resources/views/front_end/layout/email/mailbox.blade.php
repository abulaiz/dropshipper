<div class="nav-vertical" ng-controller='mailbox'>

    <ul class="nav nav-tabs nav-underline">
        <li class="nav-item">
            <a ng-click='tabs()' class="tabInbox nav-link active"><i class="ft-inbox"></i>Inbox</a>
        </li>
        <li class="nav-item">
            <a ng-click='tabs()' class="tabSent nav-link"><i class="fa fa-paper-plane-o"></i>Sent</a>
        </li>
    </ul>

    <div class="tab-content">

        <div role="tabpanel" class="tabInbox tab-pane active" style="max-height: 500px; overflow-y: scroll;">
            <div class="email-app-list-wraper col-md-12 card p-0">
                <div class="email-app-list">
                    <div id="users-list" class="list-group">
                        <div class="users-list-padding media-list">
                            <div ng-repeat='x in inbox_data'>
                                <a ng-click='read($index, "inbox")' class="media ng-class:{ 'unread': !x.readed };">
                                    <div class="media-left pr-1">
                                        <span class="avatar avatar-md">
                                            <span class="media-object rounded-circle text-circle ng-class:avatarColour(x.flag, x.name);">{* x.flag == 'M' ? x.name[0].toUpperCase() : x.flag *}</span>
                                        </span>
                                    </div>
                                    <div class="media-body w-100">
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
            </div>
        </div>
        <div role="tabpanel" class="tabSent tab-pane" style="max-height: 400px; overflow-y: scroll;">
            <div class="email-app-list-wraper col-md-12 card p-0">
                <div class="email-app-list">
                    <div id="users-list" class="list-group">
                        <div class="users-list-padding media-list">
                            <div ng-repeat='x in sent_data'>
                                <a ng-click='read($index, "sent")' class="media ng-class:{'border-bottom-grey border-bottom-1' : sent_data.length > 1};">
                                    <div class="media-left pr-1">
                                        <span class="avatar avatar-md">
                                            <span class="media-object rounded-circle text-circle ng-class:avatarColour(x.flag, x.name);">{* x.flag == 'M' ? x.name[0].toUpperCase() : x.flag *}</span>
                                        </span>
                                    </div>
                                    <div class="media-body w-100">
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
            </div>
        </div>

    </div> 

</div>