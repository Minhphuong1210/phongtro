<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PhongTroCreateRequest;
use App\Models\Category;
use App\Models\PhongTro;
use App\Models\Provinces;
use App\Models\Wards;
use App\Services\PhongtroServices;
use Illuminate\Http\Request;

class PhongtroController extends Controller
{
    /**
     * Display a listing of the resource.
     */

protected $phongtroServices;
public function __construct(PhongtroServices $phongtroServices){
    $this->phongtroServices =$phongtroServices;
}

    public function index()
    {
        $Phongtro = $this->phongtroServices->getAllPhongtro();
        return view('Admin.PhongTro.List', compact('Phongtro'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $xa = Wards::getXa();
        $thanhPho = Provinces::getThanhPho();
        $category=Category::getAllCategoryWhere();
        return view('Admin.PhongTro.Add',compact('thanhPho','category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PhongTroCreateRequest $request)
    {
        // PhongTroCreateRequest 
        try {
            $this->phongtroServices->createPhongTro($request);
            return redirect()->route('admin.phong_tro.index')->with('success', 'Thêm sản phẩm thành công!');
        } catch (\Exception $e) {
            return redirect()->route('admin.phong_tro.index')->with('error', 'Lỗi khi thêm sản phẩm: ');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $xa = Wards::getXa();
        $thanhPho = Provinces::getThanhPho();
        $PhongTro = $this->phongtroServices->editPhongTro($id);
        $category=Category::getAllCategoryWhere();
        return view('Admin.PhongTro.Update', compact('xa','thanhPho','PhongTro','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         
            try {
                $this->phongtroServices->updatePhongtro($request, $id);
                return redirect()->route('admin.phong_tro.index')->with('success', 'Thêm sản phẩm thành công!');
            } catch (\Exception $e) {
                return redirect()->route('admin.phong_tro.index')->with('error', 'Lỗi khi thêm sản phẩm: ');
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $this->phongtroServices->deletePhongTro($id);
            return redirect()->route('admin.phong_tro.index')->with('success', 'Xóa thành công');
        } catch (\Exception $e) {
            return redirect()->route('admin.phong_tro.index')->with('error', 'Lỗi khi xóa phòng trọ');
        }
    }
}
