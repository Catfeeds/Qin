<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:67:"D:\amp\UPUPW_K2.1_64\htdocs\QN/app/admin\view\article\art_list.html";i:1490265397;s:62:"D:\amp\UPUPW_K2.1_64\htdocs\QN/app/admin\view\public\base.html";i:1490264818;}*/ ?>
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
                <img src="__IMG__/avatar.jpg" alt="" class="layui-circle">
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
			  <dd><a href="<?php echo url('article/art_list'); ?>"><i class="layui-icon">&#xe602;</i>动态列表</a></dd>
			</dl>
		  </li>
		  <li class="layui-nav-item">
			<a href="javascript:;"><i class="layui-icon">&#xe622;</i> 文件管理</a>
			<dl class="layui-nav-child">
			  <dd><a href="<?php echo url('txt/index'); ?>"><i class="layui-icon">&#xe602;</i>文件列表</a></dd>
			</dl>
		  </li>
		  <li class="layui-nav-item">
			<a href="javascript:;"><i class="layui-icon">&#xe620;</i>系统管理</a>
			<dl class="layui-nav-child">
			  <dd><a href="<?php echo url('login/logout'); ?>"><i class="layui-icon">&#xe602;</i>退出系统</a></dd>
			</dl>
		  </li>
		</ul>
    </div>
	
    <div class="layui-body">
	
<div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
  <ul class="layui-tab-title">
    <li class="layui-this"  >用户动态</li>
  </ul>
</div> 
<blockquote class="layui-elem-quote layui-quote-nm">
<label class="layui-form-label">搜索：</label>
<form class="layui-form" action="" method="post" >
<input type="text" name="title" id="stxt" style="width:360px;float:left;" placeholder="账号/姓名" class="layui-input">
<input class="layui-input" name="times" placeholder="选择时间" style="width: 20%;float: left;" onclick="layui.laydate({elem: this, istime: true, format: 'YYYY-MM-DD'})">
<button class="layui-btn"  lay-submit  style="margin-left: 15px;" lay-filter="formDemo" >搜索</button>
</form>
</blockquote>
<table class="layui-table">
  <thead>
    <tr>
      <th>ID</th>
      <th>用户账号</th>
      <th>用户昵称</th>
	  <th>浏览数</th>
	  <th>评论数</th>
	  <th>动态状态</th>
	  <th>发布时间</th>
      <th>操作</th>
    </tr> 
  </thead>
  <tbody>
	<?php if(is_array($alist) || $alist instanceof \think\Collection || $alist instanceof \think\Paginator): $i = 0; $__LIST__ = $alist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <tr>
      <th><?php echo $i; ?></th>
      <td><?php echo $vo['user_name']; ?></td>
      <td><?php echo substr($vo['content'],0,12); ?></td>
	  <td><?php echo $vo['look']; ?></td>
	  <td><?php echo $vo['back_1']; ?></td>
	  <td><input type="checkbox" lay-filter="yyy" lay-skin="switch" id="<?php echo $vo['id']; ?>" lay-text="yes|no" <?php if(($vo['status'] == 1)): ?>checked<?php endif; ?>></td>
	  <td><?php echo date("y-m-d h:s",$vo['add_time']); ?></td>
      <td >
	  <dl class="layui-btn-group">
		  <a href="<?php echo url('article/art_xx',['id'=>$vo['id']]); ?>" class="layui-btn">详细</a>
		  <a href="<?php echo url('article/z_list',['id'=>$vo['id']]); ?>" class="layui-btn">浏览记录</a>
		  <a href="<?php echo url('article/p_list',['id'=>$vo['id']]); ?>" class="layui-btn">评论记录</a>
		  <a onclick="del(<?php echo $vo['id']; ?>)" class="layui-btn">删除</a>
		  </dl>
	  </td>
    </tr>
	
    <?php endforeach; endif; else: echo "" ;endif; ?>
  </tbody>
</table>

    </div>
	
    <div class="layui-footer">
        <div class="layui-main">
            当前登录账号：  <?php echo \think\Session::get('admin_auth.nickname'); ?> 
        </div>
    </div>

</div>

<script type="text/javascript" src="__STATIC__/layui/layui.js"></script>
<script type="text/javascript" src="__JS__/admin.js"></script>

<script type="text/javascript">
  layui.use(['form'], function(){
	var form = layui.form();

	form.on('submit(formDemo)', function(data){
	  if(data.field['times']==""&&data.field['title']=="")
	  {
		 layer.msg('搜索条件不能为空');
		 return false;
	  }
	});
	
	form.on('switch(yyy)', function(data){
	  var iii=0;
	  if(data.elem.checked)
		{
			iii=1;
		}
		else
		{
			iii=0;
		}
			$.ajax({
				url:"<?php echo url('article/art_update'); ?>",
				type:"post",
				dataType:"json",
				data:{aid:data.elem.id,stt:iii},
				success:function(dd){
					if(dd.codo>0){
						layer.msg(dd.e);
					}else{
						layer.msg(dd.e, function(){
							parent.location.reload();
						});
					}
				}
			});
	});
});

	function del(id)
	{
			layer.confirm('删除之后不可恢复，是否继续执行？', {
			  btn: ['继续', '取消'],
			  icon: 2,
			  btn1:function(index, layero){
					$.ajax({
					url:"<?php echo url('article/art_delete'); ?>",
					type:"post",
					dataType:"json",
					data:{aid:id},
					success:function(dd){
						layer.msg(dd.e, function(){
							parent.location.reload();
						});
					}

				});
			 }
			});

	}

</script>

</body>
</html>