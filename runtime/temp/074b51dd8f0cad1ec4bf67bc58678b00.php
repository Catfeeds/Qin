<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:63:"D:\amp\UPUPW_K2.1_64\htdocs\QN/app/index\view\module\index.html";i:1493134157;s:67:"D:\amp\UPUPW_K2.1_64\htdocs\QN/app/index\view\public\ModelBase.html";i:1493095052;}*/ ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>
  社区论坛-<?php echo cookie('remark')['title']; ?></title>
  <meta name="keywords" content="<?php echo cookie('remark')['keyword']; ?>">
  <meta name="description" content="<?php echo cookie('remark')['description']; ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <link rel="stylesheet" type="text/css" href="__STATIC__/layui/css/layui.css" />
  <link rel="stylesheet" type="text/css" href="__STATIC__/css/global.css" />

<style type="text/css">
.box{
	margin-top: -15px;
	width: 100%;
	height: 400px;
	overflow: hidden;
	position: relative;
}

.box .list{
	width: 100%;
	height: 400px;
	overflow: hidden;
	position: absolute;
}

.btn{
	position: absolute;
	top: 50%;
	margin-top: -50px;
	width: 60px;
	height: 100px;
	line-height: 100px;
	font-size: 30px;
	color: white;
	text-decoration: none;
	text-align: center;
	background: rgba(0,255,0,.5);
	cursor: pointer;
}

.next{
	right: 0;
}
.banner_info{position: absolute;left: 0%;}
.banner_info,.banner_info li,.banner_info li img{height: 100%;}
.banner_info li{float: left;}
.banner_info li a{display:inline-block;width:100%;height:100%;}
#banner_list{width: 100px;position: absolute;height: 10px;left: 50%;top: 90%;margin-left:-50px;}
#banner_list li{width: 10px;height: 10px;border-radius: 50%;background:#fff;margin-right:10px;cursor: pointer;float: left;}
#banner_list li.banner_list_on{background: #606060;}
.fly-case-list li{position:relative;}
.fly-case-list li a img{height:180px;}
.fly-case-list li h2{position:absolute;left:10px;top:153px;width:239px;background:#000;opacity:0.5;}
.fly-case-list li h2 a{color:#fff;}
</style>


</head>
<body>


<div class="header">
  <div class="main">
    <a class="logo" href="/" title="Fly">个人中心</a>
	 
    <div class="nav">
      <a class="nav-this" href="<?php echo url('index/index'); ?>" >
        <i class="iconfont icon-ui"></i>首页
      </a>

	  <a class="nav-this" href="<?php echo url('module/index'); ?>" >
        <i class="iconfont icon-wenda"></i>社区论坛
      </a>

	  <a class="nav-this" href="<?php echo url('usercontrol/index'); ?>" >
        <i class="iconfont icon-ui"></i>用户中心
      </a>
      
    </div>   
    
    <div class="nav-user"> 
	<?php if(\think\Session::get('user_auth.id')==''): ?>
		<a class="unlogin" href="/index/login/index"><i class="iconfont icon-touxiang"></i></a>      
		<span><a href="/index/login/index">登入</a><a href="/index/user/reg">注册</a></span>
		<!--<p class="out-login">
        <a href="" onclick="layer.msg('正在通过QQ登入', {icon:16, shade: 0.1, time:0})" class="iconfont icon-qq" title="QQ登入"></a>
        <a href="" onclick="layer.msg('正在通过微博登入', {icon:16, shade: 0.1, time:0})" class="iconfont icon-weibo" title="微博登入"></a>
       </p>-->
	<?php else: ?>
      <!-- 登入后的状态 -->
      <a class="avatar" href="<?php echo url('usercontrol/index'); ?>">
        <img src="<?php echo \think\Session::get('user_auth.user_img'); ?>">
        <cite><?php echo \think\Session::get('user_auth.name'); ?></cite>
        <i></i>
      </a>
      <div class="nav">
        <a href="<?php echo url('login/logout'); ?>"><i class="iconfont icon-tuichu" style="top: 0; font-size: 22px;"></i>退了</a>
      </div>
		  <?php if((\think\Session::get('tiish') > 0)): ?>
			<a class="nav-message" href="<?php echo url('usercontrol/index'); ?>" title="您有<?php echo \think\Session::get('tiish'); ?>条未阅读的消息"><?php echo \think\Session::get('tiish'); ?></a>
		  <?php endif; endif; ?>
    </div>
  </div>
</div>


 
    <div class="main fly-user-main layui-clear" style="overflow: hidden;">

	<div class="box">

		<div id="scroll" class="list">
			<ul id="kk" class="banner_info" style="width:5425px;">
				<?php if(is_array($list_activity_back_1) || $list_activity_back_1 instanceof \think\Collection || $list_activity_back_1 instanceof \think\Paginator): $i = 0; $__LIST__ = $list_activity_back_1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					<li class="p"><a href="#"><img style="width:100%;height:400px;" src="<?php echo $vo['img']; ?>" alt="<?php echo $vo['title']; ?>" /></a></li>
				<?php endforeach; endif; else: echo "" ;endif; ?>

			</ul>
			<ul id="banner_list">
				<?php if(is_array($list_activity_back_1) || $list_activity_back_1 instanceof \think\Collection || $list_activity_back_1 instanceof \think\Paginator): $i = 0; $__LIST__ = $list_activity_back_1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					<li class="<?php if($i==1): ?>banner_list_on<?php endif; ?>"></li>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</div>
	
	</div>

      <div class="layui-tab layui-tab-brief">
        <ul class="layui-tab-title">
          <li class="layui-this">
            <a href="#">所有版块</a>
          </li>
        </ul>
      </div>

	 <form class="layui-form" action="<?php echo url('',['page'=>1]); ?>" method="post" id="fid">
		  <div class="layui-form-item">
			<div class="layui-breadcrumb" style="float:left;margin-top: 5px;">
				  <a href="<?php echo url('index/index'); ?>">首页</a>
				  <a><cite>社区首页</cite></a>
			</div>
			<div class="fly-search" style="float:right;width: 250px;">
				<i class="iconfont icon-sousuo"></i>
				<input type="text" name="title" required  lay-verify="required" placeholder="搜索关键字" autocomplete="off" class="layui-input">
				
			</div>
		 </div>
	 </form>
      <ul class="fly-case-list">
	  <?php if(is_array($list_si_json) || $list_si_json instanceof \think\Collection || $list_si_json instanceof \think\Paginator): $i = 0; $__LIST__ = $list_si_json;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <li data-id="<?php echo $vo['id']; ?>">
          <a class="fly-case-img" href="<?php echo url('module/series',['series_id'=>$vo['id']]); ?>" target="_blank">
          <img src="<?php echo $vo['img']; ?>" alt="<?php echo $vo['name']; ?>" /> 
          <cite class="layui-btn layui-btn-primary layui-btn-small">去围观</cite></a>
          <h2>
            <a href="<?php echo url('module/series',['series_id'=>$vo['id']]); ?>" target="_blank"><?php echo $vo['name']; ?></a>
          </h2>
          
        </li>
		<?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
      <div style="text-align: center;">
        
          <?php echo $list_si->render(); ?>
        
      </div>
  <div class="main layui-clear" style="margin-top: 20px;"> 
	<div style="float:left;width: 20%;"> 
    <div class="fly-panel leifeng-rank"> 
     <h3 class="fly-panel-title">热门社团 - TOP 20</h3> 
     <dl> 
	 <?php if(is_array($list_module_number) || $list_module_number instanceof \think\Collection || $list_module_number instanceof \think\Paginator): $i = 0; $__LIST__ = $list_module_number;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
      <dd style="width: 85px;height: 100px;"> 
       <a href="<?php echo url('module/module',['module_id'=>$vo['id']]); ?>"> 
			<img style="width: 100%;height: 80px;" src="<?php echo $vo['img']; ?>" /> <cite class="layui-icon">&#xe606;<?php echo $vo['art_number']; ?></cite><i><?php echo $vo['name']; ?></i>
	  </a> 
      </dd>
	  <?php endforeach; endif; else: echo "" ;endif; ?>
     </dl> 
    </div> 
   </div>

   <div class="wrap" style="width: 78%;margin-left: 20px;"> 
    <div class="/*content*/"> 
     <ul class="fly-panel fly-list"> 
      <?php if(is_array($list_articlem_number) || $list_articlem_number instanceof \think\Collection || $list_articlem_number instanceof \think\Paginator): $i = 0; $__LIST__ = $list_articlem_number;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
      <li class="fly-list-li">
		<a href="<?php echo url('user/index',['user_id'=>$vo['user_id']]); ?>" class="fly-list-avatar">
		<img src="<?php echo $vo['user_img']; ?>" alt="hotlinhao" /> </a> 
		<h2 class="fly-tip">
		<a href="<?php echo url('module/articlem',['art_id'=>$vo['id']]); ?>"><?php echo $vo['title']; ?></a>
		</h2> 
		<p> 
		<span><a href="<?php echo url('user/index',['user_id'=>$vo['user_id']]); ?>"><?php echo $vo['user_name']; ?></a></span>
		<span><?php echo date('Y-m-d',$vo['add_time']); ?></span>
		<span><?php echo $vo['module_name']; ?></span>
		<span class="fly-list-hint"><i class="iconfont" title="发帖"></i> <?php echo $vo['com_number']; ?> <i class="iconfont" title="人气"></i> <?php echo $vo['look']; ?> </span> 
		</p> 
		</li> 
      <?php endforeach; endif; else: echo "" ;endif; ?>
     </ul> 
    </div> 
   </div> 
   
  </div>
</div>


<div class="footer">
  <p><a href="/index/index">青年文化艺术节</a> 2017 &copy; <a href="#">qinguol.com</a></p>
  <p>
    <a href="#" target="_blank">官方授权</a>
    <a href="#" target="_blank">官方微博</a>
    <a href="#" target="_blank">微信公众号</a>
  </p>
</div>


<script type="text/javascript" src="__STATIC__/layui/layui.js"></script>
<script type="text/javascript" src="__STATIC__/layui/admin.js"></script>
<script type="text/javascript" src="__STATIC__/layui/jquery.js"></script>


<script src="__index__/js/common.js" type="text/javascript" charset="utf-8"></script>
<script>
layui.use(['form'], function(){
  var form = layui.form();

});
</script>


</body>
</html>
