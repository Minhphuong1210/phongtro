<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class password_resets extends Model
{
//    use HasFactory;
    protected $fillable=[
        'email',
        'token',
        'created_at',
        'updated_at',
    ];

    protected $table = 'password_reset_tokens';


    // so sánh xem 2 email cods giống nhau không
    public function Admin(){
        return $this->hasOne(User::class , 'email','email');
    }
    public function scopeCheckToken($q,$token){
        return $q->where('token',$token)->firstOrFail();
    }
}