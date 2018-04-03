<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:66:"D:\wwwroot\wchhui1\wwwroot/app/wap/view/news/ajax_index2_list.html";i:1493799596;}*/ ?>
<?php if(is_array($lists) || $lists instanceof \think\Collection || $lists instanceof \think\Paginator): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
<li class="mui-table-view-cell mui-media">
	<a href="<?php echo url('news/news_info',['news_id'=>$vo['id']]); ?>">
		<img class="mui-media-object mui-pull-right" src="<?php echo $vo['img']; ?>">
		<div class="mui-media-body">
			<?php echo $vo['title']; ?>
			<p class='mui-ellipsis'><?php echo $vo['esc']; ?></p>
		</div>
	</a>
</li>
<?php endforeach; endif; else: echo "" ;endif; ?>