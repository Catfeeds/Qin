<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"D:\wwwroot\qnysj1\wwwroot/app/wap/view/school/ajax_school_info_list.html";i:1497594810;}*/ ?>
<?php if(is_array($list_all) || $list_all instanceof \think\Collection || $list_all instanceof \think\Paginator): $i = 0; $__LIST__ = $list_all;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
	<li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3">
		<a href="<?php echo url('index/user',['user_id'=>$vo['id']]); ?>">
			<span><img src="<?php echo $vo['img']; ?>"style="line-height: 50px;max-width: 50px;height: 50px;"/></span>
			<div class="mui-media-body"><?php echo $vo['user_name']; ?></div>
		</a>
	</li>
<?php endforeach; endif; else: echo "" ;endif; ?>