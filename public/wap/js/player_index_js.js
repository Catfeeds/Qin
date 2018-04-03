mui.init();

document.getElementById('type_name').addEventListener('tap', function(event) {
	picker.show(function (selectItems) {
		document.getElementById('type_name').value=selectItems[0].text;
		document.getElementById('type_id').value=selectItems[0].value;
		var tid=selectItems[0].value;
		
		document.getElementById('csry').style.display="block";
		document.getElementById('zpmc').style.display="block";
		document.getElementById('zpjj').style.display="block";
		document.getElementById('intro').value="";
		document.getElementById('esc').value="";

		if(tid=='1')
		{
			$('#esc').attr('placeholder','参赛人数及姓名');
			$('#wname').attr('placeholder','节目名称');
			$('#intro').attr('placeholder','节目简介');
			$('#csry').children().eq(0).html("参赛人数及姓名");
			$('#zpmc').children().eq(0).html("节目名称");
			$('#zpjj').children().eq(0).html("节目简介");
			
		}
		else if(tid=='22')
		{
			$('#esc').attr('placeholder','选手简介');
			$('#wname').attr('placeholder','作品名称');
			document.getElementById('intro').value="无";
			document.getElementById('zpjj').style.display="none";
			$('#csry').children().eq(0).html("选手简介");
			$('#zpmc').children().eq(0).html("作品名称");
			$('#zpjj').children().eq(0).html("作品简介");
			
		}
		else if(tid=='27')
		{
			$('#esc').attr('placeholder','主创人员简介');
			$('#wname').attr('placeholder','电影名');
			$('#intro').attr('placeholder','剧本简介');
			$('#csry').children().eq(0).html("主创人员简介");
			$('#zpmc').children().eq(0).html("电影名");
			$('#zpjj').children().eq(0).html("剧本简介");
			
		}
		else if(tid=='28')
		{
			document.getElementById('csry').style.display="none";
			document.getElementById('esc').value="无";
			$('#wname').attr('placeholder','动漫创意作品名称');
			$('#intro').attr('placeholder','作品简介');
			$('#csry').children().eq(0).html("主创人员简介");
			$('#zpmc').children().eq(0).html("动漫创意作品名称");
			$('#zpjj').children().eq(0).html("作品简介");
			
			
		}
		else if(tid=='31')
		{
			$('#esc').attr('placeholder','选手简介');
			$('#wname').attr('placeholder','作品名称');
			$('#intro').attr('placeholder','作品简介及创作思路');
			$('#csry').children().eq(0).html("选手简介");
			$('#zpmc').children().eq(0).html("作品名称");
			$('#zpjj').children().eq(0).html("作品简介及创作思路");
			
			
		}

		//查询二级分类
		mui.ajax('/wap/player/gettp.html',{
				data:{
					pid:selectItems[0].value
				},
				dataType:'json',//服务器返回json格式数据
				type:'post',//HTTP请求类型
				timeout:10000,//超时时间设置为10秒；
				headers:{'Content-Type':'application/json'},	              
				success:function(data){
					if(data.ls!=""){
						picker2.setData(data.ls);
						document.getElementById('tpid').value=2;
						document.getElementById('mm').style.display="block";
					}else{
						document.getElementById('mm').style.display="none";
						document.getElementById('max_name').value="";
						document.getElementById('maxid').value=0;
						document.getElementById('nn').style.display="none";
						document.getElementById('min_name').value="";
						document.getElementById('minid').value=0;
					}
				},
				error:function(xhr,type,errorThrown){
					//异常处理；
					console.log(type);
				}
			});
	})
}, false);

//比赛分类二级
document.getElementById('max_name').addEventListener('tap', function(event) {
	picker2.show(function (selectItems) {
		document.getElementById('max_name').value=selectItems[0].text;
		document.getElementById('maxid').value=selectItems[0].value;
		//查询二级分类
		mui.ajax('/wap/player/gettp.html',{
				data:{
					pid:selectItems[0].value
				},
				dataType:'json',//服务器返回json格式数据
				type:'post',//HTTP请求类型
				timeout:10000,//超时时间设置为10秒；
				headers:{'Content-Type':'application/json'},	              
				success:function(data){
					if(data.ls!=""){
						picker3.setData(data.ls);
						document.getElementById('tpid').value=3;
						document.getElementById('nn').style.display="block";
					}else{
						document.getElementById('nn').style.display="none";
						document.getElementById('min_name').value="";
						document.getElementById('minid').value=0;
					}
				},
				error:function(xhr,type,errorThrown){
					//异常处理；
					console.log(type);
				}
			});
	})
}, false);


//比赛分类三级
document.getElementById('min_name').addEventListener('tap', function(event) {
	picker3.show(function (selectItems) {
		document.getElementById('min_name').value=selectItems[0].text;
		document.getElementById('minid').value=selectItems[0].value;
	})
}, false);


//性别
var picker_sex = new mui.PopPicker();
	picker_sex.setData([{value:'男',text:'男'},{value:'女',text:'女'}]);
document.getElementById('user_sex').addEventListener('tap', function(event) {
	picker_sex.show(function (selectItems) {
		document.getElementById('user_sex').value=selectItems[0].value;
	})
}, false);


//出生日期
var dtPicker = new mui.DtPicker({
	 type:"date",
	 beginDate: new Date(1970, 01, 01)
	 }); 

document.getElementById('user_birth').addEventListener('tap', function(event) {
	dtPicker.show(function (selectItems) { 
		document.getElementById('user_birth').value=selectItems.y.value+"-"+selectItems.m.value+"-"+selectItems.d.value;
	})
}, false);

//所属群体
var picker_tp = new mui.PopPicker();
	picker_tp.setData([{value:'1',text:'在校'},{value:'0',text:'社会'}]);
document.getElementById('tp_name').addEventListener('tap', function(event) {
	picker_tp.show(function (selectItems) {
		document.getElementById('tp_name').value=selectItems[0].text;
		document.getElementById('tp').value=selectItems[0].value;
		if(selectItems[0].value==0){
			document.getElementById('pname').value="";
			document.getElementById('pid').value=0;
			//document.getElementById('cname').value="";
			//document.getElementById('cid').value=0;
			//document.getElementById('cc').style.display="none";
			document.getElementById('sname').value="";
			document.getElementById('sid').value=0;
			document.getElementById('ss').style.display="none";
			$("#school_id").css('display','none');

			//$("#sss").css('display','block');
			$("#xx_id").css('display','none');
			
			$("input[name='unit']").prop('placeholder','请输入所属的工作单位信息');
		}else{
			document.getElementById('pname').value="";
			document.getElementById('pid').value=0;
			//document.getElementById('cname').value="";
			//document.getElementById('cid').value=0;
			//document.getElementById('cc').style.display="none";
			document.getElementById('sname').value="";
			document.getElementById('sid').value=0;
			document.getElementById('ss').style.display="none";

			$("#sss").css('display','none');
			$("#xx_id").css('display','block');

			$("input[name='unit']").prop('placeholder','请输入所属学校的院,系,级信息');
		}
	})
}, false);



document.getElementById('pname').addEventListener('tap', function(event) {
	pickerp.show(function (selectItems) {
		document.getElementById('pname').value=selectItems[0].text;
		document.getElementById('pid').value=selectItems[0].value;
		
		/*//查询分类
		mui.ajax('/wap/player/getregc.html',{
				data:{
					pid:selectItems[0].value
				},
				dataType:'json',//服务器返回json格式数据
				type:'post',//HTTP请求类型
				timeout:10000,//超时时间设置为10秒；
				headers:{'Content-Type':'application/json'},	              
				success:function(data){
					if(data.ls!=""){
						pickerc.setData(data.ls);
						document.getElementById('cname').value="";
						document.getElementById('cid').value=0;
						document.getElementById('cc').style.display="block";
						document.getElementById('sname').value="";
						document.getElementById('sid').value=0;
						document.getElementById('ss').style.display="none";

					}
					else
					{
							alert('没有该市区信息');
							document.getElementById('cname').value="";
							document.getElementById('cid').value=0;
							document.getElementById('cc').style.display="none";
							document.getElementById('sname').value="";
							document.getElementById('sid').value=0;
							document.getElementById('ss').style.display="none";
					}
				},
				error:function(xhr,type,errorThrown){
					//异常处理；
					console.log(type);
				}
			});*/

		//查询学校
		if(document.getElementById('tp').value==1)
		{
			mui.ajax('/wap/player/getshool_p.html',{
					data:{
						pid:selectItems[0].value
					},
					dataType:'json',//服务器返回json格式数据
					type:'post',//HTTP请求类型
					timeout:10000,//超时时间设置为10秒；
					headers:{'Content-Type':'application/json'},	              
					success:function(data){
						if(data.ls!=""){
							//添加其他选项
							data.ls.push({value:'0',text:'其他'});

							pickers.setData(data.ls);
							document.getElementById('ss').style.display="block";
						}
						else
						{
							alert('没有该市学校信息');
							document.getElementById('sname').value="";
							document.getElementById('sid').value=0;
							document.getElementById('ss').style.display="none";
						}
					},
					error:function(xhr,type,errorThrown){
						//异常处理；
						console.log(type);
					}
			});
		}else{
			mui.ajax('/wap/player/getss_p.html',{
					data:{
						pid:selectItems[0].value
					},
					dataType:'json',//服务器返回json格式数据
					type:'post',//HTTP请求类型
					timeout:10000,//超时时间设置为10秒；
					headers:{'Content-Type':'application/json'},	              
					success:function(data){
						if(data.ls!=""){
							//添加其他选项
							data.ls.push({value:'0',text:'其他'});

							pickerss.setData(data.ls);
							document.getElementById('sss').style.display="block";
						}
						else
						{
							alert('没有该市单位信息');
							document.getElementById('ssname').value="";
							document.getElementById('ssid').value=0;
							document.getElementById('sss').style.display="none";
							
						}
					},
					error:function(xhr,type,errorThrown){
						//异常处理；
						console.log(type);
					}
			});
		
		
		}

	})
}, false);

document.getElementById('cname').addEventListener('tap', function(event) {
	pickerc.show(function (selectItems) {
		document.getElementById('cname').value=selectItems[0].text;
		document.getElementById('cid').value=selectItems[0].value;
		
		//查询学校
		if(document.getElementById('tp').value==1)
		{
			mui.ajax('/wap/player/getshool.html',{
					data:{
						cid:selectItems[0].value
					},
					dataType:'json',//服务器返回json格式数据
					type:'post',//HTTP请求类型
					timeout:10000,//超时时间设置为10秒；
					headers:{'Content-Type':'application/json'},	              
					success:function(data){
						if(data.ls!=""){
							//添加其他选项
							data.ls.push({value:'0',text:'其他'});

							pickers.setData(data.ls);
							document.getElementById('ss').style.display="block";
						}
						else
						{
							alert('没有该地区学校信息');
							document.getElementById('sname').value="";
							document.getElementById('sid').value=0;
							document.getElementById('ss').style.display="none";
						}
					},
					error:function(xhr,type,errorThrown){
						//异常处理；
						console.log(type);
					}
			});
		}
	})
}, false);



document.getElementById('sname').addEventListener('tap', function(event) {
	pickers.show(function (selectItems) {
		document.getElementById('sname').value=selectItems[0].text;
		document.getElementById('sid').value=selectItems[0].value;
		if(selectItems[0].value=='0')
		{
			$("#school_id").css('display','block');
		}
		else
		{
			$("#school_id").css('display','none');	
		}
	})
}, false);

document.getElementById('ssname').addEventListener('tap', function(event) {
	pickerss.show(function (selectItems) {
		document.getElementById('ssname').value=selectItems[0].text;
		document.getElementById('ssid').value=selectItems[0].value;
		if(selectItems[0].value=='0')
		{
			$("#xx_id").css('display','block');
		}
		else
		{
			$("#xx_id").css('display','none');	
		}
	})
}, false);

//是否公开
var picker_back_1 = new mui.PopPicker();
	picker_back_1.setData([{value:'是',text:'是'},{value:'否',text:'否'}]);
document.getElementById('so_open').addEventListener('tap', function(event) {
	picker_back_1.show(function (selectItems) {
		document.getElementById('so_open').value=selectItems[0].value;
	})
}, false);

function sbt()
{
	if(document.getElementById("type_id").value==0)
	{
		alert('请确定大赛类别');
		return false;
	}

	if(document.getElementById("tpid").value==3&&document.getElementById("minid").value==0)
	{
		alert('请确定参选类别');
		return false;
	}

	if(document.getElementById("tpid").value==2&&document.getElementById("maxid").value==0)
	{
		alert('请确定参选类别');
		return false;
	}

	if(Trim(document.getElementById("user_name").value)=="")
	{
		alert('名字不能为空');
		return false;
	}

	if(Trim(document.getElementById("user_sex").value)=="")
	{
		alert('性别不能为空');
		return false;
	}
	if(Trim(document.getElementById("user_age").value)=="")
	{
		alert('年龄不能为空');
		return false;
	}
	if(Trim(document.getElementById("user_age").value)=="")
	{
		alert('年龄只需输入数字');
		return false;
	}

	if(Trim(document.getElementById("race").value)=="")
	{
		alert('名族不能为空');
		return false;
	}
	if(Trim(document.getElementById("user_birth").value)=="")
	{
		alert('出生日期不能为空');
		return false;
	}

	if(Trim(document.getElementById("img").value)=="")
	{
		alert('照片不能为空');
		return false;
	}

	if(Trim(document.getElementById("tp_name").value)=="")
	{
		alert('请选择所属群体');
		return false;
	}

	if(document.getElementById("pid").value==0)
	{
		alert('地区信息不能为空');
		return false;
	}

	/*if(document.getElementById("cid").value==0)
	{
		alert('地区信息不能为空');
		return false;
	}*/

	if(document.getElementById("tp").value==1&&document.getElementById("sid").value=="")
	{
		alert('学校信息不能为空');
		return false;
	}

	if(document.getElementById("tp").value==1&&document.getElementById("sid").value==0&&Trim(document.getElementById("school_name").value)=="")
	{
		alert('学校名称不能为空');
		return false;

		if(Trim(document.getElementById("unit").value)=="")
		{
			alert('学校院系不能为空');
			return false;
		}

	}

	if(document.getElementById("tp").value==0&&document.getElementById("ssid").value=="")
	{
		alert('所属单位不能为空');
		return false;
	}

	
	if(document.getElementById("tp").value==0&&document.getElementById("ssid").value==0&&Trim(document.getElementById("unit").value)=="")
	{
		alert('所属单位不能为空');
		return false;
	}

	if(Trim(document.getElementById("site").value)=="")
	{
		alert('通讯地址不能为空');
		return false;
	}
	if(Trim(document.getElementById("tel").value)=="")
	{
		alert('联系电话不能为空');
		return false;
	}
	var reg = /^1[0-9]\d{9}$/;
	if(isNaN(Trim(document.getElementById("tel").value))&&reg.test(Trim(document.getElementById("tel").value)))
	{
		alert('联系电话格式错误');
		return false;
	}

	if(Trim(document.getElementById("teacher").value)=="")
	{
		alert('指导老师不能为空');
		return false;
	}
	if(Trim(document.getElementById("postcode").value)=="")
	{
		alert('邮政编码不能为空');
		return false;
	}

	if(isNaN(Trim(document.getElementById("postcode").value)))
	{
		alert('邮政编码格式错误');
		return false;
	}


	if(Trim(document.getElementById("esc").value)=="")
	{
		alert('参赛人员简介不能为空');
		return false;
	}
	if(Trim(document.getElementById("wname").value)=="")
	{
		alert('作品名称不能为空');
		return false;
	}
	if(Trim(document.getElementById("intro").value)=="")
	{
		alert('作品简介不能为空');
		return false;
	}

	document.getElementById("fid").submit();
}

 function Trim(str)
{ 
     return str.replace(/(^\s*)|(\s*$)/g, ""); 
}