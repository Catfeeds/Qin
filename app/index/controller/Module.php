<?php
namespace app\index\controller;
use think\request;

class Module extends App 
{
	//加载
	protected $beforeActionList = [
        'activity_back_1' =>  ['only'=>'index'],
        'activity_back_2'  =>  ['only'=>'series'],
    ];

	//论坛模块首页
    public function index()
    {
		//查询所有社团分类

		//查询条件
		$map="status=1";
		//分页传参
		$pgcc=['action'=>1];

		//搜索关键字
		if(input('title'))
		{
			$map.=" and name like '%".input('title')."%'";
			$pgcc['title']=input('title');
		}

		$list_si=db('series')->where($map)->order('back_2')->paginate(20,false,['query' => $pgcc]);
		$this->assign('list_si',$list_si);

		//查询分类下的帖子数量
		$list_si_json=json_decode(json_encode($list_si),true)['data'];
		
		foreach($list_si_json as $k=>$v)
		{
			$e=db('articlem')->where('series_id',$v['id'])->count('id');
			
			if($e)
			{
				$list_si_json[$k]['cd']=$e;
			}
			else
			{
				$list_si_json[$k]['cd']=0;
			}
		}

		$this->assign('list_si_json',$list_si_json);

		//热门社团
		$list_module_number=db('module')->where('status',1)->order('art_number desc,look desc,id desc')->limit(20)->select();
		$this->assign('list_module_number',$list_module_number);


		//首页推荐帖子
		$list_articlem_number=db('articlem')->where('status',1)
							->where('back_1',1)
							->order('com_number desc,look desc,add_time  desc')
							->limit(20)->select();
		$this->assign('list_articlem_number',$list_articlem_number);

        return view();
    }

	//社团模块列表
	public function series()
	{
		//地区筛选
		//$plist=db('reg')->where('pid',null)->where('status',1)->order('back_2')->select();
		//$this->assign('plist',$plist);

		//查询条件
		$map='status=1 and tid='.input('series_id');
		//分页传参
		$pgcc=['series_id'=>input('series_id')];

		/*
		if(input('pid'))
		{
			$clist=db('reg')->where('pid',input('pid'))->where('status',1)->order('back_2')->select();
			$this->assign('clist',$clist);

			$this->assign('pid',input('pid'));
			$map.=' and pid='.input('pid');
			$pgcc['pid']=input('pid');
		}

		if(input('cid'))
		{
			$slist=db('school')->where('cid',input('cid'))->where('status',1)->order('id')->select();
			$this->assign('slist',$slist);

			$this->assign('cid',input('cid'));
			$map.=' and cid='.input('cid');
			$pgcc['cid']=input('cid');
		}

		if(input('sid'))
		{
			$this->assign('sid',input('sid'));
			$map.=' and sid='.input('sid');
			$pgcc['sid']=input('sid');
		}*/

		//搜索关键字
		if(input('title'))
		{
			$map.=" and name like '%".input('title')."%'";
			$pgcc['title']=input('title');
		}

		//所有版块
		$list_md=db('module')->where($map)->order('id desc')->paginate(20,false,['query' => $pgcc]);
		$this->assign('list_md',$list_md);

		$this->assign('series_id',input('series_id'));

		$this->assign('series_name',db('series')->where('id',input('series_id'))->value('name'));

		//查询分类下的帖子数量
		$list_md_json=json_decode(json_encode($list_md),true)['data'];
		
		foreach($list_md_json as $k=>$v)
		{
			$e=db('articlem')->where('module_id',$v['id'])->count('id');
			
			if($e)
			{
				$list_md_json[$k]['cd']=$e;
			}
			else
			{
				$list_md_json[$k]['cd']=0;
			}
		}

		$this->assign('list_md_json',$list_md_json);

		//分类推荐帖子
		$list_articlem_number=db('articlem')->where('status',1)
							->where('back_2',1)->where('series_id',input('series_id'))
							->order('com_number desc,look desc,add_time  desc')
							->limit(20)->select();
		$this->assign('list_articlem_number',$list_articlem_number);

		return view();
	}

	//模块详细
	public function module()
	{
		//模块
		$obj=db('module')->where('id',input('module_id'))->find();
		$this->assign('obj',$obj);

		//查询条件
		$map='status=1 and module_id='.input('module_id');
		//分页传参
		$pgcc=['module_id'=>input('module_id')];
		//排行
		$pp='back_3 desc,back_4 desc,id desc';
		//排序方式
		$px=1;

		if(input('heat'))
		{
			$map.=" and look>0";
			$pp='look desc';
			$pgcc['heat']=input('heat');
			$px=2;
		}

		if(input('elite'))
		{
			$map.=" and back_3=1";
			$pgcc['elite']=input('elite');
			$px=3;
		}

		if(input('my'))
		{
			$pp="id desc";
			$map.=" and user_id=".input('session.user_auth.id');
			$pgcc['my']=input('my');
			$px=4;
		}

		//搜索关键字
		if(input('title'))
		{
			$map.=" and title like '%".input('title')."%'";
			$pgcc['title']=input('title');
		}

		$this->assign('px',$px);

		//模块动态
		$list_art_m=db('articlem')->where($map)->order($pp)->paginate(16,false,['query' =>$pgcc]);

		$this->assign('list_art_m',$list_art_m);
		
		//增加浏览量
		db('module')->where('id',input('module_id'))->setInc('look');

		return view();
	}

	//发布动态
	public function articlem_add()
	{
		//是否登录
		if(!input('session.user_auth.id'))
		{
			$this->error('请先登录！');
		}

		if(request()->isPost())
		{
			
			if(!captcha_check(input('post.code')))
			{
				$this->error('验证码错误');
			} 

			$data=input('post.');

			$tt=['title'=>$data['title'],'content'=>$data['content'],'user_id'=>input('session.user_auth.id'),'user_name'=>input('session.user_auth.user_name'),'user_img'=>input('session.user_auth.user_img'),'add_time'=>time(),'status'=>1];
			
			$obj=db('module')->where('id',$data['module_id'])->find();


			if($obj)
			{
				//模块分类
				$tt['series_id']=$obj['tid'];
				$tt['series_name']=$obj['tname'];

				//所属模块
				$tt['module_id']=$obj['id'];
				$tt['module_name']=$obj['name'];
			}else{
				$this->error('发布失败');
			}
			
			$e=db('articlem')->insert($tt);
			if($e>0){
				//模块动态+1
				db('module')->where('id',$data['module_id'])->setInc('art_number');

				$this->success('发布成功','module/module?module_id='.$data['module_id']);

			}else{
				$this->error('发布失败');
			}

		}

		$this->assign('module_id',input('module_id'));
		
		return view();
	}

	//动态详细
	public function articlem()
	{
		//动态内容
		$obj=db('articlem')->where('id',input('art_id'))->find();

		//未找到信息或者id为空
		if($obj==null||input('art_id')==null)
		{
			$this->error('信息不存在或已冻结！');
		}

		//查看+1
		db('articlem')->where('id',input('art_id'))->setInc('look');
		
		//是否收藏
		if(input('session.user_auth.id'))
		{
			$haha=db('collect')->where('wid',input('art_id'))->where('user_id',input('session.user_auth.id'))->select();
			
			if($haha)
			{
				$obj['child']=1;
			}else{
				$obj['child']=0;
			}

		}else{
				$obj['child']=0;
		}
		
		$this->assign('obj',$obj);

		//身份认证版主 adm 

		$module_user=db('module')->where('id',$obj['module_id'])->where('adm_id',input('session.user_auth.id'))->value('adm_name');
		if($module_user==input('session.user_auth.name'))
		{
			$this->assign('adm',1);
		}
		else
		{
			$this->assign('adm',0);
		}

		//动态评论
		$list_com=db('comments')->where('nid',input('art_id'))->where('status',1)->order('id desc')->paginate(8,false,['query' => array('action'=>'1')]);
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
					$list_com_json[$k]['user_img']=$ub['img'];
					$list_com_json[$k]['user_name']=$ub['user_name'];
				}else{
					$list_com_json[$k]['user_img']='/public/static/images/avatar/default.png';
					$list_com_json[$k]['user_name']='匿名';
				}
				
			}
		}


		$this->assign('list_com',$list_com);
		$this->assign('list_com_json',$list_com_json);
		
		
		//点击排序15
		$list_art_look=db('articlem')->where('status',1)->order('look desc')->limit(15)->select();
		$this->assign('list_art_look',$list_art_look);

		//评论排序15
		$list_art_com=db('articlem')->where('status',1)->order('com_number desc')->limit(15)->select();
		$this->assign('list_art_com',$list_art_com);

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

	//评论加载-----不作用
	public function art_com_sel()
	{
		//动态art_id,页数page
		$list_com=db('comments')->where('nid',input('post.art_id'))->where('status',1)->page(input('post.page').',8')->order('id desc')->select();

		return ['list'=>$list_com];
	}

	//回复加载-----不作用
	public function art_com_sel_tp()
	{
		//评论com_id,
		$list_com=db('comments')->where('pid',input('post.com_id'))->where('status',1)->order('id desc')->select();
		return ['list'=>$list_com];
	}

	//删除动态
	public function deletes()
	{
		$e=db('articlem')->where('id',input('art_id'))->where('user_id',input('session.user_auth.id'))->delete();
		if($e>0)
		{
			//同时删除收藏记录和评论
			//db('collect')->where('wid',input('art_id'))->delete();
			//db('comments')->where('nid',input('art_id'))->delete();
			$this->coll_each_del(input('art_id'));
			$this->com_each_del(input('art_id'));

			return ['msg'=>'删除成功','id'=>1];
		}else{
			return ['msg'=>'删除失败','id'=>0];
		}
	}

	//置顶
	public function zhiding()
	{
		$data=input('post.');
		$e=0;

		//判断当前操作用户权限
		$obj=db('articlem')->where('id',$data['aid'])->find();
		$tobj=db('module')->where('id',$obj['module_id'])->where('adm_id',input('session.user_auth.id'))->value('adm_name');

		if($data['action']=='szd')
		{
			
			if($tobj==input('session.user_auth.name'))
			{
				$e=db('articlem')->where('id',$data['aid'])->update(['back_3'=>1,'up_time'=>time()]);
			}else{
				$this->error('权限错误，修改失败');
			}
		}
		else if($data['action']=='xzd')
		{
			
			if($tobj==input('session.user_auth.name'))
			{
				$e=db('articlem')->where('id',$data['aid'])->update(['back_3'=>0,'up_time'=>time()]);
			}else{
				$this->error('权限错误，修改失败');
			}
		}

		if($e>0){
			return ['msg'=>'修改成功','id'=>1];
		}else{
			return ['msg'=>'修改失败','id'=>0];
		}
	}

	//加精
	public function jiajing()
	{
		$data=input('post.');
		$e=0;

		//判断当前操作用户权限
		$obj=db('articlem')->where('id',$data['aid'])->find();
		$tobj=db('module')->where('id',$obj['module_id'])->where('adm_id',input('session.user_auth.id'))->value('adm_name');

		if($data['action']=='sjj')
		{
			
			if($tobj==input('session.user_auth.name'))
			{
				$e=db('articlem')->where('id',$data['aid'])->update(['back_4'=>1,'up_time'=>time()]);
			}else{
				$this->error('权限错误，修改失败');
			}
		}
		else if($data['action']=='xjj')
		{
			
			if($tobj==input('session.user_auth.name'))
			{
				$e=db('articlem')->where('id',$data['aid'])->update(['back_4'=>0,'up_time'=>time()]);
			}else{
				$this->error('权限错误，修改失败');
			}
		}

		if($e>0){
			return ['msg'=>'修改成功','id'=>1];
		}else{
			return ['msg'=>'修改失败','id'=>0];
		}
	}

	//删除（版主）
	public function shanchu()
	{
		$data=input('post.');
		$e=0;

		//判断当前操作用户权限
		$obj=db('articlem')->where('id',$data['aid'])->find();
		$tobj=db('module')->where('id',$obj['module_id'])->where('adm_id',input('session.user_auth.id'))->value('adm_name');

		if($data['action']=='szd')
		{
			if($tobj==input('session.user_auth.name'))
			{
				$e=db('articlem')->where('id',$data['aid'])->update(['status'=>2,'up_time'=>time()]);
			}else{
				$this->error('权限错误，修改失败');
			}
		}

		if($e>0){

			//发送通知
			$ttm=['title'=>"您在:"+$obj['module_name']+" 发布的帖子已被版主删除",'content'=>"您在:"+$obj['module_name']+" 发布的帖子已被版主删除",'add_time'=>time(),'add_id'=>0,'add_name'=>'系统通知','user_id'=>$obj['user_id'],'user_name'=>$obj['user_name']];

			db('message')->insert($ttm);

			return ['msg'=>'删除成功','id'=>1];
		}else{
			return ['msg'=>'删除失败','id'=>0];
		}
	}

	//评论
	public function module_art_com()
	{
		//是否登录
		if(!input('session.user_auth.id'))
		{
			$this->error('请先登录!');
		}

		$data=input('post.');
		$tt=['user_id'=>input('session.user_auth.id'),'user_name'=>input('session.user_auth.user_name'),'user_img'=>input('session.user_auth.user_img'),'nid'=>$data['art_id'],'nname'=>$data['art_title'],'content'=>$data['content'],'add_time'=>time(),'status'=>1];

		//评论还是回复
		$tt['type']=$data['type'];

		//回复谁
		if($data['type']==6)
		{
			$tt['pid']=$data['pid'];
			$tt['pname']='评论';

			$tt['pu_id']=$data['puid'];
			$tt['pu_name']=db('user')->where('id',$data['puid'])->value('user_name');
		}

		$e=db('comments')->insertGetId($tt);
		
		if($e>0){

			//动态评论+1
			db('articlem')->where('id',$data['art_id'])->setInc('com_number');

			//评论成功，添加记录
			$this->record_add($data['type'],$data['puid'],db('user')->where('id',$data['puid'])->value('user_name'),$data['art_id'],$data['art_title'],$data['content'],$e);

			return ['msg'=>'提交成功','id'=>$e];
		}else{
			return ['msg'=>'提交失败','id'=>0];
		}
	}

	//评论图片上传
	public function upload_img()
	{
		$files=request()->file('file');
		$info = $files->rule('date')->move(ROOT_PATH . 'public'.DS.'uploads'.DS.'art_com');
		if($info){
			$tt='/public/uploads/art_com/'.$info->getSavename();
			return json(['status'=>0,'url'=>$tt]);
		}else{
			return json(['status'=>-1,'msg'=>'上传失败']);
		}
	}

	//删除评论
	public function com_delete()
	{
		$e=db('comments')->where('id',input('com_id'))->where('user_id',input('session.user_auth.id'))->delete();
		if($e>0)
		{
			
			//删除评论的点赞
			$this->pra_each_del(input('com_id'));

			//删除回复记录
			//db('comments')->where('pid',input('com_id'))->delete();
			
			return ['msg'=>'删除成功'];
		}else{
			return ['msg'=>'删除失败'];
		}
	}

	//收藏
	public function collect()
	{
		//是否登录
		if(!input('session.user_auth.id'))
		{
			$this->error('请先登录!');
		}

		//动态art_id
		$tt=['wid'=>input('art_id'),'wname'=>db('articlem')->where('id',input('art_id'))->value('title'),'user_id'=>input('session.user_auth.id'),'user_name'=>input('session.user_auth.user_name'),'user_img'=>input('session.user_auth.user_img'),'status'=>1,'add_time'=>time()];

		$e=db('collect')->insert($tt);
		if($e>0)
		{
			return ['msg'=>'收藏成功'];
		}else{
			return ['msg'=>'收藏失败'];
		}
	}

	//取消收藏
	public function collect_del()
	{
		$e=db('collect')->where('wid',input('art_id'))->where('user_id',input('session.user_auth.id'))->delete();
		if($e>0)
		{
			return ['msg'=>'取消成功'];
		}else{
			return ['msg'=>'取消失败'];
		}
	}

	//评论点赞
	public function user_art_praise()
	{
		//评论id：com_id

		//是否登录
		if(!input('session.user_auth.id'))
		{
			$this->error('请先登录!');
		}

		$data=input('post.');
		//判断是否已点赞
		$list_bl=db('praise')->where('user_id',input('session.user_auth.id'))->where('wid',$data['com_id'])->select();
		if($list_bl)
		{
			$this->error('您已点赞该评论！');
		}

		$tt=['user_id'=>input('session.user_auth.id'),'user_name'=>input('session.user_auth.user_name'),'wid'=>$data['com_id'],'wname'=>'评论','add_time'=>time(),'status'=>1];

		$e=db('praise')->insert($tt);

		if($e>0){
			
			//点赞评论+1
			db('comments')->where('id',$data['com_id'])->setInc('p_number');
			
			//点赞成功，添加记录
			$com_user=db('comments')->where('id',$data['com_id'])->find();

			$this->record_add(7,$com_user['user_id'],$com_user['user_name'],$com_user['nid'],$com_user['nname'],'');
			
			return ['msg'=>'点赞成功'];
		}else{
			return ['msg'=>'点赞失败'];
		}

	}

	//添加操作记录
	public function record_add($tp,$uid,$uname,$pid,$pname,$content,$contid)
	{
		$tt=['wid'=>$uid,'wname'=>$uname,'user_id'=>input('session.user_auth.id'),'user_name'=>input('session.user_auth.user_name'),'add_time'=>time(),'ip'=>Request::instance()->ip()];
		if($tp==5)
		{
			$tt['cont_id']=$contid;
			$tt['content']="评论了您的帖子:".$content;
			$tt['page_title']=$pname;
			$tt['page_url']=url('module/articlem',['art_id'=>$pid]);
		}
		else if($tp==6)
		{
			$tt['cont_id']=$contid;
			$tt['content']="回复了您的评论:".$content;
			$tt['page_title']=$pname;
			$tt['page_url']=url('module/articlem',['art_id'=>$pid]);
		}
		else if($tp==7)
		{
			
			$tt['content']="点赞了您的评论";
			$tt['page_title']=$pname;
			$tt['page_url']=url('module/articlem',['art_id'=>$pid]);
		}

		$tt['type']=$tp;
		
		db('record')->insert($tt);
	}

	//同时删除动态的收藏记录和评论
	public function coll_each_del($art_id)
	{
		db('collect')->where('wid',$art_id)->delete();
	}
	public function com_each_del($art_id)
	{
		$com_list=db('comments')->where('nid',$art_id)->select();
		foreach($com_list as $k=>$v)
		{
			$ee=db('comments')->where('nid',$v['id'])->select();
			//删除评论的点赞
			if($ee>0)
				$this->pra_each_del($v['id']);
		}
	}

	//删除评论的点赞
	public function pra_each_del($com_id)
	{
		db('praise')->where('wid',$com_id)->delete();
	}

	//首页推荐活动
	public function activity_back_1()
	{
		$list_activity_back_1=db('activity')->where('status',1)->where('back_1',1)->order('add_time desc')->limit(7)->select();
		$this->assign('list_activity_back_1',$list_activity_back_1);
	}

	//分类推荐活动
	public function activity_back_2()
	{
		$list_activity_back_2=db('activity')->where('status',1)->where('back_2',1)->order('add_time desc')->limit(7)->select();
		$this->assign('list_activity_back_2',$list_activity_back_2);
	}
	

}