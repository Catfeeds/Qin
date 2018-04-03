<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:67:"D:\amp\UPUPW_K2.1_64\htdocs\QN/app/index\view\school\news_info.html";i:1492857677;s:62:"D:\amp\UPUPW_K2.1_64\htdocs\QN/app/index\view\public\Base.html";i:1492852890;}*/ ?>
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
			.nav li.cli{color: #fff;}
		  </style>
	
	<style>
		.acti{padding-top: 0;padding-right: 0;}
		.journalism_tit{height: 58px;line-height: 58px;font-size: 20px;}
		.new_banner{width: 734px;height: 230px;margin-bottom: 25px;}
		.new_banner img{width: 100%;height: 100%;}
		.eve_reg{width: 625px;overflow:hidden;line-height: 26px;}
		
		.acti_cen_lef_list{width: 625px;margin-bottom: 60px;}
		.acti_cen_lef_list li a{width: 600px;}
		.acti_botm_tit{text-align: left;color: #207b4f;height: 47px;}
		
		.bri_int{width: 100%;overflow: hidden;}
		.bri_int li{height: 125px;border-bottom: 1px dashed #C4C0C1;padding-bottom: 27px;padding-top: 36px;}
		.bri_int li:first-child{padding-top: 0;}
		.bri_int li:last-child{border: 0;}
		.bri_int_lef{width: 585px;float: left;}
		.bri_int_lef_tit{height: 72px;line-height: 22px;}
		.bri_int_lef_t{color: #848484;height:26px;line-height:26px;padding-left: 15px;width: 550px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;font-size: 14px;background: url(../img/a01.png) no-repeat left center;}
		.bri_int_rig{width: 218px;height: 125px;float: right;}
		.bri_int_rig img{width: 100%;height: 100%;}
		/*征集活动*/
		.col_act{padding: 19px 29px;overflow: hidden;background: #F6F6F6;border-radius: 10px;}
		.col_act_tit{height: 49px;line-height: 49px;border-bottom: 1px solid #C6C6C6;text-align: center;font-size: 18px;font-weight: bold;}
		.seeding_texttatle{line-height: 25px;text-align: center;font-size: 14px;margin-bottom: 25px;}
		.seeding_texttatle span{margin-right: 40px;color: #8e8e8e;}
		.seeding_texttatle span:last-child{margin: 0;}
		.seeding_textdiv{line-height: 25px;color: #8e8e8e;margin: 10px 0;font-size: 14px;}
		.col_act_img{padding: 0 42px;overflow: hidden;margin-bottom: 5px;}
		.col_act_img img{width: 100%;height: auto;}
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
				<a href="<?php echo url('module/index'); ?>"><li class="<?php if(session('index_nav')=='module'): ?>cli<?php endif; ?>" target="_blank">社团活动</li></a>
				<a href="<?php echo url('login/index'); ?>"><p><?php if(\think\Session::get('user_auth.id')!=null): ?><?php echo \think\Session::get('user_auth.name'); else: ?>注册/登陆<?php endif; ?></p></a>
			</ul>
		
		

			<div class="box_shux">
				<ul class="activity">
					<li onclick="Javascript:location.href='<?php echo url('school/index'); ?>';">醉美校园</li>
					<li class="cli" onclick="Javascript:location.href='<?php echo url('school/index_news'); ?>';">校区时讯</li>
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
						<p>+ More</p>
					</ul>
					<ul class="sign_up_statistics" style="display: none;">
						<?php if(is_array($list_reg_user) || $list_reg_user instanceof \think\Collection || $list_reg_user instanceof \think\Paginator): $i = 0; $__LIST__ = $list_reg_user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
							<li><a><span><?php echo $i; ?>、</span><b><?php echo $vo['pname']; ?></b><strong><?php echo $vo['ct']; ?>人</strong></a></li>
						<?php endforeach; endif; else: echo "" ;endif; ?>
						<p>+ More</p>
					</ul>
					<ul class="sign_up_statistics" style="display: none;">
						<?php if(is_array($list_player_back_3) || $list_player_back_3 instanceof \think\Collection || $list_player_back_3 instanceof \think\Paginator): $i = 0; $__LIST__ = $list_player_back_3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
							<li><a href="<?php echo url('user/index',['user_id'=>$vo['id']]); ?>"><span><?php echo $i; ?>、</span><b><?php echo $vo['user_name']; ?></b><strong><?php echo $vo['back_3']; ?>票</strong></a></li>
						<?php endforeach; endif; else: echo "" ;endif; ?>
						<p>+ More</p>
					</ul>
				</div>
			</div>
		
	</div>

	<div class="box_rig rig">
		<div class="acti">
			<div class="journalism_tit"><span>LAT</span>ALTEST NEWSLETTER 最新时讯</div>
			<div class="new_banner">
				<ul id="kk" class="banner_info" style="width: 2936px;">
				<?php if(is_array($list_news_t) || $list_news_t instanceof \think\Collection || $list_news_t instanceof \think\Paginator): $i = 0; $__LIST__ = $list_news_t;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					<a href="<?php echo url('news/news_info',['news_id'=>$vo['id']]); ?>"><li><img src="<?php echo $vo['img']; ?>" /></li></a>
				<?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
				<ul id="banner_list">
				<?php if(is_array($list_news_t) || $list_news_t instanceof \think\Collection || $list_news_t instanceof \think\Paginator): $i = 0; $__LIST__ = $list_news_t;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					<li class="<?php if($i==1): ?>banner_list_on<?php endif; ?>"></li>
				<?php endforeach; endif; else: echo "" ;endif; ?>
					
				</ul>
			</div>
			<div class="eve_reg">湖南省青年文化艺术节湖南省青年文化艺术节湖南省青年文化艺术节湖南省青年文化艺术节湖南省青年文化艺术节湖南省青年文化艺术节湖南省青年文化艺术节湖节湖南省青年文化艺术节湖南省青年文化艺术节湖南省青年文化艺术节</div>
			<ul class="acti_cen_lef_list">
				<?php if(is_array($list_news) || $list_news instanceof \think\Collection || $list_news instanceof \think\Paginator): $i = 0; $__LIST__ = $list_news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
				<li><a class="lef" href="<?php echo url('school/News_info',['news_id'=>$vo['id']]); ?>"><?php echo date('Y-m-d',$vo['add_time']); ?>&nbsp;&nbsp;<?php echo $vo['title']; ?></a></li>
				<li>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
			<div class="col_act">
				<div class="col_act_tit"><?php echo $obj['title']; ?></div>
				<div class="seeding_texttatle"><span>文章来源：<?php echo $obj['edit']; ?></span><span>添加时间：<?php echo date('Y-m-d',$obj['add_time']); ?></span><span>所属分类：<?php echo $obj['maxtype_name']; ?></span></div>
					
					<?php echo $obj['content']; ?>
				</div>
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
