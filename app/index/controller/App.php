<?php
// +----------------------------------------------------------------------
// | ThinkTM  [ DO WHAT YOU THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016 All Rights Reserved.
// +----------------------------------------------------------------------
// | Author: 云飞狼舞
// +----------------------------------------------------------------------


namespace app\index\controller;
use think\Controller;
use think\Url;
use think\Request;

class App extends Controller
{

    /**
     * 后台控制器初始化
     */
    protected function _initialize()
	{
		if (Request::instance()->isMobile()){
			$this->redirect('wap/index/index');
		}
		
		if(!cookie('remark'))
		{
			$this->getcookie();
		}

		//新动态查询
		if(request()->controller()=='usercontrol')
		{
			$this->user_auth();
		}

		//是否登录
		if(input('session.user_auth.id'))
		{
			$this->getreoll();
		}

		//网站模块判断，左侧选中状态判断
		$this->getnav();

		//关键字
		$this->getgjz();
		
	}

	public function user_auth()
	{
		//是否登录
		if(!input('session.user_auth.id'))
		{
			$this->error('请先登录!');
		}
	}

	public function getcookie()
	{
		//查询网站信息
		$obj=db('remark')->where('id',1)->find();
		cookie('remark', $obj, 3600);

	}

	public function getreoll()
	{
		$number=db('record')->where('wid',input('session.user_auth.id'))->where('look',0)->count();

		$numberm=db('message')->where('user_id',input('session.user_auth.id'))->where('look',0)->count();

		session('tiish', $number);
		session('ageii', $numberm);

		
	}

	public function getnav()
	{
		
		if(request()->controller()=='Index')
		{
			session('index_nav','index');
		}
		elseif(request()->controller()=='News')
		{
			session('index_nav','news');
		}
		else if(request()->controller()=='School')
		{
			session('index_nav','school');
		}
		else if(request()->controller()=='Live')
		{
			session('index_nav','live');
		}
		
		
	}


	public function getgjz()
	{
		$obj=db('remark')->where('id',1)->find();
		session('gjz', $obj);	
	}

}
