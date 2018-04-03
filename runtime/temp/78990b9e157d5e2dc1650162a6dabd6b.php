<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"D:\wwwroot\qnysj1\wwwroot/app/wap/view/index/ajax_user_art_info.html";i:1501230706;}*/ ?>
<?php if(is_array($list_com_json) || $list_com_json instanceof \think\Collection || $list_com_json instanceof \think\Paginator): $i = 0; $__LIST__ = $list_com_json;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
	<li>
	<a href="<?php echo url('index/user',['user_id'=>$vo['user_id']]); ?>">
		<img src="<?php echo $vo['user_img']; ?>"></a>
		<p class="copyright"><?php echo $vo['user_name']; ?>&nbsp;[<?php echo date('Y-m-d',$vo['add_time']); ?>]</p>
		<div class="switchStyle">
		<div class="current"><?php echo $vo['content']; ?></div>
		</div> 
	</li>
<?php endforeach; endif; else: echo "" ;endif; ?>