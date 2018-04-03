<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:62:"D:\wwwroot\qnysj1\wwwroot/app/super_admin/view/news/index.html";i:1496542988;s:63:"D:\wwwroot\qnysj1\wwwroot/app/super_admin/view/public/base.html";i:1498377698;}*/ ?>
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
    <li class="layui-this">素材列表</li>
    <!--<li onclick="javascript:window.location.href='<?php echo url('news/insert'); ?>'">添加素材</li>-->
  </ul>
</div> 
<table class="layui-table" lay-even>
  <thead>
    <tr>
      <th>序号</th>
      <th>图文标题</th>
	  <th>图文编码</th>
      <th>操作</th>
    </tr> 
  </thead>
  <tbody>
	<?php if(is_array($alist) || $alist instanceof \think\Collection || $alist instanceof \think\Paginator): $i = 0; $__LIST__ = $alist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <tr>
      <th><?php echo $i; ?></th>
      <td><?php echo $vo['content']['news_item'][0]['title']; ?></td>
	  <td><?php echo $vo['media_id']; ?></td>
      <td >
		  <dl class="layui-btn-group">
			  <a onclick="del(<?php echo $vo['media_id']; ?>)" class="layui-btn">删除</a>
		  </dl>
	  </td>
    </tr>
	
    <?php endforeach; endif; else: echo "" ;endif; ?>
  </tbody>
</table>
<div class="layui-box layui-laypage layui-laypage-default">
	<a href="/super_admin/news/index.html?page=<?php echo $page-1; ?>" data-page="«">«</a>
	<a href="/super_admin/news/index.html?page=<?php echo $page; ?>" data-page="<?php echo $page; ?>"><?php echo $page; ?></a>
	<a href="/super_admin/news/index.html?page=<?php echo $page+1; ?>" data-page="»">»</a>
</div>

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
					url:"<?php echo url('news/deletes'); ?>",
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

</script>

</body>
</html>