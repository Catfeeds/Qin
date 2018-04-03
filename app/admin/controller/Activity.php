<?php
namespace app\admin\controller;
use think\request;

class Activity extends App 
{
    public function index()
    {
		if(input("title")!=null)
		{
			$list=db('activity')->where('title','like','%'.input("title").'%')->order('id desc')->paginate(16,false,['query'=>array('title'=>input("title"))]);
			$this->assign('alist',$list);
		}
		else
		{
			$list=db('activity')->order('id desc')->paginate(16);
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
			
			$tt=['title'=>$data['aname'],'edit'=>$data['edit'],'keywords'=>$data['keywords'],'description'=>$data['description'],'add_id'=>input('session.admin_auth.id'),'add_name'=>input('session.admin_auth.id'),'content'=>$data['content'],'esc'=>$data['esc'],'add_time'=>time()];

			 $img = request()->file('img');

			 if($img!=''){
				 $info = $img->rule('date')->move(ROOT_PATH . 'public'.DS.'uploads'.DS.'activity');
				 if($info){
						$tt['img']='/public/uploads/activity/'.$info->getSavename(); 
				 }else{
						$tt['img']='/public/admin/image/timg.jpg';
				 }
			 }else{
						$tt['img']='/public/admin/image/timg.jpg';
				 }

				if($data['tid']!=0)
				{
					$tt['tid']=$data['tid'];

					if($data['tid']==1){
						$tt['tname']="校园之声";
					}else if($data['tid']==2){
						$tt['tname']="校园院报";
					}
				}

				if($data['pid']!=0)
				{
					$tt['pid']=$data['pid'];
					$tt['pname']=db('reg')->where('id',$data['pid'])->value('name');
				}
				if($data['cid']!=0)
				{
					$tt['cid']=$data['cid'];
					$tt['cname']=db('reg')->where('id',$data['cid'])->value('name');
				}
				if($data['sid']!=0)
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

			$e=db('activity')->insert($tt);
			if($e>0)
			{
				$this->success('添加成功','activity/insert');
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
		
			$tt=['title'=>$data['aname'],'edit'=>$data['edit'],'keywords'=>$data['keywords'],'description'=>$data['description'],'content'=>$data['content'],'esc'=>$data['esc'],'up_time'=>time()];

			 $img = request()->file('img');

			 if($img!=''){
				 $info = $img->rule('date')->move(ROOT_PATH . 'public'.DS.'uploads'.DS.'activiy');
				 if($info){
						$tt['img']='/public/uploads/activiy/'.$info->getSavename(); 
				 }else{
						$tt['img']='/public/admin/image/timg.jpg';
				 }
			 }

				if($data['tid']!=0)
				{
					$tt['tid']=$data['tid'];
					if($data['tid']==1){
						$tt['tname']="校园之声";
					}else if($data['tid']==2){
						$tt['tname']="校园院报";
					}
				}

				if($data['pid']!=0)
				{
					$tt['pid']=$data['pid'];
					$tt['pname']=db('reg')->where('id',$data['pid'])->value('name');
				}else{
					$tt['pid']=0;
					$tt['pname']='';
				}

				if($data['cid']!=0)
				{
					$tt['cid']=$data['cid'];
					$tt['cname']=db('reg')->where('id',$data['cid'])->value('name');
				}else{
					$tt['cid']=0;
					$tt['cname']='';
				}

				if($data['sid']!=0)
				{
					$tt['sid']=$data['sid'];
					$tt['sname']=db('school')->where('id',$data['sid'])->value('name');
				}else{
					$tt['sid']=0;
					$tt['sname']='';
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

			$e=db('activity')->where('id',$data['uid'])->update($tt);
			if($e>0)
			{
				$this->success('修改成功','activity/index');
			}else{
				$this->error('修改失败');
			}

		}
		$uobj=db('activity')->where('id',input('id'))->find();
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
		$e=db('activity')->where('id',$aid['aid'])->delete();
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
		$e=db('activity')->where('title',$data['aname'])->where('id','neq',$data['aid'])->find();
		if($e!=null)
		{
			return ["e"=>1];
		}else{
			return ["e"=>-1];
		}
	}


}