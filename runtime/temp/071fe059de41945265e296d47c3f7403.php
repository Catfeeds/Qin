<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:68:"D:\wwwroot\qnysj1\wwwroot/app/index/view/usercontrol/module_add.html";i:1499844538;s:62:"D:\wwwroot\qnysj1\wwwroot/app/index/view/public/ModelBase.html";i:1498016174;}*/ ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>
  社团申请-<?php echo cookie('remark')['title']; ?></title>
  <meta name="keywords" content="<?php echo cookie('remark')['keyword']; ?>">
  <meta name="description" content="<?php echo cookie('remark')['description']; ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <link rel="stylesheet" type="text/css" href="__STATIC__/layui/css/layui.css" />
  <link rel="stylesheet" type="text/css" href="__STATIC__/css/global.css" />




<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?8e85dbf31e589d58cb1b25a97ad602be";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>

</head>
<body>


<div class="header">
  <div class="main">
    <a class="logo" href="/" title="Fly">个人中心</a>
	 
    <div class="nav">
      <a class="nav-this" href="<?php echo url('index/index'); ?>" >
        <i class="iconfont icon-ui"></i>首页
      </a>

	  <!--<a class="nav-this" href="<?php echo url('module/index'); ?>" >
        <i class="iconfont icon-wenda"></i>社区论坛
      </a>

	  <a class="nav-this" href="<?php echo url('usercontrol/index'); ?>" >
        <i class="iconfont icon-ui"></i>用户中心
      </a>-->
      
    </div>   
    
    <div class="nav-user"> 
	<?php if(\think\Session::get('user_auth.id')==''): ?>
		<a class="unlogin" href="/index/login/index"><i class="iconfont icon-touxiang"></i></a>      
		<span><a href="/index/login/reg.html">登入</a><a href="/index/login/login.html">注册</a></span>
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
        <i class="layui-icon">&#xe612;</i>
        我的主页
      </a>
    </li>
	<?php if(($um==1)): ?>
	 <li class="layui-nav-item">
      <a href="<?php echo url('school/school_info',['school_id'=>$school_id]); ?>">
        <i class="layui-icon">&#xe613;</i>
        学校主页
      </a>
    </li>
	<?php endif; ?>
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
      <a href="<?php echo url('usercontrol/index_player'); ?>">
        <i class="layui-icon">&#xe629;</i>
        报名信息
      </a>
    </li>
	<?php endif; if(($up==0)): ?>
	<li class="layui-nav-item <?php if($pg==3): ?>layui-this<?php endif; ?>">
      <a href="<?php echo url('player/index_type'); ?>">
        <i class="layui-icon">&#xe629;</i>
        我要报名
      </a>
    </li>
	<?php endif; if(($um==1)): ?>
	<li class="layui-nav-item <?php if($pg==5): ?>layui-this<?php endif; ?>">
      <a href="<?php echo url('usercontrol/module_add'); ?>">
        <i class="layui-icon">&#xe609;</i>
        校园投稿
      </a>
    </li>
	<li class="layui-nav-item <?php if($pg==6): ?>layui-this<?php endif; ?>">
      <a href="<?php echo url('usercontrol/module_update'); ?>">
        <i class="layui-icon">&#xe60a;</i>
        学校管理
      </a>
    </li>
	<li class="layui-nav-item <?php if($pg==7): ?>layui-this<?php endif; ?>">
      <a href="<?php echo url('usercontrol/index_player_school'); ?>">
        <i class="layui-icon">&#xe629;</i>
        报名管理
      </a>
    </li>
	<?php endif; if(($cm==1)): ?>
	<li class="layui-nav-item <?php if($pg==8): ?>layui-this<?php endif; ?>">
      <a href="<?php echo url('usercontrol/index_player_community'); ?>">
        <i class="layui-icon">&#xe629;</i>
        报名管理
      </a>
    </li>
	<?php endif; ?>
	<li class="layui-nav-item <?php if($pg==4): ?>layui-this<?php endif; ?>">
      <a href="<?php echo url('usercontrol/message'); ?>">
        <i class="layui-icon" <?php if((\think\Session::get('ageii') > 0)): ?>style="font-size: 30px; color: #1E9FFF;"<?php endif; ?>>&#xe611;</i>
        通知信息
      </a>
    </li>
	<?php if(($um==1)): ?>
	<li class="layui-nav-item">
      <a href="<?php echo url('news/news_info',['news_id'=>61]); ?>">
        <i class="layui-icon" >&#xe60c;</i>
        使用须知
      </a>
    </li>
	<?php endif; ?>

  </ul>

  <div class="site-tree-mobile layui-hide">
    <i class="layui-icon">&#xe602;</i>
  </div>
  <div class="site-mobile-shade"></div>
 
  <div class="fly-panel fly-panel-user" pad20>

  

    <div class="layui-tab layui-tab-brief" lay-filter="user">

      <ul class="layui-tab-title" id="LAY_mine">
		<li data-type="mine-jie" lay-id="index"><a href="<?php echo url('usercontrol/module_index'); ?>">投稿信息</a></li>
        <li data-type="mine-jie" lay-id="index" class="layui-this">校园投稿</li>
      </ul>
          <form class="layui-form layui-form-pane"  style="padding: 20px 0;" action="" method="post" id="fid" enctype="multipart/form-data">
			  <div class="layui-form-item">
				<label class="layui-form-label">资讯标题</label>
				<div class="layui-input-block">
				  <input type="text" name="aname" placeholder="请输入名称" autocomplete="off" class="layui-input">
				</div>
			  </div>
			  <div class="layui-form-item" pane>
				<label class="layui-form-label">资讯图片</label>
				<div class="layui-input-block">
					<input type="file" name="img" onChange="handleFiles(this,'id_img')" style="display:none;">
				  <a class="layui-btn" onclick="getfile()" style="background-color: #ffffff;color: #191616;">
					<i class="layui-icon">&#xe608;</i> 选择图片
				  </a>
				</div>
				<div class="layui-input-block" id="id_img">
					<img style="width:200px" src="__IMG__/timg.jpg"/>
				</div>
			  </div>
			   <div class="layui-form-item">
				<label class="layui-form-label">投稿人</label>
				<div class="layui-input-block">
				  <input type="text" name="edit" placeholder="请输入名称" autocomplete="off" class="layui-input">
				</div>
			  </div>
			  <div class="layui-form-item">
				<label class="layui-form-label">资讯分类</label>
				<div class="layui-input-inline" id="tid">
				  <select name="tid" lay-filter="pir" style="width:200px;">
					 <option value="" >请选择</option>
					 <option value="1">校园之声</option>
					 <option value="2">校园院报</option>
					
				  </select>
				</div>
			  </div>
			  <div class="layui-form-item">
				<label class="layui-form-label">投稿学校</label>
				<div class="layui-input-inline" id="pid">
				  <select name="pid"  lay-filter="pir" style="width:200px;">
					 <option value="" >请选择</option>
					 <?php if(is_array($plist) || $plist instanceof \think\Collection || $plist instanceof \think\Paginator): $i = 0; $__LIST__ = $plist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pj): $mod = ($i % 2 );++$i;?>
						<option value="<?php echo $pj['id']; ?>"><?php echo $pj['name']; ?></option>
					 <?php endforeach; endif; else: echo "" ;endif; ?>
				  </select>
				</div>
				<div class="layui-input-inline" id="cid" style="display:none;" >
				  <select name="cid" lay-filter="cit" style="width:200px;">
					 <option value="" >请选择</option>
				  </select>
				</div>
				<div class="layui-input-inline" id="sid">
				  <select name="sid"  style="width:200px;">
					 <option value="" >请选择</option>
				  </select>
				</div>
			  </div>
			  <div class="layui-form-item layui-form-text" >
				<label class="layui-form-label">页面关键字</label>
				<div class="layui-input-block">
				  <textarea name="keywords" placeholder="请输入关键字" class="layui-textarea" ></textarea>
				</div>
			  </div>
			  <div class="layui-form-item layui-form-text" >
				<label class="layui-form-label">页面描述</label>
				<div class="layui-input-block">
				  <textarea name="description" placeholder="请输入描述" class="layui-textarea" ></textarea>
				</div>
			  </div>
			  <div class="layui-form-item layui-form-text" >
				<label class="layui-form-label">资讯简介</label>
				<div class="layui-input-block">
				  <textarea name="esc" placeholder="请输入简介" class="layui-textarea" ></textarea>
				</div>
			  </div>
			  <div class="layui-form-item layui-form-text" >
				<label class="layui-form-label">资讯内容</label>
				<div class="layui-input-block">
				  <textarea name="content" id="content"  placeholder="请输入内容" class="layui-textarea" ></textarea>
				</div>
			  </div>

              <div class="layui-form-item">
                <input type="button" class="layui-btn" key="set-mine" lay-filter="formDemo" value="确认提交" lay-submit />
              </div>
            </form>
          </div>


  </div>

</div>
  

<div class="footer">
  <p><a href="/index/index">青年文化艺术节</a> @2017 &copy; <a href="http://www.qnysj.com">www.qnysj.com</a></p>
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
	return  $("input[name='img']").click();
}
function getfile1(){
	return  $("input[name='user_img']").click();
}
window.URL = window.URL || window.webkitURL;
	function handleFiles(obj,dw) {
		
			fileList = document.getElementById(dw);
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

layui.use(['form','layedit'], function(){
  var form = layui.form(),layedit = layui.layedit;
  layedit.set({
	  uploadImage: {
		url: '/index/usercontrol/upload_img' //接口url
		,type: 'post' //默认post

	  }
	});

 var index = layedit.build('content',{
	tool: [
  ,'face' //表情
  ,'image' //插入图片
  ,'|' //分割线
  ,'left' //左对齐
  ,'center' //居中对齐
  ,'right' //右对齐
  ,'link' //超链接
  ,'unlink' //清除链接
  ],
  height: 240

  }); //建立编辑器

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
					$("#sid").children('select').append(aa);
					 form.render('select');
				}
			});

	}); 
	
	form.on('select(cit)', function(data){

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

	});

  //监听提交
  form.on('submit(formDemo)', function(data){
		if(data.field['aname']==""){
			layer.msg('资讯名称不能为空');
			return false;
		}
		if(data.field['img']==""){
			layer.msg('图片不能为空');
			return false;
		}
		if(data.field['edit']==""){
			layer.msg('投稿人不能为空');
			return false;
		}
		if(data.field['tid']==""){
			layer.msg('资讯分类不能为空');
			return false;
		}
		if(data.field['sid']==""){
			layer.msg('学校不能为空');
			return false;
		}
		if(data.field['esc']==""){
			layer.msg('资讯简介不能为空');
			return false;
		}

		var tt=layedit.getContent(index);
		var tet=layedit.getText(index);
		if(tt=="动态内容..."||tt=="")
		{
			layer.msg('请输入动态内容');
			return false;
		}

		if(tt.length>1200)
		{
			layer.msg('内容过长，图片与字数超过限制！');
			return false;
		}

		if(tt=='')
		{
			 layer.msg('内容不能为空',{icon: 5,time: 500}); 
			 return false;
		}

		
		
		$("#fid").submit();
  });
});
</script>


</body>
</html>
