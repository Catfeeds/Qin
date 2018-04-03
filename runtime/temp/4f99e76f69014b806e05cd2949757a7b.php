<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:58:"D:\amp\UPUPW_K2.1_64\htdocs\QN/app/admin\view\adm\add.html";i:1490858766;s:62:"D:\amp\UPUPW_K2.1_64\htdocs\QN/app/admin\view\public\base.html";i:1493099283;}*/ ?>
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
    <li onclick="javascript:window.location.href='<?php echo url('adm/index'); ?>'">管理员列表</li>
    <li class="layui-this">添加管理员</li>
  </ul>
</div> 
<form class="layui-form" id="fid" action="" method="post">
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
  <div class="layui-form-item" style="width:800px">
    <label class="layui-form-label">选择地区</label>
    <div class="layui-input-inline" id="pid">
      <select name="pid" lay-filter="pir" style="width:200px;">
		 <option value="0" selected>全部市级</option>
		 <?php if(is_array($plist) || $plist instanceof \think\Collection || $plist instanceof \think\Paginator): $i = 0; $__LIST__ = $plist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pj): $mod = ($i % 2 );++$i;?>
			<option value="<?php echo $pj['id']; ?>"><?php echo $pj['name']; ?></option>
		 <?php endforeach; endif; else: echo "" ;endif; ?>
      </select>
    </div>
	<div class="layui-input-inline" id="cid" style="display:none;">
      <select name="cid" lay-filter="cit" style="width:200px;">
		 <option value="0" selected>全部区级</option>
      </select>
    </div>
	 <div class="layui-input-inline" id="sid" style="display:none;">
      <select name="sid" style="width:200px;">
		 <option value="0" selected>全部学校</option>
      </select>
    </div>
  </div>
  <div class="layui-form-item">
	 <input type="hidden" name="checks" id="checks" value="0"> 
    <label class="layui-form-label">权限</label>
	<?php if(is_array($jlist) || $jlist instanceof \think\Collection || $jlist instanceof \think\Paginator): $i = 0; $__LIST__ = $jlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jb): $mod = ($i % 2 );++$i;?>
    <div class="layui-input-block" style="width:80%;margin-bottom:15px;">
      <input type="checkbox" name="check[]"  value="<?php echo $jb['id']; ?>" id="id-<?php echo $jb['id']; ?>" lay-filter="check1" title="<?php echo $jb['name']; ?>" >
	  <br/>
	  <?php if(is_array($jb['children']) || $jb['children'] instanceof \think\Collection || $jb['children'] instanceof \think\Paginator): $i = 0; $__LIST__ = $jb['children'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cd): $mod = ($i % 2 );++$i;?>
		<input type="checkbox" name="check[]"  value="<?php echo $cd['id']; ?>" id="id-<?php echo $jb['id']; ?>-<?php echo $cd['id']; ?>" lay-filter="check2" title="<?php echo $cd['name']; ?>" lay-skin="primary" > 
	  <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
	<?php endforeach; endif; else: echo "" ;endif; ?>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">启用</label>
    <div class="layui-input-block">
	  <input type="hidden" name="stch" id="stch" value="1"> 
      <input type="checkbox" lay-text="yes|no" lay-filter="stch" value="1" name="switch" checked lay-skin="switch">
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
      <input class="layui-btn" type="button" lay-submit lay-filter="formDemo" value="立即提交"/>
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
<script type="text/javascript">


//Demo
layui.use(['form'], function(){
  var form = layui.form();

  //监听复选
  form.on('checkbox(check1)', function(data){
	var dataid = data.elem.id;

	if(data.elem.checked)
	  {
		  $('input[id^=' + dataid + '-]').prop('checked', data.elem.checked);
			$('input[id^=' + dataid + '-]').next().attr("class","layui-unselect layui-form-checkbox layui-form-checked");
	  }
	else{
		$('input[id^=' + dataid + '-]').prop('checked', data.elem.checked);
		$('input[id^=' + dataid + '-]').next().attr("class","layui-unselect layui-form-checkbox");
	}
	

  });

  form.on('checkbox(check2)', function(data){
	var dataid = data.elem.id;
	dataid = dataid.substring(0, dataid.lastIndexOf("-"));

	if(data.elem.checked)
	{
		  $('input[id=' + dataid + ']').prop('checked', data.elem.checked);
			$('input[id=' + dataid + ']').next().attr("class","layui-unselect layui-form-checkbox layui-form-checked");

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
  
  //监听下拉
  form.on('select(pir)', function(data){
	if($(data.elem).val()!=0)
	  {
			$("#cid").css('display','block');
			$.ajax({
				url:"<?php echo url('adm/getregc'); ?>",
				type:"post",
				dataType:"json",
				data:{pid:$(data.elem).val()},
				error:function(){
					layer.msg('数据传输错误');
				},
				success:function(dd){
					$("#cid").children('select').empty();
					//$("#cid").children('div').children('dl').empty();
					var aa="<option value='0' selected>全部区级</option>";
					//var bb="<dd lay-value='0' class='layui-this'>全部区级</dd>";
					$.each(dd.ls,function (key,value) {
					   aa+="<option value='"+value.id+"'>"+value.name+"</option>";
					   //bb+="<dd lay-value='"+value.id+"' class=''>"+value.name+"</dd>";
                    });
					$("#cid").children('select').append(aa);
					//$("#cid").children('div').children('dl').append(bb);
					form.render('select');
				}
			});

		
	  }else{
			$("#cid").children('select').val("0");
			$("#cid").css('display','none');

			$("#sid").children('select').val("0");
			$("#sid").css('display','none');
	  }
	  

	});
	
	form.on('select(cit)', function(data){
	if($(data.elem).val()!=0)
	  {
			$("#sid").css('display','block');
			$.ajax({
				url:"<?php echo url('adm/getshool'); ?>",
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

	  }else{
			$("#sid").children('select').val("0");
			$("#sid").css('display','none');
	  }
	 

	});

  //监听提交
  form.on('submit(formDemo)', function(data){

	  if(data.field['pwd']!=data.field['pwds']){
		layer.msg("两次密码不一致");
		return false;
	  }

	  if(data.field['check[]']==null){
		$("#checks").prop('value','0');
	  }else{
		$("#checks").prop('value','1');
	  }

	  $.ajax({
		url:"<?php echo url('adm/cf'); ?>",
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