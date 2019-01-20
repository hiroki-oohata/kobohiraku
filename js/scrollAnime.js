// $(function() {
//     $(window).scroll(function() {
// 		$('#interval').text('スクロール値：' + $(this).scrollTop());
// 	});
// });

//スクロール値ごとの動きを設定
$(function() {
	$(window).scroll(function () {
		var top = $(this).scrollTop();
		if(top > 150) {
			$(".h1-mv").fadeIn('700');
		}else {
			$(".h1-mv").fadeOut('1300');
		}
		if(top > 900) {
			$("#box2").fadeIn('800');
		}else {
			$("#box2").fadeOut('800');
		}
		if(top > 1600) {
			$("#box3").fadeIn('800');
		}else {
			$("#box3").fadeOut('800');
		}
	});
