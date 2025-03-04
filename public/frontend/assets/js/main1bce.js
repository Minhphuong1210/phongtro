(function ($) {
    $(document).ready(function () {
        initOwlCarousel();
        handleGoTop();
        handleReadMore();
        handleResponsive();
        handleCopyUrl();
        handleShowPopup();
        handleSearchLocation();
        handleNegotiablePrice();
        handleCountChars();
        configSelect2();
        handleShowPhone();
        handleScrollDiv();
        handleSave();
    });

    function initOwlCarousel() {
        if ($(".owl-carousel").length) {
            $(".owl-carousel").each(function () {
                var owl = $(".owl-carousel");
                $(this).owlCarousel({
                    margin: 0,
                    autoplayTimeout: $(this).data("autotime"),
                    smartSpeed: $(this).data("speed"),
                    autoHeight: $(this).data("autoheight"),
                    autoplay: $(this).data("autoplay"),
                    items: $(this).data("carousel-items"),
                    nav: $(this).data("nav"),
                    dots: $(this).data("dots"),
                    center: $(this).data("center"),
                    loop: $(this).data("loop"),
                    responsive: {
                        0: {
                            items: $(this).data("mobile"),
                            margin: $(this).data("margintb"),
                        },
                        768: {
                            items: $(this).data("tablet"),
                            margin: $(this).data("margintb"),
                        },
                        992: {
                            items: $(this).data("desktop-small"),
                            margin: $(this).data("margintb"),
                        },
                        1680: {
                            items: $(this).data("desktop"),
                            margin: $(this).data("margintb"),
                        },
                    },
                });
            });
        }
    }
    function handleGoTop() {
        $(window).scroll(function () {
            var hook = $(".backtop"),
                scroll = $(window).scrollTop();

            if (scroll >= 200) hook.addClass("shown");
            else hook.removeClass("shown");
        });
        $(".backtop").click(function () {
            $("html, body").animate({ scrollTop: 0 }, "slow");
            return false;
        });
    }
    function handleReadMore() {
        $(".js-btn-readmore").click(function () {
            $(this).closest(".listpage-content").toggleClass("show");
            $(this).html() == "Xem thêm"
                ? $(this).html("Thu gọn")
                : $(this).html("Xem thêm");
        });
    }
    function handleResponsive() {
        let width = $(window).width();
        let title = $(".post-listing .post-item:not(.hot-item):not(.vip1-item) .title");
        let sectionReport = $(".detailp-main .section-report");
        if (width < 1200) {
            title.each(function () {
                $(this).prependTo($(this).closest("a"));
            });
            sectionReport.prependTo($(".detailp-right .section-report"));
        }
    }
    function handleCopyUrl() {
        $(".js-share-link-button").click(function () {
            let clipboardText = $(this).data("clipboard-text");
            let element = document.createElement("textarea");
            element.value = clipboardText;
            element.setAttribute("readonly", "");
            element.style = {
                position: "absolute",
                left: "-9999px",
            };
            document.body.appendChild(element);
            element.select();
            document.execCommand("copy");
            document.body.removeChild(element);
            alert("Đã sao chép thành công");
        });
    }
    function handleShowPopup() {
        $(".js-mobile-actions > a").click(function (e) {
            e.preventDefault();
            $(this).next().toggle();
        });
        $(".js-more-filter").click(function () {
            $(this).next().toggle();
        });
    }

    function handleSearchLocation() {
        $("#js_search_city").on("keyup", function () {
            let value = this.value.toLowerCase().trim();
            $("#list_city li:not(:first-of-type)")
                .show()
                .filter(function () {
                    return (
                        $(this).text().toLowerCase().trim().indexOf(value) == -1
                    );
                })
                .hide();
        });
        $("#js_search_district").on("keyup", function () {
            let value = this.value.toLowerCase().trim();
            $("#list_district li:not(:first-of-type)")
                .show()
                .filter(function () {
                    return (
                        $(this).text().toLowerCase().trim().indexOf(value) == -1
                    );
                })
                .hide();
        });
    }
    function handleNegotiablePrice() {
        $(".detail-section-price .negotiable input[type='checkbox']").change(
            function () {
                if (this.checked) {
                    $(".detail-section-price .form-control").val("");
                    $(".detail-section-price .form-control").attr(
                        "disabled",
                        true
                    );
                    $(".detail-section-price .form-control").css(
                        "background-color",
                        "#ced4da"
                    );
                } else {
                    $(".detail-section-price .form-control").attr(
                        "disabled",
                        false
                    );
                    $(".detail-section-price .form-control").css(
                        "background-color",
                        "rgb(246, 248, 251)"
                    );
                }
            }
        );
    }
    function handleCountChars() {
        $(".js-count-title .form-control").on("keyup", function () {
            $(".js-count-title .count-characters span").text(this.value.length);
        });
        $(".js-count-desc .form-control").on("keyup", function () {
            $(".js-count-desc .count-characters span").text(this.value.length);
        });
    }
    function handleShowPhone() {
        $(".js-show-phone").click(function () {
            let phone = $(this).data("phone");
            $(this).find("strong").text(phone);
            let element = document.createElement("textarea");
            element.value = phone;
            element.setAttribute("readonly", "");
            element.style = {
                position: "absolute",
                left: "-9999px",
            };
            document.body.appendChild(element);
            element.select();
            document.execCommand("copy");
            document.body.removeChild(element);
            $(this).find("span").html("Đã sao chép");
        });
        $(".js_show_phone").click(function (e) {
            e.preventDefault();
            let phone = $(this).data("phone");
            $(this).find("span").html(phone);
        });
        $(".action-item.call").click(function () {
            let phone = $(this).data("phone");
            $(this).find("span").html(phone);
        });
    }
    function configSelect2() {
        if ($(".js-config-select2").length) {
            $(".js-config-select2").each(function () {
                let placeHolder = $(this).attr("aria-placeholder");
                $(this).select2({
                    placeholder: placeHolder,
                    allowClear: true,
                });
                $(this).on("select2:open", function () {
                    setTimeout(function () {
                        $(".select2-search--dropdown").addClass("open");
                    }, 10);
                });
                $(this).on("select2:closing", function () {
                    $(".select2-search--dropdown").removeClass("open");
                });
            });
            $(".select_city").on("select2:select", function (e) {
                let data = e.params.data;
                $("#js_correct_address").val(data.text);
            });
            $(".select_district").on("select2:select", function (e) {
                let data = e.params.data;
                let currentAddress = $("#js_correct_address").val();
                $("#js_correct_address").val(`${data.text}, ${currentAddress}`);
            });
            $(".select_ward").on("select2:select", function (e) {
                let data = e.params.data;
                let currentAddress = $("#js_correct_address").val();
                $("#js_correct_address").val(`${data.text}, ${currentAddress}`);
            });
            $(".select_street").on("select2:select", function (e) {
                let data = e.params.data;
                let currentAddress = $("#js_correct_address").val();
                $("#js_correct_address").val(`${data.text}, ${currentAddress}`);
            });
            var currentAddress;
            $(".number_street").on("click", function () {
                currentAddress = $("#js_correct_address").val();
            });
            $(".number_street").on("keyup", function () {
                let numberStreet = $(this).val();

                $("#js_correct_address").val(
                    `${numberStreet} ${currentAddress}`
                );
            });

            $(".select2-container").on("click", function (e) {
                $(".select2-search__field").trigger("focus");
            });
        }
    }
    function handleScrollDiv() {
        $("a[href*=\\#]:not([href=\\#])").on("click", function () {
            var target = $(this.hash);
            target = target.length
                ? target
                : $("[name=" + this.hash.substr(1) + "]");
            if (target.length) {
                $("html,body").animate(
                    {
                        scrollTop: target.offset().top - 60,
                    },
                    500
                );
                return false;
            }
        });
        $(".js_jump_video").click(function () {
            if ($(".is_video").length) {
                $(".is_video img").click();
            }
        });
        $(".js_jump_image").click(function () {
            $('[data-fancybox="gallery"]:not(.is_video) img').click();
        });
    }
    function handleSave() {
        $(".btn-save").click(function (e) {
            e.preventDefault();
            if ($(this).hasClass("active")) {
                $(this).removeClass("active");
            }
            else {
                $(this).addClass("active");
            }
        });
    }
})(jQuery);

$(document).ready(function () {
    var wardModal = new bootstrap.Modal(
        document.getElementById("property_ward"),
        {
            backdrop: false,
        }
    );
    var cityModal = new bootstrap.Modal(
        document.getElementById("property_city")
    );

    $(".list_type li").click(function () {
        $(".list_type li").removeClass("selected");
        $(this).addClass("selected");
        var data = $(this).text();
        $(".value-type").text(data);
        if (data != "Tất cả") {
            $(".value-type").addClass("bold");
        } else {
            $(".value-type").removeClass("bold");
        }
        $("#property_type .btn-close").click();
    });

    $("#list_city li").click(function (e) {
        e.preventDefault();

        $("#list_city li").removeClass("selected");
        $(this).addClass("selected");
        var data = $(this).text();
        $(".value-localtion").html(data);
        if (data != "Toàn quốc") {
            $(".value-localtion").addClass("bold");
            wardModal.show();
        } else {
            $(".value-localtion").removeClass("bold");
            cityModal.hide();
            window.location = '/' + $("#hdnCategoryUrl").val();
        }
        let value_location = $(".value-localtion").first().text();
        $("#property_ward_label").text(value_location);
        var url = $(this).attr("data-url");
        var districtUrl = $("#hdnDistrictUrl").val();

        $.getJSON("/Home/ListDistrict", { provinceId: $(this).attr("data-value") }, function (data) {
            var html = "<li id='0' data-value='" + url + "' onclick='districtSelect(0)'>Tất cả</li>"
            $.each(data, function (i, item) {
                html += "<li class='" + (districtUrl == item.Url ? "selected" : "") + "' id='" + item.Id + "' data-value='" + item.Url + "' onclick='districtSelect(" + item.Id + ")'>" + item.Name + "</li>"
            });
            $("#list_district").html(html);
        });
    });

    /*$("#list_district li").click(function (e) {
    	e.preventDefault();
    	$("#list_district li").removeClass("selected");
    	$(this).addClass("selected");
    	$(".value-localtion").addClass("bold");
    	let data = $(this).text();
    	let value_location = $(".value-localtion").first().text();
    	console.log(value_location);
    	console.log(data);
    	*//*if (data != "Tất cả") {
    		$(".value-localtion").html(`${data}, ${value_location}`);
    	} else {
    		$(".value-localtion").html(value_location);
    	}
    	wardModal.hide();
    	cityModal.hide();*//*
    });*/

    $(".list_price li").click(function (e) {
        e.preventDefault();
        var val = $(this).data("value");
        $(".slider-range").slider("values", val);
        $(".amount_min").val(val[0]);
        $(".min-price").html(val[0]);
        $(".amount_max").val(val[1]);
        $(".max-price").html(val[1]);

        $(".list_price li").removeClass("selected");
        $(`.list_price li[data-value='[${val}]']`).addClass("selected");

        var data = $(this).text();
        $(".value-price").text(data);
        if (data != "Tất cả") {
            $(".value-price").addClass("bold");
            
        } else {
            $(".value-price").removeClass("bold");
        }
        $("#hdnPrice").val(val[0] + "-" + val[1]);
    });

    $(".list_area li").click(function (e) {
        e.preventDefault();
        var val = $(this).data("value");
        $(".slider-range-area").slider("values", val);
        $(".area_min").val(val[0]);
        $(".min-area").html(val[0]);
        $(".area_max").val(val[1]);
        $(".max-area").html(val[1]);
        $(".list_area li").removeClass("selected");
        $(`.list_area li[data-value='[${val}]']`).addClass("selected");

        var data = $(this).text();
        $(".value-area").text(data);
        if (data != "Tất cả") {
            $(".value-area").addClass("bold");
        } else {
            $(".value-area").removeClass("bold");
        }
        $("#hdnArea").val(val[2]);
    });

    $(".list_type_post li").click(function (e) {
        e.preventDefault();
        $(".list_type_post li").removeClass("selected");
        $(this).addClass("selected");
    });

    $(".data-reset").click(function (e) {
        /*e.preventDefault();
        $(".filter-value").removeClass("bold");
        $(".filter-value").text("Tất cả");
        $(".list-unstyled li:first-child").click();
        $("#list_bath span").each(function (index, element) {
            if (index == 0) {
                element.click();
            }
        });
        $("#list_bed span").each(function (index, element) {
            if (index == 0) {
                element.click();
            }
        });*/
        window.location = '/';
    });

    $(document).on('mouseup touchend', function (e) {
        var div1 = $('.box-actions');
        if (!div1.is(e.target) && div1.has(e.target).length === 0) {
            div1.hide();
        }
    });

    var priceMin = $(".amount_min").val();
    var priceMax = $(".amount_max").val();
    $(".slider-range").slider("values", [priceMin, priceMax]);

    var areaMin = $(".area_min").val();
    var areaMax = $(".area_max").val();
    $(".slider-range-area").slider("values", [areaMin, areaMax]);

    if ($("#hdnDistrictUrl").val() != "") {
        var url = $("#hdnProvinceUrl").val();
        var districtUrl = $("#hdnDistrictUrl").val();
        $.getJSON("/Home/ListDistrict", { provinceId: $("#hdnProvinceId").val() }, function (data) {
            var html = "<li id='0' data-value='" + url + "' onclick='districtSelect(0)'>Tất cả</li>"
            $.each(data, function (i, item) {
                html += "<li class='" + (districtUrl == item.Url ? "selected" : "") +"' id='" + item.Id + "' data-value='" + item.Url + "' onclick='districtSelect(" + item.Id + ")'>" + item.Name + "</li>"
            });
            $("#list_district").html(html);
        });
    }

    $('.filter-location').click(function () {
        if ($("#hdnDistrictUrl").val() != "") {
            $('#property_ward').modal('show');
        }
    });
});

function searchPrice(dt, cate) {
    var url = "";
    if (cate == '' || window.location.pathname.includes('/tags/')) {
        url = "/cho-thue-phong-tro";
    }
    var price = $(".amount_min").val() + "-" + $(".amount_max").val();

    if (price == "0-20") {
        price = "";
    }

    if (dt != "") {
        window.location = url + "?gia=" + price + "&dt=" + dt;
    }
    else {
        window.location = url + "?gia=" + price;
    }
}

function searchArea(gia, cate) {
    var url = "";
    if (cate == '' || window.location.pathname.includes('/tags/')) {
        url = "/cho-thue-phong-tro";
    }
    var area = $(".area_min").val() + "-" + $(".area_max").val();

    if (area == "0-100") {
        area = "";
    }

    if (gia != "") {
        window.location = url + "?gia=" + gia + "&dt=" + area;
    }
    else {
        window.location = url + "?dt=" + area;
    }
}

function clearPrice(dt, cate) {
    if (dt != "") {
        window.location = "?dt=" + dt;
    }
    else {
        window.location = '/' + cate;
    }
}

function clearArea(gia, cate) {
    if (gia != "") {
        window.location = "?gia=" + gia;
    }
    else {
        window.location = '/' + cate;
    }
}

function districtSelect(id) {
    $("#list_district li").removeClass("selected");
    $("#" + id + "").addClass("selected");
    var url = $("#" + id + "").attr("data-value");
    window.location = $("#hdnCategoryUrl").val() + "-" + url;
};