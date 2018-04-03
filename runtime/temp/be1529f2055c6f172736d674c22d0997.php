<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:66:"D:\wwwroot\wchhui1\wwwroot/app/super_admin/view/button/update.html";i:1496559116;s:64:"D:\wwwroot\wchhui1\wwwroot/app/super_admin/view/public/base.html";i:1496551450;}*/ ?>
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
        <a href="<?php echo url('super_admin/index'); ?>" class="logo layui-left"><img src="" alt="">后台管理系统</a>

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
			<a href="javascript:;"><i class="layui-icon">&#xe638;</i> 素材管理</a>
			<dl class="layui-nav-child">
			  <dd><a href="<?php echo url('news/index'); ?>"><i class="layui-icon">&#xe602;</i>素材列表</a></dd>
			</dl>
		  </li>
		  <li class="layui-nav-item">
			<a href="javascript:;"><i class="layui-icon">&#xe638;</i> 菜单管理</a>
			<dl class="layui-nav-child">
			  <dd><a href="<?php echo url('button/index'); ?>"><i class="layui-icon">&#xe602;</i>菜单列表</a></dd>
			  
			</dl>
		  </li>
		</ul>
		
    </div>
    <div class="layui-body">
	
<div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
  <ul class="layui-tab-title">
    <li onclick="javascript:window.location.href='<?php echo url('button/index'); ?>'">菜单列表</li>
    <li class="layui-this">修改菜单</li>
  </ul>
</div> 
<form class="layui-form" action="" method="post" id="fid" enctype="multipart/form-data">
  <div class="layui-form-item" style="width:600px">
    <label class="layui-form-label">菜单名称</label>
    <div class="layui-input-block">
      <input type="text" name="name" lay-filter="name" required lay-verify="required" placeholder="请输入名称" value="<?php echo $obj['name']; ?>" autocomplete="off" class="layui-input">
    </div>
  </div>
   <div class="layui-form-item" style="width:600px">
    <label class="layui-form-label">菜单类别</label>
    <div class="layui-input-block">
      <select name="pid" required lay-verify="required" lay-filter="pname" style="width:200px;">
		 <option value="">请选择</option>
		 <option value="0" <?php if($obj['pid']=='0'): ?>selected<?php endif; ?>>一级列表菜单</option>
		 <option value="1" <?php if($obj['pid']=='1'): ?>selected<?php endif; ?>>一级普通菜单</option>
		 <option value="2" <?php if($obj['pid']=='2'): ?>selected<?php endif; ?>>二级普通菜单</option>
      </select>
    </div>
  </div>
  <div class="layui-form-item" style="width:600px;<?php if($obj['pid']==0): ?>display:none;<?php elseif($obj['pid']==1): ?>display:none;<?php endif; ?>" id="div1">
    <label class="layui-form-label">上级菜单</label>
    <div class="layui-input-block">
      <select name="pname" style="width:200px;">
		 <option value="">请选择</option>
		 <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
		 <option value="<?php echo $vo['id']; ?>" <?php if($vo['id']==$obj['pname']): ?>selected<?php endif; ?>><?php echo $vo['name']; ?></option>
		 <?php endforeach; endif; else: echo "" ;endif; ?>
      </select>
    </div>
  </div>
  <div class="layui-form-item" style="width:600px;<?php if($obj['pid']==0): ?>display:none;<?php endif; ?>" id="div2">
    <label class="layui-form-label">菜单效果</label>
    <div class="layui-input-block">
      <select name="type" style="width:200px;">
		 <option value="">请选择</option>
		 <option value="click" <?php if($obj['type']=='click'): ?>selected<?php endif; ?>>推送图文</option>
		 <option value="view_limited" <?php if($obj['type']=='view_limited'): ?>selected<?php endif; ?>>跳转图文</option>
		 <option value="view" <?php if($obj['type']=='view'): ?>selected<?php endif; ?>>跳转网页</option>
      </select>
    </div>
  </div>
  <div class="layui-form-item" style="width:800px;<?php if($obj['pid']==0): ?>display:none;<?php endif; ?>" id="div3">
    <label class="layui-form-label">菜单编码</label>
    <div class="layui-input-block">
      <input type="text" name="url" lay-filter="url" placeholder="请输入编码"  value="<?php echo $obj['url']; ?>" autocomplete="off" class="layui-input">
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
//实例化编辑器
//建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
UE.getEditor('content',{initialFrameWidth:800,initialFrameHeight:400,});

//Demo
layui.use(['form'], function(){
  var form = layui.form();

  //监听开关
  form.on('select(pname)', function(data){
	
		if(data.value=="0"){
			$("#div1").css('display','none');
			$("#div2").css('display','none');
			$("#div3").css('display','none');
		}else if(data.value=="1"){
			$("#div1").css('display','none');
			$("#div2").css('display','block');
			$("#div3").css('display','block');
		}else if(data.value=="2"){
			$("#div1").css('display','block');
			$("#div2").css('display','block');
			$("#div3").css('display','block');
		}

  });



  //监听提交
  form.on('submit(formDemo)', function(data){
	 
		var i=data.field['pid'];
		if(i=='1'){
			if(data.field['type']=='')
			{
				layer.msg("菜单类别不能为空！");
			}
			if(data.field['url']=='')
			{
				layer.msg("菜单编码不能为空！");
			}
		}else if(i=='2'){
			if(data.field['pname']=='')
			{
				layer.msg("上级菜单不能为空！");
			}
			if(data.field['type']=='')
			{
				layer.msg("菜单类别不能为空！");
			}
			if(data.field['url']=='')
			{
				layer.msg("菜单编码不能为空！");
			}
		}

	    $("#fid").submit();
  });
});
</script>

</body>
</html>