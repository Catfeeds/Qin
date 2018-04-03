<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:57:"D:\wwwroot\qnysj1\wwwroot/app/index/view/index/index.html";i:1500780776;s:57:"D:\wwwroot\qnysj1\wwwroot/app/index/view/public/Base.html";i:1520394624;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>首页-<?php echo \think\Session::get('gjz.title'); ?></title>

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
.index_a_p{text-indent: initial;background-color: #1e212199;position: relative;top: 345px;height: 30px;color: #fff;font-size: 18px;}
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



<div class="sign_live">
	<div class="sign_up"><a href="/index/player/index_type.html" target="_blank"><img src="__index__/images/sign_up.jpg" /></a></div>
    <div class="live_broadcast">
    	<img src="__index__/images/live_broadcast.jpg" />
        <span>2017年湖南省第四届青年文化艺术节，在赢得社会高效的关注的同时，从活动开展、品牌营造、对外推广上进行了更精心筹备<br />
        而且在活动整体表现上进行大胆尝试，将比赛现场，选手才艺搬上了线上舞台</span>
    </div>
</div>
<div class="live_news_slide">
	<div class="live_news">
    	<ul style="overflow: auto;height: 320px;">
			<?php if(is_array($list_bd) || $list_bd instanceof \think\Collection || $list_bd instanceof \think\Paginator): $i = 0; $__LIST__ = $list_bd;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        	<li><a href="<?php echo $vo['url']; ?>" target="_blank"><?php echo $vo['title']; ?>... [ 详细]</a></li>
			<?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
    <div class="live_slide">
		<iframe src="/index/index/index_slide.html" frameborder="0" scrolling="no" width="822" height="300"></iframe>
    </div>
</div>

<div class="information_news_slide">
	<div class="information_slide">
	<!-- 代码 开始 -->
		<div id="full-screen-slider">
			<ul id="slides">
				<?php if(is_array($list_activity_2) || $list_activity_2 instanceof \think\Collection || $list_activity_2 instanceof \think\Paginator): $i = 0; $__LIST__ = $list_activity_2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$io): $mod = ($i % 2 );++$i;?>
					<li style="background:url(<?php echo $io['img']; ?>) no-repeat center top;background-size:cover;">
					<a href="<?php echo url('media/news_info',['news_id'=>$io['id']]); ?>" style="position: absolute;" target="_blank">
					
					<p class="index_a_p"><?php echo $io['title']; ?></p>
					
					</a>
					</li>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</div>
	<!-- 代码 结束 -->
    </div>
    <div class="information_news">
    	<div class="information_news_title">
        	<img src="__index__/images/campus_media.jpg" />
            <span>在如今素质教育的宏大语境下,通过校园媒介功能的深化来构建和谐校园文化、深化专业知识教育与人文素质教育,从而进一步打造文化校园,不失为一项多赢的工程。 </span>
        </div>
        <div class="information_news_classification">
        	<ul>
            	<!-- PSD里没有提供彩色图片，换成对应的彩色图片即可 84px*84px -->
				<?php if(is_array($list_activity_1) || $list_activity_1 instanceof \think\Collection || $list_activity_1 instanceof \think\Paginator): $i = 0; $__LIST__ = $list_activity_1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$io): $mod = ($i % 2 );++$i;?>
					<li style="overflow: hidden; text-overflow:ellipsis; white-space: nowrap;"><a href="<?php echo url('media/news_info',['news_id'=>$io['id']]); ?>"><img src="<?php echo $io['img']; ?>" style="width:84px;height:84px;" /><br /><?php echo $io['title']; ?></a></li>
				<?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
</div>

<div class="news_event_slide">
	<div class="news_event">
    	<div class="news_event_title">
        	<img src="__index__/images/news.jpg" />

            <span>
				<?php if(is_array($list_news) || $list_news instanceof \think\Collection || $list_news instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($list_news) ? array_slice($list_news,0,1, true) : $list_news->slice(0,1, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>  
					<?php echo $vo['esc']; ?>... 
					<a href="<?php echo url('news/news_info',['news_id'=>$vo['id']]); ?>" >[详细]</a>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</span>
        </div>
        <div class="news_event_news">
        	<ul>
				<?php if(is_array($list_news) || $list_news instanceof \think\Collection || $list_news instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($list_news) ? array_slice($list_news,1,4, true) : $list_news->slice(1,4, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>  
					<li><a href="<?php echo url('news/news_info',['news_id'=>$vo['id']]); ?>" ><?php echo $vo['title']; ?>... [ 详细]</a></li>
				<?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
    <div class="news_slide">
	<!-- 代码 开始 -->
		<div id="full-screen-slider02">
			<ul id="slides02">
				<?php if(is_array($list_news) || $list_news instanceof \think\Collection || $list_news instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($list_news) ? array_slice($list_news,1,4, true) : $list_news->slice(1,4, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>  
					<li style="background:url(<?php echo $vo['img']; ?>) no-repeat center top;background-size:cover;"><a href="<?php echo url('news/news_info',['news_id'=>$vo['id']]); ?>" ><?php echo $vo['id']; ?></a></li>
				<?php endforeach; endif; else: echo "" ;endif; ?>

			</ul>
		</div>
	<!-- 代码 结束 -->
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





</body>
</html>
