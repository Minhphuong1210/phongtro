<div id="scrollbar">
    <div class="container-fluid">
        <div id="two-column-menu"></div>
        <ul class="navbar-nav" id="navbar-nav">
            <li class="menu-title">
                <span data-key="t-menu">Menu</span>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-link" href="#">
                    <i class="ri-dashboard-2-line"></i>
                    <span data-key="t-dashboards">Dashboards</span>
                </a>

            </li>
            <!-- end Dashboard Menu -->
            <li class="nav-item">
                <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarApps">
                    <i class="ri-apps-2-line"></i>
                    <span data-key="t-apps">Nhà trọ</span>
                </a>
                <div class="collapse menu-dropdown" id="sidebarApps">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="{{route('admin.category.index')}}" class="nav-link" data-key="t-chat">
                                Danh mục nhà trọ
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('admin.phong_tro.index')}}" class="nav-link" data-key="t-chat">
                               Phòng trọ
                            </a>
                        </li>

                        <!-- end Dashboard Menu -->
                    </ul>
                </div>
            </li>
                <!-- Sidebar -->
    </div>
</div>


