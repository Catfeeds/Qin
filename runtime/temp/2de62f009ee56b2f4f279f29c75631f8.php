<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:48:"D:\web\lua\WwwRoot/app/index\view\txt\index.html";i:1488522501;s:50:"D:\web\lua\WwwRoot/app/index\view\public\base.html";i:1488514893;}*/ ?>
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
            <ul class="user-nav">
                <li class="user-nav-item">
                    <a href="<?php echo url('login/logout'); ?>">
                        <i class="layui-icon" style="font-size: 12px;">&#xe623;</i>
                        退出
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="layui-side">
		<ul class="layui-nav layui-nav-tree">
		  <li class="layui-nav-item layui-nav-itemed">
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
	
<blockquote class="layui-elem-quote">文件列表</blockquote>
<blockquote class="layui-elem-quote  layui-quote-nm"><input type="file" name="txt" class="layui-upload-file"></blockquote>
<table class="layui-table">
  <thead>
    <tr>
      <th>ID</th>
      <th>文件名</th>
      <th>文件链接</th>
      <th>操作</th>
    </tr> 
  </thead>
  <tbody>
	<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <tr>
      <th><?php echo $i; ?></th>
      <td><?php echo $vo['filename']; ?></td>
      <td>http://lua.vyunkong.com/code/<?php echo $vo['filename']; ?></td>
      <td>
		  <a id="del_txt" href="javascript:;" url="<?php echo url('txt/del','filename='.$vo['filename'],'html',true); ?>">删除</a>
	  </td>
    </tr>
    <?php endforeach; endif; else: echo "" ;endif; ?>
  </tbody>
</table>

    </div>
	
    <div class="layui-footer">
        <div class="layui-main">
            @2016  云飞狼舞
        </div>
    </div>

</div>

<script type="text/javascript" src="__STATIC__/layui/layui.js"></script><script type="text/javascript" src="__JS__/admin.js"></script>

</body>
</html>