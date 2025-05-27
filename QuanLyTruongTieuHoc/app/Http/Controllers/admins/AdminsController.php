<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GVModel;
use App\Models\HSModel;
use App\Models\KhoiModel;
use App\Models\LopHocModel;
use App\Models\MHModel;
use App\Models\NHModel;
use App\Models\HKModel;


class AdminsController extends Controller
{
    public function index(){
        $dataGV = GVModel::all();
        $dataHS = HSModel::all();
        $dataKhoi = KhoiModel::all();
        $dataLH = LopHocModel::all();
        $dataMH = MHModel::all();
        $dataNH = NHModel::all();
        $dataHK = HKModel::all();
        return view('admins.index',['dataGV' => $dataGV,
                                    'dataHS' => $dataHS,
                                    'dataKhoi' => $dataKhoi, 
                                    'dataLH' => $dataLH,
                                    'dataMH' => $dataMH, 
                                    'dataNH' => $dataNH, 
                                    'dataHK' => $dataHK
                                ]);
    }

}
