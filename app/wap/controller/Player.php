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

class Player extends Controller
{
	
	//报名页面
    public function index()
    {
		//判断报名状态
		$session_user_id=0;

		if(input('session.m_user_auth.id'))
			$session_user_id=input('session.m_user_auth.id');

		if(request()->isPost())
		{
			$data=input('post.');
		
			//是否已报名?
			$str1='user_id='.$session_user_id." and type=".$data['type_id'];
			if($data['maxid']){
				$str1.=" and maxid=".$data['maxid'];
			}
			if($data['minid']){
				$str1.=" and minid=".$data['minid'];
			}
			$obj=db('player')->where($str1)->find();

			if($obj)
			{
				$str2='您已报名：'.db('type')->where('id',$data['type_id'])->value('name').' ';
				if($data['maxid']){
					$str2.=db('type')->where('id',$data['maxid'])->value('name').' ';
				}
				if($data['minid']){
					$str2.=db('type')->where('id',$data['minid'])->value('name').' ';
				}
				$str2.='大赛,无法重复提交';
				$this->error($str2);
			}
			
			$tt=['pid'=>$data['pid'],'pname'=>db('reg')->where('id',$data['pid'])->value('name'),'user_name'=>$data['user_name'],'user_euname'=>pinyin($data['user_name']),'user_age'=>$data['user_age'],'user_sex'=>$data['user_sex'],'race'=>$data['race'],'user_birth'=> strtotime($data['user_birth']),'site'=>$data['site'],'postcode'=>$data['postcode'],'tel'=>$data['tel'],'unit'=>$data['unit'],'type'=>$data['type_id'],'type_name'=>db('type')->where('id',$data['type_id'])->value('name'),'esc'=>$data['esc'],'intro'=>$data['intro'],'teacher'=>$data['teacher'],'wname'=>$data['wname'],'rec'=>$data['rec'],'rectel'=>$data['rectel'],'back_4'=>$data['tp'],'add_time'=>time()];

			if($data['maxid']){

				$tt['maxid']=$data['maxid'];
				$tt['maxname']=db('type')->where('id',$data['maxid'])->value('name');
			}else{
				$tt['maxid']=0;
				$tt['maxname']='';
			}

			if($data['minid']){

				$tt['minid']=$data['minid'];
				$tt['minname']=db('type')->where('id',$data['minid'])->value('name');
			}else{
				$tt['minid']=0;
				$tt['minname']='';
			}

			if($data['so_open']=="是"){
				$tt['so_open']=1;
			}else{
				$tt['so_open']=0;
			}

			//学校
			if($data['tp']=='1'){
				if($data['sid']=="0")
				{
					$tt['sid']=$data['sid'];
					$tt['sname']=$data['school_name'];
				}else{
					$school=db('school')->where('id',$data['sid'])->find();

					$tt['cid']=$school['cid'];
					$tt['cname']=$school['cname'];

					$tt['sid']=$data['sid'];
					$tt['sname']=$school['name'];
				}
			}else{
				if($data['ssid']=="0")
				{
					$tt['ssid']=0;
					$tt['ssname']=$data['unit'];

				}else{
					$ss_info=db('community')->where('id',$data['ssid'])->find();

					$tt['ssid']=$ss_info['id'];
					$tt['ssname']=$ss_info['name'];
					$tt['unit']=$ss_info['name'];
				}
			
			}

			//用户信息
			if(input('session.m_user_auth.id'))
			{
				$tt['user_id']=input('session.m_user_auth.id');

			}else{
				//手机号是否已注册
				$ha=db('user')->where('name',$data['tel'])->where('identity',1)->select();
				if($ha)
				{
					$this->error('手机号码已注册,请先登录');
				}
				//发送密码至手机
				$sed_e=send_sms_player($data['tel']);
				if($sed_e['status'] == 0) {
							$this->error(data.message);
				}

				//注册一个新账号
				$e=db('user')->insertGetId(['name'=>$data['tel'],'pwd'=>md5(cookie('phone_yzm_plater')),'user_name'=>$data['user_name'],'user_age'=>$data['user_age'],'user_sex'=>$data['user_sex'],'race'=>$data['race'],'pid'=>$data['pid'],'pname'=>db('reg')->where('id',$data['pid'])->value('name'),'tel'=>$data['tel'],'img'=>'/public/index/user/user_img.png','add_time'=>time(),'status'=>1]);

				if($e>0)
				{
					$tt['user_id']=$e;
				}else{
					$this->error('手机号码错误,请重新输入或使用已有账号登陆报名');
				}
				
			}

			$img = request()->file('img');
			if($img!=''){
				 $info = $img->rule('date')->move(ROOT_PATH . 'public'.DS.'uploads'.DS.'player');
				 if($info){
						$tt['img']='/public/uploads/player/'.$info->getSavename(); 
				 }else{
						$tt['img']='/public/admin/image/timg.jpg';
				 }
			 }else{
						$tt['img']='/public/admin/image/timg.jpg';
			}

			//身份证正面照
			$img_2 = request()->file('idcard_img');

			if($img_2!=''){
				 $info = $img_2->validate(['ext'=>'jpg,png,jpeg,rar,zip'])->rule('date')->move(ROOT_PATH . 'public'.DS.'uploads'.DS.'player'.DS.'rar');
				 if($info){
						$tt['user_idcard_img']='/public/uploads/player/rar/'.$info->getSavename(); 
				 }else{
						$this->error($img_2->getError());
				 }
			 }else{
						$tt['user_idcard_img']='/public/admin/image/timg.jpg';
			}

			$e=db('player')->insert($tt);
			if($e>0)
			{
				//发送通知
				$ttm=['title'=>"您已成功提交报名信息，请等待管理员审核",'content'=>"您已成功提交报名信息，请等待管理员审核",'add_time'=>time(),'add_id'=>0,'add_name'=>'系统通知'];


				if(input('session.m_user_auth.id'))
				{
					$ttm['user_id']=input('session.m_user_auth.id');
					$ttm['user_name']=input('session.m_user_auth.name');
				}else{
					$ttm['user_id']=$tt['user_id'];
					$ttm['user_name']=$data['tel'];
				}

				//发送通知至手机
				$sed_e=send_sms_player_2($data['tel']);
				if($sed_e['status'] == 0) {
						$this->error('报名成功！短信'.$sed_e['message']);
				}

				db('message')->insert($ttm);

				$this->success('提交成功','index/index');
			}else{
				$this->error('提交失败');
			}

		}

		//用户信息
		//$obj=db('user')->where('id',input('session.m_user_auth.id'))->find();
		//$this->assign('obj',$obj);

		//地区信息
		$plist=db('reg')->where('pid',null)->where('status',1)->order('back_2')->field('id as value,name as text')->select();
		$this->assign('plist',json_encode($plist));

		//参赛分类
		$tlist=db('type')->where('pid',null)->where('status',1)->order('back_2')->field('id as value,name as text')->select();
		
		if(!$tlist)
		{
			$this->error('大赛报名已截止！');
		}
		
		$this->assign('tlist',json_encode($tlist));

        return view();

    }

	//查询子分类
	public function gettp()
	{
		$list=db('type')->where('pid',input('post.pid'))->where('status',1)->order('back_2')->field('id as value,name as text')->select();

		return ['ls'=>$list];
	}

	//查询区级信息
	public function getregc()
	{
		$list=db('reg')->where('pid',input('post.pid'))->where('status',1)->order('back_2')->field('id as value,name as text')->select();
		return ['ls'=>$list];

	}

	//查询学校信息
	public function getshool()
	{
		$list=db('school')->where('cid',input('post.cid'))->field('id as value,name as text')->select();
		return ['ls'=>$list];
	}

	public function getshool_p()
	{
		$list=db('school')->where('pid',input('post.pid'))->field('id as value,name as text')->select();
		return ['ls'=>$list];
	}

	public function getss_p()
	{
		$list=db('community')->where('pid',input('post.pid'))->field('id as value,name as text')->select();
		return ['ls'=>$list];
	}

	
	
}
