<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:58:"D:\wwwroot\qnysj1\wwwroot/app/admin/view/public/error.html";i:1506307328;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>跳转提示</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" type="text/css" href="__STATIC__/layui/css/layui.css" />
	<script type="text/javascript" src="__STATIC__/layui/layui.js"></script>
</head>
<body>
<script>
layui.use('layer', function(){
  var layer = layui.layer;
  
  layer.msg('<?php echo(strip_tags($msg));?>', {icon: 5,time: 3000}, function(){
	location.href = "<?php echo($url);?>";
  });
});              
</script>
</body>
</html>