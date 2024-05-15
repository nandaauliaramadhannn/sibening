<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('adminbackend/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Admin</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i></div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('user.dashboard') }}" class="{{ Route::currentRouteName() == 'user.dashboard' ? 'active' : '' }}">
                <div class="parent-icon"><i class='bx bx-home-circle'></i></div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li class="menu-label">Management Data</li>
        <li class="{{ in_array(Route::currentRouteName(), ['user.data.index']) ? 'mm-active' : '' }}">
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="lni lni-users"></i></div>
                <div class="menu-title">Data Management</div>
            </a>
            <ul>
                <li>
                    <a href="{{ route('user.data.index') }}" class="{{ Route::currentRouteName() == 'user.data.index' ? 'active' : '' }}">
                        <i class="bx bx-right-arrow-alt"></i>Input Data
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>
