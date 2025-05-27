<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HKModel extends Model
{
    use HasFactory;
    protected $table = 'HOCKI';
    public $timestamps = false;
    protected $primaryKey = 'IDHK';

}
