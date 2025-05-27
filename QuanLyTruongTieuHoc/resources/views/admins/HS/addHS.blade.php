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
                    {{-- <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Dashboard
                            </li>
                        </ol>
                    </div> --}}
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
                        <form action="{{ route('admins.HSCreatePOST') }}" method="POST">
                            @csrf
                            <div class="card-header">
                                <h2 class="text-center">THÊM HỌC SINH MỚI</h2>
                            </div>
                            <div class="card-body">

                                <div class="form-group my-3">
                                    <label for="name">Tên học sinh: </label>
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
                                    <label for="address">Địa Chỉ: </label>
                                    <input type="text" name="address" id="address" class="form-control"
                                        placeholder="Nhập địa chỉ theo mẫu Xã - Huyện - Thành phố..." required>
                                </div>

                                <div class="form-group">
                                    <label for="lop">Lớp: </label> <br/>
                                    <select name="lop" id="lop" required class="form-control">
                                        <option class="text-center">--Chọn lớp--</option>
                                        @foreach ($data as $item)
                                            <option value="{{ $item->IDLop }}" class="text-center">{{ $item->TenLop }}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>

                            </div>
                            <div class="card-footer">
                                <a href="{{ route('admins.hsBack') }}" class="btn btn-secondary">Back</a>
                                <button class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
