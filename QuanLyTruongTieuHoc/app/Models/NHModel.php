<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NHModel extends Model
{
    use HasFactory;
    protected $table = 'NAMHOC';
    public $timestamps = false;
    protected $primaryKey = 'IDNamHoc';

}
