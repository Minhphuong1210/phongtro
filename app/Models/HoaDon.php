<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    use HasFactory;
    protected $table = 'hoa_don';
    protected $fillable = ['hop_dong_id', 'ngay_lap', 'tong_tien', 'trang_thai'];
}
