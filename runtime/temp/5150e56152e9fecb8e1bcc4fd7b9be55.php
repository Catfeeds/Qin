<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:60:"D:\amp\UPUPW_K2.1_64\htdocs\QN/app/index\view\login\reg.html";i:1493873203;s:62:"D:\amp\UPUPW_K2.1_64\htdocs\QN/app/index\view\public\Base.html";i:1493873413;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登陆-<?php echo cookie('remark')['title']; ?></title>

<link type="text/css" rel="stylesheet" href="__index__/css/css.css">
<link type="text/css" rel="stylesheet" href="__index__/css/banner.css">
<script type="text/javascript" src="__index__/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="__index__/js/banner.js"></script> 

<link rel="stylesheet" type="text/css" href="__index__/css/jquery.jslides.css" media="screen" />
<script type="text/javascript" src="__index__/js/jquery.jslides.js"></script>

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

</head>

<body>

<div class="top_row">
	<div class="top">
    	<div class="top_logo"><img src="__index__/images/logo.jpg" /></div>

        <div class="top_login">
		<?php if(\think\Session::get('user_auth.id')!=null): ?>
		<a href="/index/usercontrol/index.html">个人中心</a>|<a href="/index/login/logout.html">退出</a></a>
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
                <li><a href="/index/module/index.html">校园媒体</a></li>
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



	<div class="box_rig rig" style="position: relative;">
		<div class="acti">
			<div class="log_reg_box">
				<ul class="log_reg_tit">
					青年文化艺术节
				</ul>
				<ul class="log_info">
					<li><span class="lef">账&nbsp;&nbsp;&nbsp;&nbsp;号：</span><input class="lef" type="text" id="username" placeholder="请输入账号" /></li>
					<li><span class="lef">密&nbsp;&nbsp;&nbsp;&nbsp;码：</span><input class="lef" type="password" id="password" placeholder="请输入密码" /></li>
					<li style="padding-top: 20px;"><input type="button" class="lan" value="登陆" id="login" /></li>
				</ul>
			</div>
		</div>
	</div>




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



<script type="text/javascript">

	//点击登录按钮
		document.getElementById("login").addEventListener("click", function(){
			//判断input是否为空
			check = true;
			$("#login-form input").each(function() {
				//若当前input为空，则alert提醒 
				if(!this.value || this.value.trim() == "") {
					var label = this.previousElementSibling;
					alert(label.innerText + "不允许为空");
					check = false;
					return false;
				}
			});
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
