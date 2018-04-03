<?php
namespace app\index\controller;
use think\Request;
use \think\Url;

class Player extends App 
{
	//初始化
	protected $beforeActionList = [
        'left'
    ];

	//报名页面
    public function index()
    {
		//判断报名状态
		$session_user_id=0;

		if(input('session.user_auth.id'))
			$session_user_id=input('session.user_auth.id');

		

		if(request()->isPost())
		{
			$data=input('post.');
			//参赛编号:num,市级:pid,市级名称:pname,区级:cid,区级名称:cname,用户:user_id,用户姓名:user_name,姓名拼音:user_cuname,照片:img,年龄:user_age,性别:user_sex,民族:race,出身日期:user_birth,通讯地址:site,邮政编码:postcode,联系电话:tel,学校:sid,学校名称:sname,工作单位或学校院系:unit,大赛:type,类型名称:type_name,参赛二级:maxid,二级名称:maxname,三级分类:minid,三级名称:minname,参赛人数及名称:esc,作品简介:intro,指导老师:teacher,作品名称:wname,推荐单位:rec,推荐单位联系人及电话:rectel,报名时间:add_time,status

			//作品:wid-----上传作品关联
			
			//内容
			$dx_txt="";

			//是否已报名?
			$str1='user_id='.$session_user_id." and type=".$data['type'];
			if($data['maxid']){
				$str1.=" and maxid=".$data['maxid'];
			}
			if($data['minid']){
				$str1.=" and minid=".$data['minid'];
			}
			$obj=db('player')->where($str1)->find();

			if($obj)
			{
				$str2='您已报名：'.db('type')->where('id',$data['type'])->value('name').' ';
				if($data['maxid']){
					$str2.=db('type')->where('id',$data['maxid'])->value('name').' ';
				}
				if($data['minid']){
					$str2.=db('type')->where('id',$data['minid'])->value('name').' ';
				}
				$str2.='大赛,无法重复提交';
				$this->error($str2);
			}
			
			$tt=['pid'=>$data['pid'],'pname'=>db('reg')->where('id',$data['pid'])->value('name'),'user_name'=>$data['user_name'],'user_euname'=>pinyin($data['user_name']),'user_age'=>$data['user_age'],'user_sex'=>$data['user_sex'],'race'=>$data['race'],'user_birth'=>strtotime($data['user_birth']),'site'=>$data['site'],'postcode'=>$data['postcode'],'tel'=>$data['tel'],'unit'=>$data['unit'],'type'=>$data['type'],'type_name'=>db('type')->where('id',$data['type'])->value('name'),'esc'=>$data['esc'],'intro'=>$data['intro'],'teacher'=>$data['teacher'],'wname'=>$data['wname'],'rec'=>$data['rec'],'rectel'=>$data['rectel'],'so_open'=>$data['so_open'],'back_4'=>$data['tp'],'add_time'=>time()];

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
			if(input('session.user_auth.id'))
			{
				$tt['user_id']=input('session.user_auth.id');
			}else{
				//手机号是否已注册
				$ha=db('user')->where('name',$data['tel'])->where('identity',1)->select();
				if($ha)
				{
					$this->error('手机号码已注册,请先登录');
				}
				
				try{
					//发送密码至手机
					$sed_e=send_sms_player($data['tel']);
					if($sed_e['status'] == 0) {
								$this->error($sed_e['message']);
					}
				}
				catch(Exception $e)
				{
					$dx_txt="帐号初始密码发送失败，请联系客服修改！";
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
				 $info = $img->validate(['size'=>4194304,'ext'=>'jpg,png,jpeg'])->rule('date')->move(ROOT_PATH . 'public'.DS.'uploads'.DS.'player');
				 if($info){
						$tt['img']='/public/uploads/player/'.$info->getSavename(); 
				 }else{
						$this->error($img->getError());
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

				if(input('session.user_auth.id'))
				{
					$ttm['user_id']=input('session.user_auth.id');
					$ttm['user_name']=input('session.user_auth.name');
				}else{
					$ttm['user_id']=$tt['user_id'];
					$ttm['user_name']=$data['tel'];
				}

				db('message')->insert($ttm);
				
				try{
				
					//发送通知至手机
					$sed_e=send_sms_player_2($data['tel']);
					if($sed_e['status'] == 0) {
							$this->error($sed_e['message']);
					}
				
				}
				catch(Exception $e)
				{
					$this->success('报名提交成功，短信发送失败!'.$dx_txt,'index/index');
				}
				
				$this->success('提交成功!'.$dx_txt,'index/index');
			}else{
				$this->error('提交失败!');
			}

		}

		//用户信息
		//$obj=db('user')->where('id',input('session.user_auth.id'))->find();
		//$this->assign('obj',$obj);

		//地区信息
		$plist=db('reg')->where('pid',null)->where('status',1)->order('back_2')->select();
		$this->assign('plist',$plist);

		//参赛分类
		$tlist=db('type')->where('pid',null)->where('status',1)->order('back_2')->select();
		$this->assign('tlist',$tlist);
		
		
		if(input('session.admin_auth.id')==11)
		{
			//参赛分类
			$tlist=db('type')->where('pid',null)->order('back_2')->select();
			$this->assign('tlist',$tlist);
		}

		

		//二级分类
		if(input('type_id'))
		{
			$list=db('type')->where('pid',input('type_id'))->where('status',1)->order('back_2')->select();
			
			if(input('session.admin_auth.id')==11)
			{
				$list=db('type')->where('pid',input('type_id'))->order('back_2')->select();
			}
			
			if($list)
				$this->assign('ls',$list);
			else
				$this->assign('ls',0);

			$this->assign('type_id',input('type_id'));
			$this->assign('type_name',db('type')->where('id',input('type_id'))->value('name'));
			
		}
		else
		{
			$this->error('请选择大赛类别','player/index_type');
			
		}

        return view();

    }

	//查询区级信息
	public function getregc()
	{
		$list=db('reg')->where('pid',input('post.pid'))->where('status',1)->order('back_2')->select();
		return ['ls'=>$list];

	}

	//查询学校信息
	public function getshool()
	{
		$list=db('school')->where('cid',input('post.cid'))->select();
		return ['ls'=>$list];
	}

	//查询学校信息
	public function getshool_p()
	{
		$list=db('school')->where('pid',input('post.pid'))->select();
		return ['ls'=>$list];
	}

	//查询社区信息
	public function getss_p()
	{
		$list=db('community')->where('pid',input('post.pid'))->select();
		return ['ls'=>$list];
	}

	//查询子分类
	public function gettp()
	{
		
		$w_txt="status=1";
		
		if(input('session.admin_auth.id')==11)
		{
			$w_txt="1=1";
		}
		
		$list=db('type')->where('pid',input('post.pid'))->where($w_txt)->order('back_2')->select();

		return ['ls'=>$list];
	}

	//左侧列表信息
	public function left()
	{
		//左侧列表---学校人数排行
		$list_school_user=db('user') ->field('sid,sname,count(id) as ct')
								->group('sid')
								->where('status',1)
								->limit(15)
								->order('ct desc')
								->select();
		$this->assign('list_school_user',$list_school_user);
		//左侧列表---地区人数排行
		$list_reg_user=db('user') ->field('pid,pname,count(id) as ct')
								->group('pid')
								->where('status',1)
								->limit(15)
								->order('ct desc')
								->select();
		$this->assign('list_reg_user',$list_reg_user);
		
		//左侧列表---热门选手排行
		//$list_news_look=db('news')->where('status',1)->order('look desc')->limit(15)->select();
		//$this->assign('list_news_look',$list_news_look);

		$list_player_back_3=db('player')->field('user_id as id,user_name,back_3')
					  ->where('status=1 and back_2!=2 and so_open=1')
					  ->order('back_3 desc')->paginate(15);
		$this->assign('list_player_back_3',$list_player_back_3);

	}


	//选择报名分类
	public function index_type()
	{

		//参赛分类
		$tlist=db('type')->where('pid',null)->where('status',1)->order('back_2')->select();
		$this->assign('tlist',$tlist);
		
		if(input('session.admin_auth.id')==11)
		{
			//参赛分类
		$tlist=db('type')->where('pid',null)->order('back_2')->select();
		$this->assign('tlist',$tlist);
		}

		return view();
	}

	//获取二维码
	public function get_img()
	{
		//获取秘钥
		$token=get_token();
		//随机数
		$code = '';
		$charset = '1234567890';
		$_len = strlen($charset) - 1;
		for ($i = 0;$i < 8;++$i) {
			$code .= $charset[mt_rand(0, $_len)];
		}
		$param=$code;

		$url = "https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token=$token";
		$data=json_encode(["expire_seconds"=>600, "action_name"=>"QR_SCENE", "action_info"=>["scene"=>["scene_id"=> $param]]]);

		$curl = curl_init();
		curl_setopt($curl,CURLOPT_URL,$url);  //地址
		curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0); //检查认证来源
		curl_setopt($curl,CURLOPT_USERAGENT,$_SERVER['HTTP_USER_AGENT']); //模拟使用用户浏览器
		curl_setopt($curl,CURLOPT_AUTOREFERER,1); //自动跳转
		curl_setopt($curl, CURLOPT_TIMEOUT, 30);//超时限制防止死循环
		curl_setopt($curl,CURLOPT_HEADER,0); //显示header区域内容
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1 );  //以文件流返回结果
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		$res = curl_exec($curl);
		if(curl_error($curl)){
			echo 'Errno'.curl_error($curl);
		}
		curl_close($curl);
		$json_obj = json_decode($res,true);

		$url2="https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=".UrlEncode($json_obj['ticket']);

		return ['sjs'=>$param,'imgurl'=>$url2];
	}


	//查询是否已关注
	public function wx_val()
	{
		if(db('eventkey')->where('key',input('post.is_sjs'))->find())
		{
			return ['code'=>1];
		}else{
			return ['code'=>0];
		}		

		
	}
}