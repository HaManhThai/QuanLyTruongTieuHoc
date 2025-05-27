<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GVModel;
use Illuminate\Database\QueryException;

class GVController extends Controller
{
    public function index(){
        $data = GVModel::all();
        return view('admins.GV.index',['data' => $data,'kitu' => '']);
    }

    

    public function back(){
        return redirect('/admin/giaovien');
    }

    public function createGET(){
        return view('admins.GV.addGV');
    }

    public function createPOST(Request $request){
       
        try {
            // Thực hiện truy vấn
            GVModel::insert([
                'TenGV' => $request->name,
                'NgaySinh' => $request->date,
                'GioiTinh' => $request->sex,
                'SoDienThoai' => $request->phone
             
            ]);
        } catch (QueryException $e) {
            return redirect('/admin/giaovien/create')->with('trungSDT','Số điện thoại đã tồn tại !!!');
        }
        return redirect('/admin/giaovien');
    }

    public function editGET($id){
        $data = GVModel::where('IDGV',$id)->first();
        return view('admins.GV.editGV',['data' => $data]);
    }

    public function editPOST(Request $request, $id){

        try {
            // Thực hiện truy vấn
            $GV = GVModel::where('IDGV',$id)->first();
            $GV->TenGV = $request->name;
            $GV->NgaySinh = $request->date;
            $GV->GioiTinh = $request->sex;
            $GV->SoDienThoai = $request->phone;
            $GV->save();
        } catch (QueryException $e) {
            return redirect('/admin/giaovien/edit/'.$id)->with('trungSDT','Số điện thoại đã tồn tại !!!');
        }
        return redirect('/admin/giaovien');
    }

    public function delete($id){
        GVModel::where('IDGV',$id)->delete();
        return redirect('/admin/giaovien')->with('deleteGV','Thông tin giáo viên đã được xoá !!!');
    }

    public function search(Request $request){
        $data = GVModel::where('TenGV','LIKE','%'.$request->kitu.'%')->get();
        return view('admins.GV.index',['data' => $data,'kitu' => $request->kitu]);
    }
}
