<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"D:\wwwroot\wchhui1\wwwroot/app/wap/view/user/ajax_index_player_list.html";i:1495177682;}*/ ?>
<?php if(is_array($lists) || $lists instanceof \think\Collection || $lists instanceof \think\Paginator): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
<li class="mui-table-view-cell">
	<div class="mui-slider-right mui-disabled">
		<a class="mui-btn mui-btn-red" href="#" v="<?php echo $vo['id']; ?>">删除</a>
	</div>
	<div class="mui-slider-handle" onclick="javascript:location.href='<?php echo url('user/player',['player_id'=>$vo['id']]); ?>';">
		<b>
		<?php if(($vo['status'] == 0)): ?><a>未审核</a>
		  <?php elseif(($vo['back_2'] == 1)): ?><a style="color:#00aa00;">初赛</a>
		  <?php elseif(($vo['back_2'] == 3)): ?><a style="color:#00aa00;">复赛</a>
		  <?php elseif(($vo['back_2'] == 4)): ?><a style="color:#00aa00;">决赛</a>
		  <?php elseif(($vo['back_2'] == 2)): ?><a style="color:red;">已淘汰</a>
		  <?php endif; ?>
		 </b>
		<em>
		<?php echo $vo['type_name']; if(($vo['maxid'] != 0)): ?>-<?php echo $vo['maxname']; endif; if(($vo['minid'] != 0)): ?>-<?php echo $vo['minname']; endif; ?>
		</em>
		<p><em><?php echo date('Y-m-d h:s',$vo['add_time']); ?></em></p>
	</div>
</li>
<?php endforeach; endif; else: echo "" ;endif; ?>