<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:59:"D:\amp\UPUPW_K2.1_64\htdocs\QN/app/admin\view\adm\edit.html";i:1490858755;s:62:"D:\amp\UPUPW_K2.1_64\htdocs\QN/app/admin\view\public\base.html";i:1492584676;}*/ ?>
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
			<dd><a href="<?php echo url('maintain/index'); ?>"><i class="layui-icon">&#xe602;</i>网站信息</a></dd>
			</dl>
		  </li>
		</ul>
		
    </div>
    <div class="layui-body">
	
<div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
  <ul class="layui-tab-title">
    <li onclick="javascript:window.location.href='<?php echo url('adm/index'); ?>'">管理员列表</li>
    <li class="layui-this">修改权限</li>
  </ul>
</div> 
<form class="layui-form" action="" id="fid" method="post">
<input type="hidden" name="aid" value="<?php echo $aobj['id']; ?>">
  <div class="layui-form-item" style="width:600px">
    <label class="layui-form-label">账号</label>
    <div class="layui-input-block">
      <input type="text" name="aname" lay-filter="aname" placeholder="<?php echo $aobj['name']; ?>" autocomplete="off" class="layui-input" disabled>
    </div>
  </div>
  <div class="layui-form-item" style="width:800px">
    <label class="layui-form-label">选择地区</label>
    <div class="layui-input-inline" id="pid">
      <select name="pid" lay-filter="pir" style="width:200px;">
		 <option value="0" <?php if(($aobj['pid'] == 0)): ?>selected<?php endif; ?>>全部市级</option>
		 <?php if(is_array($plist) || $plist instanceof \think\Collection || $plist instanceof \think\Paginator): $i = 0; $__LIST__ = $plist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pj): $mod = ($i % 2 );++$i;?>
			<option value="<?php echo $pj['id']; ?>" <?php if($aobj['pid'] == $pj['id']): ?>selected<?php endif; ?>><?php echo $pj['name']; ?></option>
		 <?php endforeach; endif; else: echo "" ;endif; ?>
      </select>
    </div>
	<div class="layui-input-inline" id="cid" style="display:<?php if(($aobj['pid'] != 0)): ?>block<?php else: ?>none<?php endif; ?>;">
      <select name="cid" lay-filter="cit" style="width:200px;">
		 <option value="0" <?php if(($aobj['cid'] == 0)): ?>selected<?php endif; ?>>全部区级</option>
		 <?php if(($aobj['pid'] != 0)): if(is_array($clist) || $clist instanceof \think\Collection || $clist instanceof \think\Paginator): $i = 0; $__LIST__ = $clist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cj): $mod = ($i % 2 );++$i;?>
				<option value="<?php echo $cj['id']; ?>" <?php if($aobj['cid'] == $cj['id']): ?>selected<?php endif; ?>><?php echo $cj['name']; ?></option>
			<?php endforeach; endif; else: echo "" ;endif; endif; ?>
      </select>
    </div>
	 <div class="layui-input-inline" id="sid" style="display:<?php if(($aobj['cid'] != 0)): ?>block<?php else: ?>none<?php endif; ?>;">
      <select name="sid" style="width:200px;">
		 <option value="0" <?php if(($aobj['sid'] == 0)): ?>selected<?php endif; ?>>全部学校</option>
			<?php if(($aobj['cid'] != 0)): if(is_array($slist) || $slist instanceof \think\Collection || $slist instanceof \think\Paginator): $i = 0; $__LIST__ = $slist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sj): $mod = ($i % 2 );++$i;?>
				<option value="<?php echo $sj['id']; ?>" <?php if($aobj['sid'] == $sj['id']): ?>selected<?php endif; ?>><?php echo $sj['name']; ?></option>
			<?php endforeach; endif; else: echo "" ;endif; endif; ?>
      </select>
    </div>
  </div>
  <div class="layui-form-item">
    <input type="hidden" name="checks" id="checks" value="1"> 
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
$(document).ready(function(){
	var juris="<?php echo $aobj['auth']; ?>";
	var array=juris.split(',');
	for(var i=0;i<array.length;i++)
	{
		$("input[name='check[]']").each(function(){
			if($(this).val()==array[i]){
				if(!$(this).prop('checked'))
				{
					$(this).prop('checked',true);
				}
			}
		});
	}

})

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