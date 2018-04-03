<?php
namespace app\index\controller;
use think\Request;

class Lists extends App 
{
	//初始化
	protected $beforeActionList = [
        'left'
    ];

	//学校列表页
    public function index()
    {
		//按分类查询
		$map='status=1';
		$map.=' and maxtype_id=1';

		//资讯一级推荐
		$list_news_t=db('news')->where('back_1',1)->where($map)->order('add_time desc')->limit(3)->select();
		$this->assign('list_news_t',$list_news_t);
		
		//资讯二级推荐
		$list_news=db('news')->where('back_2',1)->where($map)->order('add_time desc')->limit(5)->select();
		$this->assign('list_news',$list_news);

		//学校排行
		$mmp="";
		if(input('pid'))
		{
			$mmp="a.pid=".input('pid');
		}

		$list_user_school=db('player')->field('a.sid,a.sname,b.img,count(a.id) as ct')
								->alias('a')
								->join('ysj_school b ','b.id=a.sid','LEFT')
								->group('a.sname')
								->where($mmp)
								->where('a.sname','neq','')
								->order('ct desc')
								->paginate(15,false,['type' => 'paging_school_list','var_page' => 'page',]);

		$this->assign('list_user_school',$list_user_school);


		return view();

		}


	//选手排行
	public function index_player()
	{

		//资讯一级推荐
		$list_news_t=db('news')->where('back_1',1)->where('status=1 and maxtype_id=1')->order('add_time desc')->limit(3)->select();
		$this->assign('list_news_t',$list_news_t);
		
		//二级推荐
		$list_news=db('news')->where('back_2',1)->where('status=1 and maxtype_id=1')->order('add_time desc')->limit(5)->select();
		$this->assign('list_news',$list_news);

		//选手排行
		$list_player=db('player')->alias('a')->join('ysj_user b ','a.user_id=b.id')
						->field('a.user_id as id,a.user_name,b.img,a.up_time,a.back_3')
						->where('a.status=1 and a.back_2!=2 and a.so_open=1')
						->group('a.user_id')
						->order('a.back_3 desc')->paginate(15,false,['type' => 'paging_list',]);
		$this->assign('list_player',$list_player);

		return view('index_player');
	}

	//学校列表页
    public function index_cmm()
    {
		
		//按分类查询
		$map='status=1';
		$map.=' and maxtype_id=1';

		//资讯一级推荐
		$list_news_t=db('news')->where('back_1',1)->where($map)->order('add_time desc')->limit(3)->select();
		$this->assign('list_news_t',$list_news_t);
		
		//资讯二级推荐
		$list_news=db('news')->where('back_2',1)->where($map)->order('add_time desc')->limit(5)->select();
		$this->assign('list_news',$list_news);

		$list_user_school=db('community')->field('a.id,a.name,a.img,count(b.id) as ct')
								->alias('a')
								->join('ysj_player b ','b.ssid=a.id')
								->group('a.id')
								->where('a.status',1)
								->order('ct desc')
								->paginate(15,false,['type' => 'paging_school_list','var_page' => 'page',]);
		$this->assign('list_user_school',$list_user_school);


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