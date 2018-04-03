<?php
namespace app\super_admin\controller;
use think\Request;

class Ar extends App 
{

	//回复信息列表
    public function index()
    {
		$list=db('wcar')->order('id desc')->paginate(16);
		$this->assign('list',$list);
        return view();
    }

	//添加图片素材
	public function insert()
	{
		if(request()->isPost())
		{
			$data=input('post.');
			$tt=['tid'=>$data['tid'],'tname'=>$data['tname'],'add_time'=>time()];

			if($data['tid']==1)
			{
				$tt['keywords']=$data['keyword'];
			}else{
				$tt['keywords']='';
			}

			if($data['tname']==1)
			{
				$tt['content']=$data['esc'];
			}else{
				$tt['content']=$data['content'];
			}

			$e=db('wcar')->insert($tt);

			if($e>0)
			{
				$this->success('添加成功','ar/insert');
			}else{
				$this->error('添加失败','ar/insert');
			}
			
		}

		return view('add');
	}

	//修改
	public function update()
	{
		
		if(request()->isPost())
		{
			$data=input('post.');
			
			$tt=['tid'=>$data['tid'],'tname'=>$data['tname'],'add_time'=>time()];

			if($data['tid']==1)
			{
				$tt['keywords']=$data['keyword'];
			}else{
				$tt['keywords']='';
			}

			if($data['tname']==1)
			{
				$tt['content']=$data['esc'];
			}else{
				$tt['content']=$data['content'];
			}
			

			$e=db('wcar')->where('id',input('wcar_id'))->update($tt);

			if($e>0)
			{
				$this->success('修改成功','ar/index');
			}else{
				$this->error('修改失败','ar/index');
			}
			
		}

		$obj=db('wcar')->where('id',input('wcar_id'))->find();
		$this->assign('obj',$obj);

		return view();
	}

	//删除
	public function deletes()
	{
		$e=db('wcar')->where('id',input('post.aid'))->delete();
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