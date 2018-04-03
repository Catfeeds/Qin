
//回复评论
function hf(id,uid,uname)
{
	$('#type').prop('value',6);
	$('#art_title').prop('value','评论');
	$('#pid').prop('value',id);
	$('#puid').prop('value',uid);
	$('#content').html('回复：@'+uname+':').focus();
}

//删除评论
function del(id)
{
	layer.confirm('删除之后不可恢复，是否确定删除？', {
	  btn: ['继续', '取消'],
	  icon: 2,
	  btn1:function(index, layero){
			$.ajax({
				url:"/index/user/comments_del.html",
				type:"post",
				dataType:"json",
				data:{'aid':id},
				success:function(dd){
					layer.msg(dd.msg, function(){
							parent.location.reload();
					});
				}
			})
	 }
	});
}

//删除动态
function art_del(id)
{
	layer.confirm('删除之后不可恢复，是否确定删除？', {
	  btn: ['继续', '取消'],
	  icon: 2,
	  btn1:function(index, layero){
			$.ajax({
				url:"/index/user/article_del.html",
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

//举报
function art_rep(id)
{
	var ii=0;
	layer.confirm('是否举报该条动态？', {
	  btn: ['是', '否'],
	  icon: 2,
	  btn1:function(index, layero){
		    layer.closeAll('dialog');

		    layer.open({
			  type: 2,
			  title: "举报动态",
			  area: ['800px', '480px'],
			  content: '/index/user/art_rep.html?gb_id='+id
			});	
	 }
	});
}

//举报
function com_rep(id)
{
	var ii=0;
	layer.confirm('是否举报该条评论？', {
	  btn: ['是', '否'],
	  icon: 2,
	  btn1:function(index, layero){
		    layer.closeAll('dialog');
		    layer.open({
			  type: 2,
			  title: "举报评论",
			  area: ['800px', '480px'],
			  content: '/index/user/com_rep.html?gb_id='+id
			});	
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


