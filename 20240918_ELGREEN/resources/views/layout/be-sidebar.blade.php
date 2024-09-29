<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="{{ route('dashboard') }}" class="logo">
                <img src="{{ asset('image/elgreen.png') }}" alt="navbar brand" class="navbar-brand"
                    height="40" />&nbsp;<span style="color:#FFF;font-size: 100% !important;">ELGREEN</span>
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user') }}">
                        <i class="fas fa-users"></i>
                        <p>Users</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarLayouts">
                        <i class="fas fa-th-list"></i>
                        <p>Attribute</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="sidebarLayouts">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('category')}}">
                                    <span class="sub-item">Category</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('color')}}">
                                    <span class="sub-item">Color</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('size')}}">
                                    <span class="sub-item">Size</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="{{ route('produk') }}">
                        <i class="fas fa-shopping-basket"></i>
                        <p>Product</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('sale') }}">
                        <i class="fas fa-luggage-cart"></i>
                        <p>Sales</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
