<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:61:"D:\amp\UPUPW_K2.1_64\htdocs\QN/app/admin\view\series\add.html";i:1492400835;s:62:"D:\amp\UPUPW_K2.1_64\htdocs\QN/app/admin\view\public\base.html";i:1492356442;}*/ ?>
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
			  <dd><a href="<?php echo url('works/index'); ?>"><i class="layui-icon">&#xe602;</i>作品列表</a></dd>
			</dl>
		  </li>
		  <li class="layui-nav-item">
			<a href="javascript:;"><i class="layui-icon">&#xe62e;</i> 学校管理</a>
			<dl class="layui-nav-child">
			  <dd><a href="<?php echo url('school/index'); ?>"><i class="layui-icon">&#xe602;</i>学校列表</a></dd>
			  <dd style="display:none;"><a href="<?php echo url('articles/index'); ?>"><i class="layui-icon">&#xe602;</i>动态列表</a></dd>
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
			<dd><a href="<?php echo url('login/update',['id'=>\think\Session::get('admin_auth.id')]); ?>"><i class="layui-icon">&#xe602;</i>修改密码</a></dd>
			  <dd><a href="<?php echo url('login/logout'); ?>"><i class="layui-icon">&#xe602;</i>退出系统</a></dd>
			</dl>
		  </li>
		</ul>
		
    </div>
    <div class="layui-body">
	
<div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
  <ul class="layui-tab-title">
    <li onclick="javascript:window.location.href='<?php echo url('series/index'); ?>'">社团分类列表</li>
    <li class="layui-this">添加分类</li>
  </ul>
</div> 
<form class="layui-form" action="" id="fid" enctype="multipart/form-data" method="post">
  <div class="layui-form-item" style="width:600px">
    <label class="layui-form-label">分类名称</label>
    <div class="layui-input-block">
      <input type="text" name="aname" lay-filter="aname" required lay-verify="required" placeholder="请输入名称" autocomplete="off" class="layui-input">
    </div>
  </div>
  
  <div class="layui-form-item" style="width:600px;display:none;">
    <label class="layui-form-label">上级分类</label>
    <div class="layui-input-block">
      <select name="pid" style="width:200px;">
		 <option value="0">--无--</option>
		 <?php if(is_array($alist) || $alist instanceof \think\Collection || $alist instanceof \think\Paginator): $i = 0; $__LIST__ = $alist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
			<option value="<?php echo $vo['id']; ?>"><?php echo $vo['name']; ?></option>
		 <?php endforeach; endif; else: echo "" ;endif; ?>
      </select>
	  
    </div>
  </div>
  <div class="layui-form-item" style="width:600px">
    <label class="layui-form-label">图片</label>
    <div class="layui-input-block">
		<input type="file" name="img" onChange="handleFiles(this)" style="display:none;">
		<a class="layui-btn" onclick="getfile()" style="background-color: #ffffff;color: #191616;">
		<i class="layui-icon">&#xe608;</i> 选择图片
	  </a>
    </div>
	<div class="layui-input-block" id="id_img">
		<img style="width:200px" src="__IMG__/timg.jpg"/>
    </div>
  </div>
 
  <div class="layui-form-item" style="width:800px">
    <label class="layui-form-label">简介</label>
    <div class="layui-input-block">
      <textarea id="content" name="content" class="layui-textarea"></textarea>
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">是否启用</label>
    <div class="layui-input-block">
	  <input type="hidden" name="stch" id="stch" value="1"> 
      <input type="checkbox" name="switch" lay-text="yes|no" lay-filter="stch" checked lay-skin="switch">
    </div>
  </div>

  <div class="layui-form-item">
    <div class="layui-input-block">
      <input class="layui-btn" type="button" lay-submit lay-filter="formDemo"value="立即提交"/>
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
<script>
function getfile(){
	return $("input[type='file']").click();
}

window.URL = window.URL || window.webkitURL;
	function handleFiles(obj) {
		
			fileList = document.getElementById("id_img");
			var files = obj.files;
			img = new Image();
			if(window.URL){	
				img.src = window.URL.createObjectURL(files[0]); //创建一个object URL，并不是你的本地路径
				img.className = "lay-img";
				img.style="width:200px";
				img.onload = function(e) {
					window.URL.revokeObjectURL(this.src); //图片加载后，释放object URL
				}
				if(fileList.firstElementChild){
					 fileList.removeChild(fileList.firstElementChild);
				} 
				fileList.appendChild(img);
			}else if(window.FileReader){
				//opera不支持createObjectURL/revokeObjectURL方法。我们用FileReader对象来处理
				var reader = new FileReader();
				reader.readAsDataURL(files[0]);
				reader.onload = function(e){	
						img.src = this.result;
						img.className = "lay-img";
						fileList.appendChild(img);
				}
			}else
			{
				//ie
				obj.select();
				obj.blur();
				var nfile = document.selection.createRange().text;
				document.selection.empty();
				img.src = nfile;
				img.className = "lay-img";
				img.onload=function(){
				  
				}
				fileList.appendChild(img);
			}
		
	}


//Demo
layui.use(['form'], function(){
  var form = layui.form();
  //监听提交
  form.on('submit(formDemo)', function(data){
	
	if(data.field['pid']=="0")
	{
	  $.ajax({
		url:"<?php echo url('series/cf'); ?>",
		type:"post",
		dataType:"json",
		data:{aname:data.field['aname'],aid:'0'},
		success:function(dd){
			if(dd.e>0)
			{
				layer.msg("该名称分类已存在");

				return false;
			}
			else
			{
				$("#fid").submit();
			}
		}
	  });
	}
	else
	{
		$("#fid").submit();
	}

  });

  //监听开关
  form.on('switch(stch)', function(data){
	
	if(data.elem.checked)
	{
		$("#stch").prop('value','1');
	}else{
		$("#stch").prop('value','0');
	}

  });

});
</script>

</body>
</html>