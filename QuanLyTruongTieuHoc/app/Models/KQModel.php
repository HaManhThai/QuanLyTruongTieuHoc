<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KQModel extends Model
{
    use HasFactory;
    protected $table = 'KETQUA';
    public $timestamps = false;
    protected $primaryKey = 'IDDiem';

}
