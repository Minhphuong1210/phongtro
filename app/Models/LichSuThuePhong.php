<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LichSuThuePhong extends Model
{
    use HasFactory;
    protected $table = 'lich_su_thue_phong';
    protected $fillable = ['user_id'];
}
