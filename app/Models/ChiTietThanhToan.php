<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietThanhToan extends Model
{
    use HasFactory;
    protected $table = 'chi_tiet_thanh_toan';
    protected $fillable = ['hoa_don_id', 'so_tien', 'ngay_thanh_toan', 'phuong_thuc'];
}
