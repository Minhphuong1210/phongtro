<html>

<body
    style="font-family: 'Roboto', sans-serif; background-color: #f3f4f6; display: flex; align-items: center; justify-content: center; min-height: 100vh; margin: 0;">
    <div
        style="background-color: #ffffff; padding: 2rem; border-radius: 0.5rem; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); max-width: 32rem; width: 100%;">
        <div style="text-align: center; margin-bottom: 1.5rem;">

            <h1 style="font-size: 1.5rem; line-height: 2rem; font-weight: 700;">Thông báo có người đăng phòng</h1>
        </div>
        <p style="margin-bottom: 1rem;">


            <a href="mailto:{{$user->email}}" style="color: #2563eb; font-weight: 700;">{{$user->email}}</a>.
            đã đăng phòng trọ với tên là : {{$data['name'] ?? ''}}.
        </p>
        <div style="margin-bottom: 1rem;">
            <table style="width: 100%; border-collapse: collapse; margin-top: 1rem;">
                <tr style="background-color: #f2f2f2;">
                    <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">Tên phòng trọ</th>
                    <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $data['name'] ?? '' }}</th>
                </tr>
                <tr>
                    <td style="border: 1px solid #ddd; padding: 8px;">Giá tiền phòng</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $data['gia_tien'] ?? '' }}</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #ddd; padding: 8px;">Diện tích</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $data['dien_tich']?? '' }}</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #ddd; padding: 8px;">Người đăng </td>
                    <td style="border: 1px solid #ddd; padding: 8px;">
<?php
$nguoiDang = App\Models\User::find($data['nguoi_dang'])->first();
?>
{{ $nguoiDang->name }}

                    </td>
                </tr>
               
            </table>
        </div>
        <p style="margin-bottom: 1rem;">
            Nếu bạn có bất kỳ câu hỏi nào hoặc cần thêm thông tin, vui lòng liên hệ với chúng tôi qua
           
        </p>
    </div>
</body>

</html>