<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admins\AuthController;
use App\Http\Controllers\admins\AdminsController;
use App\Http\Controllers\admins\GVController;
use App\Http\Controllers\admins\HSController;
use App\Http\Controllers\admins\KhoiController;
use App\Http\Controllers\admins\LopHocController;
use App\Http\Controllers\admins\MonHocController;
use App\Http\Controllers\admins\NHController;
use App\Http\Controllers\admins\HKController;
use App\Http\Controllers\admins\KQController;

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminsController::class,'index'])->name('admins.home');
    // NHOM GV
    Route::prefix('giaovien')->group(function () {
        Route::get('/', [GVController::class,'index'])->name('admins.gv');
          
        // route for back gv
        Route::get('/back', [GVController::class,'back'])->name('admins.gvBack');

        // route for add gv
        Route::get('/create', [GVController::class,'createGET'])->name('admins.GVCreateGET');
        Route::post('/create', [GVController::class,'createPOST'])->name('admins.GVCreatePOST');

        // route for edit gv
        Route::get('/edit/{id}', [GVController::class,'editGET'])->name('admins.GVEditGET');
        Route::post('/edit/{id}', [GVController::class,'editPOST'])->name('admins.GVEditPOST');

        // route for delete gv
        Route::get('/delete/{id}', [GVController::class,'delete'])->name('admins.GVDelete');

        // route for search gv
        Route::post('/', [GVController::class,'search'])->name('admins.GVSearch');
    });

    // NHOM HS
    Route::prefix('hocsinh')->group(function () {
        Route::get('/', [HSController::class,'index'])->name('admins.hs');
        
        // route for back hs
        Route::get('/back', [HSController::class,'back'])->name('admins.hsBack');

        // route for add hs
        Route::get('/create', [HSController::class,'createGET'])->name('admins.HSCreateGET');
        Route::post('/create', [HSController::class,'createPOST'])->name('admins.HSCreatePOST');

        // route for edit hs
        Route::get('/edit/{id}', [HSController::class,'editGET'])->name('admins.HSEditGET');
        Route::post('/edit/{id}', [HSController::class,'editPOST'])->name('admins.HSEditPOST');

        // route for delete hs
        Route::get('/delete/{id}', [HSController::class,'delete'])->name('admins.HSDelete');

        // route for search hs
        Route::post('/', [HSController::class,'search'])->name('admins.HSSearch');
    });

        // NHOM Khoi
        Route::prefix('khoi')->group(function () {
        Route::get('/', [KhoiController::class,'index'])->name('admins.kh');
        
        // route for back Khoi
        Route::get('/back', [KhoiController::class,'back'])->name('admins.khBack');

        // route for add Khoi
        Route::get('/create', [KhoiController::class,'createGET'])->name('admins.KhoiCreateGET');
        Route::post('/create', [KhoiController::class,'createPOST'])->name('admins.KhoiCreatePOST');

        // route for edit Khoi
        Route::get('/edit/{id}', [KhoiController::class,'editGET'])->name('admins.KhoiEditGET');
        Route::post('/edit/{id}', [KhoiController::class,'editPOST'])->name('admins.KhoiEditPOST');

        // route for delete Khoi
        Route::get('/delete/{id}', [KhoiController::class,'delete'])->name('admins.KhoiDelete');

        // route for search Khoi
        Route::post('/', [KhoiController::class,'search'])->name('admins.KhoiSearch');
    });


    // NHOM LopHoc
    Route::prefix('lophoc')->group(function () {
        Route::get('/', [LopHocController::class,'index'])->name('admins.lh');
        
        // route for back LopHoc
        Route::get('/back', [LopHocController::class,'back'])->name('admins.lhBack');

        // route for add LopHoc
        Route::get('/create', [LopHocController::class,'createGET'])->name('admins.LopHocCreateGET');
        Route::post('/create', [LopHocController::class,'createPOST'])->name('admins.LopHocCreatePOST');

        // route for edit LopHoc
        Route::get('/edit/{id}', [LopHocController::class,'editGET'])->name('admins.LopHocEditGET');
        Route::post('/edit/{id}', [LopHocController::class,'editPOST'])->name('admins.LopHocEditPOST');

        // route for delete LopHoc
        Route::get('/delete/{id}', [LopHocController::class,'delete'])->name('admins.LopHocDelete');

        // route for search LopHoc
        Route::post('/', [LopHocController::class,'search'])->name('admins.LopHocSearch');
    });

    // NHOM MonHoc
    Route::prefix('monhoc')->group(function () {
        Route::get('/', [MonHocController::class,'index'])->name('admins.mh');
        
        // route for back MonHoc
        Route::get('/back', [MonHocController::class,'back'])->name('admins.mhBack');

        // route for add MonHoc
        Route::get('/create', [MonHocController::class,'createGET'])->name('admins.MonHocCreateGET');
        Route::post('/create', [MonHocController::class,'createPOST'])->name('admins.MonHocCreatePOST');

        // route for edit MonHoc
        Route::get('/edit/{id}', [MonHocController::class,'editGET'])->name('admins.MonHocEditGET');
        Route::post('/edit/{id}', [MonHocController::class,'editPOST'])->name('admins.MonHocEditPOST');

        // route for delete MonHoc
        Route::get('/delete/{id}', [MonHocController::class,'delete'])->name('admins.MonHocDelete');

        // route for search MonHoc
        Route::post('/', [MonHocController::class,'search'])->name('admins.MonHocSearch');
    });

    // NHOM NamHoc
    Route::prefix('namhoc')->group(function () {
        Route::get('/', [NHController::class,'index'])->name('admins.nh');
        
        // route for back NamHoc
        Route::get('/back', [NHController::class,'back'])->name('admins.nhBack');

        // route for add NamHoc
        Route::get('/create', [NHController::class,'createGET'])->name('admins.NamHocCreateGET');
        Route::post('/create', [NHController::class,'createPOST'])->name('admins.NamHocCreatePOST');

        // route for edit NamHoc
        Route::get('/edit/{id}', [NHController::class,'editGET'])->name('admins.NamHocEditGET');
        Route::post('/edit/{id}', [NHController::class,'editPOST'])->name('admins.NamHocEditPOST');

        // route for delete NamHoc
        Route::get('/delete/{id}', [NHController::class,'delete'])->name('admins.NamHocDelete');

        // route for search NamHoc
        Route::post('/', [NHController::class,'search'])->name('admins.NamHocSearch');
    });

    // NHOM HocKi
    Route::prefix('hocki')->group(function () {
        Route::get('/', [HKController::class,'index'])->name('admins.hk');
        
        // route for back HocKi
        Route::get('/back', [HKController::class,'back'])->name('admins.hkBack');

        // route for add HocKi
        Route::get('/create', [HKController::class,'createGET'])->name('admins.HocKiCreateGET');
        Route::post('/create', [HKController::class,'createPOST'])->name('admins.HocKiCreatePOST');

        // route for edit HocKi
        Route::get('/edit/{id}', [HKController::class,'editGET'])->name('admins.HocKiEditGET');
        Route::post('/edit/{id}', [HKController::class,'editPOST'])->name('admins.HocKiEditPOST');

        // route for delete HocKi
        Route::get('/delete/{id}', [HKController::class,'delete'])->name('admins.HocKiDelete');

        // route for search HocKi
        Route::post('/', [HKController::class,'search'])->name('admins.HocKiSearch');
    });


    // NHOM KETQUA
    Route::prefix('ketqua')->group(function () {
        Route::get('/', [KQController::class,'index'])->name('admins.kq');
        
        // route for back KETQUA
        Route::get('/back', [KQController::class,'back'])->name('admins.kqBack');

        // route for add KETQUA
        Route::get('/create', [KQController::class,'createGET'])->name('admins.KetQuaCreateGET');
        Route::post('/create', [KQController::class,'createPOST'])->name('admins.KetQuaCreatePOST');

        // route for edit KETQUA
        Route::get('/edit/{id}', [KQController::class,'editGET'])->name('admins.KetQuaEditGET');
        Route::post('/edit/{id}', [KQController::class,'editPOST'])->name('admins.KetQuaEditPOST');

        // route for delete KETQUA
        Route::get('/delete/{id}', [KQController::class,'delete'])->name('admins.KetQuaDelete');

        // route for search KETQUA
        Route::post('/', [KQController::class,'searchIndex'])->name('admins.SearchIndex');
        Route::post('/create/search', [KQController::class,'searchAdd_lop'])->name('admins.SearchAdd');
    });
});
