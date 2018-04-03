<?php
namespace app\wap\controller;
use think\Controller;
use think\Request;
use think\Db;

class News extends Controller
{
    public function index()
    {
		//所有资讯
		$lists=db('news')->where('maxtype_id=1')->where('status=1')->order('add_time desc')->paginate(5);
		$this->assign('lists',$lists);
		if(input('param.is_ajax')){
			return $this->fetch('ajax_index_list');
			exit;
		}
		return $this->fetch();
	}
	
	public function index2()
    {
		//所有资讯
		$lists=db('news')->where('maxtype_id=2')->where('status=1')->order('add_time desc')->paginate(5);
		$this->assign('lists',$lists);
		if(input('param.is_ajax')){
			return $this->fetch('ajax_index2_list');
			exit;
		}
		return $this->fetch();
	}
	
	public function news_info()
    {
		$obj=db('news')->where('id',input('news_id'))->where('status',1)->find();
		//浏览+1
		db('news')->where('id',input('news_id'))->setInc('look');
		$this->assign('obj',$obj);
		return $this->fetch();
	}
}
