mui.init();

//性别
var picker_sex = new mui.PopPicker();
	picker_sex.setData([{value:'男',text:'男'},{value:'女',text:'女'}]);
document.getElementById('sex').addEventListener('tap', function(event) {
	picker_sex.show(function (selectItems) {
		document.getElementById('sex').value=selectItems[0].value;
	})
}, false);

//所属群体
var picker_tp = new mui.PopPicker();
	picker_tp.setData([{value:'1',text:'在校'},{value:'2',text:'其他'}]);

document.getElementById('tp_name').addEventListener('tap', function(event) {
	picker_tp.show(function (selectItems) {
		document.getElementById('tp_name').value=selectItems[0].text;
		document.getElementById('tp').value=selectItems[0].value;
		if(selectItems[0].value==2){
			document.getElementById('pname').value="";
			document.getElementById('pid').value=0;
			//document.getElementById('cname').value="";
			//document.getElementById('cid').value=0;
			//document.getElementById('cc').style.display="none";
			document.getElementById('sname').value="";
			document.getElementById('sid').value=0;
			document.getElementById('ss').style.display="none";
		}else{
			document.getElementById('pname').value="";
			document.getElementById('pid').value=0;
			//document.getElementById('cname').value="";
			//document.getElementById('cid').value=0;
			//document.getElementById('cc').style.display="none";
			document.getElementById('sname').value="";
			document.getElementById('sid').value=0;
			document.getElementById('ss').style.display="none";
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
		})
}, false);

function sbt()
{
	
	if(document.getElementById("tp").value==1&&document.getElementById("sid").value==0)
	{
		alert('学校信息不能为空');
		return false;
	}

	document.getElementById("fid").submit();
}

 function Trim(str)
{ 
     return str.replace(/(^\s*)|(\s*$)/g, ""); 
}