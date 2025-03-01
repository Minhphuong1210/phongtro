<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HopDong extends Model
{
    use HasFactory;
    protected $table = 'hop_dong';
    protected $fillable = ['user_id', 'phong_tro_id', 'ngay_bat_dau', 'ngay_ket_thuc', 'gia_tien', 'tien_coc', 'trang_thai', 'ghi_chu'];
}
