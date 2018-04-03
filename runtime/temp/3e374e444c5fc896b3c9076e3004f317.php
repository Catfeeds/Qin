<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:65:"D:\wwwroot\wchhui1\wwwroot/app/super_admin/view/button/index.html";i:1496564468;s:64:"D:\wwwroot\wchhui1\wwwroot/app/super_admin/view/public/base.html";i:1496551450;}*/ ?>
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
			<a href="javascript:;"><i class="layui-icon">&#xe638;</i> 素材管理</a>
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
		</ul>
		
    </div>
    <div class="layui-body">
	
<div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
  <ul class="layui-tab-title">
    <li class="layui-this">菜单列表</li>
    <li onclick="javascript:window.location.href='<?php echo url('button/insert'); ?>'">添加菜单</li>
  </ul>
</div> 
<table class="layui-table" lay-even>
  <thead>
    <tr>
      <th>序号</th>
      <th>菜单标题</th>
	  <th>菜单类型</th>
	  <th>菜单效果</th>
	  <th>菜单编链接</th>
      <th>操作</th>
    </tr> 
  </thead>
  <tbody>
	<?php if(is_array($alist) || $alist instanceof \think\Collection || $alist instanceof \think\Paginator): $i = 0; $__LIST__ = $alist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <tr>
      <th><?php echo $i; ?></th>
      <td><?php if($vo['pid']==2): ?>|----<?php endif; ?><?php echo $vo['name']; ?></td>
	  <td><?php if($vo['pid']==0): ?>一级列表菜单<?php elseif($vo['pid']==1): ?>一级普通菜单<?php elseif($vo['pid']==2): ?>二级普通菜单<?php endif; ?></td>
	  <td><?php if($vo['type']=='click'): ?>推送图文<?php elseif($vo['type']=='view_limited'): ?>跳转图文<?php elseif($vo['type']=='view'): ?>跳转网页<?php else: ?>显示列表<?php endif; ?></td>
	  <td><?php if($vo['url']!=''): ?><?php echo $vo['url']; else: ?>无<?php endif; ?></td>
      <td >
		  <dl class="layui-btn-group">
			  <a onclick="del(<?php echo $vo['id']; ?>)" class="layui-btn">删除</a>
			  <a href="<?php echo url('button/update',['bt_id'=>$vo['id']]); ?>" class="layui-btn">编辑</a>
		  </dl>
	  </td>
    </tr>
	
    <?php endforeach; endif; else: echo "" ;endif; ?>
  </tbody>
</table>

	<?php echo $alist->render(); ?>

	<a class="layui-btn" onclick="token()" style="margin-left: 20px;" target="_blank" >同步数据到公众号</a>


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
  layui.use(['form'], function(){
	var form=layui.form();

	form.on('submit(formDemo)', function(data){
	  if(data.field['title']=="")
	  {
		 layer.msg('搜索条件不能为空');
		 return false;
	  }
	});
});

	function del(id)
	{
			layer.confirm('删除之后不可恢复，是否继续执行？', {
			  btn: ['继续', '取消'],
			  icon: 2,
			  btn1:function(index, layero){
					$.ajax({
					url:"<?php echo url('button/deletes'); ?>",
					type:"post",
					dataType:"json",
					data:{aid:id},
					success:function(dd){
						layer.msg(dd.msg, function(){
							parent.location.reload();
						});
					}

				});
			 }
			});

	}

	function token()
	{
		layer.confirm('同步数据后将会影响公众号菜单显示,是否确定同步？', {
			  btn: ['继续', '取消'],
			  icon: 3,
			  btn1:function(index, layero){
					$.ajax({
					url:"<?php echo url('button/get_wc_caidan'); ?>",
					type:"post",
					dataType:"json",
					success:function(dd){
						layer.msg(dd.msg);
					}

				});
			 }
			});
	}

</script>

</body>
</html>