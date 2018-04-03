<?php
namespace app\admin\controller;
use think\request;

class Works extends App 
{
    public function index()
    {
		if(request()->isPost())
		{
			$list=db('works')->where('user_name|title','like','%'+input('post.title')+'%')->
            order('id desc')->paginate(16);
			$this->assign('wlist',$list);

		}
		else
		{
			$list=db('works')->order('id desc')->paginate(16);
			$this->assign('wlist',$list);
		}

        return view();
    }

	//删除
	public function deletes()
	{
		$aid=input('post.');
		$e=db('works')->where('id',$aid['aid'])->delete();
		if($e>0)
		{
			return ['msg'=>"删除成功"];
		}
		else
		{
			return ['msg'=>"操作失败"];
		}
	}

	public function update()
	{
		if(request()->isPost())
		{
			$obj=db('works')->where('id',input('wid'))->update(['status'=>input('post.stch'),'up_time'=>time()]);
			if($e>0)
			{
				$this->success('修改成功','player/index');
			}else{
				$this->error('修改失败');
			}
			
		}
		else
		{
			$obj=db('works')->where('wid',input('id'))->find();
			$this->assign('w',$obj);
			$obj=db('player')->where('id',input('id'))->find();
			$this->assign('pobj',$obj);
			
		}

		return view();
	}

	//投票
	public function vote()
	{
		if(input("times")!=null)
		{
			$list=db('vote')->where('wid',input('aid'))->where("FROM_UNIXTIME(add_time, '%Y-%m-%d')=".input('times'))->order('id desc')->paginate(16,false,['query'=>array('times'=>input("times"))]);

			$this->assign('alist',$list);
			$this->assign('aid',input('aid'));
		}else{
			$list=db('vote')->where('wid',input('id'))->order('id desc')->paginate(16);
			$this->assign('alist',$list);
			$this->assign('aid',input('id'));
		}
		return view();
	}
	//修改投票状态
	public function v_update()
	{
		$e=db('vote')->where('id',input('post.aid'))->update(['status'=>input('post.stt'),'up_time'=>time()]);
		if($e>0){
			return ['msg'=>"状态修改成功",'codo'=>1];
		}else{
			return ['msg'=>"状态修改失败",'codo'=>0];
		}
		
	}
	//删除投票
	public function v_delete()
	{
		$aid=input('post.');
		$e=db('vote')->where('id',$aid['aid'])->delete();
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