<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:59:"D:\wwwroot\qnysj1\wwwroot/app/admin/view/player/player.html";i:1507514976;s:57:"D:\wwwroot\qnysj1\wwwroot/app/admin/view/public/base.html";i:1500630732;}*/ ?>
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
    <li class="layui-this">选手信息</li>
  </ul>
</div> 
          <form class="layui-form layui-form-pane"  style="padding: 20px 0;" action="" method="post" id="fid" enctype="multipart/form-data">

		  <div class="layui-form-item" style="<?php if($obj['maxid']!=0): ?>display:block;<?php else: ?>display:none;<?php endif; ?>">
				<label class="layui-form-label">参赛类别</label>
				<div class="layui-input-inline" id="type">
				<input type="hidden" name="tpid" id="type_id" value="<?php if($obj['maxid'] != 0): ?>2<?php elseif($obj['minid'] != 0): ?>3<?php else: ?>1<?php endif; ?>"> 
				  <select name="type" required lay-verify="required" lay-filter="tter" style="width:200px;">
					 <option value="" >请选择</option>
					 <?php if(is_array($tlist) || $tlist instanceof \think\Collection || $tlist instanceof \think\Paginator): $i = 0; $__LIST__ = $tlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						<option value="<?php echo $vo['id']; ?>" <?php if($obj['type'] == $vo['id']): ?>selected<?php endif; ?>><?php echo $vo['name']; ?></option>
					 <?php endforeach; endif; else: echo "" ;endif; ?>
				  </select>
				</div>
				<div class="layui-input-inline" id="maxid" style="display:<?php if(($obj['maxid'] == 0)): ?>none<?php else: ?>block<?php endif; ?>;" >
				  <select name="maxid" lay-filter="maxter" style="width:200px;">
					 <option value="" >请选择</option>
					 <?php if(($obj['maxid'] != 0)): if(is_array($maxlist) || $maxlist instanceof \think\Collection || $maxlist instanceof \think\Paginator): $i = 0; $__LIST__ = $maxlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
							<option value="<?php echo $vo['id']; ?>" <?php if($obj['maxid'] == $vo['id']): ?>selected<?php endif; ?>><?php echo $vo['name']; ?></option>
						<?php endforeach; endif; else: echo "" ;endif; endif; ?>
				  </select>
				</div>
				 <div class="layui-input-inline" id="minid" style="display:<?php if(($obj['minid'] == 0)): ?>none<?php else: ?>block<?php endif; ?>;">
				  <select name="minid" lay-filter="minter" style="width:200px;">
					 <option value="" >请选择</option>
					 <?php if(($obj['minid'] != 0)): if(is_array($minlist) || $minlist instanceof \think\Collection || $minlist instanceof \think\Paginator): $i = 0; $__LIST__ = $minlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
							<option value="<?php echo $vo['id']; ?>" <?php if($obj['minid'] == $vo['id']): ?>selected<?php endif; ?>><?php echo $vo['name']; ?></option>
						<?php endforeach; endif; else: echo "" ;endif; endif; ?>
				  </select>
				</div>
			  </div>

			  <div class="layui-form-item">
				<label class="layui-form-label">姓    名</label>
				<div class="layui-input-block">
				  <input type="text" name="user_name" placeholder="请输入名称"  value="<?php echo $obj['user_name']; ?>" required lay-verify="required" autocomplete="off" class="layui-input">
				</div>
			  </div>
			  <div class="layui-form-item" pane>
				<label class="layui-form-label">性    别</label>
				<div class="layui-input-block">
					<input type="radio" name="user_sex" value="男" title="男" <?php if(($obj['user_sex'] == '男')): ?>checked<?php endif; ?>>
					<input type="radio" name="user_sex" value="女" title="女" <?php if(($obj['user_sex'] == '女')): ?>checked<?php endif; ?>>
				</div>
			  </div>
			  <div class="layui-form-item">
				<label class="layui-form-label">年    龄</label>
				<div class="layui-input-block">
				  <input type="text" name="user_age" placeholder="请输入年龄" value="<?php echo $obj['user_age']; ?>" autocomplete="off" class="layui-input">
				</div>
			  </div>
			  <div class="layui-form-item">
				<label class="layui-form-label">民    族</label>
				<div class="layui-input-block">
				  <input type="text" name="race" placeholder="请输入民族"  value="<?php echo $obj['race']; ?>" autocomplete="off" class="layui-input">
				</div>
			  </div>
			  
			   <div class="layui-form-item">
				<label class="layui-form-label">出生日期</label>
				<div class="layui-input-block">
				<div class="layui-input-inline">
				  <input class="layui-input" name="user_birth" placeholder="选择时间" value="<?php echo date('Y-m-d',$obj['user_birth']); ?>" readonly onclick="layui.laydate({elem: this, istime: true, format: 'YYYY-MM-DD'})">
				  </div>
				  <div class="layui-form-mid layui-word-aux">如:2017-07-07</div>
				</div>
			  </div>
			  <div class="layui-form-item" pane>
				<label class="layui-form-label">照    片</label>
				<div class="layui-input-block">
					<input type="file" name="img" onChange="handleFiles(this,'id_img_1')" style="display:none;">
					<a class="layui-btn" onclick="getfile()" style="background-color: #ffffff;color: #191616;">
					<i class="layui-icon">&#xe608;</i> 选择图片
					</a>
					<a style="color:#777;font-size: 15px;">注：一寸彩色正面照片</a>
				</div>
				<div class="layui-input-block" id="id_img_1" style="padding-left: 20px;">
					<img style="width:200px" src="<?php echo $obj['img']; ?>"/>
				</div>
			  </div>
			  <div class="layui-form-item" pane>
				<label class="layui-form-label">所属状态</label>
				<div class="layui-input-block">
					<input type="radio" lay-filter="adi" name="tp" value="1" title="在校"<?php if(($obj['back_4'] == 1)): ?>checked<?php endif; ?>>
					<input type="radio" lay-filter="adi" name="tp" value="0" title="社会" <?php if(($obj['back_4']==0)): ?>checked<?php endif; ?>>
				</div>
			  </div>
			  <div class="layui-form-item">
				<label class="layui-form-label" id="tp_name">所属学校</label>
				<div class="layui-input-inline" id="pid">
				  <select name="pid" required lay-verify="required" lay-filter="pir" style="width:200px;">
					 <option value="" >请选择</option>
					 <?php if(is_array($plist) || $plist instanceof \think\Collection || $plist instanceof \think\Paginator): $i = 0; $__LIST__ = $plist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pj): $mod = ($i % 2 );++$i;?>
						<option value="<?php echo $pj['id']; ?>" <?php if($obj['pid'] == $pj['id']): ?>selected<?php endif; ?>><?php echo $pj['name']; ?></option>
					 <?php endforeach; endif; else: echo "" ;endif; ?>
				  </select>
				</div>
				<div class="layui-input-inline" id="cid" style="display:none;">
				  <select name="cid" lay-filter="cit" style="width:200px;">
					 <option value="" >请选择</option>
					 <?php if(($obj['pid'] != 0)): if(is_array($clist) || $clist instanceof \think\Collection || $clist instanceof \think\Paginator): $i = 0; $__LIST__ = $clist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cj): $mod = ($i % 2 );++$i;?>
							<option value="<?php echo $cj['id']; ?>" <?php if($obj['cid'] == $cj['id']): ?>selected<?php endif; ?>><?php echo $cj['name']; ?></option>
						<?php endforeach; endif; else: echo "" ;endif; endif; ?>
				  </select>
				</div>
				 <div class="layui-input-inline" id="sid" style="display:<?php if(($obj['back_4'] == 0)): ?>none<?php else: ?>block<?php endif; ?>;">
				  <select name="sid" lay-filter="sih" style="width:200px;">
					 <option value="" >请选择</option>
					 <?php if(($obj['pid'] != 0)): if(is_array($slist) || $slist instanceof \think\Collection || $slist instanceof \think\Paginator): $i = 0; $__LIST__ = $slist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sj): $mod = ($i % 2 );++$i;?>
							<option value="<?php echo $sj['id']; ?>" <?php if($obj['sid'] == $sj['id']): ?>selected<?php endif; ?>><?php echo $sj['name']; ?></option>
						<?php endforeach; endif; else: echo "" ;endif; ?>
						<option value='0'>其他</option>
					 <?php endif; ?>
					 
				  </select>
				</div>
				<div class="layui-input-inline" id="ssid" style="display:<?php if(($obj['back_4'] == 0&&$obj['sid']==1)): ?>block<?php else: ?>none<?php endif; ?>;">
				  <select name="ssid" lay-filter="ssih" style="width:200px;">
					 <option value="" >请选择</option>
					 <?php if(($obj['pid'] != 0)): if(is_array($sslist) || $sslist instanceof \think\Collection || $sslist instanceof \think\Paginator): $i = 0; $__LIST__ = $sslist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sj): $mod = ($i % 2 );++$i;?>
							<option value="<?php echo $sj['id']; ?>" <?php if($obj['ssid'] == $sj['id']): ?>selected<?php endif; ?>><?php echo $sj['name']; ?></option>
						<?php endforeach; endif; else: echo "" ;endif; ?>
						<option value='0'>其他</option>
					 <?php endif; ?>
					 
				  </select>
				</div>
			  </div>
			  <div class="layui-form-item" id="school_id" style="display:<?php if(($obj['back_4']==1&&$obj['sid']==0)): ?>block<?php else: ?>none<?php endif; ?>;">
				<label class="layui-form-label">学校名称</label>
				<div class="layui-input-block">
				  <input type="text" name="school_name" value="<?php echo $obj['sname']; ?>" placeholder="请输入所属学校名称" autocomplete="off" class="layui-input">
				</div>
			  </div>
			  <div class="layui-form-item" id="xx_id" style="display:<?php if(($obj['back_4']==0&&$obj['ssid']==0)): ?>block<?php elseif(($obj['back_4']==1)): ?>block<?php else: ?>none<?php endif; ?>;">
				<label class="layui-form-label">所属详细</label>
				<div class="layui-input-block">
				  <input type="text" name="unit" placeholder="<?php if(($obj['back_4']==0)): ?>请输入所属的工作单位名称<?php else: ?>请输入所属学校的院,系,级信息<?php endif; ?>"  value="<?php echo $obj['unit']; ?>" required lay-verify="required" autocomplete="off" class="layui-input">
				</div>
			  </div>
			  <div class="layui-form-item">
				<label class="layui-form-label">通讯地址</label>
				<div class="layui-input-block">
				  <input type="text" name="site" placeholder="请输入学校或者单位地址"  value="<?php echo $obj['site']; ?>" required lay-verify="required" autocomplete="off" class="layui-input">
				</div>
			  </div>
			  <div class="layui-form-item">
				<label class="layui-form-label">手机号码</label>
				<div class="layui-input-block">
				  <input type="text" name="tel" placeholder="请输入手机号码"  value="<?php echo $obj['tel']; ?>" required lay-verify="required" autocomplete="off" class="layui-input">
				</div>
			  </div>
			  <div class="layui-form-item">
				<label class="layui-form-label">指导老师</label>
				<div class="layui-input-block">
				  <input type="text" name="teacher" placeholder="请输入指导老师"  value="<?php echo $obj['teacher']; ?>" required lay-verify="required" autocomplete="off" class="layui-input">
				</div>
			  </div>
			  <div class="layui-form-item">
				<label class="layui-form-label">邮政编码</label>
				<div class="layui-input-block">
				  <input type="text" name="postcode" placeholder="请输入邮政编码"  value="<?php echo $obj['postcode']; ?>" required lay-verify="required" autocomplete="off" class="layui-input">
				</div>
			  </div>
			  <div class="layui-form-item layui-form-text" id="tt1" style="<?php if($obj['type']==28): ?>display:none;<?php else: ?>display:block;<?php endif; ?>" >
				<label class="layui-form-label"><?php if($obj['type']==1): ?>参赛人员<?php elseif($obj['type']==27): ?>主创人员简介<?php else: ?>选手简介<?php endif; ?></label>
				<div class="layui-input-block">
				  <textarea name="esc" placeholder="请输入<?php if($obj['type']==1): ?>参赛人数及姓名<?php elseif($obj['type']==27): ?>主创人员简介<?php else: ?>选手简介<?php endif; ?>" class="layui-textarea" value="<?php echo $obj['esc']; ?>"><?php echo $obj['esc']; ?></textarea>
				</div>
			  </div>
				<div class="layui-form-item" pane>
				<label class="layui-form-label">身份证正面照</label>
				<div class="layui-input-block">
					<input type="file" name="idcard_img" onChange="handleFiles(this,'id_img_2')" style="display:none;">
					<a class="layui-btn" onclick="getfile_2()" style="background-color: #ffffff;color: #191616;">
					<i class="layui-icon">&#xe608;</i> 选择文件
					</a>
					<a style="color:#777;font-size: 15px;">注：多人请将照片压缩成rar或zip格式上传</a>
				</div>
				<div class="layui-input-block" id="id_img_2" style="padding-left: 20px;">
					<?php if(strpos($obj['user_idcard_img'],'.zip')): ?><a href="<?php echo $obj['user_idcard_img']; ?>" target="_blank" style="font-size: 15px;">下载查看</a>
					<?php elseif(strpos($obj['user_idcard_img'],'.rar')): ?><a href="<?php echo $obj['user_idcard_img']; ?>" target="_blank" style="font-size: 15px;">下载查看</a>
					<?php else: ?><img style="width:200px" src="<?php echo $obj['user_idcard_img']; ?>"/>
					<?php endif; ?>
				</div>
			  </div>

			   <div class="layui-form-item" id="tt2">
				<label class="layui-form-label"><?php if($obj['type']==1): ?>节目名称<?php elseif($obj['type']==27): ?>电影名<?php elseif($obj['type']==28): ?>动漫创意作品名称<?php else: ?>作品名称<?php endif; ?></label>
				<div class="layui-input-block">
				  <input type="text" name="wname" placeholder="请输入<?php if($obj['type']==1): ?>节目名称<?php elseif($obj['type']==27): ?>电影名<?php elseif($obj['type']==28): ?>动漫创意作品名称<?php else: ?>作品名称<?php endif; ?>"  value="<?php echo $obj['wname']; ?>" autocomplete="off" class="layui-input">
				</div>
			  </div>
			  <div class="layui-form-item layui-form-text" id="tt3" style="<?php if($obj['type']==22): ?>display:none;<?php else: ?>display:block;<?php endif; ?>" >
				<label class="layui-form-label"><?php if($obj['type']==1): ?>节目简介<?php elseif($obj['type']==27): ?>剧本简介<?php elseif($obj['type']==31): ?>作品简介及创作思路<?php else: ?>作品简介<?php endif; ?></label>
				<div class="layui-input-block">
				  <textarea name="intro" placeholder="请输入<?php if($obj['type']==1): ?>节目简介<?php elseif($obj['type']==27): ?>剧本简介<?php elseif($obj['type']==31): ?>作品简介及创作思路<?php else: ?>作品简介<?php endif; ?>" class="layui-textarea"  value="<?php echo $obj['intro']; ?>"><?php echo $obj['intro']; ?></textarea>
				</div>
			  </div>
				<div class="layui-form-item layui-form-text" style="<?php if($obj['type']==27 or $obj['type']==28 or $obj['type']==31): ?>display:block;<?php else: ?>display:none;<?php endif; ?>" >
				<label id="dsb" class="layui-form-label" style="width: 100% !important;    font-size: 18px;">
				<?php if(($obj['maxid']=='29')): ?>
				
					注：9月30日截止投稿，请提交电子档作品至官方指定邮箱。&nbsp;&nbsp;<a href='/index/news/news_info/news_id/62.html' target='_blank' style='color: #488ff9;cursor: pointer;font-size: 16px;'>详细说明</a>
				<?php elseif(($obj['maxid']=='30')): ?>
					注：9月30日截止投稿，请提交纸质档作品至官方指定地址。&nbsp;&nbsp;<a href='/index/news/news_info/news_id/62.html' target='_blank' style='color: #488ff9;cursor: pointer;font-size: 16px;'>详细说明</a>
				<?php elseif(($obj['maxid']=='40')): ?>
					注：9月30日截止投稿，请提交纸质档和电子档作品各一份至官方指定邮箱与地址。&nbsp;&nbsp;<a href='/index/news/news_info/news_id/62.html' target='_blank' style='color: #488ff9;cursor: pointer;font-size: 16px;'>详细说明</a>
				<?php elseif(($obj['maxid']=='41')): ?>
					注：9月30日截止投稿，请提交纸质档作品至官方指定地址。&nbsp;&nbsp;<a href='/index/news/news_info/news_id/62.html' target='_blank' style='color: #488ff9;cursor: pointer;font-size: 16px;'>详细说明</a>
				<?php elseif(($obj['maxid']=='38')): ?>
					注：9月30日截止投稿，请提交纸质档作品至官方指定地址。&nbsp;&nbsp;<a href='/index/news/news_info/news_id/62.html' target='_blank' style='color: #488ff9;cursor: pointer;font-size: 16px;'>详细说明</a>
				<?php elseif(($obj['maxid']=='39')): ?>
					注：9月30日截止投稿，请提交纸质档作品至官方指定地址。&nbsp;&nbsp;<a href='/index/news/news_info/news_id/62.html' target='_blank' style='color: #488ff9;cursor: pointer;font-size: 16px;'>详细说明</a>
				<?php elseif($obj['type']==27): ?>
						注：10月20日截止投稿，请提交剧本（纸质档和电子档各一份）至官方指定邮箱和地址。&nbsp;&nbsp;<a href='/index/news/news_info/news_id/62.html' target='_blank' style='color: #488ff9;cursor: pointer;font-size: 16px;'>详细说明</a>
				<?php elseif($obj['type']==28): ?>
						注：9月30日截止投稿，请提交(动漫：电子档/漫画：纸质档)作品至官方指定邮箱。&nbsp;&nbsp;<a href='/index/news/news_info/news_id/62.html' target='_blank' style='color: #488ff9;cursor: pointer;font-size: 16px;'>详细说明</a>
				<?php elseif($obj['type']==31): ?>
						注：9月30日截止投稿 请提交(文学：电子档纸质档各一份/书法，绘画，摄影：纸质档)作品寄送至官方指定地址&nbsp;&nbsp;<a href='/index/news/news_info/news_id/62.html' target='_blank' style='color: #488ff9;cursor: pointer;font-size: 16px;'>详细说明</a>	
				<?php endif; ?>

				</label>
			  </div>

			  <div class="layui-form-item">
				<label class="layui-form-label">推荐单位</label>
				<div class="layui-input-block">
				  <input type="text" name="rec" placeholder="请输入推荐单位"  value="<?php echo $obj['rec']; ?>" autocomplete="off" class="layui-input">
				</div>
			  </div>
			  <div class="layui-form-item">
				<label class="layui-form-label">推荐单位联系人及电话</label>
				<div class="layui-input-block">
				  <input type="text" name="rectel" placeholder="请输入联系人及电话"  value="<?php echo $obj['rectel']; ?>" autocomplete="off" class="layui-input">
				</div>
			  </div>
			  <div class="layui-form-item" pane>
				<label class="layui-form-label">是否公开</label>
				<div class="layui-input-block">
					<input type="radio" name="so_open" value="1" title="是" <?php if(($obj['so_open'] == 1)): ?>checked<?php endif; ?>>
					<input type="radio" name="so_open" value="0" title="否" <?php if(($obj['so_open'] == 0)): ?>checked<?php endif; ?> >
				</div>
			  </div>
			  <?php if($obj['status']==2): ?>
			  <div class="layui-form-item layui-form-text" >
				<label class="layui-form-label">未通过审核原因</label>
				<div class="layui-input-block">
				      <textarea name="back_1" placeholder="请输入作品简介" class="layui-textarea"  value="<?php echo $obj['back_1']; ?>" readonly><?php echo $obj['back_1']; ?></textarea>
				</div>
			  </div>
			  <?php endif; ?>
              <div class="layui-form-item">
                <button class="layui-btn" key="set-mine" lay-filter="*" lay-submit>确认修改</button>
              </div>
            </form>
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

<script>

function getfile(){
	return  $("input[name='img']").click();
}

function getfile_2(){
	return  $("input[name='idcard_img']").click();
}

window.URL = window.URL || window.webkitURL;
	function handleFiles(obj,id_img) {
		
			fileList = document.getElementById(id_img);
			var files = obj.files;

			if(id_img=="id_img_2")
			{
				var photoExt=obj.value.substr(obj.value.lastIndexOf(".")).toLowerCase();//获得文件后缀名
					if(photoExt=='.rar'||photoExt=='.zip'){
						fileList.innerHTML="";
						fileList.append("   已选择文件："+obj.value);
						return false;
					}
			}

			img = new Image();
			if(window.URL){	
				img.src = window.URL.createObjectURL(files[0]); //创建一个object URL，并不是你的本地路径
				img.className = "lay-img";
				img.style="width:200px";
				img.onload = function(e) {
					window.URL.revokeObjectURL(this.src); //图片加载后，释放object URL
				}
				if(fileList.firstElementChild){
					 // fileList.removeChild(fileList.firstElementChild);
					fileList.innerHTML="";
				} 
				fileList.appendChild(img);
			}else if(window.FileReader){
				//opera不支持createObjectURL/revokeObjectURL方法。我们用FileReader对象来处理
				var reader = new FileReader();
				reader.readAsDataURL(files[0]);
				reader.onload = function(e){	
						img.src = this.result;
						img.className = "lay-img";
						// fileList.removeChild(fileList.firstElementChild);
					fileList.innerHTML="";
						fileList.appendChild(img);
				}
			}else
			{
				//ie
				obj.select();
				obj.blur();
				var nfile = document.selection.createRange().text;
				document.selection.empty();
				img.src = nfile;
				img.className = "lay-img";
				// fileList.removeChild(fileList.firstElementChild);
					fileList.innerHTML="";
				fileList.appendChild(img);
			}
		
	}

layui.use('form', function(){
  var form = layui.form();

  form.on('radio(adi)', function(data){
	if(data.value=='0')
	{
		$("#sid").css('display','none');
		$("#school_id").css('display','none');

		$("#ssid").css('display','block');
		$("#xx_id").css('display','none');

		$("#tp_name").html('所属地区');
		$("input[name='unit']").prop('placeholder','请输入所属的工作单位名称');
	}
	else
	{
		$("#sid").css('display','block');
		$("#ssid").css('display','none');
		$("#xx_id").css('display','block');
		$("#tp_name").html('所属学校');
		$("input[name='unit']").prop('placeholder','请输入所属校区的院,系,级信息');
	}
  });  

  //监听开关
  form.on('switch(stch)', function(data){
	
	if(data.elem.checked)
	{
		$("#stch").prop('value','1');
	}else{
		$("#stch").prop('value','0');
	}

  }); 
  
  //监听下拉
  form.on('select(pir)', function(data){
		/*$.ajax({
			url:"<?php echo url('usercontrol/getregc'); ?>",
			type:"post",
			dataType:"json",
			data:{pid:$(data.elem).val()},
			error:function(){
				layer.msg('数据传输错误');
			},
			success:function(dd){
				$("#cid").children('select').empty();
				var aa="<option value='' selected>请选择</option>";
				$.each(dd.ls,function (key,value) {
				   aa+="<option value='"+value.id+"'>"+value.name+"</option>";
				});
				$("#cid").children('select').append(aa);
				form.render('select');

			}
		});*/

		if($("input[name='tp']:checked").val()=='1')
		{
			$.ajax({
				url:"<?php echo url('usercontrol/getshool_p'); ?>",
				type:"post",
				dataType:"json",
				data:{pid:$(data.elem).val()},
				error:function(){
					layer.msg('数据传输错误');
				},
				success:function(dd){
					$("#sid").children('select').empty();
					var aa="<option value='' selected>请选择</option>";
					$.each(dd.ls,function (key,value) {
					   aa+="<option value='"+value.id+"'>"+value.name+"</option>"; 
					});
					aa+="<option value='0'>其他</option>";
					$("#sid").children('select').append(aa);
					 form.render('select');
				}
			});

		}else{
			$.ajax({
				url:"<?php echo url('usercontrol/getss_p'); ?>",
				type:"post",
				dataType:"json",
				data:{pid:$(data.elem).val()},
				error:function(){
					layer.msg('数据传输错误');
				},
				success:function(dd){
					$("#ssid").children('select').empty();
					var aa="<option value='' selected>请选择</option>";
					$.each(dd.ls,function (key,value) {
					   aa+="<option value='"+value.id+"'>"+value.name+"</option>"; 
					});
					aa+="<option value='0'>其他</option>";
					$("#ssid").children('select').append(aa);
					form.render('select');
				}
			});
		
		}


	}); 
	
	form.on('select(cit)', function(data){

		if($("input[name='tp']:checked").val()=='1')
		{
			$.ajax({
				url:"<?php echo url('usercontrol/getshool'); ?>",
				type:"post",
				dataType:"json",
				data:{cid:$(data.elem).val()},
				error:function(){
					layer.msg('数据传输错误');
				},
				success:function(dd){
					$("#sid").children('select').empty();
					var aa="<option value='' selected>请选择</option>";
					$.each(dd.ls,function (key,value) {
					   aa+="<option value='"+value.id+"'>"+value.name+"</option>"; 
					});
					aa+="<option value='0'>其他</option>";
					$("#sid").children('select').append(aa);
					 form.render('select');
				}
			});

		}

	});

	form.on('select(sih)', function(data){
		if(data.value=='0')
		{
			$("#school_id").css('display','block');
			
		}
		else
		{
			$("#school_id").css('display','none');
			
		}

	  });

	  form.on('select(ssih)', function(data){
		if(data.value=='0')
		{
			$("#xx_id").css('display','block');
			
		}
		else
		{
			$("#xx_id").css('display','none');
			
		}

	  });


	//比赛分类
	form.on('select(tter)', function(data){
		$.ajax({
			url:"<?php echo url('usercontrol/gettp'); ?>",
			type:"post",
			dataType:"json",
			data:{pid:$(data.elem).val()},
			error:function(){
				layer.msg('数据传输错误');
			},
			success:function(dd){
				if(dd.ls!='')
				{
					$("#type_id").prop('value','2');
					$("#maxid").css('display','block');
					$("#minid").css('display','none');

					$("#maxid").children('select').empty();
					var aa="<option value='' selected>请选择</option>";
					$.each(dd.ls,function (key,value) {
					   aa+="<option value='"+value.id+"'>"+value.name+"</option>";
					});
					$("#maxid").children('select').append(aa);
					form.render('select');
				}else{
					$("#type_id").prop('value','1');
					$("#maxid").css('display','none');
					$("#minid").css('display','none');
				}
			}
		});

	}); 

	form.on('select(maxter)', function(data){

		var tt=$(data.elem).val();
		if(tt=='29')
		{
			$("#dsb").html("注：9月30日截止投稿，请提交电子档作品至官方指定邮箱。&nbsp;&nbsp;<a href='/index/news/news_info/news_id/62.html' target='_blank' style='color: #488ff9;cursor: pointer;font-size: 16px;'>详细说明</a>");
		}else if(tt=='30'){
			$("#dsb").html("注：9月30日截止投稿，请提交纸质档作品至官方指定地址。&nbsp;&nbsp;<a href='/index/news/news_info/news_id/62.html' target='_blank' style='color: #488ff9;cursor: pointer;font-size: 16px;'>详细说明</a>");
		}else if(tt=='40'){
			$("#dsb").html("注：9月30日截止投稿，请提交纸质档和电子档作品各一份至官方指定邮箱与地址。&nbsp;&nbsp;<a href='/index/news/news_info/news_id/62.html' target='_blank' style='color: #488ff9;cursor: pointer;font-size: 16px;'>详细说明</a>");
		}else if(tt=='41'){
			$("#dsb").html("注：9月30日截止投稿，请提交纸质档作品至官方指定地址。&nbsp;&nbsp;<a href='/index/news/news_info/news_id/62.html' target='_blank' style='color: #488ff9;cursor: pointer;font-size: 16px;'>详细说明</a>");
		}else if(tt=='38'){
			$("#dsb").html("注：9月30日截止投稿，请提交纸质档作品至官方指定地址。&nbsp;&nbsp;<a href='/index/news/news_info/news_id/62.html' target='_blank' style='color: #488ff9;cursor: pointer;font-size: 16px;'>详细说明</a>");
		}else if(tt=='39'){
			$("#dsb").html("注：9月30日截止投稿，请提交纸质档作品至官方指定地址。&nbsp;&nbsp;<a href='/index/news/news_info/news_id/62.html' target='_blank' style='color: #488ff9;cursor: pointer;font-size: 16px;'>详细说明</a>");
		}

		$.ajax({
			url:"<?php echo url('usercontrol/gettp'); ?>",
			type:"post",
			dataType:"json",
			data:{pid:$(data.elem).val()},
			error:function(){
				layer.msg('数据传输错误');
			},
			success:function(dd){
				if(dd.ls!='')
				{
					$("#type_id").prop('value','3');
					$("#minid").css('display','block');

					$("#minid").children('select').empty();
					var aa="<option value='' selected>请选择</option>";
					$.each(dd.ls,function (key,value) {
					   aa+="<option value='"+value.id+"'>"+value.name+"</option>";
					});
					$("#minid").children('select').append(aa);
					form.render('select');
				}else{
					$("#type_id").prop('value','2');
					$("#minid").css('display','none');
				}
			}
		});

	});

  //监听提交
  form.on('submit(formDemo)', function(data){

	  if(data.field['tp']=="1"&&data.field['sid']=='')
	  {
		 
			layer.msg("请选择学校");
			return false;
		
	  }

	  if(data.field['tpid']==3)
	  {
			if(data.field['type']==''||data.field['maxid']==''||data.field['minid']=='')
			  {
				 
					layer.msg("请确定比赛分类");
					return false;
				
			  }
	  }else if(data.field['tpid']==2)
	  {
			if(data.field['type']==''||data.field['maxid']=='')
			  {
				 
					layer.msg("请确定比赛分类");
					return false;
				
			  }
	  }

	  var r=/^[0-9]+.?[0-9]*$/;
	  if(!r.test(data.field['user_age'])){
		  layer.msg("年龄只能输入数字");
		  return false;
      }

  });
});
</script>

</body>
</html>