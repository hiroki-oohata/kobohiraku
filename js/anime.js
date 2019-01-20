$(function(){
$(".main").css("display", "none");

setTimeout(function() {
    $('.anime').fadeOut();
	}, 3800);
});

$(function(){
    $(".main").css({opacity:'0'});
    setTimeout(function(){
    $(".main").css("display", "block");
    $(".main").stop().animate({opacity:'1'},4000);//5秒かけてコンテンツを表示
    },3800);//約4秒後に
});
