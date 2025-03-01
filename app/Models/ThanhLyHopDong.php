<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThanhLyHopDong extends Model
{
    use HasFactory;
    protected $table = 'thanh_ly_hop_dong';
    protected $fillable = ['hop_dong_id', 'ngay_thanh_ly', 'ly_do', 'tien_hoan_tra'];
}
