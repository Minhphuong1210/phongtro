<?php
namespace App\Repositories;
use App\Models\PhongTro;


/*
 * đây là dữ liệu để gọi ra từ model 
 * dữ liệu sẽ từ database->reponsitory->server->controller->view 
 * sau khi xong vào app->providers->appserrviceProvider để đăng kí nó
 */

class PhongtroRepositories
{
    public static function getAllPhongtro()
    {
        return PhongTro::orderBy('id', 'DESC')->paginate(10);
        // return PhongTro::all();
    }

    public function createPhongtro($data)
    {

        return PhongTro::create($data);
    }


    public static function editPhongtro($id)
    {
        return PhongTro::findOrFail($id);
    }

    public function updatePhongtro($id, $data)
    {
        $Phongtro = PhongTro::findOrFail($id);
        //  dd($Phongtro);
        if ($Phongtro) {
            $Phongtro->update($data);
        }
        return $Phongtro;
    }

    public function deletePhongtro($id)
    {
        $Phongtro = PhongTro::findOrFail($id);
        return $Phongtro->delete();
    }

}