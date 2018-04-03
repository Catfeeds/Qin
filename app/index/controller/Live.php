<?php
namespace app\index\controller;
use think\Request;

class Live extends App 
{

	//初始化
	protected $beforeActionList = [
        'left'
    ];

	//赛事直播
	public function index()
	{
		//推荐直播
		$list_bd_back_1=db('broadcast')->where('back_1',1)->where('status',1)->order('id desc')->limit(4)->select();
		$this->assign('list_bd_back_1',$list_bd_back_1);

		//赛事直播
		$list_bd=db('broadcast')->where('status',1)->order('id desc')->paginate(8,false,['type' => 'paging_list','var_page' => 'page',]);
		$this->assign('list_bd',$list_bd);
        return view();

	}

	//选手直播
    public function index_user()
    {
		//人气最高五名选手
		$list_user_live_back_3=db('user')->field('a.id,b.user_name,b.back_3,a.Live,a.img')
						->alias('a')->join('player b ','a.id=b.user_id')
						->where('b.status=1 and b.back_2=1 and b.so_open=1')
						->order('back_3 desc')->limit(5)->select();
		$this->assign('list_user_live_back_3',$list_user_live_back_3);


		//已开通直播的选手信息
		$list_user_live=db('user')->field('a.id,b.user_name,b.sname,b.back_3,a.Live,a.img')
						->alias('a')->join('player b ','a.id=b.user_id')
						->where('b.status=1 and b.back_2=1 and b.so_open=1')
						->order('back_3 desc')->paginate(10,false,['type' => 'paging_list','var_page' => 'page',]);
		$this->assign('list_user_live',$list_user_live);

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