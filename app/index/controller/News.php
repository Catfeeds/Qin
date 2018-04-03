<?php
namespace app\index\controller;
use think\Request;

class News extends App 
{
	//初始化
	protected $beforeActionList = [
        'left'
    ];

	//资讯首页
    public function index()
    {
		//资讯分类查询
		//$list_cate=db('cate')->where('status',1)->select();
		//$this->assign('list_cate',$list_cate);

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
		$list_news_t=db('news')->where('back_1',1)->where($map)->order('add_time desc')->limit(3)->select();
		$this->assign('list_news_t',$list_news_t);
		
		//二级推荐
		$list_news=db('news')->where('back_2',1)->where($map)->order('add_time desc')->limit(5)->select();
		$this->assign('list_news',$list_news);

		//所有资讯
		$list_all=db('news')->where($map)->where('back_1!=1 and back_2!=1')->order('add_time desc')->paginate(12,false,['type' => 'paging_news_list',]);
		$this->assign('list_all',$list_all);


		return view();

		}


	//资讯详细页
	public function News_info()
	{
		$obj=db('news')->where('id',input('news_id'))->where('status',1)->find();
		
		//未找到资讯或者id为空
		if($obj==null||input('news_id')==null)
		{
			$this->error('信息不存在或已冻结！');
		}
		//浏览+1
		db('news')->where('id',input('news_id'))->setInc('look');

		//资讯一级推荐
		$list_news_t=db('news')->where('back_1',1)->where('status=1 and maxtype_id='.$obj['maxtype_id'])->order('add_time desc')->limit(3)->select();
		$this->assign('list_news_t',$list_news_t);
		
		//二级推荐
		$list_news=db('news')->where('back_2',1)->where('status=1 and maxtype_id='.$obj['maxtype_id'])->order('add_time desc')->limit(5)->select();
		$this->assign('list_news',$list_news);

		$this->assign('obj',$obj);


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