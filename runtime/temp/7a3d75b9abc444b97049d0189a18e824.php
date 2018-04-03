<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"D:\wwwroot\qnysj1\wwwroot/app/wap/view/user/ajax_record_list.html";i:1494405460;}*/ ?>
<?php if(is_array($lists) || $lists instanceof \think\Collection || $lists instanceof \think\Paginator): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
<li class="mui-table-view-cell">
	<div class="mui-slider-right mui-disabled">
		<a class="mui-btn mui-btn-red" href="#" v="<?php echo $vo['id']; ?>">删除</a>
	</div>
	<div class="mui-slider-handle">
		<b><?php echo $vo['user_name']; ?></b><em><?php echo $vo['content']; ?></em>
		<p><em><?php echo date('Y-m-d h:s',$vo['add_time']); ?></em></p>
	</div>
</li>
<?php endforeach; endif; else: echo "" ;endif; ?>