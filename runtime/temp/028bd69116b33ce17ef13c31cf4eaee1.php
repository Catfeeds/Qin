<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:67:"D:\amp\UPUPW_K2.1_64\htdocs\WwwRoot/app/index\view\index\index.html";i:1488448828;s:67:"D:\amp\UPUPW_K2.1_64\htdocs\WwwRoot/app/index\view\public\base.html";i:1489473610;}*/ ?>
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
	
<blockquote class="layui-elem-quote">admin，欢迎您</blockquote>
<fieldset class="layui-elem-field">
  <legend>特别提示</legend>
  <div class="layui-field-box">
    1、为了保障您的个人账户安全，请不要在网吧及公共场合登陆系统。<br/>
	2、请您在没有在电脑旁时，点击退出系统，已防止他人进入系统恶意操作。<br/>
	3、请将您的登陆密码设置为10-16位，并用字符和字母及数字组合。<br/>
	4、如系统有任何的操作异常，请截图保存并及时的联系管理员。
  </div>
</fieldset>

    </div>
	
    <div class="layui-footer">
        <div class="layui-main">
            @2016  云飞狼舞
        </div>
    </div>

</div>

<script type="text/javascript" src="__STATIC__/layui/layui.js"></script>
<script type="text/javascript" src="__JS__/admin.js"></script>

</body>
</html>