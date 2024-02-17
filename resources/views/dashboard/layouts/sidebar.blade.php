<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu"
        aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/students') ? 'active' : '' }}"
                        href="/dashboard/students">
                        <svg class="bi">
                            <use xlink:href="#house-fill" />
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex text-warning align-items-center gap-2 {{ Request::is('student/all') ? 'active' : '' }}"
                        href="/student/all">
                        <i class="bi bi-arrow-right-circle-fill"></i>
                        View Only Page
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
