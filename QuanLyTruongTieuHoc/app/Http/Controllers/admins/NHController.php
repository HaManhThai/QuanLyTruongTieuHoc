<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NHModel;

class NHController extends Controller
{
    public function index(){
        $data = NHModel::all();
        return view('admins.NamHoc.index',['data' => $data,'kitu' => '']);
    }

    public function back(){
        return redirect('/admin/namhoc');
    }

    public function createGET(){
        return view('admins.NamHoc.addNamHoc');
    }

    public function createPOST(Request $request){
            $NamHoc = new NHModel;
            $NamHoc->TenNamHoc = $request->name;
            $NamHoc->save();
            return redirect('/admin/namhoc');
    }

    public function editGET($id){
        $data = NHModel::where('IDNamHoc',$id)->first();
        return view('admins.NamHoc.editNamHoc',['data' => $data]);
    }

    public function editPOST(Request $request, $id){
            $NamHoc = NHModel::where('IDNamHoc',$id)->first();
            $NamHoc->TenNamHoc = $request->name;
            $NamHoc->save();
            return redirect('/admin/namhoc');
    }

    public function delete($id){
        NHModel::where('IDNamHoc',$id)->delete();
        return redirect('/admin/namhoc')->with('deleteNamHoc','Thông tin năm học đã được xoá !!!');
    }

    public function search(Request $request){
        $data = NHModel::where('TenNamHoc','LIKE','%'.$request->kitu.'%')->get();
        return view('admins.NamHoc.index',['data' => $data,'kitu' => $request->kitu]);
    }
}
