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
                        <h3 class="mb-0">GIÁO VIÊN</h3>
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
                            @if (Session::has('deleteGV'))
                                <div class="alert alert-danger">
                                    {{ Session::get('deleteGV') }}
                                </div>
                            @endif

                            <!--begin::Input Group-->
                            <div class="card card-success card-outline mb-4">
                                <form action="{{ route('admins.GVSearch') }}" method="POST">
                                    @csrf
                                    <!--begin::Header-->
                                    <div class="card-header">
                                        <div class="card-title">Tìm kiếm giáo viên</div>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body">
                                        <div class="input-group mb-3"> <span class="input-group-text"
                                                id="basic-addon1">Tên giáo viên</span> <input type="text" name="kitu" class="form-control"
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
                                        <th class="text-center">ID GIÁO VIÊN</th>
                                        <th class="text-center">TÊN GIÁO VIÊN</th>
                                        <th class="text-center">NGÀY SINH</th>
                                        <th class="text-center">GIỚI TÍNH</th>
                                        <th class="text-center">SỐ ĐIỆN THOẠI</th>
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
                                            <td class="text-center">{{ $item->IDGV }}</td>
                                            <td class="text-center">{{ $item->TenGV }}</td>
                                            <td class="text-center">{{ $item->NgaySinh }}</td>
                                            <td class="text-center">{{ $item->GioiTinh }}</td>
                                            <td class="text-center">{{ $item->SoDienThoai }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('admins.GVEditGET',$item->IDGV) }}"
                                                    class="btn btn-info"> <i class="fa-solid fa-pen-to-square"></i> EDIT</a>
                                                <a href="{{ route('admins.GVDelete',$item->IDGV) }}" class="btn btn-danger"
                                                    onclick="return confirm('Bạn có chắc chắn xoá danh mục này?')">
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
                                <a href="{{ route('admins.GVCreateGET') }}" class="btn btn-primary">Thêm</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
