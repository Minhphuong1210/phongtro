<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Districts;
use App\Models\Wards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChatbotController extends Controller
{
    public function handle(Request $request)
    {
        $message = strtolower(trim($request->input('message')));


        if (preg_match('/(?:tìm|thuê|phòng|trọ)(?:\s*(?:trọ|phòng)?)?(?:\s*(?:ở|tại)?)?\s+(.+)/u', $message, $matches)) {
            $khuVuc = trim($matches[1]);
            $phongs = collect();
            $districts = Districts::where('name', 'like', '%' . $khuVuc . '%')->first();
            if (!empty($districts)) {
                $phongs = DB::table('phongtro')
                    ->where('huyen_id', $districts->id)
                    ->limit(5)
                    ->get();
                    
            } else {
                $wards = Wards::where('name', 'like', '%' . $khuVuc . '%')->first();
                if (!empty($wards)) {
                    $phongs = DB::table('phongtro')
                        ->where('xa_id', $wards->id)
                        ->limit(5)
                        ->get();
                } 
            }
            if ($phongs->count() > 0) {
                $reply = " Có một số phòng ở khu vực \"$khuVuc\":<br>";
                foreach ($phongs as $phong) {
                    $reply .= " {$phong->name} - {$phong->gia_tien} VNĐ<br>";
                }
                return response($reply);
            } else {
                return response(" Không tìm thấy phòng ở khu vực \"$khuVuc\".");
            }
        }
        
    
        return response(" Bạn có thể hỏi:\n• 'Tìm phòng ở Hà Nội'\n• 'Tìm phòng ở quận 1'");
    }
}
