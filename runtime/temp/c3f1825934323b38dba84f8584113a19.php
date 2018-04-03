<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:64:"D:\amp\UPUPW_K2.1_64\htdocs\QN/app/index\view\module\module.html";i:1493134923;s:67:"D:\amp\UPUPW_K2.1_64\htdocs\QN/app/index\view\public\ModelBase.html";i:1493095052;}*/ ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>
  <?php echo $obj['name']; ?>-<?php echo cookie('remark')['title']; ?></title>
  <meta name="keywords" content="<?php echo cookie('remark')['keyword']; ?>">
  <meta name="description" content="<?php echo cookie('remark')['description']; ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <link rel="stylesheet" type="text/css" href="__STATIC__/layui/css/layui.css" />
  <link rel="stylesheet" type="text/css" href="__STATIC__/css/global.css" />

<style>
	.inf{overflow: hidden;padding-bottom: 20px;margin-bottom: 20px;border-bottom: 1px solid #ccc;}
	.inf_lef{width: 130px;height: 130px;float:left;}
	.inf_lef img{width:100%;height:100%;}
	.inf_rig{width: 500px;margin-left: 20px;float:left;}
	.inf_rig li{height: 30px;}
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


 
<div class="main layui-clear">
<div class="inf">
				<div class="inf_lef lef"><img src="<?php echo $obj['img']; ?>"/></div>
				<ul class="inf_rig lef">
					<li>名称：<?php echo $obj['name']; ?></li>
					<li>简介：<?php echo $obj['esc']; ?></li>
					<li>地区：<?php echo $obj['pname'].$obj['cname'].$obj['sname']; ?></li>
				</ul>
			</div>	
  <div class="wrap">
    <div class="content" style="margin-right:0">
      <div class="fly-tab">
        <span>
          <a href="<?php echo url('module/module',['module_id'=>$obj['id']]); ?>" class="<?php if($px==1): ?>tab-this<?php endif; ?>">全部</a>
          <a href="<?php echo url('module/module',['module_id'=>$obj['id'],'heat'=>1]); ?>" class="<?php if($px==2): ?>tab-this<?php endif; ?>">热帖</a>
          <a href="<?php echo url('module/module',['module_id'=>$obj['id'],'elite'=>1]); ?>" class="<?php if($px==3): ?>tab-this<?php endif; ?>">精帖</a>
          <a href="<?php echo url('module/module',['module_id'=>$obj['id'],'my'=>1]); ?>" class="<?php if($px==4): ?>tab-this<?php endif; ?>">我的帖</a>
        </span>
        <form action="<?php echo url('',['page'=>1]); ?>" method="post" id="fid" class="fly-search">
		  <input type="hidden" name="module_id" value="<?php echo $obj['id']; ?>" />
          <i class="iconfont icon-sousuo"></i>
          <input class="layui-input" autocomplete="off" placeholder="搜索关键字" type="text" name="title">
        </form>
        <a href="<?php echo url('module/articlem_add',['module_id'=>$obj['id']]); ?>" class="layui-btn jie-add">我要发帖</a>
      </div>

      <ul class="fly-list">
		<?php if(is_array($list_art_m) || $list_art_m instanceof \think\Collection || $list_art_m instanceof \think\Paginator): $i = 0; $__LIST__ = $list_art_m;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <li class="fly-list-li">
          <a href="<?php echo url('user/index',['user_id'=>$vo['user_id']]); ?>" target="_blank" class="fly-list-avatar">
            <img src="<?php echo $vo['user_img']; ?>" alt="<?php echo $vo['user_name']; ?>">
          </a>
          <h2 class="fly-tip">
            <a href="<?php echo url('module/articlem',['art_id'=>$vo['id']]); ?>" target="_blank"><?php echo $vo['title']; ?></a>
			<?php if($vo['back_3'] == 1): ?><span class="fly-tip-stick">置顶</span><?php endif; if($vo['back_4'] == 1): ?><span class="fly-tip-jing">精帖</span><?php endif; ?>
          </h2>
          <p>
            <span><a href="<?php echo url('user/index',['user_id'=>$vo['user_id']]); ?>" target="_blank"><?php echo $vo['user_name']; ?></a></span>
            <span></span>
            <span><?php echo date('Y-m-d',$vo['add_time']); ?></span>
            <span class="fly-list-hint"> 
              <i class="iconfont" title="回答">&#xe60c;</i><?php echo $vo['com_number']; ?>
              <i class="iconfont" title="人气">&#xe60b;</i> <?php echo $vo['p_number']; ?>
            </span>
          </p>
        </li>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        
      </ul>
      
      <!-- <div class="fly-none">并无相关数据</div> -->
    
      <div style="text-align: center">
        <?php echo $list_art_m->render(); ?>
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


<script>

</script>


</body>
</html>
