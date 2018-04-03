<?php
namespace app\admin\controller;
use think\Request;

class Adm extends App 
{
    public function index()
    {
		if(input("title")!=null)
		{
			$list=db('admin')->where('name|nickname','like','%'.input("title").'%')->paginate(16,false,['query'=>array('title'=>input("title"))]);
			$this->assign('alist',$list);
		}
		else
		{
			$list=db('admin')->order('id')->paginate(16);
			$this->assign('alist',$list);
		}

		return view();

    }

	public function insert()
	{
		if(Request()->isPost())
		{
			$data=input('post.');


			$tt=['name'=>$data['aname'],'pwd'=>md5($data['pwd']),'nickname'=>$data['nickname'],'tel'=>$data['tel'],'add_time'=>time(),'add_id'=>input('session.admin_auth.id'),'add_name'=>input('session.admin_auth.name')];

			//状态
			
			if($data['stch']=='1')
			{
				$tt['status']=1;
			}else{
				$tt['status']=0;
			}

			//地区(学校)
			if($data['pid']=="0")
			{
				$tt['pid']=0;
				$tt['pname']='all';
				$tt['cid']=0;
				$tt['cname']='all';
				$tt['sid']=0;
				$tt['sname']='all';
			}
			else if($data['cid']=="0")
			{
				$tt['pid']=$data['pid'];
				$tt['pname']=db('reg')->where('id',$data['pid'])->value('name');
				$tt['cid']=0;
				$tt['cname']='all';
				$tt['sid']=0;
				$tt['sname']='all';
			}
			else if($data['sid']=="0")
			{
				$tt['pid']=$data['pid'];
				$tt['pname']=db('reg')->where('id',$data['pid'])->value('name');
				$tt['cid']=$data['cid'];
				$tt['cname']=db('reg')->where('id',$data['cid'])->value('name');
				$tt['sid']=0;
				$tt['sname']='all';
			}else{
				$tt['pid']=$data['pid'];
				$tt['pname']=db('reg')->where('id',$data['pid'])->value('name');
				$tt['cid']=$data['cid'];
				$tt['cname']=db('reg')->where('id',$data['cid'])->value('name');
				$tt['sid']=$data['sid'];
				$tt['sname']=db('school')->where('id',$data['sid'])->value('name');
			}

			//权限
			if($data['checks']==1){
				$sss=implode(',',$data['check']);
				//$sss=$sss.",";
				$tt['auth']=$sss;
			}

			$e=db('admin')->insert($tt);
			if($e>0)
			{
				$this->success('添加成功','adm/insert');
			}else{
				$this->error('添加失败');
			}
		}

		//获取权限列表
		$list=db('juris')->where('pid',null)->where('status',1)->order('back_2')->select();
		foreach($list as $k=>$v)
		{
			$sl=db('juris')->where('pid',$v['id'])->where('status',1)->order('back_2')->select();
			if($sl)
			{
				$list[$k]['children']=$sl;
			}else{
				$list[$k]['children']=0;
			}
		}
		$this->assign('jlist',$list);
		//获取地区/学校列表
		$plist=db('reg')->where('pid',null)->where('status',1)->order('back_2')->select();
		//$clist=db('reg')->where('pid',1)->select();

		$this->assign('plist',$plist);
		//$this->assign('clist',$clist);


		return view('add');
		
	}


	public function update()
	{
		if(Request()->isPost())
		{
			$data=input('post.');
			//'name'=>$data['aname'],
			$tt=['nickname'=>$data['nickname'],'tel'=>$data['tel'],'up_time'=>time()];
			if($data['pwd']!="")
			{
				$tt['pwd']=md5($data['pwd']);
			}

			//状态
			
			if($data['stch']=='1')
			{
				$tt['status']=1;
			}else{
				$tt['status']=0;
			}

			$e=db('admin')->where('id',$data['aid'])->update($tt);
			if($e>0)
			{
				$this->success('修改成功','adm/index');
			}else{
				$this->error('修改失败');
			}
		}

		$obj=db('admin')->where('id',input('id'))->find();
		$this->assign('aobj',$obj);

		return view();
		
	}

	public function edit()
	{
		if(Request()->isPost())
		{
			$data=input('post.');
			$tt=['up_time'=>time()];
			//地区(学校)
			if($data['pid']=="0")
			{
				$tt['pid']=0;
				$tt['pname']='all';
				$tt['cid']=0;
				$tt['cname']='all';
				$tt['sid']=0;
				$tt['sname']='all';
			}
			else if($data['cid']=="0")
			{
				$tt['pid']=$data['pid'];
				$tt['pname']=db('reg')->where('id',$data['pid'])->value('name');
				$tt['cid']=0;
				$tt['cname']='all';
				$tt['sid']=0;
				$tt['sname']='all';
			}
			else if($data['sid']=="0")
			{
				$tt['pid']=$data['pid'];
				$tt['pname']=db('reg')->where('id',$data['pid'])->value('name');
				$tt['cid']=$data['cid'];
				$tt['cname']=db('reg')->where('id',$data['cid'])->value('name');
				$tt['sid']=0;
				$tt['sname']='all';
			}else{
				$tt['pid']=$data['pid'];
				$tt['pname']=db('reg')->where('id',$data['pid'])->value('name');
				$tt['cid']=$data['cid'];
				$tt['cname']=db('reg')->where('id',$data['cid'])->value('name');
				$tt['sid']=$data['sid'];
				$tt['sname']=db('school')->where('id',$data['sid'])->value('name');
			}

			//权限
			if($data['checks']==1){
				$sss=implode(',',$data['check']);
				//$sss=$sss.",";
				$tt['auth']=$sss;
			}else{
				$tt['auth']="";
			}	

			$e=db('admin')->where('id',$data['aid'])->update($tt);
			if($e>0)
			{
				$this->success('权限修改成功','adm/index');
			}else{
				$this->error('权限修改失败');
			}
		}

		$obj=db('admin')->where('id',input('id'))->find();
		$this->assign('aobj',$obj);

		//获取权限列表
		$list=db('juris')->where('pid',null)->where('status',1)->order('back_2')->select();
		foreach($list as $k=>$v)
		{
			$sl=db('juris')->where('pid',$v['id'])->where('status',1)->order('back_2')->select();
			if($sl)
			{
				$list[$k]['children']=$sl;
			}else{
				$list[$k]['children']=0;
			}
		}
		$this->assign('jlist',$list);
		//获取地区/学校列表
		$plist=db('reg')->where('pid',null)->where('status',1)->order('back_2')->select();
		$this->assign('plist',$plist);
		if($obj['pid']!=0)
		{
			$clist=db('reg')->where('pid',$obj['pid'])->where('status',1)->order('back_2')->select();
			$this->assign('clist',$clist);
		}
		if($obj['cid']!=0)
		{
			$slist=db('school')->where('cid',$obj['cid'])->order('id')->select();
			$this->assign('slist',$slist);
		}
		

		return view();
		
	}

	//账号是否重复
	public function cf()
	{
		$data=input('post.');
		$e=db('admin')->where('name',$data['aname'])->where('id','neq',$data['aid'])->find();
		if($e!=null)
		{
			return ["e"=>1];
		}else{
			return ["e"=>-1];
		}
	}

	//删除
	public function deletes()
	{
		$aid=input('post.');
		$e=db('admin')->where('id',0)->delete();

		if($e>0)
		{
			return ['msg'=>"删除成功"];
		}
		else
		{
			return ['msg'=>"操作失败"];
		}
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
		$list=db('school')->where('cid',input('post.cid'))->order('id desc')->select();
		return ['ls'=>$list];

	}
	



}