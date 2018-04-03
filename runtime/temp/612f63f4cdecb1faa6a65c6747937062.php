<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"D:\wwwroot\qnysj1\wwwroot/app/wap/view/lists/ajax_list_school_list.html";i:1500606830;}*/ ?>
<?php if(is_array($list_user_school) || $list_user_school instanceof \think\Collection || $list_user_school instanceof \think\Paginator): $i = 0; $__LIST__ = $list_user_school;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
	<li class="mui-table-view-cell mui-media" style="width: 50%;max-width: 200px;">
		<a href="<?php echo url('school/school_info',['school_id'=>$vo['sid']]); ?>">
			<span>
			<img src="<?php echo $vo['img']; ?>" style="width: 100%;max-width: 290px;height: 100px;"/>
			<a style="background-color: #5f686999;position: relative;margin-top: -40px;color: #fff;font-size:14px;height: 25px;padding-top: 3px;">报名:<?php echo $vo['ct']; ?></a>
			</span>
			<div class="mui-media-body"><?php echo $vo['name']; ?></div>
		</a>
	</li>
<?php endforeach; endif; else: echo "" ;endif; ?>