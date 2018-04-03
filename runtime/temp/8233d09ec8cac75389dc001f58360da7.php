<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:58:"D:\amp\UPUPW_K2.1_64\htdocs\QN/app/index\view\adm\add.html";i:1490069103;s:62:"D:\amp\UPUPW_K2.1_64\htdocs\QN/app/index\view\public\base.html";i:1489992151;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <block name="title"><title>Lua文件管理系统</title></block>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" type="text/css" href="__STATIC__/layui/css/layui.css" />
	<link rel="stylesheet" type="text/css" href="__CSS__/admin.css" />
</head>
<body id="admin">

<div class="layui-layout-admin">
    <div class="layui-header">
        <!-- logo -->
        <a href="<?php echo url('index/index'); ?>" class="logo layui-left"><img src="" alt="">Lua文件管理系统</a>

        <!-- 个人 -->
        <div href="#!" class="layui-right user">
            <!-- 头像 -->
            <a href="#!" class="user-avatar">
                <img src="__IMG__/avatar.jpg" alt="" class="layui-circle">
            </a>
            <!-- 头像下面显示 -->
            <div class="user-nav">
                <div class="user-nav-item">
                    <a href="<?php echo url('login/logout'); ?>">
                        <i class="layui-icon" style="font-size: 12px;">&#xe623;</i>
                        退出
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="layui-side">
		<ul class="layui-nav layui-nav-tree">
			
			<li class="layui-nav-item layui-nav-itemed">
			<a href="javascript:;">管理员</a>
			<dl class="layui-nav-child">
			  <dd><a href="<?php echo url('adm/index'); ?>">管理员列表</a></dd>
			</dl>
		  </li>
		  <li class="layui-nav-item">
			<a href="javascript:;">文件管理</a>
			<dl class="layui-nav-child">
			  <dd><a href="<?php echo url('txt/index'); ?>">文件列表</a></dd>
			</dl>
		  </li>
		  <li class="layui-nav-item">
			<a href="javascript:;">系统管理</a>
			<dl class="layui-nav-child">
			  <dd><a href="<?php echo url('login/logout'); ?>">退出系统</a></dd>
			</dl>
		  </li>
		</ul>
    </div>
	
    <div class="layui-body">
	
<div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
  <ul class="layui-tab-title">
    <li onclick="javascript:window.location.href='<?php echo url('adm/index'); ?>'">管理员列表</li>
    <li class="layui-this">添加管理员</li>
  </ul>
</div> 
<form class="layui-form" action="" method="post">
  <div class="layui-form-item" style="width:600px">
    <label class="layui-form-label">账号</label>
    <div class="layui-input-block">
      <input type="text" name="aname" lay-filter="aname" required lay-verify="required" placeholder="请输入账号" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item" style="width:600px">
    <label class="layui-form-label">密码</label>
    <div class="layui-input-inline">
      <input type="password" name="pwd" required lay-verify="required" placeholder="请输入密码" autocomplete="off" class="layui-input">
    </div>
    <div class="layui-form-mid layui-word-aux">6-18个字符</div>
  </div>
  <div class="layui-form-item" style="width:600px">
    <label class="layui-form-label">确认密码</label>
    <div class="layui-input-inline">
      <input type="password" name="pwds" required lay-verify="required" placeholder="请确认密码" autocomplete="off" class="layui-input">
    </div>
    <div class="layui-form-mid layui-word-aux"></div>
  </div>
  <div class="layui-form-item" style="width:600px">
    <label class="layui-form-label">管理员名称</label>
    <div class="layui-input-block">
      <input type="text" name="nickname" required  lay-verify="required" placeholder="请输入名称" autocomplete="off" class="layui-input">
    </div>
  </div>
   <div class="layui-form-item" style="width:600px">
    <label class="layui-form-label">联系方式</label>
    <div class="layui-input-block">
	<div class="layui-input-inline">
      <input type="text" name="tel" lay-verify="phone" placeholder="请输入电话号码" autocomplete="off" class="layui-input">
	  </div>
	  <div class="layui-form-mid layui-word-aux">*</div>
    </div>
  </div>
  <div class="layui-form-item" style="width:600px">
    <label class="layui-form-label">选择地区</label>
    <div class="layui-input-block">
      <select name="city" lay-verify="required" style="width:200px;">
		 <option value="">请选择</option>
      </select>
	  <select name="city" lay-verify="required" style="width:200px;">
		 <option value="">请选择</option>
      </select>
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">启用</label>
    <div class="layui-input-block">
      <input type="checkbox" name="switch" checked lay-skin="switch">
    </div>
  </div>
 
  <div class="layui-form-item layui-form-text" style="display:none">
    <label class="layui-form-label">文本域</label>
    <div class="layui-input-block">
      <textarea name="desc" placeholder="请输入内容" class="layui-textarea"></textarea>
    </div>
  </div>
  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
    </div>
  </div>
</form>


    </div>
	
    <div class="layui-footer">
        <div class="layui-main">
            当前登录账号：  <?php echo \think\Session::get('admin_auth.nickname'); ?> 
        </div>
    </div>

</div>

<script type="text/javascript" src="__STATIC__/layui/layui.js"></script>
<script type="text/javascript" src="__JS__/admin.js"></script>

<script>
//Demo
layui.use(['form', 'layer'], function(){
  var $ = layui.jquery, form = layui.form(), layer = layui.layer;
  //监听提交
  form.on('submit(formDemo)', function(data){
	  if(data.field['pwd']!=data.field['pwds']){
		layer.msg("两次密码不一致");
		return false;
	  }

	  $.ajax({
		url:"<?php echo url('adm/cf'); ?>",
		type:"post",
		dataType:"json",
		data:{aname:data.field['aname']},
		success:function(dd){
			if(dd.e>0)
			{
				layer.msg("账号已存在");
				return false;
			}
		}
	  });

  });
});
</script>

</body>
</html>