<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">

            <span class="app-brand-text demo menu-text fw-bold ms-2">Spectra Teacch</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="bx bx-chevron-left d-block d-xl-none align-middle"></i>
        </a>
    </div>

    <div class="menu-divider mt-0"></div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1 bx-ul">
        <!-- Dashboards -->
        <!-- Apps & Pages -->
        <li class="menu-header small text-uppercase">

            <span class="menu-header-text">Menu</span>
        </li>
        <li class="menu-item">
            <a href="{{route('home')}}" class="menu-link">
                <div class="text-truncate">Dashboards</div>
            </a>

        </li>

        <!-- Layouts -->
        <li class="menu-item">
            <a href="{{route('master_users.index')}}" class="menu-link">
                <div class="text-truncate">Master Users</div>
            </a>


        </li>




        <li class="menu-item">
            <a href="{{route('master_modules.index')}}" class="menu-link">
                <div class="text-truncate">Master Modules</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('master_lessons.index')}}" class="menu-link">
                <div class="text-truncate">Master Lessons</div>
            </a>
        </li>
        <!-- Apps & Pages -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Akun Saya</span>
        </li>
        <li class="menu-item">
            <a href="{{route('profile.index')}}" class="menu-link">
                <div class="text-truncate">Profile</div>
            </a>
        </li>
        <li class="menu-item">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a href="#" class="menu-link"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <div class="text-truncate">Logout</div>
            </a>
        </li>

    </ul>
</aside>