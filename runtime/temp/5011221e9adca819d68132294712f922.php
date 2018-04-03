<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:65:"D:\wwwroot\qnysj1\wwwroot/app/index/view/usercontrol/article.html";i:1500971986;s:62:"D:\wwwroot\qnysj1\wwwroot/app/index/view/public/ModelBase.html";i:1498016174;}*/ ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>
  动态管理-<?php echo cookie('remark')['title']; ?></title>
  <meta name="keywords" content="<?php echo cookie('remark')['keyword']; ?>">
  <meta name="description" content="<?php echo cookie('remark')['description']; ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <link rel="stylesheet" type="text/css" href="__STATIC__/layui/css/layui.css" />
  <link rel="stylesheet" type="text/css" href="__STATIC__/css/global.css" />

 <style>
.layui-elem-quote img{max-width: 200px;max-height: 200px;}
</style>
 

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
		<li data-type="mine-jie" lay-id="index"><a href="<?php echo url('usercontrol/index'); ?>">来访纪录</a></li>
		<li data-type="mine-jie" lay-id="index" class="layui-this">动态（<span><?php echo count($list_article); ?></span>）</li>
		<li data-type="mine-jie" lay-id="index"><a href="<?php echo url('usercontrol/photo'); ?>">相册</a></li>
		<li data-type="mine-jie" lay-id="index"><a href="<?php echo url('usercontrol/guestbook'); ?>">留言</a></li>
      </ul>
      <div class="layui-tab-content" style="padding: 20px 0;">
		<form class="layui-form" action="" method="post" id="fid">
		  <div class="layui-form-item layui-form-text">
			<div class="">
			  <textarea name="content" lay-filter="content" id="content" placeholder="请输入内容"  ></textarea>
			</div>
		  </div>
		  <div class="layui-form-item">
			<div class="" style="float:right;">			
			   
			   <input type="button" class="layui-btn" value="发布动态" lay-filter="fd" lay-submit/>
			</div>
		  </div>
		</form>
		<div  id="LAY_minemsg" style="margin-top: 10px;">
        <ul class="mine-msg">
		<?php if(is_array($list_article_json) || $list_article_json instanceof \think\Collection || $list_article_json instanceof \think\Paginator): $i = 0; $__LIST__ = $list_article_json;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
          <li data-id="<?php echo $vo['id']; ?>">
			
            <blockquote class="layui-elem-quote" style="max-height: 200px;overflow: hidden;">
			<?php if($vo['back_3']==1): ?>
			<em style="float: right;color:red;font-size: 22px;margin-left: 10px;">[精华]</em>
			<?php endif; ?>
			 <em style="float: right;"><?php echo $vo['com_number']; ?>评论/<?php echo $vo['p_number']; ?>转发</em>
              <a href="<?php echo url('user/art_info',['art_id'=>$vo['id'],'user_id'=>\think\Session::get('user_auth.id')]); ?>" target="_blank">
					<?php if($vo['json_img']!='/'): ?>
					<div style="float:left;"><img src="<?php echo $vo['json_img']; ?>" /></div>
					<?php endif; ?>
					<div style="float:left;"><?php echo $vo['esc']; ?></div>
			  </a>
			  
            </blockquote>
            <p><span><?php echo date('Y-m-d h:s',$vo['add_time']); ?></span>
			<a href="javascript:;" onclick='del(<?php echo $vo['id']; ?>);' class="layui-btn layui-btn-small layui-btn-danger fly-delete">删除</a></p>
          </li>
		  <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
		  <div id="LAY_page">
			<?php echo $list_article->render(); ?>
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
function del(id)
	{
		layer.confirm('删除之后不可恢复，是否继续执行？', {
		  btn: ['继续', '取消'],
		  icon: 2,
		  btn1:function(index, layero){
				$.ajax({
				url:"<?php echo url('usercontrol/article_del'); ?>",
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


layui.use(['form', 'layedit'], function(){
  var layedit = layui.layedit,form = layui.form();

	layedit.set({
	  uploadImage: {
		url: "<?php echo url('usercontrol/upload_img'); ?>"
		,type: "post" 
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

  form.on('submit(fd)', function(data){
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

		$.ajax({
			url:"<?php echo url('user/user_art_add'); ?>",
			type:"post",
			dataType:"json",
			data:{'content':layedit.getContent(index),'esc':layedit.getText(index)},
			success:function(dd){
				layer.msg(dd.msg, function(){
					parent.location.reload();
				});
			}
		})

  });

});
</script>


</body>
</html>
