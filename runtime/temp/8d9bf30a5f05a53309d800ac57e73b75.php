<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:61:"D:\wwwroot\qnysj1\wwwroot/app/wap/view/index/user_art_zf.html";i:1500765224;s:55:"D:\wwwroot\qnysj1\wwwroot/app/wap/view/Public/base.html";i:1498016252;}*/ ?>
﻿<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title>湖南省青年文化艺术节</title>
		<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">

		<link rel="stylesheet" href="__STATIC__/mui/css/mui.css">
		
<style>
	.mui-inline{
		vertical-align: bottom;
		font-size: 14px;
		color: #8f8f94;
	}
</style>
<link rel="stylesheet" type="text/css" href="__STATIC__/layui/css/layui.css" />

		<style>
			html,
			body {
				background-color: #efeff4;
			}
			.title{
				margin: 20px 15px 10px;
				color: #6d6d72;
				font-size: 15px;
			}
			.mui-content img{
				width: 100%;
			}
			.mui-off-canvas-left {
				color: #fff;
			}
			#top {
				height: 15%;
				background: #333;
				position: relative;
				border-bottom:1px solid #222;
			}
			#top span {
				position: absolute;
				left: 40%;
				bottom: 0;
				font-size: 14px;
			}
			#nav {
				width: 100%;
				height: 6%;
				padding: 0 5%;
				position: relative;
				background: #333;
			}
			#nav img {
				border-radius: 50%;
				width: 65px;
				height: 65px;
				background: #fff;
				position: absolute;
				left: 5%;
				top: -20px;
			}
			#nav ul {
				width: 60%;
				position: absolute;
				right: 1%;
				top: 10px;
				height: 50px;
				padding: 0;
				margin: 0;
				color: #fff;
			}
			#nav ul li {
				width: 33%;
				height: 40px;
				font-size: 12px;
			}
			#nav ul li span {
				display: block;
				width: 100%;
				height: 30%;
				text-align: center;
			}
			ul,li{list-style: none;}
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
		<!-- 侧滑导航根容器 -->
		<div id="offCanvasWrapper" class="mui-off-canvas-wrap mui-draggable mui-scalable">
		  <!-- 菜单容器 -->
		  <aside id="offCanvasSide" class="mui-off-canvas-left">
			<div id="offCanvasSideScroll" class="mui-scroll-wrapper">
				<div class="mui-scroll" style="height: 100%;">
					<div id="top">
						会员中心
						<span><?php echo session('m_user_auth.user_name'); ?></span>
					</div>
					<div id="nav">
						<img src="<?php if(empty(\think\Session::get('m_user_auth')['user_img']) || ((\think\Session::get('m_user_auth')['user_img'] instanceof \think\Collection || \think\Session::get('m_user_auth')['user_img'] instanceof \think\Paginator ) && \think\Session::get('m_user_auth')['user_img']->isEmpty())): ?>/public/index/user/user_img.png<?php else: ?><?php echo \think\Session::get('m_user_auth')['user_img']; endif; ?>">
						
						<ul>
							<li class="mui-pull-left" style="border-right: 1px solid #ccc;">
								<span><?php echo get_guestbook(\think\Session::get('m_user_auth')['id']); ?></span>
								<span>留言</span>
							<li class="mui-pull-left" style="border-right: 1px solid #ccc;">
								<span><?php echo get_hpoto(\think\Session::get('m_user_auth')['id']); ?></span>
								<span>相册</span>
							</li>
							<li class="mui-pull-left">
								<span><?php echo get_record(\think\Session::get('m_user_auth')['id']); ?></span>
								<span>来访</span>
							</li>
							
						</ul>
					</div>
					<ul class="mui-table-view mui-table-view-chevron mui-table-view-inverted" style="margin-top: 10%";>
						<li class="mui-table-view-cell">
							<a class="mui-navigate-right" href="<?php echo url('index/user',['user_id'=>\think\Session::get('m_user_auth')['id']]); ?>">
								我的主页
							</a>
						</li>
						<li class="mui-table-view-cell">
							<a class="mui-navigate-right" href="<?php echo url('user/record'); ?>">
								用户中心
							</a>
						</li>
						<li class="mui-table-view-cell">
							<a class="mui-navigate-right" href="<?php echo url('user/info'); ?>">
								个人信息
							</a>
						</li>
						<li class="mui-table-view-cell">
							<a class="mui-navigate-right" href="<?php echo url('user/index_player'); ?>">
								报名信息
							</a>
						</li>
						<li class="mui-table-view-cell">
							<a class="mui-navigate-right" href="<?php echo url('user/msg'); ?>">
								通知信息
							</a>
						</li>
						<li class="mui-table-view-cell">
							<a class="mui-navigate-right" href="<?php echo url('user/editpwd'); ?>">
								修改密码
							</a>
						</li>
					</ul>
					<div style="position: absolute;width: 100%;padding: 0 20px;bottom: 30px;">
						<button id="logout" type="button" data-loading-text="退出中"  class="mui-btn mui-btn-block mui-btn-red" style="padding: 5px 0;">退出账号</button>
					</div>
				</div>
			</div>
		  </aside>
		  <!-- 主页面容器 -->
		  <div class="mui-inner-wrap">
			<!-- 主页面标题 -->
			<header class="mui-bar mui-bar-nav">
				
				<a id="user" class="mui-icon mui-icon-contact mui-pull-right" <?php if((!is_login())): ?>style="color:#929292"<?php else: ?>href="#offCanvasSide" style="color:#007aff"<?php endif; ?>></a>
				<h1 class="mui-title">转发动态</h1>
				
				<a style="display:none;" class="mui-action-back mui-icon mui-icon-arrowleft mui-pull-left" style="color:#929292"></a>
			</header>
			<nav class="mui-bar mui-bar-tab">
				<a class="mui-tab-item <?php if(\think\Request::instance()->controller() == 'Index'): ?>mui-active<?php endif; ?>" href="<?php echo url('index/index'); ?>">
					<span class="mui-icon mui-icon-home"></span>
					<span class="mui-tab-label">网站首页</span>
				</a>
				<a class="mui-tab-item <?php if(\think\Request::instance()->controller() == 'News'): ?>mui-active<?php endif; ?>" href="<?php echo url('news/index'); ?>">
					<span class="mui-icon mui-icon-list"></span>
					<span class="mui-tab-label">新闻资讯</span>
				</a>
				<a class="mui-tab-item <?php if(\think\Request::instance()->controller() == 'Player'): ?>mui-active<?php endif; ?>" href="<?php echo url('player/index'); ?>">
					<span class="mui-icon mui-icon-paperclip"></span>
					<span class="mui-tab-label">我要报名</span>
				</a>
				<a class="mui-tab-item <?php if(\think\Request::instance()->controller() == 'School'): ?>mui-active<?php endif; ?>" href="<?php echo url('school/index'); ?>">
					<span class="mui-icon mui-icon-paperplane"></span>
					<span class="mui-tab-label">校区集锦</span>
				</a>
				<a class="mui-tab-item <?php if(\think\Request::instance()->controller() == 'Media'): ?>mui-active<?php endif; ?>" href="<?php echo url('media/index'); ?>">
					<span class="mui-icon mui-icon-chatboxes"></span>
					<span class="mui-tab-label">校园媒体</span>
				</a>
			</nav>
			<div id="offCanvasContentScroll" class="mui-content mui-scroll-wrapper">
			  <div class="mui-scroll">
				<!-- 主界面具体展示内容 -->
				
	<div class="mui-content">
		<form class="layui-form">
		<div class="mui-content-padded">
			<div class="mui-inline">转发动态</div>
		</div>
		<div class="row mui-input-row">
			<textarea id="content" name="content" placeholder="附加内容..."></textarea>
			<input type="hidden" id="art_id" name="art_id" value="<?php echo $artid; ?>">
		</div>
		<div class="row mui-input-row">
			<input type="radio" name="type" value="1" title="转发至个人动态" checked>
			<?php if($um==1): ?><input type="radio" name="type" value="2" title="转发至学校时讯">
			<input type="radio" name="type" value="3" title="转发至个人动态与学校时讯"><?php endif; ?>
		</div>
		      
		<div class="mui-content-padded">
			<button type="button" data-loading-text="提交中" class="mui-btn mui-btn-block mui-btn-primary" lay-filter="sbt" lay-submit>提交</button>
		</div>
		</form>
	</div>

			  </div>
			</div>  
		  </div>
		</div>
		
		<script src="__STATIC__/mui/js/mui.js"></script>
		<script>
			mui.init();
			//主界面和侧滑菜单界面均支持区域滚动；
			mui('#offCanvasSideScroll').scroll();
			mui('#offCanvasContentScroll').scroll();

			
			
			<?php if((!is_login())): ?>
			//主界面容器
			var offCanvasWrapper = mui('#offCanvasWrapper');
			var offCanvasInner = offCanvasWrapper[0].querySelector('.mui-inner-wrap');
			offCanvasInner.addEventListener('drag', function(event) {
				event.stopPropagation();
			});
			
			document.getElementById("user").addEventListener('tap', function() {
				var btnArray = ['再看看', '去登录'];
				mui.confirm('您还未登录平台，请先登录！', '青年文化艺术节', btnArray, function(e) {
					if (e.index == 1) {
						location.href='/wap/login/index';
					}
				})
			});
			
			<?php endif; ?>
			
			//点击退出按钮
			document.getElementById("logout").addEventListener("click", function(){
				//设置loading
				mui("#logout").button('loading');
				//ajax交互，进行登录
				mui.post('<?php echo url('Login/logout'); ?>',{
					},function(data){
						mui("#logout").button('reset');
						if(data.status == 1) {
							mui.toast(data.message);
							location.href='<?php echo url('Login/index'); ?>';
						}else{
							mui.toast(data.message);
						}
						
					},'json'
				);
			})
			
			mui(".mui-table-view").on('tap','a',function(){
			  var href = this.getAttribute("href");
			  location.href=href;
			})
			
			mui(".mui-bar-tab").on('tap','a',function(){
			  var href = this.getAttribute("href");
			  location.href=href;
			})

			

		</script>
		
<script type="text/javascript" src="__STATIC__/layui/admin.js"></script>
<script type="text/javascript" src="__STATIC__/layui/jquery.js"></script>
<script type="text/javascript" src="__STATIC__/layui/layui.js"></script>
<script type="text/javascript" charset="utf-8">

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
  ,'|' //分割线
  ,'left' //左对齐
  ,'center' //居中对齐
  ,'right' //右对齐

  ],
  height: 180
  }); //建立编辑器

  //监听提交
  form.on('submit(sbt)', function(data){
	var tt=layedit.getContent(bld);
	var tet=layedit.getText(bld);
    if(tt=="附加内容..."||tt=="")
	{
		tt=="";
	}

	if(tt.length>1200)
	{
		layer.msg('内容过长，图片与字数超过限制！');
		return false;
	}

	
	$.ajax({
		url:"<?php echo url('index/art_zf_add'); ?>",
		type:"post",
		dataType:"json",
		data:{'art_id':$('#art_id').val(),'type':data.field['type'],'content':tt},
		success:function(dd){
			layer.msg(dd.msg, function(){
				location.href="/wap/index/user_art_info/art_id/<?php echo $artid; ?>.html?user_id=<?php echo $userid; ?>";
			});
		}
	})
   
  });


});

</script>

	</body>

</html>