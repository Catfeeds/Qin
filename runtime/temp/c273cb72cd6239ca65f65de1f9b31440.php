<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:61:"D:\wwwroot\qnysj1\wwwroot/app/index/view/module/articlem.html";i:1494569438;s:62:"D:\wwwroot\qnysj1\wwwroot/app/index/view/public/ModelBase.html";i:1498016174;}*/ ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>
  <?php echo $obj['title']; ?>-<?php echo cookie('remark')['title']; ?></title>
  <meta name="keywords" content="<?php echo cookie('remark')['keyword']; ?>">
  <meta name="description" content="<?php echo cookie('remark')['description']; ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <link rel="stylesheet" type="text/css" href="__STATIC__/layui/css/layui.css" />
  <link rel="stylesheet" type="text/css" href="__STATIC__/css/global.css" />




<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?8e85dbf31e589d58cb1b25a97ad602be";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>

</head>
<body>


<div class="header">
  <div class="main">
    <a class="logo" href="/" title="Fly">个人中心</a>
	 
    <div class="nav">
      <a class="nav-this" href="<?php echo url('index/index'); ?>" >
        <i class="iconfont icon-ui"></i>首页
      </a>

	  <!--<a class="nav-this" href="<?php echo url('module/index'); ?>" >
        <i class="iconfont icon-wenda"></i>社区论坛
      </a>

	  <a class="nav-this" href="<?php echo url('usercontrol/index'); ?>" >
        <i class="iconfont icon-ui"></i>用户中心
      </a>-->
      
    </div>   
    
    <div class="nav-user"> 
	<?php if(\think\Session::get('user_auth.id')==''): ?>
		<a class="unlogin" href="/index/login/index"><i class="iconfont icon-touxiang"></i></a>      
		<span><a href="/index/login/reg.html">登入</a><a href="/index/login/login.html">注册</a></span>
		<!--<p class="out-login">
        <a href="" onclick="layer.msg('正在通过QQ登入', {icon:16, shade: 0.1, time:0})" class="iconfont icon-qq" title="QQ登入"></a>
        <a href="" onclick="layer.msg('正在通过微博登入', {icon:16, shade: 0.1, time:0})" class="iconfont icon-weibo" title="微博登入"></a>
       </p>-->
	<?php else: ?>
      <!-- 登入后的状态 -->
      <a class="avatar" href="<?php echo url('usercontrol/index'); ?>">
        <img src="<?php echo \think\Session::get('user_auth.user_img'); ?>">
        <cite><?php echo \think\Session::get('user_auth.name'); ?></cite>
        <i></i>
      </a>
      <div class="nav">
        <a href="<?php echo url('login/logout'); ?>"><i class="iconfont icon-tuichu" style="top: 0; font-size: 22px;"></i>退了</a>
      </div>
		  <?php if((\think\Session::get('tiish') > 0)): ?>
			<a class="nav-message" href="<?php echo url('usercontrol/index'); ?>" title="您有<?php echo \think\Session::get('tiish'); ?>条未阅读的消息"><?php echo \think\Session::get('tiish'); ?></a>
		  <?php endif; endif; ?>
    </div>
  </div>
</div>


 

<div class="main layui-clear">
  <div class="wrap">
    <div class="content detail">
      <div class="fly-panel detail-box">
        <h1><?php echo $obj['title']; ?></h1>
        <div class="fly-tip fly-detail-hint" data-id="<?php echo $obj['id']; ?>">

		  <?php if($obj['back_3'] == 1): if($adm==1): ?>
			<span onclick="update_zd('xzd')" class="fly-tip-stick">取消置顶</span>
			<?php else: ?>
			<span class="fly-tip-stick">置顶帖</span>
			<?php endif; else: if($adm==1): ?>
			 <span onclick="update_zd('szd')" class="fly-tip-stick">置顶</span>
			<?php endif; endif; if($obj['back_4'] == 1): if($adm==1): ?>
			<span onclick="update_jj('xjj')" class="fly-tip-stick">取消置顶</span>
			<?php else: ?>
			<span class="fly-tip-jing">精帖</span>
			<?php endif; else: if($adm==1): ?>
			<span onclick="update_jj('sjj')" class="fly-tip-jing">加精</span>
			<?php endif; endif; if($obj['user_id'] == \think\Session::get('user_auth.id')): ?>
		  <span class="jie-admin" type="del" onclick="del(<?php echo $obj['id']; ?>)" style="margin-left: 20px;">删除</span>
		  <?php elseif($adm==1): ?>
		  <span class="jie-admin" type="del" onclick="delete_cc()" style="margin-left: 20px;">删除</span>
		  <?php endif; ?>

          <div class="fly-list-hint" style="top: -15px;"> 
            <i class="iconfont" title="回答">&#xe60c;</i><?php echo $obj['com_number']; ?>
            <i class="iconfont" title="人气">&#xe60b;</i><?php echo $obj['look']; ?>
          </div>
        </div>
        <div class="detail-about">
          <a class="jie-user" href="<?php echo url('user/index',['user_id'=>$obj['user_id']]); ?>">
            <img src="<?php echo $obj['user_img']; ?>" alt="">
            <cite>
              <?php echo $obj['user_name']; ?>
            </cite>
          </a>
          <div class="detail-hits" data-id="<?php echo $obj['id']; ?>">
			<span><em><?php echo date('Y-m-d',$obj['add_time']); ?></em></span>
			<?php if($obj['child']==0): ?>
				<span class="layui-btn layui-btn-mini jie-admin " type="collect" onclick="sc(<?php echo $obj['id']; ?>)" data-type="add">收藏</span>
			<?php else: ?>
				<span class="layui-btn layui-btn-mini jie-admin  layui-btn-danger" onclick="qx(<?php echo $obj['id']; ?>)" type="collect" data-type="add">取消收藏</span>
			<?php endif; ?>

          </div>
        </div>
        
        <div class="detail-body photos" style="margin-bottom: 20px;">
          <?php echo $obj['content']; ?>
        </div>
      </div>

      <div class="fly-panel detail-box" style="padding-top: 0;">
        <a name="comment"></a>
        <ul class="jieda photos" id="jieda">
		<?php if($list_com_json): if(is_array($list_com_json) || $list_com_json instanceof \think\Collection || $list_com_json instanceof \think\Paginator): $i = 0; $__LIST__ = $list_com_json;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
			  <li data-id="$vo.id" class="jieda-daan">
				<a name="item-$vo.id"></a>
				<div class="detail-about detail-about-reply">
				  <a class="jie-user" href="<?php echo url('user/index',['user_id'=>$vo['user_id']]); ?>">
					<img src="<?php echo $vo['user_img']; ?>" alt="">
					<cite>
					  <i><?php echo $vo['user_name']; ?></i>
					  <?php if($vo['user_id']==$obj['user_id']): ?>
					  <em>(楼主)</em><?php endif; if($vo['user_name']==''): ?>
					  <em>(用户已注销)</em><?php endif; ?>
					</cite>
				  </a>
				  <div class="detail-hits">
					<span><?php echo date('Y-m-d',$vo['add_time']); ?></span>
				  </div>
				</div>
				<div class="detail-body jieda-body">
				  <?php echo $vo['content']; ?>
				</div>
				<div class="jieda-reply">
				  <span class="jieda-zan <?php if($vo['dz']==1): ?>zanok<?php endif; ?>" onclick="zz(<?php echo $vo['id']; ?>)" type="zan"><i class="iconfont icon-zan"></i><em><?php echo $vo['p_number']; ?></em></span>

				  <span type="reply" onclick='hf(<?php echo $vo['id']; ?>,<?php echo $vo['user_id']; ?>,"<?php echo $vo['user_name']; ?>")'><i class="iconfont icon-svgmoban53"></i>回复</span>

				  <?php if($vo['user_id']==\think\Session::get('user_auth.id')): ?>
				  <div class="jieda-admin">
					<span type="del" onclick="com_del(<?php echo $vo['id']; ?>)">删除</span>
				  </div><?php endif; ?>

				</div>
			  </li>
		<?php endforeach; endif; else: echo "" ;endif; else: ?>
			<li class="fly-none">没有任何评论</li>
		<?php endif; ?>
        </ul>
		
		<div><?php echo $list_com->render(); ?></div>

        <div class="layui-form layui-form-pane">
          <form action="" method="post" id="plhf">
            <div class="layui-form-item layui-form-text">
              <div class="layui-input-block">
                <textarea id="content" name="content" required lay-verify="required" placeholder="我要评论"  class="layui-textarea fly-editor" style="height: 200px;"></textarea>
              </div>
            </div>
			<input type="hidden" id="art_id" name="art_id" value="<?php echo $obj['id']; ?>">
			  <input type="hidden" id="art_title" name="art_title" value="<?php echo $obj['title']; ?>">
			  <input type="hidden" id="type" name="type" value="5">
			  <input type="hidden" id="pid" name="pid" value="<?php echo $obj['id']; ?>">
			  <input type="hidden" id="puid" name="puid" value="<?php echo $obj['user_id']; ?>">
            <div class="layui-form-item"> 
              <input type="button" class="layui-btn" value="提交回答" lay-filter="sbt" lay-submit/>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  
  <div class="edge">
    <dl class="fly-panel fly-list-one"> 
      <dt class="fly-panel-title">最近热帖</dt>
	  <?php if(is_array($list_art_look) || $list_art_look instanceof \think\Collection || $list_art_look instanceof \think\Paginator): $i = 0; $__LIST__ = $list_art_look;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
		  <dd>
			<a href="<?php echo url('module/articlem',['art_id'=>$vo['id']]); ?>"><?php echo $vo['title']; ?></a>
			<span><i class="iconfont">&#xe60b;</i><?php echo $vo['look']; ?></span>
		  </dd>
      <?php endforeach; endif; else: echo "" ;endif; ?>
    </dl>
    
    <dl class="fly-panel fly-list-one"> 
      <dt class="fly-panel-title">近期热议</dt>
      <?php if(is_array($list_art_com) || $list_art_com instanceof \think\Collection || $list_art_com instanceof \think\Paginator): $i = 0; $__LIST__ = $list_art_com;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
		  <dd>
			<a href="<?php echo url('module/articlem',['art_id'=>$vo['id']]); ?>"><?php echo $vo['title']; ?></a>
			<span><i class="iconfont">&#xe60c;</i><?php echo $vo['com_number']; ?></span>
		  </dd>
      <?php endforeach; endif; else: echo "" ;endif; ?>
      
    </dl>
  </div>
</div>


<div class="footer">
  <p><a href="/index/index">青年文化艺术节</a> @2017 &copy; <a href="http://www.qnysj.com">www.qnysj.com</a></p>
  <p>
    <a href="#" target="_blank">官方授权</a>
    <a href="#" target="_blank">官方微博</a>
    <a href="#" target="_blank">微信公众号</a>
  </p>
</div>


<script type="text/javascript" src="__STATIC__/layui/layui.js"></script>
<script type="text/javascript" src="__STATIC__/layui/admin.js"></script>
<script type="text/javascript" src="__STATIC__/layui/jquery.js"></script>


<script type="text/javascript" src="__STATIC__/../index/js/module_articlem_js.js"></script>
<script>
window.onload=function(){
	if(GetQueryString('page')!=null)
	{
		location.href = "#jieda";
	}
	var pt=GetQueryString('pt');
	if(pt!=null)
	{
		location.href = "#plhf";		
		hf("<?php echo $pt['pid']; ?>","<?php echo $pt['puid']; ?>","<?php echo $pt['puname']; ?>");
	}
}

function GetQueryString(name)
{
     var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
     var r = window.location.search.substr(1).match(reg);
     if(r!=null)return  unescape(r[2]); return null;
}

var articlem_id=<?php echo $obj['id']; ?>;
//页面id

layui.config({
  version: "2.0.0"
  ,base: '__STATIC__/mods/'
}).extend({
  fly: 'editor'
}).use('fly', function(){
  var fly = layui.fly;
  //解析。
  $('.detail-body').each(function(){
    var othis = $(this), html = othis.html();
    othis.html(fly.content(html));
  });
});

//Demo
layui.use('form', function(){
  var form = layui.form();
  //监听提交
  form.on('submit(sbt)', function(data){
    
	$.ajax({
		url:"<?php echo url('module/module_art_com'); ?>",
		type:"post",
		dataType:"json",
		data:{'art_id':data.field['art_id'],'art_title':data.field['art_title'],'type':data.field['type'],'pid':data.field['pid'],'puid':data.field['puid'],'content':data.field['content']},
		success:function(dd){
			layer.msg(dd.msg, function(){
				parent.location.reload();
			});
		}
	})
   
  });


});
</script>


</body>
</html>
