<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:64:"D:\amp\UPUPW_K2.1_64\htdocs\QN/app/admin\view\player\update.html";i:1492877376;s:62:"D:\amp\UPUPW_K2.1_64\htdocs\QN/app/admin\view\public\base.html";i:1493099283;}*/ ?>
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
    <li onclick="javascript:window.location.href='<?php echo url('player/index'); ?>'">选手列表</li>
    <li class="layui-this">选手审核</li>
  </ul>
</div> 
<form class="layui-form" action="" method="post" id="fid" enctype="multipart/form-data">
<input type="hidden" name="pid" value="<?php echo $pobj['id']; ?>"> 
<table class="layui-table" style="width:60%;margin-left: 20%;">
  <colgroup>
    <col width="100">
    <col width="100">
	<col width="100">
    <col width="100">
	<col width="100">
    <col width="100">
	<col width="100">
    <col>
    <col>
  </colgroup>
  <thead>
    <tr>
      <th colspan="2"><?php echo $pobj['id']; ?></th>
      <th colspan="4"><?php if(($pobj['pid'] != 0)): ?><?php echo $pobj['pname']; else: endif; if(($pobj['cid'] != 0)): ?>-<?php echo $pobj['cname']; endif; if(($pobj['sid'] != 0)): ?>-<?php echo $pobj['sname']; endif; ?></th>
      <th colspan="2"><?php echo date("Y-m-d h:s",$pobj['add_time']); ?></th>
    </tr> 
  </thead>
  <tbody>
    <tr>
	  <th>姓名</th>
      <td><?php echo $pobj['user_uname']; ?></td>
      <th>性别</th>
	  <td><?php echo $pobj['user_sex']; ?></td>
      <th>民族</th>
      <td><?php echo $pobj['race']; ?></td>
      <td colspan="2" rowspan="5">
		<img style="width:100%" src="<?php echo $pobj['img']; ?>"/>
	</td>
    </tr>
    <tr>
	  <th>汉语拼音</th>
      <td><?php echo $pobj['user_euname']; ?></td>
      <th>年龄</th>
	  <td><?php echo $pobj['user_age']; ?></td>
      <th>出生日期</th>
      <td><?php echo date('Y-m-d',$pobj['user_birth']); ?></td>
    </tr>
	 <tr>
	  <th>学校或工作单位</th>
      <td colspan="5"><?php echo $pobj['pname']; ?><?php echo $pobj['cname']; ?><?php echo $pobj['sname']; ?><?php echo $pobj['unit']; ?></td>
    </tr>
	 <tr>
	  <th>通讯地址</th>
      <td colspan="5"><?php echo $pobj['site']; ?></td>
    </tr>
	<tr>
	  <th>联系电话</th>
      <td><?php echo $pobj['tel']; ?></td>
      <th>指导老师</th>
	  <td><?php echo $pobj['teacher']; ?></td>
      <th>邮政编码</th>
      <td><?php echo $pobj['postcode']; ?></td>
    </tr>
	<tr style="min-height:100px;">
	  <th>参赛人数及姓名(简介)</th>
      <td colspan="7"><?php echo $pobj['esc']; ?></td>
    </tr>
	<tr>
	  <th>作品名称</th>
      <td colspan="7"><?php echo $pobj['wname']; ?></td>
    </tr>
	<tr>
	  <th>参选类别</th>
      <td colspan="7">
		<?php echo $pobj['type_name']; if(($pobj['maxid'] != 0)): ?>-<?php echo $pobj['maxname']; endif; if(($pobj['minid'] != 0)): ?>-<?php echo $pobj['minname']; endif; ?>
	  </td>
    </tr>
	<tr>
	  <th>作品简介</th>
      <td colspan="7"><?php echo $pobj['intro']; ?></td>
    </tr>
	<tr>
	  <th>推荐单位</th>
      <td colspan="7"><?php echo $pobj['rec']; ?></td>
    </tr>
	<tr>
	  <th>推荐单位联系人及电话</th>
      <td colspan="7"><?php echo $pobj['rectel']; ?></td>
    </tr>
	<tr style="display:<?php if(($pobj['status'] != 1)): ?>table-row<?php else: ?>none<?php endif; ?>;">
	  <th>审核</th>
      <td><input type="hidden" name="stch" id="stch" value="<?php echo $pobj['status']; ?>"> 
      <input type="checkbox" lay-text="yes|no" lay-filter="stch" value="1" name="switch" <?php if($pobj['status'] == 1): ?>checked<?php endif; ?> lay-skin="switch">
	  </td>
		<td colspan="6">
		<input type="text" style="display:<?php if(($pobj['status'] == 1)): ?>none<?php else: ?>block<?php endif; ?>;" name="title" placeholder="未通过原因" autocomplete="off" class="layui-input">
		</td>
    </tr>
	<tr style="display:<?php if(($pobj['status'] == 1)): ?>table-row<?php else: ?>none<?php endif; ?>;">
	  <th>比赛状态</th>
      <td colspan="7"> 
		<input type="radio" name="cc" value="1" title="参赛中" <?php if(($pobj['back_2'] == 1)): ?>checked<?php elseif(($pobj['back_2'] != 2)): ?>checked<?php endif; ?>>
		<input type="radio" name="cc" value="2" title="已淘汰" <?php if(($pobj['back_2'] == 2)): ?>checked<?php endif; ?>>
	  </td>
    </tr>
  </tbody>
</table>
  <div class="layui-form-item">
    <div class="layui-input-block">
      <input style="margin-left: 65%;" type="button" class="layui-btn" lay-submit lay-filter="formDemo" value="立即提交" />
      <a href="javascript:window.history.go(-1)" class="layui-btn layui-btn-primary">返回</a>
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

  //监听开关
  form.on('switch(stch)', function(data){
	
	if(data.elem.checked)
	{
		$("#stch").prop('value','1');
		$(data.elem).parent('td').next().children('input').css('display','none');
		
	}else{
		$("#stch").prop('value','0');
		$(data.elem).parent('td').next().children('input').css('display','table-cell');
		
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