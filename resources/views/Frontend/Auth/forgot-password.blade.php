<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
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
            <h2 class="text-2xl font-semibold mb-6 text-center">Bạn quên mật khẩu</h2>
            <form class="space-y-4" id="forgotForm" method="post">
                @csrf
                <div class="text-red-500 hidden" id="error-message"></div>
                <div class="text-content">
                    <strong>Vui lòng nhập địa chỉ email vào </strong>
                    <p class="mt-5 mb-5">Chúng tôi sẽ giúp bạn lấy lại mật khẩu</p>
                </div>
                <div>
                    <label class="block text-sm font-medium" for="email">Email của bạn là</label>
                    <input
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black sm:text-sm"
                        id="email" placeholder="Email của bạn là" name="email" type="email" />
                    <div class="error"></div>
                    @if ($errors->has('email'))
                        <small class="text-danger" style="color:red">{{ $errors->first('email') }}</small>
                    @endif
                </div>

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <button class="w-full py-2 px-4 bg-black text-white rounded-full text-center hover-bg" type="submit"
                    id="forgotForm_button">Gửi
                </button>
            </form>
        </div>
        <p class="mt-4 text-sm"><a class="text-black font-medium hover-text underline" href="{{ route('login') }}">Đăng
                nhập</a>
        </p>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Toastify CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <!-- Toastify JS -->
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <script>
        const error = document.querySelector('.error'); // Chỉ lấy 1 phần tử error
        const email = document.querySelector('#email'); // Lấy thẻ input email
        const forgotFormButton = document.getElementById('forgotForm_button');

        forgotFormButton.addEventListener('click', function(event) {
            event.preventDefault();

            const emailInput = email.value.trim(); // Lấy giá trị thực của email
            const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

            console.log(emailInput);

            if (emailInput === "") {
                error.textContent = "Email không được để trống!";
                error.style.color = "red";
            } else if (!emailRegex.test(emailInput)) {
                error.textContent = "Email không hợp lệ!";
                error.style.color = "red";
            } else {
                $.ajax({
                    url: '{{ route('forgot_password_email') }}',
                    type: 'POST',
                    data: {
                        email: emailInput
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                            'content') // Lấy token từ thẻ meta
                    },
                    success: function(response) {
                        console.log(response);
                        Toastify({
                            text: response.message,
                            duration: 3000,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "#28a745",
                        }).showToast();
                        setTimeout(() => {
                            window.location.href = "{{ route('login') }}";
                        }, 2000);
                    },
                    error: function(error) {
                        if (error.responseJSON && error.responseJSON.errors) {
                            let errors = error.responseJSON.errors;
                            let errorMessages = Object.values(errors).flat().join(
                            "\n"); // Lấy tất cả lỗi từ object và nối thành chuỗi

                            Toastify({
                                text: errorMessages,
                                duration: 3000,
                                gravity: "top",
                                position: "right",
                                backgroundColor: "#dc3545", // Màu đỏ cho lỗi
                            }).showToast();

                        } else {
                            Toastify({
                                text: "Lỗi không xác định!",
                                duration: 3000,
                                gravity: "top",
                                position: "right",
                                backgroundColor: "#dc3545",
                            }).showToast();
                        }
                    }
                })
            }
        });
    </script>


</body>

</html>
