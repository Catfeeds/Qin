<?php
namespace app\admin\controller;
use think\Request;

class Article extends App 
{
	//动态列表
	public function index()
    {
		if(input("times")!=null)
		{
			//select * from reg where FROM_UNIXTIME(add_time, '%Y-%m-%d')='2017-03-26'
			$list=db('article')->where("FROM_UNIXTIME(add_time, '%Y-%m-%d')=".input('times')) ->order('id desc')->paginate(16,false,['query'=>array('times'=>input("times"))]);
			$this->assign('alist',$list);
		}else{
		
			$list=db('article')->order('id desc')->paginate(16);
			$this->assign('alist',$list);
		}
        return view();
    }

	//修改动态状态
	public function art_update()
	{
		$e=db('article')->where('id',input('post.aid'))->update(['status'=>input('post.stt'),'up_time'=>time()]);
		if($e>0){
			return ['msg'=>"状态修改成功",'codo'=>1];
		}else{
			return ['msg'=>"状态修改失败",'codo'=>0];
		}
		
	}
	//删除动态
	public function art_delete()
	{
		$aid=input('post.');
		$e=db('article')->where('id',$aid['aid'])->delete();
		if($e>0)
		{
			return ['msg'=>"删除成功"];
		}
		else
		{
			return ['msg'=>"操作失败"];
		}
	}

	//详细
	public function art_xx()
	{
		if(request()->isPost()){
			$e=db('article')->where('id',input('post.aid'))->update(['status'=>input('post.stch'),'up_time'=>time()]);
			if($e>0)
			{
				$this->success('修改成功','article/art_list');
			}else{
				$this->error('修改失败');
			}
		}
		$obj=db('article')->where('id',input('id'))->find();
		$this->assign('art',$obj);
		return view();
	}
	//评论
	public function p_list()
	{
		if(input("times")!=null){
			$list=db('comments')->where('nid',input('aid'))->where("FROM_UNIXTIME(add_time, '%Y-%m-%d')=".input('times'))->order('id desc')->paginate(16,false,['query'=>array('times'=>input("times"),'aid'=>input('aid'))]);
			$this->assign('alist',$list);
			$this->assign('aid',input('aid'));
		}else{
			$list=db('comments')->where('nid',input('id'))->paginate(16);
			$this->assign('alist',$list);
			$this->assign('aid',input('id'));
		}
		return view();
	}
	//修改评论状态
	public function p_update()
	{
		$e=db('comments')->where('id',input('post.aid'))->update(['status'=>input('post.stt'),'up_time'=>time()]);
		if($e>0){
			return ['msg'=>"状态修改成功",'codo'=>1];
		}else{
			return ['msg'=>"状态修改失败",'codo'=>0];
		}
		
	}
	//删除评论
	public function p_delete()
	{
		$aid=input('post.');
		$e=db('comments')->where('id',$aid['aid'])->delete();
		if($e>0)
		{
			return ['msg'=>"删除成功"];
		}
		else
		{
			return ['msg'=>"操作失败"];
		}
	}

	public function p_xx()
	{
		if(request()->isPost()){
			$e=db('comments')->where('id',input('post.aid'))->update(['status'=>input('post.stch'),'up_time'=>time()]);
			if($e>0)
			{
				$this->success('修改成功','article/p_list');
			}else{
				$this->error('修改失败');
			}
		}
		$obj=db('comments')->where('id',input('id'))->find();
		$this->assign('p',$obj);
		return view();
	}
	//浏览
	public function z_list()
	{
		if(input('times')!=null)
		{
			$list=db('praise')->where('wid',input('aid'))->where("FROM_UNIXTIME(add_time, '%Y-%m-%d')=".input('times'))->order('id desc')->paginate(16,false,['query'=>array('times'=>input("times"),'aid'=>input('aid'))]);
			$this->assign('alist',$list);
			$this->assign('aid',input('aid'));
		}else{
			$list=db('praise')->where('wid',input('id'))->paginate(16);
			$this->assign('alist',$list);
			$this->assign('aid',input('id'));
		}
		return view();
	}
	//修改浏览状态
	public function z_update()
	{
		$e=db('praise')->where('id',input('post.aid'))->update(['status'=>input('post.stt'),'up_time'=>time()]);
		if($e>0){
			return ['msg'=>"状态修改成功",'codo'=>1];
		}else{
			return ['msg'=>"状态修改失败",'codo'=>0];
		}
		
	}
	//删除浏览
	public function z_delete()
	{
		$aid=input('post.');
		$e=db('praise')->where('id',$aid['aid'])->delete();
		if($e>0)
		{
			return ['msg'=>"删除成功"];
		}
		else
		{
			return ['msg'=>"操作失败"];
		}
	}
}