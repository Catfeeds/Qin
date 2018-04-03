<?php
namespace app\index\controller;
use think\Request;

class User extends App
{
	//初始化
	protected $beforeActionList = [
        'left'
    ];

	//用户主页--动态
    public function index()
    {
		//用户信息
		$obj=db('user')->where('id',input('user_id'))->where('status',1)->find();

		//未找到信息或者id为空
		if($obj==null||input('user_id')==null)
		{
			$this->error('用户不存在或已冻结！');
		}

		$this->assign('obj',$obj);

		$pobj=db('player')->where('user_id',input('user_id'))->where('status=1 and back_2!=2 and so_open=1')->find();
		$this->assign('pobj',$pobj);

		//相册图片
		$list_img=db('hpoto')->where('user_id',input('user_id'))->where('status',1)->order('id desc')->limit(4)->select();
		$this->assign('list_img',$list_img);

		//动态列表
		$list_article=db('article')->where('user_id',input('user_id'))->where('status',1)->order('id desc')->paginate(12,false,['type' => 'paging_news_list',]);
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

		//记录来访
		if(input('session.user_auth.id'))
		{
			$this->record_add(1,$obj['id'],$obj['name'],'','','','');

			//用户人气+1
			if(!session("user_look".input('user_id')."u".input('session.user_auth.id'))==input('session.user_auth.id'))
			{
				db('user')->where('id',input('user_id'))->setInc('look');
				session("user_look".input('user_id')."u".input('session.user_auth.id'),input('session.user_auth.id'));
			}
		}
		
        return view();
    }

	//用户动态详细
	public function art_info()
	{
		//用户信息
		$obj=db('user')->where('id',input('user_id'))->where('status',1)->find();

		//未找到信息或者id为空
		if($obj==null||input('user_id')==null)
		{
			$this->error('用户不存在或已冻结！');
		}

		$this->assign('obj',$obj);
		
		$pobj=db('player')->where('user_id',input('user_id'))->where('status=1 and back_2!=2 and so_open=1')->find();
		$this->assign('pobj',$pobj);

		//动态信息
		$aobj=db('article')->where('status',1)->where('id',input('art_id'))->find();
		
		//未找到信息或者id为空
		if($aobj==null||input('art_id')==null)
		{
			$this->error('信息不存在或已冻结！');
		}

		$this->assign('aobj',$aobj);

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

		//回复input('pt')
		if(input('pt'))
		{
			$obj=db('record')->where('id',input('pt'))->find();
			$pt=['pid'=>$obj['cont_id'],'puid'=>$obj['user_id'],'puname'=>$obj['user_name']];
			$this->assign('pt',$pt);
		}else{
			$this->assign('pt',0);
		}


		return view();
	}

	//动态删除
	public function article_del()
	{
		$aid=input('post.');
		$e=db('article')->where('id',$aid['com_id'])->delete();
		if($e>0)
		{
			//同时删除点赞记录和评论
			db('praise')->where('wid',$aid['com_id'])->delete();
			db('comments')->where('nid',$aid['com_id'])->delete();
			
			return ['msg'=>"删除成功"];
		}
		else
		{
			return ['msg'=>"操作失败"];
		}
	}

	//评论加载------不作用
	public function art_com_sel()
	{
		//动态art_id,页数page
		$list_com=db('comments')->where('nid',input('post.art_id'))->where('status',1)->order('id desc')->page(input('post.page').',8')->select();
		if($list_com){
			foreach($list_com as $k=>$v)
			{
				//查询评论回复
				$list_childiren=db('comments')->where('pid',$v['id'])->where('status',1)->select();
				if($list_childiren)
				{
					if(count($list_childiren)>2)
					{
						$list_com[$k]['childiren']=array_slice($list_childiren,0,2);
						$list_com[$k]['cdd']=1;//显示加载更多回复
					}
					else
					{
						$list_com[$k]['childiren']=array_slice($list_childiren,0,2);
						$list_com[$k]['cdd']=0;
					}
				}
				else
				{
					$list_com[$k]['childiren']=0;
					$list_com[$k]['cdd']=0;
				}
			}
		}

		return ['list'=>$list_com];
	}

	//回复加载------不作用
	public function art_com_sel_tp()
	{
		//评论com_id,
		$list_com=db('comments')->where('pid',input('post.com_id'))->where('status',1)->select();
		return ['list'=>$list_com];
	}

	//用户主页--图片
    public function photo_index()
    {
		//用户信息
		$obj=db('user')->where('id',input('user_id'))->where('status',1)->find();

		//未找到信息或者id为空
		if($obj==null||input('user_id')==null)
		{
			$this->error('用户不存在或已冻结！');
		}

		$this->assign('obj',$obj);

		$pobj=db('player')->where('user_id',input('user_id'))->where('status=1 and back_2!=2 and so_open=1')->find();
		$this->assign('pobj',$pobj);

		//相册图片
		// $list_img=db('hpoto')->where('user_id',input('user_id'))->where('status',1)->order('id desc')->limit(5)->select();
		// $this->assign('list_img',$list_img);

		//图片列表
		$list_hpoto=db('hpoto')->where('user_id',input('user_id'))->where('status',1)->order('id desc')->paginate(12);
		$this->assign('list_hpoto',$list_hpoto);
		
        return view();
    }

	//用户主页--留言
    public function gb_index()
    {
		//用户信息
		$obj=db('user')->where('id',input('user_id'))->where('status',1)->find();

		//未找到信息或者id为空
		if($obj==null||input('user_id')==null)
		{
			$this->error('用户不存在或已冻结！');
		}

		$this->assign('obj',$obj);

		$pobj=db('player')->where('user_id',input('user_id'))->where('status=1 and back_2!=2 and so_open=1')->find();
		$this->assign('pobj',$pobj);
	
		//留言列表
		$list_gb=db('guestbook')->where('wid',input('user_id'))->where('status',1)->order('id desc')->paginate(12,false,['type' => 'paging_news_list',]);

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

        return view();
    }

	//动态评论
	public function user_art_com()
	{
		//评论内容：content，回复/评论：type，动态id：art_id，动态标题：art_title，回复评论pid,回复评论pname,被评论用户user_id,被评论用户user_name

		//是否登录
		if(!input('session.user_auth.id'))
		{
			$this->error('请先登录!');
		}

		$data=input('post.');
		
		$tt=['user_id'=>input('session.user_auth.id'),'user_name'=>input('session.user_auth.user_name'),'user_img'=>input('session.user_auth.user_img'),'nid'=>$data['art_id'],'nname'=>$data['art_title'],'content'=>$data['content'],'add_time'=>time(),'status'=>1];

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
	//动态点赞
	public function user_art_praise()
	{
		//动态id：art_id，动态标题：art_title，被赞用户user_id,被赞用户user_name

		//是否登录

		if(!input('session.user_auth.id'))
		{
			return ['msg'=>'请先登录'];

		}else{

			$data=input('post.');
			//判断是否已点赞
			$list_bl=db('praise')->where('user_id',input('session.user_auth.id'))->where('wid',$data['art_id']);
			if($list_bl)
			{
				$this->error('您已点赞该动态！');
			}

			$tt=['user_id'=>input('session.user_auth.id'),'user_name'=>input('session.user_auth.user_name'),'user_img'=>input('session.user_auth.user_img'),'wid'=>$data['art_id'],'wname'=>$data['art_title'],'add_time'=>time(),'status'=>1];

			$e=db('praise')->insert($tt);

			if($e>0){

				//点赞评论+1
				$db('article')->where('id',$data['art_id'])->setInc('p_number');

				//点赞成功，添加记录
				$this->record_add(3,$data['user_id'],$data['user_name'],$data['art_id'],$data['art_title'],'','');
				return ['msg'=>'支持成功'];
			}else{
				return ['msg'=>'支持失败'];
			}
		}

	}

	//发布动态
	public function user_art_add()
	{
		$data=input('post.');
			
		if($data['content']=='')
		{
			$this->error('内容不能为空！');
		}

		$tt=['content'=>$data['content'],'esc'=>$data['esc'],'user_id'=>input('session.user_auth.id'),'user_name'=>input('session.user_auth.name'),'add_time'=>time(),'status'=>1];
		$e=db('article')->insert($tt);
		if($e>0)
		{
			//积分+2
			int_number(input('session.user_auth.id'),2);

			$this->success('发布成功！');
		}else{
			$this->error('发布失败！');
		}
	}

	//删除动态评论
	public function comments_del()
	{
		$e=db('comments')->where('id',input('post.aid'))->delete();
		if($e>0)
		{
			return ['msg'=>'删除成功!'];
		}else{
			return ['msg'=>'删除失败!'];
		}
	}

	//留言
	public function user_art_gb()
	{
		//留言内容：content，被留言用户user_id
		
		//是否登录
		if(!input('session.user_auth.id'))
		{
			$this->error('请先登录!');
		}

		$data=input('post.');

		if($data['content']=='')
		{
			$this->error('留言内容不能为空!');
		}

		$tt=['user_id'=>input('session.user_auth.id'),'user_name'=>input('session.user_auth.user_name'),'user_img'=>input('session.user_auth.user_img'),'content'=>$data['content'],'wid'=>$data['uid'],'wname'=>db('user')->where('id',$data['uid'])->value('name'),'add_time'=>time(),'status'=>1];

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

	//删除留言
	public function del()
	{
		$e=db('guestbook')->where('id',input('post.com_id'))->delete();
		if($e>0)
		{
			return ['msg'=>'删除成功!'];
		}else{
			return ['msg'=>'删除失败!'];
		}
	}

	public function com_del()
	{
		$e=db('guestbook')->where('id',input('post.com_id'))->delete();
		if($e>0)
		{
			return ['msg'=>'删除成功!'];
		}else{
			return ['msg'=>'删除失败!'];
		}
	}

	//添加操作记录
	public function record_add($tp,$uid,$uname,$pid,$pname,$content,$contid)
	{
		
		$tt=['wid'=>$uid,'wname'=>$uname,'user_id'=>input('session.user_auth.id'),'user_name'=>input('session.user_auth.user_name'),'add_time'=>time(),'ip'=>Request::instance()->ip()];
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
			$tt['page_url']="/index/user/art_info.html?art_id".$pid;
		}
		else if($tp==3)
		{
			
			$tt['content']="点赞了您的动态";
			$tt['page_title']=$pname;
			$tt['page_url']="/index/user/art_info.html?art_id".$pid;
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
			$dd=db('record')->where('wid',$uid)->where('user_id',input('session.user_auth.id'))->where('type',1)->find();
			if($dd){
				db('record')->where('id',$dd['id'])->update(['add_time'=>time()]);
			}else{
				db('record')->insert($tt);
			}

		}else{
			db('record')->insert($tt);
		}
	}

	//举报留言页面
	public function rep()
	{
		$obj=db('guestbook')->where('id',input('gb_id'))->find();
		//评论者头像,名称
		$ub=db('user')->where('id',$obj['user_id'])->where('status',1)->find();
		if($ub)
		{
			if($ub['user_name']!="")
			{
				
				$obj['user_name']=$ub['user_name'];
			}else{
				
				$obj['user_name']='匿名';
			}
		}else{
				
				$obj['user_name']='匿名';
			}
		$this->assign('obj',$obj);
		return view();
	}

	//举报留言提交
	public function rep_add()
	{
		$data=input('post.');
		$obj=db('guestbook')->where('id',$data['gb_id'])->find();
		$tt=['wid'=>$obj['user_id'],'wname'=>$obj['user_name'],'gb_id'=>$obj['id'],'gb_content'=>$obj['content'],'report'=>$data['content'],'add_time'=>time()];

		if(input('session.user_auth.id'))
		{
			$tt['user_id']=input('session.user_auth.id');
			$tt['user_name']=input('session.user_auth.name');
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

	//举报动态评论页面
	public function com_rep()
	{
		$obj=db('comments')->where('id',input('gb_id'))->find();
		//评论者头像,名称
		$ub=db('user')->where('id',$obj['user_id'])->where('status',1)->find();
		if($ub)
		{
			if($ub['user_name']!="")
			{
				
				$obj['user_name']=$ub['user_name'];
			}else{
				
				$obj['user_name']='匿名';
			}
		}else{
				
				$obj['user_name']='匿名';
			}

		$this->assign('obj',$obj);
		return view();
	}

	//举报动态评论提交
	public function com_rep_add()
	{
		$data=input('post.');
		$obj=db('comments')->where('id',$data['gb_id'])->find();
		$tt=['wid'=>$obj['user_id'],'wname'=>$obj['user_name'],'gb_id'=>$obj['id'],'gb_content'=>$obj['content'],'report'=>$data['content'],'type'=>1,'add_time'=>time()];

		if(input('session.user_auth.id'))
		{
			$tt['user_id']=input('session.user_auth.id');
			$tt['user_name']=input('session.user_auth.name');
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

	//举报动态页面
	public function art_rep()
	{
		$obj=db('article')->where('id',input('gb_id'))->find();
		//发布者头像,名称
		$ub=db('user')->where('id',$obj['user_id'])->where('status',1)->find();
		if($ub)
		{
			if($ub['user_name']!="")
			{
				
				$obj['user_name']=$ub['user_name'];
			}else{
				
				$obj['user_name']='匿名';
			}
		}else{
				
				$obj['user_name']='匿名';
			}

		$obj['content']="http://www.qnysj.com/index/user/art_info/user_id/".$obj['user_id'].".html?art_id=".$obj['id'];

		$this->assign('obj',$obj);
		return view();
	}

	//举报动态提交
	public function art_rep_add()
	{
		$data=input('post.');
		$obj=db('article')->where('id',$data['gb_id'])->find();

		$tt=['wid'=>$obj['user_id'],'wname'=>$obj['user_name'],'gb_id'=>$obj['id'],'gb_content'=>$data['esc'],'report'=>$data['content'],'type'=>2,'add_time'=>time()];

		if(input('session.user_auth.id'))
		{
			$tt['user_id']=input('session.user_auth.id');
			$tt['user_name']=input('session.user_auth.name');
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

	//转发动态
	public function art_zf()
	{
		if(!input('session.user_auth.id'))
		{
			return "请先登录!";
		}

		//是否为学校管理者
		$module_user=db('school')->where('adm_id',input('session.user_auth.id'))->where('status',1)->find();
		if($module_user)
		{
			$this->assign('um',1);
		}else{	
			$this->assign('um',0);
		}

		$obj=db('article')->where('id',input('gb_id'))->find();
		//发布者头像,名称
		$ub=db('user')->where('id',$obj['user_id'])->where('status',1)->find();
		if($ub)
		{
			if($ub['user_name']!="")
			{
				
				$obj['user_name']=$ub['user_name'];
			}else{
				
				$obj['user_name']='匿名';
			}
		}else{
				
				$obj['user_name']='匿名';
		}

		$obj['content']="http://www.qnysj.com/index/user/art_info/art_id/".$obj['user_id'].".html?user_id=".$obj['id'];

		$this->assign('obj',$obj);
		return view();
	}

	//转发动态
	public function art_zf_add()
	{
		$data=input('post.');
		$obj=db('article')->where('id',$data['gb_id'])->find();
		
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
		$tt=['esc'=>$data['content'].$obj['esc'],'content'=>$data['content'].$obj['content'],'user_id'=>input('session.user_auth.id'),'user_name'=>input('session.user_auth.user_name'),'back_1'=>1,'back_2'=>$data['esc'],'status'=>1,'add_time'=>time()];
		
		$cf=db('article')->insert($tt);
		if($cf>0)
		{
			//原文转发+1
			db('article')->where('id',$data['art_id'])->setInc('p_number');
			return 1;
		}else{
			return 0;
		}
	}

	//转发学校资讯
	public function art_zf_add_module($obj,$data)
	{
		$tt=['title'=>$data['content'].$obj['esc'],'edit'=>$obj['user_name'],'add_id'=>input('session.user_auth.id'),'add_name'=>input('session.user_auth.name'),'keywords'=>$data['content'].$obj['esc'],'description'=>$data['content'].$obj['esc'],'content'=>$data['content'].$obj['content'],'esc'=>$data['content'].$obj['esc'],'add_time'=>time()];

		$match = array();
		$pattern="/<img.+src=\"?(.+\.(jpg|jpeg|png))\"?.+>/i";
		preg_match_all($pattern,$obj['content'],$match);
		if($match[1]!=null)
			$tt['img']=$match[1][0];
		else
			$tt['img']='/public/admin/image/timg.jpg';

		$tt['tname']="校园院报";
		
		$module_user=db('school')->where('adm_id',input('session.user_auth.id'))->where('status',1)->find();

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
			db('article')->where('id',$data['art_id'])->setInc('p_number');
			db('article')->where('id',$data['art_id'])->update(['back_3'=>1]);
			return 1;
		}else{
			return 0;
		}
	}

	//左侧列表信息
	public function left()
	{
		$this->assign('list_school_user',left_school());
		
		$this->assign('list_reg_user',left_reg());
		
		$this->assign('list_player_back_3',left_player());

	}
	

	//用户投票
	public function vote()
	{
		$data=input('post.');
		//是否登录
		if(!input('session.user_auth.id'))
		{
			return ['msg'=>'请先登录'];
			
		}
		
		//判断投票用户是否已经投票

		$ue=db('vote')->where('wid',$data['uid'])->where('user_id',input('session.user_auth.id'))->find();

		if($ue)
		{
			return ['msg'=>'无法重复投票'];
		}
		
		
		//获取目标用户的报名信息
		$player=db('player')->where('user_id',$data['uid'])->find();


		//判断该用户信息的比赛状态
		if($player['status']==0||$player['back_2']==2)
		{
			$this->error('该用户报名信息已过期或未通过审核!');

		}else{
			$e=db('player')->where('user_id',$data['uid'])->setInc('back_3');
			if($e>0)
			{				
				$this->record_add(8,$data['uid'],db('user')->where('id',$data['uid'])->value('name'),input('session.user_auth.id'),input('session.user_auth.name'),'','');
				
				$tttt=['wid'=>$data['uid'],'wname'=>db('user')->where('id',$data['uid'])->value('name'),'user_id'=>input('session.user_auth.id'),'user_name'=>input('session.user_auth.name'),'add_time'=>time(),'ip'=>Request::instance()->ip()];
				db('vote')->insert($tttt);

				return ['msg'=>'投票成功'];
			}else{
				return ['msg'=>'投票失败'];
			}
		}
	}

	//评论图片上传
	public function upload_img()
	{
		$files=request()->file('file');
		$info = $files->validate(['size'=>2048000,'ext'=>"jpg,png,jpeg"])->rule('date')->move(ROOT_PATH . 'public'.DS.'uploads' .DS.'user_art');
		if($info){
			$tt='/public/uploads/user_art/'.$info->getSavename();
			return json(['code'=>0,'data'=>['src'=>$tt,'title'=>'图片']]);
		}else{
			return json(['code'=>-1,'msg'=>'上传失败,图片大小限制2M之内,且仅限jpg,png,jpeg格式！']); 
		}
	}
}