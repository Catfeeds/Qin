<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"D:\wwwroot\qnysj1\wwwroot/app/wap/view/lists/ajax_list_player_list.html";i:1500606810;}*/ ?>
<?php if(is_array($list_all) || $list_all instanceof \think\Collection || $list_all instanceof \think\Paginator): $i = 0; $__LIST__ = $list_all;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
	<li class="mui-table-view-cell mui-media" style="width: 50%;max-width: 160px;">
				<a href="<?php echo url('index/user',['user_id'=>$vo['id']]); ?>">
					<span>
					<img src="<?php echo $vo['img']; ?>"/>
					<a style="background-color: #5f686999;position: relative;margin-top: -40px;color: #fff;font-size:14px;height: 25px;padding-top: 3px;">支持:<?php echo $vo['look']; ?></a>
					</span>
					<div class="mui-media-body"><?php echo $vo['user_name']; ?></div>
				</a>
			</li>
<?php endforeach; endif; else: echo "" ;endif; ?>