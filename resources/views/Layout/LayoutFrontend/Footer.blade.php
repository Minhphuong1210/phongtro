<footer class="footer">
    <div class="footer-main">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-md-6 col-12 mb-4 mb-xl-0">
                    <div class="footer-title">Về chúng tôi</div>
                    <div class="footer-content">
                        <p>
                            Website cho thuê phòng trọ, nhà trọ
                            nhanh chóng và hiệu quả
                        </p>
                        <ul class="website-info list-unstyled mb-0">
                            <li>
                                <div class="icon ic-location-white"></div>
                                <div class="text">
                                    144 Đ. Xuân Thủy, Dịch Vọng Hậu, Cầu Giấy, Hà Nội, Vietnam
                                </div>
                            </li>
                            <li>
                                <div class="icon ic-phone"></div>
                                <div class="text">0395 391 139</div>
                            </li>
                            <li>
                                <div class="icon ic-mail"></div>
                                <div class="text">
                                    20020347@vnu.edu.vn
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-6 mb-4 mb-xl-0">
                    <div class="footer-title">Giới thiệu</div>
                    <ul class="footer-menu list-unstyled mb-0">
                        <li>
                            <a href="gioi-thieu.html">Giới thiệu</a>
                        </li>
                        <li>
                            <a href="quy-che-hoat-dong.html">Quy chế hoạt động</a>
                        </li>
                        <li>
                            <a href="chinh-sach-bao-mat.html">Chính sách bảo mật</a>
                        </li>
                        <li>
                            <a href="quy-dinh-su-dung.html">Quy định sử dụng</a>
                        </li>
                        <li><a href="lien-he.html">Liên hệ</a></li>
                    </ul>
                </div>
                <div class="col-xl-3 col-md-6 col-6 mb-4 mb-xl-0">
                    <div class="footer-title">Hỗ trợ</div>
                    <ul class="footer-menu list-unstyled mb-0">
                        <li>
                            <a href="bang-gia-dich-vu.html">Bảng giá dịch vụ</a>
                        </li>
                        <li>
                            <a href="huong-dan.html">Hướng dẫn đăng tin</a>
                        </li>
                        <li>
                            <a href="quy-dinh-dang-tin.html">Quy định đăng tin</a>
                        </li>
                        <li>
                            <a href="#">Cơ chế giải quyết tranh chấp</a>
                        </li>
                        <li><a href="blog.html">Tin tức</a></li>
                    </ul>
                </div>
                <div class="col-xl-3 col-md-6 col-12">
                    <div class="footer-title">
                        Phương thức thanh toán
                    </div>
                    <div class="footer-content">
                        <span class="bds_icon icon_visa"></span>
                        <span class="bds_icon icon_mastercard"></span>
                        <span class="bds_icon icon_jcb"></span>
                        <br /><span class="bds_icon icon_internet_banking"></span>
                        <span class="bds_icon icon_momo"></span>
                        <span class="bds_icon icon_tienmat"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-toolbar">
        <div class="footer-toolbar-inner">
            <div class="toolbar-item">
                <a href="index.html">
                    <i class="icon ic-home"></i>
                    <span class="text">Trang chủ</span>
                </a>
            </div>
            <div class="toolbar-item">
                <a href="dang-nhape40a.html">
                    <i class="icon ic-bell"></i>
                    <span class="text">Thông báo</span>
                </a>
            </div>
            <div class="toolbar-item">
                <a href="dang-nhap8b86.html">
                    <i class="icon ic-pencil"></i>
                    <span class="text">Đăng tin</span>
                </a>
            </div>
            <div class="toolbar-item">
                <a href="dang-ky.html">
                    <i class="icon ic-user"></i>
                    <span class="text">Đăng ký</span>
                </a>
            </div>
            <div class="toolbar-item">
                <a href="dang-nhapa939.html">
                    <i class="icon ic-user"></i>
                    <span class="text">Đăng nhập</span>
                </a>
            </div>
        </div>
    </div>
    <a href="javascript:void(0);" class="backtop">
        <img src="{{ asset('frontend/assets/images/ic-chevron-up-white.svg') }}" alt="go top" />
    </a>

<style>
    #chat-button {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: #007bff;
    color: white;
    font-size: 24px;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    text-align: center;
    line-height: 50px;
    cursor: pointer;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    z-index: 10000;
    transition: background-color 0.3s ease;
    text-decoration: none;
}

#chat-button:hover {
    background-color: #0056b3;
}

.mess {
    position: fixed;
    bottom: 100px;
    right: 20px;
    width: 300px;
    background: #fff;
    border: 1px solid #ccc;
    box-shadow: 0 0 15px rgba(0,0,0,0.2);
    border-radius: 10px;
    display: none;
    flex-direction: column;
    z-index: 9999;
}

.chat-header {
    background: #007bff;
    color: white;
    padding: 10px;
    font-weight: bold;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

.chat-messages {
    padding: 10px;
    height: 200px;
    overflow-y: auto;
    background: #f9f9f9;
}

#chat-input {
    border: none;
    border-top: 1px solid #ccc;
    padding: 10px;
    width: 100%;
    box-sizing: border-box;
}


</style>

    <a href="javascript:void(0);"  id="chat-button">
        💬
    </a>


    <div class="offcanvas offcanvas-end custom-canvas-popup" tabindex="-1" id="menuMobileRight"
        aria-labelledby="menuMobileRightLabel">
        <div class="offcanvas-header">
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-0">
            <div class="action-box">
                <a href="dang-nhap.html">Đăng nhập</a>
                <a href="dang-ky.html">Đăng ký</a>
                <a href="dang-nhap8b86.html">
                    <i class="icon ic-pen-white"></i>
                    Đăng tin
                </a>
            </div>
            <hr />
            <div class="menu-box">
                <a href="cho-thue-phong-tro.html">Cho thuê phòng trọ</a>
                <a href="cho-thue-nha-nguyen-can.html">Cho thuê nhà nguyên căn</a>
                <a href="cho-thue-can-ho.html">Căn hộ cho thuê</a>
                <a href="tim-nguoi-o-ghep.html">Tìm người ở ghép</a>
            </div>
            <hr />
            <div class="bottom-box">
                <i class="icon ic-headset"></i>
                Liên hệ & hỗ trợ
                <a href="#" class="fw-bold text-danger">0395 391 139</a>
            </div>
        </div>
    </div>

    <div class="mess" style="display:none" id="mess">
        <div class="chat-header">
            <span>Chat với chúng tôi</span>
            <button id="close-chat">×</button>
        </div>
        <div class="chat-messages" id="messages"></div>
        <input type="text" id="chat-input" placeholder="Nhập tin nhắn...">
    </div>




<script>
    const chat_button = document.getElementById('chat-button');
    const mess = document.querySelector('.mess');
    chat_button.addEventListener('click', function () {
        mess.style.display = mess.style.display === 'block' ? 'none' : 'block';
    });

   

    document.getElementById('chat-input').addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
            const message = this.value.trim();
            if (!message) return;

            appendMessage('Bạn', message);
            this.value = '';

            fetch('/chatbot', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ message: message })
            })
            .then(res => res.text())
            .then(response => {
                appendMessage('Bot', response);
            });
        }
    });

    function appendMessage(sender, message) {
        const messages = document.getElementById('messages');
        const msg = document.createElement('div');
        msg.innerHTML = `<strong>${sender}:</strong> ${message}`;
        messages.appendChild(msg);
        messages.scrollTop = messages.scrollHeight;
        msg.style.color = 'white';  
    msg.style.backgroundColor = '#333';
    msg.style.padding = '8px';
    msg.style.borderRadius = '5px';
    msg.style.marginBottom = '5px';
    
    messages.appendChild(msg);
    messages.scrollTop = messages.scrollHeight;
    }

</script>

</footer>
