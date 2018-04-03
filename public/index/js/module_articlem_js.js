
//删除帖子
function del(id)
{
	layer.confirm('删除之后不可恢复，是否确定删除？', {
	  btn: ['继续', '取消'],
	  icon: 2,
	  btn1:function(index, layero){
			$.ajax({
				url:"/index/module/deletes.html",
				type:"post",
				dataType:"json",
				data:{'art_id':id},
				success:function(dd){
					layer.msg(dd.msg, function(){
						if(dd.id>0)
							window.location.href="{:url('module/module',['module_id'=>$obj.module_id])}";
					});
				}
			})
	 }
	});
}
//收藏
function sc(id)
{
	$.ajax({
		url:"/index/module/collect.html",
		type:"post",
		dataType:"json",
		data:{'art_id':id},
		success:function(dd){
			layer.msg(dd.msg, function(){
				parent.location.reload();
			});
		}
	})
}
//取消收藏
function qx(id)
{
	$.ajax({
		url:"/index/module/collect_del.html",
		type:"post",
		dataType:"json",
		data:{'art_id':id},
		success:function(dd){
			layer.msg(dd.msg, function(){
				parent.location.reload();
			});
		}
	})
}
//点赞评论
function zz(id)
{
	$.ajax({
		url:"/index/module/user_art_praise.html",
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

//删除评论
function com_del(id)
{
	layer.confirm('删除之后不可恢复，是否确定删除？', {
	  btn: ['继续', '取消'],
	  icon: 2,
	  btn1:function(index, layero){
			$.ajax({
				url:"/index/module/com_delete.html",
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

//置顶off/no
function update_zd(type)
{
	layer.confirm('请确定操作是否继续', {
	  btn: ['继续', '取消'],
	  icon: 2,
	  btn1:function(index, layero){
			$.ajax({
				url:"/index/module/zhiding.html",
				type:"post",
				dataType:"json",
				data:{'aid':articlem_id,'action':type},
				success:function(dd){
					layer.msg(dd.msg, function(){
							parent.location.reload();
					});
				}
			})
	 }
	});
}

//加精off/no
function update_jj(type)
{
	layer.confirm('请确定操作是否继续', {
	  btn: ['继续', '取消'],
	  icon: 2,
	  btn1:function(index, layero){
			$.ajax({
				url:"/index/module/jiajing.html",
				type:"post",
				dataType:"json",
				data:{'aid':articlem_id,'action':type},
				success:function(dd){
					layer.msg(dd.msg, function(){
							parent.location.reload();
					});
				}
			})
	 }
	});
}

//删除
function delete_cc(type)
{
	layer.confirm('删除之后不可恢复，是否确定删除？', {
	  btn: ['继续', '取消'],
	  icon: 2,
	  btn1:function(index, layero){
			$.ajax({
				url:"/index/module/shanchu.html",
				type:"post",
				dataType:"json",
				data:{'aid':articlem_id},
				success:function(dd){
					layer.msg(dd.msg, function(){
							window.location.go(-1);
					});
				}
			})
	 }
	});
}

//回复评论
function hf(id,uid,uname)
{
	$('#type').prop('value',6);
	$('#pid').prop('value',id);
	$('#puid').prop('value',uid);
	$('#content').prop('value','回复：@'+uname+':').focus();
}

