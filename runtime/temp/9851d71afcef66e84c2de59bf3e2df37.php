<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:60:"D:\amp\UPUPW_K2.1_64\htdocs\QN/app/index\view\adm\index.html";i:1490068455;s:62:"D:\amp\UPUPW_K2.1_64\htdocs\QN/app/index\view\public\base.html";i:1489992151;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <block name="title"><title>Lua文件管理系统</title></block>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" type="text/css" href="__STATIC__/layui/css/layui.css" />
	<link rel="stylesheet" type="text/css" href="__CSS__/admin.css" />
</head>
<body id="admin">

<div class="layui-layout-admin">
    <div class="layui-header">
        <!-- logo -->
        <a href="<?php echo url('index/index'); ?>" class="logo layui-left"><img src="" alt="">Lua文件管理系统</a>

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
			
			<li class="layui-nav-item layui-nav-itemed">
			<a href="javascript:;">管理员</a>
			<dl class="layui-nav-child">
			  <dd><a href="<?php echo url('adm/index'); ?>">管理员列表</a></dd>
			</dl>
		  </li>
		  <li class="layui-nav-item">
			<a href="javascript:;">文件管理</a>
			<dl class="layui-nav-child">
			  <dd><a href="<?php echo url('txt/index'); ?>">文件列表</a></dd>
			</dl>
		  </li>
		  <li class="layui-nav-item">
			<a href="javascript:;">系统管理</a>
			<dl class="layui-nav-child">
			  <dd><a href="<?php echo url('login/logout'); ?>">退出系统</a></dd>
			</dl>
		  </li>
		</ul>
    </div>
	
    <div class="layui-body">
	
<div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
  <ul class="layui-tab-title">
    <li class="layui-this">管理员列表</li>
    <li onclick="javascript:window.location.href='<?php echo url('adm/insert'); ?>'">添加管理员</li>
  </ul>
</div> 
<blockquote class="layui-elem-quote layui-quote-nm">
<label class="layui-form-label">搜索：</label>
<form action="" method="post"  >
<input type="text" name="title" id="stxt" style="width:360px;float:left;" required lay-verify="required" placeholder="账号/姓名" class="layui-input">
<input type="submit" class="layui-btn" value="搜索" style="margin-left: 15px;" lay-filter="formDemo" ></button>
</form>
</blockquote>
<table class="layui-table">
  <thead>
    <tr>
      <th>ID</th>
      <th>管理员账号</th>
      <th>管理员姓名</th>
	  <th>管理地区(学校)</th>
	  <th>账户状态</th>
	  <th>登录次数</th>
	  <th>最近登录</th>
      <th>操作</th>
    </tr> 
  </thead>
  <tbody>
	<?php if(is_array($alist) || $alist instanceof \think\Collection || $alist instanceof \think\Paginator): $i = 0; $__LIST__ = $alist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <tr>
      <th><?php echo $i; ?></th>
      <td><?php echo $vo['name']; ?></td>
      <td><?php echo $vo['nickname']; ?></td>
	  <td><?php echo $vo['pname']; if(($vo['cname'] != '')): ?>-<?php endif; ?><?php echo $vo['cname']; if(($vo['sname'] != '')): ?>-<?php endif; ?><?php echo $vo['sname']; ?></td>
	  <td><?php if(($vo['status'] == 1)): ?><a>启用</a><?php else: ?>冻结<?php endif; ?></td>
	  <td><?php echo $vo['login']; ?></td>
	  <td><?php echo date("y-m-d h:s",$vo['last_time']); ?></td>
      <td class="layui-btn-group">
		  <a class="layui-btn">编辑</a>
		  <a class="layui-btn">权限</a>
		  <a onclick="del(<?php echo $vo['id']; ?>)" class="layui-btn">删除</a>
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

<script type="text/javascript" src="__JS__/jquery.js"></script>
<script type="text/javascript">
  function del(id)
	{
		if(confirm("删除之后不可恢复，是否继续执行？"))
		{  
            $.ajax({
				url:"<?php echo url('adm/deletes'); ?>",
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
	}

</script>

</body>
</html>