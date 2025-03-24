<html lang="en">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <style>
        .hover-bg {
            transition: background-color 0.5s ease-in-out;
        }

        .hover-bg:hover {
            background-color: #5620e1;
        }

        .hover-text:hover {
            color: #5620e1;
        }

        .no-underline:hover {
            text-decoration: none;
        }

        .hover-bg-light {
            transition: background-color 0.5s ease-in-out;
        }

        .hover-bg-light:hover {
            background-color: rgba(24, 24, 27, 0.03);
        }

        .underline {
            text-decoration: underline;
        }

        .underline:hover {
            text-decoration: none;
        }

        .active {
            background-color: rgba(24, 24, 27, 0.03);
        }

        .text-content {
            font-size: 14px;
            text-align: center;
        }
    </style>
</head>
<body class="bg-[#f8f5f2] flex flex-col items-center justify-center min-h-screen">
<header class="w-full flex justify-between items-center p-4">
  
</header>
<main class="flex flex-col items-center justify-center flex-grow w-full max-w-lg p-4">
    <div class="bg-white p-8 rounded-lg shadow-md w-full">
        <h2 class="text-2xl font-semibold mb-6 text-center">Lấy lại mật khẩu</h2>
        <form class="space-y-4" action="{{ route('account.reset_password', ['token' => $token]) }}" method="post">
          @csrf
            <div>
                <label for="newPassword" class="block text-sm font-medium text-gray-700">Mật khẩu mới</label>
                <input type="password" id="newPassword" name="newPassword" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                <p id="newPasswordError" class="text-red-500 text-xs mt-1 hidden">Yêu cầu nhập mật khẩu mới.</p>
            </div>
            <div>
                <label for="confirmPassword" class="block text-sm font-medium text-gray-700">Nhập lại mật khẩu</label>
                <input type="password" id="confirmPassword" name="confirmPassword" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                <p id="confirmPasswordError" class="text-red-500 text-xs mt-1 hidden">Mật khẩu nhập lại không đúng với mật khẩu </p>
            </div>
            <div>
                <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  Gửi
                </button>
            </div>

        </form>

    </div>
    <p class="mt-4 text-sm"> <a class="text-black font-medium hover-text underline"
                                              href="{{ route('login') }}">Đăng nhập</a>
    </p>
</main>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!-- Toastify CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<!-- Toastify JS -->
<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>


<script>
    document.querySelector('form').addEventListener('submit', function(event) {
        event.preventDefault(); // Ngăn form gửi đi nếu có lỗi

        let isValid = true;
        const newPassword = document.getElementById('newPassword').value;
        const confirmPassword = document.getElementById('confirmPassword').value;
        const newPasswordError = document.getElementById('newPasswordError');
        const confirmPasswordError = document.getElementById('confirmPasswordError');

        // Điều kiện regex cho password
        const passwordRegex = /^(?=.*[A-Z])(?=.*\d).{6,}$/;


        // Kiểm tra nếu trống
        if (!newPassword) {
            newPasswordError.innerText = "Vui lòng nhâp mật khẩu mới! ";
            newPasswordError.classList.remove('hidden');
            isValid = false;
        } else if (!passwordRegex.test(newPassword)) {
            newPasswordError.innerText = "Mật khẩu có ít nhất 1 chữ in hoa, 1 chữ số và 6 kí tự";
            newPasswordError.classList.remove('hidden');
            isValid = false;
        } else {
            newPasswordError.classList.add('hidden');
        }

        // Kiểm tra xác nhận mật khẩu
        if (newPassword !== confirmPassword) {
            confirmPasswordError.innerText = "Mật khẩu không đúng với mật khẩu nhập trên!";
            confirmPasswordError.classList.remove('hidden');
            isValid = false;
        } else {
            confirmPasswordError.classList.add('hidden');
        }

        // Nếu không có lỗi, submit form
        if (isValid) {
            this.submit();
        }
    });
</script>

</body>
</html>
