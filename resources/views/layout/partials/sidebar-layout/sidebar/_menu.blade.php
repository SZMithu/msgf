<!--begin::sidebar menu-->
<div class="app-sidebar-menu overflow-hidden flex-column-fluid">
    <!--begin::Menu wrapper-->
    <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
        <!--begin::Menu-->
        <div class="menu menu-column menu-rounded menu-sub-indention px-3 fw-semibold fs-6" id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
            <!--begin:Menu item-->
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ request()->routeIs('dashboard') ? 'here show' : '' }}">
                <!--begin:Menu link-->
                <span class="menu-link">
                    <span class="menu-icon">{!! getIcon('element-11', 'fs-2') !!}</span>
                    <a href="{{ route('dashboard') }}">
                        <span class="menu-title">Dashboards</span></a>
                    <!-- <span class="menu-arrow"></span> -->
                </span>
                <!--end:Menu link-->
                <!--begin:Menu sub-->
                <!-- <div class="menu-sub menu-sub-accordion">
					<div class="menu-item">
						<a class="menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
							<span class="menu-bullet">
								<span class="bullet bullet-dot"></span>
							</span>
							<span class="menu-title">Default</span>
						</a>
					</div>
				</div> -->
            </div>
            <!--end:Menu item-->
            <!--begin:Menu item-->
            <div class="menu-item pt-5">
                <!--begin:Menu content-->
                <div class="menu-content">
                    <span class="menu-heading fw-bold text-uppercase fs-7">Apps</span>
                </div>
                <!--end:Menu content-->
            </div>
            <!--end:Menu item-->
            <!--begin:Menu item-->
            <!-- <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ request()->routeIs('user-management.*') ? 'here show' : '' }}"> -->
            <!--begin:Menu link-->
            <!-- <span class="menu-link">
					<span class="menu-icon">{!! getIcon('abstract-28', 'fs-2') !!}</span>
					<span class="menu-title">User Management</span>
					<span class="menu-arrow"></span>
				</span> -->
            <!--end:Menu link-->
            <!--begin:Menu sub-->
            <!-- <div class="menu-sub menu-sub-accordion"> -->
            <!--begin:Menu item-->

            <!--end:Menu item-->
            <!-- </div> -->
            <!--end:Menu sub-->
            <!-- </div> -->
            <!--begin:Menu item-->
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ request()->routeIs('forms.*') ? 'here show' : '' }}">
                <!--begin:Menu link-->
                <a href="{{ route('forms.user') }}" class="menu-link {{ request()->routeIs('forms.*') ? 'active' : '' }}"> <span class="menu-link">
                        <span class="menu-icon">{!! getIcon('abstract-28', 'fs-2') !!}</span>
                        <span class="menu-title">Form Entries</span>
                        <!-- <span class="menu-arrow"></span> -->
                    </span></a>
                <!--end:Menu link-->
                <!--begin:Menu sub-->

                <!--end:Menu sub-->
            </div>
            <!--end:Menu item-->

            <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ request()->routeIs('mca.*') ? 'here show' : '' }}">
                <!--begin:Menu link-->
                <span class="menu-link">
                    <span class="menu-icon">{!! getIcon('abstract-28', 'fs-2') !!}</span>
                    <span class="menu-title">Mca Reports</span>
                    <span class="menu-arrow"></span>
                </span>
                <!--end:Menu link-->
                <!--begin:Menu sub-->
                <div class="menu-sub menu-sub-accordion">

                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link {{ request()->routeIs('mca.reports.new') ? 'active' : '' }}" href="{{ route('mca.reports.new') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Generate New</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->

                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link {{ request()->routeIs('mca.reports') ? 'active' : '' }}" href="{{ route('mca.reports') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Reports</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->

                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link {{ request()->routeIs('mca.reports.scanned.emails') ? 'active' : '' }}" href="{{ route('mca.reports.scanned.emails') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Scanned Emails</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->

                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link {{ request()->routeIs('mca.reports.settingss') ? 'active' : '' }}" href="{{ route('mca.reports.settings') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Settings</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->

                </div>
                <!--end:Menu sub-->
            </div>


            <!--begin:Menu item-->
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ request()->routeIs('setting.*') ? 'here show' : '' }} {{ request()->routeIs('user-management.*') ? 'here show' : '' }}">
                <!--begin:Menu link-->
                <span class="menu-link">
                    <span class="menu-icon">{!! getIcon('abstract-28', 'fs-2') !!}</span>
                    <span class="menu-title">Settings</span>
                    <span class="menu-arrow"></span>
                </span>
                <!--end:Menu link-->
                <!--begin:Menu sub-->
                <div class="menu-sub menu-sub-accordion">
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link {{ request()->routeIs('setting.general.setting') ? 'active' : '' }}" href="{{ route('setting.general.setting') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">General Setting</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->

                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link {{ request()->routeIs('setting.congrats.setting') ? 'active' : '' }}" href="{{ route('setting.congrats.setting') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Congrats Page</span>
                        </a>
                        <!--end:Menu link-->
                    </div>


                    <!--end:Menu item-->

                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link {{ request()->routeIs('setting.tracking.links') ? 'active' : '' }}" href="{{ route('setting.tracking.links') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Tracking Links</span>
                        </a>
                        <!--end:Menu link-->
                    </div>


                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link {{ request()->routeIs('user-management.users.*') ? 'active' : '' }}" href="{{ route('user-management.users.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Users</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link {{ request()->routeIs('user-management.roles.*') ? 'active' : '' }}" href="{{ route('user-management.roles.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Roles</span>
                        </a>
                        <!--end:Menu link-->
                    </div>


                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link {{ request()->routeIs('user-management.permissions.*') ? 'active' : '' }}" href="{{ route('user-management.permissions.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Permissions</span>
                        </a>
                        <!--end:Menu link-->
                    </div>


                    <!--end:Menu item-->

                    <!--begin:Menu item-->
                    <!-- <div class="menu-item">
						<a class="menu-link {{ request()->routeIs('setting.website.pages') ? 'active' : '' }}" href="{{ route('setting.website.pages') }}">
							<span class="menu-bullet">
								<span class="bullet bullet-dot"></span>
							</span>
							<span class="menu-title">Website Pages</span>
						</a>
					</div> -->
                    <!--end:Menu item-->



                </div>
                <!--end:Menu sub-->
            </div>
            <!--end:Menu item-->
            <!--begin:Menu item-->
            <!-- <div class="menu-item pt-5">
				<div class="menu-content">
					<span class="menu-heading fw-bold text-uppercase fs-7">Help</span>
				</div>
			</div> -->
            <!--end:Menu item-->
            <!--begin:Menu item-->
            <!-- <div class="menu-item">
				<a class="menu-link" href="https://preview.keenthemes.com/html/metronic/docs/base/utilities" target="_blank">
					<span class="menu-icon">{!! getIcon('rocket', 'fs-2') !!}</span>
					<span class="menu-title">Components</span>
				</a>
			</div> -->
            <!--end:Menu item-->
            <!--begin:Menu item-->
            <!-- <div class="menu-item">
				<a class="menu-link" href="https://preview.keenthemes.com/laravel/metronic/docs" target="_blank">
					<span class="menu-icon">{!! getIcon('abstract-26', 'fs-2') !!}</span>
					<span class="menu-title">Documentation</span>
				</a>
			</div> -->
            <!--end:Menu item-->
            <!--begin:Menu item-->
            <!-- <div class="menu-item"> -->
            <!--begin:Menu link-->
            <!-- <a class="menu-link" href="https://preview.keenthemes.com/laravel/metronic/docs/changelog" target="_blank">
					<span class="menu-icon">{!! getIcon('code', 'fs-2') !!}</span>
					<span class="menu-title">Changelog v8.2.5</span>
				</a> -->
            <!--end:Menu link-->
            <!-- </div> -->
            <!--end:Menu item-->
        </div>
        <!--end::Menu-->
    </div>
    <!--end::Menu wrapper-->
</div>
<!--end::sidebar menu-->
