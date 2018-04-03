<?php
namespace app\wap\controller;
use think\Controller;
use think\Request;
use think\Db;

class Index extends Controller
{
    public function index()
    {
		//推荐资讯查询
		$list_news=db('news')->where('back_1',1)->where('status',1)->order('id desc')->limit(5)->select();
		$this->assign('list_news',$list_news);
		
		//查询推荐学校
		$mmp="a.status=1";

		$list_school=db('school')->alias('a')
								->join('ysj_user b ','b.sid=a.id','LEFT')
								->field('a.id,a.name,a.img,count(b.id) as ct')
								->where($mmp)
								->group('a.id')
								->order('ct desc')
								->limit(8)->select();

		$this->assign('list_school',$list_school);
		
		
		//推荐校园资讯查询
		$list_activity=db('activity')->where('status',1)->order('id desc')->limit(5)->select();
		$this->assign('list_activity',$list_activity);
		
		return $this->fetch();
	}
	
	
	public function user()
	{
		//用户信息
		$obj=null;
		if(input('user_id'))
		{
			$obj=db('user')->where('id',input('user_id'))->where('status',1)->find();
			//$this->assign('obj',$obj);

			if(input('session.m_user_auth.id')==input('user_id'))
			{
				$this->assign('Cndy',1);
			}else{
				$this->assign('Cndy',0);
			}
		}
		else if(input('session.m_user_auth.id'))
		{
			$obj=db('user')->where('id',input('session.m_user_auth.id'))->find();
			//$this->assign('obj',$obj);
			$this->assign('Cndy',1);
		}

		if($obj==null){
			$this->error('请求错误');
		}

		$this->assign('obj',$obj);

		$plist=db('player')->where('user_id',$obj['id'])->where('status=1 and back_2!=2 and so_open=1')->order('back_2 desc')->select();
		$this->assign('plist',$plist);


		//相册图片
		$list_img=db('hpoto')->where('user_id',$obj['id'])->where('status',1)->order('id desc')->limit(4)->select();
		$this->assign('list_img',$list_img);
		//dump($list_img);

		//动态
		$list_article=db('article')->where('user_id',$obj['id'])->where('status',1)->order('id desc')->select();

		$list_article_json=array();
		$json_i=0;
		foreach($list_article as $k=>$v)
		{
			$match = array();
			$pattern="/<img.+src=\"?(.+\.(jpg|jpeg|png))\"?.+>/i";
			preg_match_all($pattern,$v['content'],$match);
			if($match[1]!=null&&$json_i<4)
			{
				$list_article_json[$json_i]['json_img']=$match[1][0];
				$json_i.=1;
			}
		}
	
		$this->assign('list_article_json',$list_article_json);


		//留言列表
		$list_gb=db('guestbook')->where('wid',$obj['id'])->where('status',1)->order('add_time desc')->paginate(10);

		$list_gb_json=json_decode(json_encode($list_gb),true)['data'];

		$iii=1;
		foreach($list_gb_json as $k=>$v)
		{
			$uobj=db('user')->where('id',$v['user_id'])->find();
			if($uobj)
			{
				$pcs="未公开";
				if($uobj['pname']!="")
				{
					$pcs=$uobj['pname'];
				}

				if($uobj['sname']!="")
				{
					$pcs.='/'.$uobj['sname'];
				}

				$list_gb_json[$k]['dizhi']=$pcs;
			}
			else
			{
				$list_gb_json[$k]['dizhi']="未公开";
			}
			
		}

		$this->assign('list_gb_json',$list_gb_json);
		$this->assign('list_gb',$list_gb);
		
		if(input('param.is_ajax')){
			return $this->fetch('ajax_user_list');
			exit;
		}
		
		//记录来访
		if(input('session.m_user_auth.id'))
		{
			$this->record_add(1,$obj['id'],$obj['name'],'','','','');
			//用户人气+1
			if(!session("user_look".input('user_id')."u".input('session.m_user_auth.id'))==input('session.m_user_auth.id'))
			{
				db('user')->where('id',input('user_id'))->setInc('look');
				session("user_look".input('user_id')."u".input('session.m_user_auth.id'),input('session.m_user_auth.id'));
			}
		}

		return $this->fetch();
	}

	public function user_art_list()
	{
		//用户信息
		$obj=null;
		if(input('user_id'))
		{
			$obj=db('user')->where('id',input('user_id'))->where('status',1)->find();
			//$this->assign('obj',$obj);

			if(input('session.m_user_auth.id')==input('user_id'))
			{
				$this->assign('Cndy',1);
			}else{
				$this->assign('Cndy',0);
			}
		}
		else if(input('session.m_user_auth.id'))
		{
			$obj=db('user')->where('id',input('session.m_user_auth.id'))->find();
			//$this->assign('obj',$obj);
			$this->assign('Cndy',1);
		}

		if($obj==null){
			$this->error('请求错误');
		}

		$this->assign('obj',$obj);

		$plist=db('player')->where('user_id',$obj['id'])->where('status=1 and back_2!=2 and so_open=1')->order('back_2 desc')->select();
		$this->assign('plist',$plist);

		//动态列表
		$list_article=db('article')->where('user_id',input('user_id'))->where('status',1)->order('id desc')->paginate(6);

		$list_article_json=json_decode(json_encode($list_article),true)['data'];

		foreach($list_article_json as $k=>$v)
		{
			$match = array();
			$pattern="/<img.+src=\"?(.+\.(jpg|jpeg|png))\"?.+>/i";
			preg_match_all($pattern,$v['content'],$match);
			if($match[1]!=null)
				$list_article_json[$k]['json_img']=$match[1][0];
			else
				$list_article_json[$k]['json_img']="/";
		}
		
		$this->assign('list_article_json',$list_article_json);

		$this->assign('list_article',$list_article);
		
		if(input('param.is_ajax')){
			return $this->fetch('ajax_user_art_list');
			exit;
		}

		return $this->fetch();
	}

	public function user_art_info()
	{
		//用户信息
		$obj=null;
		if(input('user_id'))
		{
			$obj=db('user')->where('id',input('user_id'))->where('status',1)->find();
			//$this->assign('obj',$obj);

			if(input('session.m_user_auth.id')==input('user_id'))
			{
				$this->assign('Cndy',1);
			}else{
				$this->assign('Cndy',0);
			}
		}
		else if(input('session.m_user_auth.id'))
		{
			$obj=db('user')->where('id',input('session.m_user_auth.id'))->find();
			//$this->assign('obj',$obj);
			$this->assign('Cndy',1);
		}

		if($obj==null){
			$this->error('请求错误');
		}

		$this->assign('obj',$obj);

		$plist=db('player')->where('user_id',$obj['id'])->where('status=1 and back_2!=2 and so_open=1')->order('back_2 desc')->select();
		$this->assign('plist',$plist);

		//动态
		$art_obj=db('article')->where('id',input('art_id'))->where('status',1)->find();

		$this->assign('art_obj',$art_obj);

		//动态评论
		$list_com=db('comments')->where('nid',input('art_id'))->where('status',1)->order('id desc')->paginate(8);
		$list_com_json=json_decode(json_encode($list_com),true)['data'];
		if($list_com_json){
			foreach($list_com_json as $k=>$v)
			{
				//查询评论被点赞
				$dz=db('praise')->where('user_id',input('session.user_auth.id'))->where('wid',$v['id'])->find();
				if($dz)
				{
					$list_com_json[$k]['dz']=1;
				}
				else
				{
					$list_com_json[$k]['dz']=0;
				}

				//评论者头像,名称
				$ub=db('user')->where('id',$v['user_id'])->where('status',1)->find();
				if($ub)
				{
					if($ub['user_name']!="")
					{
						$list_com_json[$k]['user_img']=$ub['img'];
						$list_com_json[$k]['user_name']=$ub['user_name'];
					}else{
						$list_com_json[$k]['user_img']='/public/static/images/avatar/default.png';
						$list_com_json[$k]['user_name']='匿名';
					}
				}
				
			}
		}

		$this->assign('list_com',$list_com);
		
		$this->assign('list_com_json',$list_com_json);

		if(input('param.is_ajax')){
			return $this->fetch('ajax_user_art_info');
			exit;
		}

		return $this->fetch();
	}



	public function user_gb_list()
	{
		//用户信息
		$obj=null;
		if(input('user_id'))
		{
			$obj=db('user')->where('id',input('user_id'))->where('status',1)->find();
			//$this->assign('obj',$obj);

			if(input('session.m_user_auth.id')==input('user_id'))
			{
				$this->assign('Cndy',1);
			}else{
				$this->assign('Cndy',0);
			}
		}
		else if(input('session.m_user_auth.id'))
		{
			$obj=db('user')->where('id',input('session.m_user_auth.id'))->find();
			//$this->assign('obj',$obj);
			$this->assign('Cndy',1);
		}

		if($obj==null){
			$this->error('请求错误');
		}

		$this->assign('obj',$obj);

		$plist=db('player')->where('user_id',$obj['id'])->where('status=1 and back_2!=2 and so_open=1')->order('back_2 desc')->select();
		$this->assign('plist',$plist);

		//留言列表
		$list_gb=db('guestbook')->where('wid',$obj['id'])->where('status',1)->order('add_time desc')->paginate(10);

		$list_gb_json=json_decode(json_encode($list_gb),true)['data'];

		$iii=1;
		foreach($list_gb_json as $k=>$v)
		{
			$uobj=db('user')->where('id',$v['user_id'])->find();
			if($uobj)
			{
				$pcs="未公开";
				if($uobj['pname']!="")
				{
					$pcs=$uobj['pname'];
				}

				if($uobj['sname']!="")
				{
					$pcs.='/'.$uobj['sname'];
				}

				$list_gb_json[$k]['dizhi']=$pcs;
			}
			else
			{
				$list_gb_json[$k]['dizhi']="未公开";
			}
			
		}

		$this->assign('list_gb_json',$list_gb_json);
		$this->assign('list_gb',$list_gb);
		
		if(input('param.is_ajax')){
			return $this->fetch('ajax_user_gb_list');
			exit;
		}

		return $this->fetch();
	}

	public function user_photo_list()
	{
		//用户信息
		$obj=null;
		if(input('user_id'))
		{
			$obj=db('user')->where('id',input('user_id'))->where('status',1)->find();
			//$this->assign('obj',$obj);

			if(input('session.m_user_auth.id')==input('user_id'))
			{
				$this->assign('Cndy',1);
			}else{
				$this->assign('Cndy',0);
			}
		}
		else if(input('session.m_user_auth.id'))
		{
			$obj=db('user')->where('id',input('session.m_user_auth.id'))->find();
			//$this->assign('obj',$obj);
			$this->assign('Cndy',1);
		}

		if($obj==null){
			$this->error('请求错误');
		}

		$this->assign('obj',$obj);

		$plist=db('player')->where('user_id',$obj['id'])->where('status=1 and back_2!=2 and so_open=1')->order('back_2 desc')->select();
		$this->assign('plist',$plist);

		//图片列表

		$list_hpoto=db('hpoto')->where('user_id',input('user_id'))->where('status',1)->order('id desc')->paginate(6);

		$this->assign('list_hpoto',$list_hpoto);
		
		if(input('param.is_ajax')){
			return $this->fetch('ajax_user_photo_list');
			exit;
		}

		return $this->fetch();
	}



	//用户投票
	public function vote()
	{
		$data=input('post.');
		//是否登录
		if(!input('session.m_user_auth.id'))
		{
			//$this->error('请先登录!');
			return json(['status'=>0,'message'=>'请先登录']);
		}
		
		//判断投票用户是否已经投票

		$ue=db('vote')->where('wid',$data['uid'])->where('user_id',input('session.m_user_auth.id'))->find();

		if($ue)
		{
			//$this->error('无法重复投票!');
			return json(['status'=>0,'message'=>'无法重复投票']);
		}
		
		
		//获取目标用户的报名信息
		$player=db('player')->where('user_id',$data['uid'])->find();

		//判断该用户信息的比赛状态
		if($player['status']!=1)
		{
			//$this->error('该用户报名信息已过期或未通过审核!');
			return json(['status'=>0,'message'=>'该用户报名信息暂未通过审核']);
		}
		else if($player['back_2']==2)
		{
			return json(['status'=>0,'message'=>'该用户报名信息已过期']);
		
		}else{
			$e=db('player')->where('user_id',$data['uid'])->setInc('back_3');
			if($e>0)
			{				
				$this->record_add(8,$data['uid'],db('user')->where('id',$data['uid'])->value('name'),input('session.m_user_auth.id'),input('session.m_user_auth.name'),'','');
				
				$tttt=['wid'=>$data['uid'],'wname'=>db('user')->where('id',$data['uid'])->value('name'),'user_id'=>input('session.m_user_auth.id'),'user_name'=>input('session.m_user_auth.name'),'add_time'=>time(),'ip'=>Request::instance()->ip()];
				db('vote')->insert($tttt);

				return json(['status'=>1,'message'=>'支持成功']);
			}else{
				return json(['status'=>0,'message'=>'操作失败']);
			}
		}
	}
	
	public function guestbook()
	{
		if(!input('session.m_user_auth.id'))
		{
			$this->error('请先登录!');
		}

		$userid = input('param.user_id');
		$this->assign('userid',$userid);
		return $this->fetch();
	}

	//留言
	public function user_art_gb()
	{
		//留言内容：content，被留言用户user_id
		
		//是否登录
		if(!input('session.m_user_auth.id'))
		{
			$this->error('请先登录!');
		}

		$data=input('post.');

		if($data['content']=='')
		{
			$this->error('评论内容不能为空!');
		}


		$tt=['user_id'=>input('session.m_user_auth.id'),'user_name'=>input('session.m_user_auth.user_name'),'user_img'=>input('session.m_user_auth.user_img'),'content'=>$data['content'],'wid'=>$data['uid'],'wname'=>db('user')->where('id',$data['uid'])->value('name'),'add_time'=>time(),'status'=>1];

		$e=db('guestbook')->insertGetId($tt);

		if($e>0){
			//用户留言+1
			db('user')->where('id',$data['uid'])->setInc('gb_number');

			//留言成功，添加记录
			$this->record_add(4,$data['uid'],db('user')->where('id',$data['uid'])->value('name'),'','',$data['content'],$e);

			$this->success('提交成功!');
		}else{
			$this->error('提交失败!');
		}

	}

	public function user_art_rep()
	{
		if(!input('session.m_user_auth.id'))
		{
			$this->error('请先登录!');
		}
		$this->assign('artid',input('param.art_id'));
		$this->assign('userid',input('param.user_id'));

		return $this->fetch();
	}

	public function art_rep_add()
	{
		$data=input('post.');

		$obj=db('article')->where('id',$data['art_id'])->find();

		$tt=['wid'=>$obj['user_id'],'wname'=>$obj['user_name'],'gb_id'=>$obj['id'],'gb_content'=>"http://www.qnysj.com/index/user/art_info/art_id/".$obj['user_id'].".html?user_id=".$obj['id'],'report'=>$data['content'],'type'=>2,'add_time'=>time()];

		if(input('session.m_user_auth.id'))
		{
			$tt['user_id']=input('session.m_user_auth.id');
			$tt['user_name']=input('session.m_user_auth.name');
		}else{
			
			$tt['user_name']='匿名';
		}

		$cf=db('report')->where('wid','eq',$obj['user_id'])->where('gb_id','eq',$obj['id'])->where('gb_id','eq',$obj['id'])->find();
		if($cf)
		{
			return ['msg'=>'举报成功!'];

		}else{

			$e=db('report')->insert($tt);
			if($e>0)
			{
				return ['msg'=>'举报成功!'];
			}else{
				return ['msg'=>'提交失败!'];
			}
		}
	}

	public function user_art_zf()
	{
		if(!input('session.m_user_auth.id'))
		{
			$this->error('请先登录!');
		}

		//是否为学校管理者
		$module_user=db('school')->where('adm_id',input('session.m_user_auth.id'))->where('status',1)->find();
		if($module_user)
		{
			$this->assign('um',1);
		}else{	
			$this->assign('um',0);
		}

		$this->assign('artid',input('param.art_id'));
		$this->assign('userid',input('param.user_id'));

		return $this->fetch();
	}

	//转发动态
	public function art_zf_add()
	{
		$data=input('post.');
		$obj=db('article')->where('id',$data['art_id'])->find();
		$cf=0;

		if($data['type']==1)
		{
			$cf=$this->art_zf_add_art($obj,$data);
		}else if($data['type']==2){
			$cf=$this->art_zf_add_module($obj,$data);
		}else{
			$cf.=$this->art_zf_add_art($obj,$data);
			$cf.=$this->art_zf_add_module($obj,$data);
		}
		
		if($cf>0)
		{
			return ['msg'=>'转发成功!'];

		}else{
			return ['msg'=>'操作失败!'];
		}

	}

	//转发个人动态
	public function art_zf_add_art($obj,$data)
	{
		$tt=['esc'=>$data['content'].$obj['esc'],'content'=>$data['content'].$obj['content'],'user_id'=>input('session.m_user_auth.id'),'user_name'=>input('session.m_user_auth.user_name'),'back_1'=>1,'back_2'=>"http://www.qnysj.com/index/user/art_info/user_id/".$obj['user_id'].".html?art_id=".$obj['id'],'status'=>1,'add_time'=>time()];
		
		$cf=db('article')->insert($tt);
		if($cf>0)
		{
			//原文转发+1
			db('article')->where('id',$obj['id'])->setInc('p_number');

			return 1;
		}else{
			return 0;
		}
	}

	//转发学校资讯
	public function art_zf_add_module($obj,$data)
	{
		$tt=['title'=>$data['content'].$obj['esc'],'edit'=>$obj['user_name'],'add_id'=>input('session.user_auth.id'),'add_name'=>input('session.m_user_auth.name'),'keywords'=>$data['content'].$obj['esc'],'description'=>$data['content'].$obj['esc'],'content'=>$data['content'].$obj['content'],'esc'=>$data['content'].$obj['esc'],'add_time'=>time()];

		$match = array();
		$pattern="/<img.+src=\"?(.+\.(jpg|jpeg|png))\"?.+>/i";
		preg_match_all($pattern,$obj['content'],$match);
		if($match[1]!=null)
			$tt['img']=$match[1][0];
		else
			$tt['img']='/public/admin/image/timg.jpg';

		$tt['tname']="校园院报";
		
		$module_user=db('school')->where('adm_id',input('session.m_user_auth.id'))->where('status',1)->find();

		if($module_user)
		{
			$tt['pid']=$module_user['pid'];
			$tt['pname']=$module_user['pname'];

			$tt['cid']=$module_user['cid'];
			$tt['cname']=$module_user['cid'];

			$tt['sid']=$module_user['id'];
			$tt['sname']=$module_user['name'];
			
		}
		else
		{
			return 0;
		}

		//状态
		$tt['status']=1;

		$cf=db('activity')->insert($tt);
		if($cf>0)
		{
			//原文转发+1
			db('article')->where('id',$obj['id'])->setInc('p_number');

			db('article')->where('id',$data['art_id'])->update(['back_3'=>1]);

			return 1;
		}else{
			return 0;
		}
	}

	public function com_add()
	{
		if(!input('session.m_user_auth.id'))
		{
			$this->error('请先登录!');
		}
		$this->assign('artid',input('param.art_id'));
		$this->assign('userid',input('param.user_id'));

		return $this->fetch();
	}

	//动态评论
	public function user_art_com()
	{
		//评论内容：content，回复/评论：type，动态id：aid，，回复评论pid,回复评论pname,被评论用户user_id,被评论用户user_name

		//是否登录
		if(!input('session.m_user_auth.id'))
		{
			$this->error('请先登录!');
		}

		$data=input('post.');
		
		$tt=['user_id'=>input('session.m_user_auth.id'),'user_name'=>input('session.m_user_auth.user_name'),'user_img'=>input('session.m_user_auth.user_img'),'nid'=>$data['art_id'],'nname'=>$data['art_title'],'content'=>$data['content'],'add_time'=>time(),'status'=>1];

		//回复谁
		//2评论用户动态，6回复评论
		if($data['type']==6)
		{
			$tt['pid']=$data['pid'];
			$tt['pname']='评论';

			$tt['pu_id']=$data['puid'];
			$tt['pu_name']=db('user')->where('id',$data['puid'])->value('user_name');
		}

		$tt['type']=$data['type'];

		$e=db('comments')->insertGetId($tt);

		if($e>0){

			//动态评论+1
			db('article')->where('id',$data['art_id'])->setInc('com_number');

			//评论成功，添加记录
			$this->record_add($data['type'],$data['puid'],db('user')->where('id',$data['puid'])->value('user_name'),$data['art_id'],$data['art_title'],$data['content'],$e);

			return ['msg'=>'提交成功'];
		}else{
			return ['msg'=>'提交失败'];
		}

	}

	
	//添加操作记录
	public function record_add($tp,$uid,$uname,$pid,$pname,$content,$contid)
	{
		
		$tt=['wid'=>$uid,'wname'=>$uname,'user_id'=>input('session.m_user_auth.id'),'user_name'=>input('session.m_user_auth.user_name'),'add_time'=>time(),'ip'=>Request::instance()->ip()];
		if($tp==1)
		{
			$tt['content']="访问了您的主页";
		}
		else if($tp==2)
		{
			//积分+1
			int_number(input('session.user_auth.id'),1);

			$tt['cont_id']=$contid;
			$tt['content']="评论了您的动态:".$content;
			$tt['page_title']=$pname;
			$tt['page_url']="/index/user/art_info.html?art_id=".$pid;
			
		}
		else if($tp==3)
		{
			
			$tt['content']="点赞了您的动态";
			$tt['page_title']=$pname;
			$tt['page_url']="/index/user/art_info.html?art_id=".$pid;
		}
		else if($tp==4)
		{
			//积分+1
			int_number(input('session.user_auth.id'),1);

			$tt['cont_id']=$contid;
			$tt['content']="在您的主页留言:".$content;
			$tt['page_title']=$pname;
			$tt['page_url']="/index/user/index";
			

		}else if($tp==6)
		{
			//积分+1
			int_number(input('session.user_auth.id'),1);

			$tt['cont_id']=$contid;
			$tt['content']="回复了您的评论:".$content;
			$tt['page_title']=$pname;
			$tt['page_url']="/index/user/art_info.html?art_id".$pid;
			
		}
		$tt['type']=$tp;
		if($tp==1)
		{
			//访问记录只更新访问时间
			$dd=db('record')->where('wid',$uid)->where('user_id',input('session.m_user_auth.id'))->where('type',1)->find();
			if($dd){
				db('record')->where('id',$dd['id'])->update(['add_time'=>time()]);
			}else{
				db('record')->insert($tt);
			}

		}else{
			db('record')->insert($tt);
		}

		
	}
}
