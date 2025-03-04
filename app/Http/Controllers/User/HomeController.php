<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\PhongTro;

class HomeController extends Controller
{
    public function index()
    {
        $phongtros = PhongTro::getWherePhongtro()->paginate(6);
        $countTotalPhontro = count($phongtros);
        return view('Frontend.Home', compact('phongtros', 'countTotalPhontro'));
    }
    public function chi_tiet(string $slug)
    {
        $chitietPhongtro = PhongTro::getWherePhongtro()->where('slug', $slug)->first();
        return view('Frontend.PhongTroDetail', compact('chitietPhongtro', ));
    }


    public function tim_phong(string $slug){
        $category = Category::where('slug', $slug)->first();
        $phongtros = PhongTro::getWherePhongtro()->where('category_id', $category->id)->paginate(6);
        $countTotalPhontro = count($phongtros);
        return view('Frontend.Home', compact('phongtros', 'countTotalPhontro'));
    }
}
