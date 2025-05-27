@extends('admins.layout.master')
@section('main')
    <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0"></h3>
                    </div>
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content Header-->

        <div class="app-content">
            <!--begin::Container-->
            <div class="container-fluid"> <!--begin::Row-->
                <div class="row"> <!--begin::Col-->
                    <div class="card">
                        <form action="{{ route('admins.GVCreatePOST') }}" method="POST">
                            @csrf
                            <div class="card-header">
                                @if (Session::has('trungSDT'))
                                    <div class="alert alert-danger">
                                        {{ Session::get('trungSDT') }}
                                    </div>
                                @endif
                                <h2 class="text-center">THÊM GIÁO VIÊN MỚI</h2>
                            </div>
                            <div class="card-body">

                                <div class="form-group my-3">
                                    <label for="name">Tên giáo viên: </label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="Nhập tên..." required>
                                </div>
                                <div class="form-group my-3">
                                    <label for="date">Ngày sinh: </label>
                                    <input type="text" name="date" id="date" class="form-control"
                                        placeholder="Nhập ngày sinh theo mẫu YYYY-MM-DD..." required>
                                </div>
                                <div class="form-group my-3">
                                    <label for="sex">Giới tính: </label>
                                    {{-- <div class="form-group"> --}}
                                        <label for="nam">Nam </label>
                                        <input type="radio" name="sex" id="nam" required value="Nam">
                                        <label for="nu">Nữ </label>
                                        <input type="radio" name="sex" id="nu" required value="Nữ">
                                    {{-- </div> --}}
                                    
                                </div>
                                <div class="form-group my-3">
                                    <label for="phone">Số điện thoại: </label>
                                    <input type="text" name="phone" id="phone" class="form-control"
                                        placeholder="Nhập số điện thoại..." required>
                                </div>

                            </div>
                            <div class="card-footer">
                                <a href="{{ route('admins.gvBack') }}" class="btn btn-secondary">Back</a>
                                <button class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
