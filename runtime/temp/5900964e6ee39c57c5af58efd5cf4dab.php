<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:59:"D:\wwwroot\wchhui1\wwwroot/app/admin/view/articles/add.html";i:1493277174;s:58:"D:\wwwroot\wchhui1\wwwroot/app/admin/view/public/base.html";i:1493921602;}*/ ?>
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
			  <dd><a href="<?php echo url('articles/index'); ?>"><i class="layui-icon">&#xe602;</i>动态列表</a></dd>
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
     <li onclick="javascript:window.location.href='<?php echo url('articles/index'); ?>'">学校时讯</li>
	<li class="layui-this">添加时讯</li>
  </ul>
</div> 
<form class="layui-form" action="" method="post">
  <div class="layui-form-item" style="width:600px">
    <label class="layui-form-label">学校名称</label>
    <div class="layui-input-block">
      <input type="text" name="sname" lay-filter="sname" value="<?php echo $school_name; ?>"  autocomplete="off" class="layui-input" readonly>
    </div>
  </div>
  <div class="layui-form-item" style="width:600px">
    <label class="layui-form-label">时讯标题</label>
    <div class="layui-input-block">
      <input type="text" name="aname" lay-filter="aname"  autocomplete="off" class="layui-input" required lay-verify="required">
    </div>
  </div>
  <div class="layui-form-item" style="width:600px">
    <label class="layui-form-label">图   片</label>
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
  <div class="layui-form-item" style="width:600px">
    <label class="layui-form-label">作   者</label>
    <div class="layui-input-block">
      <input type="text" name="edit" lay-filter="edit" value="<?php echo \think\Session::get('admin_auth.nickname'); ?>" required lay-verify="required" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item" style="width:600px">
    <label class="layui-form-label">发布时间</label>
    <div class="layui-input-block">
      <input type="text" name="date" style="width:200px" lay-filter="date" value="<?php echo date('Y-m-d h:i',$dt); ?>" autocomplete="off" class="layui-input">
	  <div class="layui-form-mid layui-word-aux">时间格式：2017-07-07 7:17</div>
    </div>
  </div>
  <div class="layui-form-item" style="width:600px">
    <label class="layui-form-label">时讯简介</label>
    <div class="layui-input-block">
      <input type="text" name="esc" lay-filter="esc"  autocomplete="off" required lay-verify="required" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item" style="width:800px">
    <label class="layui-form-label">时讯内容</label>
    <div class="layui-input-block">
      <textarea id="content" name="content"></textarea>
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">显示/隐藏</label>
    <div class="layui-input-block">
	  <input type="hidden" name="stch" id="stch" value="1"> 
      <input type="checkbox" name="switch" lay-text="yes|no" lay-filter="stch" lay-skin="switch">
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

<script src="_admin_/ueditor/ueditor.config.js"></script>
<script src="_admin_/ueditor/ueditor.all.min.js"></script>
<script src="_admin_/ueditor/lang/zh-cn/zh-cn.js"></script>

<script>
//实例化编辑器
//建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
UE.getEditor('content',{initialFrameWidth:800,initialFrameHeight:400,});

function getfile(){
	return  $("input[name='img']").click();
}

window.URL = window.URL || window.webkitURL;
	function handleFiles(obj) {
		
			fileList = document.getElementById('id_img');
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
layui.use(['form', 'layer'], function(){
  var $ = layui.jquery, form = layui.form(), layer = layui.layer;

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