<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HSModel;
use App\Models\LopHocModel;
use Illuminate\Support\Facades\DB;

class HSController extends Controller
{
    public function index(){
        $data = DB::table('HOCSINH as hs')
            ->join('LOPHOC as lh','lh.IDLop','=','hs.IDLop')
            ->select(
                'hs.IDHS',
                'hs.TenHS',
                'hs.NgaySinh',
                'hs.GioiTinh',
                'hs.DiaChi',
                'hs.IDLop',
                'lh.IDLop',
                'lh.TenLop'
            )
            ->get();
        return view('admins.HS.index',['data' => $data,'kitu' => '']);
    }

    public function back(){
        return redirect('/admin/hocsinh');
    }

    public function createGET(){
        $data = LopHocModel::all();
        return view('admins.HS.addHS',['data' => $data]);
    }

    public function createPOST(Request $request){
            $HS = new HSModel;
            $HS->TenHS = $request->name;
            $HS->NgaySinh = $request->date;
            $HS->GioiTinh = $request->sex;
            $HS->DiaChi = $request->address;
            $HS->IDLop = $request->lop;
            $HS->save();
            return redirect('/admin/hocsinh');
    }

    public function editGET($id){
        $data = HSModel::where('IDHS',$id)->first();
        $data1 = LopHocModel::all();
        return view('admins.HS.editHS',['data' => $data, 'data1' => $data1]);
    }

    public function editPOST(Request $request, $id){
            $HS = HSModel::where('IDHS',$id)->first();
            $HS->TenHS = $request->name;
            $HS->NgaySinh = $request->date;
            $HS->GioiTinh = $request->sex;
            $HS->IDLop = $request->lop;
            $HS->save();
            return redirect('/admin/hocsinh');
    }

    public function delete($id){
        HSModel::where('IDHS',$id)->delete();
        return redirect('/admin/hocsinh')->with('deleteHS','Thông tin học sinh đã được xoá !!!');
    }

    public function search(Request $request){
        $data = DB::table('HOCSINH as hs')
            ->join('LOPHOC as lh','lh.IDLop','=','hs.IDLop')
            ->select(
                'hs.IDHS',
                'hs.TenHS',
                'hs.NgaySinh',
                'hs.GioiTinh',
                'hs.DiaChi',
                'hs.IDLop',
                'lh.IDLop',
                'lh.TenLop'
            )
            ->where('TenHS','LIKE','%'.$request->kitu.'%')
            ->get();
        return view('admins.HS.index',['data' => $data,'kitu' => $request->kitu]);
    }
}
