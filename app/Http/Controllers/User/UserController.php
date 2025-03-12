<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
class UserController extends Controller{
    public function thongTinCaNHan(){
       return view('Frontend.User.HomeUser');
    }
}