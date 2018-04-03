<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:71:"D:\amp\UPUPW_K2.1_64\htdocs\QN/app/index\view\usercontrol\user_pwd.html";i:1492270117;s:67:"D:\amp\UPUPW_K2.1_64\htdocs\QN/app/index\view\public\ModelBase.html";i:1492486730;}*/ ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>用户中心</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="keywords" content="">
  <meta name="description" content="">

  <link rel="stylesheet" type="text/css" href="__STATIC__/layui/css/layui.css" />
  <link rel="stylesheet" type="text/css" href="__STATIC__/css/global.css" />




</head>
<body>

<div class="header">
  <div class="main">
    <a class="logo" href="/" title="Fly">个人中心</a>
	 
    <div class="nav">
      <a class="<?php if($pg==1): ?>nav-this<?php endif; ?>" href="<?php echo url('usercontrol/index'); ?>">
        <i class="iconfont icon-wenda"></i>访问
      </a>
      <a class="<?php if($pg==2): ?>nav-this<?php endif; ?>" href="<?php echo url('usercontrol/user_info'); ?>" >
        <i class="iconfont icon-ui"></i>设置
      </a>
    </div>
	
    
    <div class="nav-user"> 
	<?php if(\think\Session::get('user_auth.id')==''): ?>
		<a class="unlogin" href="/user/login/"><i class="iconfont icon-touxiang"></i></a>      
		<span><a href="/login/index">登入</a><a href="/user/reg">注册</a></span>
	<?php else: ?>
      <!-- 登入后的状态 -->
      <a class="avatar" href="#">
        <img src="http://tp4.sinaimg.cn/1345566427/180/5730976522/0">
        <cite><?php echo \think\Session::get('user_auth.name'); ?></cite>
        <i></i>
      </a>
      <div class="nav">
        <a href="<?php echo url('login/logout'); ?>"><i class="iconfont icon-tuichu" style="top: 0; font-size: 22px;"></i>退了</a>
      </div>
      <?php endif; ?>
    </div>
  </div>
</div>

<div class="main fly-user-main layui-clear">
  <ul class="layui-nav layui-nav-tree layui-inline" lay-filter="user">
 
    <li class="layui-nav-item">
      <a href="<?php echo url('user/index'); ?>">
        <i class="layui-icon">&#xe609;</i>
        我的主页
      </a>
    </li>
    <li class="layui-nav-item <?php if($pg==1): ?>layui-this<?php endif; ?>">
      <a href="<?php echo url('usercontrol/index'); ?>">
        <i class="layui-icon">&#xe612;</i>
        用户中心
      </a>
    </li>
    <li class="layui-nav-item <?php if($pg==2): ?>layui-this<?php endif; ?>">
      <a href="<?php echo url('usercontrol/user_info'); ?>">
        <i class="layui-icon">&#xe620;</i>
        基本设置
      </a>
    </li>
	<li class="layui-nav-item <?php if($pg==3): ?>layui-this<?php endif; ?>">
      <a href="<?php echo url('usercontrol/player'); ?>">
        <i class="layui-icon">&#xe629;</i>
        报名信息
      </a>
    </li>
	<li class="layui-nav-item <?php if($pg==4): ?>layui-this<?php endif; ?>">
      <a href="<?php echo url('usercontrol/message'); ?>">
        <i class="layui-icon">&#xe611;</i>
        通知信息
      </a>
    </li>

  </ul>

  
  <div class="site-tree-mobile layui-hide">
    <i class="layui-icon">&#xe602;</i>
  </div>
  <div class="site-mobile-shade"></div>
 
  <div class="fly-panel fly-panel-user" pad20>

  

    <div class="layui-tab layui-tab-brief" lay-filter="user">

      <ul class="layui-tab-title" id="LAY_mine">
        <li data-type="mine-jie" lay-id="index"><a href="<?php echo url('usercontrol/user_info'); ?>">基本信息</a></li>
		<li data-type="mine-jie" lay-id="index" class="layui-this">修改密码</li>
      </ul>

          <form class="layui-form layui-form-pane"  style="padding: 20px 0;" action="" method="post" id="fid" enctype="multipart/form-data">
			  
			  <div class="layui-form-item">
				<label class="layui-form-label">旧密码</label>
				<div class="layui-input-block">
				  <input type="password" name="jpwd" required lay-verify="required" placeholder="请输入密码"  autocomplete="off" class="layui-input">
				</div>
			  </div>
			  <div class="layui-form-item">
				<label class="layui-form-label">新密码</label>
				<div class="layui-input-block">
				  <input type="password" name="pwd" required lay-verify="required" placeholder="请输入新密码"  autocomplete="off" class="layui-input">
				</div>
			  </div>
			  <div class="layui-form-item">
				<label class="layui-form-label">确认密码</label>
				<div class="layui-input-block">
				  <input type="password" name="pwds" required lay-verify="required" placeholder="请输入新密码"  autocomplete="off" class="layui-input">
				</div>
			  </div>
			  
              <div class="layui-form-item">
                <button class="layui-btn"  lay-submit lay-filter="formDemo" lay-submit>确认修改</button>
              </div>
            </form>
          </div>
          
  
    </div>

  </div>
</div>

<div class="footer">

  <p><a href="/index/index">个人中心</a> 2017 &copy; <a href="http://www.layui.com/">layui.com</a></p>
  <p>
    <a href="http://fly.layui.com/auth/get" target="_blank">产品授权</a>
    <a href="http://fly.layui.com/jie/8157.html" target="_blank">获取Fly社区模版</a>
    <a href="http://fly.layui.com/jie/2461.html" target="_blank">微信公众号</a>
  </p>
  
</div>

<script type="text/javascript" src="__STATIC__/layui/layui.js"></script>
<script type="text/javascript" src="__STATIC__/layui/admin.js"></script>
<script type="text/javascript" src="__STATIC__/layui/jquery.js"></script>


<script>
layui.use('form', function(){
  var form = layui.form();

  //监听提交
  form.on('submit(formDemo)', function(data){

	  if(data.field['pwd']!=data.field['pwds']){
		layer.msg("两次密码不一致");
		return false;
	  }

  });
});
</script>


</body>
</html>
