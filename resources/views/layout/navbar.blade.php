<div class="header">
    <div class="header-left">
        <div class="menu-icon bi bi-list"></div>
        <div class="header-search"></div>
    </div>
    <div class="header-right">

        <div class="user-notification">
            <div class="dropdown">
                <a
                    class="dropdown-toggle no-arrow"
                    href="#"
                    role="button"
                    data-toggle="dropdown"
                >
                    <i class="icon-copy dw dw-notification"></i>
                    <span class="badge notification-active"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="notification-list mx-h-350 customscroll">
                        <ul>
                            <li>
                                <a href="#">
                                    <img src="{{ url('resources/assets/admin/vendors/images/img.jpg') }}" alt="" />
                                    <h3>John Doe</h3>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing
                                        elit, sed...
                                    </p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ url('resources/assets/admin/vendors/images/photo1.jpg') }}" alt="" />
                                    <h3>Lea R. Frith</h3>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing
                                        elit, sed...
                                    </p>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="user-info-dropdown">
            <div class="dropdown">
                <a
                    class="dropdown-toggle"
                    href="#"
                    role="button"
                    data-toggle="dropdown"
                >
                        <span class="user-icon">
                            <img src="{{ url('resources/assets/admin/vendors/images/photo1.jpg') }}" alt="" />
                        </span>
                    <span class="user-name">{{ Auth('admin')->user()->name }}</span>
                </a>
                <div
                    class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
                >
                    <a class="dropdown-item" href="profile.html"
                    ><i class="dw dw-user1"></i> Profile</a>

                    <a class="dropdown-item" href="{{ url('/admin/logout') }}"
                    ><i class="dw dw-logout"></i> Log Out</a>
                </div>
            </div>
        </div>
    </div>
</div>
