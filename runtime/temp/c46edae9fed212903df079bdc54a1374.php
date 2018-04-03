<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:74:"D:\wwwroot\qnysj1\wwwroot/app/index/view/usercontrol/community_player.html";i:1497418638;s:62:"D:\wwwroot\qnysj1\wwwroot/app/index/view/public/ModelBase.html";i:1498016174;}*/ ?>

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
		<li data-type="mine-jie" lay-id="index"><a href="<?php echo url('usercontrol/index_player_community'); ?>">本区报名信息</a></li>
        <li data-type="mine-jie" lay-id="index" class="layui-this">报名信息</li>
      </ul>
          <form class="layui-form layui-form-pane"  style="padding: 20px 0;" action="" method="post" id="fid" enctype="multipart/form-data">
			<div class="layui-form-item">
				<label class="layui-form-label">填报分类</label>
				<div class="layui-input-block">
				  <input type="text" Readonly name="type" placeholder="请输入名称"  value="<?php echo $obj['type_name']; if(($obj['maxid'] != 0)): ?>-<?php echo $obj['maxname']; endif; if(($obj['minid'] != 0)): ?>-<?php echo $obj['minname']; endif; ?>" required lay-verify="required" autocomplete="off" class="layui-input">
				</div>
			  </div>
			  <div class="layui-form-item">
				<label class="layui-form-label">姓    名</label>
				<div class="layui-input-block">
				  <input type="text" Readonly name="user_name" placeholder="请输入名称"  value="<?php echo $obj['user_name']; ?>" required lay-verify="required" autocomplete="off" class="layui-input">
				</div>
			  </div>
			  <div class="layui-form-item">
				<label class="layui-form-label">性    别</label>
				<div class="layui-input-block">
				  <input type="text" Readonly name="user_sex" placeholder="请输入年龄" value="<?php echo $obj['user_sex']; ?>" autocomplete="off" class="layui-input">
				</div>
			  </div>
			  <div class="layui-form-item">
				<label class="layui-form-label">年    龄</label>
				<div class="layui-input-block">
				  <input type="text" Readonly name="user_age" placeholder="请输入年龄" value="<?php echo $obj['user_age']; ?>" autocomplete="off" class="layui-input">
				</div>
			  </div>
			  <div class="layui-form-item">
				<label class="layui-form-label">民    族</label>
				<div class="layui-input-block">
				  <input type="text" Readonly name="race" placeholder="请输入民族"  value="<?php echo $obj['race']; ?>" autocomplete="off" class="layui-input">
				</div>
			  </div>
			  
			   <div class="layui-form-item">
				<label class="layui-form-label">出生日期</label>
				<div class="layui-input-block">
				<div class="layui-input-inline">
				  <input class="layui-input" name="user_birth" placeholder="选择时间" value="<?php echo date('Y-m-d',$obj['user_birth']); ?>">
				  </div>
				  <div class="layui-form-mid layui-word-aux">如:2017-07-07</div>
				</div>
			  </div>
			  <div class="layui-form-item" pane>
				<label class="layui-form-label">照    片</label>
				<div class="layui-input-block">
					<img style="width:200px" src="<?php echo $obj['img']; ?>"/>
				</div>
			  </div>
			  <div class="layui-form-item" >
				<label class="layui-form-label">所属状态</label>
				<div class="layui-input-block">
					<input type="text" Readonly name="back_4" placeholder="请输入状态"  value="<?php if(($obj['back_4']==1&&$obj['sid']==0)): ?>社会<?php else: ?>在校<?php endif; ?>" autocomplete="off" class="layui-input">
				</div>
			  </div>
			  <div class="layui-form-item">
				<label class="layui-form-label">所属地区</label>
				<div class="layui-input-block">
					<input type="text" Readonly name="pname" placeholder="请输入地区"  value="<?php echo $obj['pname']; ?>" autocomplete="off" class="layui-input">
				</div>
			  </div>
			  <?php if(($obj['back_4']==1)): ?>
			  <div class="layui-form-item">
				<label class="layui-form-label">所属详细</label>
				<div class="layui-input-block">
				  <input type="text" Readonly name="school_name" placeholder="请输入工作单位 或 学校院系"  value="<?php echo $obj['sname']; ?>" required lay-verify="required" autocomplete="off" class="layui-input">
				</div>
			  </div>
			  <div class="layui-form-item">
				<label class="layui-form-label">所属详细</label>
				<div class="layui-input-block">
				  <input type="text" Readonly name="unit" placeholder="请输入工作单位 或 学校院系"  value="<?php echo $obj['unit']; ?>" required lay-verify="required" autocomplete="off" class="layui-input">
				</div>
			  </div>
			  <?php else: ?>
			  <div class="layui-form-item">
				<label class="layui-form-label">所属详细</label>
				<div class="layui-input-block">
				  <input type="text" Readonly name="school_name" placeholder="请输入工作单位 或 学校院系"  value="<?php if(($obj['ssid']==0)): ?><?php echo $obj['unit']; else: ?>$obj.ssname<?php endif; ?>" required lay-verify="required" autocomplete="off" class="layui-input">
				</div>
			  </div>
			  <?php endif; ?>
			  <div class="layui-form-item">
				<label class="layui-form-label">通讯地址</label>
				<div class="layui-input-block">
				  <input type="text" Readonly name="site" placeholder="请输入通讯地址"  value="<?php echo $obj['site']; ?>" required lay-verify="required" autocomplete="off" class="layui-input">
				</div>
			  </div>
			 
			  <div class="layui-form-item">
				<label class="layui-form-label">手机号码</label>
				<div class="layui-input-block">
				  <input type="text" Readonly name="tel" placeholder="请输入手机号码"  value="<?php echo $obj['tel']; ?>" required lay-verify="required" autocomplete="off" class="layui-input">
				</div>
			  </div>
			  <div class="layui-form-item">
				<label class="layui-form-label">指导老师</label>
				<div class="layui-input-block">
				  <input type="text" Readonly name="teacher" placeholder="请输入指导老师"  value="<?php echo $obj['teacher']; ?>" required lay-verify="required" autocomplete="off" class="layui-input">
				</div>
			  </div>
			  <div class="layui-form-item">
				<label class="layui-form-label">邮政编码</label>
				<div class="layui-input-block">
				  <input type="text" Readonly name="postcode" placeholder="请输入邮政编码"  value="<?php echo $obj['postcode']; ?>" required lay-verify="required" autocomplete="off" class="layui-input">
				</div>
			  </div>
			  <div class="layui-form-item layui-form-text" id="tt1" style="<?php if($obj['type']==28): ?>display:none;<?php else: ?>display:block;<?php endif; ?>" >
				<label class="layui-form-label"><?php if($obj['type']==1): ?>参赛人员<?php elseif($obj['type']==27): ?>主创人员简介<?php else: ?>选手简介<?php endif; ?></label>
				<div class="layui-input-block">
				  <textarea name="esc" placeholder="请输入<?php if($obj['type']==1): ?>参赛人数及姓名<?php elseif($obj['type']==27): ?>主创人员简介<?php else: ?>选手简介<?php endif; ?>" class="layui-textarea"  value="<?php echo $obj['esc']; ?>" Readonly><?php echo $obj['esc']; ?></textarea>
				</div>
			  </div>
			   <div class="layui-form-item" id="tt2">
				<label class="layui-form-label"><?php if($obj['type']==1): ?>节目名称<?php elseif($obj['type']==27): ?>电影名<?php elseif($obj['type']==28): ?>动漫创意作品名称<?php else: ?>作品名称<?php endif; ?></label>
				<div class="layui-input-block">
				  <input type="text" Readonly name="wname" placeholder="请输入<?php if($obj['type']==1): ?>节目名称<?php elseif($obj['type']==27): ?>电影名<?php elseif($obj['type']==28): ?>动漫创意作品名称<?php else: ?>作品名称<?php endif; ?>"  value="<?php echo $obj['wname']; ?>" autocomplete="off" class="layui-input">
				</div>
			  </div>
			  <div class="layui-form-item layui-form-text" id="tt3" style="<?php if($obj['type']==22): ?>display:none;<?php else: ?>display:block;<?php endif; ?>" >
				<label class="layui-form-label"><?php if($obj['type']==1): ?>节目简介<?php elseif($obj['type']==27): ?>剧本简介<?php elseif($obj['type']==31): ?>作品简介及创作思路<?php else: ?>作品简介<?php endif; ?></label>
				<div class="layui-input-block">
				  <textarea name="intro" placeholder="请输入<?php if($obj['type']==1): ?>节目简介<?php elseif($obj['type']==27): ?>剧本简介<?php elseif($obj['type']==31): ?>作品简介及创作思路<?php else: ?>作品简介<?php endif; ?>" class="layui-textarea"  value="<?php echo $obj['intro']; ?>" Readonly><?php echo $obj['intro']; ?></textarea>
				</div>
			  </div>
			  <div class="layui-form-item">
				<label class="layui-form-label">推荐单位</label>
				<div class="layui-input-block">
				  <input type="text" Readonly name="rec" placeholder="请输入作品名称"  value="<?php echo $obj['rec']; ?>" autocomplete="off" class="layui-input">
				</div>
			  </div>
			  <div class="layui-form-item">
				<label class="layui-form-label">推荐单位联系人及电话</label>
				<div class="layui-input-block">
				  <input type="text" Readonly name="rectel" placeholder="请输入联系人及电话"  value="<?php echo $obj['rectel']; ?>" autocomplete="off" class="layui-input">
				</div>
			  </div>
			  <div class="layui-form-item" pane>
				<label class="layui-form-label" >审     核</label>
				<div class="layui-input-block">
				  <input type="hidden" name="stch" id="stch" value="<?php echo $obj['status']; ?>"> 
				  <input type="checkbox" lay-text="yes|no" lay-filter="stch" value="1" name="switch" <?php if($obj['status'] == 1): ?>checked<?php endif; ?> lay-skin="switch">
				</div>
			  </div>
			  <div class="layui-form-item layui-form-text" id="shyy" style="display:<?php if(($obj['status'] == 1)): ?>none<?php else: ?>block<?php endif; ?>;" >
				<label class="layui-form-label">未通过审核原因</label>
				<div class="layui-input-block">
				      <textarea name="back_1" placeholder="未通过审核原因" class="layui-textarea"  value="<?php echo $obj['back_1']; ?>" readonly><?php echo $obj['back_1']; ?></textarea>
				</div>
			  </div>
			  <div class="layui-form-item" pane style="display:<?php if(($obj['status'] == 1)): ?>block<?php else: ?>none<?php endif; ?>;">
				<label class="layui-form-label">比赛状态</label>
				<div class="layui-input-block">
				    <input type="radio" name="cc" value="1" title="初赛" <?php if(($obj['back_2'] == 1)): ?>checked<?php elseif(($obj['back_2'] != 2)): ?>checked<?php endif; ?>>
					<input type="radio" name="cc" value="3" title="复赛" <?php if(($obj['back_2'] == 3)): ?>checked<?php endif; ?>>
					<input type="radio" name="cc" value="4" title="决赛" <?php if(($obj['back_2'] == 4)): ?>checked<?php endif; ?>>
					<input type="radio" name="cc" value="5" title="省决赛" <?php if(($obj['back_2'] == 5)): ?>checked<?php endif; ?>>
					<input type="radio" name="cc" value="2" title="已淘汰" <?php if(($obj['back_2'] == 2)): ?>checked<?php endif; ?>>
				</div>
			  </div>

              <div class="layui-form-item">
                <button class="layui-btn" key="set-mine" lay-filter="*" lay-submit>确认修改</button>
              </div>
            </form>
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

  //监听开关
  form.on('switch(stch)', function(data){
	
	if(data.elem.checked)
	{
		$("#stch").prop('value','1');
		$("#shyy").css('display','none');
		
	}else{
		$("#stch").prop('value','0');
		$("#shyy").css('display','block');
		
	}

  });  

  //监听提交
  form.on('submit(formDemo)', function(data){

	  if(data.field['stch']==0&&data.field['back_1']=='')
	  {
			layer.msg("请填写审核未通过原因");
			return false;		  
	  }

  });
});
</script>


</body>
</html>
