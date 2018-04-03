<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"D:\wwwroot\wchhui1\wwwroot/app/wap/view/user/ajax_photo_list.html";i:1494408810;}*/ ?>
<?php if(is_array($lists) || $lists instanceof \think\Collection || $lists instanceof \think\Paginator): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
<li class="mui-table-view-cell mui-media mui-col-xs-6">
	<img class="mui-media-object" src="<?php echo $vo['img']; ?>" style="height: 165px;">
	<div class="mui-media-body"><p style="float:left;"><?php echo date('Y-m-d',$vo['add_time']); ?></p><p style="float:right;"><a id="del" href="#" v="<?php echo $vo['id']; ?>">删除</a></p></div>
</li>
<?php endforeach; endif; else: echo "" ;endif; ?>