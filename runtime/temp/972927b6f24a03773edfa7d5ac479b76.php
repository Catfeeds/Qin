<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:58:"D:\wwwroot\qnysj1\wwwroot/app/super_admin/view/ar/add.html";i:1498377328;s:63:"D:\wwwroot\qnysj1\wwwroot/app/super_admin/view/public/base.html";i:1498377698;}*/ ?>
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
			<a href="javascript:;"><i class="layui-icon">&#xe649;</i> 素材管理</a>
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
		  <li class="layui-nav-item">
			<a href="javascript:;"><i class="layui-icon">&#xe642;</i> 回复管理</a>
			<dl class="layui-nav-child">
			  <dd><a href="<?php echo url('ar/index'); ?>"><i class="layui-icon">&#xe602;</i>回复列表</a></dd>
			  
			</dl>
		  </li>
		</ul>
		
    </div>
    <div class="layui-body">
	
<div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
  <ul class="layui-tab-title">
    <li onclick="javascript:window.location.href='<?php echo url('ar/index'); ?>'">信息列表</li>
    <li class="layui-this">添加信息</li>
  </ul>
</div> 
<form class="layui-form" action="" method="post" id="fid" enctype="multipart/form-data">
   <div class="layui-form-item" style="width:600px">
    <label class="layui-form-label">信息类别</label>
    <div class="layui-input-block">
      <select name="tid" required lay-verify="required" lay-filter="tid" style="width:200px;">
		 <option value="1" >关键字回复</option>
		 <option value="0" >默认回复</option>
      </select>
    </div>
  </div>
  <div class="layui-form-item" style="width:600px" id="div0">
    <label class="layui-form-label">回复类别</label>
    <div class="layui-input-block">
      <select name="tname" required lay-verify="required" lay-filter="tname" style="width:200px;">
		 <option value="0" >回复文字</option>
		 <option value="1" >回复图文</option>
      </select>
    </div>
  </div>
  <div class="layui-form-item" style="width:600px" id="div1">
    <label class="layui-form-label">触发关键字</label>
    <div class="layui-input-block">
      <input type="text" name="keyword" lay-filter="keyword" placeholder="请输入关键字" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item" style="width:600px;display:none;" id="div2">
    <label class="layui-form-label">图文编码</label>
    <div class="layui-input-block">
      <input type="text" name="esc" lay-filter="esc" placeholder="请输入图文编码" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item" style="width:800px;" id="div3">
    <label class="layui-form-label">文字内容</label>
    <div class="layui-input-block">
	  <textarea name="content" style="width:600px;height:200px;"></textarea>
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
UE.getEditor('content',{toolbars:[['sourceEditor','FullScreen', 'Source', 'Undo', 'Redo','italic','underline','bold','test']],
initialFrameWidth:600,
initialFrameHeight:200,
zIndex:9,});

//Demo
layui.use(['form'], function(){
  var form = layui.form();

    //监听开关
  form.on('select(tid)', function(data){
	
		if(data.value=="0"){
			$("#div1").css('display','none');
		}else if(data.value=="1"){
			$("#div1").css('display','block');
		}

  });

  form.on('select(tname)', function(data){
	
		if(data.value=="0"){
			$("#div2").css('display','none');
			$("#div3").css('display','block');
		}else if(data.value=="1"){
			$("#div2").css('display','block');
			$("#div3").css('display','none');
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

  //监听提交
  form.on('submit(formDemo)', function(data){

	  $("#fid").submit();

  });
});
</script>

</body>
</html>