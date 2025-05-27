<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HSModel extends Model
{
    use HasFactory;
    protected $table = 'HOCSINH';
    public $timestamps = false;
    protected $primaryKey = 'IDHS';

}
