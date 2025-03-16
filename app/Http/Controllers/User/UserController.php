<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PhongTroCreateRequest;
use App\Models\Category;
use App\Models\Districts;
use App\Models\PhongTro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class UserController extends Controller
{
    public function thongTinCaNHan()
    {
        return view('Frontend.User.HomeUser');
    }
    public function dangtin()
    {
        $quanhuyen = Districts::getHuyenCuaThanhPhoHaNoi();
        $category = Category::all();
        // dd($quanhuyen);
        return view('Frontend.User.DangTinMoi', compact('quanhuyen', 'category'));
    }
    public function Postdangtin(PhongTroCreateRequest $request)
    {
        // dd($request->all());
        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('uploads/phongtro', 'public');
                $imagePaths[] = $path;
            }
        }

        if ($request->has('delete_images')) {
            $deletedImages = $request->delete_images;
            $imagePaths = array_diff($imagePaths, $deletedImages);
        }
        $data = [
            'name' => $request->Title,
            'slug' => str::slug($request->Title, '-'),
            'dien_tich' => $request->dien_tich,
            'gia_tien' => $request->gia_tien,
            'content' => $request->content,
            'thanh_pho_id' => 2,
            'huyen_id' => $request->huyen_id,
            'xa_id' => $request->xa_id,
            'link_ban_do' => $request->link_ban_do,
            'tien_coc' => $request->tien_coc,
            'thoi_han_hop_dong' => $request->thoi_han_hop_dong,
            'category_id' => $request->CategoryId,
            'is_active' => 1,
            'is_show_home' => $request->has('is_show_home') ? true : false,
            'image' => json_encode(array_values($imagePaths)),
            'nguoi_dang' => Auth::user()->id,
            'dai_chi_cu_the' => $request->dai_chi_cu_the,
            ''
        ];
        // dd($data);

        $phongtro = PhongTro::create($data);

        if ($phongtro) {
            return redirect()->route('user.QuanLyDangTin')->with('success', 'Thêm phòng trọ thành công');
        } else {
            return redirect()->route('user.QuanLyDangTin')->with('error', 'Thêm phòng trọ thất bại');
        }


    }

    public function quanLyDangTin()
    {

        $id = Auth::user()->id;

        $phongtro = PhongTro::query()->where('nguoi_dang', $id)->paginate(10);

        $category = Category::query()->get();

        return view('Frontend.User.QuanLyDangTin', compact('phongtro', 'category'));
    }

    public function searchPhong(Request $request)
    {

        // dd($request->all());
        $query = PhongTro::query()->where('nguoi_dang', 1);
        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }


        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        $phongtro = $query->with('category')->get();

        return response()->json($phongtro);

    }

    public function chothue(Request $request)
    {
        if ($request->chothue_id) {
            $phongtro = PhongTro::query()->where('id', $request->chothue_id)->first();

            if ($phongtro->is_active == 1) {
                if ($phongtro->nguoi_su_dung == 0) {
                    $phongtro->update(['nguoi_su_dung' => 1]);

                    return response()->json([
                        'color' => 'bg-success',
                        'text' => 'Đã cho thuê'
                    ]);
                }
                if ($phongtro->nguoi_su_dung == 1) {
                    $phongtro->update(['nguoi_su_dung' => 0]);
                    return response()->json([
                        'color' => 'bg-danger',
                        'text' => 'Chưa cho thuê'
                    ]);
                }
            }

            return response()->json(['error' => 'Trạng thái chưa được bật nên chưa được kích hoạt sử dụng'], 404);


        }
        return response()->json(['error' => 'Phòng không tồn tại'], 404);
    }

}