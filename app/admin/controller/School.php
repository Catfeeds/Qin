<?php
namespace app\admin\controller;
use think\request;

class School extends App 
{
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

		if(input("title")!=null)
		{
			$list=db('school')->where('name','like','%'.input("title").'%')->where($cps)->paginate(16,false,['query'=>array('title'=>input("title"))]);
			$this->assign('alist',$list);
		}
		else
		{
			$list=db('school')->where($cps)->order('id')->paginate(16);
			$this->assign('alist',$list);
		}

        return view();
    }

	//添加
	public function insert()
	{
		if(Request()->isPost())
		{
			$data=input('post.');
			$tt=['name'=>$data['aname'],'keywords'=>$data['keywords'],'description'=>$data['description'],'esc'=>$data['esc'],'add_time'=>time()];

			//版主账户是否正确
			$user=db('user')->where('name',$data['user_zhanghu'])->where('identity',1)->find();
			if($user)
			{
				$tt['adm_id']=$user['id'];
				$tt['adm_name']=$user['name'];
			}else{
				$this->error('未找到该管理者账户');
			}

			 $img = request()->file('img');

			 if($img!=''){
				 $info = $img->rule('date')->move(ROOT_PATH . 'public'.DS.'uploads'.DS.'school');
				 if($info){
						$tt['img']='/public/uploads/school/'.$info->getSavename(); 
				 }else{
						$tt['img']='/public/admin/image/timg.jpg';
				 }
			 }else{
						$tt['img']='/public/admin/image/timg.jpg';
				 }


				$tt['pid']=$data['pid'];
				$tt['pname']=db('reg')->where('id',$data['pid'])->value('name');

				$tt['cid']=$data['cid'];
				$tt['cname']=db('reg')->where('id',$data['cid'])->value('name');

			
			//状态
			if($data['stch']=='1')
			{
				$tt['status']=1;
			}else{
				$tt['status']=0;
			}

			//是否推荐
			if($data['checks']==1){
				foreach($data['check'] as $k=>$v)
				{
					if($v=='1')
					{
						$tt['back_1']=1;
					}
					
				}
			}

			$e=db('school')->insert($tt);
			if($e>0)
			{
				$this->success('添加成功','school/insert');
			}else{
				$this->error('添加失败');
			}


		}

		$plist=db('reg')->where('pid',null)->where('status',1)->order('back_2')->select();
		$this->assign('plist',$plist);
		return view('add');
	}

	//修改
	public function update()
	{
		if(Request()->isPost())
		{
			$data=input('post.');
			$tt=['name'=>$data['aname'],'keywords'=>$data['keywords'],'description'=>$data['description'],'esc'=>$data['esc'],'up_time'=>time()];

			//版主账户是否正确
			$user=db('user')->where('name',$data['user_zhanghu'])->where('identity',1)->find();
			if($user)
			{
				$tt['adm_id']=$user['id'];
				$tt['adm_name']=$user['name'];
			}else{
				$this->error('未找到该管理者账户');
			}

			 $img = request()->file('img');

			 if($img!=''){
				 $info = $img->rule('date')->move(ROOT_PATH . 'public'.DS.'uploads'.DS.'school');
				 if($info){
						$tt['img']='/public/uploads/school/'.$info->getSavename(); 
				 }else{
						$tt['img']='/public/admin/image/timg.jpg';
				 }
			 }


				$tt['pid']=$data['pid'];
				$tt['pname']=db('reg')->where('id',$data['pid'])->value('name');

				$tt['cid']=$data['cid'];
				$tt['cname']=db('reg')->where('id',$data['cid'])->value('name');

			
			//状态
			if($data['stch']=='1')
			{
				$tt['status']=1;
			}else{
				$tt['status']=0;
			}

			//是否推荐
			if($data['checks']==1){
				foreach($data['check'] as $k=>$v)
				{
					if($v=='1')
					{
						$tt['back_1']=1;
					}
				}
			}else{
				$tt['back_1']=0;
			}

			$e=db('school')->where('id',$data['uid'])->update($tt);
			if($e>0)
			{
				$this->success('修改成功','school/index');
			}else{
				$this->error('修改失败');
			}


		}
		$uobj=db('school')->where('id',input('id'))->find();
		$this->assign('uobj',$uobj);
		$plist=db('reg')->where('pid',null)->where('status',1)->order('back_2')->select();
		$this->assign('plist',$plist);
		if($uobj['pid']!=0)
		{
			$clist=db('reg')->where('pid',$uobj['pid'])->where('status',1)->order('back_2')->select();
			$this->assign('clist',$clist);
		}
		
		return view();
	}

	//查询区级信息
	public function getregc()
	{
		$list=db('reg')->where('pid',input('post.pid'))->where('status',1)->order('back_2')->select();
		return ['ls'=>$list];

	}

	//删除
	public function deletes()
	{
		$aid=input('post.');
		$e=db('school')->where('id',$aid['aid'])->delete();
		if($e>0)
		{
			return ['msg'=>"删除成功"];
		}
		else
		{
			return ['msg'=>"操作失败"];
		}
	}

	//是否重复
	public function cf()
	{
		$data=input('post.');
		$e=db('school')->where('name',$data['aname'])->where('id','neq',$data['aid'])->find();
		if($e!=null)
		{
			return ["e"=>1];
		}else{
			return ["e"=>-1];
		}
	}

	//动态列表
	public function art_list()
    {
		if(input('times')!=null)
		{
			$list=db('articles')->where('school_id',input('aid'))->where("FROM_UNIXTIME(add_time, '%Y-%m-%d')=".input('times'))->order('id desc')->paginate(16,false,['query'=>array('times'=>input("times"),'aid'=>input("aid"))]);

			$this->assign('alist',$list);
			$this->assign('aid',input('aid'));
		}else{
		
			$list=db('articles')->where('school_id',input('id'))->order('id desc')->paginate(16);
			$this->assign('alist',$list);
			$this->assign('aid',input('id'));
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
				$this->success('修改成功','user/art_list');
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
			$list=db('comments')->where('nid',input('aid'))->where("FROM_UNIXTIME(add_time, '%Y-%m-%d')=".input('times'))->order('id desc')->paginate(16,false,['query'=>array('times'=>input("times"),'aid'=>input("aid"))]);
			$this->assign('alist',$list);
			$this->assign('aid',input('aid'));
		}else{
			$list=db('comments')->where('nid',input('id'))->order('id desc')->paginate(16);
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
				$this->success('修改成功','user/p_list');
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
		if(input("times")!=null)
		{
			$list=db('praise')->where('wid',input('aid'))->where("FROM_UNIXTIME(add_time, '%Y-%m-%d')=".input('times'))->order('id desc')->paginate(16,false,['query'=>array('times'=>input("times"),'aid'=>input("aid"))]);
			$this->assign('alist',$list);
			$this->assign('aid',input('aid'));
		}else{
			$list=db('praise')->where('wid',input('id'))->order('id desc')->paginate(16);
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

	//查询二级用户
	public function school_u_list()
	{
		$list=db('school_user')->where("sid=".input('sid'))->order('add_time')->paginate(16);
		$this->assign('alist',$list);

        return view();
	}


	//移除学校二级管理用户
	public function user_del()
	{
		$e=db('school_user')->where('id',input('post.aid'))->delete();
		if($e>0)
		{
			return ['msg'=>"移除成功"];
		}
		else
		{
			return ['msg'=>"操作失败"];
		}
	}





}