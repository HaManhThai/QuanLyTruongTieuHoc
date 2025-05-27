<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GVModel extends Model
{
    use HasFactory;
    protected $table = 'GIAOVIEN';
    public $timestamps = false;
    protected $primaryKey = 'IDGV';

}
