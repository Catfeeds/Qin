<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:62:"D:\wwwroot\qnysj1\wwwroot/app/index/view/user/photo_index.html";i:1502688430;s:57:"D:\wwwroot\qnysj1\wwwroot/app/index/view/public/Base.html";i:1520394624;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>个人主页-相册-<?php echo \think\Session::get('gjz.title'); ?></title>

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
.news_more_title a{margin-left:5px;}
.news_more_title .news_more_page{float: right;}
.layui-table {text-align: center;float: left;width: 250px;margin: 12px;}
.layui-table tbody tr td img {height:200px;}
#int img{width: 55px;margin: -5px;}
#ts{width:180px;background: #fff;border-radius:10px;margin-left:40px;position:absolute;border:1px solid #000;z-index: 99;display:none}
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





<div class="class_content">
	<div class="class_contnet_left">
    	<div class="class_personalData">
        	<img src="<?php echo $obj['img']; ?>" width="200" height="200" />
			<div id="int" style="text-align: center;margin-top: -30px;width: 260px;margin-left: -30px;">
				<?php if($obj['int_number']>=0): ?>
				<img title="1级勋章" src="/public/wap/images/001.png" /><?php endif; if($obj['int_number']>=100): ?>
				<img title="2级勋章" src="/public/wap/images/002.png" /><?php endif; if($obj['int_number']>=300): ?>
				<img title="3级勋章" src="/public/wap/images/003.png" /><?php endif; if($obj['int_number']>=600): ?>
				<img title="4级勋章" src="/public/wap/images/004.png" /><?php endif; if($obj['int_number']>=1000): ?>
				<img title="5级勋章" src="/public/wap/images/005.png" /><?php endif; ?>

				<div id="ts" style="">
				账户积分:<?php echo $obj['int_number']; ?><br>下一枚勋章所需积分:
				<?php if($obj['int_number']>=1000): ?>
					<?php echo intval(3000)-$obj['int_number']; elseif($obj['int_number']>=600): ?>
					<?php echo intval(1000)-$obj['int_number']; elseif($obj['int_number']>=300): ?>
					<?php echo intval(600)-$obj['int_number']; elseif($obj['int_number']>=100): ?>
					<?php echo intval(300)-$obj['int_number']; elseif($obj['int_number']>=0): ?>
					<?php echo intval(100)-$obj['int_number']; endif; ?>
				</div>
			</div>
            <dt>
			<?php if($pobj): ?><a href="javascript:;" onclick="user_vo(<?php echo $obj['id']; ?>)" class="dangqian">&nbsp;</a><?php endif; ?>
			<strong><?php echo $obj['user_name']; ?></strong>
			&nbsp;&nbsp;&nbsp;<?php echo $obj['user_age']; ?>岁</dt>
			<dd style="float: right;"><?php echo $pobj['back_3']; ?></dd>
            <dl><?php echo $obj['sname']; ?></dl>
			<?php if($pobj): ?><dd style="clear: both;">参赛项目：<?php echo $pobj['type_name']; ?></dd><?php endif; ?>
            
        </div>
		<div class="class_nav" style="margin-top: 30px;">
        	<ul>
            	<li><a href="/index/user/index/user_id/<?php echo $obj['id']; ?>.html" class="">个人主页</a></li>
                <li><a href="/index/user/gb_index/user_id/<?php echo $obj['id']; ?>.html" class="">留&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;言</a></li>
				<li><a href="/index/user/photo_index/user_id/<?php echo $obj['id']; ?>.html" class="dangqian">相&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;册</a></li>
            </ul>
        </div>
       <div class="class_statistics">
				<div class="class_statistics_title"><img src="__index__/images/statistics_title.jpg" /></div>
				<div class="class_statistics_tab">
					<ul>
						<li class="statistics_tab_01 dangqian">校区</li>
						<li class="statistics_tab_03">热门</li>
						<li class="statistics_tab_02">社区</li>
					</ul>
				</div>
				<div class="class_statistics_tabContent">
					<ul class="statistics_tabContent_01" style="display:block;">
						
						<?php if(is_array($list_school_user) || $list_school_user instanceof \think\Collection || $list_school_user instanceof \think\Paginator): $i = 0; $__LIST__ = $list_school_user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
							<li onclick="javascript:location.href='/index/school/school_info.html?school_id=<?php echo $vo['sid']; ?>';"><span><?php echo $vo['ct']; ?>人</span><?php echo $vo['sname']; ?></li>
						<?php endforeach; endif; else: echo "" ;endif; ?>
						 <a href="/index/lists/index.html" class="more">查看完整排名 &gt;&gt;</a>
					</ul>
					
					<ul class="statistics_tabContent_03" style="display:none;">
						<?php if(is_array($list_player_back_3) || $list_player_back_3 instanceof \think\Collection || $list_player_back_3 instanceof \think\Paginator): $i = 0; $__LIST__ = $list_player_back_3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
							<li onclick="javascript:location.href='/index/user/index.html?user_id=<?php echo $vo['id']; ?>';"><span><?php echo $vo['back_3']; ?>人</span><?php echo $vo['user_name']; ?></li>
						<?php endforeach; endif; else: echo "" ;endif; ?>
						 <a href="/index/lists/index_player.html" class="more">查看完整排名 &gt;&gt;</a>
					</ul>

					<ul class="statistics_tabContent_02" style="display:none;">
						<?php if(is_array($list_reg_user) || $list_reg_user instanceof \think\Collection || $list_reg_user instanceof \think\Paginator): $i = 0; $__LIST__ = $list_reg_user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
							<li onclick="javascript:location.href='/index/lists/index_cmm.html';"><span><?php echo $vo['ct']; ?>人</span><?php echo $vo['ssname']; ?></li>
						<?php endforeach; endif; else: echo "" ;endif; ?>
						 <a href="/index/lists/index_cmm.html" class="more">查看完整排名 &gt;&gt;</a>
					</ul>
				</div>
			</div>      
		</div>
    <div class="class_contnet_right">


		<?php if(count(json_decode(json_encode($list_hpoto),true)['data'])>0): ?>
        <div class="homepage_comment" id="pg">
			<div class="comment_list">
				<div id="layer-photos-demo" class="layer-photos-demo">
					<?php if(is_array($list_hpoto) || $list_hpoto instanceof \think\Collection || $list_hpoto instanceof \think\Paginator): $i = 0; $__LIST__ = $list_hpoto;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						<img layer-pid="<?php echo $vo['id']; ?>" style="height:200px;width: 200px;" layer-src="<?php echo $vo['img']; ?>" alt="图片" src="<?php echo $vo['img']; ?>" />
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
			</div>
			
			<div class="news_more_title">
            	<?php echo $list_hpoto->render(); ?>
				<a href="#" target="_blank"></a>
            </div>
        </div>
		<?php else: ?>
			<div style="width:300px;margin-left: 45%;">这家伙很懒，什么也没有！</div>
		<?php endif; ?>

    </div>
</div>




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



<script type="text/javascript" src="__STATIC__/layui/admin.js"></script>
<script type="text/javascript" src="__STATIC__/layui/layui.js"></script>
<script>
window.onload=function(){
	if(GetQueryString('page')!=null)
	{
		location.href = "#pg";
	}

	$("#int").hover(function (){
		$("#ts").css("display","block");
	},function (){
		$("#ts").css("display","none");
	});
}

function GetQueryString(name)
{
     var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
     var r = window.location.search.substr(1).match(reg);
     if(r!=null)return  unescape(r[2]); return null;
}

//Demo
layui.use(['form','layedit'], function(){
  var form = layui.form(),layedit=layui.layedit;
	//调用示例
	layer.photos({
	  photos: '#layer-photos-demo'
	  ,anim: 5 //0-6的选择，指定弹出图片动画类型，默认随机（请注意，3.0之前的版本用shift参数）
	}); 

});
</script>

</body>
</html>
