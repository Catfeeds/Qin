<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:69:"D:\wwwroot\wchhui1\wwwroot/app/index/view/activity/activity_info.html";i:1493345738;s:58:"D:\wwwroot\wchhui1\wwwroot/app/index/view/public/Base.html";i:1493925582;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $obj['title']; ?>-<?php echo cookie('remark')['title']; ?></title>

<link type="text/css" rel="stylesheet" href="__index__/css/css.css">
<link type="text/css" rel="stylesheet" href="__index__/css/banner.css">
<script type="text/javascript" src="__index__/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="__index__/js/banner.js"></script> 

<link rel="stylesheet" type="text/css" href="__index__/css/jquery.jslides.css" media="screen" />
<script type="text/javascript" src="__index__/js/jquery.jslides.js"></script>

	<style>
				.acti{padding-top: 0;padding-right: 0;}
		.journalism_tit{height: 58px;line-height: 58px;font-size: 20px;}
		.new_banner{width: 734px;height: 275px;margin-bottom: 25px;overflow: hidden;position: relative;}
		.new_banner img{width: 100%;height: 100%;}
		.eve_reg{width: 625px;overflow:hidden;line-height: 26px;}
		
		.acti_cen_lef_list{width: 625px;margin-bottom: 60px;}
		.acti_cen_lef_list li a{width: 600px;}
		.acti_botm_tit{text-align: left;color: #207b4f;height: 47px;}
		
		.bri_int{width: 100%;overflow: hidden;}
		.bri_int li{height: 125px;border-bottom: 1px dashed #C4C0C1;padding-bottom: 27px;padding-top: 36px;}
		.bri_int li:first-child{padding-top: 0;}
		.bri_int li:last-child{border: 0;}
		.bri_int_lef{width: 585px;float: left;}
		.bri_int_lef_tit{height: 72px;line-height: 22px;}
		.bri_int_lef_t{color: #848484;height:26px;line-height:26px;padding-left: 15px;width: 550px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;font-size: 14px;background: url(../img/a01.png) no-repeat left center;}
		.bri_int_rig{width: 218px;height: 125px;float: right;}
		.bri_int_rig img{width: 100%;height: 100%;}

		/*征集活动*/
		.col_act{padding: 19px 29px;overflow: hidden;background: #F6F6F6;border-radius: 10px;}
		.col_act_tit{height: 49px;line-height: 49px;border-bottom: 1px solid #C6C6C6;text-align: center;font-size: 18px;font-weight: bold;}
		.seeding_texttatle{line-height: 25px;text-align: center;font-size: 14px;margin-bottom: 25px;}
		.seeding_texttatle span{margin-right: 40px;color: #8e8e8e;}
		.seeding_texttatle span:last-child{margin: 0;}
		.seeding_textdiv{line-height: 25px;color: #8e8e8e;margin: 10px 0;font-size: 14px;}
		.col_act_img{padding: 0 42px;overflow: hidden;margin-bottom: 5px;}
		.col_act_img img{width: 100%;height: auto;}
	</style>

</head>

<body>

<div class="top_row">
	<div class="top">
    	<div class="top_logo"><img src="__index__/images/logo.jpg" /></div>

        <div class="top_login">
		<?php if(\think\Session::get('user_auth.id')!=null): ?>
		<a href="/index/usercontrol/index.html">个人中心</a> | <a href="/index/login/logout.html">退出</a></a>
		<?php else: ?>
		<a href="/index/login/reg.html">登陆</a> / <a href="/index/login/login.html">注册</a>
		<?php endif; ?>
		</div>
        <div class="top_menu">
        	<ul>
            	<li><a href="/index/index/index.html">网站首页</a></li>
                <li><a href="/index/news/index.html">新闻资讯</a></li>
                <li><a href="/index/live/index.html">赛事直播</a></li>
                <li><a href="/index/school/index.html">校区集锦</a></li>
                <li><a href="/index/media/index.html">校园媒体</a></li>
            </ul>
        </div>        
    </div>
</div>

<div class="float_ewm">
	<img src="__index__/images/float_ewm.png" width="171" height="208" />
</div>
<a name="go_top"></a>
<div class="main_visual">
    <div class="flicking_con">
         <a href="#">&nbsp;</a>
         <a href="#">&nbsp;</a>
		 <a href="#">&nbsp;</a>
    </div>
  <div class="main_image">
    <ul>
      <li style="background: url(__index__/images/b_01.jpg) no-repeat center;"><a href="#">&nbsp;</a></li>
      <li style="background: url(__index__/images/b_01.jpg) no-repeat center;"><a href="#">&nbsp;</a></li>  
	  <li style="background: url(__index__/images/b_01.jpg) no-repeat center;"><a href="#">&nbsp;</a></li>
        </ul>
        <a href="javascript:;" style=" max-width:60px; " id="btn_prev"></a> 
        <a href="javascript:;" style=" max-width:60px;" id="btn_next"></a> 
    </div>
</div>
<script type="text/javascript">
        $(document).ready(function(){
          $(".main_visual").hover(function(){
            $("#btn_prev,#btn_next").fadeIn()
          },function(){
            $("#btn_prev,#btn_next").fadeOut()
          });
          
          $dragBln = false;
          
          $(".main_image").touchSlider({
            flexible : true,
            speed : 500,
            btn_prev : $("#btn_prev"),
            btn_next : $("#btn_next"),
            paging : $(".flicking_con a"),
            counter : function (e){
              $(".flicking_con a").removeClass("on").eq(e.current-1).addClass("on");
            }
          });
          
          $(".main_image").bind("mousedown", function() {
            $dragBln = false;
          });
          
          $(".main_image").bind("dragstart", function() {
            $dragBln = true;
          });
          
          $(".main_image a").click(function(){
            if($dragBln) {
              return false;
            }
          });
          
          timer = setInterval(function(){
            $("#btn_next").click();
          }, 5000);
          
          $(".main_visual").hover(function(){
            clearInterval(timer);
          },function(){
            timer = setInterval(function(){
              $("#btn_next").click();
            },5000);
          });
          
          $(".main_image").bind("touchstart",function(){
            clearInterval(timer);
          }).bind("touchend", function(){
            timer = setInterval(function(){
              $("#btn_next").click();
            }, 5000);
          });
          
        });
</script>









	<div class="bottom_banner">
		<div class="goto_top_row">
			<div class="goto_top"><a href="#go_top"><img src="__index__/images/goto_top.jpg" /></a></div>
		</div>
	</div>

	<div class="bottom_copy">
		<div class="bottom_copy_left">
			主办单位：共青团湖南省委、湖南省教育厅、湖南省文化厅、湖南省青年联合会、湖南省学生联合会 组委会办公地址： 湖南省长沙市天心区湘府西路1号<br />       
			承办单位：湖南省青少年活动中心、湖南省青年就业创业基金会、湖南省青年企业家协会、《年轻人》杂志社<br /> 
			共青团湖南省委 版权所有 信息网络传播许可证号：19255107 互联网新闻信息服务许可证号：461205036<br /> 
			技术支持：湖南亿虹青峰文化传播有限公司 Information network dissemination license number: 19255107 Internet news information service license number: 461205036
		</div>
		<div class="bottom_copy_right"><img src="__index__/images/ewm.jpg" /></div>
	</div>





</body>
</html>
