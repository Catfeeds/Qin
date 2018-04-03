<?php
namespace app\admin\controller;
use think\Request;

class News extends App 
{
    public function index()
    {
		if(input('title')!=null)
		{
			$list=db('news')->where('title','like','%'.input('title').'%')->order('id desc')->paginate(16,false,['query'=>array('title'=>input("title"))]);
			
			$this->assign('alist',$list);
		}
		else
		{
			$list=db('news')->order('id desc')->paginate(16);
			
			$this->assign('alist',$list);
		}
		
        return view();
    }
	//添加
	public function insert()
	{
		if(request()->isPost())
		{
			$data=input('post.');

			$tt=['title'=>$data['aname'],'edit'=>$data['edit'],'keywords'=>$data['keywords'],'description'=>$data['description'],'esc'=>$data['esc'],'user_id'=>input('session.admin_auth.id'),'user_name'=>input('session.admin_auth.name'),'content'=>$data['content'],'add_time'=>strtotime($data['date'])];
			$tt['maxtype_id']=$data['pid'];
			$tt['maxtype_name']=db('cate')->where('id',$data['pid'])->value('name');
			$img=Request()->file('img');
			if($img!=''){
				 $info = $img->rule('date')->move(ROOT_PATH . 'public'.DS.'uploads'.DS.'news');
				 if($info){
						$tt['img']='/public/uploads/news/'.$info->getSavename(); 
				 }else{
						$tt['img']='/public/admin/image/timg.jpg';
				 }
			 }else{
						$tt['img']='/public/admin/image/timg.jpg';
				 }

			//状态
			if($data['stch']=='1')
			{
				$tt['status']=1;
			}
			else
			{
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

			$e=db('news')->insert($tt);
			if($e>0)
			{
				$this->success('添加成功','news/insert');
			}else{
				$this->error('添加失败');
			}

		}
		$list=db('cate')->order('id')->select();
		$this->assign('alist',$list);

		$dt=time();
		$this->assign('dt',$dt);

		return view('add');
	}

	//修改
	public function update()
	{
		if(request()->isPost())
		{
			$data=input('post.');
			$tt=['title'=>$data['aname'],'edit'=>$data['edit'],'keywords'=>$data['keywords'],'description'=>$data['description'],'esc'=>$data['esc'],'content'=>$data['content'],'add_time'=>strtotime($data['date']),'up_time'=>time()];

			$tt['maxtype_id']=$data['pid'];
			$tt['maxtype_name']=db('cate')->where('id',$data['pid'])->value('name');

			$img=Request()->file('img');
			if($img!=''){
				 $info = $img->rule('date')->move(ROOT_PATH . 'public'.DS.'uploads'.DS.'news');
				 if($info){
						$tt['img']='/public/uploads/news/'.$info->getSavename(); 
				 }else{
						$tt['img']='/public/admin/image/timg.jpg';
				 }
			 }

			//状态
			if($data['stch']=='1')
			{
				$tt['status']=1;
			}
			else
			{
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

			$e=db('news')->where('id',$data['aid'])->update($tt);
			if($e>0)
			{
				$this->success('修改成功','news/index');
			}else{
				$this->error('修改失败');
			}

		}

		$obj=db('news')->where('id',input('id'))->find();
		$this->assign('nobj',$obj);

		$list=db('cate')->order('id')->select();
		$this->assign('alist',$list);

		return view();
	}

	//是否重复
	public function cf()
	{
		$data=input('post.');
		$e=db('news')->where('title',$data['aname'])->where('id','neq',$data['aid'])->find();
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
		$e=db('news')->where('id',$aid['aid'])->delete();
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