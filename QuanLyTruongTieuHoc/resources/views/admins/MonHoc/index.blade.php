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
                        <h3 class="mb-0">MÔN HỌC</h3>
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
                        <div class="card-header">
                            @if (Session::has('deleteMonHoc'))
                                <div class="alert alert-danger">
                                    {{ Session::get('deleteMonHoc') }}
                                </div>
                            @endif

                            <!--begin::Input Group-->
                            <div class="card card-success card-outline mb-4">
                                <form action="{{ route('admins.MonHocSearch') }}" method="POST">
                                    @csrf
                                    <!--begin::Header-->
                                    <div class="card-header">
                                        <div class="card-title">Tìm kiếm môn học</div>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body">
                                        <div class="input-group mb-3"> <span class="input-group-text"
                                                id="basic-addon1">Tên môn học</span> <input type="text" name="kitu" class="form-control"
                                                placeholder="Name..." aria-label="Name"
                                                aria-describedby="basic-addon1" value="{{ $kitu }}"> </div>
                                        <div class="card-footer"> <button type="submit"
                                                class="btn btn-success"> <i class="fa-solid fa-magnifying-glass"></i> Search</button> </div> <!--end::Footer-->
                                    </div>
                                    <!--end::Body-->
                                    <!--begin::Footer-->
                                </form>
                            </div>
                            <!--end::Input Group-->
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">STT</th>
                                        <th class="text-center">ID MÔN HỌC</th>
                                        <th class="text-center">TÊN MÔN HỌC</th>
                                        <th class="text-center">THUỘC KHỐI</th>          
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $stt = 0;
                                    @endphp
                                    @foreach ($data as $item)
                                        @php
                                            $stt++;
                                        @endphp
                                        <tr>
                                            <td class="text-center">{{ $stt }}</td>
                                            <td class="text-center">{{ $item->IDMH }}</td>
                                            <td class="text-center">{{ $item->TenMH }}</td>
                                            <td class="text-center">{{ $item->TenKhoi }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('admins.MonHocEditGET',$item->IDMH) }}"
                                                    class="btn btn-info"> <i class="fa-solid fa-pen-to-square"></i> EDIT</a>
                                                <a href="{{ route('admins.MonHocDelete',$item->IDMH) }}" class="btn btn-danger"
                                                    onclick="return confirm('Bạn có chắc chắn xoá môn học này?')">
                                                    <i class="fa-solid fa-trash"></i> DELETE
                                                </a>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-between">
                                <h3>TOTAL: {{ $data->count() }}</h3>
                                <a href="{{ route('admins.MonHocCreateGET') }}" class="btn btn-primary">Thêm</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
