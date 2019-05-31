    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-static-top navbar-dark navbar-border navbar-brand-center" ng-controller="navbar" >
      <div class="navbar-wrapper">
        <div class="navbar-header">
          <ul class="nav navbar-nav flex-row">
            <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
            <li class="nav-item"><a class="navbar-brand" href="/"><img class="brand-logo" alt="robust admin logo" src="../../../img/logo.png">
                <h3 class="brand-text">Dropshiper</h3></a></li>
            <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a></li>
          </ul>
        </div>

        <div class="navbar-container container center-layout">
          <div class="collapse navbar-collapse" id="navbar-mobile">
            <ul class="nav navbar-nav mr-auto float-left">
              <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu">         </i></a></li>
              </li>
            </ul>

            <ul class="nav navbar-nav float-right">         
              <li title="Mail" class="dropdown dropdown-notification nav-item">
                <a class="nav-link nav-link-label" href="/email">
                  <i class="fa fa-envelope-o fa-lg"></i>
                  <span ng-show="has_unread_message" id='inbox_badge' class="badge badge-pill badge-default badge-danger badge-default badge-up"> {{ $_inbox }} </span>
                </a>
              </li>
              <li title="Log Out" class="dropdown dropdown-notification nav-item">
                <a style="padding-right: 10px;" class="nav-link nav-link-label" href="{{ route('logout') }}" data-toggle="dropdown" ng-click="logout($event)">
                  <i class="fa fa-power-off fa-lg"></i>
                </a>
              </li>

            </ul>
          </div>
        </div>
      </div>
    </nav>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
