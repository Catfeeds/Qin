<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:60:"D:\wwwroot\wchhui1\wwwroot/app/index/view/user/gb_index.html";i:1492924304;s:58:"D:\wwwroot\wchhui1\wwwroot/app/index/view/public/Base.html";i:1494126666;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>个人主页-<?php echo cookie('remark')['title']; ?></title>

<link type="text/css" rel="stylesheet" href="__index__/css/css.css">
<link type="text/css" rel="stylesheet" href="__index__/css/banner.css">
<script type="text/javascript" src="__index__/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="__index__/js/banner.js"></script> 

<link rel="stylesheet" type="text/css" href="__index__/css/jquery.jslides.css" media="screen" />
<script type="text/javascript" src="__index__/js/jquery.jslides.js"></script>

<link rel="stylesheet" type="text/css" href="__STATIC__/layui/css/layui.css" />
<style>
	.acti{padding: 28px 40px 42px;background: #EEE;width: 738px;overflow: hidden;border-radius: 10px;}
	.journalism_tit{height: 52px;color: #fff;line-height: 52px;font-size: 24px;}
	.journalism_tit span{color: #ff0;}
	.new_banner{height: 433px;margin-bottom: 20px;}
	.new_banner img{width: 100%;height: 100%;}
	.sch_pre{width: 100%;height: 92px;margin-bottom: 24px;}
	.sch_pre li{width: 182px;height: 100%;margin-right: 2px;float: left;cursor: pointer;}
	.sch_pre li img,.bri_int li img,.inf_lef img{width: 100%;height: 100%;}
	.sch_pre li:last-child{margin-right: 0;}
	.eve_reg{color: #fff;color: #CDCDCD;line-height: 20px;margin-bottom: 18px;font-size: 14px;}
	.acti_botm_tit{height: 30px;line-height: 30px;border-bottom: 1px solid #a5a5a5;color: #ff0;text-align: left;margin-bottom: 18px;}
	.bri_int li{width: 243px;height: 143px;float: left;margin: 0 3px 3px 0;}
	.com{overflow: hidden;padding: 10px 10px 20px 10px;background: #fff;border-radius: 10px;}
	.dyn{overflow: hidden;padding:5px 10px;border-bottom: 1px dashed #ccc;}
	.nic{font-size: 14px;line-height: 20px;overflow: hidden;}
	
	.con{overflow: hidden;line-height: 22px;font-size: 12px;}
	.con .tim,.con .con_rig{color: #C4C0C1;}
	.con .tim{width: 30%;}
	.con .con_rig{width: 60px;margin-left: 10px;}
	.acti_botm_tit{height: 30px;line-height: 30px;border-bottom: 1px solid #a5a5a5;text-align: left;margin-bottom: 18px;}
	.acti_botm_tit span{color: #000;}
	.acti_botm_tit ul{color: #000;}
	.bri_int li{width: 243px;height: 143px;float: left;margin: 0 3px 3px 0;}
	.pub{overflow: hidden;height: 150px;}
	textarea{width: 100%;height: 80px;border-radius: 10px;border: 1px solid #ccc;padding: 10px;max-height: 80px;outline:none;}
	.pub span{background: #1995E4;width: 100px;height: 30px;line-height: 30px;text-align: center;cursor: pointer;}
	.inf{overflow: hidden;padding-bottom: 20px;margin-bottom: 20px;border-bottom: 1px solid #ccc;}
	.inf_lef{width: 90px;height: 90px;}
	.inf_rig{width: 500px;margin-left: 20px;}
	.inf_rig li{height: 30px;}
	/*回复*/
	.reply{width: 100%;font-size: 14px;color: #000000;}
</style>
	<script src="js/jquery-1.8.3.js" type="text/javascript" charset="utf-8"></script>

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



<script type="text/javascript" src="__STATIC__/layui/layui.js"></script>
  <link rel="stylesheet" type="text/css" href="__STATIC__/layui/css/layui.css" />
<script>

//Demo
layui.use('form', function(){
  var form = layui.form();
  //监听提交
  form.on('submit(sbt)', function(data){

	if(data.field['content']=='')
	{
		layer.msg('内容不能为空');
		return;
	}

	$.ajax({
		url:"<?php echo url('user/user_art_gb'); ?>",
		type:"post",
		dataType:"json",
		data:{'uid':data.field['uid'],'content':data.field['content']},
		success:function(dd){
			layer.msg(dd.msg, function(){
				parent.location.reload();
			});
		}
	})
 
  });


});
</script>

</body>
</html>
