<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhoiModel extends Model
{
    use HasFactory;
    protected $table = 'KHOI';
    public $timestamps = false;
    protected $primaryKey = 'IDKhoi';

}
