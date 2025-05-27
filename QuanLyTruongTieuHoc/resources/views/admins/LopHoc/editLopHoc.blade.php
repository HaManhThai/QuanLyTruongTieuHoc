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
                        <form action="{{ route('admins.LopHocEditPOST', $data->IDLop) }}" method="POST">
                            @csrf
                            <div class="card-header">
                                <h2 class="text-center">CHỈNH SỬA THÔNG TIN LỚP HỌC</h2>
                            </div>
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="id">ID lớp học: </label>
                                    <input type="text" name="id" id="id" class="form-control"
                                        placeholder="Nhập tên..." value="{{ $data->IDLop }}" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="name">Tên lớp học: </label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="Nhập tên..." value="{{ $data->TenLop }}" required>
                                </div>

                           
                         
                                <div class="form-group">
                                    <label for="gvcn">Giáo viên chủ nhiệm: </label> <br />
                                    <select name="gvcn" id="gvcn" required class="form-control">
                                        <option class="text-center">--Chọn giáo viên--</option>
                                        @foreach ($data1 as $item)
                                            <option value="{{ $item->IDGV }}" class="text-center"
                                                @if ($item->IDGV == $data->IDGV) selected @endif>
                                                {{ $item->TenGV }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="khoi">Khối: </label> <br />
                                    <select name="khoi" id="khoi" required class="form-control">
                                        <option class="text-center">--Chọn khối--</option>
                                        @foreach ($data2 as $item)
                                            <option value="{{ $item->IDKhoi }}" class="text-center"
                                                @if ($item->IDKhoi == $data->IDKhoi) selected @endif>
                                                {{ $item->TenKhoi }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>



                            </div>
                            <div class="card-footer">
                                <a href="{{ route('admins.lhBack') }}" class="btn btn-secondary">Back</a>
                                <button class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
