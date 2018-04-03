<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:67:"D:\amp\UPUPW_K2.1_64\htdocs\QN/app/admin\view\user\add_message.html";i:1490607148;s:62:"D:\amp\UPUPW_K2.1_64\htdocs\QN/app/admin\view\public\base.html";i:1490600403;}*/ ?>
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
        <a href="<?php echo url('index/index'); ?>" class="logo layui-left"><img src="" alt="">后台管理系统</a>

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
			  <dd><a href="<?php echo url('article/index'); ?>"><i class="layui-icon">&#xe602;</i>动态列表</a></dd>
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
			  <dd><a href="<?php echo url('articles/index'); ?>"><i class="layui-icon">&#xe602;</i>动态列表</a></dd>
			</dl>
		  </li>
		  <li class="layui-nav-item">
			<a href="javascript:;"><i class="layui-icon">&#xe609;</i> 分类管理</a>
			<dl class="layui-nav-child">
			  <dd><a href="<?php echo url('types/index'); ?>"><i class="layui-icon">&#xe602;</i>大赛分类列表</a></dd>
			  <dd><a href="<?php echo url('region/index'); ?>"><i class="layui-icon">&#xe602;</i>地区信息列表</a></dd>
			   <dd><a href="<?php echo url('cate/index'); ?>"><i class="layui-icon">&#xe602;</i>资讯分类列表</a></dd>
			</dl>
		  </li>
		  <li class="layui-nav-item">
			<a href="javascript:;"><i class="layui-icon">&#xe638;</i> 资讯管理</a>
			<dl class="layui-nav-child">
			  <dd><a href="<?php echo url('news/index'); ?>"><i class="layui-icon">&#xe602;</i>资讯列表</a></dd>
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
    <li onclick="javascript:window.location.href='<?php echo url('user/index'); ?>'">用户列表</li>
    <li class="layui-this">发布通知</li>
  </ul>
</div> 
<form class="layui-form" action="" method="post" id="fid" enctype="multipart/form-data">
  <div class="layui-form-item" style="width:600px" id="1111">
    <label class="layui-form-label">通知目标</label>
    <div class="layui-input-block">
		<input type="radio" lay-filter="adi" name="tp" value="1" title="群体" checked>
		<input type="radio" lay-filter="adi" name="tp" value="2" title="个人">
    </div>
  </div>
  <div class="layui-form-item" style="width:800px" id="2222">
    <label class="layui-form-label">选择地区</label>
    <div class="layui-input-inline" id="pid">
      <select name="pid" lay-filter="pir" style="width:200px;">
		 <option value="0" >全部市级</option>
		 <?php if(is_array($plist) || $plist instanceof \think\Collection || $plist instanceof \think\Paginator): $i = 0; $__LIST__ = $plist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pj): $mod = ($i % 2 );++$i;?>
			<option value="<?php echo $pj['id']; ?>"><?php echo $pj['name']; ?></option>
		 <?php endforeach; endif; else: echo "" ;endif; ?>
      </select>
    </div>
	<div class="layui-input-inline" id="cid" >
      <select name="cid" lay-filter="cit" style="width:200px;">
		 <option value="0" >全部区级</option>
      </select>
    </div>
	 <div class="layui-input-inline" id="sid" style="width:200px;">
      <select name="sid" style="width:200px;">
		 <option value="0" >全部学校</option>
      </select>
    </div>
  </div>
  <div class="layui-form-item" style="width:600px;display:none;" id="3333">
    <label class="layui-form-label">用户账号</label>
    <div class="layui-input-block">
	  <input type="hidden" name="uid" value="0">
      <input type="text" name="aname" lay-filter="aname" onblur="cof(this)" placeholder="请输入账号" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item" style="width:600px">
    <label class="layui-form-label">信息标题</label>
    <div class="layui-input-block">
      <input type="text" name="title" lay-filter="title" required lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item" style="width:800px">
    <label class="layui-form-label">信息内容</label>
    <div class="layui-input-block">
      <textarea name="content" id="content" placeholder="请输入内容" class="layui-textarea"></textarea>
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
            当前登录账号：  <?php echo \think\Session::get('admin_auth.nickname'); ?> 
        </div>
    </div>

</div>

<script type="text/javascript" src="__STATIC__/layui/layui.js"></script>
<script type="text/javascript" src="__JS__/admin.js"></script>

<script type="text/javascript" src="__JS__/jquery.js"></script>
<script type="text/javascript">
function cof(t)
{
	var tt=$(t).val();
	$.ajax({
		url:"<?php echo url('user/cof'); ?>",
		type:"post",
		dataType:"json",
		data:{uname:tt},
		success:function(dd){
			if(dd.obj!=null)
			{
				$(t).prev().prop('value',dd.obj);
			}
			else
			{
				layer.msg('用户不存在');
				$(t).focus();
			}
		}
	
	});
	
	
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
layui.use(['form','layedit'], function(){
  var form = layui.form(),layedit = layui.layedit;

  layedit.build('content'); //建立编辑器

  form.on('radio(adi)', function(data){
	if(data.value=='1')
	{
		
		//alert($(data.elem).parents(".layui-form-item").next().next().prop('id'));
		$(data.elem).parents(".layui-form-item").next().css('display','block');
		$(data.elem).parents(".layui-form-item").next().next().css('display','none');
	}
	else
	{
		$(data.elem).parents(".layui-form-item").next().css('display','none');
		$(data.elem).parents(".layui-form-item").next().next().css('display','block');
	}
  });  
  
  //监听下拉
  form.on('select(pir)', function(data){
		$.ajax({
			url:"<?php echo url('user/getregc'); ?>",
			type:"post",
			dataType:"json",
			data:{pid:$(data.elem).val()},
			error:function(){
				layer.msg('数据传输错误');
			},
			success:function(dd){
				$("#cid").children('select').empty();
				var aa="<option value='0' selected>全部区级</option>";
				$.each(dd.ls,function (key,value) {
				   aa+="<option value='"+value.id+"'>"+value.name+"</option>";
				});
				$("#cid").children('select').append(aa);
				form.render('select');

			}
		});

	}); 
	
	form.on('select(cit)', function(data){
			$.ajax({
				url:"<?php echo url('user/getshool'); ?>",
				type:"post",
				dataType:"json",
				data:{cid:$(data.elem).val()},
				error:function(){
					layer.msg('数据传输错误');
				},
				success:function(dd){
					$("#sid").children('select').empty();
					var aa="<option value='0' selected>全部学校</option>";
					$.each(dd.ls,function (key,value) {
					   aa+="<option value='"+value.id+"'>"+value.name+"</option>"; 
					});
					$("#sid").children('select').append(aa);
					 form.render('select');
				}
			});
	});

  //监听提交
  form.on('submit(formDemo)', function(data){

	  if(data.field['tp']=="2"&&data.field['aname']=='')
	  {
		layer.msg("请输入用户名称");
		return false;
	  }

	  $.ajax({
		url:"<?php echo url('user/cf'); ?>",
		type:"post",
		dataType:"json",
		data:{aname:data.field['aname'],aid:'0'},
		success:function(dd){
			if(dd.e>0)
			{
				layer.msg("账号已存在");
				return false;
			}
			else
			{
				$("#fid").submit();
			}
		}
	  });

  });
});
</script>

</body>
</html>