<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"D:\wwwroot\wchhui1\wwwroot/app/wap/view/school/ajax_school_art_list.html";i:1493836784;}*/ ?>
<?php if(is_array($list_all) || $list_all instanceof \think\Collection || $list_all instanceof \think\Paginator): $i = 0; $__LIST__ = $list_all;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
<li class="mui-table-view-cell mui-media">
	<a href="<?php echo url('school/art_info',['news_id'=>$vo['id']]); ?>">
		<img class="mui-media-object mui-pull-right" src="<?php echo $vo['img']; ?>">
		<div class="mui-media-body">
			<?php echo $vo['title']; ?>
			<p class='mui-ellipsis'><?php echo $vo['esc']; ?></p>
		</div>
	</a>
</li>
<?php endforeach; endif; else: echo "" ;endif; ?>