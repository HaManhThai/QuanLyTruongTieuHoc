<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HKModel;
use Illuminate\Support\Facades\DB;

class HKController extends Controller
{
    public function index(){
        $data = HKModel::all();
        return view('admins.HocKi.index',['data' => $data,'kitu' => '']);
    }

    public function back(){
        return redirect('/admin/hocki');
    }

    public function createGET(){
        return view('admins.HocKi.addHocKi');
    }

    public function createPOST(Request $request){
            $Ki = new HKModel;
            $Ki->TenKi = $request->name;
            $Ki->save();
            return redirect('/admin/hocki');
    }

    public function editGET($id){
        $data = HKModel::where('IDHK',$id)->first();
        return view('admins.HocKi.editHocKi',['data' => $data]);
    }

    public function editPOST(Request $request, $id){
            $HocKi = HKModel::where('IDHK',$id)->first();
            $HocKi->TenKi = $request->name;
            $HocKi->save();
            return redirect('/admin/hocki');
    }

    public function delete($id){
        HKModel::where('IDHK',$id)->delete();
        return redirect('/admin/hocki')->with('deleteHocKi','Thông tin học kì đã được xoá !!!');
    }

    public function search(Request $request){
        $data = HKModel::where('TenKi','LIKE','%'.$request->kitu.'%')->get();
        return view('admins.HocKi.index',['data' => $data,'kitu' => $request->kitu]);
    }
}
