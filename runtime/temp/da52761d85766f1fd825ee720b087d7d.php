<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:58:"D:\wwwroot\qnysj1\wwwroot/app/admin/view/player/index.html";i:1508828084;s:57:"D:\wwwroot\qnysj1\wwwroot/app/admin/view/public/base.html";i:1500630732;}*/ ?>
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
    <li class="layui-this">报名列表</li>
    
  </ul>
</div> 
<blockquote class="layui-elem-quote layui-quote-nm">
<label class="layui-form-label">搜索：</label>
<form action="<?php echo url('',['page'=>1]); ?>" class="layui-form" method="post"  >
<div class="layui-input-inline">
<input type="text" name="title" id="stxt" style="width:360px;float:left;" placeholder="选手姓名/学校名称" class="layui-input">
</div>
<div class="layui-input-inline">
<select name="type" lay-filter="tter" style="width:200px;">
 <option value="" >请选择</option>
 <?php if(is_array($tlist) || $tlist instanceof \think\Collection || $tlist instanceof \think\Paginator): $i = 0; $__LIST__ = $tlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
	<option value="<?php echo $vo['id']; ?>"><?php echo $vo['name']; ?></option>
 <?php endforeach; endif; else: echo "" ;endif; ?>
</select>
</div>

<div class="layui-input-inline" id="maxid">
<select name="maxid" lay-filter="maxter" style="width:200px;">
 <option value="" >请选择</option>
</select>
</div>

<div class="layui-input-inline" id="minid">
<select name="minid" lay-filter="minter" style="width:200px;">
 <option value="" >请选择</option>
</select>
</div>

<div class="layui-input-inline" id="back_2">
<select name="back_2" lay-filter="minter" style="width:200px;">
 <option value="" >请选择</option>
 <option value="0" >未审核</option>
 <option value="1" >已审核</option>
 <option value="2" >已淘汰</option>
</select>
</div>

<input type="submit"  lay-submit class="layui-btn" value="搜索" style="margin-left: 15px;" lay-filter="formDemo" ></button>
</form>
</blockquote>
<table class="layui-table" lay-even>
  <thead>
    <tr>
      <th>ID</th>
      <th>选手姓名</th>
      <th>参选类别</th>
	  <th>所属赛区</th>
	  <th>报名时间</th>
	  <th>人气数</th>
	  <th>报名状态</th>
	  <th>比赛状态</th>
      <th>操作</th>
    </tr> 
  </thead>
  <tbody>
	<?php if(is_array($alist) || $alist instanceof \think\Collection || $alist instanceof \think\Paginator): $i = 0; $__LIST__ = $alist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <tr id="<?php echo $vo['id']; ?>">
      <th><?php echo $i; ?></th>
      <td><?php echo $vo['user_name']; ?></td>  
      <td><?php echo $vo['type_name']; if(($vo['maxid'] != 0)): ?>-<?php echo $vo['maxname']; endif; if(($vo['minid'] != 0)): ?>-<?php echo $vo['minname']; endif; ?></td>
	  <td>
	  <?php if(($vo['pid'] != 0)): ?>
	  <?php echo $vo['pname']; else: endif; if(($vo['back_4']==1)): ?>-<?php echo $vo['sname']; else: ?>-<?php echo $vo['unit']; endif; ?></td>
	  <td><?php echo date("y-m-d h:i",$vo['add_time']); ?></td>
	  <td><?php echo $vo['back_3']; ?></td>
	  <td><?php if(($vo['status'] == 0)): ?><a>未审核</a><?php elseif(($vo['status'] == 1)): ?><a style="color:#00aa00;">已审核</a><?php elseif(($vo['status'] == 2)): ?><a style="color:red;">未通过审核</a><?php elseif(($vo['status'] == 3)): ?><a>未审核(2次)</a><?php endif; ?></td>
	  <td>
	  <?php if(($vo['status'] == 0)): ?><a>未审核</a>
	  <?php elseif(($vo['back_2'] == 2)): ?><a style="color:red;">已淘汰</a>
	  <?php else: ?><a style="color:#00aa00;">已审核</a>
	  <?php endif; ?></td>
	
      <td >
		  <dl class="layui-btn-group">
			  <a  onclick="colors_1(<?php echo $vo['id']; ?>,this)" class="layui-btn">
			  审核
			  </a>
			  <a href="<?php echo url('player/player',['player_id'=>$vo['id']]); ?>" target="_break" class="layui-btn">
			  修改
			  </a>
			  <!--<a href="<?php echo url('player/art_list',['id'=>$vo['user_id']]); ?>" class="layui-btn">动态</a>
			  <a href="<?php echo url('player/getworks',['id'=>$vo['user_id']]); ?>" class="layui-btn">作品</a>-->
			  <a onclick="del(<?php echo $vo['id']; ?>)" class="layui-btn">删除</a>
		  </dl>
	  </td>
    </tr>
	
    <?php endforeach; endif; else: echo "" ;endif; ?>
  </tbody>
</table>

<?php echo $alist->render(); if($alist->render()): ?>
<span class="layui-laypage-total">到第<input min="1" name="pg_sum" id="pg_sum" style="width: 50px;height: 20px;" onkeyup="this.value=this.value.replace(/\D/, '');" value="1" class="layui-laypage-skip" type="number"> 页 <button type="button" id="pg_btn" name="pg_btn" onclick="pg_bbtn()" class="layui-laypage-btn">确定</button></span>
<?php endif; ?>
<a class="layui-btn" href="/admin/player/excel.html" style="margin-left: 20px;" target="_blank" >导出数据</a>
<a class="layui-btn" href="/admin/player/print_list.html" style="margin-left: 20px;" target="_blank" >批量打印(按比赛分类)</a>
<a class="layui-btn" href="/admin/player/print_list/d1/1.html" style="margin-left: 20px;" target="_blank" >批量打印(按学校选手)</a>


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
	  if(data.field['title']==""&&data.field['type']==''&&data.field['maxid']==''&&data.field['minid']==''&&data.field['back_2']=='')
	  {
		 layer.msg('搜索条件不能为空');
		 return false;
	  }
	});

	//比赛分类
	form.on('select(tter)', function(data){
		$.ajax({
			url:"/admin/player/gettp.html",
			type:"post",
			dataType:"json",
			data:{pid:$(data.elem).val()},
			error:function(){
				layer.msg('数据传输错误');
			},
			success:function(dd){
				if(dd.ls!='')
				{
					$("#maxid").children('select').empty();
					var aa="<option value='' selected>请选择</option>";
					$.each(dd.ls,function (key,value) {
					   aa+="<option value='"+value.id+"'>"+value.name+"</option>";
					});
					$("#maxid").children('select').append(aa);

					//刷新三级分类
					$("#minid").children('select').empty();
					var aa="<option value='' selected>请选择</option>";
					$("#minid").children('select').append(aa);

					form.render('select');
				}else{
					//刷新二级级分类
					$("#maxid").children('select').empty();
					var aa="<option value='' selected>请选择</option>";
					$("#maxid").children('select').append(aa);

					//刷新三级分类
					$("#minid").children('select').empty();
					var aa="<option value='' selected>请选择</option>";
					$("#minid").children('select').append(aa);

					form.render('select');
				}
			}
		});

	}); 

	form.on('select(maxter)', function(data){
		$.ajax({
			url:"/admin/player/gettp.html",
			type:"post",
			dataType:"json",
			data:{pid:$(data.elem).val()},
			error:function(){
				layer.msg('数据传输错误');
			},
			success:function(dd){
				if(dd.ls!='')
				{
					$("#minid").children('select').empty();
					var aa="<option value='' selected>请选择</option>";
					$.each(dd.ls,function (key,value) {
					   aa+="<option value='"+value.id+"'>"+value.name+"</option>";
					});
					$("#minid").children('select').append(aa);
					form.render('select');
				}else{
					//刷新三级分类
					$("#minid").children('select').empty();
					var aa="<option value='' selected>请选择</option>";
					$("#minid").children('select').append(aa);
					form.render('select');
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
					url:"<?php echo url('player/deletes'); ?>",
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

	function colors(id,ts)
	{
		$(ts).parent().parent().parent().css('background-color','#999');

		dd=window.showModalDialog("/admin/player/update_/id/"+id+".html",'',"dialogWidth=1400px;dialogHeight=800px;center:yes");

		if(dd==1)
		{
			$(ts).parent().parent().parent().children()[6].innerHTML="<a style='color:red;'>未通过审核</a>";
		}else if(dd==2){
			$(ts).parent().parent().parent().children()[6].innerHTML="<a style='color:#00aa00;'>已审核</a>";
			$(ts).parent().parent().parent().children()[7].innerHTML="<a style='color:#00aa00;'>已审核</a>";
		}else{
			$(ts).parent().parent().parent().children()[6].innerHTML="<a style='color:#00aa00;'>已审核</a>";
			$(ts).parent().parent().parent().children()[7].innerHTML="<a style='color:red;'>已淘汰</a>";
		}
	}

	function colors_1(id,ts)
	{

		$(ts).parent().parent().parent().css('background-color','#999');

		var iWidth = 800;
		var iHeight = 600;
		var iTop = (window.screen.availHeight - 30 - iHeight) / 2;
		var iLeft = (window.screen.availWidth - 10 - iWidth) / 2;
		var win = window.open("/admin/player/update_/id/"+id+".html", "弹出窗口", "width=" + iWidth + ", height=" + iHeight + ",top=" + iTop + ",left=" + iLeft + ",alwaysRaised=yes,depended=yes");
	}


	function oop(id,dd)
	{
		if(dd==1)
		{
			$("#"+id).children()[6].innerHTML="<a style='color:red;'>未通过审核</a>";
		}else if(dd==2){
			$("#"+id).children()[6].innerHTML="<a style='color:#00aa00;'>已审核</a>";
			$("#"+id).children()[7].innerHTML="<a style='color:#00aa00;'>已审核</a>";
		}else{
			$("#"+id).children()[6].innerHTML="<a style='color:#00aa00;'>已审核</a>";
			$("#"+id).children()[7].innerHTML="<a style='color:red;'>已淘汰</a>";
		}
	}

	function pg_bbtn()
	{
		$sum=$("#pg_sum").val();
		$t_url=$(".layui-box a").prop("href");
		$pg=$t_url.indexOf('page=');
		$url=$t_url.substring(0,$pg);

		window.location.href=$url+"page="+$sum;
	}


</script>

</body>
</html>