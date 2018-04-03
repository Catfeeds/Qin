<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:64:"D:\wwwroot\wchhui1\wwwroot/app/index/view/player/index_type.html";i:1496310734;s:58:"D:\wwwroot\wchhui1\wwwroot/app/index/view/public/Base.html";i:1497236850;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>大赛报名-<?php echo cookie('remark')['title']; ?></title>

<link type="text/css" rel="stylesheet" href="__index__/css/css.css">
<link type="text/css" rel="stylesheet" href="__index__/css/banner.css">
<script type="text/javascript" src="__index__/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="__index__/js/banner.js"></script> 

<link rel="stylesheet" type="text/css" href="__index__/css/jquery.jslides.css" media="screen" />
<script type="text/javascript" src="__index__/js/jquery.jslides.js"></script>
<style>
.class_statistics_tabContent li{cursor:pointer;}
</style>

<link rel="stylesheet" type="text/css" href="__STATIC__/layui/css/layui.css" />
<link rel="stylesheet" type="text/css" href="__STATIC__/css/global.css" />
<style>
	.fly-case-list li{position:relative;width:400px;}
	.fly-case-list li a img{height:180px;width:400px;}
	.fly-case-list li h2{position:absolute;left:10px;top:153px;width:400px;background:#000;opacity:0.5;}
	.fly-case-list li h2 a{color:#fff;}
</style>

</head>

<body>

<div class="top_row">
	<div class="top">
    	<div class="top_logo"><img src="__index__/images/logo.jpg" /></div>

        <div class="top_login">
		<?php if(\think\Session::get('user_auth.id')!=null): ?>
		<a href="/index/usercontrol/index.html">个人中心</a> | <a href="/index/login/logout.html">退出</a></a>
		<?php else: ?>
		<a href="/index/login/reg.html">登陆</a> / <a href="/index/login/login.html">注册</a>
		<?php endif; ?>
		</div>
        <div class="top_menu">
        	<ul>
            	<li><a href="/index/index/index.html">网站首页</a></li>
                <li><a href="/index/news/index.html">新闻资讯</a></li>
                <li><a href="/index/live/index.html">赛事直播</a></li>
                <li><a href="/index/school/index.html">校区集锦</a></li>
                <li><a href="/index/media/index.html">校园媒体</a></li>
            </ul>
        </div>        
    </div>
</div>

<div class="float_ewm" style="width:200px;height:250px;">
	<img src="__index__/images/float_ewm.png" style="width:200px;height:250px;" />
</div>
<a name="go_top"></a>
<div class="main_visual">
    <div class="flicking_con">
         <a href="#">&nbsp;</a>
         <a href="#">&nbsp;</a>
		 <a href="#">&nbsp;</a>
    </div>
  <div class="main_image">
    <ul>
      <li style="background: url(__index__/images/b_01.jpg) no-repeat center;"><a href="#">&nbsp;</a></li>
      <li style="background: url(__index__/images/b_01.jpg) no-repeat center;"><a href="#">&nbsp;</a></li>  
	  <li style="background: url(__index__/images/b_01.jpg) no-repeat center;"><a href="#">&nbsp;</a></li>
        </ul>
        <a href="javascript:;" style=" max-width:60px; " id="btn_prev"></a> 
        <a href="javascript:;" style=" max-width:60px;" id="btn_next"></a> 
    </div>
</div>
<script type="text/javascript">
        $(document).ready(function(){
          $(".main_visual").hover(function(){
            $("#btn_prev,#btn_next").fadeIn()
          },function(){
            $("#btn_prev,#btn_next").fadeOut()
          });
          
          $dragBln = false;
          
          $(".main_image").touchSlider({
            flexible : true,
            speed : 500,
            btn_prev : $("#btn_prev"),
            btn_next : $("#btn_next"),
            paging : $(".flicking_con a"),
            counter : function (e){
              $(".flicking_con a").removeClass("on").eq(e.current-1).addClass("on");
            }
          });
          
          $(".main_image").bind("mousedown", function() {
            $dragBln = false;
          });
          
          $(".main_image").bind("dragstart", function() {
            $dragBln = true;
          });
          
          $(".main_image a").click(function(){
            if($dragBln) {
              return false;
            }
          });
          
          timer = setInterval(function(){
            $("#btn_next").click();
          }, 5000);
          
          $(".main_visual").hover(function(){
            clearInterval(timer);
          },function(){
            timer = setInterval(function(){
              $("#btn_next").click();
            },5000);
          });
          
          $(".main_image").bind("touchstart",function(){
            clearInterval(timer);
          }).bind("touchend", function(){
            timer = setInterval(function(){
              $("#btn_next").click();
            }, 5000);
          });
          
        });
</script>




	
	
	<div class="main fly-user-main layui-clear" style="overflow: hidden;width:1300px;">

	<div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
	  <ul class="layui-tab-title">
		<li class="layui-this">大赛分类</li>
	  </ul>
	  <div class="layui-tab-content"></div>
	</div>

      <ul class="fly-case-list">

		<?php if(is_array($tlist) || $tlist instanceof \think\Collection || $tlist instanceof \think\Paginator): $i = 0; $__LIST__ = $tlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>

			<li data-id="<?php echo $vo['id']; ?>">
			  <a class="fly-case-img" href="/index/player/index/type_id/<?php echo $vo['id']; ?>.html" target="_blank">
			  <img src="/public/index/images/type_<?php echo $i; ?>.jpg" alt="<?php echo $vo['name']; ?>"> 
			 </a>
			  <h2>
				<a href="/index/module/series/series_id/4.html" style="font-size:25px;" target="_blank"><?php echo $vo['name']; ?></a>
			  </h2>
			  
			</li>

		<?php endforeach; endif; else: echo "" ;endif; ?>
     
	</ul>

  
</div>




	<div class="bottom_banner">
		<div class="goto_top_row">
			<div class="goto_top"><a href="#go_top"><img src="__index__/images/goto_top.jpg" /></a></div>
		</div>
	</div>

	<div class="bottom_copy">
		<div class="bottom_copy_left" style="width: 890px;">
			主办单位：共青团湖南省委、湖南省教育厅、湖南省文化厅、湖南省青年联合会、湖南省学生联合会 组委会办公地址： 湖南省长沙市天心区湘府西路1号<br /> <br />      
			承办单位：湖南省青少年活动中心、湖南省青年就业创业基金会、湖南省青年企业家协会、《年轻人》杂志社<br /> <br />
			@2017 共青团湖南省委 版权所有 湘ICP备17011069号<br /> <br />
			技术支持：湖南亿虹青峰文化传播有限公司、乾明文化传播有限公司  
			<!--Information network dissemination license number: 19255107 Internet news information service license number: 461205036-->
		</div>
		<div class="bottom_copy_right" style="width: 120px;">
		<img style="width: 115px;" src="__index__/images/ewm.jpg" />
		<p style="text-align: center;">官方公众号</p>
		</div>
		<div class="bottom_copy_right" style="width: 120px;">
		<img style="width: 115px;" src="__index__/images/kfewm.png" />
		<p style="text-align: center;">官方客服</p>
		</div>
	</div>



<script type="text/javascript" src="__STATIC__/layui/layui.js"></script>
<script type="text/javascript" src="__STATIC__/layui/admin.js"></script>
<script>
layui.use('layer', function(){


	var str_title="报名参赛应遵守的约定";
	var str_content="<div style='margin: 30px;font-size: 16px;'>";
	str_content+="&nbsp;&nbsp;&nbsp;&nbsp;为使本次活动顺利进行，保证湖南青年文化艺术节组委会（以下简称组委会）和参赛者的合法权益，请参赛者认真阅读此须知，一旦确认，即意味着您已经完全理解并同意此约定所需注意的事项：";
	str_content+="<br/><br/>1、拥护中国共产党的领导，政治素质高，思想品德好，具有良好的社会责任感、协作精神和奉献精神。";
	str_content+="<br/><br/>2、报名不限职业！只要你是热爱文化艺术的青年，就可以参与报名，再通过相关单位或者高校选拔后进入总决赛。";
	str_content+="<br/><br/>3、相貌端庄，身心健康，无不良嗜好。";
	str_content+="<br/><br/>4、参赛者必须遵守中华人民共和国的有关法律法规，如果在参赛过程中违反中华人民共和国法律法规的，后果自负。";
	str_content+="<br/><br/>5、参赛者注册/填写资料信息时必须提供详尽、准确的资料，资料必须真实，如有弄虚作假取消比赛资格。";
	str_content+="<br/><br/>6、选手必须严格遵守湖南青年文化艺术节组委会（以下简称组委会）的各项规章制度，服从赛程安排，否则大赛组委会有权取消选手参赛资格。";
	str_content+="<br/><br/>7、在赛事进行过程中，组委会有权视情对赛程安排或相关环节调整变更。";
	str_content+="<br/><br/>8、整个活动的进展以组委会微信公众号和艺术节官网为准，请随时关注。";
	str_content+="<br/><br/>9、所有提交的作品视频、图片、文字及实物，不予退还，组委会享有终身使用权，可以在官网及相关平台上宣传发布。";
	str_content+="<br/><br/>10、因参赛者违反中华人民共和国法律而产生的不利后果由参赛者自行承担。";
	str_content+="<br/><br/>11、参赛者与第三方就参赛作品而产生纠纷的解决由参赛者自行负责。";
	str_content+="<br/><br/>12、参赛者应尊重活动评选结果，对结果不得异议。";
	str_content+="<br/><br/>13、凡报名参赛者，即视为已充分了解此比赛规则中各条款，且愿意完全遵守本规则所述各项规定。";
	str_content+="<br/><br/>14、参赛者参加比赛，即表明其已经知悉并愿意遵守本次活动的所有规定。";
	str_content+="<br/><br/>15、组委会对本次大赛拥有最终解释权。";

	str_content+="</div>";



	layer.open({
        type: 1
        ,title: [str_title,'font-size:18px;'] //不显示标题栏
        ,closeBtn: false
        ,area: ['50%', '600px']
        ,shade: 0.5
        ,id: 'LAY_layuipro' //设定一个id，防止重复弹出
        ,btn: ['我拒绝', '我同意']
        ,moveType: 1 //拖拽模式，0或者1
        ,content: str_content
        ,success: function(layero){
          var btn = layero.find('.layui-layer-btn');
          btn.css('text-align', 'center');
          btn.find('.layui-layer-btn0').attr({
            href: '/index/index/index.html'
          });
        }
      });
});
</script>


</body>
</html>
