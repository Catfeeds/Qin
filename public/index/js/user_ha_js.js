
//删除留言--本人
function del(id)
{
	layer.confirm('删除之后不可恢复，是否确定删除？', {
	  btn: ['继续', '取消'],
	  icon: 2,
	  btn1:function(index, layero){
			$.ajax({
				url:"/index/user/del.html",
				type:"post",
				dataType:"json",
				data:{'com_id':id},
				success:function(dd){
					layer.msg(dd.msg, function(){
						parent.location.reload();
					});
				}
			})
	 }
	});
}

//删除留言----主页用户
function com_del(id)
{
	layer.confirm('删除之后不可恢复，是否确定删除？', {
	  btn: ['继续', '取消'],
	  icon: 2,
	  btn1:function(index, layero){
			$.ajax({
				url:"/index/user/com_del.html",
				type:"post",
				dataType:"json",
				data:{'com_id':id},
				success:function(dd){
					layer.msg(dd.msg, function(){
							parent.location.reload();
					});
				}
			})
	 }
	});
}

//投票
function user_vo(id)
{
	
	$.ajax({
		url:"/index/user/vote.html",
		type:"post",
		dataType:"json",
		data:{'uid':id},
		success:function(dd){
			layer.msg(dd.msg, function(){
					parent.location.reload();
			});
		}
	})
}

//显示影藏
$(".comment_list").hover(function(){   
			$(this).find("#rr").css('visibility','visible');
        },function(){  
			$(this).find("#rr").css('visibility','hidden');  
})

//举报
function rep(id)
{
	var ii=0;
	layer.confirm('是否举报该条留言？', {
	  btn: ['是', '否'],
	  icon: 2,
	  btn1:function(index, layero){
		    layer.closeAll('dialog');
		    layer.open({
			  type: 2,
			  title: "举报留言",
			  area: ['800px', '480px'],
			  content: '/index/user/rep.html?gb_id='+id
			});	
	 }
	});
}


