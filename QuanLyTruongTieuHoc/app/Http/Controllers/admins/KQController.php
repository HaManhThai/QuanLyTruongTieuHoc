<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LopHocModel;
use App\Models\MHModel;
use App\Models\HSModel;
use App\Models\HKModel;
use App\Models\NHModel;
use App\Models\KQModel;
use Illuminate\Support\Facades\DB;

class KQController extends Controller
{
    public function index(){
        $data = DB::table('KETQUA as kq')
        ->join('HOCSINH as hs','kq.IDHS','=','hs.IDHS')
        ->join('LOPHOC as lh','kq.IDLop','=','lh.IDLop')
        ->join('MONHOC as mh','kq.IDMH','=','mh.IDMH')
        ->join('HOCKI as hk','kq.IDHK','=','hk.IDHK')
        ->join('NAMHOC as nh','kq.IDNamHoc','=','nh.IDNamHoc')
        ->select(
            'kq.IDDiem',
            'kq.IDHS',
            'kq.IDLop',
            'kq.IDMH',
            'kq.IDHK',
            'kq.IDNamHoc',
            'kq.DiemGK',
            'kq.DiemCK',
            'kq.DiemTK',

            'hs.IDHS',
            'hs.TenHS',

            'lh.IDLop',
            'lh.TenLop',

            'mh.TenMH',

            'hk.TenKi',

            'nh.TenNamHoc',
        )
        ->get();

        $datahs = HSModel::all();     
        $datamh = MHModel::all();     
        $datalh = LopHocModel::all();     
        $datahk = HKModel::all();     
        $datanh = NHModel::all();     

        $kituhs = "";
        $kitumh = "";
        $kitulh = "";
        $kituhk = "";
        $kitunh = ""; 
            
                
        return view('admins.KetQua.index',[
            'data' => $data,
            'datahs' => $datahs,
            'datamh' => $datamh,
            'datalh' => $datalh,
            'datahk' => $datahk,
            'datanh' => $datanh,

            'kituhs' => $kituhs,
            'kitumh' => $kitumh,
            'kitulh' => $kitulh,
            'kituhk' => $kituhk,
            'kitunh' => $kitunh
        ]);
    }

    // xu ly tim kiem cho view kq.index
    public function searchIndex(Request $request){
        $data = DB::table('KETQUA as kq')
        ->join('HOCSINH as hs','kq.IDHS','=','hs.IDHS')
        ->join('LOPHOC as lh','kq.IDLop','=','lh.IDLop')
        ->join('MONHOC as mh','kq.IDMH','=','mh.IDMH')
        ->join('HOCKI as hk','kq.IDHK','=','hk.IDHK')
        ->join('NAMHOC as nh','kq.IDNamHoc','=','nh.IDNamHoc')
        ->select(
            'kq.IDDiem',
            'kq.IDHS',
            'kq.IDLop',
            'kq.IDMH',
            'kq.IDHK',
            'kq.IDNamHoc',
            'kq.DiemGK',
            'kq.DiemCK',
            'kq.DiemTK',

            'hs.IDHS',
            'hs.TenHS',

            'lh.IDLop',
            'lh.TenLop',

            'mh.TenMH',

            'hk.TenKi',

            'nh.TenNamHoc',
        )
        ->where(function($query) use ($request) {
            if (($request->kituhs) != "--Chọn học sinh--") {
                $query->where('hs.IDHS', $request->kituhs);
            }
            if (($request->kitumh) != "--Chọn môn học--") {
                $query->where('mh.IDMH', $request->kitumh);
            }
                if (($request->kitulh) != "--Chọn lớp học--") {
                $query->where('lh.IDLop', $request->kitulh);
            }
            if (($request->kituhk) != "--Chọn kì học--") {
                $query->where('hk.IDHK', $request->kituhk);
            }
            if (($request->kitunh) != "--Chọn năm học--") {
                $query->where('nh.IDNamHoc', $request->kitunh);
            }
        })
        ->get();

        $datahs = HSModel::all();     
        $datamh = MHModel::all();     
        $datalh = LopHocModel::all();     
        $datahk = HKModel::all();     
        $datanh = NHModel::all();     

        if($request->kituhs == "--Chọn học sinh--"){
            $kituhs = "";
        }else{
            $kituhs = HSModel::where('IDHS',$request->kituhs)->first();
        }

        if($request->kitumh == "--Chọn môn học--"){
            $kitumh = "";
        }else{
            $kitumh = MHModel::where('IDMH',$request->kitumh)->first();
        }

        if($request->kitulh == "--Chọn lớp học--"){
            $kitulh = "";
        }else{
            $kitulh = LopHocModel::where('IDLop',$request->kitulh)->first();
        }

        if($request->kituhk == "--Chọn kì học--"){
            $kituhk = "";
        }else{
            $kituhk = HKModel::where('IDHK',$request->kituhk)->first();
        }
        
        if($request->kitunh == "--Chọn năm học--"){
            $kitunh = "";
        }else{
            $kitunh = NHModel::where('IDNamHoc',$request->kitunh)->first();
        }
        
        return view('admins.KetQua.index',[
            'data' => $data,
            'datahs' => $datahs,
            'datamh' => $datamh,
            'datalh' => $datalh,
            'datahk' => $datahk,
            'datanh' => $datanh,
            
            'kituhs' => $kituhs,
            'kitumh' => $kitumh,
            'kitulh' => $kitulh,
            'kituhk' => $kituhk,
            'kitunh' => $kitunh
        ]);
    }

    public function back(){
        return redirect('/admin/ketqua');
    }

    public function createGET(Request $request){
        // data đổ về phần trên
        $datalh = LopHocModel::all();   
      
        // phần kí tự   
        if($request->kitulh == "--Chọn lớp học--"){
            $kitulh = "";
        }else{
            $kitulh = LopHocModel::where('IDLop',$request->kitulh)->first();
        }
        // return
        return view('admins.KetQua.addKQ',[      
                                            'datalh' => $datalh,                               
                                            'kitulh' => $kitulh
                                        ]);
    }

    // xu ly tim kiem cho view kq.addKQ (search lop)
    public function searchAdd_lop(Request $request){
        $kitumh = null;
        $kituhk = null;
        $kitunh = null; 

        $datalh = LopHocModel::all();      
        $datahk = HKModel::all();     
        $datanh = NHModel::all();     

        if($request->kitulh == "--Chọn lớp học--"){
            $kitulh = "";
        }else{
            $kitulh = LopHocModel::where('IDLop',$request->kitulh)->first();
            $IDKhoi = LopHocModel::where('IDLop',$request->kitulh)->select('IDKhoi')->first()->IDKhoi;
            $datamh = MHModel::where('IDKhoi',$IDKhoi)->get();
        }

        // lay tat ca hs thuoc 1 lop hoc nao do
        $data_hs_of_lh = DB::table('HOCSINH as hs')
        ->join('LOPHOC as lh', 'hs.IDLop','=', 'lh.IDLop')
        ->select(
            'hs.IDHS',
            'hs.TenHS'
        )
        ->where('hs.IDLop', $request->kitulh)
        ->get();
        
        return view('admins.KetQua.addKQ',[
            'datamh' => $datamh,
            'datalh' => $datalh,
            'datahk' => $datahk,
            'datanh' => $datanh,
        
            'kitumh' => $kitumh,
            'kitulh' => $kitulh,
            'kituhk' => $kituhk,
            'kitunh' => $kitunh,
           
            'data_hs_of_lh' => $data_hs_of_lh
        ]);
    }

    public function createPOST(Request $request){
        $diemgk = $request->input('diemgk');
        $diemck = $request->input('diemck');

        foreach ($diemgk as $idhs => $diem_gk) {
            $diem_ck = $diemck[$idhs];
            // Thực hiện lưu điểm cho học sinh $idhs
            $KetQua = new KQModel;
            $KetQua->IDHS = $idhs;
            $KetQua->IDLop = $request->kitulh;
            $KetQua->IDMH = $request->kitumh;
            $KetQua->IDHK = $request->kituhk;
            $KetQua->IDNamHoc = $request->kitunh;
            $KetQua->DiemGK = $diem_gk;
            $KetQua->DiemCK = $diem_ck;
            $KetQua->save();
        }        
        return redirect('/admin/ketqua');
    }
}





