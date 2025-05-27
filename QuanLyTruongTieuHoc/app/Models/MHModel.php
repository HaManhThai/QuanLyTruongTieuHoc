<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MHModel extends Model
{
    use HasFactory;
    protected $table = 'MONHOC';
    public $timestamps = false;
    protected $primaryKey = 'IDMH';

}
