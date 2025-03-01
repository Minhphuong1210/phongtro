<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinces extends Model
{
    use HasFactory;
    protected $table = 'provinces';
    protected $fillable = ['name', 'code'];

    public function PhongTro(){
        return $this->hasMany(PhongTro::class,'thanh_pho_id','id');
    }

public function show($id){
    return self::findOrFail($id);
}

public static function getThanhPho(){
    return self::all();
}

}
