<?php
namespace app\admin\controller;

class Message extends App 
{
    public function index()
    {
		if(input('times')!='')
		{
			$list=db('message')->where('title','like','%'.input('title').'%')->whereOr("FROM_UNIXTIME(add_time, '%Y-%m-%d')=".input('times'))->order('id desc')->paginate(16,false,['query'=>array('title'=>input("title"),'times'=>input("times"))]);
			$this->assign('alist',$list);
		}
		else if(input('times'))
		{
			$list=db('message')->where('title','like','%'.input('title').'%')->order('id desc')->paginate(16,false,['query'=>array('title'=>input("title"),'times'=>input("times"))]);
			$this->assign('alist',$list);
		}else{
			$list=db('message')->order('id desc')->paginate(16);
			$this->assign('alist',$list);
		}
        return view();
    }

	//删除
	public function deletes()
	{
		$aid=input('post.');
		$e=db('message')->where('id',$aid['aid'])->delete();
		if($e>0)
		{
			return ['msg'=>"删除成功"];
		}
		else
		{
			return ['msg'=>"操作失败"];
		}
	}

	public function insert()
	{
		if(request()->isPost())
		{
			$e=0;
			$data=input('post.');
			$tt=['title'=>$data['title'],'content'=>$data['content'],'add_time'=>time(),'add_id'=>input('session.admin_auth.id'),'add_name'=>input('session.admin_auth.name')];
			if($data['tp']=='1')
			{
				$list=null;
				if($data['pid']!=0)
				{	
					$list=db('user')->where('pid',$data['pid'])->where('status',1)->select();
				}else if($data['cid']!=0)
				{
					$list=db('user')->where('cid',$data['cid'])->where('status',1)->select();
				}else if($data['sid']!=0)
				{
					$list=db('user')->where('sid',$data['sid'])->where('status',1)->select();
				}else
				{
					$list=db('user')->where('status',1)->select();
				}
				foreach($list as $k=>$v)
				{
					$tt['user_id']=$v['id'];
					$tt['user_name']=$v['name'];
					$e.=db('message')->insert($tt);
				}
			}
			else
			{
				$tt['user_id']=$data['uid'];
				$tt['user_name']=$data['aname'];
				$e.=db('message')->insert($tt);
			}

			if($e>0){
				$this->success('发布成功','user/index');
			}else{
				$this->error('发布失败');
			}

		}

		$plist=db('reg')->where('pid',null)->where('status',1)->order('back_2')->select();
		$this->assign('plist',$plist);
		return view('add');
	}
}