<?php

namespace App\Services;

use App\Repositories\PhongtroRepositories;
use Illuminate\Http\Request;

/*
 * đây là để xử lí dữ liệu 
 * dữ liệu sẽ từ database->reponsitory->server->controller->view 
 *  sau khi xong vào app->providers->appserrviceProvider để đăng kí nó
 */


class PhongtroServices
{
    protected $PhongtroRepositories;

    public function __construct(PhongtroRepositories $PhongtroRepositories)
    {
        $this->PhongtroRepositories = $PhongtroRepositories;
    }

    public function getAllPhongtro()
    {
        return $this->PhongtroRepositories->getAllPhongtro();
    }

    public function createPhongtro(Request $request)
    {
        $data = $this->preparePhongTroData($request);
        return $this->PhongtroRepositories->createPhongtro($data);
    }

    public function editPhongtro(string $id)
    {
        return $this->PhongtroRepositories->editPhongtro($id);
    }

    public function deletePhongtro($id)
    {
        return $this->PhongtroRepositories->deletePhongtro($id);
    }

    public function updatePhongtro(Request $request, string $id)
    {
        
        
        $phongTro = $this->PhongtroRepositories->editPhongtro($id);
        if (!$phongTro) {
            return false; 
        }

        $data = $this->preparePhongTroData($request, $phongTro->image, true);
       
        return $this->PhongtroRepositories->updatePhongtro($id, $data);
    }

    private function preparePhongTroData(Request $request, $existingImages = null, $isUpdate = false)
    {
        $imagePaths = $existingImages ? json_decode($existingImages, true) : [];


        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('uploads/phongtro', 'public');
                $imagePaths[] = $path;
            }
        }

        if ($request->has('delete_images')) {
            $deletedImages = $request->delete_images;
// dd($deletedImages);

            $imagePaths = array_diff($imagePaths, $deletedImages);
        }

// dd($request->all());

        $data = [
            'name' => $request->name,
            'dien_tich' => $request->dien_tich,
            'gia_tien' => $request->gia_tien,
            'content' => $request->content,
            'thanh_pho_id' => $request->thanh_pho_id,
            'huyen_id' => $request->huyen_id,
            'xa_id' => $request->xa_id,
            'link_ban_do' => $request->link_ban_do,
            'tien_coc' => $request->tien_coc,
            'thoi_han_hop_dong' => $request->thoi_han_hop_dong,
            'category_id' => $request->category_id,
            'is_active' => $request->has('is_active') ? true : false,
            'is_show_home' => $request->has('is_show_home') ? true : false,
            'image' => json_encode(array_values($imagePaths)),
        ];

        if (!$isUpdate) {
            $data['slug'] = $request->slug;
        }

        return $data;
    }
}
