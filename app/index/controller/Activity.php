<?php
namespace app\index\controller;
use think\Request;

class Activity extends App 
{
	//初始化
	protected $beforeActionList = [
        'left'
    ];

	//活动首页
    public function index()
    {
		
		//按分类查询
		$map='status=1';
		if(input('type_id'))
		{
			$map.=' and maxtype_id='.input('type_id');
			$this->assign('t_id',input('type_id'));
		}else{
			$map.=' and maxtype_id=1';
			$this->assign('t_id',1);
		}

		//资讯一级推荐
		$list_news_t=db('news')->where('back_1',1)->where($map)->order('id desc')->limit(3)->select();
		$this->assign('list_news_t',$list_news_t);
		
		//二级推荐
		$list_news=db('news')->where('back_2',1)->where($map)->order('id desc')->limit(5)->select();
		$this->assign('list_news',$list_news);

		//所有资讯
		$list_all=db('news')->where($map)->order('id desc')->paginate(12,false,['type' => 'paging_list','var_page' => 'page',]);
		$this->assign('list_all',$list_all);

		return view();

		}


	//资讯详细页
	public function activity_info()
	{
		$obj=db('activity')->where('id',input('act_id'))->where('status',1)->find();
		
		//未找到资讯或者id为空
		if($obj==null||input('act_id')==null)
		{
			$this->error('信息不存在或已冻结！');
		}
		//浏览+1
		db('news')->where('id',input('act_id'))->setInc('look');

		$this->assign('obj',$obj);

		//按分类查询
		$map='status=1';
		

		//资讯一级推荐
		$list_news_t=db('news')->where('back_1',1)->where($map)->order('id desc')->limit(3)->select();
		$this->assign('list_news_t',$list_news_t);
		
		//二级推荐
		$list_news=db('news')->where('back_2',1)->where($map)->order('id desc')->limit(5)->select();
		$this->assign('list_news',$list_news);


		return view();
	}


	//左侧列表信息
	public function left()
	{
		
		$this->assign('list_school_user',left_school());
		
		$this->assign('list_reg_user',left_reg());
		
		$this->assign('list_player_back_3',left_player());

	}
	
	



}