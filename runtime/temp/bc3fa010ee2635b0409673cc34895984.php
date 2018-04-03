<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:60:"D:\wwwroot\qnysj1\wwwroot/app/admin/view/player/update_.html";i:1506070472;}*/ ?>
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
<div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
  <ul class="layui-tab-title">
    <li class="layui-this">选手审核</li>
  </ul>
</div> 
<form class="layui-form" action="" method="post" target="hidden_frame" id="fid" enctype="multipart/form-data">
<iframe style="display:none" name='hidden_frame' id="hidden_frame"></iframe> 
<input type="hidden" name="pid" value="<?php echo $pobj['id']; ?>"> 
<table class="layui-table" style="width:100%;">
  <colgroup>
    <col style="width:12%;">
    <col style="width:11%;">
	<col style="width:11%;">
    <col style="width:11%;">
	<col style="width:11%;">
    <col style="width:11%;">
	<col style="width:11%;">
    <col style="width:11%;">
    <col style="width:11%;">
  </colgroup>
  <thead>
    <tr>
      <th colspan="3"><?php echo $pobj['id']; ?></th>
      <th colspan="4"><?php if(($pobj['pid'] != 0)): ?><?php echo $pobj['pname']; else: endif; if(($pobj['sid'] == 0&&$pobj['back_4']==1)): ?>-<?php echo $pobj['sname']; else: ?>-<?php echo $pobj['unit']; endif; ?></th>
      <th colspan="2"><?php echo date("Y-m-d h:s",$pobj['add_time']); ?></th>
    </tr> 
  </thead>
  <tbody>
    <tr>
	  <th colspan="2">姓名</th>
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
	  <th colspan="2">汉语拼音</th>
      <td><?php echo $pobj['user_euname']; ?></td>
      <th>年龄</th>
	  <td><?php echo $pobj['user_age']; ?></td>
      <th>出生日期</th>
      <td><?php echo date('Y-m-d',$pobj['user_birth']); ?></td>
    </tr>
	 <tr>
	  <th colspan="2"><?php if(($pobj['back_4']==1)): ?>所属学校<?php else: ?>工作单位<?php endif; ?></th>
      <td colspan="5"><?php echo $pobj['pname']; if(($pobj['back_4']==1)): ?><?php echo $pobj['sname']; ?><?php echo $pobj['unit']; else: ?><?php echo $pobj['unit']; endif; ?></td>
    </tr>
	 <tr>
	  <th colspan="2">通讯地址</th>
      <td colspan="5"><?php echo $pobj['site']; ?></td>
    </tr>
	<tr>
	  <th colspan="2">联系电话</th>
      <td><?php echo $pobj['tel']; ?></td>
      <th>指导老师</th>
	  <td><?php echo $pobj['teacher']; ?></td>
      <th>邮政编码</th>
      <td><?php echo $pobj['postcode']; ?></td>
    </tr>
	<tr style="min-height:100px;<?php if($pobj['type']==28): ?>display:none;<?php endif; ?>">
	  <th colspan="2"><?php if($pobj['type']==1): ?>参赛人员<?php elseif($pobj['type']==27): ?>主创人员简介<?php else: ?>选手简介<?php endif; ?></th>
      <td colspan="7"><div style="min-height:80px"><?php echo $pobj['esc']; ?></div></td>
    </tr>
	<tr>
	  <th colspan="2">身份证正面照</th>
      <td colspan="7" style="padding-left: 18%;">
		<?php if(strpos($pobj['user_idcard_img'],'.zip')): ?><a href="<?php echo $pobj['user_idcard_img']; ?>" target="_blank" style="font-size: 15px;">下载查看</a>
		<?php elseif(strpos($pobj['user_idcard_img'],'.rar')): ?><a href="<?php echo $pobj['user_idcard_img']; ?>" target="_blank" style="font-size: 15px;">下载查看</a>
		<?php else: ?><img style="width:400px" src="<?php echo $pobj['user_idcard_img']; ?>"/>
		<?php endif; ?></td>
    </tr>
	<tr>
	  <th colspan="2"><?php if($pobj['type']==1): ?>节目名称<?php elseif($pobj['type']==27): ?>电影名<?php elseif($pobj['type']==28): ?>动漫创意作品名称<?php else: ?>作品名称<?php endif; ?></th>
      <td colspan="7"><?php echo $pobj['wname']; ?></td>
    </tr>
	<tr>
	  <th colspan="2">参选类别</th>
      <td colspan="7">
		<?php echo $pobj['type_name']; if(($pobj['maxid'] != 0)): ?>-<?php echo $pobj['maxname']; endif; if(($pobj['minid'] != 0)): ?>-<?php echo $pobj['minname']; endif; ?>
	  </td>
    </tr>
	<tr style="<?php if($pobj['type']==22): ?>display:none;<?php endif; ?>">
	  <th colspan="2"><?php if($pobj['type']==1): ?>节目简介<?php elseif($pobj['type']==27): ?>剧本简介<?php elseif($pobj['type']==31): ?>作品简介及创作思路<?php else: ?>作品简介<?php endif; ?></th>
      <td colspan="7"><div style="min-height:80px"><?php echo $pobj['intro']; ?></div></td>
    </tr>
	<tr>
	  <th colspan="2">推荐单位</th>
      <td colspan="7"><?php echo $pobj['rec']; ?></td>
    </tr>
	<tr>
	  <th colspan="2">推荐单位联系人及电话</th>
      <td colspan="7"><?php echo $pobj['rectel']; ?></td>
    </tr>
	<tr>
	  <th colspan="2">审核</th>
      <td><input type="hidden" name="stch" id="stch" value="<?php echo $pobj['status']; ?>"> 
      <input type="checkbox" lay-text="yes|no" lay-filter="stch" value="1" name="switch" <?php if($pobj['status'] == 1): ?>checked<?php endif; ?> lay-skin="switch">
	  </td>
		<td colspan="6">
		<input type="text" style="display:<?php if(($pobj['status'] == 1)): ?>none<?php else: ?>block<?php endif; ?>;" name="title" placeholder="未通过原因" autocomplete="off" class="layui-input">
		</td>
    </tr>
	<tr style="display:<?php if(($pobj['status'] == 1)): ?>table-row<?php else: ?>none<?php endif; ?>;">
	  <th colspan="2">比赛状态</th>
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
      <a href="javascript:window.close();" class="layui-btn layui-btn-primary">取消</a>
    </div>
  </div>
</form>
<script type="text/javascript" src="__STATIC__/layui/layui.js"></script>
<script type="text/javascript" src="__JS__/admin.js"></script>
<script type="text/javascript" src="__JS__/jquery.js"></script>
<script type="text/javascript">
  function callback(message,id,tych,cc) 
  { 
		alert(message);

		if(tych==1&&cc==2)
			window.opener.oop(id,3);
		else if(tych==1&&cc==1)
			window.opener.oop(id,2);
		else if(tych!=1)
			window.opener.oop(id,1);

		window.close();
  }
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