<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\PhongTro;
use DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function dashboard()
    {
        $phongtro = PhongTro::query()->paginate(10);
        $totalCountPhongtro = $phongtro->count();

        $phongtroNguoiSuDung = PhongTro::query()->where('nguoi_su_dung', 1)->get();
        $totalCountPhongtroNguoiSuDung = $phongtroNguoiSuDung->count();

        $data = PhongTro::query()
            ->select('category_id', DB::raw('COUNT(*) as total'))
            ->groupBy('category_id')
            ->get();



        $categories = Category::query()
            ->whereIn('id', $data->pluck('category_id'))
            ->pluck('name', 'id');

        $chartData = [
            'labels' => $data->map(fn($item) => $categories[$item->category_id] ?? 'Unknown'),
            'values' => $data->pluck('total')
        ];
        // dd($chartData);

        $top10PhongDuocXemNhieuNhat = PhongTro::query()->orderBy('viewre', 'desc')->limit(10)->get();
        $top10NguoiDangNhieuPhongNhat = $top10NguoiDangNhieuPhongNhat = DB::table('users as u')
            ->join('phongtro as pt', 'u.id', '=', 'pt.nguoi_dang')
            ->select('u.name', 'u.email', 'u.image', 'u.phone', DB::raw('COUNT(pt.id) as so_luong_bai'))
            ->groupBy('u.id', 'u.name', 'u.email', 'u.image')
            ->orderByDesc('so_luong_bai')
            ->limit(10)
            ->get();



        // dd($top10NguoiDangNhieuPhongNhat);

        return view('Admin.Dashboard', compact('totalCountPhongtro', 'totalCountPhongtroNguoiSuDung', 'phongtro', 'top10PhongDuocXemNhieuNhat', 'top10NguoiDangNhieuPhongNhat'));
    }


    public function getPhongTroTheoNgay(Request $request)
    {
        $ngayThue = $request->ngay_thue;
    $phongTro = PhongTro::whereDate('created_at', '>=', $ngayThue)->get();
    return response()->json($phongTro);
    }

}