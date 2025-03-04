<div class="filter-box">
    <div class="filter-box-list">
        <div class="filter-item filter-type" data-bs-toggle="modal" data-bs-target="#property_type">
            <span class="filter-label"> Loại nhà đất </span>
            <span class="filter-value value-type"> Tất cả </span>
            <input type="hidden" id="hdnCategoryUrl" value="cho-thue-phong-tro" />
        </div>
        <div class="filter-item filter-location" data-bs-toggle="modal" data-bs-target="#property_city">
            <span class="filter-label"> Khu vực </span>
            <span class="filter-value value-localtion"> Toàn quốc </span>
            <input type="hidden" id="hdnProvinceId" />
            <input type="hidden" id="hdnProvinceUrl" />
            <input type="hidden" id="hdnDistrictUrl" />
        </div>
        <div class="filter-item filter-price" data-bs-toggle="modal" data-bs-target="#property_price">
            <span class="filter-label"> Khoảng giá </span>
            <span class="filter-value value-price">Tất cả</span>
        </div>
        <div class="filter-item filter-area" data-bs-toggle="modal" data-bs-target="#property_area">
            <span class="filter-label">Diện tích</span>
            <span class="filter-value value-area">Tất cả</span>
        </div>
        <div class="filter-item filter-reset">
            <span class="filter-text data-reset">
                <i class="icon icon-refresh"></i>
                Đặt lại
            </span>
        </div>
    </div>
</div>
<div class="modal filter-popup-modal fade" id="property_type" tabindex="-1" aria-labelledby="property_type_label"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-fullscreen-xl-down">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <h5 class="modal-title" id="property_type_label">CHỌN LOẠI BẤT ĐỘNG SẢN</h5>
            </div>
            <div class="modal-body">
                <div class="property_type_list">
                    <ul class="list-unstyled mb-0" id="list_type">
                        <li class="">
                            <a href="index.html">Tất cả</a>
                        </li>
                        <li class="">
                            <a href="cho-thue-phong-tro.html">Cho thuê phòng trọ</a>
                        </li>
                        <li class="">
                            <a href="cho-thue-can-ho.html">Căn hộ cho thuê</a>
                        </li>
                        <li class="">
                            <a href="cho-thue-nha-nguyen-can.html">Nhà nguyên căn</a>
                        </li>
                        <li class="">
                            <a href="tim-nguoi-o-ghep.html">Ở ghép</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal filter-popup-modal fade" id="property_city" tabindex="-1" aria-labelledby="property_city_label"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-fullscreen-xl-down">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <h5 class="modal-title" id="property_city_label">KHU VỰC</h5>
            </div>
            <div class="modal-body">
                <div class="property_type_list">
                    <div class="filter-search-key">
                        <input type="text" class="form-control" placeholder="Nhập tên tỉnh thành phố"
                            id="js_search_city">
                    </div>
                    <ul class="list-unstyled mb-0" id="list_city">
                        <li class="">Toàn quốc</li>
                        <li class="" data-value="SG" data-url="ho-chi-minh">H&#x1ED3; Ch&#xED; Minh
                        </li>
                        <li class="" data-value="HN" data-url="ha-noi">Ha&#x300; N&#xF4;&#x323;i</li>
                        <li class="" data-value="DDN" data-url="da-nang">&#x110;&#xE0; N&#x1EB5;ng</li>
                        <li class="" data-value="DNA" data-url="dong-nai">&#x110;&#x1ED3;ng Nai</li>
                        <li class="" data-value="BD" data-url="binh-duong">B&#xEC;nh D&#x1B0;&#x1A1;ng
                        </li>
                        <li class="" data-value="VT" data-url="ba-ria-vung-tau">V&#x169;ng T&#xE0;u
                        </li>
                        <li class="" data-value="CT" data-url="can-tho">C&#x1EA7;n Th&#x1A1;</li>
                        <li class="" data-value="HP" data-url="hai-phong">H&#x1EA3;i Ph&#xF2;ng</li>
                        <li class="" data-value="TTH" data-url="thua-thien-hue">Th&#x1EEB;a Thi&#xEA;n
                            Hu&#x1EBF;</li>
                        <li class="" data-value="TV" data-url="tra-vinh">Tr&#xE0; Vinh</li>
                        <li class="" data-value="VL" data-url="vinh-long">V&#x129;nh Long</li>
                        <li class="" data-value="VP" data-url="vinh-phuc">V&#x129;nh Ph&#xFA;c</li>
                        <li class="" data-value="YB" data-url="yen-bai">Y&#xEA;n B&#xE1;i</li>
                        <li class="" data-value="HNA" data-url="ha-nam">H&#xE0; Nam</li>
                        <li class="" data-value="SL" data-url="son-la">S&#x1A1;n La</li>
                        <li class="" data-value="ST" data-url="soc-trang">S&#xF3;c Tr&#x103;ng</li>
                        <li class="" data-value="TB" data-url="thai-binh">Th&#xE1;i B&#xEC;nh</li>
                        <li class="" data-value="TG" data-url="tien-giang">Ti&#x1EC1;n Giang</li>
                        <li class="" data-value="TH" data-url="thanh-hoa">Thanh H&#xF3;a</li>
                        <li class="" data-value="TN" data-url="thai-nguyen">Th&#xE1;i Nguy&#xEA;n</li>
                        <li class="" data-value="TNI" data-url="tay-ninh">T&#xE2;y Ninh</li>
                        <li class="" data-value="TQ" data-url="tuyen-quang">Tuy&#xEA;n Quang</li>
                        <li class="" data-value="AG" data-url="an-giang">An Giang</li>
                        <li class="" data-value="HT" data-url="ha-tinh">H&#xE0; T&#x129;nh</li>
                        <li class="" data-value="HY" data-url="hung-yen">H&#x1B0;ng Y&#xEA;n</li>
                        <li class="" data-value="KG" data-url="kien-giang">Ki&#xEA;n Giang</li>
                        <li class="" data-value="KH" data-url="khanh-hoa">Kh&#xE1;nh H&#xF2;a</li>
                        <li class="" data-value="KT" data-url="kon-tum">Kon Tum</li>
                        <li class="" data-value="LA" data-url="long-an">Long An</li>
                        <li class="" data-value="LCA" data-url="lao-cai">L&#xE0;o Cai</li>
                        <li class="" data-value="LCH" data-url="lai-chau">Lai Ch&#xE2;u</li>
                        <li class="" data-value="LDD" data-url="lam-dong">L&#xE2;m &#x110;&#x1ED3;ng
                        </li>
                        <li class="" data-value="LS" data-url="lang-son">L&#x1EA1;ng S&#x1A1;n</li>
                        <li class="" data-value="NA" data-url="nghe-an">Ngh&#x1EC7; An</li>
                        <li class="" data-value="NB" data-url="ninh-binh">Ninh B&#xEC;nh</li>
                        <li class="" data-value="NDD" data-url="nam-dinh">Nam &#x110;&#x1ECB;nh</li>
                        <li class="" data-value="NT" data-url="ninh-thuan">Ninh Thu&#x1EAD;n</li>
                        <li class="" data-value="PT" data-url="phu-tho">Ph&#xFA; Th&#x1ECD;</li>
                        <li class="" data-value="PY" data-url="phu-yen">Ph&#xFA; Y&#xEA;n</li>
                        <li class="" data-value="QB" data-url="quang-binh">Qu&#x1EA3;ng B&#xEC;nh</li>
                        <li class="" data-value="QNA" data-url="quang-nam">Qu&#x1EA3;ng Nam</li>
                        <li class="" data-value="QNG" data-url="quang-ngai">Qu&#x1EA3;ng Ng&#xE3;i</li>
                        <li class="" data-value="QNI" data-url="quang-ninh">Qu&#x1EA3;ng Ninh</li>
                        <li class="" data-value="QT" data-url="quang-tri">Qu&#x1EA3;ng Tr&#x1ECB;</li>
                        <li class="" data-value="DDB" data-url="dien-bien">&#x110;i&#x1EC7;n Bi&#xEA;n
                        </li>
                        <li class="" data-value="DDL" data-url="dak-lak">&#x110;&#x1EAF;k L&#x1EAF;k
                        </li>
                        <li class="" data-value="DDT" data-url="dong-thap">&#x110;&#x1ED3;ng Th&#xE1;p
                        </li>
                        <li class="" data-value="DNO" data-url="dak-nong">&#x110;&#x1EAF;k N&#xF4;ng
                        </li>
                        <li class="" data-value="GL" data-url="gia-lai">Gia Lai</li>
                        <li class="" data-value="HB" data-url="hoa-binh">H&#xF2;a B&#xEC;nh</li>
                        <li class="" data-value="HD" data-url="hai-duong">H&#x1EA3;i D&#x1B0;&#x1A1;ng
                        </li>
                        <li class="" data-value="HG" data-url="ha-giang">H&#xE0; Giang</li>
                        <li class="" data-value="HGI" data-url="hau-giang">H&#x1EAD;u Giang</li>
                        <li class="" data-value="BDD" data-url="binh-dinh">B&#xEC;nh &#x110;&#x1ECB;nh
                        </li>
                        <li class="" data-value="BG" data-url="bac-giang">B&#x1EAF;c Giang</li>
                        <li class="" data-value="BK" data-url="bac-kan">B&#x1EAF;c K&#x1EA1;n</li>
                        <li class="" data-value="BL" data-url="bac-lieu">B&#x1EA1;c Li&#xEA;u</li>
                        <li class="" data-value="BN" data-url="bac-ninh">B&#x1EAF;c Ninh</li>
                        <li class="" data-value="BP" data-url="binh-phuoc">B&#xEC;nh Ph&#x1B0;&#x1EDB;c
                        </li>
                        <li class="" data-value="BTH" data-url="binh-thuan">B&#xEC;nh Thu&#x1EAD;n
                        </li>
                        <li class="" data-value="BTR" data-url="ben-tre">B&#x1EBF;n Tre</li>
                        <li class="" data-value="CB" data-url="cao-bang">Cao B&#x1EB1;ng</li>
                        <li class="" data-value="CM" data-url="ca-mau">C&#xE0; Mau</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal filter-popup-modal" id="property_ward" tabindex="-1" aria-labelledby="property_ward_label"
    aria-hidden="true" data-backdroup="false">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-fullscreen-xl-down">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <h5 class="modal-title" id="property_ward_label"></h5>
            </div>
            <div class="modal-body">
                <div class="property_type_list">
                    <div class="filter-search-key">
                        <input type="text" class="form-control" placeholder="Nhập tên quận huyện thị xã"
                            id="js_search_district">
                    </div>
                    <ul class="list-unstyled mb-0" id="list_district">
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal filter-popup-modal fade" id="property_price" tabindex="-1" aria-labelledby="property_price_label"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-fullscreen-xl-down">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <h5 class="modal-title" id="property_price_label">KHOẢNG GIÁ</h5>
            </div>
            <div class="modal-body">
                <div class="property_type_list">
                    <input type="hidden" class="amount_min" value="0">
                    <input type="hidden" class="amount_max" value="20">
                    <div class="data-rang">
                        Từ <span class="min-price">0</span> - <span class="max-price">20</span> triệu+
                    </div>
                    <div class="slider-range"></div>
                    <div class="info-text-min-max">
                        <span class="min">0</span>
                        <span class="max">20 triệu+</span>
                        <div class="clearfix"></div>
                    </div>
                    <div class="list-price">
                        <div class="title-check">
                            <span>Chọn nhanh</span>
                        </div>
                        <div class="property_type_list">
                            <ul class="list-unstyled mb-0 list_price">
                                <li class="selected" data-value="[0,20]">Tất cả</li>
                                <li class="" data-value="[0,1]">Dưới 1 triệu</li>
                                <li class="" data-value="[1,2]">1 - 2 triệu</li>
                                <li class="" data-value="[2,4]">2 - 4 triệu</li>
                                <li class="" data-value="[4,6]">4 - 6 triệu</li>
                                <li class="" data-value="[6,8]">6 - 8 triệu</li>
                                <li class="" data-value="[8,10]">8 - 10 triệu</li>
                                <li class="" data-value="[10,15]">10 - 15 triệu</li>
                                <li class="" data-value="[15,20]">15 - 20 triệu</li>
                                <li class="" data-value="[20,100]">Trên 20 triệu</li>
                                <li class="" data-value="[0,0]">Thoả thuận</li>
                            </ul>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer modal-actions">
                <div class="reset">
                    <a href="javascript:;" onclick="clearPrice('', '')">Đặt lại</a>
                </div>
                <input type="hidden" id="hdnPrice">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                <button type="button" class="btn btn-primary" onclick="searchPrice('', '')">Áp dụng</button>
            </div>
        </div>
    </div>
</div>
<div class="modal filter-popup-modal fade" id="property_area" tabindex="-1" aria-labelledby="property_area_label"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-fullscreen-xl-down">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <h5 class="modal-title" id="property_area_label">DIỆN TÍCH</h5>
            </div>
            <div class="modal-body">
                <div class="property_type_list">
                    <input type="hidden" class="area_min" value="0">
                    <input type="hidden" class="area_max" value="100">
                    <div class="data-rang">
                        Từ <span class="min-area">0</span> - <span class="max-area">100</span>m<sup>2</sup>
                    </div>
                    <div class="slider-range-area"></div>
                    <div class="info-text-min-max">
                        <span class="min">0</span>
                        <span class="max">100 m<sup>2</sup></span>
                        <div class="clear"></div>
                    </div>
                    <div class="list-price">
                        <div class="title-check">
                            <span>Chọn nhanh</span>
                        </div>
                        <div class="property_type_list">
                            <ul class="list-unstyled mb-0 list_area">
                                <li class="selected" data-value="[0,100]">Tất cả</li>
                                <li class="" data-value="[0,20]">Dưới 20m<sup>2</sup></li>
                                <li class="" data-value="[20,30]">20m<sup>2</sup> - 30m<sup>2</sup></li>
                                <li class="" data-value="[30,40]">30m<sup>2</sup> - 40m<sup>2</sup></li>
                                <li class="" data-value="[40,60]">40m<sup>2</sup> - 60m<sup>2</sup></li>
                                <li class="" data-value="[60,80]">60m<sup>2</sup> - 80m<sup>2</sup></li>
                                <li class="" data-value="[80,100]">80m<sup>2</sup> - 100m<sup>2</sup>
                                </li>
                                <li class="" data-value="[100,1000]">Trên 100m<sup>2</sup></li>
                                <li class="" data-value="[0,0]">Không xác định</li>
                            </ul>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer modal-actions">
                <div class="reset">
                    <a href="javascript:;" onclick="clearArea('', '')">Đặt lại</a>
                </div>
                <input type="hidden" id="hdnArea">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                <button type="button" class="btn btn-primary" onclick="searchArea('', '')">Áp dụng</button>
            </div>
        </div>
    </div>
</div>
 
<div class="modal filter-popup-modal fade" id="property_search" tabindex="-1"
aria-labelledby="property_search_label" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-scrollable modal-fullscreen-xl-down">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal"
                aria-label="Close"></button>
            <h5 class="modal-title" id="property_search_label">BỘ LỌC NÂNG CAO</h5>
        </div>
        <div class="modal-body">
            <div class="list-box" id="list_wards">
                <h4>Phường/xã</h4>
                <select name="" id="" class="form-select">
                    <option value="" disabled selected>Tìm phường/xã</option>
                </select>
            </div>

            <div class="list-box" id="list_street">
                <h4>Đường/phố</h4>
                <select name="" id="" class="form-select">
                    <option value="" disabled selected>Tìm đường/phố</option>
                </select>
            </div>
        </div>
        <div class="modal-footer modal-actions">
            <div class="reset">
                <a href="index.html">Đặt lại</a>
            </div>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
            <button type="button" class="btn btn-primary">Áp dụng</button>
        </div>
    </div>
</div>
</div>
