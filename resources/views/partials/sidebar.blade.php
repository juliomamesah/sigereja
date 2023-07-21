<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-body-tertiary sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('beranda') ? 'active' : '' }}" aria-current="page" href="/beranda">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Beranda
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('jemaat') ? 'active' : '' }}" href="/jemaat">
                    <span data-feather="users" class="align-text-bottom"></span>
                    Data Jemaat
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('keuangan*') ? 'active' : '' }}" href="/keuangan">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Keuangan
                </a>
            </li>

            @can('admin')
                <h6
                    class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
                    <span>Administrator</span>
                    <a class="link-secondary" href="#" aria-label="Add a new report">
                    </a>
                </h6>
            </ul>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('tambahuser*') ? 'active' : '' }}" href="/tambahuser">
                        <span data-feather="users" class="align-text-bottom"></span>
                        Tambah Users
                    </a>
                </li>
            </ul>
            <ul class="nav flex-column mb-2">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('users*') ? 'active' : '' }}" href="/users">
                        <span data-feather="users" class="align-text-bottom"></span>
                        List Users
                    </a>
                </li>
            </ul>
        @endcan


    </div>
</nav>
