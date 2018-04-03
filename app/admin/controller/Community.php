<?php
namespace app\admin\controller;
use think\request;

class Community extends App 
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
			$list=db('community')->where('name','like','%'.input("title").'%')->where($cps)->paginate(16,false,['query'=>array('title'=>input("title"))]);
			$this->assign('alist',$list);
		}
		else
		{
			$list=db('community')->where($cps)->order('id')->paginate(16);
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
			$tt=['name'=>$data['aname'],'esc'=>$data['esc'],'add_time'=>time()];

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
				 $info = $img->rule('date')->move(ROOT_PATH . 'public'.DS.'uploads'.DS.'community');
				 if($info){
						$tt['img']='/public/uploads/community/'.$info->getSavename(); 
				 }else{
						$tt['img']='/public/admin/image/timg.jpg';
				 }
			 }else{
						$tt['img']='/public/admin/image/timg.jpg';
				 }


				$tt['pid']=$data['pid'];
				$tt['pname']=db('reg')->where('id',$data['pid'])->value('name');

				//$tt['cid']=$data['cid'];
				//$tt['cname']=db('reg')->where('id',$data['cid'])->value('name');

			
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

			$e=db('community')->insert($tt);
			if($e>0)
			{
				$this->success('添加成功','community/insert');
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
			$tt=['name'=>$data['aname'],'esc'=>$data['esc'],'up_time'=>time()];

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
				 $info = $img->rule('date')->move(ROOT_PATH . 'public'.DS.'uploads'.DS.'community');
				 if($info){
						$tt['img']='/public/uploads/community/'.$info->getSavename(); 
				 }else{
						$tt['img']='/public/admin/image/timg.jpg';
				 }
			 }


				$tt['pid']=$data['pid'];
				$tt['pname']=db('reg')->where('id',$data['pid'])->value('name');

				//$tt['cid']=$data['cid'];
				//$tt['cname']=db('reg')->where('id',$data['cid'])->value('name');

			
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

			$e=db('community')->where('id',$data['uid'])->update($tt);
			if($e>0)
			{
				$this->success('修改成功','community/index');
			}else{
				$this->error('修改失败');
			}


		}
		$uobj=db('community')->where('id',input('id'))->find();
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
		$e=db('community')->where('id',$aid['aid'])->delete();
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
		$e=db('community')->where('name',$data['aname'])->where('id','neq',$data['aid'])->find();
		if($e!=null)
		{
			return ["e"=>1];
		}else{
			return ["e"=>-1];
		}
	}

}