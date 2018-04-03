<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:66:"D:\amp\UPUPW_K2.1_64\htdocs\QN/app/index\view\live\index_user.html";i:1492850516;s:62:"D:\amp\UPUPW_K2.1_64\htdocs\QN/app/index\view\public\Base.html";i:1492851431;}*/ ?>
﻿<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>
		  青年文化艺术节-<?php echo cookie('remark')['title']; ?></title>
		  <meta name="keywords" content="<?php echo cookie('remark')['keyword']; ?>">
		  <meta name="description" content="<?php echo cookie('remark')['description']; ?>">
		  <link rel="stylesheet" type="text/css" href="__index__/css/index.css"/>
		  <style>
			.box_shux{min-height: 600px;}
			.col_act{min-height: 600px;}

			.rig paging_list{padding-right: 20px;}
		  </style>
	
<link rel="stylesheet" type="text/css" href="__index__/css/xqdly.css"/>

	<style>
		.acti{padding: 28px 40px 42px;background: #1e1e1e;width: 738px;overflow: hidden;}
		.journalism_tit{height: 52px;color: #fff;line-height: 52px;font-size: 24px;}
		.journalism_tit span{color: #ff0;}
		.new_banner{height: 546px;margin-bottom: 24px;}
		.sch_pre{width: 100%;height: 92px;margin-bottom: 24px;}
		.sch_pre li{width: 182px;height: 100%;margin-right: 2px;float: left;}
		.sch_pre li img,.bri_int li img{width: 100%;height: 100%;}
		.sch_pre li:last-child{margin-right: 0;}
		.eve_reg{color: #fff;color: #CDCDCD;line-height: 20px;margin-bottom: 18px;font-size: 14px;}
		.acti_botm_tit{height: 30px;line-height: 30px;border-bottom: 1px solid #a5a5a5;color: #ff0;text-align: left;margin-bottom: 18px;}
		.bri_int li{width: 243px;height: 143px;float: left;margin: 0 3px 3px 0;}
		/*参赛选手*/
		.acti_botm_list{overflow: hidden;}
		.acti_botm_list li,.acti_botm_list li dl{width: 134px;height: 170px;float: left;color: #fff;}
		.acti_botm_list li{margin: 16px 12px 0 0;}
		.acti_botm_list li dl dt{height: 133px;}
		.acti_botm_list li dl dt img{width: 100%;height: 100%;}
		.acti_botm_list li dl dd{height: 24px;line-height: 24px;font-size: 12px;}
		.acti_botm_list li dl dd strong{width: 45px;color: #f00;font-size: 12px;}
		.acti_botm_list li dl dd b{width: 88px;}
		.acti_botm_list li.clear_mrig{margin-right: 0;}
	</style>

	</head>
	<body>
		<div class="inde_box ">
			<div class="inde_box1"></div>
			<div class="inde_box2"></div>
			<div class="sign_up"></div>
			<div class="box">
		<div class="box_lef lef">
			<div class="log"></div>
		
			<ul class="nav" style="position: relative;z-index: 2;">
				<a href="<?php echo url('index/index'); ?>"><li class="<?php if(session('index_nav')=='index'): ?>cli<?php endif; ?>">网站首页</li></a>
				<a href="<?php echo url('news/index'); ?>"><li class="<?php if(session('index_nav')=='news'): ?>cli<?php endif; ?>">新闻资讯</li></a>
				<a href="<?php echo url('live/index'); ?>"><li class="<?php if(session('index_nav')=='live'): ?>cli<?php endif; ?>">赛事直播</li></a>
				<a href="<?php echo url('school/index'); ?>"><li class="<?php if(session('index_nav')=='school'): ?>cli<?php endif; ?>">校区集锦</li></a>
				<a href="<?php echo url('module/index'); ?>"><li class="<?php if(session('index_nav')=='module'): ?>cli<?php endif; ?>">社团活动</li></a>
				<a href="<?php echo url('login/index'); ?>"><p><?php if(\think\Session::get('user_auth.id')!=null): ?><?php echo \think\Session::get('user_auth.name'); else: ?>注册/登陆<?php endif; ?></p></a>
			</ul>
		
		
		<div class="box_shux">
			<ul class="activity">

				<li onclick="Javascript:location.href='<?php echo url('live/index'); ?>';">赛事直播</li>
				<li class="cli" onclick="Javascript:location.href='<?php echo url('live/index_news'); ?>';">选手直播</li>
				
			</ul>
			<div class="sign_up1">
				<div class="sign_up_hed">大赛报名实时统计</div>
				<ul class="sign_up_nav">
					<li class="cli">校区</li>
					<li style="width: 85px;border-right: 1px solid #787878;">地区</li>
					<li style="border-left: 1px solid #ADADAD;">热门</li>
				</ul>
				<ul class="sign_up_statistics">
					<?php if(is_array($list_school_user) || $list_school_user instanceof \think\Collection || $list_school_user instanceof \think\Paginator): $i = 0; $__LIST__ = $list_school_user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						<li><a><span><?php echo $i; ?>、</span><b><?php echo $vo['sname']; ?></b><strong><?php echo $vo['ct']; ?>人</strong></a></li>
					<?php endforeach; endif; else: echo "" ;endif; ?>
					<p>+ More 查看完整排名...</p>
				</ul>
				<ul class="sign_up_statistics" style="display: none;">
					<?php if(is_array($list_reg_user) || $list_reg_user instanceof \think\Collection || $list_reg_user instanceof \think\Paginator): $i = 0; $__LIST__ = $list_reg_user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						<li><a><span><?php echo $i; ?>、</span><b><?php echo $vo['pname']; ?></b><strong><?php echo $vo['ct']; ?>人</strong></a></li>
					<?php endforeach; endif; else: echo "" ;endif; ?>
					<p>+ More 查看完整排名...</p>
				</ul>
				<ul class="sign_up_statistics" style="display: none;">
					<?php if(is_array($list_player_back_3) || $list_player_back_3 instanceof \think\Collection || $list_player_back_3 instanceof \think\Paginator): $i = 0; $__LIST__ = $list_player_back_3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
							<li><a href="<?php echo url('user/index',['user_id'=>$vo['id']]); ?>"><span><?php echo $i; ?>、</span><b><?php echo $vo['user_name']; ?></b><strong><?php echo $vo['back_3']; ?>票</strong></a></li>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					<p>+ More 查看完整排名...</p>
				</ul>
			</div>
		</div>
	
	</div>

	<div class="box_rig rig">
		<div class="acti">
			<div class="journalism_tit">PLA</span>EYER EVENTS 选手秀场 / 赛事直播</div>
			<div class="new_banner"><img src="__index__/img/016.png"/></div>
			<div class="eve_reg">湖南大学湖南大学湖南大学湖南大学湖南大学湖南大学湖南大学湖南大学湖南大学湖南大学湖南大学湖南大学湖南大学湖南大学湖南大学湖南大学湖南大学湖南大学湖南大学湖南大学湖南大学湖南大学湖南大学湖南大学湖南大学湖南大学湖南大学湖南大学湖南大学湖南大学湖南大学湖南大学湖南大学湖南大学湖南大学湖南大学湖南大学湖南大学湖南大学湖南大学</div>
			<div class="journalism_tit">
				<span class="lef">选手直播</span>
					<?php echo $list_user_live->render(); ?>
			</div>
			<ul class="acti_botm_list">
				<?php if(is_array($list_user_live) || $list_user_live instanceof \think\Collection || $list_user_live instanceof \think\Paginator): $i = 0; $__LIST__ = $list_user_live;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
				<li>
					<dl>
						<dt><img src="<?php echo $vo['img']; ?>"/></dt>
						<dd><strong class="icon lef">&#xe60f;<?php echo $vo['back_3']; ?></strong><b class="rig"><?php echo $vo['user_name']; ?></b></dd>
					</dl>
				</li>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</div>
	</div>
</div>



	<div class="foot">
		<div class="foot_box">
			<div class="QR_code lef">
				<img src="__index__/img/02.png"/>
			</div>
			<div class="foot_list rig">
				<p>主办：共青团湖南省委、湖南省教育厅、湖南省文化厅、湖南省青年联合会、湖南省学生联合会</p>
				<p>主办：共青团湖南省委、湖南省教育厅、湖南省文化厅、湖南省青年联合会、湖南省学生联合会</p>
				
			</div>
		</div>
	</div>

</div>

<script src="__index__/js/jquery-1.8.3.js" type="text/javascript" charset="utf-8"></script>
<script src="__index__/js/common.js" type="text/javascript" charset="utf-8"></script>


	<script>
		$(function(){
				var dir_act = $(".dir_act_rig_lef li");
				$(".dir_act_rig_lef li").click(function(){
					$(".dir_act_rig_lef li").removeClass("cilc");
					$(this).addClass("cilc").siblings().removeClass("cilc");
					$(".dir_exhibition img").attr("src",$(this).find("img").attr("src"))
					$(".dir_act_lef li").eq($(this).attr("index")).addClass("cli").siblings().removeClass("cli")
					console.log($(".dir_act_lef .cli").index());
				})
				$(".ass_acti_list li").click(function(){
					$(".ass_acti_rig.rig").css("display","none")
					$(".ass_acti_rig.rig").eq($(this).index()).css("display","block");
				})
				$(".dir_act_lef li").click(function(){
					$(this).addClass("cli").siblings().removeClass("cli");
						$(".dir_act_rig_lef li").removeClass("cilc");
						var kk = $(".dir_act_rig_lef li").eq($(this).index());
						$(".dir_exhibition img").attr("src",kk.addClass("cilc").find("img").attr("src"))
				})
			})
	</script>

	</body>
</html>
