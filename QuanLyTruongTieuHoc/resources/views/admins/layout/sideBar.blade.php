<!--begin::Sidebar-->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="#" class="brand-link">
            <!--begin::Brand Image-->
            <img src="/dist/assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image opacity-75 shadow">
            <!--end::Brand Image-->

            <!--begin::Brand Text-->
            <span class="brand-text fw-light">
                Trường tiểu học QPC
            </span>
            <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand--> <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2"> <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">

                <!--begin::Trang chủ-->
                <li class="nav-item"> <a href="{{ route('admins.home') }}" class="nav-link"> <i
                            class="nav-icon fa-solid fa-school"></i>
                        <p>
                            Trang chủ
                            {{-- <i class="nav-arrow bi bi-chevron-right"></i> --}}
                        </p>
                    </a>
                </li>
                <!--end::Trang chủ-->

                <!--begin:: giáo viên-->
                <li class="nav-item"> <a href="{{ route('admins.gv') }}" class="nav-link"> <i
                            class="nav-icon fa-solid fa-chalkboard-user"></i>
                        <p>
                            Giáo viên
                            {{-- <i class="nav-arrow bi bi-chevron-right"></i> --}}
                        </p>
                    </a>
                </li>
                <!--end::giáo viên-->

                <!--begin::Học sinh-->
                <li class="nav-item"> <a href="{{ route('admins.hs') }}" class="nav-link"> <i
                            class="nav-icon fa-solid fa-user-graduate"></i>
                        <p>
                            Học sinh
                            {{-- <i class="nav-arrow bi bi-chevron-right"></i> --}}
                        </p>
                    </a>
                </li>
                <!--end::Học sinh-->

                <!--begin::lớp học-->
                <li class="nav-item"> <a href="{{ route('admins.kh') }}" class="nav-link"> <i
                            class="nav-icon fa-solid fa-money-bill-trend-up"></i>
                        <p>
                            Khối
                            {{-- <i class="nav-arrow bi bi-chevron-right"></i> --}}
                        </p>
                    </a>
                </li>
                <!--end::lớp học-->

                <!--begin::lớp học-->
                <li class="nav-item"> <a href="{{ route('admins.lh') }}" class="nav-link"> <i
                            class=" nav-icon fa-solid fa-landmark"></i>
                        <p>
                            Lớp học
                            {{-- <i class="nav-arrow bi bi-chevron-right"></i> --}}
                        </p>
                    </a>
                </li>
                <!--end::lớp học-->

                <!--begin::môn học-->
                <li class="nav-item"> <a href="{{ route('admins.mh') }}" class="nav-link"> <i
                            class="nav-icon fa-solid fa-book "></i>
                        <p>
                            Môn học
                            {{-- <i class="nav-arrow bi bi-chevron-right"></i> --}}
                        </p>
                    </a>
                </li>
                <!--end::môn học-->

                <!--begin::học kì-->
                <li class="nav-item"> <a href="{{ route('admins.hk') }}" class="nav-link"> <i class="nav-icon fa-regular fa-calendar-days"></i>
                        <p>
                            Học kì
                            {{-- <i class="nav-arrow bi bi-chevron-right"></i> --}}
                        </p>
                    </a>
                </li>
                <!--end::học kì-->

                <!--begin::năm học-->
                <li class="nav-item"> <a href="{{ route('admins.nh') }}" class="nav-link"> <i class="nav-icon fa-regular fa-calendar-days"></i>
                        <p>
                            Năm học
                            {{-- <i class="nav-arrow bi bi-chevron-right"></i> --}}
                        </p>
                    </a>
                </li>
                <!--end::năm học-->


                <!--begin::điểm-->
                <li class="nav-item">
                    <a href="#" class="nav-link"> <i class="nav-icon fa-solid fa-marker"></i>
                        <p>
                            Điểm
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"> 
                            <a href="{{ route('admins.kq') }}" class="nav-link"> 
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Xem điểm</p>
                            </a> 
                        </li>
                        <li class="nav-item"> <a href="{{ route('admins.KetQuaCreateGET') }}" class="nav-link"> <i
                                    class="nav-icon bi bi-circle"></i>
                                <p>Nhập điểm</p>
                            </a> </li>

                    </ul>
                </li>
                <!--end::điểm-->




            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
<!--end::Sidebar-->
