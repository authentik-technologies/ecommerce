<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('admin/assets/images/logo-dark.png') }}" width="100%" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">eCommerce</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('admin.dashboard') }}">
                <div class="parent-icon"><i class='bx bx-home-circle'></i></div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li class="menu-label">Shop settings</li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-store"></i>
                </div>
                <div class="menu-title">Shop</div>
            </a>
            <ul>
                <li> <a href="{{ route('admin.products.index') }}"><i class="bx bx-package"></i>Products</a>
                </li>
                <li> <a href="{{ route('admin.brands.index') }}"><i class="bx bx-bookmark"></i>Brands</a>
                </li>
                <li> <a href="{{ route('admin.categories.index') }}"><i class="bx bx-purchase-tag"></i>Categories</a>
                </li>
                <li> <a href="{{ route('admin.subcategories.index') }}"><i class="bx bx-purchase-tag-alt"></i>Sub Categories</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-bookmark-heart"></i>
                </div>
                <div class="menu-title">Components</div>
            </a>
            <ul>
                <li> <a href="{{ route('admin.sliders.index') }}"><i class="bx bx-slideshow"></i>Sliders</a>
                </li>
                <li> <a href="{{ route('admin.banners.index') }}"><i class="bx bx-flag"></i>Banners</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{ route('admin.users.index') }}">
                <div class="parent-icon"><i class='bx bx-user'></i>
                </div>
                <div class="menu-title">Utilisateurs</div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.orders.pending') }}">
                <div class="parent-icon"><i class='bx bx-user'></i>
                </div>
                <div class="menu-title">Commandes</div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.reports.index') }}">
                <div class="parent-icon"><i class='bx bx-user'></i>
                </div>
                <div class="menu-title">Rapports</div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.settings.index') }}">
                <div class="parent-icon"><i class='bx bx-cog'></i>
                </div>
                <div class="menu-title">Outils</div>
            </a>
        </li>
    </ul>
    <!--end navigation-->
</div>
<!--end sidebar wrapper -->