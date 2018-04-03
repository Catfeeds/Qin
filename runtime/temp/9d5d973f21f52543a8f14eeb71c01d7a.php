<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:60:"D:\wwwroot\wchhui1\wwwroot/app/index/view/media/index_s.html";i:1495352478;s:58:"D:\wwwroot\wchhui1\wwwroot/app/index/view/public/Base.html";i:1496372972;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>校园媒体-<?php echo cookie('remark')['title']; ?></title>

<link type="text/css" rel="stylesheet" href="__index__/css/css.css">
<link type="text/css" rel="stylesheet" href="__index__/css/banner.css">
<script type="text/javascript" src="__index__/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="__index__/js/banner.js"></script> 

<link rel="stylesheet" type="text/css" href="__index__/css/jquery.jslides.css" media="screen" />
<script type="text/javascript" src="__index__/js/jquery.jslides.js"></script>
<style>
.class_statistics_tabContent li{cursor:pointer;}
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

<div class="float_ewm" style="width:200px;height:250px;">
	<img src="__index__/images/float_ewm.png" style="width:200px;height:250px;" />
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



<div class="class_content">
	<div class="class_contnet_left">
    	<div class="class_nav">
        	<ul>
            	<li><a href="<?php echo url('media/index'); ?>">校园院报</a></li>
                <li><a href="<?php echo url('media/index',['type_id'=>1]); ?>" class="dangqian">校园之声</a></li>
            </ul>
        </div>
       	<div class="class_statistics">
				<div class="class_statistics_title"><img src="__index__/images/statistics_title.jpg" /></div>
				<div class="class_statistics_tab">
					<ul>
						<li class="statistics_tab_01 dangqian">校区</li>
						<li class="statistics_tab_03">热门</li>
						<li class="statistics_tab_02">地区</li>
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
							<li onclick="javascript:location.href='/index/lists/index.html?pid=<?php echo $vo['pid']; ?>';"><span><?php echo $vo['ct']; ?>人</span><?php echo $vo['pname']; ?></li>
						<?php endforeach; endif; else: echo "" ;endif; ?>
						 <a href="/index/lists/index.html" class="more">查看完整排名 &gt;&gt;</a>
					</ul>
				</div>
			</div>      
		</div>
    <div class="class_contnet_right">
    	<div class="news_headlines">在目前大部分高等院校中,传统意义上的校园媒体更多仍在实践着对管理层面的信息传达功能和校园文化活动成果的通报功能,并且信息量小、周期性长、互动性差、服务性弱。在如今素质教育的宏大语境下,通过校园媒介功能的深化来构建和谐校园文化、深化专业知识教育与人文素质教育,从而进一步打造文化校园,不失为一项多赢的工程。</div>
    	<div class="news_slide">
<!-- 代码 开始 -->
<div id="full-screen-slider04">
	<ul id="slides04">
		<?php if(is_array($list_school) || $list_school instanceof \think\Collection || $list_school instanceof \think\Paginator): $i = 0; $__LIST__ = $list_school;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
		<li style="background:url(<?php echo $vo['img']; ?>) no-repeat center top;background-size:cover;"><a href="<?php echo url('school/school_info',['school_id'=>$vo['id']]); ?>" target="_blank"><?php echo $vo['id']; ?></a></li>
		<?php endforeach; endif; else: echo "" ;endif; ?>
	</ul>
</div>
<!-- 代码 结束 -->
        </div>
        
        <div class="meiti_shipin">
        	<ul>
            	<?php if(is_array($list_news) || $list_news instanceof \think\Collection || $list_news instanceof \think\Paginator): $i = 0; $__LIST__ = $list_news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            		<li><a href="<?php echo url('media/news_info',['news_id'=>$vo['id']]); ?>" target="_blank"><img src="<?php echo $vo['img']; ?>" width="221" height="169" /></a><?php echo $vo['title']; ?></li>
				<?php endforeach; endif; else: echo "" ;endif; ?> 
            </ul>
        </div>
        <div class="meiti_shipin_more">
        	<div class="meiti_shipin_more_title">
            	<?php echo $list_all->render(); ?>
            	更多校园资讯
            </div>
            <div class="meiti_shipin_more_list">
            	<ul>
				<?php if(is_array($list_all) || $list_all instanceof \think\Collection || $list_all instanceof \think\Paginator): $i = 0; $__LIST__ = $list_all;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                	<li style="margin-top: 10px;">
                    	<a href="<?php echo url('media/news_info',['news_id'=>$vo['id']]); ?>"><img src="<?php echo $vo['img']; ?>" width="410" height="320" /></a>
                    </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>

                    
               	</ul>
            </div>
        </div>
    </div>
</div>




	<div class="bottom_banner">
		<div class="goto_top_row">
			<div class="goto_top"><a href="#go_top"><img src="__index__/images/goto_top.jpg" /></a></div>
		</div>
	</div>

	<div class="bottom_copy">
		<div class="bottom_copy_left" style="width: 890px;">
			主办单位：共青团湖南省委、湖南省教育厅、湖南省文化厅、湖南省青年联合会、湖南省学生联合会 组委会办公地址： 湖南省长沙市天心区湘府西路1号<br />       
			承办单位：湖南省青少年活动中心、湖南省青年就业创业基金会、湖南省青年企业家协会、《年轻人》杂志社<br /> 
			共青团湖南省委 版权所有 信息网络传播许可证号：19255107 互联网新闻信息服务许可证号：461205036<br /> 
			技术支持：湖南亿虹青峰文化传播有限公司、乾明文化传播有限公司 <br /> 
			Information network dissemination license number: 19255107 Internet news information service license number: 461205036
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
