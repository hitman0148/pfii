<div class="right-sidebar">
    <div class="sidebar-title">
        <h3 class="weight-600 font-16 text-blue">
            Layout Settings
            <span class="btn-block font-weight-400 font-12"
            >User Interface Settings</span
            >
        </h3>
        <div class="close-sidebar" data-toggle="right-sidebar-close">
            <i class="icon-copy ion-close-round"></i>
        </div>
    </div>
    <div class="right-sidebar-body customscroll">
        <div class="right-sidebar-body-content">
            <h4 class="weight-600 font-18 pb-10">Header Background</h4>
            <div class="sidebar-btn-group pb-30 mb-10">
                <a
                    href="javascript:void(0);"
                    class="btn btn-outline-primary header-white active"
                >White</a
                >
                <a
                    href="javascript:void(0);"
                    class="btn btn-outline-primary header-dark"
                >Dark</a
                >
            </div>

            <h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
            <div class="sidebar-btn-group pb-30 mb-10">
                <a
                    href="javascript:void(0);"
                    class="btn btn-outline-primary sidebar-light"
                >White</a
                >
                <a
                    href="javascript:void(0);"
                    class="btn btn-outline-primary sidebar-dark active"
                >Dark</a
                >
            </div>

            <h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
            <div class="sidebar-radio-group pb-10 mb-10">
                <div class="custom-control custom-radio custom-control-inline">
                    <input
                        type="radio"
                        id="sidebaricon-1"
                        name="menu-dropdown-icon"
                        class="custom-control-input"
                        value="icon-style-1"
                        checked=""
                    />
                    <label class="custom-control-label" for="sidebaricon-1"
                    ><i class="fa fa-angle-down"></i
                        ></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input
                        type="radio"
                        id="sidebaricon-2"
                        name="menu-dropdown-icon"
                        class="custom-control-input"
                        value="icon-style-2"
                    />
                    <label class="custom-control-label" for="sidebaricon-2"
                    ><i class="ion-plus-round"></i
                        ></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input
                        type="radio"
                        id="sidebaricon-3"
                        name="menu-dropdown-icon"
                        class="custom-control-input"
                        value="icon-style-3"
                    />
                    <label class="custom-control-label" for="sidebaricon-3"
                    ><i class="fa fa-angle-double-right"></i
                        ></label>
                </div>
            </div>

            <h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
            <div class="sidebar-radio-group pb-30 mb-10">
                <div class="custom-control custom-radio custom-control-inline">
                    <input
                        type="radio"
                        id="sidebariconlist-1"
                        name="menu-list-icon"
                        class="custom-control-input"
                        value="icon-list-style-1"
                        checked=""
                    />
                    <label class="custom-control-label" for="sidebariconlist-1"
                    ><i class="ion-minus-round"></i
                        ></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input
                        type="radio"
                        id="sidebariconlist-2"
                        name="menu-list-icon"
                        class="custom-control-input"
                        value="icon-list-style-2"
                    />
                    <label class="custom-control-label" for="sidebariconlist-2"
                    ><i class="fa fa-circle-o" aria-hidden="true"></i
                        ></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input
                        type="radio"
                        id="sidebariconlist-3"
                        name="menu-list-icon"
                        class="custom-control-input"
                        value="icon-list-style-3"
                    />
                    <label class="custom-control-label" for="sidebariconlist-3"
                    ><i class="dw dw-check"></i
                        ></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input
                        type="radio"
                        id="sidebariconlist-4"
                        name="menu-list-icon"
                        class="custom-control-input"
                        value="icon-list-style-4"
                        checked=""
                    />
                    <label class="custom-control-label" for="sidebariconlist-4"
                    ><i class="icon-copy dw dw-next-2"></i
                        ></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input
                        type="radio"
                        id="sidebariconlist-5"
                        name="menu-list-icon"
                        class="custom-control-input"
                        value="icon-list-style-5"
                    />
                    <label class="custom-control-label" for="sidebariconlist-5"
                    ><i class="dw dw-fast-forward-1"></i
                        ></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input
                        type="radio"
                        id="sidebariconlist-6"
                        name="menu-list-icon"
                        class="custom-control-input"
                        value="icon-list-style-6"
                    />
                    <label class="custom-control-label" for="sidebariconlist-6"
                    ><i class="dw dw-next"></i
                        ></label>
                </div>
            </div>

            <div class="reset-options pt-30 text-center">
                <button class="btn btn-danger" id="reset-settings">
                    Reset Settings
                </button>
            </div>
        </div>
    </div>
</div>

<div class="left-side-bar">
    <div class="brand-logo">
        <a href="{{ route('admin.home') }}">
            <img src="{{ url('resources/assets/admin/vendors/images/deskapp-logo.svg') }}" alt="" class="dark-logo" />
            <img
                src="{{ url('resources/assets/admin/vendors/images/deskapp-logo-white.svg') }}"
                alt=""
                class="light-logo"
            />
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">

                <li>
                    <a href="{{ route('admin.home') }}" class="dropdown-toggle no-arrow">
								<span class="micon fa fa-dashboard"></span
                                ><span class="mtext">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.members') }}" class="dropdown-toggle no-arrow">
								<span class="micon fa fa-users"></span
                                ><span class="mtext">Members</span>
                    </a>
                </li>

                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
								<span class="micon bi bi-table"></span
                                ><span class="mtext">Forms</span>
                    </a>
                    <ul class="submenu">
                        <li><a class="{{ (url()->current() == url('/admin/form-member')) ? 'active' : '' }}" href="{{ route('admin.form-member') }}">Member </a></li>
                        <li><a class="{{ (url()->current() == url('/admin/designation')) ? 'active' : '' }}" href="{{ route('admin.designation') }}">Designation</a></li>
                        <li><a class="{{ (url()->current() == url('/admin/form-accomp')) ? 'active' : '' }}"  href="{{ route('admin.form-accomp') }}">Accomplishment</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
								<span class="micon bi bi-table"></span
                                ><span class="mtext">Report</span>
                    </a>
                    <ul class="submenu">
                        <li><a class="{{ (url()->current() == url('/admin/accomp-report')) ? 'active' : '' }}" href="{{ url('/admin/accomp-report') }}">Accomplishment</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('admin.calendar') }}" class="dropdown-toggle no-arrow">
								<span class="micon bi bi-calendar4-week"></span
                                ><span class="mtext">Calendar</span>
                    </a>
                </li>

                <li>
                    <div class="dropdown-divider"></div>
                </li>
                <li>
                    <div class="sidebar-small-cap">Extra</div>
                </li>
                <li>
                    <a
                        href="https://dropways.github.io/deskapp-free-single-page-website-template/"
                        target="_blank"
                        class="dropdown-toggle no-arrow"
                    >
                        <span class="micon icon-copy fa fa-power-off" style="color:red" aria-hidden="true"></span>
{{--                        <span class="micon bi bi-layout-text-window-reverse"></span>--}}
                        Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="mobile-menu-overlay"></div>
