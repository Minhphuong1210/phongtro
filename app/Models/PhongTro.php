<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhongTro extends Model
{
    use HasFactory;
    protected $table = 'phongtro';
    protected $fillable = ['name', 'image', 'content', 'slug', 'dien_tich', 'gia_tien', 'is_show_home', 'is_active', 'viewre', 'xa_id', 'huyen_id', 'thanh_pho_id', 'link_ban_do', 'nguoi_su_dung', 'tien_coc', 'thoi_han_hop_dong','category_id'];

   
    public function wards()
    {
        return $this->belongsTo(Wards::class, 'xa_id');
    }

    public function districts()
    {
        return $this->belongsTo(Districts::class, 'huyen_id');
    }
    public function provinces()
    {
        return $this->belongsTo(Provinces::class, 'thanh_pho_id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

public static function getWherePhongtro(){
   return self::where('is_active',1)->where('is_show_home',1);
}


}
