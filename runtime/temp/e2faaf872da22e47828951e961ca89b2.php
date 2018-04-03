<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:56:"D:\wwwroot\qnysj1\wwwroot/app/wap/view/player/index.html";i:1506567221;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>湖南省青年文化艺术节</title>
    <link rel="stylesheet" href="__STATIC__/mui/css/mui.css">
	<link rel="stylesheet" href="__STATIC__/mui/picker/css/mui.picker.css">
	<link rel="stylesheet" href="__STATIC__/mui/picker/css/mui.poppicker.css">
	<link rel="stylesheet" href="__STATIC__/mui/picker/css/mui.dtpicker.css">
    <style>
	.mui-input-row {height:auto !important;min-height:40px;}

	body {
		    font-size: 14px;
		}
	input{
			font-size: 14px;
		
		}

	.image-item {
		width: 100%;
		max-height: 155px;
		background-size: 100% 100%;
		display: inline-block;
		position: relative;
		border-radius: 5px;
		margin-right: 10px;
		margin-bottom: 10px;
		border: none;
		vertical-align: top;
	}
	.image-item .image-up {
		height: 150px;
		width: 60%;
		border-radius: 10px;
		line-height: 65px;
		border: 1px solid #ccc;
		color: #ccc;
		display: inline-block;
		text-align: center;
	}
	.image-item .file {
		position: absolute;
		left: 0px;
		top: 0px;
		width: 100%;
		height: 100%;
		opacity: 0;
		cursor: pointer;
		z-index: 0;
	}

	</style>
	
</head>
<body>
	<header class="mui-bar mui-bar-nav">
	    <h1 class="mui-title">选手报名</h1>
	</header>
	<div class="mui-content">
	    <form id='fid' class="mui-input-group" action="<?php echo url('player/index'); ?>" method="post" enctype="multipart/form-data">
			<div class="mui-input-row">
				<label>大赛类别</label>
				<input type="hidden" name="tpid" id="tpid" value="0">
				<input id='type_name' name="type_name" type="text" placeholder="大赛类别" class="mui-input" readonly>
				<input type="hidden" name="type_id" id="type_id" value="0"> 
			</div>
			<div class="mui-input-row" id="mm" style="display:none;">
				<label>参选类别</label>
				<input id='max_name' name="max_name" type="text" placeholder="参选类别" class="mui-input" readonly>
				<input type="hidden" name="maxid" id="maxid" value="0">
			</div>
			<div class="mui-input-row" id="nn" style="display:none;">
				<label>参选类别</label>
				<input id='min_name' name="min_name" type="text" placeholder="参选类别" class="mui-input" readonly>
				<input type="hidden" name="minid" id="minid" value="0">
			</div>
			<div class="mui-input-row">
				<label>照片</label>
				<label style="color:#777;font-size: 17px;width: 60%;">注：一寸彩色正面照片</label>
				<div class="image-item">
					<div id="file" style="margin-left: 30%;">
					<img class="image-up" src="/public/index/user/user_img.png">
					</div>
					<input onchange="handleFiles(this,'file')" class="file" id="img" name="img" accept="image/*" type="file">
				</div>
			</div>
			<div class="mui-input-row">
				<label>姓名</label>
				<input id='user_name' name="user_name" type="text" class="mui-input-clear mui-input" placeholder="姓名">
			</div>
			<div class="mui-input-row">
				<label>性别</label>
				<input id='user_sex' name="user_sex" type="text" placeholder="性别" class="mui-input" readonly>
			</div>
			<div class="mui-input-row">
			    <label>年龄</label>
				<input id='user_age' name="user_age" type="text" class="mui-input-clear mui-input" placeholder="年龄">
			</div>
			<div class="mui-input-row">
			    <label>民族</label>
				<input id='race' name="race" type="text" class="mui-input-clear mui-input" placeholder="民族">
			</div>
			<div class="mui-input-row">
			    <label>出生日期</label>
				<input id='user_birth' name="user_birth" type="text" class=" mui-input" placeholder="出生日期" readonly>
			</div>
			<div class="mui-input-row">
			    <label>所属状态</label>
				<input id='tp_name' name="tp_name" type="text" placeholder="所属状态" class="mui-input" readonly>
				<input type="hidden" name="tp" id="tp" value="1">
			</div>
			<div class="mui-input-row" id="pp">
			    <label>所属市级</label>
				<input id='pname' name="pname" type="text" placeholder="所属市级" class="mui-input" readonly>
				<input type="hidden" name="pid" id="pid" value="0">
			</div>
			<div class="mui-input-row" id="cc" style="display:none;">
			    <label>所属区级</label>
				<input id='cname' name="cname" type="text" placeholder="所属区级" class="mui-input" readonly>
				<input type="hidden" name="cid" id="cid" value="0">
			</div>
			<div class="mui-input-row" id="ss" style="display:none;">
			    <label>所属学校</label>
				<input id='sname' name="sname" type="text" placeholder="所属学校" class="mui-input" readonly>
				<input type="hidden" name="sid" id="sid" value="0">
			</div>
			<div class="mui-input-row" id="sss" style="display:none;">
			    <label>所属单位</label>
				<input id='ssname' name="ssname" type="text" placeholder="所属单位" class="mui-input" readonly>
				<input type="hidden" name="ssid" id="ssid" value="0">
			</div>
			<div class="mui-input-row" id="school_id" style="display:none;">
			    <label>学校名称</label>
				<input id='school_name' name="school_name" type="text" class="mui-input-clear mui-input" placeholder="请输入学校名称">
			</div>
			<div class="mui-input-row" id="xx_id">
			    <label>所属详细</label>
				<input id='unit' name="unit" type="text" class="mui-input-clear mui-input" placeholder="请输入所属学校的院,系,级信息">
			</div>
			<div class="mui-input-row">
			    <label>通讯地址</label>
				<input id='site' name="site" type="text" class="mui-input-clear mui-input" placeholder="请输入学校或者单位地址">
			</div>
			<div class="mui-input-row">
			    <label>手机号码</label>
				<input id='tel' name="tel" type="text" class="mui-input-clear mui-input" placeholder="手机号码">
			</div>
			<div class="mui-input-row">
			    <label>指导老师</label>
				<input id='teacher' name="teacher" type="text" class="mui-input-clear mui-input" placeholder="指导老师">
			</div>
			<div class="mui-input-row">
			    <label>邮政编码</label>
				<input id='postcode' name="postcode" type="text" class="mui-input-clear mui-input" placeholder="邮政编码">
			</div>
			<div class="mui-input-row" id="csry">
			    <label>参赛人员简介</label>
				<textarea id='esc' name="esc" type="text" class="mui-input-clear mui-input" placeholder="参赛人员简介"></textarea>
			</div>
			<div class="mui-input-row">
				<label>身份证正面照</label>
				<label style="color:#777;font-size: 17px;width: 60%;">注：多人请将照片压缩成rar或zip格式上传</label>
				<div class="image-item">
					<div id="file_2" style="margin-left: 30%;">
					<!--<img class="image-up" src="/public/index/user/user_img.png">-->
					<a style="color:#000;font-size: 17px;width: 60%;">请上传参赛选手身份证</a>
					</div>
					<input onchange="handleFiles(this,'file_2')" class="file" id="img" name="idcard_img" accept="image/*" type="file">
				</div>
			</div>
			<div class="mui-input-row" id="zpmc">
			    <label>作品名称</label>
				<input id='wname' name="wname" type="text" class="mui-input-clear mui-input" placeholder="作品名称">
			</div>
			<div class="mui-input-row" id="zpjj">
			    <label>作品简介</label>
				<textarea id='intro' name="intro" type="text" class="mui-input-clear mui-input" placeholder="作品简介"></textarea>
			</div>
			<div class="mui-input-row">
			    <label>推荐单位</label>
				<input id='rec' name="rec" type="text" class="mui-input-clear mui-input" placeholder="推荐单位">
			</div>
			<div class="mui-input-row">
			    <label>推荐人及电话</label>
				<input id='rectel' name="rectel" type="text" class="mui-input-clear mui-input" placeholder="推荐人及电话">
			</div>
			<div class="mui-input-row">
				<label>是否公开</label>
				<input id='so_open' name="so_open" type="text" value="是" placeholder="是否公开" class="mui-input" readonly>
			</div>
			<div class="mui-button-row">
				<button type="button" class="mui-btn mui-btn-primary" onclick="sbt();" >提交</button>
				<a class="mui-btn mui-btn-danger" href="javascript:window.history.go(-1);" >取消</a>
			</div>
			
		</form>
	
		<div class="mui-content-padded oauth-area">

		</div>
	</div>
    <script src="__STATIC__/mui/js/mui.js"></script>
	<script src="__STATIC__/mui/picker/js/mui.picker.js"></script>
	<script src="__STATIC__/mui/picker/js/mui.poppicker.js"></script>
	<script src="__STATIC__/mui/picker/js/mui.dtpicker.js"></script>

	<script src="__STATIC__/../wap/js/jquery-1.8.3.min.js"></script>

	<script src="__STATIC__/../wap/js/player_index_js.js?ver=<?php echo date('ymd'); ?>"></script>
    <script type="text/javascript" charset="utf-8">
		
		var picker = new mui.PopPicker();
		var picker2 = new mui.PopPicker();
		var picker3 = new mui.PopPicker();
		picker.setData(<?php echo $tlist; ?>);
		var pickerp = new mui.PopPicker();
		var pickerc = new mui.PopPicker();
		var pickers = new mui.PopPicker();
		var pickerss = new mui.PopPicker();
		pickerp.setData(<?php echo $plist; ?>);

	window.URL = window.URL || window.webkitURL;
	function handleFiles(obj,file_) {
		fileList = document.getElementById(file_);
			var files = obj.files;

			if(file_=="file_2")
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
				img.className = "image-up";
				img.onload = function(e) {
					window.URL.revokeObjectURL(this.src); //图片加载后，释放object URL
				}
				if(fileList.firstElementChild){
					 //fileList.removeChild(fileList.firstElementChild);
					 fileList.innerHTML="";
				} 
				fileList.appendChild(img);
			}else if(window.FileReader){
				//opera不支持createObjectURL/revokeObjectURL方法。我们用FileReader对象来处理
				var reader = new FileReader();
				reader.readAsDataURL(files[0]);
				reader.onload = function(e){	
						img.src = this.result;
						img.className = "image-up";
						//fileList.removeChild(fileList.firstElementChild);
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
				img.className = "image-up";
				//fileList.removeChild(fileList.firstElementChild);
				fileList.innerHTML="";
				fileList.appendChild(img);
				
			}
	}



    </script>
</body>
</html>