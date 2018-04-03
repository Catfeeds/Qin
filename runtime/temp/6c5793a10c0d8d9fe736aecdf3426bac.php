<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:64:"D:\amp\UPUPW_K2.1_64\htdocs\QN/app/admin\view\module\art_xx.html";i:1492499774;s:62:"D:\amp\UPUPW_K2.1_64\htdocs\QN/app/admin\view\public\base.html";i:1493099283;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <block name="title"><title>后台管理系统</title></block>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" type="text/css" href="__STATIC__/layui/css/layui.css" />
	<link rel="stylesheet" type="text/css" href="__CSS__/admin.css" />
</head>
<body id="admin">

<div class="layui-layout-admin">
    <div class="layui-header">
        <!-- logo -->
        <a href="<?php echo url('admin/index'); ?>" class="logo layui-left"><img src="" alt="">后台管理系统</a>

        <!-- 个人 -->
        <div href="#!" class="layui-right user">
            <!-- 头像 -->
            <a href="#!" class="user-avatar">
                <img src="__IMG__/7758258.gif" alt="" class="layui-circle">
            </a>
            <!-- 头像下面显示 -->
            <div class="user-nav">
				<div class="user-nav-item">
					 <a href="<?php echo url('login/update',['id'=>\think\Session::get('admin_auth.id')]); ?>">
                        <i class="layui-icon" style="font-size: 12px;">&#xe623;</i>
                        修改密码
                    </a>
				</div>
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
			<li class="layui-nav-item">
			<a href="javascript:;"><i class="layui-icon">&#xe612;</i> 管理员管理</a>
			<dl class="layui-nav-child">
			  <dd><a href="<?php echo url('adm/index'); ?>"><i class="layui-icon">&#xe602;</i>管理员列表</a></dd>
			  <dd><a href="<?php echo url('juris/index'); ?>"><i class="layui-icon">&#xe602;</i>权限列表</a></dd>
			</dl>
		  </li>
		  <li class="layui-nav-item">
			<a href="javascript:;"><i class="layui-icon">&#xe613;</i> 用户管理</a>
			<dl class="layui-nav-child">
			  <dd><a href="<?php echo url('user/index'); ?>"><i class="layui-icon">&#xe602;</i>用户列表</a></dd>
			  <dd style="display:none;"><a href="<?php echo url('article/index'); ?>"><i class="layui-icon">&#xe602;</i>动态列表</a></dd>
			</dl>
		  </li>
		  <li class="layui-nav-item">
			<a href="javascript:;"><i class="layui-icon">&#xe63c;</i> 报名管理</a>
			<dl class="layui-nav-child">
			  <dd><a href="<?php echo url('player/index'); ?>"><i class="layui-icon">&#xe602;</i>报名列表</a></dd>
			  <!--<dd><a href="<?php echo url('works/index'); ?>"><i class="layui-icon">&#xe602;</i>作品列表</a></dd>-->
			</dl>
		  </li>
		  <li class="layui-nav-item">
			<a href="javascript:;"><i class="layui-icon">&#xe62e;</i> 学校管理</a>
			<dl class="layui-nav-child">
			  <dd><a href="<?php echo url('school/index'); ?>"><i class="layui-icon">&#xe602;</i>学校列表</a></dd>
			  <dd><a href="<?php echo url('articles/index'); ?>"><i class="layui-icon">&#xe602;</i>时讯列表</a></dd>
			</dl>
		  </li>
		  <li class="layui-nav-item">
			<a href="javascript:;"><i class="layui-icon">&#xe611;</i> 通知管理</a>
			<dl class="layui-nav-child">
			  <dd><a href="<?php echo url('message/index'); ?>"><i class="layui-icon">&#xe602;</i>用户通知列表</a></dd>
			</dl>
		  </li>
		  <li class="layui-nav-item">
			<a href="javascript:;"><i class="layui-icon">&#xe638;</i> 资讯管理</a>
			<dl class="layui-nav-child">
			  <dd><a href="<?php echo url('news/index'); ?>"><i class="layui-icon">&#xe602;</i>资讯列表</a></dd>
			  <dd><a href="<?php echo url('broadcast/index'); ?>"><i class="layui-icon">&#xe602;</i>直播列表</a></dd>
			  <dd><a href="<?php echo url('activity/index'); ?>"><i class="layui-icon">&#xe602;</i>活动列表</a></dd>
			</dl>
		  </li>
		  <li class="layui-nav-item">
			<a href="javascript:;"><i class="layui-icon">&#xe609;</i> 分类管理</a>
			<dl class="layui-nav-child">
			  <dd><a href="<?php echo url('types/index'); ?>"><i class="layui-icon">&#xe602;</i>大赛分类列表</a></dd>
			  <dd><a href="<?php echo url('region/index'); ?>"><i class="layui-icon">&#xe602;</i>地区信息列表</a></dd>
			   <dd><a href="<?php echo url('cate/index'); ?>"><i class="layui-icon">&#xe602;</i>资讯分类列表</a></dd>
			   <dd><a href="<?php echo url('series/index'); ?>"><i class="layui-icon">&#xe602;</i>社团分类列表</a></dd>
			</dl>
		  </li>
		  <li class="layui-nav-item">
			<a href="javascript:;"><i class="layui-icon">&#xe630;</i>社团管理</a>
			<dl class="layui-nav-child">
			  <dd><a href="<?php echo url('module/index'); ?>"><i class="layui-icon">&#xe602;</i>社团列表</a></dd>
			</dl>
		  </li>
		  <li class="layui-nav-item">
			<a href="javascript:;"><i class="layui-icon">&#xe620;</i>系统管理</a>
			<dl class="layui-nav-child">
			<dd><a href="<?php echo url('maintain/index'); ?>"><i class="layui-icon">&#xe602;</i>网站信息</a></dd>
			</dl>
		  </li>
		</ul>
		
    </div>
    <div class="layui-body">
	
<div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
  <ul class="layui-tab-title">
     <li onclick="javascript:window.location.href='<?php echo url('module/art_list',['id'=>$art['series_id']]); ?>'">社团动态</li>
	<li class="layui-this">动态详细</li>
  </ul>
</div> 
<form class="layui-form" action="" method="post">
<input type="hidden" name="aid" value="<?php echo $art['id']; ?>">
<input type="hidden" name="series_id" value="<?php echo $art['series_id']; ?>">
  <div class="layui-form-item" style="width:600px">
    <label class="layui-form-label">发布时间</label>
    <div class="layui-input-block">
      <input type="text" name="add_time" value="<?php echo $art['add_time']; ?>" lay-filter="add_time"  autocomplete="off" class="layui-input" readonly>
    </div>
  </div>
  <div class="layui-form-item" style="width:600px">
    <label class="layui-form-label">模块分类</label>
    <div class="layui-input-block">
      <input type="text" name="module_name" value="<?php echo $art['series_name']; ?>/<?php echo $art['module_name']; ?>" lay-filter="module_name"  autocomplete="off" class="layui-input" readonly>
    </div>
  </div>
  <div class="layui-form-item" style="width:600px">
    <label class="layui-form-label">发布者</label>
    <div class="layui-input-block">
      <input type="text" name="user_name" value="<?php echo $art['user_name']; ?>" lay-filter="user_name"  autocomplete="off" class="layui-input" readonly>
    </div>
  </div>
  <div class="layui-form-item" style="width:600px">
    <label class="layui-form-label">动态内容</label>
    <div class="layui-input-block">
      <textarea name="content" class="layui-textarea" value="<?php echo $art['content']; ?>" readonly><?php echo $art['content']; ?></textarea>
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">是否推荐</label>
    <div class="layui-input-block">
	  <input type="hidden" name="checks" id="checks" value="0">
	   <input type="checkbox" name="check[]" value="1" lay-filter="check1" title="首页推荐">
	   <input type="checkbox" name="check[]" value="2" lay-filter="check1" title="分类推荐">
       <input type="checkbox" name="check[]" value="3" lay-filter="check1" title="置顶" >
	   <input type="checkbox" name="check[]" value="4" lay-filter="check1" title="加精" >
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">显示/隐藏</label>
    <div class="layui-input-block">
	  <input type="hidden" name="stch" id="stch" value="1"> 
      <input type="checkbox" name="switch" lay-text="yes|no" lay-filter="stch" checked lay-skin="switch">
    </div>
  </div>

  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
      <a href="javascript:window.history.go(-1)" class="layui-btn">返回</a>
    </div>
  </div>
</form>


    </div>
	
    <div class="layui-footer">
        <div class="layui-main">
            当前登录账号：<?php echo \think\Session::get('admin_auth.nickname'); ?> 
        </div>
    </div>

</div>

<script type="text/javascript" src="__STATIC__/layui/layui.js"></script>
<script type="text/javascript" src="__JS__/admin.js"></script>
<script type="text/javascript" src="__JS__/jquery.js"></script>

<script>
//Demo
layui.use(['form'], function(){
  var form = layui.form();

  //监听开关
  form.on('switch(stch)', function(data){
	
	if(data.elem.checked)
	{
		$("#stch").prop('value','1');
	}else{
		$("#stch").prop('value','0');
	}

  });

  //监听提交
  form.on('submit(formDemo)', function(data){
	if(data.field['check[]']==null){
		$("#checks").prop('value','0');
	  }else{
		$("#checks").prop('value','1');
	  }
  });

});
</script>

</body>
</html>