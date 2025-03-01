<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Http\Requests\Admin\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::getAllCategory();

        return view('Admin.Category.List', compact('category'));
    }

    public function create()
    {
        return view('Admin.Category.Add');
    }


    public function add(CategoryRequest $request)
    {


        try {
            $data = [
                'name'      => $request->name,
                'slug'      => $request->slug,
                'is_active' => $request->has('is_active') ? true : false,
            ];
            $category = new Category();
            $category->createCategory($data);
            return redirect()->route('admin.category.index')->with('success', 'Danh mục đã được thêm thành công!');
        } catch (\Exception $e) {
            return redirect()->route('admin.category.index')->with('error', 'Lỗi khi thêm danh mục: ');
        }
    }

    public function search()
    {

    }

    public function edit(string $id)
    {
        $category = Category::editCategory($id);
        return view('Admin.Category.Update', compact('category'));
    }

    public function update(CategoryUpdateRequest $request, string $id)
    {

        try {
            $data = [
                'name'      => $request->name,
                'is_active' => $request->has('is_active') ? true : false,
            ];
            $category = Category::editCategory($id);
            if ($category) {
                $category = new Category();
                $category->updateCategory($id, $data);
                return redirect()->route('admin.category.index')->with('success', 'Đã cập nhật thành công');
            } else {
                return redirect()->route('admin.category.index')->with('error', 'Không tìm thấy danh mục ');
            }
        } catch (\Throwable $th) {
            return redirect()->route('admin.category.index')->with('error', 'Có lỗi khi cập nhật danh mục');
        }

    }

    public function destroy($id)
    {
        try {

            $category = Category::editCategory($id);
            if ($category) {
                $category = new Category();
                $category->deleteCategory($id);
                return redirect()->route('admin.category.index')->with('success', 'Đã xóa thành công');
            } else {
                return redirect()->route('admin.category.index')->with('error', 'Không tìm thấy danh mục ');
            }
        } catch (\Throwable $th) {
            return redirect()->route('admin.category.index')->with('error', 'Có lỗi khi xóa danh mục');
        }
    }


}
