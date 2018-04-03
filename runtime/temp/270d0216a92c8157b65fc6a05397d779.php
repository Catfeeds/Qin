<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:58:"D:\wwwroot\qnysj1\wwwroot/app/index/view/player/index.html";i:1506567176;s:57:"D:\wwwroot\qnysj1\wwwroot/app/index/view/public/Base.html";i:1520394624;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $type_name; ?>大赛报名-<?php echo \think\Session::get('gjz.title'); ?></title>

<meta name="keywords" content="<?php echo \think\Session::get('gjz.keyword'); ?>" />
<meta name="description" content="<?php echo \think\Session::get('gjz.description'); ?>" />

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

<link rel="stylesheet" type="text/css" href="__STATIC__/layui/css/layui.css" />
<style>
	.acti{border:1px solid #ccc;background:#eee;padding:20px;border-radius:10px;width: 60%;margin-left: 20%;margin-top: 25px;margin-bottom: 25px;}
	.layui-form-item span{color:#000;}
	.layui-form-label{width:200px !important}
	.layui-input-block{margin-left:200px !important}


</style>


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

<div class="float_ewm" style="width:200px;height:250px;" id="img_ewm">

	<img src="__index__/images/float_ewm.png" style="width:200px;height:250px;" />
	<a href="javascript:void(0);" onclick="img_end();" style="position: absolute;width: 15px;text-align: center;top: 0px;right: -15px;">X</a>

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

		function img_end(){
			$("#img_ewm").css("display","none");
		
		}
</script>





	<div class="box_rig rig" style="position: relative;">
		<div class="acti">

			<div class="layui-tab-item layui-show"> 
				<blockquote class="layui-elem-quote">填报分类：<?php echo $type_name; ?></blockquote>
			</div>

			<form class="layui-form layui-form-pane"  style="padding: 20px;background:#fff;border-radius:10px;" action="" method="post" id="fid" enctype="multipart/form-data">

			<div class="layui-form-item" style="<?php if($ls!=0): ?>display:block;<?php else: ?>display:none;<?php endif; ?>">

				<label class="layui-form-label">参选类别</label>
				<div class="layui-input-inline" id="type" style="<?php if($ls!=0): ?>display:none;<?php endif; ?>">
				<input type="hidden" name="tpid" id="type_id" value="<?php if($ls!=0): ?>2<?php else: ?>1<?php endif; ?>"> 
				  <select name="type" required lay-verify="required" lay-filter="tter" style="width:200px;">
					 <option value="" >请选择</option>
					 <?php if(is_array($tlist) || $tlist instanceof \think\Collection || $tlist instanceof \think\Paginator): $i = 0; $__LIST__ = $tlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						<option value="<?php echo $vo['id']; ?>" <?php if($type_id == $vo['id']): ?>selected<?php endif; ?> ><?php echo $vo['name']; ?></option>
					 <?php endforeach; endif; else: echo "" ;endif; ?>
				  </select>
				</div>
				<div class="layui-input-inline" id="maxid" style="<?php if($ls!=0): ?>display:block;<?php else: ?>display:none;<?php endif; ?>" >
				  <select name="maxid" lay-filter="maxter" style="width:200px;">
					 <option value="" >请选择</option>
					 <?php if($ls!=0): if(is_array($ls) || $ls instanceof \think\Collection || $ls instanceof \think\Paginator): $i = 0; $__LIST__ = $ls;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						<option value="<?php echo $vo['id']; ?>" ><?php echo $vo['name']; ?></option>
					  <?php endforeach; endif; else: echo "" ;endif; endif; ?>
				  </select>
				</div>
				 <div class="layui-input-inline" id="minid" style="display:none;">
				  <select name="minid" lay-filter="minter" style="width:200px;">
					 <option value="" >请选择</option>
				  </select>
				</div>
			  </div>

			  <div class="layui-form-item">
				<label class="layui-form-label">姓    名</label>
				<div class="layui-input-block">
				  <input type="text" name="user_name" placeholder="请输入名称" required lay-verify="required" autocomplete="off" class="layui-input">
				</div>
			  </div>
			  <div class="layui-form-item" pane>
				<label class="layui-form-label">性    别</label>
				<div class="layui-input-block">
					<input type="radio" name="user_sex" value="男" title="男" checked>
					<input type="radio" name="user_sex" value="女" title="女" >
				</div>
			  </div>
			  <div class="layui-form-item">
				<label class="layui-form-label">年    龄</label>
				<div class="layui-input-block">
				  <input type="text" name="user_age" placeholder="请输入年龄"  required lay-verify="required" autocomplete="off" class="layui-input">
				</div>
			  </div>
			  <div class="layui-form-item">
				<label class="layui-form-label">民    族</label>
				<div class="layui-input-block">
				  <input type="text" name="race" placeholder="请输入民族" required lay-verify="required" autocomplete="off" class="layui-input">
				</div>
			  </div>
			  
			   <div class="layui-form-item">
				<label class="layui-form-label">出生日期</label>
				<div class="layui-input-block">
				<div class="layui-input-inline">
				  <input class="layui-input" required lay-verify="required" name="user_birth" placeholder="选择时间" readonly onclick="layui.laydate({elem: this, istime: true, format: 'YYYY-MM-DD'})">
				  </div>
				  <div class="layui-form-mid layui-word-aux">如:2017-07-07</div>
				</div>
			  </div>
			  <div class="layui-form-item" pane>
				<label class="layui-form-label">照    片</label>
				<div class="layui-input-block">
					<input type="file" name="img" onChange="handleFiles(this,'id_img_1')" style="display:none;">
				  <a class="layui-btn" onclick="getfile()" style="background-color: #ffffff;color: #191616;">
					<i class="layui-icon">&#xe608;</i> 选择图片
				  </a>
				  <a style="color:#777;font-size: 15px;">注：一寸彩色正面照片(限4M内,仅支持jpg,png,jpeg三种格式)</a>
				</div>
				<div class="layui-input-block" id="id_img_1" style="padding-left: 20px;">
					<img style="width:200px" src="/public/index/user/user_img.png"/>
				</div>
			  </div>
			 <div class="layui-form-item" pane>
				<label class="layui-form-label">所属状态</label>
				<div class="layui-input-block">
					<input type="radio" lay-filter="adi" name="tp" value="1" title="在校" checked>
					<input type="radio" lay-filter="adi" name="tp" value="0" title="社会" >
				</div>
			  </div>
			  <div class="layui-form-item">
				<label class="layui-form-label" id="tp_name">所属学校</label>
				<div class="layui-input-inline" id="pid">
				  <select name="pid" required lay-verify="required" lay-filter="pir" style="width:200px;">
					 <option value="" >请选择</option>
					 <?php if(is_array($plist) || $plist instanceof \think\Collection || $plist instanceof \think\Paginator): $i = 0; $__LIST__ = $plist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pj): $mod = ($i % 2 );++$i;?>
						<option value="<?php echo $pj['id']; ?>"><?php echo $pj['name']; ?></option>
					 <?php endforeach; endif; else: echo "" ;endif; ?>
				  </select>
				</div>
				<div class="layui-input-inline" id="cid" style="display:none;">
				  <select name="cid" lay-filter="cit" style="width:200px;">
					 <option value="" >请选择</option>
				  </select>
				</div>
				 <div class="layui-input-inline" id="sid">
				  <select name="sid" lay-filter="sih" style="width:200px;">
					 <option value="" >请选择</option>
				  </select>
				</div>
				<div class="layui-input-inline" id="ssid" style="display:none;">
				  <select name="ssid" lay-filter="ssih" style="width:200px;">
					 <option value="" >请选择</option>
				  </select>
				</div>
			  </div>
			  <div class="layui-form-item" id="school_id" style="display:none;">
				<label class="layui-form-label">学校名称</label>
				<div class="layui-input-block">
				  <input type="text" name="school_name" placeholder="请输入所属学校名称" autocomplete="off" class="layui-input">
				</div>
			  </div>
			  <div class="layui-form-item" id="xx_id">
				<label class="layui-form-label">所属详细</label>
				<div class="layui-input-block">
				  <input type="text" name="unit" placeholder="请输入所属学校的院,系,级信息"  autocomplete="off" class="layui-input">
				</div>
			  </div>
			  <div class="layui-form-item">
				<label class="layui-form-label">通讯地址</label>
				<div class="layui-input-block">
				  <input type="text" name="site" placeholder="请输入学校或者单位地址"  required lay-verify="required" autocomplete="off" class="layui-input">
				</div>
			  </div>
			  <div class="layui-form-item">
				<label class="layui-form-label">手机号码</label>
				<div class="layui-input-block">
				  <input type="text" name="tel" placeholder="请输入手机号码"  required lay-verify="required" autocomplete="off" class="layui-input">
				</div>
			  </div>
			  <div class="layui-form-item">
				<label class="layui-form-label">指导老师</label>
				<div class="layui-input-block">
				  <input type="text" name="teacher" placeholder="请输入指导老师               注：单人报名请填写一名推荐老师，集体报名最多填写两名推荐老师"  required lay-verify="required" autocomplete="off" class="layui-input">
				</div>
			  </div>
			  <div class="layui-form-item">
				<label class="layui-form-label">邮政编码</label>
				<div class="layui-input-block">
				  <input type="text" name="postcode" placeholder="请输入邮政编码"  required lay-verify="required" autocomplete="off" class="layui-input">
				</div>
			  </div>
			  <div class="layui-form-item layui-form-text" style="<?php if($type_id==28): ?>display:none;<?php else: ?>display:block;<?php endif; ?>">
				<label class="layui-form-label" style="width: 100% !important;"><?php if($type_id==1): ?>参赛人员<?php elseif($type_id==27): ?>主创人员简介<?php else: ?>选手简介<?php endif; ?></label>
				<div class="layui-input-block" style="margin-left: 0px !important;">
				  <textarea name="esc" placeholder="请输入<?php if($type_id==1): ?>参赛人数及姓名<?php elseif($type_id==27): ?>主创人员简介<?php else: ?>选手简介<?php endif; ?>" class="layui-textarea" ></textarea>
				</div>
			  </div>
			  <div class="layui-form-item" pane>
				<label class="layui-form-label">身份证正面照</label>
				<div class="layui-input-block">
					<input type="file" name="idcard_img" onChange="handleFiles(this,'id_img_2')" style="display:none;">
				  <a class="layui-btn" onclick="getfile_2()" style="background-color: #ffffff;color: #191616;">
					<i class="layui-icon">&#xe608;</i> 选择文件
				  </a>
				  <a style="color:#777;font-size: 15px;">请上传参赛选手身份证正面照(400*220,仅支持jpg,png,jpeg三种格式)</a>
				</div>
				<div class="layui-input-block" id="id_img_2" style="padding-left: 20px;">
					<!--<img style="width:200px" src="/public/index/user/user_img.png"/>-->
					
				</div>
				<a style="color:#777;font-size: 15px;padding-left: 220px;">注：多人请将照片压缩成rar或zip格式上传</a>
			  </div>
			   <div class="layui-form-item">
				<label class="layui-form-label"><?php if($type_id==1): ?>节目名称<?php elseif($type_id==27): ?>电影名<?php elseif($type_id==28): ?>动漫创意作品名称<?php else: ?>作品名称<?php endif; ?></label>
				<div class="layui-input-block">
				  <input type="text" name="wname" required lay-verify="required" placeholder="请输入<?php if($type_id==1): ?>节目名称<?php elseif($type_id==27): ?>电影名<?php elseif($type_id==28): ?>动漫创意作品名称<?php else: ?>作品名称<?php endif; ?>"  autocomplete="off" class="layui-input">
				</div>
			  </div>
			  <div class="layui-form-item layui-form-text" style="<?php if($type_id==22): ?>display:none;<?php else: ?>display:block;<?php endif; ?>" >
				<label class="layui-form-label" style="width: 100% !important;"><?php if($type_id==1): ?>节目简介<?php elseif($type_id==27): ?>剧本简介<?php elseif($type_id==31): ?>作品简介及创作思路<?php else: ?>作品简介<?php endif; ?></label>
				<div class="layui-input-block" style="margin-left: 0px !important;">
				  <textarea name="intro" placeholder="请输入<?php if($type_id==1): ?>节目简介<?php elseif($type_id==27): ?>剧本简介<?php elseif($type_id==31): ?>作品简介及创作思路<?php else: ?>作品简介<?php endif; ?>" class="layui-textarea" ></textarea>
				</div>
			  </div>
			  <div class="layui-form-item layui-form-text" style="<?php if($type_id==27 or $type_id==28 or $type_id==31): ?>display:block;<?php else: ?>display:none;<?php endif; ?>" >
				<label id="dsb" class="layui-form-label" style="width: 100% !important;    font-size: 18px;">
				<?php if($type_id==27): ?>
						注：10月20日截止投稿，请提交剧本（纸质档和电子档各一份）至官方指定邮箱和地址。&nbsp;&nbsp;<a href='/index/news/news_info/news_id/62.html' target='_blank' style='color: #488ff9;cursor: pointer;font-size: 16px;'>详细说明</a>
				<?php elseif($type_id==28): ?>
						注：9月30日截止投稿，请提交(动漫：电子档/漫画：纸质档)作品至官方指定邮箱。&nbsp;&nbsp;<a href='/index/news/news_info/news_id/62.html' target='_blank' style='color: #488ff9;cursor: pointer;font-size: 16px;'>详细说明</a>
				<?php elseif($type_id==31): ?>
						注：9月30日截止投稿 请提交(文学：电子档纸质档各一份/书法，绘画，摄影：纸质档)作品寄送至官方指定地址&nbsp;&nbsp;<a href='/index/news/news_info/news_id/62.html' target='_blank' style='color: #488ff9;cursor: pointer;font-size: 16px;'>详细说明</a>	
				<?php endif; ?></label>
			  </div>
			  <div class="layui-form-item">
				<label class="layui-form-label">推荐单位</label>
				<div class="layui-input-block">
				  <input type="text" name="rec" placeholder="请输入推荐单位"  autocomplete="off" class="layui-input">
				</div>
			  </div>
			  <div class="layui-form-item">
				<label class="layui-form-label">推荐单位联系人及电话</label>
				<div class="layui-input-block">
				  <input type="text" name="rectel" placeholder="请输入联系人及电话"  autocomplete="off" class="layui-input">
				</div>
			  </div>
			  <div class="layui-form-item" pane>
				<label class="layui-form-label">是否公开</label>
				<div class="layui-input-block">
				<div class="layui-input-inline" style="margin-left: 0px;">
					<input type="radio" name="so_open" value="1" title="是" checked>
					<input type="radio" name="so_open" value="0" title="否" >
				</div>
				<div class="layui-form-mid layui-word-aux">注:是否在报名审核通过后在选手列表里显示个人头像及参赛基本个人信息</div>
				</div>
				
			  </div>
              <div class="layui-form-item">
                <input type="button" value="确认提交" class="layui-btn" key="set-mine" lay-filter="formDemo" lay-submit/>
              </div>
            </form>
			</div>
		</div>
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
			@共青团湖南省委 版权所有 <a href="http://www.miitbeian.gov.cn/">备案号：湘ICP备17011069号-1</a><br /> <br />
			技术支持：长沙乾明文化传播有限公司<br /> <br />
			
			<a href="http://tongji.baidu.com/web/welcome/ico?s=8e85dbf31e589d58cb1b25a97ad602be" target="_block">
				<img src="http://tongji.baidu.com/sc-web/image/icon/45.gif?__v=1497418389885" alt="">
			</a>
			
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
<script type="text/javascript" src="__STATIC__/../index/js/player_index_js.js?ver=<?php echo date('ymd'); ?>"></script>
<script>
//获取图片
window.URL = window.URL || window.webkitURL;


	function handleFiles(obj,id_img) {
		
			var fileList = document.getElementById(id_img);
			var files = obj.files;
			if(id_img=="id_img_2")
			{
				var photoExt=obj.value.substr(obj.value.lastIndexOf(".")).toLowerCase();//获得文件后缀名
					if(photoExt=='.rar'||photoExt=='.zip'){
						fileList.innerHTML="";
						
						fileList.append("   已选择文件："+obj.value);
						return false;
					}
			}

			img = new Image();
			if(window.URL){	
				img.src = window.URL.createObjectURL(files[0]); //创建一个object URL，并不是你的本地路径
				img.className = "lay-img";
				img.style="width:200px";
				img.onload = function(e) {
					window.URL.revokeObjectURL(this.src); //图片加载后，释放object URL
				}
				if(fileList.firstElementChild){
					// fileList.removeChild(fileList.firstElementChild);
					fileList.innerHTML="";
				} 
				fileList.appendChild(img);
			}else if(window.FileReader){
				//opera不支持createObjectURL/revokeObjectURL方法。我们用FileReader对象来处理
				var reader = new FileReader();
				reader.readAsDataURL(files[0]);
				reader.onload = function(e){	
						img.src = this.result;
						img.className = "lay-img";
						// fileList.removeChild(fileList.firstElementChild);
						fileList.innerHTML="";
						fileList.appendChild(img);
				}
			}else
			{
				//ie
				obj.select();
				obj.blur();
				var nfile = document.selection.createRange().text;
				document.selection.empty();
				img.src = nfile;
				img.className = "lay-img";
				// fileList.removeChild(fileList.firstElementChild);
				fileList.innerHTML="";
				fileList.appendChild(img);
			}
		
	}



</script>


</body>
</html>
