<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"D:\amp\UPUPW_K2.1_64\htdocs\QN/app/index\view\index\index_slide.html";i:1493866982;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link type="text/css" rel="stylesheet" href="__index__/css/lrtk.css">
<script type="text/javascript" src="__index__/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="__index__/js/zcommon.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(){AcerUi.init();});
</script>  
</head>

<body>
<!-- 代码开始 -->
<div id="showcase" class="cloud row-content showcase">
	<div class="container">
		<div class="slide" style="display:block; ">
        	<div class="content-main-feature">
            	<div style="float:left;">
					<?php if(is_array($list_bd_1) || $list_bd_1 instanceof \think\Collection || $list_bd_1 instanceof \think\Paginator): $i = 0; $__LIST__ = $list_bd_1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						<div class="feature">
							<a href="<?php echo $vo['url']; ?>" class="current">
								<img src="<?php echo $vo['img']; ?>">
							</a>
						</div>
					<?php endforeach; endif; else: echo "" ;endif; ?>       
                </div>
                <div style="float:right;"> 
					<?php if(is_array($list_bd_2) || $list_bd_2 instanceof \think\Collection || $list_bd_2 instanceof \think\Paginator): $i = 0; $__LIST__ = $list_bd_2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						<div class="feature">
							<a href="<?php echo $vo['url']; ?>" class="current">
								<img src="<?php echo $vo['img']; ?>">
							</a>
						</div>
					<?php endforeach; endif; else: echo "" ;endif; ?> 
                </div>
			</div>                
			<div class="content-main-visual">

				<?php if(is_array($list_bd_1) || $list_bd_1 instanceof \think\Collection || $list_bd_1 instanceof \think\Paginator): $i = 0; $__LIST__ = $list_bd_1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					<a class="pc" href="<?php echo $vo['url']; ?>" target="_blank"><img src="<?php echo $vo['img']; ?>"></a>
				<?php endforeach; endif; else: echo "" ;endif; if(is_array($list_bd_2) || $list_bd_2 instanceof \think\Collection || $list_bd_2 instanceof \think\Paginator): $i = 0; $__LIST__ = $list_bd_2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					<a class="pc" href="<?php echo $vo['url']; ?>" target="_blank"><img src="<?php echo $vo['img']; ?>"></a>
				<?php endforeach; endif; else: echo "" ;endif; ?>
				
			</div>			
		</div>
	</div>
</div>
<!-- 代码结束 -->
</body>
</html>
