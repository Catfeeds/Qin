<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:59:"D:\wwwroot\qnysj1\wwwroot/app/admin/view/report/update.html";i:1496909666;s:57:"D:\wwwroot\qnysj1\wwwroot/app/admin/view/public/base.html";i:1500630732;}*/ ?>
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
			</dl>
		  </li>

		  <li class="layui-nav-item" <?php if((\think\Session::get('admin_auth.name')=='admin' or \think\Session::get('admin_auth.name')=='zhouke')): else: ?>style="display:none;<?php endif; ?>">
			<a href="javascript:;"><i class="layui-icon">&#xe613;</i> 虚拟用户管理</a>
			<dl class="layui-nav-child">
			  <dd><a href="<?php echo url('puser/index'); ?>"><i class="layui-icon">&#xe602;</i>虚拟用户列表</a></dd>
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
			  <!--<dd><a href="<?php echo url('articles/index'); ?>"><i class="layui-icon">&#xe602;</i>动态列表</a></dd>-->
			</dl>
		  </li>
		  <li class="layui-nav-item">
			<a href="javascript:;"><i class="layui-icon">&#xe62e;</i> 社区管理</a>
			<dl class="layui-nav-child">
			  <dd><a href="<?php echo url('community/index'); ?>"><i class="layui-icon">&#xe602;</i>社区列表</a></dd>
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
			  <dd><a href="<?php echo url('activity/index'); ?>"><i class="layui-icon">&#xe602;</i>媒体列表</a></dd>
			</dl>
		  </li>
		  <li class="layui-nav-item">
			<a href="javascript:;"><i class="layui-icon">&#xe609;</i> 分类管理</a>
			<dl class="layui-nav-child">
			  <dd><a href="<?php echo url('types/index'); ?>"><i class="layui-icon">&#xe602;</i>大赛分类列表</a></dd>
			  <dd><a href="<?php echo url('region/index'); ?>"><i class="layui-icon">&#xe602;</i>地区信息列表</a></dd>
			   <dd><a href="<?php echo url('cate/index'); ?>"><i class="layui-icon">&#xe602;</i>资讯分类列表</a></dd>
			   <dd style="display:none;"><a href="<?php echo url('series/index'); ?>"><i class="layui-icon">&#xe602;</i>社团分类列表</a></dd>
			</dl>
		  </li>
		  <li class="layui-nav-item" style="display:none;">
			<a href="javascript:;"><i class="layui-icon">&#xe630;</i>社团管理</a>
			<dl class="layui-nav-child">
			  <dd><a href="<?php echo url('module/index'); ?>"><i class="layui-icon">&#xe602;</i>社团列表</a></dd>
			</dl>
		  </li>
		  <li class="layui-nav-item">
			<a href="javascript:;"><i class="layui-icon">&#xe630;</i>举报管理</a>
			<dl class="layui-nav-child">
			  <dd><a href="<?php echo url('report/index'); ?>"><i class="layui-icon">&#xe602;</i>留言举报列表</a></dd>
			  <dd><a href="<?php echo url('report/index_com'); ?>"><i class="layui-icon">&#xe602;</i>评论举报列表</a></dd>
			  <dd><a href="<?php echo url('report/index_art'); ?>"><i class="layui-icon">&#xe602;</i>动态举报列表</a></dd>
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
    <li onclick="javascript:window.location.href='<?php echo url('report/index'); ?>'">留言举报列表</li>
    <li class="layui-this">举报详细</li>
  </ul>
</div> 
<form class="layui-form" action="" method="post" id="fid">
	<input type="hidden" name="aid" value="<?php echo $nobj['id']; ?>">
  <div class="layui-form-item" style="width:600px">
    <label class="layui-form-label">留言用户</label>
    <div class="layui-input-block">
      <input type="text" name="wname" lay-filter="wname"  placeholder="留言人" value="<?php echo $nobj['wname']; ?>" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item" style="width:600px">
    <label class="layui-form-label">留言内容</label>
    <div class="layui-input-block">
      <textarea name="content" placeholder="留言内容"  value="<?php echo $nobj['gb_content']; ?>" class="layui-textarea"><?php echo $nobj['gb_content']; ?></textarea>
    </div>
  </div>
  <div class="layui-form-item" style="width:600px">
    <label class="layui-form-label">举报用户</label>
    <div class="layui-input-block">
      <input type="text" name="user_name" lay-filter="user_name" value="<?php echo $nobj['user_name']; ?>" autocomplete="off" class="layui-input" >
    </div>
  </div>
  <div class="layui-form-item" style="width:600px">
    <label class="layui-form-label">举报原因</label>
    <div class="layui-input-block">
      <textarea name="report" placeholder="举报原因"  value="<?php echo $nobj['report']; ?>" class="layui-textarea"><?php echo $nobj['report']; ?></textarea>
    </div>
  </div>
   <div class="layui-form-item" style="width:600px">
    <label class="layui-form-label">举报时间</label>
    <div class="layui-input-block">
      <input type="text" name="date" style="width:200px" lay-filter="date" value="<?php echo date('Y-m-d h:i',$nobj['add_time']); ?>" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">处理结果</label>
    <div class="layui-input-block">
	  <input type="hidden" name="checks" id="checks" value="0">
       <input type="checkbox" name="check[]" value="1" lay-filter="check1" title="冻结留言用户" >
	   <input type="checkbox" name="check[]" value="2" lay-filter="check1" title="删除被举报留言" >
	   <input type="checkbox" name="check[]" value="3" lay-filter="check1" title="处理后删除本条举报信息" >
    </div>
  </div>
  <div class="layui-form-item">
    <div class="layui-input-block">
      <input type="button" class="layui-btn" lay-submit lay-filter="formDemo" value="立即提交" />
      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
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

<script type="text/javascript" src="__JS__/jquery.js"></script>
<script src="_admin_/ueditor/ueditor.config.js"></script>
<script src="_admin_/ueditor/ueditor.all.min.js"></script>
<script src="_admin_/ueditor/lang/zh-cn/zh-cn.js"></script>

<script type="text/javascript">

//Demo
layui.use(['form'], function(){
  var form = layui.form();

  

  //监听提交
  form.on('submit(formDemo)', function(data){
	  if(data.field['check[]']==null){
		$("#checks").prop('value','0');
	  }else{
		$("#checks").prop('value','1');
	  }
	  
		$("#fid").submit();

	  });

  });

</script>

</body>
</html>