<?php
// +----------------------------------------------------------------------
// | ThinkTM  [ DO WHAT YOU THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016 All Rights Reserved.
// +----------------------------------------------------------------------
// | Author: 云飞狼舞
// +----------------------------------------------------------------------


namespace app\wap\controller;
use think\Controller;
use \think\Url;
use think\Request;

class App extends Controller
{

    /**
     * 后台控制器初始化
     */
    protected function _initialize()
	{
		
		// 获取当前用户ID
		if(defined('UID')) return ;
		define('UID',is_login());
		if(!UID){// 还没登录 跳转到登录页面
			$url = Url::build('login/index');
			$this->redirect($url);
		}
		
		
	}
}
