<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"D:\wwwroot\wchhui1\wwwroot/app/wap/view/school/ajax_index_list.html";i:1493890760;}*/ ?>
<?php if(is_array($lists) || $lists instanceof \think\Collection || $lists instanceof \think\Paginator): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
<li class="mui-table-view-cell mui-media mui-col-xs-6">
	<a href="<?php echo url('school/school_info',['school_id'=>$vo['id']]); ?>">
		<img class="mui-media-object" src="<?php echo $vo['img']; ?>">
		<div class="mui-media-body"><?php echo $vo['name']; ?></div>
	</a>
</li>
<?php endforeach; endif; else: echo "" ;endif; ?>