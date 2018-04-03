<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:53:"D:\wwwroot\qnysj1\wwwroot/app/wap/view/login/reg.html";i:1494494740;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>湖南省青年文化艺术节</title>
    <link rel="stylesheet" href="__STATIC__/mui/css/mui.css">
    <style>
		.area {
			margin: 20px auto 0px auto;
		}
		
		.mui-input-group {
			margin-top: 10px;
		}
		
		.mui-input-group:first-child {
			margin-top: 20px;
		}
		
		.mui-input-group label {
			width: 25%;
		}
		
		.mui-input-row label~input,
		.mui-input-row label~select,
		.mui-input-row label~textarea {
			width: 75%;
		}
		
		.mui-checkbox input[type=checkbox],
		.mui-radio input[type=radio] {
			top: 6px;
		}
		
		.mui-content-padded {
			margin-top: 25px;
		}
		
		.mui-btn {
			padding: 10px;
		}
		
		.link-area {
			display: block;
			margin-top: 25px;
			text-align: center;
		}
		
		.mui-switch:before{
			content:attr(data-off);
		}
		.mui-switch.mui-active:before{
			content:attr(data-on);
		}
	</style>
</head>
<body>
	<header class="mui-bar mui-bar-nav">
	    <h1 class="mui-title">注册</h1>
	</header>
	<div class="mui-content">
	    <form id='reg-form' class="mui-input-group">
			<div class="mui-input-row">
				<label>手机号</label>
				<input id='username' type="text" class="mui-input-clear mui-input" placeholder="请输入手机号">
			</div>
			<div class="mui-input-row">
				<label>密码</label>
				<input id='password' type="password" class="mui-input mui-input-password" placeholder="请输入密码">
			</div>
			<div class="mui-input-row">
				<label>确认</label>
				<input id='password1' type="password" class="mui-input mui-input-password" placeholder="请确认密码">
			</div>
			<div class="mui-input-row">
				<label>验证码</label>
				<input id='yzm' type="text" class="mui-input" placeholder="请输入验证码" style="width: 40%;float: left;">
				<button id='sendcode' type="button" class="mui-btn mui-btn-green"  style="width: 34%;float: right;">获取验证码</button>
			</div>
			
		</form>
		<div class="mui-content-padded">
			<button id='reg'  type="button" data-loading-text="注册中" class="mui-btn mui-btn-block mui-btn-primary">注册账号</button>
			<div class="link-area"><a id='login' href="<?php echo url('Login/index'); ?>">登录账号</a> <span class="spliter">|</span> <a id='index' href="<?php echo url('index/index'); ?>">返回官网</a>
			</div>
		</div>
		<div class="mui-content-padded oauth-area">

		</div>
	</div>
    <script src="__STATIC__/mui/js/mui.js"></script>
    <script type="text/javascript" charset="utf-8">
      	mui.init();
		
		//点击获取验证码按钮
		document.getElementById("sendcode").addEventListener("click", function(){
			//验证手机号
			var retel = /^(((13[0-9]{1})|(14[0-9]{1})|(15[0-9]{1})|(17[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
			var mobile = document.getElementById("username").value;
			if(!retel.exec(mobile)){
				mui.alert("手机号码格式不正确");
			}else{
				//倒计时60秒
				var obj = document.getElementById("sendcode");
				disableWait(60, obj, "秒后重新获取");
				
				//发送验证码
				mui.post('<?php echo url('Login/reg_yzm'); ?>',{
						phone: mobile
					},function(data){
						if(data == null) {
							mui.toast('服务端错误');
							return;
						}
						if(data.status != 1) {
							mui.toast(data.message);
							return;
						}

						mui.toast('发送成功');
					},'json'
				);
			}
			
		});
		//点击注册按钮
		document.getElementById("reg").addEventListener("click", function(){
			//判断input是否为空
			check = true;
			mui("#reg-form input").each(function() {
				//若当前input为空，则alert提醒 
				if(!this.value || this.value.trim() == "") {
					var label = this.previousElementSibling;
					mui.alert(label.innerText + "不允许为空");
					check = false;
					return false;
				}
			});
			//验证手机号
			var retel = /^(((13[0-9]{1})|(14[0-9]{1})|(15[0-9]{1})|(17[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
			var mobile = document.getElementById("username").value;
			if(!retel.exec(mobile)){
				mui.alert("手机号码格式不正确");
				check = false;
			}
			//验证密码
			var password = document.getElementById("password").value;
			var password1 = document.getElementById("password1").value;
			if(password != password1){
				mui.alert("两次输入密码不相符");
				check = false;
			}
			//校验通过，继续执行业务逻辑 
			if(check){
				//设置loading
				mui("#reg").button('loading');
				
				//ajax交互，进行注册//
				mui.post('<?php echo url('Login/reg'); ?>',{
						phone: document.getElementById("username").value,
						password: document.getElementById("password").value,
						yzm: document.getElementById("yzm").value
					},function(data){
						mui("#reg").button('reset');
						
						if(data == null) {
                            mui.toast('服务端错误');
                            return;
                        }
                        if(data.status != 1) {
                            mui.toast(data.message);
                            return;
                        }

                        mui.toast('注册成功');
                        location.href='<?php echo Url('Login/index'); ?>'
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