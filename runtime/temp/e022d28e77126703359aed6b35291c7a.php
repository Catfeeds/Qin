<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:55:"D:\wwwroot\qnysj1\wwwroot/app/index/view/login/reg.html";i:1508230440;s:57:"D:\wwwroot\qnysj1\wwwroot/app/index/view/public/Base.html";i:1520394624;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登陆-<?php echo \think\Session::get('gjz.title'); ?></title>

<meta name="keywords" content="<?php echo \think\Session::get('gjz.keyword'); ?>" />
<meta name="description" content="<?php echo \think\Session::get('gjz.description'); ?>" />

<link type="text/css" rel="stylesheet" href="__index__/css/css.css">
<link type="text/css" rel="stylesheet" href="__index__/css/banner.css">
<script type="text/javascript" src="__index__/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="__index__/js/banner.js"></script> 

<link rel="stylesheet" type="text/css" href="__index__/css/jquery.jslides.css" media="screen" />
<script type="text/javascript" src="__index__/js/jquery.jslides.js"></script>
<style>
.class_statistics_tabContent li{cursor:pointer;}
</style>
<link rel="stylesheet" type="text/css" href="__STATIC__/layui/css/layui.css" />

	<style>
		.acti{padding: 20px 40px 20px;width: 40%;overflow: hidden;border-radius: 10px;margin-left: 30%;}
		.log_reg_box{width: 600px;overflow:hidden;left: 50%;top: 50%;background:#fff;padding-bottom: 20px;border: 1px solid #a5de80;border-radius: 20px;}
		.zhegai{width: 100%;height: 100%;background: #000;opacity: 0.5;position: fixed;left: 0;top: 0;z-index: 8;}
		.log_reg_tit,.log_reg_tit b,.log_info li{height: 50px;line-height: 50px;}
		.log_reg_tit,.log_reg_tit b,.log_info li span,.log_info li a{text-align: center;}
		.log_reg_tit{width: 100%;height: 49px;position: relative;border-bottom: 1px solid #ccc;background: #a5de80;color: #fff;}
		.log_reg_tit b{display: block;position: absolute;top: 0;right: 0;width: 50px;font-size: 24px;font-weight: 100;cursor: pointer;}
		.log_info{overflow:hidden;padding: 20px 100px;}
		.log_info li{width: 100%;overflow: hidden;}
		.log_info li span{width: 100px;display: inline-block;}
		.log_info li input{width: 260px;height: 20px;display: inline-block;margin-top: 10px;padding:5px;outline: none;}
		.log_info li a{width: 80px;height: 100%;cursor: pointer;margin-left: 10px;}
		.log_info li .lan{background: #a5de80;color: #fff;width: 280px;height: 44px;border: 0;margin: 5px 0 0 75px;border-radius: 10px;cursor: pointer;}
		.log_reg{height: 20px;margin-top: 10px;}
		.log_reg li{width: 50px;margin-left: 20px;text-align: center;line-height: 20px;float: left;cursor: pointer;}
		.log_reg li.cli a{color: #1995E4;}
	</style>


<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?8e85dbf31e589d58cb1b25a97ad602be";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>

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

<div class="float_ewm" style="width:200px;height:250px;" id="img_ewm">

	<img src="__index__/images/float_ewm.png" style="width:200px;height:250px;" />
	<a href="javascript:void(0);" onclick="img_end();" style="position: absolute;width: 15px;text-align: center;top: 0px;right: -15px;">X</a>

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

		function img_end(){
			$("#img_ewm").css("display","none");
		
		}
</script>



<form action="<?php echo url('login/index'); ?>" class="layui-form" method="post">
	<div class="box_rig rig" style="position: relative;">
		<div class="acti">
			<div class="log_reg_box">
				<ul class="log_reg_tit">
					青年文化艺术节
				</ul>
				<ul class="log_info">
					<li><span class="lef">账&nbsp;&nbsp;&nbsp;&nbsp;号：</span><input class="lef" type="text" id="username" name="username" placeholder="请输入账号" lay-verify="required" /></li>
					<li><span class="lef">密&nbsp;&nbsp;&nbsp;&nbsp;码：</span><input class="lef" type="password" id="password" name="password" placeholder="请输入密码" lay-verify="required" /></li>
					<li style="padding-top: 20px;">
					<button type="submit" class="lan" lay-submit lay-filter="sbt" value="登陆">登陆</button>
					</li>
				</ul>
			</div>
		</div>
	</div>
</form>




	<div class="bottom_banner">
		<div class="goto_top_row">
			<div class="goto_top"><a href="#go_top"><img src="__index__/images/goto_top.jpg" /></a></div>
		</div>
	</div>

	<div class="bottom_copy">
		<div class="bottom_copy_left" style="width: 890px;">
			主办单位：共青团湖南省委、湖南省教育厅、湖南省文化厅、湖南省青年联合会、湖南省学生联合会 组委会办公地址： 湖南省长沙市天心区湘府西路1号<br /> <br />      
			承办单位：湖南省青少年活动中心、湖南省青年就业创业基金会、湖南省青年企业家协会、《年轻人》杂志社<br /> <br />
			@共青团湖南省委 版权所有 <a href="http://www.miitbeian.gov.cn/">备案号：湘ICP备17011069号-1</a><br /> <br />
			技术支持：长沙乾明文化传播有限公司<br /> <br />
			
			<a href="http://tongji.baidu.com/web/welcome/ico?s=8e85dbf31e589d58cb1b25a97ad602be" target="_block">
				<img src="http://tongji.baidu.com/sc-web/image/icon/45.gif?__v=1497418389885" alt="">
			</a>
			
			<!--Information network dissemination license number: 19255107 Internet news information service license number: 461205036-->
		</div>
		<div class="bottom_copy_right" style="width: 120px;">
		<img style="width: 115px;" src="__index__/images/ewm.jpg" />
		<p style="text-align: center;">官方公众号</p>
		</div>
		<div class="bottom_copy_right" style="width: 120px;">
		<img style="width: 115px;" src="__index__/images/kfewm.png" />
		<p style="text-align: center;">官方客服</p>
		</div>
	</div>



<script type="text/javascript" src="__STATIC__/layui/layui.js"></script>
<script type="text/javascript" src="__STATIC__/layui/admin.js"></script>
<script type="text/javascript">
layui.use('form', function(){
	form.on('submit(sbt)', function(data){
	   
	});
});	

	//点击登录按钮
		document.getElementById("login").addEventListener("click", function(){
			//判断input是否为空
			check = true;
			if($("#username").val().trim() == "") {
					
					alert("账号不允许为空");
					check = false;
			}else if($("#password").val().trim() == "") {
					
					alert("密码不允许为空");
					check = false;
			}
			//校验通过，继续执行业务逻辑 
			if(check){
				//ajax交互，进行注册//
				$.post('<?php echo url('login/login'); ?>',{
						user: document.getElementById("username").value,
						pwd: document.getElementById("password").value
					},function(data){
						if(data == null) {
                            alert('服务端错误');
                            return;
                        }
                        if(data.status == 0) {
                            alert(data.message);
                            return;
                        }
                        alert('登录成功');
                       location.href='<?php echo url('usercontrol/index'); ?>'
					},'json'
				);
			}
		});

</script>

</body>
</html>
