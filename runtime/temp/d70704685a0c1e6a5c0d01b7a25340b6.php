<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:56:"D:\wwwroot\qnysj1\wwwroot/app/index/view/user/index.html";i:1502686816;s:57:"D:\wwwroot\qnysj1\wwwroot/app/index/view/public/Base.html";i:1520394624;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>个人主页-<?php echo \think\Session::get('gjz.title'); ?></title>

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
.detail-body img{max-width: 200px;max-height: 200px;}
.detail-body {max-height: 200px;cursor:pointer}
#int img{width: 55px;margin: -5px;}
.class_content .class_contnet_left .class_personalData #int:hover div{display:block;}
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
			<div id="int" style="text-align: center;margin-top: -30px;width: 260px;margin-left: -30px;" >
			
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
            	<li><a href="/index/user/index/user_id/<?php echo $obj['id']; ?>.html" class="dangqian">个人主页</a></li>
                <li><a href="/index/user/gb_index/user_id/<?php echo $obj['id']; ?>.html" class="">留&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;言</a></li>
				<li><a href="/index/user/photo_index/user_id/<?php echo $obj['id']; ?>.html" class="">相&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;册</a></li>
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
    
	
	<div class="school_slide" <?php if($list_img==null): ?>style="display:none"<?php endif; ?>>
<!-- 代码 开始 -->   
	<div style="HEIGHT: 330px; OVERFLOW: hidden;" id=idTransformView>
		<ul id=idSlider class=slider>
			<?php if(is_array($list_img) || $list_img instanceof \think\Collection || $list_img instanceof \think\Paginator): $i = 0; $__LIST__ = $list_img;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
			  <div style="POSITION: relative">
				  <a href="#" target="_blank"><img src="<?php echo $vo['img']; ?>" style="height:330px;"></a>
			  </div>
			<?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
	</div>

	<div>
		<ul id=idNum class=hdnum>
		<?php if(is_array($list_img) || $list_img instanceof \think\Collection || $list_img instanceof \think\Paginator): $i = 0; $__LIST__ = $list_img;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
		  <li><img src="<?php echo $vo['img']; ?>" style="width:222px;height:113px;"></li>
		<?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
		<script language=javascript>
		  mytv("idNum","idTransformView","idSlider",330,4,true,2000,4,true,"onmouseover");
		  //按钮容器aa，滚动容器bb，滚动内容cc，滚动宽度dd，滚动数量ee，滚动方向ff，延时gg，滚动速度hh，自动滚动ii，
		  </script>
	</div>
<!-- 代码 结束 -->
        </div>

		<?php if(count(json_decode(json_encode($list_article),true)['data'])>0): ?>
        <div class="homepage_comment" id="pg">
			<?php if(is_array($list_article_json) || $list_article_json instanceof \think\Collection || $list_article_json instanceof \think\Paginator): $i = 0; $__LIST__ = $list_article_json;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
			
        	<div class="comment_list">
                <div class="comment_list_right" style="float:left;max-height: 230px;">
					<?php if($vo['back_3']==1): ?>
					<img style="position: absolute;width: 80px;" src="/public/wap/images/jinghua.png" />
					<?php endif; ?>
                	<dt>
					<span style="float: none;"><?php echo date('Y-m-d H:i',$vo['add_time']); ?></span>
					<a style="float: right;" href="/index/user/art_info/art_id/<?php echo $vo['id']; ?>.html?user_id=<?php echo $obj['id']; ?>"><?php echo $vo['com_number']; ?>评论/<?php echo $vo['p_number']; ?>转发</a></dt>
                    <dl class="detail-body" onclick="javscript:location.href='/index/user/art_info/art_id/<?php echo $vo['id']; ?>.html?user_id=<?php echo $obj['id']; ?>'">
					<?php if($vo['json_img']!='/'): ?>
					<div style="float:left;"><img src="<?php echo $vo['json_img']; ?>" /></div>
					<?php endif; ?>
					<div style="float:left;"><?php echo $vo['esc']; ?></div>
					</dl>
					<div style="clear:both;"></div>
					<dd id="rr" style="visibility:hidden">
					<a href="javascript:;" style="padding-left: 10px;" onclick="art_zf(<?php echo $vo['id']; ?>)">转发</a>
					<?php if($vo['user_id']==\think\Session::get('user_auth.id')): ?>
						<a href="javascript:;" style="padding-left: 10px;" onclick="del(<?php echo $vo['id']; ?>)">删除</a>
					<?php else: ?>
						<a href="javascript:;" style="padding-left: 10px;" onclick="art_rep(<?php echo $vo['id']; ?>)">举报</a>
					<?php endif; ?>
					
					</dd>
                </div>
            </div>
			<?php endforeach; endif; else: echo "" ;endif; ?>
			<div class="news_more_title">
            	<?php echo $list_article->render(); ?>
				<a href="#" target="_blank"></a>
            </div>
			<?php if($obj['id']==\think\Session::get('user_auth.id')): ?>
			 <div class="comment_message">
        		
				<form action="" method="post" id="plhf" class="layui-form">
					<div class="comment_message_02" style="background-color: #fff;">
						
						<textarea id="content" name="content" placeholder="输入动态内容" style="height: 200px;">动态内容...</textarea>
					</div>
					<div class="comment_message_submit">
					<input type="button" class="layui-btn" value="发布动态" lay-filter="sbt" lay-submit/>
					</div>
				</form>
        	</div>
			<?php endif; ?>
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
<script type="text/javascript" src="/public/index/js/user_index_js.js"></script>

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

	layedit.set({
	  uploadImage: {
		url: '/index/user/upload_img' //接口url

	  }
	});

  var bld=layedit.build('content',{
	tool: [
  ,'face' //表情
  ,'image' //插入图片
  ,'|' //分割线
  ,'left' //左对齐
  ,'center' //居中对齐
  ,'right' //右对齐
  ,'link' //超链接
  ,'unlink' //清除链接
  ],
  height: 240
  }); //建立编辑器

  //监听提交
  form.on('submit(sbt)', function(data){
	var tt=layedit.getContent(bld);
	var tet=layedit.getText(bld);
    if(tt=="动态内容..."||tt=="")
	{
		layer.msg('请输入动态内容');
		return false;
	}

	if(tt.length>1200)
	{
		layer.msg('内容过长，图片与字数超过限制！');
		return false;
	}

	
	$.ajax({
		url:"<?php echo url('user/user_art_add'); ?>",
		type:"post",
		dataType:"json",
		data:{'content':layedit.getContent(bld),'esc':layedit.getText(bld)},
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
