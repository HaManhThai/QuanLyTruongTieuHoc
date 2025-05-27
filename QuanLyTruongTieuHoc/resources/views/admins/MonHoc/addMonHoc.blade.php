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
                        <form action="{{ route('admins.MonHocCreatePOST') }}" method="POST">
                            @csrf
                            <div class="card-header">
                                <h2 class="text-center">THÊM MÔN HỌC MỚI</h2>
                            </div>
                            <div class="card-body">

                                <div class="form-group my-3">
                                    <label for="name">Tên môn học: </label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="Nhập tên..." required>
                                </div>
                                <div class="form-group my-3">
                                    <label for="khoi">Khối: </label> <br/>
                                    <select name="khoi" id="khoi" required class="form-control">
                                        <option class="text-center">--Chọn khối--</option>
                                        @foreach ($data as $item)
                                            <option value="{{ $item->IDKhoi }}" class="text-center">{{ $item->TenKhoi }}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                               
                                

                            </div>
                            <div class="card-footer">
                                <a href="{{ route('admins.mhBack') }}" class="btn btn-secondary">Back</a>
                                <button class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
