$(function () {
	var price = $(".slider-range").slider({
		range: true,
		min: 0,
		max: 20,
		values: [0, 20],
		step: 0.5,
		animate: "slow",
		slide: function (event, ui) {
			$(".amount_min").val(ui.values[0]);
			$(".min-price").html(ui.values[0]);
			$(".amount_max").val(ui.values[1]);
			$(".max-price").html(ui.values[1]);
		},
	});
});

$(function () {
	$(".slider-range-area").slider({
		range: true,
		min: 0,
		max: 100,
		values: [0, 500],
		step: 0.5,
		animate: "slow",
		slide: function (event, ui) {
			$(".area_min").val(ui.values[0]);
			$(".min-area").html(ui.values[0]);
			$(".area_max").val(ui.values[1]);
			$(".max-area").html(ui.values[1]);
		},
	});
});
