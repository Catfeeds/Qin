<?php
namespace app\wap\controller;
use think\Controller;
use think\Request;
use think\Db;

class School extends Controller
{
    public function index()
    {
		//查询所有校区
		$mmp="a.status=1";
		if(input('param.sstext'))
		{
			$mmp.=" and a.name like '%".input('param.sstext')."%'";
		}

		$lists=db('school')->alias('a')
								->join('ysj_user b ','b.sid= a.id','LEFT')
								->field('a.id,a.name,a.img,count(b.id) as ct')
								->where($mmp)
								->group('a.id')
								->order('ct desc')
								->paginate(6);
		$this->assign('lists',$lists);
		if(input('param.is_ajax')){
			return $this->fetch('ajax_index_list');
			exit;
		}
		return $this->fetch();
	}

	public function index2()
    {
		//查询校区资讯
		$map=['status'=>1];

		$lists=db('activity')->where($map)->order('look desc')->paginate(5);

		$this->assign('lists',$lists);
		if(input('param.is_ajax')){
			return $this->fetch('ajax_index2_list');
			exit;
		}
		return $this->fetch();
	}

	//时讯详细
	public function news_info()
    {
		$obj=db('activity')->where('id',input('news_id'))->where('status',1)->find();
		//浏览+1
		db('activity')->where('id',input('news_id'))->setInc('look');
		$this->assign('obj',$obj);

		return $this->fetch();
	}
	
	//校区主页
	public function school_info()
	{
		//学校信息
		$obj=db('school')->where('id',input('school_id'))->find();

		//访问+1
		db('school')->where('id',input('school_id'))->setInc('look');

		$this->assign('obj',$obj);

		//按类别查询校区用户 ----0:参赛用户 1:普通用户 2:校区时讯
		$list_all=array();
		if(input('type')==1)
		{
			$list_all=db('player')->alias('a')->join('ysj_user b ','a.user_id=b.id')
						->field('a.user_id as id,a.user_name,b.img,a.up_time,a.back_3 as look')
						->where('a.status=1 and a.back_2!=2 and a.so_open=1 and a.sid='.input('school_id'))
						->order('a.back_3 desc')->paginate(12);
			$this->assign('list_all',$list_all);
			if(input('param.is_ajax')){
				return $this->fetch('ajax_school_info_list');
				exit;
			}
			$this->assign('type',1);
		}elseif(input('type')==2)
		{
			$list_all=db('activity')->where('sid',input('school_id'))->order('id desc')->paginate(5);
			$this->assign('list_all',$list_all);
			if(input('param.is_ajax')){
				return $this->fetch('ajax_school_art_list');
				exit;
			}
			$this->assign('type',2);

		}else
		{
			
			
			$list_all=db('user')->field('id,user_name,img,up_time,look')->where('status=1 and sid='.input('school_id'))->order('look desc')->paginate(12);
			$this->assign('list_all',$list_all);
			if(input('param.is_ajax')){
				return $this->fetch('ajax_school_info_list');
				exit;
			}
			$this->assign('type',0);
		}

		
		//dump($list_all);

		return $this->fetch();

	}
	
	//学校动态
	public function art_info()
	{
		$obj=db('activity')->where('id',input('news_id'))->find();
		$this->assign('obj',$obj);

		return $this->fetch();
	}
}
