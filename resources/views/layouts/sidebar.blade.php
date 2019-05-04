    <div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-dark navbar-without-dd-arrow navbar-shadow ggg" role="navigation" data-menu="menu-wrapper">
      <div class="navbar-container main-menu-content container center-layout" data-menu="menu-container">
        <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
        	<!-- Dashboard -->
            <li class="nav-item @yield('home')"><a class="nav-link" href="/"><i class="icon-home"></i>Home</a>
            </li>
            <!-- Order -->
            <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="icon-note"></i>Order</a>
            <ul class="dropdown-menu">
              <li class="dropdown dropdown @yield('order')" data-menu="dropdown-"><a class="dropdown-item" href="order"><i class="icon-basket-loaded"></i>Status Order</a>
              </li>
              <li class="dropdown dropdown" data-menu="dropdown-"><a class="dropdown-item" href="historyOrder" data-toggle="dropdown"><i class="fa fa-bookmark"></i>Riwayat Order</a>
              </li>
            </ul>
            </li>            
            <!-- Pengiriman Produk -->
            <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="icon-note"></i>Pengiriman Produk</a>
            <ul class="dropdown-menu">
              <li class="dropdown" data-menu="dropdown"><a class="dropdown-item" href="#" data-toggle="dropdown"><i class="fa fa-pencil-square-o"></i>Input Baru</a>
              </li>
              <li class="dropdown dropdown" data-menu="dropdown-"><a class="dropdown-item" href="#" data-toggle="dropdown"><i class="fa fa-bookmark"></i>Status Pengiriman</a>
              </li>
            </ul>
            </li>
        </ul>
      </div>
    </div>