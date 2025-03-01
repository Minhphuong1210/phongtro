<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Districts;
use App\Models\Provinces;
use App\Models\Wards;
use Illuminate\Http\Request;

class DiaChiController extends Controller
{
    public function xa(Request $request)
    {

        $validatedData = $request->validate([
            'id' => 'required|integer|exists:districts,id',
        ]);

        $id = $request->id;
        $xa=new Wards();
       $xaQuery= $xa->show($id);
        return response()->json(['xaQuery' => $xaQuery]);
    }

    public function getXa()
    {
        $xa = Wards::getXa();
        return response()->json(['xa' => $xa]);
    }

    public function huyen(Request $request)
    {

        $validatedData = $request->validate([
            'id' => 'required|integer|exists:provinces,id',
        ]);

        $id = $request->id;
        $Huyen=new Districts();
       $HuyenQuery= $Huyen->show($id);
        return response()->json(['HuyenQuery' => $HuyenQuery]);
    }

public function showHuyen(){
    $huyen = Districts::getHuyen();
    return response()->json(['huyen' => $huyen]);
}

    public function thanhpho(Request $request)
    {

        $validatedData = $request->validate([
            'id' => 'required|integer|exists:provinces,id',
        ]);

        $id = $request->id;
        $thanhpho = Provinces::show($id);
        return response()->json(['thanhpho' => $thanhpho]);
    }



}
