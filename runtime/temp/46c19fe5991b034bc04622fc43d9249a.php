<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"D:\wwwroot\qnysj1\wwwroot/app/wap/view/index/ajax_user_photo_list.html";i:1500453616;}*/ ?>
<?php if(is_array($list_hpoto) || $list_hpoto instanceof \think\Collection || $list_hpoto instanceof \think\Paginator): $i = 0; $__LIST__ = $list_hpoto;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
	
	<img src="<?php echo $vo['img']; ?>">
	
<?php endforeach; endif; else: echo "" ;endif; ?>