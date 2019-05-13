    <div class="card-content" ng-controller='detail'>
       <span class="float-right">
            <i class="fa fa-reply mr-1"></i>
            <i class="fa fa-arrow-right mr-1"></i>
        </span>
        <div class="email-app-title card-body" style="padding-top: 10px; padding-bottom: 0px;">
            <h3 class="list-group-item-heading">{* subject *}</h3>
        </div>

        <div class="media-list">            
            <div class="card-header p-0 ">
                <div class="email-app-sender media border-0" style="padding-top: 10px;">
                    <div class="media-left pr-1">
                        <span class="avatar avatar-md">
                            <span class="media-object rounded-circle text-circle ng-class:avatarColour();">{* flag == 'M' ? name[0].toUpperCase() : flag *}</span>
                        </span>
                    </div>
                    <div class="media-body w-100">
                        <h6 class="list-group-item-heading">{* email *}</h6>
                        <small class="list-group-item-text">{* getDate() *}</small>
                    </div>
                </div>
            </div>

            <div id="collapse2" role="tabpanel" class="border-grey border-1">
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
    </div>