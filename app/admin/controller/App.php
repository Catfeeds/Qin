<?php
// +----------------------------------------------------------------------
// | ThinkTM  [ DO WHAT YOU THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016 All Rights Reserved.
// +----------------------------------------------------------------------
// | Author: 云飞狼舞
// +----------------------------------------------------------------------


namespace app\admin\controller;
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
        if( !UID ){// 还没登录 跳转到登录页面
			$url = Url::build('admin/login/index');
            $this->redirect($url);
		}
		//权限判断
		$this->js();
		
	}

	public function js()
	{
		//header("Content-Type:text/html;charset=utf8");
		//echo "模块：" . request()->module()."<br>";
		//echo "控制器：" . request()->controller()."<br>";
		//echo "方法：" . request()->action()."<br>";
		
		$admin=explode(',',db('admin')->where('id',input('session.admin_auth.id'))->value('auth'));
		$mm=request()->controller().'/'.request()->action();
		$mid=db('juris')->where('pagination',$mm)->value('id');
		$bool=false;
		if($mid==null)
		{
			$bool=true;
		}else{
			foreach($admin as $k=>$v)
			{
				if($v==$mid)
				{
					$bool=true;
					break;
				}
			}
		}

		if(!$bool)
		{
			$this->error('没有该操作权限','index/index');
		}
		

	}

}
