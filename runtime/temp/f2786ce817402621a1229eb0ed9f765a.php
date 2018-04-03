<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"D:\amp\UPUPW_K2.1_64\htdocs\QN/app/index/view/public/success.html";i:1490944646;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>跳转提示</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" type="text/css" href="__STATIC__/layui/css/layui.css" />
	<script type="text/javascript" src="__STATIC__/layui/layui.js"></script>
</head>
<body style="width:100%;height:100%;background:#4E5465;">
<script>
layui.use('layer', function(){
  var layer = layui.layer;
  
  layer.msg('<?php echo(strip_tags($msg));?>', {icon: 6,time: 1000}, function(){
	location.href = "<?php echo($url);?>";
  });
});              
</script>
</body>
</html>