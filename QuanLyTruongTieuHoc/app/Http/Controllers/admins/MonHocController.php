<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MHModel;
use App\Models\KhoiModel;
use Illuminate\Support\Facades\DB;


class MonHocController extends Controller
{
    public function index(){
        $data = DB::table('MONHOC as mh')
            ->join('KHOI as kh','mh.IDKhoi','=','kh.IDKhoi')
            ->select(
                'mh.IDMH',
                'mh.TenMH',
                'mh.IDKhoi',
                'kh.IDKhoi',
                'kh.TenKhoi'
            )
            ->get();
        return view('admins.MonHoc.index',['data' => $data,'kitu' => '']);
    }

    public function back(){
        return redirect('/admin/monhoc');
    }

    public function createGET(){
        $data = KhoiModel::all();
        return view('admins.MonHoc.addMonHoc',['data' => $data]);
    }

    public function createPOST(Request $request){
            $MH = new MHModel;
            $MH->TenMH = $request->name;
            $MH->IDKhoi = $request->khoi;
            $MH->save();
            return redirect('/admin/monhoc');
    }

    public function editGET($id){
        $data = MHModel::where('IDMH',$id)->first();
        $data1 = KhoiModel::all();
        return view('admins.MonHoc.editMonHoc',['data' => $data, 'data1' => $data1]);
    }

    public function editPOST(Request $request, $id){
            $MH = MHModel::where('IDMH',$id)->first();
            $MH->TenMH = $request->name;
            $MH->IDKhoi = $request->khoi;
            $MH->save();
            return redirect('/admin/monhoc');
    }

    public function delete($id){
        MHModel::where('IDMH',$id)->delete();
        return redirect('/admin/monhoc')->with('deleteMonHoc','Thông tin môn học đã được xoá !!!');
    }

    public function search(Request $request){
        $data = DB::table('MONHOC as mh')
            ->join('KHOI as kh','mh.IDKhoi','=','kh.IDKhoi')
            ->select(
                'mh.IDMH',
                'mh.TenMH',
                'mh.IDKhoi',
                'kh.IDKhoi',
                'kh.TenKhoi'
            )
            ->where('mh.TenMH','LIKE','%'.$request->kitu.'%')
            ->get();
        return view('admins.MonHoc.index',['data' => $data,'kitu' => $request->kitu]);
    }
}
