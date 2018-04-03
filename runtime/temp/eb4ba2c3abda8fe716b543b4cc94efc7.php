<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:64:"D:\amp\UPUPW_K2.1_64\htdocs\QN/app/index\view\user\art_info.html";i:1492929087;s:62:"D:\amp\UPUPW_K2.1_64\htdocs\QN/app/index\view\public\Base.html";i:1492928275;}*/ ?>
﻿<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>
		  个人主页-<?php echo cookie('remark')['title']; ?></title>
		  <meta name="keywords" content="<?php echo cookie('remark')['keyword']; ?>">
		  <meta name="description" content="<?php echo cookie('remark')['description']; ?>">
		  <link rel="stylesheet" type="text/css" href="__index__/css/index.css"/>
		  <style>
			.box_shux{min-height: 600px;}
			.col_act{min-height: 600px;}

			.rig paging_list{padding-right: 20px;}
			.nav li.cli{color: #fff;}

			.new_banner img{width:100%;height:400px;}

			.a{color:#adadad;}

			.acti{padding: 20px 40px 20px;background: #EEE;width: 738px;overflow: hidden;border-radius: 10px;}
			.log_reg_box{position: fixed;width: 400px;overflow:hidden;left: 50%;top: 50%;background:#fff;margin:-140px 0 0 -200px;z-index: 29;padding-bottom: 20px;}
			.zhegai{width: 100%;height: 100%;background: #000;opacity: 0.5;position: fixed;left: 0;top: 0;z-index: 20;}
			.log_reg_tit,.log_reg_tit b,.log_info li{height: 50px;line-height: 50px;}
			.log_reg_tit,.log_reg_tit b,.log_info li span,.log_info li a{text-align: center;}
			.log_reg_tit{width: 100%;height: 49px;position: relative;border-bottom: 1px solid #ccc;background: #333;color: #fff;}
			.log_reg_tit b{display: block;position: absolute;top: 0;right: 0;width: 50px;font-size: 24px;font-weight: 100;cursor: pointer;}
			.log_info{overflow:hidden;padding: 0 10px;}
			.log_info li{width: 100%;overflow: hidden;}
			.log_info li span{width: 100px;display: inline-block;}
			.log_info li input{width: 260px;height: 20px;display: inline-block;margin-top: 10px;padding:5px;outline: none;}
			.log_info li a{width: 80px;height: 100%;cursor: pointer;margin-left: 10px;}
			.log_info li .lan{background: #333;color: #fff;width: 240px;height: 40px;border: 0;margin: 5px 0 0 75px;border-radius: 10px;cursor: pointer;}
			.log_reg{height: 20px;margin-top: 10px;}
			.log_reg li{width: 50px;margin-left: 20px;text-align: center;line-height: 20px;float: left;cursor: pointer;}
			.log_reg li.cli a{color: #1995E4;}
		  </style>
	
<link rel="stylesheet" type="text/css" href="__STATIC__/layui/css/layui.css" />
<style>
	.acti{padding: 28px 40px 42px;background: #EEE;width: 738px;overflow: hidden;border-radius: 10px;}
	.journalism_tit{height: 52px;color: #fff;line-height: 52px;font-size: 24px;}
	.journalism_tit span{color: #ff0;}
	.new_banner{height: 433px;margin-bottom: 20px;}
	.new_banner img{width: 100%;height: 100%;}
	.sch_pre{width: 100%;height: 92px;margin-bottom: 24px;}
	.sch_pre li{width: 182px;height: 100%;margin-right: 2px;float: left;cursor: pointer;}
	.sch_pre li img,.bri_int li img,.inf_lef img{width: 100%;height: 100%;}
	.sch_pre li:last-child{margin-right: 0;}
	.eve_reg{color: #fff;color: #CDCDCD;line-height: 20px;margin-bottom: 18px;font-size: 14px;}
	.acti_botm_tit{height: 30px;line-height: 30px;border-bottom: 1px solid #a5a5a5;color: #ff0;text-align: left;margin-bottom: 18px;}
	.bri_int li{width: 243px;height: 143px;float: left;margin: 0 3px 3px 0;}
	.com{overflow: hidden;padding: 10px 10px 20px 10px;background: #fff;border-radius: 10px;}
	.dyn{overflow: hidden;padding:5px 10px;border-bottom: 1px dashed #ccc;}
	.nic{font-size: 14px;line-height: 20px;overflow: hidden;}
	
	.con{overflow: hidden;line-height: 22px;font-size: 12px;}
	.con .tim,.con .con_rig{color: #C4C0C1;}
	.con .tim{width: 30%;}
	.con .con_rig{width: 60px;margin-left: 10px;}
	.acti_botm_tit{height: 30px;line-height: 30px;border-bottom: 1px solid #a5a5a5;text-align: left;margin-bottom: 18px;}
	.acti_botm_tit span{color: #000;}
	.acti_botm_tit ul{color: #000;}
	.bri_int li{width: 243px;height: 143px;float: left;margin: 0 3px 3px 0;}
	.pub{overflow: hidden;height: 150px;margin-top: 8px;}
	textarea{width: 97%;height: 80px;border-radius: 10px;border: 1px solid #ccc;padding: 10px;max-height: 80px;outline:none;}
	.pub span{background: #1995E4;width: 100px;height: 30px;line-height: 30px;text-align: center;cursor: pointer;}
	.inf{overflow: hidden;padding-bottom: 20px;margin-bottom: 20px;border-bottom: 1px solid #ccc;}
	.inf_lef{width: 90px;height: 90px;}
	.inf_rig{width: 500px;margin-left: 20px;}
	.inf_rig li{height: 30px;}
	/*回复*/
	.reply{width: 100%;font-size: 14px;color: #000000;}
</style>
	<script src="js/jquery-1.8.3.js" type="text/javascript" charset="utf-8"></script>

	</head>
	<body>
		<div class="zhegai" style="display:none;"></div>
		<div class="log_reg_box" style="display:none;">
			<ul class="log_reg_tit">
					青年文化艺术节
				<b>X</b>
			</ul>
			<div style="width:100%;overflow: hidden;">
				<ul class="log_info" id="login-form">
					<li><span class="lef">账&nbsp;&nbsp;&nbsp;&nbsp;号：</span><input class="lef" type="text" id="zhanghao" placeholder="请输入账号" /></li>
					<li><span class="lef">密&nbsp;&nbsp;&nbsp;&nbsp;码：</span><input class="lef" type="password" id="mima" placeholder="请输入密码" /></li>
					<li><input type="button" class="lan" id="login" value="登陆" /></li>
				</ul>
				<ul class="log_info" id="reg-form" style="display: none;">
					<li><span class="lef">手机号：</span><input class="lef" type="text" id="username" placeholder="请输入账号" /></li>
					<li><span class="lef">密&nbsp;&nbsp;&nbsp;&nbsp;码：</span><input class="lef" id="password" type="password" placeholder="请输入密码" /></li>
					<li><span class="lef">确认密码：</span><input class="lef" type="password" id="password1" placeholder="请输入密码" /></li>
					<li><span class="lef">验证码：</span><input class="lef" style="width: 160px;" type="text" id="yzm" placeholder="验证码" /><a class="lef" id="sendcode">获取验证码</a></li>
					<li><input type="button" class="lan" id="reg" value="注册" /></li>
				</ul>
			</div>
			<ul class="log_reg">
				<li class="cli"><a>登陆</a></li>
				<li><a>注册</a></li>
			</ul>
		</div>
		<div class="inde_box ">
			<div class="inde_box1"></div>
			<div class="inde_box2"></div>
			<div class="sign_up"></div>
			<div class="box">
		<div class="box_lef lef">
			<div class="log"></div>
		
			<ul class="nav" style="position: relative;z-index: 2;">
				<a href="<?php echo url('index/index'); ?>"><li class="<?php if(session('index_nav')=='index'): ?>cli<?php endif; ?>">网站首页</li></a>
				<a href="<?php echo url('news/index'); ?>"><li class="<?php if(session('index_nav')=='news'): ?>cli<?php endif; ?>">新闻资讯</li></a>
				<a href="<?php echo url('live/index'); ?>"><li class="<?php if(session('index_nav')=='live'): ?>cli<?php endif; ?>">赛事直播</li></a>
				<a href="<?php echo url('school/index'); ?>"><li class="<?php if(session('index_nav')=='school'): ?>cli<?php endif; ?>">校区集锦</li></a>
				<a href="<?php echo url('module/index'); ?>"><li class="<?php if(session('index_nav')=='module'): ?>cli<?php endif; ?>" target="_blank">社团活动</li></a>
				<a <?php if(\think\Session::get('user_auth.id')!=null): ?>href="<?php echo url('login/index'); ?>"<?php else: ?> id="lr" <?php endif; ?>><p><?php if(\think\Session::get('user_auth.id')!=null): ?><?php echo \think\Session::get('user_auth.name'); else: ?>注册/登陆<?php endif; ?></p></a>
			</ul>
		
		

	<div class="box_shux">
		<ul class="activity" style="padding: 10px 20px;">
			<li class="cli"><a href="<?php echo url('index/user/index',['user_id'=>input('user_id')]); ?>">个人动态</a></li>
			<li><a href="<?php echo url('index/user/photo_index',['user_id'=>input('user_id')]); ?>">相册</a></li>
			<li><a href="<?php echo url('index/user/gb_index',['user_id'=>input('user_id')]); ?>">留言板</a></li>
		</ul>
		<div class="sign_up1">
			<div class="sign_up_hed" style="margin-bottom: 10px;border: 0;">来访记录</div>
			
			<ul class="sign_up_statistics">
				<?php if(is_array($list_record) || $list_record instanceof \think\Collection || $list_record instanceof \think\Paginator): $i = 0; $__LIST__ = $list_record;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					<li><span><?php echo $i; ?>、</span><b><?php echo $vo['wname']; ?></b><strong><?php echo date('Y-m-d',$vo['add_time']); ?></strong></li>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
			
		</div>
	</div>

	</div>

	<div class="box_rig rig" style="position: relative;">
		<div class="acti">
			<div class="journalism_tit" style="color: #000;border-bottom: 1px solid #000;margin-bottom: 20px;">
				<span class="lef">动态评论</span>
				<?php echo $list_com->render(); ?>
			</div>
			<div class="com">
				<div class="dyn">
					<div class="nic"><?php echo $obj['content']; ?></div>
					<div class="con">
						<div class="tim rig"><?php echo date('Y-m-d H:i',$obj['add_time']); ?></div>
					</div>
				</div>
				<div id="jieda"></div>
				<?php if(is_array($list_com) || $list_com instanceof \think\Collection || $list_com instanceof \think\Paginator): $i = 0; $__LIST__ = $list_com;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
				<div class="info">
					<div class="info_lef lef"><img style="width: 80px;height: 70px;" src="<?php echo $vo['user_img']; ?>" /></div>
					<div class="info_rig lef"><a><?php echo $vo['user_name']; ?>：</a><?php echo $vo['content']; ?></div>
				</div>
				<div class="reply">
					<div class="tim lef" style="margin-left: 50px;color:#C4C0C1;text-align: left;"><?php echo date('Y-m-d H:i:s',$vo['add_time']); ?></div>
					<span class="rig" onclick='hf(<?php echo $vo['id']; ?>,<?php echo $vo['user_id']; ?>,"<?php echo $vo['user_name']; ?>")'>回复</span>
				</div>
				<?php endforeach; endif; else: echo "" ;endif; ?>
				<?php echo $list_com->render(); ?>
			</div>
			<div class="pub">
				<form action="" method="post" id="plhf" class="layui-form">
				<textarea style="height: 200px;" id="content" name="content" placeholder="我要评论"></textarea>
				<input type="hidden" id="art_id" name="art_id" value="<?php echo $obj['id']; ?>">
			  <input type="hidden" id="art_title" name="art_title" value="动态">
			  <input type="hidden" id="type" name="type" value="2">
			  <input type="hidden" id="pid" name="pid" value="<?php echo $obj['id']; ?>">
			  <input type="hidden" id="puid" name="puid" value="<?php echo $obj['user_id']; ?>">
				 <input type="button" style="float:right;" class="layui-btn" value="发布" lay-filter="sbt" lay-submit/>
				</form>
			</div>
		</div>
	</div>
</div>



	<div class="foot">
		<div class="foot_box">
			<div class="QR_code lef">
				<img src="__index__/img/02.png"/>
			</div>
			<div class="foot_list rig">
				<p>主办：共青团湖南省委、湖南省教育厅、湖南省文化厅、湖南省青年联合会、湖南省学生联合会</p>
				<p>共青团湖南省委 版权所有 技术支持：湖南亿虹青峰文化传播有限公司 组委会办公地址：湖南省长沙市天心区湘府西路1号</p>
				<p>网站域名：18888.88.888 网站备案号：88888888</p>
			</div>
		</div>
	</div>

</div>

<script src="__index__/js/jquery-1.8.3.js" type="text/javascript" charset="utf-8"></script>
<script src="__index__/js/common.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript" src="__STATIC__/layui/layui.js"></script>
<script>
window.onload=function(){
	if(GetQueryString('page')==1)
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
//Demo
layui.use('form', function(){
  var form = layui.form();
  //监听提交
  form.on('submit(sbt)', function(data){
    if(data.field['content']=='')
	  {
		layer.msg('内容不能为空');
		return;
	  }

	$.ajax({
		url:"<?php echo url('user/user_art_com'); ?>",
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

//回复评论
function hf(id,uid,uname)
{
	$('#type').prop('value',6);
	$('#art_title').prop('value','评论');
	$('#pid').prop('value',id);
	$('#puid').prop('value',uid);
	$('#content').prop('value','回复：@'+uname+':').focus();
}



</script>

<script type="text/javascript">
	$(function(){
		$(".log_reg li").click(function(){
			$(this).addClass("cli").siblings().removeClass("cli")
			$(".log_info").eq($(this).index()).show().siblings().hide();
		})
		$(".log_reg_tit b").click(function(){
			$(".log_reg_box").hide();
			$(".zhegai").hide();
		})
		$("#lr").click(function(){
			$(".log_reg_box").show();
			$(".zhegai").show();
		})
		
	})

		//点击获取验证码按钮
		document.getElementById("sendcode").addEventListener("click", function(){
			//验证手机号
			var retel = /^(((13[0-9]{1})|(14[0-9]{1})|(15[0-9]{1})|(17[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
			var mobile = document.getElementById("username").value;

			//var verify = document.getElementById("verify").value;
			//else if(!verify || verify == ''){mui.alert("图形码必须填写");}

			if(!retel.exec(mobile)){
				alert("手机号码格式不正确");
			}else{
				//倒计时60秒
				var obj = document.getElementById("sendcode");
				disableWait(60, obj, "秒后重新获取");
				
				//发送验证码
				$.post('<?php echo url('login/reg_yzm'); ?>',{
						phone: mobile
					},function(data){
						if(data == null) {
							alert('服务端错误');
							return;
						}
						if(data.status == 0) {
							alert(data.message);
							return;
						}
						alert('发送成功');
					},'json'
				);
			}
			
		});


		//点击注册按钮
		document.getElementById("reg").addEventListener("click", function(){
			//判断input是否为空
			check = true;
			$("#reg-form input").each(function() {
				//若当前input为空，则alert提醒 
				if(!this.value || this.value.trim() == "") {
					var label = this.previousElementSibling;
					alert(label.innerText + "不允许为空");
					check = false;
					return false;
				}
			});
			//验证手机号
			var retel = /^(((13[0-9]{1})|(14[0-9]{1})|(15[0-9]{1})|(17[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
			var mobile = document.getElementById("username").value;
			if(!retel.exec(mobile)){
				alert("手机号码格式不正确");
				check = false;
			}
			//验证密码
			var password = document.getElementById("password").value;
			var password1 = document.getElementById("password1").value;
			if(password != password1){
				alert("两次输入密码不相符");
				check = false;
			}
			//校验通过，继续执行业务逻辑 
			if(check){
				//ajax交互，进行注册//
				$.post('<?php echo url('login/reg'); ?>',{
						phone: document.getElementById("username").value,
						password: document.getElementById("password1").value,
						yzm: document.getElementById("yzm").value
					},function(data){
						if(data == null) {
                            alert('服务端错误');
                            return;
                        }
                        if(data.status == 0) {
                            alert(data.message);
                            return;
                        }
                        alert('注册成功');
                       location.href='<?php echo url('usercontrol/index'); ?>'
					},'json'
				);
			}
		});

		//倒计时通用按钮js
		function disableWait(t, obj, waitMessage) {
			var objTag = obj.tagName.toLowerCase();
			if (objTag !== "input" && objTag != "button") {
				return;
			}

			var v = objTag !== "input" ? obj.innerText : obj.value;
			var i = setInterval(function() {
				if (t > 0) {
					switch (objTag) {
						case "input":
							obj.value = (--t) + waitMessage;
							break;
						case "button":
							obj.innerText = (--t) + waitMessage;
							break;
						default:
							break;
					}
					obj.disabled = true;
				} else {
					window.clearInterval(i);
					switch (objTag) {
						case "input":
							obj.value = v;
							break;
						case "button":
							obj.innerText = v;
							break;
						default:
							break;
					}
					obj.disabled = false;
				}
			}, 1000);
		}

</script>

	</body>
</html>
