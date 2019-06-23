    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-static-top navbar-dark navbar-border navbar-brand-center" ng-controller="navbar" >
      <div class="navbar-wrapper">
        <div class="navbar-header">
          <ul class="nav navbar-nav flex-row">
            <li class="nav-item mobile-menu d-md-none mr-auto">
              <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a>
            </li>
            <li class="nav-item">
              <a class="navbar-brand" href="/"><img class="brand-logo h-100 w-100" alt="robust admin logo" src="../../../img/logo2.png"></a>
            </li>
            <li class="nav-item d-md-none">
              <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile">
                <i class="fa fa-sliders"></i><span ng-show="has_unread_message" class="badge badge-pill badge-danger badge-default badge-up badge-sm">N</span>
              </a>
            </li>
          </ul>
        </div>

        <div class="navbar-container container center-layout">
          <div class="collapse navbar-collapse" id="navbar-mobile">
            <ul class="nav navbar-nav mr-auto float-left">
              <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu">         </i></a>
              </li>
            </ul>


          <ul class="nav navbar-nav float-right">
            <li title="Mail" class="dropdown dropdown-notification nav-item">
              <a class="nav-link nav-link-label" href="/email">
                <i class="fa fa-envelope-o fa-lg"></i>
                <span ng-show="has_unread_message" id='inbox_badge' class="badge badge-pill badge-danger badge-default badge-up"> {{ $_inbox }} </span>
              </a>
            </li>
            <li class="dropdown dropdown-user nav-item mr-1">
              <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                <span class="avatar avatar-online">
                  <img id="avatar-img" src="../../../app-assets/images/portrait/small/avatar-s-1.png" alt="avatar">
                  <i id="on-avatar"></i>
                </span>
                <span class="user-name">{{ Auth::user()->name }}</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="/profile"><i class="ft-user"></i> My Account</a>
                <a class="dropdown-item" href="/email"><i class="ft-mail"></i> My Inbox</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" ng-click="logout($event)" href="{{ route('logout') }}"><i class="ft-power"></i> Logout</a>
              </div>
            </li>
          </ul>

          </div>
        </div>
      </div>
    </nav>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
