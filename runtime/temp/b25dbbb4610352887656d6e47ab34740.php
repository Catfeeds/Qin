<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:57:"D:\wwwroot\qnysj1\wwwroot/app/wap/view/index/com_add.html";i:1502694364;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>评论</title>
	<link rel="stylesheet" type="text/css" href="__STATIC__/../wap/css/new.css" />
	<link rel="stylesheet" type="text/css" href="__STATIC__/layui/css/layui.css" />
	<link rel="stylesheet" href="__STATIC__/mui/css/mui.css">
</head>
<body>
<div class="wrap">
	<header id="header">
		<a href="javascript:history.back();" class="nvbt iback"></a>
		<div class="nvtt">
			<span style="font-size: 15px;">评论</span>
		</div>
	</header>
	<nav class="mui-bar mui-bar-tab">
		<a class="mui-tab-item mui-active" href="<?php echo url('index/index'); ?>">
			<span class="mui-icon mui-icon-home"></span>
			<span class="mui-tab-lable">网站首页</span>
		</a>
		<a class="mui-tab-item" href="<?php echo url('news/index'); ?>">
			<span class="mui-icon mui-icon-list"></span>
			<span class="mui-tab-lable">新闻资讯</span>
		</a>
		<a class="mui-tab-item" href="<?php echo url('player/index'); ?>">
			<span class="mui-icon mui-icon-paperclip"></span>
			<span class="mui-tab-lable">我要报名</span>
		</a>
		<a class="mui-tab-item" href="<?php echo url('school/index'); ?>">
			<span class="mui-icon mui-icon-paperplane"></span>
			<span class="mui-tab-lable">校区集锦</span>
		</a>
		<a class="mui-tab-item" href="<?php echo url('media/index'); ?>">
			<span class="mui-icon mui-icon-chatboxes"></span>
			<span class="mui-tab-lable">校园媒体</span>
		</a>
	</nav>
	<div id="content" class="content">
		<div class="texts">
			<span style="font-size: 15px; vertical-align: bottom; color: #8f8f94;">动态评论</span>
		</div>
		<div class="trend">
			<textarea id="demo" name="demo">评论内容...</textarea>
			<input type="hidden" id="art_id" name="art_id" value="<?php echo $artid; ?>">
			<input type="hidden" id="art_title" name="art_title" value="动态">
			<input type="hidden" id="type" name="type" value="2">
			<input type="hidden" id="pid" name="pid" value="<?php echo $artid; ?>">
			<input type="hidden" id="puid" name="puid" value="<?php echo $userid; ?>">

		</div>
		<div class="btns">
			<button type="button" class="btn1"  lay-filter="sbt" lay-submit>确认</button>&nbsp;&nbsp;
			<button type="button" class="btn2" onclick="return false;">取消</button>
		</div>
	</div>
</div>
<script type="text/javascript" src="__STATIC__/layui/admin.js"></script>
<script type="text/javascript" src="__STATIC__/layui/jquery.js"></script>
<script type="text/javascript" src="__STATIC__/layui/layui.js"></script>
<script src="__PUBLIC__/admin/ueditor/ueditor.config.js"></script>
<script src="__PUBLIC__/admin/ueditor/ueditor.all.min.js"></script>
<script src="__PUBLIC__/admin/ueditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript" charset="utf-8">
var ue=UE.getEditor('demo',{initialFrameHeight:180,elementPathEnabled : false,wordCount:false,maximumWords:800,toolbars:[
    [
	 'emotion',
	 
	 'undo', //撤销
     'redo', //重做
	 'justifyleft', //居左对齐
     'justifyright', //居右对齐
     'justifycenter', //居中对齐
	]],imagePathFormat:"/public/ueditor/images/upload/{filename}",emotionLocalization:true,enableAutoSave:false});
//Demo
layui.use(['form','layedit'], function(){
  var form = layui.form();

  //监听提交
  form.on('submit(sbt)', function(data){
	var tt=ue.getContent();
	var tet=ue.getContentTxt();
    if(tt=="评论内容..."||tt=="")
	{
		layer.msg('请输入评论内容');
		return false;
	}

	if(tet.length>50)
	{
		layer.msg('内容过长，字数限制50个字以内！');
		return false;
	}

	if(tt.length>800)
	{
		layer.msg('内容过长，图片与字数超过限制！');
		return false;
	}

	$.ajax({
		url:"<?php echo url('index/user_art_com'); ?>",
		type:"post",
		dataType:"json",
		data:{'art_id':$('#art_id').val(),'art_title':$('#art_title').val(),'type':$('#type').val(),'pid':$('#pid').val(),'puid':$('#puid').val(),'content':tt},
		success:function(dd){
			layer.msg(dd.msg, function(){
				location.href="/wap/index/user_art_info/art_id/<?php echo $artid; ?>.html?user_id=<?php echo $userid; ?>";
			});
		}
	})
   
  });


});
</script>
</body>

</html>
