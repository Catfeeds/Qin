<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:59:"D:\wwwroot\qnysj1\wwwroot/app/index/view/user/gb_index.html";i:1502688420;s:57:"D:\wwwroot\qnysj1\wwwroot/app/index/view/public/Base.html";i:1520394624;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>个人主页-留言-<?php echo \think\Session::get('gjz.title'); ?></title>

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
                <li><a href="/index/user/gb_index/user_id/<?php echo $obj['id']; ?>.html" class="dangqian">留&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;言</a></li>
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
		
        <div class="homepage_comment" id="pg">
			<?php if(count(json_decode(json_encode($list_gb),true)['data'])>0): if(is_array($list_gb_json) || $list_gb_json instanceof \think\Collection || $list_gb_json instanceof \think\Paginator): $i = 0; $__LIST__ = $list_gb_json;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        	<div class="comment_list">
            	<div class="comment_list_left">
                	<img src="<?php echo $vo['user_img']; ?>" width="50" height="50" />
                    <span></span>
                </div>
                <div class="comment_list_right">
                	<dt>
					<span><?php echo date('Y-m-d H:i',$vo['add_time']); ?></span>
					<a><?php echo $vo['user_name']; ?></a>&nbsp;[<?php echo $vo['dizhi']; ?>]</dt>
                    <dl class="detail-body"><?php echo $vo['content']; ?></dl>
					<dd id="rr" style="visibility:hidden">

						<a href="javascript:;" style="padding-left: 10px;" onclick="rep(<?php echo $vo['id']; ?>)">举报</a>

					<?php if($vo['wid']==\think\Session::get('user_auth.id')): ?>
						<a href="javascript:;" onclick="com_del(<?php echo $vo['id']; ?>)">删除</a>
					<?php elseif($vo['user_id']==\think\Session::get('user_auth.id')): ?>
						<a href="javascript:;" onclick="del(<?php echo $vo['id']; ?>)">删除</a>
					<?php endif; ?>
					</dd>
                </div>
            </div>
			<?php endforeach; endif; else: echo "" ;endif; ?>
			<div class="news_more_title">
            	<?php echo $list_gb->render(); ?>
				<a href="#" target="_blank"></a>
            </div>
			<?php else: ?>
				<div style="width:300px;margin-left: 45%;">没有留言哦，快来成为第一个留言的人吧！</div>
			<?php endif; ?>
            <div class="comment_message">
				<form action="" method="post" id="plhf" class="layui-form">
					<div class="comment_message_02" style="background-color: #fff;">
						 
						<textarea id="content" name="content" placeholder="输入留言内容" style="height: 200px;"></textarea>

						<input type="hidden" id="uid" name="uid" value="<?php echo $obj['id']; ?>">

					</div>
					<div class="comment_message_submit">

					<input type="button" class="layui-btn" value="提交留言" lay-filter="sbt" lay-submit/>

					<!--<input type="submit" value="提交留言"/>-->

					</div>
				</form>
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
<script type="text/javascript" src="__index__/js/user_ha_js.js"></script>
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

  var ind=layedit.build('content',{
	tool: [
  ,'face' //表情
  //,'image' 插入图片
  ,'|' //分割线
  ,'left' //左对齐
  ,'center' //居中对齐
  ,'right' //右对齐
  ,'link' //超链接
  ,'unlink' //清除链接
  ],
  height:180
  }); //建立编辑器

  //监听提交
  form.on('submit(sbt)', function(data){
	var tt=layedit.getContent(ind);
	var tet=layedit.getText(ind);
    if(tt=='')
	  {
		layer.msg('请输入留言内容');
		return false;
	  }

	if(tet.length>50)
	{
		layer.msg('内容过长，字数限制50个字以内！');
		return false;
	}

	if(tt.length>800)
	{
		layer.msg('内容过长，图片与字数超过限制！');
		return false;
	}

	$.ajax({
		url:"<?php echo url('user/user_art_gb'); ?>",
		type:"post",
		dataType:"json",
		data:{'uid':data.field['uid'],'content':tt},
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
