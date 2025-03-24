<html>
<body style="font-family: 'Roboto', sans-serif; background-color: #f3f4f6; display: flex; align-items: center; justify-content: center; min-height: 100vh; margin: 0;">
<div style="background-color: #ffffff; padding: 2rem; border-radius: 0.5rem; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); max-width: 32rem; width: 100%;">
    <div style="text-align: center; margin-bottom: 1.5rem;">
        <img alt="logo" class="mx-auto mb-4" src="" style="width: 200px;height: auto"/>
        <h1 style="font-size: 1.5rem; line-height: 2rem; font-weight: 700;">Thay đổi mật khẩu</h1>
    </div>
    <p style="margin-bottom: 1rem;">
        Bạn đã yêu cầu thay đổi mật khẩu cho tài khoản
        <a href="mailto:{{$user->email}}" style="color: #2563eb; font-weight: 700;">{{$user->email}}</a>.
    </p>
    <p style="margin-bottom: 1rem;">
        Bạn có thể đặt lại mật khẩu bằng cách nhấn vào nút bên dưới:
    </p>
    <div style="text-align: center; margin-bottom: 1.5rem;">
        <a href="{{ route('account.reset_password', ['token' => $token]) }}" style="background-color: #000000; color: #ffffff; padding: 0.5rem 1rem; border-radius: 0.5rem; display: inline-block; font-weight: 700; text-decoration: none;">Chọn mật khẩu mới</a>
    </div>
    <p style="margin-bottom: 1rem;">
        Nếu bạn không yêu cầu thay đổi mật khẩu, vui lòng liên hệ với chúng tôi ngay lập tức.
    </p>
    <p style="margin-bottom: 1rem;">
        Nếu bạn có bất kỳ câu hỏi nào hoặc cần thêm thông tin, hãy liên hệ với chúng tôi qua email
        <a href="mailto:support@" style="color: #2563eb; font-weight: 700;"></a>.
    </p>

</div>
</body>
</html>
