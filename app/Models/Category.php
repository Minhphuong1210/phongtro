<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $fillable = ['name', 'slug','is_active'];

    public static function getAllCategory()
    {
        // return self::where('is_active','=','1')->get();
        return self::all();
    }

    public static function getAllCategoryWhere()
    {
        return self::where('is_active','=','1')->get();
      
    }


    public function createCategory($data)
    {
        $this->fill($data); // gắn dữ liệu vào object hiện tại 
        $this->save(); // lưu dữ liệu vào 
        return $this; // trả về 1 object vừa lưu 
    }


    public static function editCategory($id){
        return self::findOrFail($id);
    }

public function updateCategory($id, $data){
    $category= self::findOrFail($id);
    return $category->update($data);
}

public function deleteCategory($id){
    $category= self::findOrFail($id);
    return $category->delete();
}

}
