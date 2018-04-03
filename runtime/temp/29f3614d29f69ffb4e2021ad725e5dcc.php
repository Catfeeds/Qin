<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:69:"D:\amp\UPUPW_K2.1_64\htdocs\QN/app/index\view\usercontrol\player.html";i:1492745788;s:67:"D:\amp\UPUPW_K2.1_64\htdocs\QN/app/index\view\public\ModelBase.html";i:1493095052;}*/ ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>
  报名信息-<?php echo cookie('remark')['title']; ?></title>
  <meta name="keywords" content="<?php echo cookie('remark')['keyword']; ?>">
  <meta name="description" content="<?php echo cookie('remark')['description']; ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <link rel="stylesheet" type="text/css" href="__STATIC__/layui/css/layui.css" />
  <link rel="stylesheet" type="text/css" href="__STATIC__/css/global.css" />




</head>
<body>


<div class="header">
  <div class="main">
    <a class="logo" href="/" title="Fly">个人中心</a>
	 
    <div class="nav">
      <a class="nav-this" href="<?php echo url('index/index'); ?>" >
        <i class="iconfont icon-ui"></i>首页
      </a>

	  <a class="nav-this" href="<?php echo url('module/index'); ?>" >
        <i class="iconfont icon-wenda"></i>社区论坛
      </a>

	  <a class="nav-this" href="<?php echo url('usercontrol/index'); ?>" >
        <i class="iconfont icon-ui"></i>用户中心
      </a>
      
    </div>   
    
    <div class="nav-user"> 
	<?php if(\think\Session::get('user_auth.id')==''): ?>
		<a class="unlogin" href="/index/login/index"><i class="iconfont icon-touxiang"></i></a>      
		<span><a href="/index/login/index">登入</a><a href="/index/user/reg">注册</a></span>
		<!--<p class="out-login">
        <a href="" onclick="layer.msg('正在通过QQ登入', {icon:16, shade: 0.1, time:0})" class="iconfont icon-qq" title="QQ登入"></a>
        <a href="" onclick="layer.msg('正在通过微博登入', {icon:16, shade: 0.1, time:0})" class="iconfont icon-weibo" title="微博登入"></a>
       </p>-->
	<?php else: ?>
      <!-- 登入后的状态 -->
      <a class="avatar" href="<?php echo url('usercontrol/index'); ?>">
        <img src="<?php echo \think\Session::get('user_auth.user_img'); ?>">
        <cite><?php echo \think\Session::get('user_auth.name'); ?></cite>
        <i></i>
      </a>
      <div class="nav">
        <a href="<?php echo url('login/logout'); ?>"><i class="iconfont icon-tuichu" style="top: 0; font-size: 22px;"></i>退了</a>
      </div>
		  <?php if((\think\Session::get('tiish') > 0)): ?>
			<a class="nav-message" href="<?php echo url('usercontrol/index'); ?>" title="您有<?php echo \think\Session::get('tiish'); ?>条未阅读的消息"><?php echo \think\Session::get('tiish'); ?></a>
		  <?php endif; endif; ?>
    </div>
  </div>
</div>


 
<div class="main fly-user-main layui-clear">
 
  <ul class="layui-nav layui-nav-tree layui-inline" lay-filter="user">
    <li class="layui-nav-item">
      <a href="<?php echo url('user/index',['user_id'=>\think\Session::get('user_auth.id')]); ?>">
        <i class="layui-icon">&#xe609;</i>
        我的主页
      </a>
    </li>
    <li class="layui-nav-item <?php if($pg==1): ?>layui-this<?php endif; ?>">
      <a href="<?php echo url('usercontrol/index'); ?>">
        <i class="layui-icon">&#xe612;</i>
        用户中心
      </a>
    </li>
    <li class="layui-nav-item <?php if($pg==2): ?>layui-this<?php endif; ?>">
      <a href="<?php echo url('usercontrol/user_info'); ?>">
        <i class="layui-icon">&#xe620;</i>
        基本设置
      </a>
    </li>
	<?php if(($up==1)): ?>
	<li class="layui-nav-item <?php if($pg==3): ?>layui-this<?php endif; ?>">
      <a href="<?php echo url('usercontrol/player'); ?>">
        <i class="layui-icon">&#xe629;</i>
        报名信息
      </a>
    </li>
	<?php endif; if(($up==0)): ?>
	<li class="layui-nav-item <?php if($pg==3): ?>layui-this<?php endif; ?>">
      <a href="<?php echo url('player/index'); ?>">
        <i class="layui-icon">&#xe629;</i>
        我要报名
      </a>
    </li>
	<?php endif; if(($um==0)): ?>
	<li class="layui-nav-item <?php if($pg==5): ?>layui-this<?php endif; ?>">
      <a href="<?php echo url('usercontrol/module_add'); ?>">
        <i class="layui-icon">&#xe609;</i>
        申请社团
      </a>
    </li>
	<?php endif; if(($um==1)): ?>
	<li class="layui-nav-item <?php if($pg==6): ?>layui-this<?php endif; ?>">
      <a href="<?php echo url('usercontrol/module_update'); ?>">
        <i class="layui-icon">&#xe60a;</i>
        社团管理
      </a>
    </li>
	<?php endif; ?>
	<li class="layui-nav-item <?php if($pg==4): ?>layui-this<?php endif; ?>">
      <a href="<?php echo url('usercontrol/message'); ?>">
        <i class="layui-icon" <?php if((\think\Session::get('ageii') > 0)): ?>style="font-size: 30px; color: #1E9FFF;"<?php endif; ?>>&#xe611;</i>
        通知信息
      </a>
    </li>

  </ul>

  <div class="site-tree-mobile layui-hide">
    <i class="layui-icon">&#xe602;</i>
  </div>
  <div class="site-mobile-shade"></div>
 
  <div class="fly-panel fly-panel-user" pad20>

  

    <div class="layui-tab layui-tab-brief" lay-filter="user">

      <ul class="layui-tab-title" id="LAY_mine">
        <li data-type="mine-jie" lay-id="index" class="layui-this">报名表</li>
      </ul>
          <form class="layui-form layui-form-pane"  style="padding: 20px 0;" action="" method="post" id="fid" enctype="multipart/form-data">
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
					<input type="radio" name="sex" value="女" title="女" <?php if(($obj['user_sex'] == '女')): ?>checked<?php endif; ?>>
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
				  <input class="layui-input" name="user_birth" placeholder="选择时间" value="<?php echo date('Y-m-d',$obj['user_birth']); ?>" onclick="layui.laydate({elem: this, istime: true, format: 'YYYY-MM-DD'})">
				  </div>
				  <div class="layui-form-mid layui-word-aux">如:2017-07-07</div>
				</div>
			  </div>
			  <div class="layui-form-item" pane>
				<label class="layui-form-label">照    片</label>
				<div class="layui-input-block">
					<input type="file" name="img" onChange="handleFiles(this)" style="display:none;">
				  <a class="layui-btn" onclick="getfile()" style="background-color: #ffffff;color: #191616;">
					<i class="layui-icon">&#xe608;</i> 选择图片
				  </a>
				</div>
				<div class="layui-input-block" id="id_img">
					<img style="width:200px" src="<?php echo $obj['img']; ?>"/>
				</div>
			  </div>
			  <div class="layui-form-item" pane>
				<label class="layui-form-label">所属群体</label>
				<div class="layui-input-block">
					<input type="radio" lay-filter="adi" name="tp" value="1" title="在校"<?php if(($obj['type'] == 1)): ?>checked<?php endif; ?>>
					<input type="radio" lay-filter="adi" name="tp" value="2" title="社会" <?php if(($obj['type'] == 2)): ?>checked<?php endif; ?>>
				</div>
			  </div>
			  <div class="layui-form-item">
				<label class="layui-form-label">所属地区</label>
				<div class="layui-input-inline" id="pid">
				  <select name="pid" required lay-verify="required" lay-filter="pir" style="width:200px;">
					 <option value="" >请选择</option>
					 <?php if(is_array($plist) || $plist instanceof \think\Collection || $plist instanceof \think\Paginator): $i = 0; $__LIST__ = $plist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pj): $mod = ($i % 2 );++$i;?>
						<option value="<?php echo $pj['id']; ?>" <?php if($obj['pid'] == $pj['id']): ?>selected<?php endif; ?>><?php echo $pj['name']; ?></option>
					 <?php endforeach; endif; else: echo "" ;endif; ?>
				  </select>
				</div>
				<div class="layui-input-inline" id="cid" >
				  <select name="cid" required lay-verify="required" lay-filter="cit" style="width:200px;">
					 <option value="" >请选择</option>
					 <?php if(($obj['pid'] != 0)): if(is_array($clist) || $clist instanceof \think\Collection || $clist instanceof \think\Paginator): $i = 0; $__LIST__ = $clist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cj): $mod = ($i % 2 );++$i;?>
							<option value="<?php echo $cj['id']; ?>" <?php if($obj['cid'] == $cj['id']): ?>selected<?php endif; ?>><?php echo $cj['name']; ?></option>
						<?php endforeach; endif; else: echo "" ;endif; endif; ?>
				  </select>
				</div>
				 <div class="layui-input-inline" id="sid" style="display:<?php if(($obj['type'] == 2)): ?>none<?php else: ?>block<?php endif; ?>;">
				  <select name="sid" style="width:200px;">
					 <option value="" >请选择</option>
					 <?php if(($obj['cid'] != 0)): if(is_array($slist) || $slist instanceof \think\Collection || $slist instanceof \think\Paginator): $i = 0; $__LIST__ = $slist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sj): $mod = ($i % 2 );++$i;?>
							<option value="<?php echo $sj['id']; ?>" <?php if($obj['sid'] == $sj['id']): ?>selected<?php endif; ?>><?php echo $sj['name']; ?></option>
						<?php endforeach; endif; else: echo "" ;endif; endif; ?>
				  </select>
				</div>
			  </div>
			  <div class="layui-form-item">
				<label class="layui-form-label">所属详细</label>
				<div class="layui-input-block">
				  <input type="text" name="unit" placeholder="请输入 工作单位 或 学校院系"  value="<?php echo $obj['unit']; ?>" required lay-verify="required" autocomplete="off" class="layui-input">
				</div>
			  </div>
			  <div class="layui-form-item">
				<label class="layui-form-label">通讯地址</label>
				<div class="layui-input-block">
				  <input type="text" name="site" placeholder="请输入通讯地址"  value="<?php echo $obj['site']; ?>" required lay-verify="required" autocomplete="off" class="layui-input">
				</div>
			  </div>
			  <div class="layui-form-item">
				<label class="layui-form-label">联系电话</label>
				<div class="layui-input-block">
				  <input type="text" name="tel" placeholder="请输入联系电话"  value="<?php echo $obj['tel']; ?>" required lay-verify="required" autocomplete="off" class="layui-input">
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
			  <div class="layui-form-item">
				<label class="layui-form-label">比赛类别</label>
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
			  <div class="layui-form-item layui-form-text" >
				<label class="layui-form-label">选手简介</label>
				<div class="layui-input-block">
				  <textarea name="esc" placeholder="请输入参赛人数及姓名，简介" class="layui-textarea"  value="<?php echo $obj['esc']; ?>"><?php echo $obj['esc']; ?></textarea>
				</div>
			  </div>
			   <div class="layui-form-item">
				<label class="layui-form-label">作品名称</label>
				<div class="layui-input-block">
				  <input type="text" name="wname" placeholder="请输入作品名称"  value="<?php echo $obj['wname']; ?>" autocomplete="off" class="layui-input">
				</div>
			  </div>
			  <div class="layui-form-item layui-form-text" >
				<label class="layui-form-label">作品简介</label>
				<div class="layui-input-block">
				  <textarea name="intro" placeholder="请输入作品简介" class="layui-textarea"  value="<?php echo $obj['intro']; ?>"><?php echo $obj['intro']; ?></textarea>
				</div>
			  </div>
			  <div class="layui-form-item">
				<label class="layui-form-label">推荐单位</label>
				<div class="layui-input-block">
				  <input type="text" name="rec" placeholder="请输入作品名称"  value="<?php echo $obj['rec']; ?>" autocomplete="off" class="layui-input">
				</div>
			  </div>
			  <div class="layui-form-item">
				<label class="layui-form-label">推荐单位联系人及电话</label>
				<div class="layui-input-block">
				  <input type="text" name="rectel" placeholder="请输入联系人及电话"  value="<?php echo $obj['rectel']; ?>" autocomplete="off" class="layui-input">
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

  </div>

</div>
  

<div class="footer">
  <p><a href="/index/index">青年文化艺术节</a> 2017 &copy; <a href="#">qinguol.com</a></p>
  <p>
    <a href="#" target="_blank">官方授权</a>
    <a href="#" target="_blank">官方微博</a>
    <a href="#" target="_blank">微信公众号</a>
  </p>
</div>


<script type="text/javascript" src="__STATIC__/layui/layui.js"></script>
<script type="text/javascript" src="__STATIC__/layui/admin.js"></script>
<script type="text/javascript" src="__STATIC__/layui/jquery.js"></script>


<script>

function getfile(){
	return  $("input[type='file']").click();
}
window.URL = window.URL || window.webkitURL;
	function handleFiles(obj) {
		
			fileList = document.getElementById("id_img");
			var files = obj.files;
			img = new Image();
			if(window.URL){	
				img.src = window.URL.createObjectURL(files[0]); //创建一个object URL，并不是你的本地路径
				img.className = "lay-img";
				img.style="width:200px";
				img.onload = function(e) {
					window.URL.revokeObjectURL(this.src); //图片加载后，释放object URL
				}
				if(fileList.firstElementChild){
					 fileList.removeChild(fileList.firstElementChild);
				} 
				fileList.appendChild(img);
			}else if(window.FileReader){
				//opera不支持createObjectURL/revokeObjectURL方法。我们用FileReader对象来处理
				var reader = new FileReader();
				reader.readAsDataURL(files[0]);
				reader.onload = function(e){	
						img.src = this.result;
						img.className = "lay-img";
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
				img.onload=function(){
				  
				}
				fileList.appendChild(img);
			}
		
	}

layui.use('form', function(){
  var form = layui.form();

  form.on('radio(adi)', function(data){
	if(data.value=='2')
	{
		$("#sid").css('display','none');
	}
	else
	{
		$("#sid").css('display','block');
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
		$.ajax({
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
		});

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
					$("#sid").children('select').append(aa);
					 form.render('select');
				}
			});

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
