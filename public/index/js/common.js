$(window).resize(function(){
	$wid = $("body").width();
	if($wid<1920){
		$(".inde_box").css("margin-left","-"+((1920-$wid)/2)+"px");
	}else{
		
	}
})
$(function(){
	$wid = $("body").width();
	if($wid<1920){
		$(".inde_box").css("margin-left","-"+((1920-$wid)/2)+"px");
	}else{
		
	}
	$(".nav li").click(function(){
		$(this).addClass("cli").siblings().removeClass("cli")
	});
	$(".activity li").click(function(){
		$(this).addClass("cli").siblings().removeClass("cli");
	})
	$(".sign_up_nav li").click(function(){
		$(this).addClass("cli").siblings().removeClass("cli");
		$(".sign_up_statistics").hide().eq($(this).index()).show()
	})
	$(".box_shux").css("padding-bottom",$(".box_rig").height() - $(".box_lef").height() + 91 +"px");
	$(".acti_cen_lef_list li").mouseover(function(){
		$(".swi_img").hide()
		$(".swi_tex").hide();
		$(".swi_tex").eq($(this).index()).show();
		$(".swi_img").eq($(this).index()).show();
	})
//	轮播图
	$index = 0
	var kaiguan = true
	var time
	$("#kk").append($("#kk li:first").clone())
	var kk_wid = $("#kk").parent().width() * $("#kk li").length
	$("#kk").width(kk_wid);
	$("#kk li").width(kk_wid / $("#kk li").length + "px");
	setTime()
	$banner=$("#banner_list li")
	$banner.click(function() {
		clearInterval(time)
		if(!kaiguan) {
			return;
		}
		kaiguan = false;
		$index = $(this).index()
		$("#kk").animate({
			"left": $index * -100 + "%"
		}, function() {
			if($index == $banner.length) {
				$("#kk").css("left", "0")
				$index = 0
			}
			kaiguan = true

			setTime()
		})
		$banner.eq($index).addClass("banner_list_on").siblings().removeClass("banner_list_on");
		$(".frl li").eq($index).show().siblings().hide();
	})
	$(".popup").click(function(){
		$(".popup_box").show()
	})
	$(".popup_box_tit span").click(function(){$(".popup_box").hide()})
	function setTime() {
		time = setInterval(function() {
			$index += 1
			$("#kk").animate({
				"left": $index * -100 + "%"
			}, function() {
				if($index == $banner.length) {
					console.log($banner.length)
					$("#kk").css("left", "0")
					$index = 0
					$banner.eq($index).addClass("banner_list_on").siblings().removeClass("banner_list_on");
					$(".frl li").eq($index).show().siblings().hide();
				}
				console.log($index)
			});
			console.log($index)
			$banner.eq($index).addClass("banner_list_on").siblings().removeClass("banner_list_on");
			$(".frl li").eq($index).show().siblings().hide();
		}, 5000)
	}
})
