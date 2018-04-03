<?php
// +----------------------------------------------------------------------
// | ThinkTM  [ DO WHAT YOU THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2017 All Rights Reserved.
// +----------------------------------------------------------------------
// | Author: 云飞狼舞/不知鱼
// +----------------------------------------------------------------------


namespace app\index\controller;
use think\Controller;
use think\Request;

class Login extends Controller
{
	/**
     * 用户登录
     */
    public function index($username = null, $password = null){
        if(Request::instance()->isPost()){
			$adm=db('user')->where('name',$username)->where('status',1)->where('identity',1)->find();
            if($adm){ //登录成功
				if(md5($password) == $adm['pwd']){
					/* 记录登录SESSION和COOKIES */
					$tt=['last_time'=>time(),'login'=>$adm['login']+1];

					//积分+1
					int_number($adm['id'],1);

					db('user')->where('id',$adm['id'])->update($tt);
					$auth = array(
						'id'              => $adm['id'],
						'name'        => $adm['name'],
						'user_name'       =>$adm['user_name'],
						'user_img'       =>$adm['img'],
						'last_time' => time(),
					);

					session('user_auth', $auth);
					
					$this->success('登录成功！', 'usercontrol/index');
				}else{
					$this->error('密码错误！');
				}
            	
            } else { //登录失败
                $this->error('此账号不存在或被冻结！');
            }
			
        } else {

            if(input('session.user_auth.id')){
                $this->redirect('usercontrol/index');
            }else{
				return view();
            }
        }
	}

	// 验证码检测
    public function check($code)
    {
        if (!captcha_check($code))
		{
            $this->error('验证码错误','login/index');
        } 
    }
	

	/* 退出登录 */
    public function logout(){
        if(input('session.user_auth.id')){
            session(null);// 销毁session
            
        }
			
		$this->redirect('index/index');	
		
    }
	
	//登录
	public function login()
	{
		if(Request()->isPost())
		{
			$data=input('post.');

			$adm=db('user')->where('name',$data['user'])->where('status',1)->where('identity',1)->find();
            if($adm){ //登录成功
				if(md5($data['pwd']) == $adm['pwd']){
					/* 记录登录SESSION和COOKIES */
					$tt=['last_time'=>time(),'login'=>$adm['login']+1,'ip'=>\think\Request::instance()->ip()];
					db('user')->where('id',$adm['id'])->update($tt);
					$auth = array(
						'id'              => $adm['id'],
						'name'        => $adm['name'],
						'user_name'       =>$adm['user_name'],
						'user_img'       =>$adm['img'],
						'last_time' => time(),
					);
					session('user_auth', $auth);
					return json(['status'=>1,'message'=>'登录成功！']);
				}else{
					return json(['status'=>0,'message'=>'密码错误！']);
				}
            	
            } else { //登录失败
				return json(['status'=>0,'message'=>'此账号不存在或被冻结！']);
            }
		}

		return view();

	}

	//注册
	public function reg()
	{
		if(Request()->isPost())
		{
			$data=input('post.');

			
			if(cookie('phone_yzm')!=$data['yzm'])
			{
				 return json(['status'=>0,'message'=>'验证码错误']);
			}
		
			//是否已经注册
			$ha=db('user')->where('name',$data['phone'])->where('identity',1)->select();

			if($ha)
			{
				return json(['status'=>0,'message'=>'手机号已注册']);
			}else{
				$tt=['name'=>$data['phone'],'pwd'=>md5($data['password']),'user_name'=>$data['phone'],'type'=>1,'status'=>1,'img'=>'/public/index/user/user_img.png','add_time'=>time()];

				$e=db('user')->insertGetId($tt);
				if($e>0)
				{
					$auth = array(
						'id'              => $e,
						'name'        => $data['phone'],
						'user_name'       =>$data['phone'],
						'user_img'       =>'/public/index/user/user_img.png',
						'last_time' => time(),
					);
					session('user_auth', $auth);
					return json(['status'=>1,'message'=>'注册成功']);
				}else{
					return json(['status'=>0,'message'=>'注册失败']);
				}
			}
		}

		return view();
	}

	//手机验证码
	public function reg_yzm()
	{
		return json(send_sms(input('phone')));
	}
}
