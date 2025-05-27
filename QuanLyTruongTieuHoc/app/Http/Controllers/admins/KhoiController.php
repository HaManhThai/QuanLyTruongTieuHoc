<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KhoiModel;

class KhoiController extends Controller
{
    public function index(){
        $data = KhoiModel::all();
        return view('admins.Khoi.index',['data' => $data,'kitu' => '']);
    }

    public function back(){
        return redirect('/admin/khoi');
    }

    public function createGET(){
        return view('admins.Khoi.addKhoi');
    }

    public function createPOST(Request $request){
            $Khoi = new KhoiModel;
            $Khoi->TenKhoi = $request->name;
            $Khoi->save();
            return redirect('/admin/khoi');
    }

    public function editGET($id){
        $data = KhoiModel::where('IDKhoi',$id)->first();
        return view('admins.Khoi.editKhoi',['data' => $data]);
    }

    public function editPOST(Request $request, $id){
            $Khoi = KhoiModel::where('IDKhoi',$id)->first();
            $Khoi->TenKhoi = $request->name;
            $Khoi->save();
            return redirect('/admin/khoi');
    }

    public function delete($id){
        KhoiModel::where('IDKhoi',$id)->delete();
        return redirect('/admin/khoi')->with('deleteKhoi','Thông tin khối đã được xoá !!!');
    }

    public function search(Request $request){
        $data = KhoiModel::where('TenKhoi','LIKE','%'.$request->kitu.'%')->get();
        return view('admins.Khoi.index',['data' => $data,'kitu' => $request->kitu]);
    }
}
