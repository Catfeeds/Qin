<?php
// +----------------------------------------------------------------------
// | ThinkTM  [ DO WHAT YOU THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2017 All Rights Reserved.
// +----------------------------------------------------------------------
// | Author: 云飞狼舞/不知鱼
// +----------------------------------------------------------------------


namespace app\wap\controller;
use think\Controller;
use think\Request;

class Login extends Controller
{
	/**
     * 用户登录
     */
    public function index($username = null, $password = null){
        if(Request::instance()->isPost()){
			//$this->check(input('code'));
			$adm=db('user')->where('name',$username)->where('status',1)->where('identity',1)->find();
            if($adm){ //登录成功
				if(md5($password) == $adm['pwd']){
					/* 记录登录SESSION和COOKIES */
					$tt=['last_time'=>time(),'login'=>$adm['login']+1,'ip'=>\think\Request::instance()->ip()];
					db('user')->where('id',$adm['id'])->update($tt);

					//积分+1
					int_number($adm['id'],1);

					$auth = array(
						'id'              => $adm['id'],
						'name'        => $adm['name'],
						'user_name'       =>$adm['user_name'],
						'user_img'       =>$adm['img'],
						'last_time' => time(),
					);
					session('m_user_auth', $auth);
					session('m_user_auth_sign',data_auth_sign($auth));
					return json(['status'=>1,'message'=>'登录成功！']);
				}else{
					return json(['status'=>0,'message'=>'密码错误！']);
				}
            	
            } else { //登录失败
                return json(['status'=>0,'message'=>'此账号不存在或被冻结！']);
            }
			
        } else {
            if(is_login()){
                $this->redirect('index/index');
            }else{
                return $this->fetch();
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
        if(is_login()){
            session(null);// 销毁session
        }
		return json(['status'=>1,'message'=>'成功退出！']);
		
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
					session('m_user_auth', $auth);
					session('m_user_auth_sign',data_auth_sign($auth));
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


	//微信绑定账户
	public function wx_login()
	{
		if(Request::instance()->isPost()){
			//绑定账号
			$zh=db('user')->where('name',input('post.username'))->where('pwd',md5(input('post.password')))->where('identity',1)->find();
			if($zh)
			{
				if(session('openid'))
				{
					$tt=['openid'=>session('openid'),'last_time'=>time(),'login'=>$zh['login']+1,'ip'=>\think\Request::instance()->ip()];
					db('user')->where('id',$zh['id'])->update($tt);
					$auth = array(
							'id'              => $zh['id'],
							'name'        => $zh['name'],
							'user_name'       =>$zh['user_name'],
							'user_img'       =>$zh['img'],
							'last_time' => time(),
						);
					session('m_user_auth', $auth);
					session('m_user_auth_sign',data_auth_sign($auth));
					return json(['status'=>1,'message'=>'绑定成功！']);
				}else{
					return json(['status'=>0,'message'=>'绑定失败！']);
				}
			}else{
				return json(['status'=>0,'message'=>'此账号不存在或被冻结！']);
			}
			
        }
		return view();
	}

	//微信注册账户
	public function wx_reg()
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
				if(session('openid'))
				{
					$tt=['name'=>$data['phone'],'pwd'=>md5($data['password']),'user_name'=>$data['phone'],'type'=>1,'status'=>1,'img'=>'/public/index/user/user_img.png','add_time'=>time(),'openid'=>session('openid')];

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
						session('m_user_auth', $auth);
						session('m_user_auth_sign',data_auth_sign($auth));
						return json(['status'=>1,'message'=>'注册成功']);
					}else{
						return json(['status'=>0,'message'=>'注册失败']);
					}
				}else{
					return json(['status'=>0,'message'=>'绑定失败！']);
				}
			}
		}
		return view();
	}
}
