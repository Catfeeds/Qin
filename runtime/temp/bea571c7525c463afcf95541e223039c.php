<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:59:"D:\wwwroot\qnysj1\wwwroot/app/admin/view/player/update.html";i:1505896080;s:57:"D:\wwwroot\qnysj1\wwwroot/app/admin/view/public/base.html";i:1500630732;}*/ ?>
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
    <col width="100">
    <col width="100">
  </colgroup>
  <thead>
    <tr>
      <th colspan="2"><?php echo $pobj['id']; ?></th>
      <th colspan="4"><?php if(($pobj['pid'] != 0)): ?><?php echo $pobj['pname']; else: endif; if(($pobj['sid'] == 0&&$pobj['back_4']==1)): ?>-<?php echo $pobj['sname']; else: ?>-<?php echo $pobj['unit']; endif; ?></th>
      <th colspan="2"><?php echo date("Y-m-d h:s",$pobj['add_time']); ?></th>
    </tr> 
  </thead>
  <tbody>
    <tr>
	  <th>姓名</th>
      <td><?php echo $pobj['user_name']; ?></td>
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
	  <th><?php if(($pobj['back_4']==1)): ?>所属学校<?php else: ?>工作单位<?php endif; ?></th>
      <td colspan="5"><?php echo $pobj['pname']; if(($pobj['back_4']==1)): ?><?php echo $pobj['sname']; ?><?php echo $pobj['unit']; else: ?><?php echo $pobj['unit']; endif; ?></td>
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
	<tr style="min-height:100px;<?php if($pobj['type']==28): ?>display:none;<?php endif; ?>">
	  <th><?php if($pobj['type']==1): ?>参赛人员<?php elseif($pobj['type']==27): ?>主创人员简介<?php else: ?>选手简介<?php endif; ?></th>
      <td colspan="7"><div style="min-height:80px"><?php echo $pobj['esc']; ?></div></td>
    </tr>
	<tr>
	  <th>身份证正面照</th>
      <td colspan="7" style="padding-left: 18%;">
		<?php if(strpos($pobj['user_idcard_img'],'.zip')): ?><a href="<?php echo $pobj['user_idcard_img']; ?>" target="_blank" style="font-size: 15px;">下载查看</a>
		<?php elseif(strpos($pobj['user_idcard_img'],'.rar')): ?><a href="<?php echo $pobj['user_idcard_img']; ?>" target="_blank" style="font-size: 15px;">下载查看</a>
		<?php else: ?><img style="width:400px" src="<?php echo $pobj['user_idcard_img']; ?>"/>
		<?php endif; ?></td>
    </tr>
	<tr>
	  <th><?php if($pobj['type']==1): ?>节目名称<?php elseif($pobj['type']==27): ?>电影名<?php elseif($pobj['type']==28): ?>动漫创意作品名称<?php else: ?>作品名称<?php endif; ?></th>
      <td colspan="7"><?php echo $pobj['wname']; ?></td>
    </tr>
	<tr>
	  <th>参选类别</th>
      <td colspan="7">
		<?php echo $pobj['type_name']; if(($pobj['maxid'] != 0)): ?>-<?php echo $pobj['maxname']; endif; if(($pobj['minid'] != 0)): ?>-<?php echo $pobj['minname']; endif; ?>
	  </td>
    </tr>
	<tr style="<?php if($pobj['type']==22): ?>display:none;<?php endif; ?>">
	  <th><?php if($pobj['type']==1): ?>节目简介<?php elseif($pobj['type']==27): ?>剧本简介<?php elseif($pobj['type']==31): ?>作品简介及创作思路<?php else: ?>作品简介<?php endif; ?></th>
      <td colspan="7"><div style="min-height:80px"><?php echo $pobj['intro']; ?></div></td>
    </tr>
	<tr>
	  <th>推荐单位</th>
      <td colspan="7"><?php echo $pobj['rec']; ?></td>
    </tr>
	<tr>
	  <th>推荐单位联系人及电话</th>
      <td colspan="7"><?php echo $pobj['rectel']; ?></td>
    </tr>
	<tr>
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
		<input type="radio" name="cc" value="1" title="已审核" <?php if(($pobj['back_2'] == 1)): ?>checked<?php elseif(($pobj['back_2'] != 2)): ?>checked<?php endif; ?>>
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