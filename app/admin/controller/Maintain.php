<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;

class Maintain extends App
{
    //网站信息维护
	public function index()
	{
		if(request()->isPost())
		{
			$data=input('post.');
			
			$tt=['name'=>$data['name'],'firm'=>$data['firm'],'domain'=>$data['domain'],'tel'=>$data['tel'],'por'=>$data['por'],'title'=>$data['title'],'keyword'=>$data['keyword'],'description'=>$data['description'],'up_time'=>time()];

			$e=db('remark')->where('id',1)->update($tt);
			if($e>0)
			{
				$this->success('修改成功','index/index');
			}else{
				$this->error('修改失败');
			}

		}

		$obj=db('remark')->where('id',1)->find();
		$this->assign('obj',$obj);

		return view();
	}
}