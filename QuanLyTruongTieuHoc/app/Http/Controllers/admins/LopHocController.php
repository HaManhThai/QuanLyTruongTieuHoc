<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LopHocModel;
use App\Models\GVModel;
use App\Models\KhoiModel;
use App\Models\HSModel;
use App\Models\MHModel;
use Illuminate\Support\Facades\DB;

class LopHocController extends Controller
{
    public function index(){
        $data = DB::table('LOPHOC as lh')
        ->join('GIAOVIEN as gv', 'lh.IDGV', '=', 'gv.IDGV')
        ->join('KHOI as kh', 'lh.IDKhoi', '=', 'kh.IDKhoi')
        ->select(
            'lh.IDLop',
            'lh.TenLop',
            'lh.IDGV',
            'kh.IDKhoi',
            'kh.TenKhoi',
            'gv.IDGV',
            'gv.TenGV',
            DB::raw('COUNT(hs.IDHS) as SiSo')
        )
        ->leftJoin('HOCSINH as hs', 'lh.IDLop', '=', 'hs.IdLop')    
        ->groupBy('lh.IDLop', 'lh.TenLop', 'lh.IDGV', 'kh.IDKhoi', 'kh.TenKhoi', 'gv.IDGV', 'gv.TenGV')
        ->get();


        // Cập nhật sĩ số cho từng lớp học
        foreach ($data as $item) {
        // Đếm số lượng học sinh trong lớp
        $siSo = HSModel::where('IdLop', $item->IDLop)->count();

        // Cập nhật SiSo vào bảng LOPHOC
        DB::table('LOPHOC')->where('IDLop', $item->IDLop)->update(['SiSo' => $siSo]);
        }

        return view('admins.LopHoc.index',['data' => $data,'kitu' => '']);
    }

    public function back(){
        return redirect('/admin/lophoc');
    }

    public function createGET(){
        $data = GVModel::all();
        $data1 = KhoiModel::all();
        return view('admins.LopHoc.addLopHoc',['data' => $data, 'data1' => $data1]);
    }

    public function createPOST(Request $request){
            $Lop = new LopHocModel;
            $Lop->TenLop = $request->name;
            $Lop->IDKhoi = $request->khoi;
            $Lop->SiSo = $request->num;
            $Lop->IDGV = $request->gvcn;
            $Lop->save();
            return redirect('/admin/lophoc');
    }

    public function editGET($id){
        $data = LopHocModel::where('IDLop',$id)->first();
        $data1 = GVModel::all();     
        $data2 = KhoiModel::all();     
       
        return view('admins.Lophoc.editLopHoc',['data' => $data, 'data1' => $data1, 'data2' => $data2]);
    }

    public function editPOST(Request $request, $id){
        
        $Lop = LopHocModel::where('IDLop',$id)->first();
            $Lop->TenLop = $request->name;
            $Lop->IDKhoi = $request->khoi;
            $Lop->SiSo = $request->num;
            $Lop->IDGV = $request->gvcn;
            $Lop->save();
            return redirect('/admin/lophoc');
    }

    public function delete($id){
        LophocModel::where('IDLop',$id)->delete();
        return redirect('/admin/lophoc')->with('deleteLopHoc','Thông tin lớp học đã được xoá !!!');
    }

    public function search(Request $request){
        $data = DB::table('LOPHOC as lh')
        ->join('GIAOVIEN as gv', 'lh.IDGV', '=', 'gv.IDGV')
        ->join('KHOI as kh', 'lh.IDKhoi', '=', 'kh.IDKhoi')
        ->select(
            'lh.IDLop',
            'lh.TenLop',
            'lh.IDGV',
            'kh.IDKhoi',
            'kh.TenKhoi',
            'gv.IDGV',
            'gv.TenGV',
            DB::raw('COUNT(hs.IDHS) as SiSo')
        )
        ->where('lh.TenLop','LIKE','%'.$request->kitu.'%')
        ->leftJoin('HOCSINH as hs', 'lh.IDLop', '=', 'hs.IdLop')    
        ->groupBy('lh.IDLop', 'lh.TenLop', 'lh.IDGV', 'kh.IDKhoi', 'kh.TenKhoi', 'gv.IDGV', 'gv.TenGV')
        ->get();
        return view('admins.LopHoc.index',['data' => $data,'kitu' => $request->kitu]);
    }
}
