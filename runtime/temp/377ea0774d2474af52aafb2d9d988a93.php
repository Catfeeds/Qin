<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"D:\wwwroot\qnysj1\wwwroot/app/wap/view/user/article_add_from.html";i:1501475640;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>动态</title>
	<link rel="stylesheet" type="text/css" href="__STATIC__/../wap/css/new.css" />
	<link rel="stylesheet" type="text/css" href="__STATIC__/layui/css/layui.css" />
	<link rel="stylesheet" href="__STATIC__/mui/css/mui.css">
</head>
<body>
	<div id="content" class="content">
		<div class="texts">
			<span style="font-size: 15px; vertical-align: bottom; color: #8f8f94;">发布动态</span>
		</div>
		<div class="trend">
			<textarea id="demo" name="demo"></textarea>
		</div>
		<div class="btns">
			<button type="button" class="btn1"  lay-filter="sbt" lay-submit>确认</button>&nbsp;&nbsp;
			<button type="button" class="btn2" onclick="return false;">取消</button>
		</div>
	</div>
<script type="text/javascript" src="__STATIC__/layui/admin.js"></script>
<script type="text/javascript" src="__STATIC__/layui/jquery.js"></script>
<script type="text/javascript" src="__STATIC__/layui/layui.js"></script>
<script src="__PUBLIC__/admin/ueditor/ueditor.config.js"></script>
<script src="__PUBLIC__/admin/ueditor/ueditor.all.min.js"></script>
<script src="__PUBLIC__/admin/ueditor/lang/zh-cn/zh-cn.js"></script>
<script>
//实例化编辑器
//建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
var ue=UE.getEditor('demo',{initialFrameHeight:180,elementPathEnabled : false,wordCount:false,maximumWords:800,toolbars:[
    [
	 'emotion',
	 'simpleupload', //单图上传
	 'undo', //撤销
     'redo', //重做
	 'justifyleft', //居左对齐
     'justifyright', //居右对齐
     'justifycenter', //居中对齐
	]],imagePathFormat:"/public/ueditor/images/upload/{filename}",emotionLocalization:true,enableAutoSave:false});
//Demo
layui.use(['form'], function(){
	var form = layui.form();
  //监听提交
  form.on('submit(sbt)', function(data){
	var tt=ue.getContent();
	var tet=ue.getContentTxt();
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

	
	$.ajax({
		url:"<?php echo url('user/user_art_add'); ?>",
		type:"post",
		dataType:"json",
		data:{'content':tt,'esc':tet},
		success:function(dd){
			layer.msg(dd.msg, function(){
				location.href="/wap/user/article.html";
			});
		}
	})
   
  });


});
</script>
</body>

</html>