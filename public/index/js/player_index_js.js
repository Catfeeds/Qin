function getfile(){
	return  $("input[name='img']").click();
}

function getfile_2(){
	return  $("input[name='idcard_img']").click();
	
}

layui.use('form', function(){
  var form = layui.form();

  form.on('radio(adi)', function(data){
	if(data.value=='0')
	{
		$("#sid").css('display','none');
		$("#school_id").css('display','none');

		$("#ssid").css('display','block');
		$("#xx_id").css('display','none');

		$("#tp_name").html('所属地区');
		$("input[name='unit']").prop('placeholder','请输入所属的工作单位名称');
	}
	else
	{
		$("#sid").css('display','block');

		$("#ssid").css('display','none');
		$("#xx_id").css('display','block');

		$("#tp_name").html('所属学校');
		$("input[name='unit']").prop('placeholder','请输入所属学校的院,系,级信息');
	}
  });  

  //监听开关
  form.on('switch(stch)', function(data){
	
	if(data.elem.checked)
	{
		$("#stch").prop('value','1');
	}else{
		$("#stch").prop('value','0');
	}

  }); 
  
  //监听下拉
  form.on('select(pir)', function(data){
		/*$.ajax({
			url:"/index/player/getregc.html",
			type:"post",
			dataType:"json",
			data:{pid:$(data.elem).val()},
			error:function(){
				layer.msg('数据传输错误');
			},
			success:function(dd){
				$("#cid").children('select').empty();
				var aa="<option value='' selected>请选择</option>";
				$.each(dd.ls,function (key,value) {
				   aa+="<option value='"+value.id+"'>"+value.name+"</option>";
				});
				$("#cid").children('select').append(aa);
				form.render('select');

			}
		});*/

		if($("input[name='tp']:checked").val()=='1')
		{
			$.ajax({
				url:"/index/player/getshool_p.html",
				type:"post",
				dataType:"json",
				data:{pid:$(data.elem).val()},
				error:function(){
					layer.msg('数据传输错误');
				},
				success:function(dd){
					$("#sid").children('select').empty();
					var aa="<option value='' selected>请选择</option>";
					$.each(dd.ls,function (key,value) {
					   aa+="<option value='"+value.id+"'>"+value.name+"</option>"; 
					});
					aa+="<option value='0'>其他</option>";
					$("#sid").children('select').append(aa);
					form.render('select');
				}
			});

		}else{
			$.ajax({
				url:"/index/player/getss_p.html",
				type:"post",
				dataType:"json",
				data:{pid:$(data.elem).val()},
				error:function(){
					layer.msg('数据传输错误');
				},
				success:function(dd){
					$("#ssid").children('select').empty();
					var aa="<option value='' selected>请选择</option>";
					$.each(dd.ls,function (key,value) {
					   aa+="<option value='"+value.id+"'>"+value.name+"</option>"; 
					});
					aa+="<option value='0'>其他</option>";
					$("#ssid").children('select').append(aa);
					form.render('select');
				}
			});
		
		}

	}); 
	
	form.on('select(cit)', function(data){

		if($("input[name='tp']:checked").val()=='1')
		{
			$.ajax({
				url:"/index/player/getshool.html",
				type:"post",
				dataType:"json",
				data:{cid:$(data.elem).val()},
				error:function(){
					layer.msg('数据传输错误');
				},
				success:function(dd){
					$("#sid").children('select').empty();
					var aa="<option value='' selected>请选择</option>";
					$.each(dd.ls,function (key,value) {
					   aa+="<option value='"+value.id+"'>"+value.name+"</option>"; 
					});
					$("#sid").children('select').append(aa);
					 form.render('select');
				}
			});

		}

	});

	 form.on('select(sih)', function(data){
		if(data.value=='0')
		{
			$("#school_id").css('display','block');
			
		}
		else
		{
			$("#school_id").css('display','none');
			
		}

	  });

	  form.on('select(ssih)', function(data){
		if(data.value=='0')
		{
			$("#xx_id").css('display','block');
			
		}
		else
		{
			$("#xx_id").css('display','none');
			
		}

	  });




	//比赛分类
	form.on('select(tter)', function(data){

		$.ajax({
			url:"/index/player/gettp.html",
			type:"post",
			dataType:"json",
			data:{pid:$(data.elem).val()},
			error:function(){
				layer.msg('数据传输错误');
			},
			success:function(dd){
				if(dd.ls!='')
				{
					$("#type_id").prop('value','2');
					$("#maxid").css('display','block');
					$("#minid").css('display','none');

					$("#maxid").children('select').empty();
					var aa="<option value='' selected>请选择</option>";
					$.each(dd.ls,function (key,value) {
					   aa+="<option value='"+value.id+"'>"+value.name+"</option>";
					});
					$("#maxid").children('select').append(aa);
					form.render('select');
				}else{
					$("#type_id").prop('value','1');
					$("#maxid").css('display','none');
					$("#minid").css('display','none');
				}
			}
		});

	}); 

	form.on('select(maxter)', function(data){
		var tt=$(data.elem).val();
		if(tt=='29')
		{
			$("#dsb").html("注：9月30日截止投稿，请提交电子档作品至官方指定邮箱。&nbsp;&nbsp;<a href='/index/news/news_info/news_id/62.html' target='_blank' style='color: #488ff9;cursor: pointer;font-size: 16px;'>详细说明</a>");
		}else if(tt=='30'){
			$("#dsb").html("注：9月30日截止投稿，请提交纸质档作品至官方指定地址。&nbsp;&nbsp;<a href='/index/news/news_info/news_id/62.html' target='_blank' style='color: #488ff9;cursor: pointer;font-size: 16px;'>详细说明</a>");
		}else if(tt=='40'){
			$("#dsb").html("注：9月30日截止投稿，请提交纸质档和电子档作品各一份至官方指定邮箱与地址。&nbsp;&nbsp;<a href='/index/news/news_info/news_id/62.html' target='_blank' style='color: #488ff9;cursor: pointer;font-size: 16px;'>详细说明</a>");
		}else if(tt=='41'){
			$("#dsb").html("注：9月30日截止投稿，请提交纸质档作品至官方指定地址。&nbsp;&nbsp;<a href='/index/news/news_info/news_id/62.html' target='_blank' style='color: #488ff9;cursor: pointer;font-size: 16px;'>详细说明</a>");
		}else if(tt=='38'){
			$("#dsb").html("注：9月30日截止投稿，请提交纸质档作品至官方指定地址。&nbsp;&nbsp;<a href='/index/news/news_info/news_id/62.html' target='_blank' style='color: #488ff9;cursor: pointer;font-size: 16px;'>详细说明</a>");
		}else if(tt=='39'){
			$("#dsb").html("注：9月30日截止投稿，请提交纸质档作品至官方指定地址。&nbsp;&nbsp;<a href='/index/news/news_info/news_id/62.html' target='_blank' style='color: #488ff9;cursor: pointer;font-size: 16px;'>详细说明</a>");
		}
		$.ajax({
			url:"/index/player/gettp.html",
			type:"post",
			dataType:"json",
			data:{pid:$(data.elem).val()},
			error:function(){
				layer.msg('数据传输错误');
			},
			success:function(dd){
				if(dd.ls!='')
				{
					$("#type_id").prop('value','3');
					$("#minid").css('display','block');

					$("#minid").children('select').empty();
					var aa="<option value='' selected>请选择</option>";
					$.each(dd.ls,function (key,value) {
					   aa+="<option value='"+value.id+"'>"+value.name+"</option>";
					});
					$("#minid").children('select').append(aa);
					form.render('select');
				}else{
					$("#type_id").prop('value','2');
					$("#minid").css('display','none');
				}
			}
		});

	});

  //监听提交
  form.on('submit(formDemo)', function(data){
		

	  if(data.field['tp']=="1"&&data.field['sid']=='')
	  {
		 
			layer.msg("请选择学校");
			return false;
		
	  }

	  if(data.field['tpid']==3)
	  {
			if(data.field['type']==''||data.field['maxid']==''||data.field['minid']=='')
			  {
				 
					layer.msg("请确定比赛分类");
					return false;
				
			  }
	  }
	  else if(data.field['tpid']==2)
	  {
			if(data.field['type']==''||data.field['maxid']=='')
			  {
				 
					layer.msg("请确定比赛分类");
					return false;
				
			  }
	  }

	   if(isNaN(data.field['user_age'])){
		  layer.msg("年龄只能输入数字");
		  return false;
      }

	  if(isNaN(data.field['postcode'])){
		  layer.msg("邮政编码错误");
		  return false;
      }

	  var r=/^1[0-9]\d{9}$/;
	  
	  if(!r.test(data.field['tel'])){
		  layer.msg("手机号码错误");
		  return false;
      }


	$.ajax({
			url:"/index/player/get_img.html",
			type:"post",
			dataType:"json",
			data:{"is_ajax": 1},
			error:function(){
				layer.msg('数据传输错误');
			},
			success:function(dd){

					param=dd.sjs;

					//页面层
					layer.open({
						  type: 1,
						  title: "微信扫码，提交报名信息！",
						  area: ['430px', '430px'],
						  shade: 0.8,
						  closeBtn: 0,
						  shadeClose: true,
						  content: "<img style='width:100%;height:100%;' src='"+dd.imgurl+"'/>"
					});
					
					t1 = window.setInterval("subtm_val()",5000);
					
			}
		});
  });
});
//随机码
var param;
var t1;

//循环查询
function subtm_val()
{
	$.ajax({
			url:"/index/player/wx_val.html",
			type:"post",
			dataType:"json",
			data:{"is_sjs": param},
			error:function(){
				layer.msg('数据传输错误');
			},
			success:function(dd){
				if(dd.code==1){
					//去掉定时器的方法
					window.clearInterval(t1);
					$("#fid").submit();
				};
			}
		});
	
}