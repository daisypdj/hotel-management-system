<nav class="navbar sidebar navbar-expand-xl navbar-light">
    <!-- Navbar brand for xl START -->
    <div class="d-flex align-items-center">
        <a class="navbar-brand" href="index.html-1.htm">
            <img class="light-mode-item navbar-brand-item" src="assets/images/logo.svg" alt="logo">
            <img class="dark-mode-item navbar-brand-item" src="assets/images/logo-light.svg" alt="logo">
        </a>
    </div>
    <!-- Navbar brand for xl END -->

    <div class="offcanvas offcanvas-start flex-row custom-scrollbar h-100" data-bs-backdrop="true" tabindex="-1" id="offcanvasSidebar">
        <div class="offcanvas-body sidebar-content d-flex flex-column pt-4">

            <!-- Sidebar menu START -->
            <ul class="navbar-nav flex-column" id="navbar-sidebar">
                <!-- Menu item -->
                <li class="nav-item"><a href="admin-dashboard.html.htm" class="nav-link active">Dashboard</a></li>

                <!-- Title -->
                <li class="nav-item ms-2 my-2">Pages</li>

                <!-- Menu item -->
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#collapsebooking" role="button" aria-expanded="false" aria-controls="collapsebooking">
                    Bookings
                    </a>
                    <!-- Submenu -->
                    <ul class="nav collapse flex-column" id="collapsebooking" data-bs-parent="#navbar-sidebar">
                        <li class="nav-item"> <a class="nav-link" href="admin-booking-list.html.htm">Booking List</a></li>
                        <li class="nav-item"> <a class="nav-link" href="admin-booking-detail.html.htm">Booking Detail</a></li>
                    </ul>
                </li>

                <!-- Menu item -->
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#collapseguest" role="button" aria-expanded="false" aria-controls="collapseguest">
                    Guests
                    </a>
                    <!-- Submenu -->
                    <ul class="nav collapse flex-column" id="collapseguest" data-bs-parent="#navbar-sidebar">
                        <li class="nav-item"> <a class="nav-link" href="admin-guest-list.html">Guest List</a></li>
                        <li class="nav-item"> <a class="nav-link" href="admin-guest-detail.html.htm">Guest Detail</a></li>
                    </ul>
                </li>

                <!-- Menu item -->
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#collapseagent" role="button" aria-expanded="false" aria-controls="collapseagent">
                    Agents
                    </a>
                    <!-- Submenu -->
                    <ul class="nav collapse flex-column" id="collapseagent" data-bs-parent="#navbar-sidebar">
                        <li class="nav-item"> <a class="nav-link" href="admin-agent-list.html">Agent List</a></li>
                        <li class="nav-item"> <a class="nav-link" href="admin-agent-detail.html">Agent Detail</a></li>
                    </ul>
                </li>

                <!-- Menu item -->
                <li class="nav-item"> <a class="nav-link" href="admin-reviews.html">Reviews</a></li>

                <!-- Menu item -->
                <li class="nav-item"> <a class="nav-link" href="admin-earnings.html">Earnings</a></li>

                <!-- Menu item -->
                <li class="nav-item"> <a class="nav-link" href="admin-settings.html.htm">Admin Settings</a></li>

                <!-- Menu item -->
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#collapseauthentication" role="button" aria-expanded="false" aria-controls="collapseauthentication">
                        Authentication
                    </a>
                    <!-- Submenu -->
                    <ul class="nav collapse flex-column" id="collapseauthentication" data-bs-parent="#navbar-sidebar">
                        <li class="nav-item"> <a class="nav-link" href="sign-up.html.htm">Sign Up</a></li>
                        <li class="nav-item"> <a class="nav-link" href="sign-in.html.htm">Sign In</a></li>
                        <li class="nav-item"> <a class="nav-link" href="forgot-password.html.htm">Forgot Password</a></li>
                        <li class="nav-item"> <a class="nav-link" href="error.html.htm">Error 404</a></li>
                    </ul>
                </li>

                <!-- Title -->
                <li class="nav-item ms-2 my-2">Documentation</li>

                <!-- Menu item -->
                <li class="nav-item"> <a class="nav-link" href="docs/index.html.htm">Documentation</a></li>

                <!-- Menu item -->
                <li class="nav-item"> <a class="nav-link" href="docs/changelog.html.htm">Changelog</a></li>
            </ul>
            <!-- Sidebar menu end -->

            <!-- Sidebar footer START -->
            <div class="d-flex align-items-center justify-content-between text-primary-hover mt-auto p-3">
                <a class="h6 fw-light mb-0 text-body" href="sign-in.html.htm" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Sign out">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i> Log out
                </a>
                <a class="h6 mb-0 text-body" href="admin-settings.html.htm" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Settings">
                    <i class="bi bi-gear-fill"></i>
                </a>
            </div>
            <!-- Sidebar footer END -->

        </div>
    </div>
</nav>
