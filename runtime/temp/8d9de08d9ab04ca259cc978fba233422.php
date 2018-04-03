<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"D:\wwwroot\qnysj1\wwwroot/app/wap/view/index/ajax_user_art_list.html";i:1501230734;}*/ ?>
<?php if(is_array($list_article_json) || $list_article_json instanceof \think\Collection || $list_article_json instanceof \think\Paginator): $i = 0; $__LIST__ = $list_article_json;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
<li>
<?php if($vo['back_3']==1): ?>
<img style="position: absolute;width: 60px;height: 45px;margin-top: -5px;margin-left: 0px;" src="/public/wap/images/jinghua.png" /><?php endif; ?>
<a href="/wap/index/user_art_info/user_id/<?php echo $obj['id']; ?>.html?art_id=<?php echo $vo['id']; ?>">
	<p class="switchStyle" style="margin:5px;<?php if($vo['json_img']!='/'): ?>height:100px;<?php endif; ?>">
	<span class="current">
	<?php if($vo['json_img']!='/'): ?>
	<img src="<?php echo $vo['json_img']; ?>" />
	<?php endif; ?>
	<?php echo mb_substr($vo['esc'],0,40,'utf-8'); ?>...
	</span>
	</p>
	<div style="color: #999;margin-left: 5px;margin-right: 5px;">
	<em><?php echo date('Y-m-d',$vo['add_time']); ?></em>
	<em style="float: right;"><?php echo $vo['com_number']; ?>评论/<?php echo $vo['p_number']; ?>转发</em>
	</div>
	</a>
</li>
<?php endforeach; endif; else: echo "" ;endif; ?>