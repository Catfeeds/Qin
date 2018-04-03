<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:56:"D:\wwwroot\wchhui1\wwwroot/app/wap/view/user/player.html";i:1495778892;s:56:"D:\wwwroot\wchhui1\wwwroot/app/wap/view/Public/base.html";i:1495342088;}*/ ?>
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

	/*.mui-input-row label {font-size: 20px;}*/
	body {
		    font-size: 14px;
		}
	input{
			font-size: 14px;
		
		}
	.image-item {
		width: 100%;
		max-height: 155px;
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
		width: 60%;
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
				<h1 class="mui-title">报名信息</h1>
				
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

	    <form id='fid' class="mui-input-group" action="" method="post" enctype="multipart/form-data">
			<div class="mui-input-row">
				<label>大赛类别</label>
				<input type="hidden" name="tpid" id="tpid" value="<?php if($obj['maxid'] != 0): ?>2<?php elseif($obj['minid'] != 0): ?>3<?php else: ?>1<?php endif; ?>">
				<input id='type_name' name="type_name" type="text" value="<?php echo $obj['type_name']; ?>" placeholder="大赛类别" class="mui-input" readonly>
				<input type="hidden" name="type_id" id="type_id" value="<?php echo $obj['type']; ?>"> 
			</div>
			<div class="mui-input-row" id="mm" style="<?php if($obj['maxid']==0): ?>display:none;<?php endif; ?>">
				<label>参选类别</label>
				<input id='max_name' name="max_name" type="text" value="<?php echo $obj['maxname']; ?>" placeholder="参选类别" class="mui-input" readonly>
				<input type="hidden" name="maxid" id="maxid" value="<?php echo $obj['maxid']; ?>">
			</div>
			<div class="mui-input-row" id="nn" style="<?php if($obj['minid']==0): ?>display:none;<?php endif; ?>">
				<label>参选类别</label>
				<input id='min_name' name="min_name" type="text" value="<?php echo $obj['minname']; ?>" placeholder="参选类别" class="mui-input" readonly>
				<input type="hidden" name="minid" id="minid" value="<?php echo $obj['minid']; ?>">
			</div>
			<div class="mui-input-row">
				<label>照片</label>
				<div class="image-item">
					<div id="file" style="margin-left: 30%;">
					<img class="image-up" src="<?php echo $obj['img']; ?>">
					</div>
					<input onchange="handleFiles(this,'file')" class="file" id="img" name="img" accept="image/*" type="file">
				</div>
			</div>
			<div class="mui-input-row">
				<label>姓名</label>
				<input id='user_name' name="user_name" value="<?php echo $obj['user_name']; ?>" type="text" class="mui-input-clear mui-input" placeholder="姓名">
			</div>
			<div class="mui-input-row">
				<label>性别</label>
				<input id='user_sex' name="user_sex" value="<?php echo $obj['user_sex']; ?>" type="text" placeholder="性别" class="mui-input" readonly>
			</div>
			<div class="mui-input-row">
				<label>年龄</label>
				<input id='user_age' name="user_age" value="<?php echo $obj['user_age']; ?>" type="text" class="mui-input-clear mui-input" placeholder="年龄">
			</div>
			<div class="mui-input-row">
				<label>民族</label>
				<input id='race' name="race" value="<?php echo $obj['race']; ?>" type="text" class="mui-input-clear mui-input" placeholder="民族">
			</div>
			<div class="mui-input-row">
				<label>出生日期</label>
				<input id='user_birth' name="user_birth" value="<?php echo date('Y-m-d',$obj['user_birth']); ?>" type="text" class=" mui-input" placeholder="出生日期" readonly>
			</div>
			<div class="mui-input-row">
				<label>所属状态</label>
				<input id='tp_name' name="tp_name" type="text" value="<?php if(($obj['sid'] != 0&&$obj['back_4']==1)): ?>社会<?php else: ?>在校<?php endif; ?>" placeholder="所属状态" class="mui-input" readonly>
				<input type="hidden" name="tp" id="tp" value="<?php if(($obj['sid'] != 0&&$obj['back_4']==1)): ?>1<?php else: ?>0<?php endif; ?>">
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
			<div class="mui-input-row" id="school_id" <?php if(($obj['back_4']==1&&$obj['sid']==0)): ?>style="display:block;"<?php else: ?>style="display:none;"<?php endif; ?>>
				<label>学校名称</label>
				<input id='school_name' name="school_name" value="<?php echo $obj['sname']; ?>" type="text" class="mui-input-clear mui-input" placeholder="学校名称">
			</div>
			<div class="mui-input-row">
				<label>所属详细</label>
				<input id='unit' name="unit" value="<?php echo $obj['unit']; ?>" type="text" class="mui-input-clear mui-input" placeholder="请输入所属学校的院,系,级信息">
			</div>
			<div class="mui-input-row">
				<label>通讯地址</label>
				<input id='site' name="site" value="<?php echo $obj['site']; ?>" type="text" class="mui-input-clear mui-input" placeholder="通讯地址">
			</div>
			<div class="mui-input-row">
				<label>手机号码</label>
				<input id='tel' name="tel" value="<?php echo $obj['tel']; ?>" type="text" class="mui-input-clear mui-input" placeholder="手机号码">
			</div>
			<div class="mui-input-row">
				<label>指导老师</label>
				<input id='teacher' name="teacher" value="<?php echo $obj['teacher']; ?>" type="text" class="mui-input-clear mui-input" placeholder="指导老师">
			</div>
			<div class="mui-input-row">
				<label>邮政编码</label>
				<input id='postcode' name="postcode" value="<?php echo $obj['postcode']; ?>" type="text" class="mui-input-clear mui-input" placeholder="邮政编码">
			</div>
			<div class="mui-input-row" id="csry" style="<?php if($obj['type']==28): ?>display:none;<?php else: ?>display:block;<?php endif; ?>">
				<label><?php if($obj['type']==1): ?>参赛人员<?php elseif($obj['type']==27): ?>主创人员简介<?php else: ?>选手简介<?php endif; ?></label>
				<textarea id='esc' name="esc" type="text" value="<?php echo $obj['esc']; ?>" class="mui-input-clear mui-input" placeholder="<?php if($obj['type']==1): ?>参赛人员<?php elseif($obj['type']==27): ?>主创人员简介<?php else: ?>选手简介<?php endif; ?>"><?php echo $obj['esc']; ?></textarea>
			</div>
			<div class="mui-input-row">
				<label>身份证正面照</label>
				<label style="color:#777;font-size: 17px;width: 60%;">注：多人请将照片压缩成rar或zip格式上传</label>
				<div class="image-item">
					<div id="file_2" style="margin-left: 30%;">
					<!--<img class="image-up" src="/public/index/user/user_img.png">-->
					<?php if(strpos($obj['user_idcard_img'],'.zip')): ?><a style="color:#000;font-size: 17px;width: 60%;" >重新上传</a>
					<?php elseif(strpos($obj['user_idcard_img'],'.rar')): ?><a style="color:#000;font-size: 17px;width: 60%;" >重新上传</a>
					<?php else: ?><img style="width:200px" src="<?php echo $obj['user_idcard_img']; ?>"/>
					<?php endif; ?>
					</div>
					<input onchange="handleFiles(this,'file_2')" class="file" id="img" name="idcard_img" accept="image/*" type="file">
				</div>
			</div>
			<div class="mui-input-row" id="zpmc">
				<label><?php if($obj['type']==1): ?>节目名称<?php elseif($obj['type']==27): ?>电影名<?php elseif($obj['type']==28): ?>动漫创意作品名称<?php else: ?>作品名称<?php endif; ?></label>
				<input id='wname' name="wname" value="<?php echo $obj['wname']; ?>" type="text" class="mui-input-clear mui-input" placeholder="<?php if($obj['type']==1): ?>节目名称<?php elseif($obj['type']==27): ?>电影名<?php elseif($obj['type']==28): ?>动漫创意作品名称<?php else: ?>作品名称<?php endif; ?>">
			</div>
			<div class="mui-input-row" id="zpjj" style="<?php if($obj['type']==22): ?>display:none;<?php else: ?>display:block;<?php endif; ?>">
				<label><?php if($obj['type']==1): ?>节目简介<?php elseif($obj['type']==27): ?>剧本简介<?php elseif($obj['type']==31): ?>作品简介及创作思路<?php else: ?>作品简介<?php endif; ?></label>
				<textarea id='intro' name="intro" value="<?php echo $obj['intro']; ?>" type="text" class="mui-input-clear mui-input" placeholder="<?php if($obj['type']==1): ?>节目简介<?php elseif($obj['type']==27): ?>剧本简介<?php elseif($obj['type']==31): ?>作品简介及创作思路<?php else: ?>作品简介<?php endif; ?>"><?php echo $obj['intro']; ?></textarea>
			</div>
			<div class="mui-input-row">
				<label>推荐单位</label>
				<input id='rec' name="rec" value="<?php echo $obj['rec']; ?>" type="text" class="mui-input-clear mui-input" placeholder="推荐单位">
			</div>
			<div class="mui-input-row">
				<label>推荐人及电话</label>
				<input id='rectel' name="rectel" value="<?php echo $obj['rectel']; ?>" type="text" class="mui-input-clear mui-input" placeholder="推荐人及电话">
			</div>
			<div class="mui-input-row">
				<label>是否公开</label>
				<input id='so_open' name="so_open" type="text" value="<?php if($obj['so_open']==1): ?>是<?php else: ?>否<?php endif; ?>" placeholder="是否公开" class="mui-input" readonly>
			</div>
			<div class="mui-button-row">
				<button type="button" class="mui-btn mui-btn-primary" onclick="sbt();" >提交</button>
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

	<script src="__STATIC__/../wap/js/user_index_js.js"></script>
    <script type="text/javascript" charset="utf-8">
		
		var picker = new mui.PopPicker();
		var picker2 = new mui.PopPicker();
		var picker3 = new mui.PopPicker();
		//picker.setData(<?php echo $tlist; ?>);
		picker2.setData(<?php echo $mlist; ?>);
		picker3.setData(<?php echo $nlist; ?>);

		var pickerp = new mui.PopPicker();
		var pickerc = new mui.PopPicker();
		var pickers = new mui.PopPicker();
		pickerp.setData(<?php echo $plist; ?>);
		
		pickers.setData(<?php echo $slist; ?>);

	window.URL = window.URL || window.webkitURL;
	function handleFiles(obj,file_) {
		fileList = document.getElementById(file_);
			var files = obj.files;

			if(file_=="file_2")
			{
				var photoExt=obj.value.substr(obj.value.lastIndexOf(".")).toLowerCase();//获得文件后缀名
					if(photoExt=='.rar'||photoExt=='.zip'){
						fileList.innerHTML="";
						
						fileList.append("   已选择文件："+obj.value);
						return false;
					}
			}

			img = new Image();
			if(window.URL){	
				
				img.src = window.URL.createObjectURL(files[0]); //创建一个object URL，并不是你的本地路径
				img.className = "image-up";
				img.onload = function(e) {
					window.URL.revokeObjectURL(this.src); //图片加载后，释放object URL
				}
				if(fileList.firstElementChild){
					 //fileList.removeChild(fileList.firstElementChild);
					 fileList.innerHTML="";
				} 
				fileList.appendChild(img);
			}else if(window.FileReader){
				//opera不支持createObjectURL/revokeObjectURL方法。我们用FileReader对象来处理
				var reader = new FileReader();
				reader.readAsDataURL(files[0]);
				reader.onload = function(e){	
						img.src = this.result;
						img.className = "image-up";
						//fileList.removeChild(fileList.firstElementChild);
						fileList.innerHTML="";
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
				//fileList.removeChild(fileList.firstElementChild);
				fileList.innerHTML="";
				fileList.appendChild(img);
			}
	}



    </script>

	</body>

</html>