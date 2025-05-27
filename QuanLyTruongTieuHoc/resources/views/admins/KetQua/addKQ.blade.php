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
                        <h3 class="mb-0">KẾT QUẢ</h3>
                    </div>
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content Header-->

        <div class="app-content">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <!--begin::Col-->
                    <div class="card">
                        <div class="card-header">
                            @if (Session::has('deleteDiem'))
                                <div class="alert alert-danger">
                                    {{ Session::get('deleteDiem') }}
                                </div>
                            @endif
                            <!--start::Search lớp học -->
                            <div class="card card-success card-outline mb-4">
                                <form action="{{ route('admins.SearchAdd') }}" method="POST">
                                    @csrf
                                    {{-- <div class="card-header">
                                        <div class="card-title">Tìm kiếm</div>
                                    </div>   --}}
                                    <div class="card-body">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">Lớp học</span>
                                            <select name="kitulh" id="kitulh" class="form-control">
                                                <option class="text-center">--Chọn lớp học--</option>
                                                @if ($kitulh != '')
                                                    <option class="text-center" value="{{ $kitulh->IDLop }}" selected>
                                                        {{ $kitulh->TenLop }}</option>
                                                @endif


                                                @foreach ($datalh as $item)
                                                    @if ($kitulh == '')
                                                        <option value="{{ $item->IDLop }}" class="text-center">
                                                            {{ $item->TenLop }}</option>
                                                    @else
                                                        @if ($kitulh->TenLop != $item->TenLop)
                                                            <option value="{{ $item->IDLop }}" class="text-center">
                                                                {{ $item->TenLop }}</option>
                                                        @endif
                                                    @endif
                                                @endforeach

                                            </select>
                                        </div>

                                        <div class="card-footer">
                                            <button type="submit" name="btn" class="btn btn-success"> <i
                                                    class="fa-solid fa-magnifying-glass"></i> Search</button>
                                        </div> 
                                    </div>
                                
                                </form>


                            </div>
                            <!--end::Search lớp học -->

                        </div>
                        @if ($kitulh != null)
                            <div class="card-body">

                                <!--start::Search các yếu tốc còn lại -->
                                <div class="card card-success card-outline mb-4">
                                    <form action="{{ route('admins.KetQuaCreatePOST') }}" method="POST">
                                        @csrf
                                        <div class="card-body">
                                            <input type="hidden" name="kitulh" value="{{ isset($kitulh) ? $kitulh->IDLop : '' }}">


                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">Môn học</span>
                                                <select name="kitumh" id="kitumh" class="form-control">

                                                    <option class="text-center">--Chọn môn học--</option>

                                                    @if ($kitumh != '')
                                                        <option class="text-center" value="{{ $kitumh->IDMH }}" selected>
                                                            {{ $kitumh->TenMH }}</option>
                                                    @endif

                                                    @foreach ($datamh as $item)
                                                        @if ($kitumh == '')
                                                            <option value="{{ $item->IDMH }}" class="text-center">
                                                                {{ $item->TenMH }}</option>
                                                        @else
                                                            @if ($kitumh->TenMH != $item->TenMH)
                                                                <option value="{{ $item->IDMH }}" class="text-center">
                                                                    {{ $item->TenMH }}</option>
                                                            @endif
                                                        @endif
                                                    @endforeach

                                                </select>
                                            </div>

                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">Kì học</span>
                                                <select name="kituhk" id="kituhk" class="form-control">
                                                    <option class="text-center">--Chọn kì học--</option>

                                                    @if ($kituhk != '')
                                                        <option class="text-center" value="{{ $kituhk->IDHK }}" selected>
                                                            {{ $kituhk->TenKi }}</option>
                                                    @endif

                                                    @foreach ($datahk as $item)
                                                        @if ($kituhk == '')
                                                            <option value="{{ $item->IDHK }}" class="text-center">
                                                                {{ $item->TenKi }}</option>
                                                        @else
                                                            @if ($kituhk->TenKi != $item->TenKi)
                                                                <option value="{{ $item->IDHK }}" class="text-center">
                                                                    {{ $item->TenKi }}</option>
                                                            @endif
                                                        @endif
                                                    @endforeach

                                                </select>
                                            </div>

                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">Năm học</span>
                                                <select name="kitunh" id="kitunh" class="form-control">
                                                    <option class="text-center">--Chọn năm học--</option>
                                                    @if ($kitunh != '')
                                                        <option class="text-center" value="{{ $kitunh->IDNamHoc }}"
                                                            selected>{{ $kitunh->TenNamHoc }}</option>
                                                    @endif


                                                    @foreach ($datanh as $item)
                                                        @if ($kitunh == '')
                                                            <option value="{{ $item->IDNamHoc }}" class="text-center">
                                                                {{ $item->TenNamHoc }}</option>
                                                        @else
                                                            @if ($kitunh->TenNamHoc != $item->TenNamHoc)
                                                                <option value="{{ $item->IDNamHoc }}" class="text-center">
                                                                    {{ $item->TenNamHoc }}</option>
                                                            @endif
                                                        @endif
                                                    @endforeach

                                                </select>
                                            </div>

                                        </div>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">STT</th>
                                                    <th class="text-center">HỌC SINH</th> <!-- suy ra tu idhs -->
                                                    <th class="text-center">ĐIỂM GIỮA KÌ </th>
                                                    <th class="text-center">ĐIỂM CUỐI KÌ </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $stt = 0;
                                                @endphp
                                                @foreach ($data_hs_of_lh as $item)
                                                    @php
                                                        $stt++;
                                                    @endphp
                                                    <tr>
                                                        <td class="text-center">{{ $stt }}</td>
                                                        <td class="text-center">{{ $item->TenHS }}</td>
                                                        <td class="text-center">
                                                            <input type="number" min="0" max="10"
                                                                step="0.01" name="diemgk[{{ $item->IDHS }}]">
                                                        </td>
                                                        <td class="text-center">
                                                            <input type="number" min="0" max="10"
                                                                step="0.01" name="diemck[{{ $item->IDHS }}]">
                                                        </td>

                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <button class="btn btn-primary">Xác nhận</button>
                                    </form>
                                </div>
                                <!--end::Search các yếu tốc còn lại -->



                            </div>

                            <div class="card-footer">
                                <div class="d-flex justify-content-between">
                                    <h3>TOTAL: {{ $data_hs_of_lh->count() }}</h3>

                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
