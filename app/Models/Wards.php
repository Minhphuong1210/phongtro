<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wards extends Model
{
    use HasFactory;
    protected $table = 'wards';
    protected $fillable = ['name', 'prefix', 'province_id ', 'district_id '];

    public function PhongTro(){
        return $this->hasMany(PhongTro::class,'xa_id','id');
    }

    public function show($id){
        return self::where('district_id','=',$id)->get();
    }

    public static function getXa(){
        return self::all();
    } 
}
