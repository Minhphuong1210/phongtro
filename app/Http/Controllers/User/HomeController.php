<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\PhongTro;
use Illuminate\Http\Request;

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
        // dd(123);
        $chitietPhongtro = PhongTro::getWherePhongtro()->where('slug', $slug)->first();
        $huyen_id = $chitietPhongtro->huyen_id;

$sanPhamCungHuyen=PhongTro::getWherePhongtro()->where('huyen_id', $huyen_id)->whereNot('slug',$slug)->get();
// dd($sanPhamCungHuyen);

        return view('Frontend.PhongTroDetail', compact('chitietPhongtro','sanPhamCungHuyen' ));
    }


    public function tim_phong(string $slug)
    {

        $category = Category::where('slug', $slug)->first();
        $phongtros = PhongTro::getWherePhongtro()->where('category_id', $category->id)->paginate(6);
        $countTotalPhontro = count($phongtros);
        return view('Frontend.Home', compact('phongtros', 'countTotalPhontro'));
    }

    public function search(Request $request)
    {
        
        $query = PhongTro::query();
        if (!empty($request->input('fillter.loai_nha_dat'))) {
            $category = Category::where('slug', $request->input('fillter.loai_nha_dat'))->first();
            $id_category = $category['id'];
            $query->where('category_id', $id_category);
        }
        if (!empty($request->input('fillter.dia_chi.thanhPho'))) {
            $query->where('thanh_pho_id', $request->input('fillter.dia_chi.thanhPho'));
        }
        if (!empty($request->input('fillter.dia_chi.quan_huyen'))) {
            $query->where('huyen_id', $request->input('fillter.dia_chi.quan_huyen'));
        }

        if (!empty($request->input('fillter.khoang_gia'))) {
            $gia_tien = $request->input('fillter.khoang_gia');
            $query->whereBetween('gia_tien', [$gia_tien['min'], $gia_tien['max']]);
        }

        if (!empty($request->input('fillter.dien_tich'))) {
            $dientich = $request->input('fillter.dien_tich');
            $query->whereBetween('dien_tich', [$dientich['min'], $dientich['max']]);
        }

        $phongTro = $query->get();
        return response()->json(['phongtro' => $phongTro], 200);

    }
    public function theo_gia_va_dien_tich(Request $request)
    {

        $query = PhongTro::query();

        if ($request->query('gia')) {
            $gia = $request->query('gia');
            [$giaMin, $giaMax] = explode('-', $gia);

            $query->whereBetween('gia_tien', [(int)$giaMin, (int)$giaMax]);

        }
        if ($request->query('dien_tich')) {
            $dien_tich = $request->query('dien_tich');
    
            [$dien_tich_min, $dien_tich_max] = explode('-', $dien_tich);
            // dd($dien_tich_min);
            $query->whereBetween('dien_tich', [(int)$dien_tich_min, (int)$dien_tich_max]);
        }
        $phongtros=$query->paginate(6);
        // dd($phongtros);
        $countTotalPhontro = count($phongtros);
        return view('Frontend.Home', compact('phongtros', 'countTotalPhontro'));
    }
}
