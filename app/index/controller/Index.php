<?php
namespace app\index\controller;
use think\Request;
use think\Db;

class Index extends App
{
    public function index()
    {
		//推荐资讯查询
		$list_news=db('news')->where('back_1',1)->where('status',1)->order('add_time desc')->limit(5)->select();
		$this->assign('list_news',$list_news);

		//直播资讯查询 
		$list_bd=db('broadcast')->where('back_1',1)->where('status',1)->order('add_time desc')->limit(6)->select();
		$this->assign('list_bd',$list_bd);

		//论坛板块
		//$list_md=db('module')->where('status',1)->where('back_1',1)->order('id //desc')->limit(10)->select();
		//$this->assign('list_md',$list_md);

		//论坛推荐动态/活动查询
		$list_activity_1=db('activity')->where('status',1)->where('tid',1)->where('back_1',1)->order('add_time desc')->limit(5)->select();
		$this->assign('list_activity_1',$list_activity_1);

		$list_activity_2=db('activity')->where('status',1)->where('tid',2)->where('back_1',1)->order('add_time desc')->limit(10)->select();
		$this->assign('list_activity_2',$list_activity_2);
		
		return $this->fetch();
	}

	//引用页面news
	public function index_slide()
	{
		//直播资讯查询 
		$list_bd_1=db('broadcast')->where('back_1',1)->where('status',1)->order('id desc')->limit(3)->select();
		$this->assign('list_bd_1',$list_bd_1);
		$list_bd_2=db('broadcast')->where('back_1',1)->where('status',1)->order('id desc')->page(2,3)->select();
		$this->assign('list_bd_2',$list_bd_2);

		return view();
	}
	
}
