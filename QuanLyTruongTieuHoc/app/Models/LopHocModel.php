<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LopHocModel extends Model
{
    use HasFactory;
    protected $table = 'LOPHOC';
    public $timestamps = false;
    protected $primaryKey = 'IDLop';




    // // Định nghĩa quan hệ 1-n với SinhVien
    // public function sinhViens()
    // {
    //     return $this->hasMany(HSModel::class, 'IDHS', 'IDHS');
    // }

    // // Định nghĩa quan hệ 1-n với MonHoc
    // public function monHocs()
    // {
    //     return $this->hasMany(MHModel::class, 'IDMH', 'IDMH');
    // }
}
