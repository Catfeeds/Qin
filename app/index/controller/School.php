<?php
namespace app\index\controller;
use think\request;

class School extends App 
{
	//初始化
	protected $beforeActionList = [
        'left'
    ];

	//学校首页
    public function index()
    {
		//查询推荐学校
		$list_school=db('school')->where('back_1',1)->where('status',1)->order('up_time desc')->limit(4)->select();
		$this->assign('list_school',$list_school);

		if(input("school"))
		{
			//查询所有校区
			$list_all=db('school')->alias('a')
									->join('ysj_user b ','b.sid= a.id','LEFT')
									->field('a.id,a.name,a.img,count(b.id) as ct')
									->where('a.status',1)
									->where('a.name','like','%'.input('school').'%')
									->group('a.id')
									->order('ct desc')
									->paginate(12,false,['type' => 'paging_school_list','var_page' => 'page','query' => array('school'=>input('school')),]);
			$this->assign('list_all',$list_all);

		}else{
			//查询所有校区
			$list_all=db('school')->alias('a')
									->join('ysj_user b ','b.sid= a.id','LEFT')
									->field('a.id,a.name,a.img,count(b.id) as ct')
									->where('a.status',1)
									->group('a.id')
									->order('ct desc')
									->paginate(12,false,['type' => 'paging_school_list','var_page' => 'page',]);
			$this->assign('list_all',$list_all);
		}

		


        return view();
    }

	//校区主页
	public function school_info()
	{
		//学校信息
		$obj=db('school')->where('id',input('school_id'))->find();

		//未找到学校或者id为空
		if($obj==null||input('school_id')==null)
		{
			$this->error('信息不存在或已删除！');
		}

		//访问+1
		db('school')->where('id',input('school_id'))->setInc('look');

		$this->assign('obj',$obj);

		//学校推荐动态
		$list_news=db('activity')->where('status=1 and sid='.$obj['id'])->order('add_time desc')->limit(8)->select();
		$this->assign('list_news',$list_news);

		//按类别查询校区用户 ----1:普通用户 0:参赛用户
		$list_all=array();
		$list_all_json=array();

		if(input('type'))
		{
			$list_all=db('player')->alias('a')->join('ysj_user b ','a.user_id=b.id')
						->field('a.user_id as id,a.user_name,b.img,a.up_time,a.back_3 as look')
					  ->where('a.status=1 and a.back_2!=2 and a.so_open=1 and a.sid='.input('school_id'))
					  ->order('look desc')->paginate(15,false,['type' => 'paging_list','var_page' => 'page','path'=>'/index/school/school_info/school_id/'.input('school_id').'.html']);
			$this->assign('tp',0);

			$list_all_json=json_decode(json_encode($list_all),true)['data'];
			foreach($list_all_json as $k=>$v)
			{
				$imgs=array();
				$j=0;
				$type=db('school_user')->where('user_id',$v['id'])->find();
				if($type)
				{
					foreach($type as $k=>$v)
					{
						if($type['type']=='0')
							$list_all_json[$k]['timg1']='1';
						else
							$list_all_json[$k]['timg1']='0';

						if($type['type']=='1')
							$list_all_json[$k]['timg2']='1';
						else
							$list_all_json[$k]['timg2']='0';
					}
				}else{
					$list_all_json[$k]['timg1']="0";
					$list_all_json[$k]['timg2']="0";
				}
	
			}

		}
		else
		{
			
			$list_all=db('user')->field('id,user_name,img,up_time,look')->where('status=1 and sid='.input('school_id'))->order('look desc')->paginate(15,false,['type' => 'paging_list','var_page' => 'page','path'=>'/index/school/school_info/school_id/'.input('school_id').'.html']);

			$this->assign('tp',1);

			$list_all_json=json_decode(json_encode($list_all),true)['data'];

			foreach($list_all_json as $k=>$v)
			{
				$imgs=array();
				$j=0;
				$type=db('school_user')->where('user_id',$v['id'])->select();
				if($type)
				{
					foreach($type as $k=>$v)
					{
						if($type['type']=='0')
							$list_all_json[$k]['timg1']='1';
						else
							$list_all_json[$k]['timg1']='0';

						if($type['type']=='1')
							$list_all_json[$k]['timg2']='1';
						else
							$list_all_json[$k]['timg2']='0';
					}
				}else{
					$list_all_json[$k]['timg1']="0";
					$list_all_json[$k]['timg2']="0";
				}
			}
		}
		
		$this->assign('list_all_json',$list_all_json);
		$this->assign('list_all',$list_all);


		return view();

	}

	//动态列表
	public function school_arts()
	{
		//学校信息
		$obj=db('school')->where('id',input('school_id'))->find();

		//未找到学校或者id为空
		if($obj==null||input('school_id')==null)
		{
			$this->error('信息不存在或已删除！');
		}

		//访问+1
		db('school')->where('id',input('school_id'))->setInc('look');

		$this->assign('obj',$obj);

		//学校推荐动态
		$list_news=db('activity')->where('status=1 and sid='.$obj['id'])->order('up_time desc')->limit(8)->select();
		$this->assign('list_news',$list_news);

		$list_all=db('activity')->where('status=1 and sid='.$obj['id'])->order('add_time desc')->paginate(12,false,['type' => 'paging_news_list','var_page' => 'page',]);
		$this->assign('list_all',$list_all);

		return view();
	}

	//学校动态啊
	public function art_info()
	{
		//学校信息
		$obj=db('school')->where('id',input('school_id'))->find();

		//未找到学校或者id为空
		if($obj==null||input('school_id')==null)
		{
			$this->error('信息不存在或已删除！');
		}

		//访问+1
		db('school')->where('id',input('school_id'))->setInc('look');

		$this->assign('obj',$obj);

		//学校推荐动态
		$list_news=db('activity')->where('status=1 and sid='.$obj['id'])->order('up_time desc')->limit(8)->select();
		$this->assign('list_news',$list_news);

		$aobj=db('activity')->where('id',input('news_id'))->find();
		$this->assign('aobj',$aobj);

		return view();
	}

	//校区时讯
    public function index_news()
    {
		//按分类查询
		$map=['status'=>1];

		//资讯一级推荐
		$list_news_t=db('activity')->where('back_1',1)->where('status=1')->order('up_time desc')->limit(3)->select();
		$this->assign('list_news_t',$list_news_t);

		//分类推荐
		$list_news=db('activity')->where('back_2',1)->where($map)->order('up_time desc')->limit(5)->select();
		$this->assign('list_news',$list_news);

		//所有资讯
		$list_all=db('activity')->where($map)->order('look desc')->paginate(12,false,['type' => 'paging_news_list','var_page' => 'page',]);
		$this->assign('list_all',$list_all);

        return view();
    }

	//时讯详细页
	public function News_info()
	{
		$obj=db('activity')->where('id',input('news_id'))->where('status',1)->find();
		
		//未找到资讯或者id为空
		if($obj==null||input('news_id')==null)
		{
			$this->error('信息不存在或已冻结！');
		}
		//浏览+1
		db('activity')->where('id',input('news_id'))->setInc('look');

		//资讯一级推荐
		$list_news_t=db('activity')->where('back_1',1)->where('status=1 and tid='.$obj['tid'])->order('up_time desc')->limit(3)->select();
		$this->assign('list_news_t',$list_news_t);
		
		//二级推荐
		$list_news=db('activity')->where('back_2',1)->where('status=1 and tid='.$obj['tid'])->order('look desc')->limit(5)->select();
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