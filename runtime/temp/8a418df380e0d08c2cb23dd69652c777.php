<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:64:"D:\wwwroot\wchhui1\wwwroot/app/index/view/usercontrol/photo.html";i:1497248056;s:63:"D:\wwwroot\wchhui1\wwwroot/app/index/view/public/ModelBase.html";i:1497237796;}*/ ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>
  相册管理-<?php echo cookie('remark')['title']; ?></title>
  <meta name="keywords" content="<?php echo cookie('remark')['keyword']; ?>">
  <meta name="description" content="<?php echo cookie('remark')['description']; ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <link rel="stylesheet" type="text/css" href="__STATIC__/layui/css/layui.css" />
  <link rel="stylesheet" type="text/css" href="__STATIC__/css/global.css" />

<style>
.div_img{width:200px;max-height:250px;padding-left:10px;padding-top: 5px;float:left;}
.div_img img{width:100%;max-height:150px;}
.div_img p{margin-right:10px;color: #bbbbbb;}
.div_img p a{float: right;margin-right:10px;}

.max{width:100%;height:auto;}
.min{width:100px;height:auto;}

#id_img{max-height:200px;padding-left:10px;padding-top: 5px;}

</style>


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
		<li data-type="mine-jie" lay-id="index"><a href="<?php echo url('usercontrol/index'); ?>">来访纪录</a></li>
		<!--<li data-type="mine-jie" lay-id="index"><a href="<?php echo url('usercontrol/article'); ?>">动态</a></li>-->
		<li data-type="mine-jie" lay-id="index"><a href="<?php echo url('usercontrol/guestbook'); ?>">留言</a></li>
		<li data-type="mine-jie" lay-id="index" class="layui-this">相册（<span><?php echo count($list_hpoto); ?></span>）</li>
		
      </ul>

      <div class="layui-tab-content" style="padding: 20px 0;">
		<form class="layui-form" action="" method="post"  enctype="multipart/form-data" id="fid">
		  <div class="layui-form-item layui-form-text">
			<div class="layui-form-label">
				<input type="file" name="img" multiple='multiple' onChange="handleFiles(this)" style="display:none;">
				  <a class="layui-btn" onclick="getfile()" style="background-color: #ffffff;color: #191616;">
					<i class="layui-icon">&#xe608;</i> 选择图片
				  </a>
			</div>
			 <div class="layui-input-block" id="id_img">
				
			 </div>

		  </div>
		  <div class="layui-form-item">
			<div class="" style="float:right;">			
			   <button class="layui-btn"  lay-filter="formDemo" lay-submit>上传</button>
			</div>
		  </div>
		</form>
        <div class="layui-tab-item layui-show">
			<?php if(is_array($list_hpoto) || $list_hpoto instanceof \think\Collection || $list_hpoto instanceof \think\Paginator): $i = 0; $__LIST__ = $list_hpoto;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
			  <div class="div_img">
				<p style="height: 150px;"><img src='<?php echo $vo['img']; ?>' /></p>
				<p><?php echo date('Y-m-d',$vo['add_time']); ?><a href="javascript:void(0);" onclick="del(<?php echo $vo['id']; ?>)">删除</a></p>
			  </div>
           
			<?php endforeach; endif; else: echo "" ;endif; ?>

         
          <div id="LAY_page">
			<?php echo $list_hpoto->render(); ?>
		  </div>
        </div>

      </div>
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
$('.div_img').children('img').click(function(){
$(this).toggleClass('min');
$(this).toggleClass('max');
});
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

	function del(id)
	{
		layer.confirm('删除之后不可恢复，是否继续执行？', {
		  btn: ['继续', '取消'],
		  icon: 2,
		  btn1:function(index, layero){
				$.ajax({
				url:"<?php echo url('usercontrol/hpoto_del'); ?>",
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
