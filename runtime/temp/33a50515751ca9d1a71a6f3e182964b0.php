<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:59:"D:\wwwroot\wchhui1\wwwroot/app/index\view\player\index.html";i:1493870234;s:58:"D:\wwwroot\wchhui1\wwwroot/app/index\view\public\Base.html";i:1493874120;}*/ ?>
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

<link rel="stylesheet" type="text/css" href="__STATIC__/layui/css/layui.css" />
<style>
	.acti{border:1px solid #ccc;background:#eee;padding:20px;border-radius:10px;width: 60%;margin-left: 20%;margin-top: 25px;margin-bottom: 25px;}
	.layui-form-item span{color:#000;}
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
                <li><a href="/index/module/index.html">校园媒体</a></li>
            </ul>
        </div>        
    </div>
</div>

<div class="float_ewm">
	<img src="__index__/images/float_ewm.png" width="171" height="208" />
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



	<div class="box_rig rig" style="position: relative;">
			<div class="acti">
			<form class="layui-form layui-form-pane"  style="padding: 20px;background:#fff;border-radius:10px;" action="" method="post" id="fid" enctype="multipart/form-data">
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
				  <input class="layui-input" required lay-verify="required" name="user_birth" placeholder="选择时间" onclick="layui.laydate({elem: this, istime: true, format: 'YYYY-MM-DD'})">
				  </div>
				  <div class="layui-form-mid layui-word-aux">如:2017-07-07</div>
				</div>
			  </div>
			  <div class="layui-form-item" pane>
				<label class="layui-form-label">照    片</label>
				<div class="layui-input-block">
					<input type="file" name="img" onChange="handleFiles(this)" style="display:none;">
				  <a class="layui-btn" onclick="getfile()" style="background-color: #ffffff;color: #191616;">
					<i class="layui-icon">&#xe608;</i> 选择图片
				  </a>
				</div>
				<div class="layui-input-block" id="id_img">
					<img style="width:200px" src="__STATIC__/images/timg.jpg"/>
				</div>
			  </div>
			  <div class="layui-form-item" pane>
				<label class="layui-form-label">所属群体</label>
				<div class="layui-input-block">
					<input type="radio" lay-filter="adi" name="tp" value="1" title="在校" checked>
					<input type="radio" lay-filter="adi" name="tp" value="2" title="社会" >
				</div>
			  </div>
			  <div class="layui-form-item">
				<label class="layui-form-label">所属地区</label>
				<div class="layui-input-inline" id="pid">
				  <select name="pid" required lay-verify="required" lay-filter="pir" style="width:200px;">
					 <option value="" >请选择</option>
					 <?php if(is_array($plist) || $plist instanceof \think\Collection || $plist instanceof \think\Paginator): $i = 0; $__LIST__ = $plist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pj): $mod = ($i % 2 );++$i;?>
						<option value="<?php echo $pj['id']; ?>"><?php echo $pj['name']; ?></option>
					 <?php endforeach; endif; else: echo "" ;endif; ?>
				  </select>
				</div>
				<div class="layui-input-inline" id="cid" >
				  <select name="cid" required lay-verify="required" lay-filter="cit" style="width:200px;">
					 <option value="" >请选择</option>
					 
				  </select>
				</div>
				 <div class="layui-input-inline" id="sid">
				  <select name="sid" style="width:200px;">
					 <option value="" >请选择</option>

				  </select>
				</div>
			  </div>
			  <div class="layui-form-item">
				<label class="layui-form-label">所属详细</label>
				<div class="layui-input-block">
				  <input type="text" name="unit" placeholder="请输入 工作单位 或 学校院系" required lay-verify="required" autocomplete="off" class="layui-input">
				</div>
			  </div>
			  <div class="layui-form-item">
				<label class="layui-form-label">通讯地址</label>
				<div class="layui-input-block">
				  <input type="text" name="site" placeholder="请输入通讯地址"  required lay-verify="required" autocomplete="off" class="layui-input">
				</div>
			  </div>
			  <div class="layui-form-item">
				<label class="layui-form-label">联系电话</label>
				<div class="layui-input-block">
				  <input type="text" name="tel" placeholder="请输入联系电话"  required lay-verify="required" autocomplete="off" class="layui-input">
				</div>
			  </div>
			  <div class="layui-form-item">
				<label class="layui-form-label">指导老师</label>
				<div class="layui-input-block">
				  <input type="text" name="teacher" placeholder="请输入指导老师"  required lay-verify="required" autocomplete="off" class="layui-input">
				</div>
			  </div>
			  <div class="layui-form-item">
				<label class="layui-form-label">邮政编码</label>
				<div class="layui-input-block">
				  <input type="text" name="postcode" placeholder="请输入邮政编码"  required lay-verify="required" autocomplete="off" class="layui-input">
				</div>
			  </div>
			  <div class="layui-form-item">
				<label class="layui-form-label">比赛类别</label>
				<div class="layui-input-inline" id="type">
				<input type="hidden" name="tpid" id="type_id" value="1"> 
				  <select name="type" required lay-verify="required" lay-filter="tter" style="width:200px;">
					 <option value="" >请选择</option>
					 <?php if(is_array($tlist) || $tlist instanceof \think\Collection || $tlist instanceof \think\Paginator): $i = 0; $__LIST__ = $tlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						<option value="<?php echo $vo['id']; ?>" ><?php echo $vo['name']; ?></option>
					 <?php endforeach; endif; else: echo "" ;endif; ?>
				  </select>
				</div>
				<div class="layui-input-inline" id="maxid" style="display:none;" >
				  <select name="maxid" lay-filter="maxter" style="width:200px;">
					 <option value="" >请选择</option>
					 
				  </select>
				</div>
				 <div class="layui-input-inline" id="minid" style="display:none;">
				  <select name="minid" lay-filter="minter" style="width:200px;">
					 <option value="" >请选择</option>
				  </select>
				</div>
			  </div>
			  <div class="layui-form-item layui-form-text" >
				<label class="layui-form-label">选手简介</label>
				<div class="layui-input-block">
				  <textarea name="esc" required lay-verify="required" placeholder="请输入参赛人数及姓名，简介" class="layui-textarea" ></textarea>
				</div>
			  </div>
			   <div class="layui-form-item">
				<label class="layui-form-label">作品名称</label>
				<div class="layui-input-block">
				  <input type="text" name="wname" required lay-verify="required" placeholder="请输入作品名称"  autocomplete="off" class="layui-input">
				</div>
			  </div>
			  <div class="layui-form-item layui-form-text" >
				<label class="layui-form-label">作品简介</label>
				<div class="layui-input-block">
				  <textarea name="intro" required lay-verify="required" placeholder="请输入作品简介" class="layui-textarea" ></textarea>
				</div>
			  </div>
			  <div class="layui-form-item">
				<label class="layui-form-label">推荐单位</label>
				<div class="layui-input-block">
				  <input type="text" name="rec" placeholder="请输入作品名称"  autocomplete="off" class="layui-input">
				</div>
			  </div>
			  <div class="layui-form-item">
				<label class="layui-form-label">推荐单位联系人及电话</label>
				<div class="layui-input-block">
				  <input type="text" name="rectel" placeholder="请输入联系人及电话"  autocomplete="off" class="layui-input">
				</div>
			  </div>
              <div class="layui-form-item">
                <button class="layui-btn" key="set-mine" lay-filter="formDemo" lay-submit>确认提交</button>
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
		<div class="bottom_copy_left">
			主办单位：共青团湖南省委、湖南省教育厅、湖南省文化厅、湖南省青年联合会、湖南省学生联合会 组委会办公地址： 湖南省长沙市天心区湘府西路1号<br />       
			承办单位：湖南省青少年活动中心、湖南省青年就业创业基金会、湖南省青年企业家协会、《年轻人》杂志社<br /> 
			共青团湖南省委 版权所有 信息网络传播许可证号：19255107 互联网新闻信息服务许可证号：461205036<br /> 
			技术支持：湖南亿虹青峰文化传播有限公司 Information network dissemination license number: 19255107 Internet news information service license number: 461205036
		</div>
		<div class="bottom_copy_right"><img src="__index__/images/ewm.jpg" /></div>
	</div>



<script type="text/javascript" src="__STATIC__/layui/layui.js"></script>
<script type="text/javascript" src="__STATIC__/../index/js/player_index_js.js"></script>
<script>
window.URL = window.URL || window.webkitURL;
	function handleFiles(obj) {
		
			fileList = document.getElementById("id_img");
			var files = obj.files;
			img = new Image();
			if(window.URL){	
				img.src = window.URL.createObjectURL(files[0]); //创建一个object URL，并不是你的本地路径
				img.className = "lay-img";
				img.style="width:200px";
				img.onload = function(e) {
					window.URL.revokeObjectURL(this.src); //图片加载后，释放object URL
				}
				if(fileList.firstElementChild){
					 fileList.removeChild(fileList.firstElementChild);
				} 
				fileList.appendChild(img);
			}else if(window.FileReader){
				//opera不支持createObjectURL/revokeObjectURL方法。我们用FileReader对象来处理
				var reader = new FileReader();
				reader.readAsDataURL(files[0]);
				reader.onload = function(e){	
						img.src = this.result;
						img.className = "lay-img";
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
				img.onload=function(){
				  
				}
				fileList.appendChild(img);
			}
		
	}



</script>


</body>
</html>
