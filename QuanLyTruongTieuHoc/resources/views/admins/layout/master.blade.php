<!DOCTYPE html>
<html lang="en">   
    <!--begin::head-->
    @include('admins/layout.head')
    <!--begin::head-->

<!--begin::Body-->
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary"> 
    <div class="app-wrapper"> 

        <!--begin::sideBar-->
        @include('admins/layout.sideBar')
        <!--end::sideBar-->
        
        @yield('main')
       

        <!--begin::footer-->
        @include('admins/layout.footer')
        <!--end::footer-->

    </div> 
    <!--begin::script-->
    @include('admins/layout.script')
    <!--end::script-->

</body>
<!--end::Body-->

</html>