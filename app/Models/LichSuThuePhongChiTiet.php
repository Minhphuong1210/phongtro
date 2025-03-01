<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LichSuThuePhongChiTiet extends Model
{
    use HasFactory;
    protected $table = 'lich_su_thue_phong_chi_tiet';
    protected $fillable = ['lich_su_thue_phong_id', 'phong_tro_id', 'thoi_han', 'gia_tien', 'tien_coc'];
}
