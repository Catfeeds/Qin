<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"D:\wwwroot\wchhui1\wwwroot/app/wap/view/index/ajax_user_list.html";i:1494476160;}*/ ?>
<?php if(is_array($list_gb_json) || $list_gb_json instanceof \think\Collection || $list_gb_json instanceof \think\Paginator): $i = 0; $__LIST__ = $list_gb_json;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
<div class="mui-card">
	<div class="mui-card-header mui-card-media">
		<img src="<?php echo $vo['user_img']; ?>" />
		<div class="mui-media-body">
			<?php echo $vo['user_name']; ?>&nbsp;[<?php echo $vo['dizhi']; ?>]
			<p>发表于 <?php echo date('Y-m-d',$vo['add_time']); ?></p>
		</div>
	</div>
	<div class="mui-card-content" >
		<div class="mui-card-content-inner">
			<p style="color: #333;"><?php echo $vo['content']; ?></p>
		</div>
	</div>
</div>
<?php endforeach; endif; else: echo "" ;endif; ?>