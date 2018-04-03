<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:56:"D:\wwwroot\wchhui1\wwwroot/app/wap\view\index\index.html";i:1493890753;s:56:"D:\wwwroot\wchhui1\wwwroot/app/wap\view\Public\base.html";i:1493890759;}*/ ?>
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
		</style>
	</head>
	<body>
		<!-- 侧滑导航根容器 -->
		<div id="offCanvasWrapper" class="mui-off-canvas-wrap mui-draggable mui-scalable">
		  <!-- 菜单容器 -->
		  <aside id="offCanvasSide" class="mui-off-canvas-left">
			<div id="offCanvasSideScroll" class="mui-scroll-wrapper">
			  <div class="mui-scroll">
				<!-- 菜单具体展示内容 -->
				...
			  </div>
			</div>
		  </aside>
		  <!-- 主页面容器 -->
		  <div class="mui-inner-wrap">
			<!-- 主页面标题 -->
			<header class="mui-bar mui-bar-nav">
				
				<a class="mui-icon mui-icon-contact mui-pull-right" style="color:#929292"></a>
				<h1 class="mui-title">湖南省青年文化艺术节</h1>
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
				<a class="mui-tab-item <?php if(\think\Request::instance()->controller() == 'School'): ?>mui-active<?php endif; ?>" href="<?php echo url('school/index'); ?>">
					<span class="mui-icon mui-icon-paperplane"></span>
					<span class="mui-tab-label">校区集锦</span>
				</a>
				<a class="mui-tab-item <?php if(\think\Request::instance()->controller() == 'Bbs'): ?>mui-active<?php endif; ?>" href="<?php echo url('bbs/index'); ?>">
					<span class="mui-icon mui-icon-chatboxes"></span>
					<span class="mui-tab-label">社团活动</span>
				</a>
			</nav>
			<div id="offCanvasContentScroll" class="mui-content mui-scroll-wrapper">
			  <div class="mui-scroll">
				<!-- 主界面具体展示内容 -->
				
	<div class="mui-content">
		<!--静态图片-->
			<img id="img1" src="__IMG__/index.jpg"/>
			<div class="title">新闻资讯</div>
			<ul class="mui-table-view">
				<?php if(is_array($list_news) || $list_news instanceof \think\Collection || $list_news instanceof \think\Paginator): $i = 0; $__LIST__ = $list_news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
			    <li class="mui-table-view-cell mui-media">
			        <a href="<?php echo url('news/news_info',['news_id'=>$vo['id']]); ?>">
			            <img class="mui-media-object mui-pull-right" src="<?php echo $vo['img']; ?>">
			            <div class="mui-media-body">
			                <?php echo $vo['title']; ?>
			                <p class='mui-ellipsis'><?php echo $vo['esc']; ?></p>
			            </div>
			        </a>
			    </li>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
			
			<div class="title">校园集锦</div>
		    <ul class="mui-table-view mui-grid-view">
				<?php if(is_array($list_school) || $list_school instanceof \think\Collection || $list_school instanceof \think\Paginator): $i = 0; $__LIST__ = $list_school;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
		        <li class="mui-table-view-cell mui-media mui-col-xs-6">
		            <a href="<?php echo url('school/school_info',['school_id'=>$vo['id']]); ?>">
		                <img class="mui-media-object" src="<?php echo $vo['img']; ?>">
		                <div class="mui-media-body"><?php echo $vo['name']; ?></div>
					</a>
				</li>
				<?php endforeach; endif; else: echo "" ;endif; ?>
		    </ul>
		    
		    <div class="title">社区新帖</div>
			<ul class="mui-table-view">
				<?php if(is_array($list_articlem_number) || $list_articlem_number instanceof \think\Collection || $list_articlem_number instanceof \think\Paginator): $i = 0; $__LIST__ = $list_articlem_number;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
			    <li class="mui-table-view-cell mui-media">
			        <a href="javascript:;">
			            <img class="mui-media-object mui-pull-left" src="<?php echo $vo['user_img']; ?>">
			            <div class="mui-media-body">
			                <?php echo $vo['title']; ?>
			                <p class='mui-ellipsis'>
								<span style="padding-right: 15px;"><?php echo $vo['user_name']; ?></span>
								<span style="padding-right: 15px;"><?php echo date('Y-m-d',$vo['add_time']); ?></span>
								<span style="padding-right: 15px;"><?php echo $vo['module_name']; ?></span>
							</p>
			            </div>
			        </a>
			    </li>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
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
			//主界面容器
			var offCanvasWrapper = mui('#offCanvasWrapper');
			var offCanvasInner = offCanvasWrapper[0].querySelector('.mui-inner-wrap');
			offCanvasInner.addEventListener('drag', function(event) {
				event.stopPropagation();
			});
			
			
			mui(".mui-table-view").on('tap','a',function(){
			  var href = this.getAttribute("href");
			  location.href=href;
			})
			
			mui(".mui-bar-tab").on('tap','a',function(){
			  var href = this.getAttribute("href");
			  location.href=href;
			})
		</script>
		


	</body>

</html>