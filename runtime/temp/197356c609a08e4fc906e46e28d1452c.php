<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:53:"D:\wwwroot\qnysj1\wwwroot/app/wap/view/user/info.html";i:1495373502;s:55:"D:\wwwroot\qnysj1\wwwroot/app/wap/view/Public/base.html";i:1498016252;}*/ ?>
﻿<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title>湖南省青年文化艺术节</title>
		<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">

		<link rel="stylesheet" href="__STATIC__/mui/css/mui.css">
		
    <link rel="stylesheet" href="__STATIC__/mui/css/mui.css">
	<link rel="stylesheet" href="__STATIC__/mui/picker/css/mui.picker.css">
	<link rel="stylesheet" href="__STATIC__/mui/picker/css/mui.poppicker.css">
	<link rel="stylesheet" href="__STATIC__/mui/picker/css/mui.dtpicker.css">
    <style>
	.mui-input-row{height:auto !important;min-height:40px;}

	.mui-input-row label {font-size: 20px;}

	.image-item {
		width: 100%;
		height: 155px;
		background-size: 100% 100%;
		display: inline-block;
		position: relative;
		border-radius: 5px;
		margin-right: 10px;
		margin-bottom: 10px;
		border: none;
		vertical-align: top;
	}
	.image-item .image-up {
		height: 150px;
		width: 40%;
		max-width:150px;
		margin-left: 30%;
		border-radius: 10px;
		line-height: 65px;
		border: 1px solid #ccc;
		color: #ccc;
		display: inline-block;
		text-align: center;
	}
	.image-item .file {
		position: absolute;
		left: 0px;
		top: 0px;
		width: 100%;
		height: 100%;
		opacity: 0;
		cursor: pointer;
		z-index: 0;
	}
	</style>

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
				<h1 class="mui-title">个人信息</h1>
				
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

	    <form id='fid' class="mui-input-group" action="<?php echo url('user/info'); ?>" method="post" enctype="multipart/form-data">
			<div class="mui-input-row">
				<label>头像</label>
				<div class="image-item">
					<div id="file">
					<img class="image-up" src="<?php echo $obj['img']; ?>">
					</div>
					<input onchange="handleFiles(this)" class="file" id="img" name="img" accept="image/*" type="file">
				</div>
			</div>
			<div class="mui-input-row">
				<label>昵称</label>
				<input id='user_name' name="user_name" value="<?php echo $obj['user_name']; ?>" type="text" class="mui-input-clear mui-input" placeholder="昵称">
			</div>
			<div class="mui-input-row">
				<label>性别</label>
				<input id='sex' name="user_sex" value="<?php echo $obj['user_sex']; ?>" type="text" placeholder="性别" class="mui-input" readonly>
			</div>
			<div class="mui-input-row">
				<label>年龄</label>
				<input id='age' name="user_age" value="<?php echo $obj['user_age']; ?>" type="text" class="mui-input-clear mui-input" placeholder="年龄">
			</div>
			<div class="mui-input-row">
				<label>民族</label>
				<input id='race' name="race" value="<?php echo $obj['race']; ?>" type="text" class="mui-input-clear mui-input" placeholder="民族">
			</div>
			<div class="mui-input-row">
				<label>联系方式</label>
				<input id='tel' name="tel" value="<?php echo $obj['tel']; ?>" type="text" class="mui-input-clear mui-input" placeholder="联系方式">
			</div>
			<div class="mui-input-row">
				<label>所属群体</label>
				<input id='tp_name' name="tp_name" type="text" value="<?php if(($obj['sid'] != 0)): ?>在校<?php else: ?>社会<?php endif; ?>" placeholder="所属群体" class="mui-input" readonly>
				<input type="hidden" name="tp" id="tp" value="<?php if(($obj['sid'] != 0)): ?>1<?php else: ?>2<?php endif; ?>">
			</div>
			<div class="mui-input-row" id="pp">
				<label>所属市级</label>
				<input id='pname' name="pname" type="text" value="<?php echo $obj['pname']; ?>" placeholder="所属市级" class="mui-input" readonly>
				<input type="hidden" name="pid" id="pid" value="<?php echo $obj['pid']; ?>">
			</div>
			<div class="mui-input-row" id="cc" style="display:none;">
				<label>所属区级</label>
				<input id='cname' name="cname" type="text" value="<?php echo $obj['cid']; ?>" placeholder="所属区级" class="mui-input" readonly>
				<input type="hidden" name="cid" id="cid" value="<?php echo $obj['cid']; ?>">
			</div>
			<div class="mui-input-row" id="ss" <?php if($obj['sid']==0): ?>style="display:none;"<?php endif; ?>>
				<label>所属学校</label>
				<input id='sname' name="sname" type="text" value="<?php if($obj['sid']!=0): ?><?php echo $obj['sname']; endif; ?>" placeholder="所属学校" class="mui-input" readonly>
				<input type="hidden" name="sid" id="sid" value="<?php echo $obj['sid']; ?>">
			</div>
			<div class="mui-input-row" id="csry" style="<?php if($obj['type']==28): ?>display:none;<?php else: ?>display:block;<?php endif; ?>">
				<label>用户简介</label>
				<textarea id='esc' name="esc" type="text" value="<?php echo $obj['esc']; ?>" class="mui-input-clear mui-input" placeholder="用户简介"><?php echo $obj['esc']; ?></textarea>
			</div>
			<div class="mui-input-row">
				<label>直播地址</label>
				<input id='live' name="live" value="<?php echo $obj['Live']; ?>" type="text" class="mui-input-clear mui-input" placeholder="推荐单位">
			</div>
			<div class="mui-button-row">
				<button type="button" class="mui-btn mui-btn-primary" onclick="sbt();" >修改</button>
				<a class="mui-btn mui-btn-danger" href="javascript:window.history.go(-1);" >取消</a>
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
		
    <script src="__STATIC__/mui/js/mui.js"></script>
	<script src="__STATIC__/mui/picker/js/mui.picker.js"></script>
	<script src="__STATIC__/mui/picker/js/mui.poppicker.js"></script>
	<script src="__STATIC__/mui/picker/js/mui.dtpicker.js"></script>

	<script src="__STATIC__/../wap/js/jquery-1.8.3.min.js"></script>

	<script src="__STATIC__/../wap/js/user_info_js.js"></script>
    <script type="text/javascript" charset="utf-8">
		var pickerp = new mui.PopPicker();
		var pickerc = new mui.PopPicker();
		var pickers = new mui.PopPicker();
		pickerp.setData(<?php echo $plist; ?>);
		

	window.URL = window.URL || window.webkitURL;
	function handleFiles(obj) {
		fileList = document.getElementById("file");
			var files = obj.files;
			img = new Image();
			if(window.URL){	
				
				img.src = window.URL.createObjectURL(files[0]); //创建一个object URL，并不是你的本地路径
				img.className = "image-up";
				img.onload = function(e) {
					window.URL.revokeObjectURL(this.src); //图片加载后，释放object URL
				}
				if(fileList.firstElementChild){
					 fileList.removeChild(fileList.firstElementChild);
				} 
				fileList.appendChild(img);
			}else if(window.FileReader){
				//opera不支持createObjectURL/revokeObjectURL方法。我们用FileReader对象来处理
				var reader = new FileReader();
				reader.readAsDataURL(files[0]);
				reader.onload = function(e){	
						img.src = this.result;
						img.className = "image-up";
						fileList.appendChild(img);
				}
			}else
			{
				//ie
				obj.select();
				obj.blur();
				var nfile = document.selection.createRange().text;
				document.selection.empty();
				img.src = nfile;
				img.className = "image-up";
				img.onload=function(){
				  
				}
				fileList.appendChild(img);
			}
	}



    </script>

	</body>

</html>