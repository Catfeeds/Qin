<?php
namespace app\wap\controller;
use think\Controller;
use think\Request;
use think\Db;

class Media extends Controller
{
    public function index()
    {
		//所有资讯
		$lists=db('activity')->where('tid=2')->where('status=1')->order('id desc')->paginate(5);
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
		$lists=db('activity')->where('tid=1')->where('status=1')->order('id desc')->paginate(5);
		$this->assign('lists',$lists);
		if(input('param.is_ajax')){
			return $this->fetch('ajax_index2_list');
			exit;
		}
		return $this->fetch();
	}
	
	public function news_info()
    {
		$obj=db('activity')->where('id',input('news_id'))->where('status',1)->find();
		//浏览+1
		db('activity')->where('id',input('news_id'))->setInc('look');
		$this->assign('obj',$obj);
		return $this->fetch();
	}
}
