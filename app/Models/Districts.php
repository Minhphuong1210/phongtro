<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Districts extends Model
{
    use HasFactory;
    protected $table='districts';
    protected $fillable = ['name', 'prefix','province_id '];
    public function PhongTro(){
        return $this->hasMany(PhongTro::class,'huyen_id','id');
    }

    public function show($id){
        return self::where('province_id','=',$id)->get();
    }
public static function getHuyen(){
    return self::all();
} 
}
