<?php
namespace app\admin\controller;
use think\request;

class Module extends App 
{
    public function index()
    {
		if(input("title")!=null)
		{
			$list=db('module')->where('name','like','%'.input("title").'%')->order('id desc')->paginate(16,false,['query'=>array('title'=>input("title"))]);
			$this->assign('alist',$list);
		}
		else
		{
			$list=db('module')->order('id desc')->paginate(16);
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
			$tt=['name'=>$data['aname'],'adm_real_name'=>$data['user_name'],'esc'=>$data['esc'],'add_time'=>time()];

			//版主账户是否正确
			$user=db('user')->where('name',$data['user_zhanghu'])->find();
			if($user)
			{
				$tt['adm_id']=$user['id'];
				$tt['adm_name']=$user['name'];
			}else{
				$this->error('版主用户错误');
			}

			 $img = request()->file('img');

			 if($img!=''){
				 $info = $img->rule('date')->move(ROOT_PATH . 'public'.DS.'uploads'.DS.'module');
				 if($info){
						$tt['img']='/public/uploads/module/'.$info->getSavename(); 
				 }else{
						$tt['img']='/public/admin/image/timg.jpg';
				 }
			 }else{
						$tt['img']='/public/admin/image/timg.jpg';
			}

			 $img = request()->file('user_img');
			 if($img!=''){
				 $info = $img->rule('date')->move(ROOT_PATH . 'public'.DS.'uploads'.DS.'module');
				 if($info){
						$tt['adm_real_img']='/public/uploads/module/'.$info->getSavename(); 
				 }else{
						$tt['adm_real_img']='/public/index/user/user_img.png';
				 }
			 }else{
						$tt['adm_real_img']='/public/index/user/user_img.png';
			}


				$tt['tid']=$data['tid'];
				$tt['tname']=db('series')->where('id',$data['tid'])->value('name');

				$tt['pid']=$data['pid'];
				$tt['pname']=db('reg')->where('id',$data['pid'])->value('name');
				$tt['cid']=$data['cid'];
				$tt['cname']=db('reg')->where('id',$data['cid'])->value('name');
				if($data['sid']!='')
				{
				$tt['sid']=$data['sid'];
				$tt['sname']=db('school')->where('id',$data['sid'])->value('name');
				}

			
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
					}else if($v=='2'){
						$tt['back_2']=1;
					}
					
				}
			}

			$e=db('module')->insert($tt);
			if($e>0)
			{
				$this->success('添加成功','module/insert');
			}else{
				$this->error('添加失败');
			}


		}

		$plist=db('series')->where('pid',null)->select();
		$this->assign('slist',$plist);

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
			$tt=['name'=>$data['aname'],'adm_real_name'=>$data['user_name'],'esc'=>$data['esc'],'up_time'=>time()];

			//版主账户是否正确
			$user=db('user')->where('name',$data['user_zhanghu'])->find();
			if($user)
			{
				$tt['adm_id']=$user['id'];
				$tt['adm_name']=$user['name'];
			}else{
				$this->error('版主用户错误');
			}

			 $img = request()->file('img');

			 if($img!=''){
				 $info = $img->rule('date')->move(ROOT_PATH . 'public'.DS.'uploads'.DS.'module');
				 if($info){
						$tt['img']='/public/uploads/module/'.$info->getSavename(); 
				 }
			 }

			 $img = request()->file('user_img');
			 if($img!=''){
				 $info = $img->rule('date')->move(ROOT_PATH . 'public'.DS.'uploads'.DS.'module');
				 if($info){
						$tt['adm_real_img']='/public/uploads/module/'.$info->getSavename(); 
				 }
			 }

				$tt['tid']=$data['tid'];
				$tt['tname']=db('series')->where('id',$data['tid'])->value('name');

				$tt['pid']=$data['pid'];
				$tt['pname']=db('reg')->where('id',$data['pid'])->value('name');
				$tt['cid']=$data['cid'];
				$tt['cname']=db('reg')->where('id',$data['cid'])->value('name');
				
				if($data['sid']!='')
				{
				$tt['sid']=$data['sid'];
				$tt['sname']=db('school')->where('id',$data['sid'])->value('name');
				}

			
			$uu=db('module')->where('id',$data['uid'])->value('status');
			//状态
			if($data['stch']=='1')
			{
				
				//发送通知
				if($uu==2)
				{
					$ttm=['title'=>"您申请的社团:".$data['aname']." 已通过审核",'content'=>"您申请的社团:".$data['aname']." 已通过审核！您申请的社团:".$data['aname']." 已通过审核！您申请的社团:".$data['aname']." 已通过审核！",'add_time'=>time(),'add_id'=>0,'add_name'=>'系统通知','user_id'=>$user['id'],'user_name'=>$user['name']];

					db('message')->insert($ttm);
				}else{
					$ttm=['title'=>"您已被管理员设置为:".$data['aname']." 社团版主",'content'=>"您已被管理员设置为:".$data['aname']." 社团版主,可对社团进行维护和管理",'add_time'=>time(),'add_id'=>0,'add_name'=>'系统通知','user_id'=>$user['id'],'user_name'=>$user['name']];

					db('message')->insert($ttm);
				}

				$tt['status']=1;
			}else{
				//发送通知
				if($uu==2)
				{
					$ttm=['title'=>"您申请的社团:".$data['aname']." 未能通过审核",'content'=>"您申请的社团:".$data['aname']." 未能通过审核，请确定提交信息是否完整和真实。",'add_time'=>time(),'add_id'=>0,'add_name'=>'系统通知','user_id'=>$user['id'],'user_name'=>$user['name']];

					db('message')->insert($ttm);
				}else{
					$ttm=['title'=>"您已被管理员取消了:".$data['aname']." 的管理权限",'content'=>"您已被管理员取消了:".$data['aname']." 的管理权限",'add_time'=>time(),'add_id'=>0,'add_name'=>'系统通知','user_id'=>$user['id'],'user_name'=>$user['name']];

					db('message')->insert($ttm);
				}

				$tt['status']=0;
			}

			//是否推荐
			if($data['checks']==1){

				$tt['back_1']=0;
				$tt['back_2']=0;

				foreach($data['check'] as $k=>$v)
				{
					if($v=='1')
					{
						$tt['back_1']=1;
					}else if($v=='2'){
						$tt['back_2']=1;
					}
					
				}
			}else{
				$tt['back_1']=0;
				$tt['back_2']=0;
			}

			$e=db('module')->where('id',$data['uid'])->update($tt);
			if($e>0)
			{
				$this->success('修改成功','module/index');
			}else{
				$this->error('修改失败');
			}


		}
		$uobj=db('module')->where('id',input('id'))->find();
		$this->assign('uobj',$uobj);

		$serlist=db('series')->where('pid',null)->select();
		$this->assign('serlist',$serlist);

		$plist=db('reg')->where('pid',null)->where('status',1)->order('back_2')->select();
		$this->assign('plist',$plist);

		if($uobj['pid']!=0)
		{
			$clist=db('reg')->where('pid',$uobj['pid'])->where('status',1)->order('back_2')->select();
			$this->assign('clist',$clist);
		}
		if($uobj['cid']!=0)
		{
			$slist=db('school')->where('cid',$uobj['cid'])->order('id')->select();
			$this->assign('slist',$slist);
		}
		
		return view();
	}

	//查询区级信息
	public function getregc()
	{
		$list=db('reg')->where('pid',input('post.pid'))->where('status',1)->order('back_2')->select();
		return ['ls'=>$list];

	}
	
	//查询学校信息
	public function getshool()
	{
		$list=db('school')->where('cid',input('post.cid'))->order('id')->select();
		return ['ls'=>$list];

	}


	//删除
	public function deletes()
	{
		$aid=input('post.');
		$e=db('module')->where('id',$aid['aid'])->delete();
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
		$e=db('module')->where('name',$data['aname'])->where('id','neq',$data['aid'])->find();
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
		if(input('times')!='')
		{
			$list=db('articlem')->where('module_id',input('aid'))->where('title','%'.input('title').'%')->where("FROM_UNIXTIME(add_time, '%Y-%m-%d')=".input('times'))->order('id desc')->paginate(16,false,['query'=>array('times'=>input("times"),'title'=>input("title"))]);
			$this->assign('alist',$list);
			$this->assign('aid',input('aid'));
		}
		else if(input('title'))
		{
			$list=db('articlem')->where('module_id',input('aid'))->where('title','%'.input('title').'%')->order('id desc')->paginate(16,false,['query'=>array('title'=>input("title"))]);
			$this->assign('alist',$list);
			$this->assign('aid',input('aid'));
		}else{
		
			$list=db('articlem')->where('module_id',input('id'))->order('id desc')->paginate(16);
			$this->assign('alist',$list);
			$this->assign('aid',input('id'));
		}

        return view();
    }

	//修改动态状态-----不作用
	public function art_update()
	{

		$data=input('post.');
		$tt=['status'=>input('post.stt'),'up_time'=>time()];

		//是否推荐
		if($data['checks']==1){

			$tt['back_1']=0;
			$tt['back_2']=0;
			$tt['back_3']=0;
			$tt['back_4']=0;

			foreach($data['check'] as $k=>$v)
			{
				if($v=='1')
				{
					$tt['back_1']=1;
				}
				else if($v=='2')
				{
					$tt['back_2']=1;
				}
				else if($v=='3')
				{
					$tt['back_3']=1;
				}
				else if($v=='4')
				{
					$tt['back_4']=1;
				}
				
			}
		}else{
			$tt['back_1']=0;
			$tt['back_2']=0;
			$tt['back_3']=0;
			$tt['back_4']=0;
		}

		$e=db('articlem')->where('id',input('post.aid'))->update($tt);
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
		$e=db('articlem')->where('id',$aid['aid'])->delete();
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
			$data=input('post.');
			
			$tt=['status'=>input('post.stch'),'up_time'=>time()];

			//是否推荐
			if($data['checks']==1){
				$tt['back_1']=0;
				$tt['back_2']=0;
				$tt['back_3']=0;
				$tt['back_4']=0;
				foreach($data['check'] as $k=>$v)
				{
					if($v=='1')
					{
						$tt['back_1']=1;
					}else if($v=='2'){
						$tt['back_2']=1;
					}else if($v=='3'){
						$tt['back_2']=1;
					}else if($v=='4'){
						$tt['back_2']=1;
					}
					
				}
			}
			$e=db('articlem')->where('id',input('post.aid'))->update($tt);
			if($e>0)
			{
				$this->success('修改成功','module/art_list?id='.input('post.series_id'));
			}else{
				$this->error('修改失败');
			}
		}
		$obj=db('articlem')->where('id',input('id'))->find();
		$this->assign('art',$obj);
		return view();
	}
	//评论
	public function p_list()
	{
		if(request()->isPost()){
			$list=db('comments')->where('nid',input('aid'))->where('add_time',input('times'))->paginate(16);
			$this->assign('alist',$list);
			$this->assign('aid',input('aid'));
		}else{
			$list=db('comments')->where('nid',input('id'))->paginate(16);
			$this->assign('alist',$list);
			$this->assign('aid',input('id'));
		}
		$this->assign('mid',input('mid'));
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
				$this->success('修改成功','module/p_list?id='.input('post.nid'));
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
		if(request()->isPost())
		{
			$list=db('praise')->where('wid',input('aid'))->where('add_time',input('times'))->paginate(16);
			$this->assign('alist',$list);
			$this->assign('aid',input('aid'));
		}else{
			$list=db('praise')->where('wid',input('id'))->paginate(16);
			$this->assign('alist',$list);
			$this->assign('aid',input('id'));
		}
		$this->assign('comid',input('comid'));
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