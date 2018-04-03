<?php
namespace app\admin\controller;
use think\Request;

class Articles extends App 
{
	//动态列表
	public function index()
    {
		$cps=array();
		if(input('session.admin_auth.sid')!='0')
		{
			$cps['sid']=input('session.admin_auth.sid');
		}else if(input('session.admin_auth.cid')!='0'){
			$cps['cid']=input('session.admin_auth.cid');
		}else if(input('session.admin_auth.pid')!='0'){
			$cps['pid']=input('session.admin_auth.pid');
		}

		if(input('title')!=null)
		{
			$list=db('articles')->where($cps)->where("title like '%".input('title')."%'")->order('id desc')->paginate(16,false,['query'=>array('title'=>input("title"))]);
			$this->assign('alist',$list);
		}else{
		
			$list=db('articles')->where($cps)->order('id desc')->paginate(16);
			$this->assign('alist',$list);
		}
        return view();
    }

	//修改动态状态
	public function art_update()
	{
		$e=db('articles')->where('id',input('post.aid'))->update(['status'=>input('post.stt'),'up_time'=>time()]);
		if($e>0){
			return ['msg'=>"状态修改成功",'codo'=>1];
		}else{
			return ['msg'=>"状态修改失败",'codo'=>0];
		}
	}

	//修改动态信息
	public function add()
	{
		if(request()->isPost())
		{
			$data=input('post.');
			$tt=['title'=>$data['aname'],'school_id'=>input('session.admin_auth.pid'),'school_name'=>$data['sname'],'esc'=>$data['esc'],'edit'=>$data['edit'],'content'=>$data['content'],'add_time'=>strtotime($data['date'])];

			$img = request()->file('img');
			 if($img!=''){
				 $info = $img->rule('date')->move(ROOT_PATH . 'public'.DS.'uploads'.DS.'articles');
				 if($info){
						$tt['img']='/public/uploads/articles/'.$info->getSavename(); 
				 }else{
						$tt['img']='/public/admin/image/timg.jpg';
				 }
			 }

			 $e=db('articles')->insert($tt);
			 if($e>0)
				{
					$this->success('发布成功','articles/add');
				}else{
					$this->error('发布失败');
				}
		}

		$school=db('school')->where('id',input('session.admin_auth.pid'))->value('name');
		if($school)
		{
			$this->assign('school_name',$school);
		}else{
			//$this->error('权限错误,未找到所在学校信息');
			$this->assign('school_name',0);
		}

		$dt=time();
		$this->assign('dt',$dt);

		return view();
	}

	//修改动态信息
	public function update()
	{
		if(request()->isPost())
		{
			$data=input('post.');
			$tt=['title'=>$data['aname'],'school_id'=>input('session.admin_auth.pid'),'school_name'=>$data['sname'],'esc'=>$data['esc'],'edit'=>$data['edit'],'content'=>$data['content'],'add_time'=>time()];

			$img = request()->file('img');
			 if($img!=''){
				 $info = $img->rule('date')->move(ROOT_PATH . 'public'.DS.'uploads'.DS.'articles');
				 if($info){
						$tt['img']='/public/uploads/articles/'.$info->getSavename(); 
				 }else{
						$tt['img']='/public/admin/image/timg.jpg';
				 }
			 }

			 $e=db('articles')->insert($tt);
			 if($e>0)
				{
					$this->success('发布成功','articles/add');
				}else{
					$this->error('发布失败');
				}
		}
		
		$obj=db('articles')->where('id',input('id'))->find();
		$this->assign('art',$obj);
		return view();
	}

	//删除动态
	public function art_delete()
	{
		$aid=input('post.');
		$e=db('articles')->where('id',$aid['aid'])->delete();
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
			$e=db('articles')->where('id',input('post.aid'))->update(['status'=>input('post.stch'),'up_time'=>time()]);
			if($e>0)
			{
				$this->success('修改成功','articles/art_list');
			}else{
				$this->error('修改失败');
			}
		}
		$obj=db('articles')->where('id',input('id'))->find();
		$this->assign('art',$obj);
		return view();
	}
	//评论
	public function p_list()
	{
		if(input('times')!=null){
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
				$this->success('修改成功','articles/p_list');
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