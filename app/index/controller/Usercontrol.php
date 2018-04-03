<?php
namespace app\index\controller;
use think\Request;

class Usercontrol extends App
{
	//初始化
	protected $beforeActionList = [
        'hello'
    ];

	protected function hello()
	{
		if(request()->action()=='user_info'||request()->action()=='user_pwd')
		{
			$this->assign('pg',2);
		}
		else if(request()->action()=='player'||request()->action()=='index_player')
		{
			$this->assign('pg',3);
		}
		else if(request()->action()=='message'||request()->action()=='message_info')
		{
			$this->assign('pg',4);
		}
		else if(request()->action()=='module_add'||request()->action()=='module_index'||request()->action()=='module_xlx')
		{
			$this->assign('pg',5);
		}
		else if(request()->action()=='module_update')
		{
			$this->assign('pg',6);
		}
		else if(request()->action()=='index_player_school'||request()->action()=='school_player')
		{
			$this->assign('pg',7);
		}
		else if(request()->action()=='index_player_community'||request()->action()=='community_player')
		{
			$this->assign('pg',8);
		}
		else{
			$this->assign('pg',1);
		}

		//用户信息
		$obj=db('user')->where('id',input('session.user_auth.id'))->where('status',1)->find();

		//未找到信息或者id为空
		if($obj==null)
		{
			$this->error('信息不存在或已冻结！','index/index');
		}

		//是否为参赛选手
		$player_user=db('player')->where('user_id',input('session.user_auth.id'))->find();
		if($player_user)
		{
			
			$this->assign('up',1);
		}else{
			
			$this->assign('up',0);
		}

		//是否为学校管理者
		$module_user=db('school')->where('adm_id',input('session.user_auth.id'))->where('status',1)->find();
		if($module_user)
		{
			$this->assign('um',1);
			$this->assign('school_id',$module_user['id']);

		}else{
			
			$this->assign('um',0);
			$this->assign('school_id',0);
		}

		//是否为社区管理者
		$module_user=db('community')->where('adm_id',input('session.user_auth.id'))->where('status',1)->find();
		if($module_user)
		{
			$this->assign('cm',1);
			$this->assign('community_id',$module_user['id']);

		}else{
			
			$this->assign('cm',0);
			$this->assign('community_id',0);
		}

		$this->assign('obj',$obj);

	}

	//用户主页--日志
    public function index()
    {
		
		//最新日志
		$list_record=db('record')->where('wid',input('session.user_auth.id'))->where('type!=1')->order('add_time desc')->paginate(16);

		$this->assign('list_record',$list_record);

        return view();
    }

	//日志链接跳转---js跳转
	public function record_look()
	{
		db('record')->where('id',input('rid'))->update(['look'=>1]);
		//$url=db('record')->where('id',input('rid'))->value('page_url');
		$obj=db('record')->where('id',input('rid'))->find();
		$url=$obj['page_url'];
		
		$url.='?user_id='.input('session.user_auth.id').'&&pt='.input('rid');

		$this->redirect("usercontrol/index");
		
	}

	//日志删除
	public function record_del()
	{
		$aid=input('post.');
		$e=db('record')->where('id',$aid['aid'])->delete();
		if($e>0)
		{
			return ['msg'=>"删除成功"];
		}
		else
		{
			return ['msg'=>"操作失败"];
		}
	}

	//日志状态修改
	public function record_update()
	{
		$e=db('record')->where('id',input('post.aid'))->update(['look'=>1]);
		if($e>0)
		{
			return ['msg'=>"操作成功"];
		}
		else
		{
			return ['msg'=>"操作失败"];
		}
	}

	//动态列表
	public function article()
	{

		$list_article=db('article')->where('user_id',input('session.user_auth.id'))->where('status',1)->order('id desc')->paginate(16);

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

		return view();
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

	//评论图片上传
	public function upload_img()
	{
		$files=request()->file('file');
		$info = $files->validate(['size'=>2048000,'ext'=>'jpg,png,jpeg'])->rule('date')->move(ROOT_PATH . 'public'.DS.'uploads'.DS.'art_com');
		if($info){

			//积分+1
			int_number(input('session.user_auth.id'),1);

			$tt='/public/uploads/art_com/'.$info->getSavename();
			$data['src']=$tt;
			return json(['code'=>0,'msg'=>'上传成功','data'=>$data]);
		}else{
			return json(['code'=>-1,'msg'=>'上传失败,图片大小限制2M之内,且仅限jpg,png,jpeg格式！']);
		}
	}

	//动态删除
	public function article_del()
	{
		$aid=input('post.');
		$e=db('article')->where('id',$aid['aid'])->delete();
		if($e>0)
		{
			//同时删除点赞记录和评论
			//db('praise')->where('wid',$aid['aid'])->delete();
			//db('comments')->where('nid',$aid['aid'])->delete();
			$this->coll_each_del($aid['aid']);
			$this->com_each_del($aid['aid']);

			return ['msg'=>"删除成功"];
		}
		else
		{
			return ['msg'=>"操作失败"];
		}
	}

	//相册
	public function photo()
	{
		if(request()->isPost())
		{
			$data=input('post.');
			$files=request()->file('img');
			
			//是否有四张
			$content=db('hpoto')->where('user_id',input('session.m_user_auth.id'))->select();
			if(count($content)>=4)
			{
				//$this->error('最多上传四张');
			}

			$tt=['user_id'=>input('session.user_auth.id'),'user_name'=>input('session.user_auth.name'),'status'=>1];
			//foreach($files as $file)
			//{
				$info = $files->rule('date')->move(ROOT_PATH . 'public'.DS.'uploads'.DS.'photo');
				if($info){
					$tt['add_time']=time();
					$tt['img']='/public/uploads/photo/'.$info->getSavename();
					//$e+=db('photo')->insert($tt);
				}
			//}
			$e=db('hpoto')->insert($tt);
			if($e>0)
			{
				$this->success('上传成功！','usercontrol/photo');
			}else{
				$this->error('上传失败！');
			}
		}
		$list_hpoto=db('hpoto')->where('user_id',input('session.user_auth.id'))->where('status',1)->order('id desc')->paginate(12);
		$this->assign('list_hpoto',$list_hpoto);
		return view();
	}

	//图片删除
	public function hpoto_del()
	{
		$aid=input('post.');

		//$img_url=db('hpoto')->where('id',$aid['aid'])->value('img');
		$e=db('hpoto')->where('id',$aid['aid'])->delete();
		if($e>0)
		{
			//unlink($img_url);
			return ['msg'=>"删除成功"];
		}
		else
		{
			return ['msg'=>"操作失败"];
		}
	}

	//留言列表
    public function guestbook()
    {
		if(request()->isPost())
		{
			$data=input('post.');

			$tt=['wid'=>input('session.user_auth.id'),'wname'=>input('session.user_auth.name'),'user_id'=>input('session.user_auth.id'),'user_name'=>input('session.user_auth.name'),'user_img'=>input('session.user_auth.user_img'),'status'=>1,'add_time'=>time(),'ip'=>Request::instance()->ip()];
			
			$e=db('guestbook')->insert($tt);
			if($e>0)
			{
				$this->success('上传成功！','usercontrol/guestbook');
			}else{
				$this->error('上传失败！');
			}
		}
		//留言列表
		$list_gb=db('guestbook')->where('wid',input('session.user_auth.id'))->where('status',1)->order('id desc')->paginate(12);
		$this->assign('list_gb',$list_gb);
		return view();
	}

	//留言删除
	public function guestbook_del()
	{
		$aid=input('post.');
		$e=db('guestbook')->where('id',$aid['aid'])->delete();
		if($e>0)
		{
			return ['msg'=>"删除成功"];
		}
		else
		{
			return ['msg'=>"操作失败"];
		}
	}

	//账户信息修改
	public function user_info()
	{
		if(request()->isPost())
		{
			$data=input('post.');
			
			//'pwd'=>md5($data['pwd']),
			$tt=['user_name'=>$data['user_name'],'user_age'=>$data['age'],'user_sex'=>$data['sex'],'race'=>$data['race'],'tel'=>$data['tel'],'type'=>$data['tp'],'esc'=>$data['esc'],'up_time'=>time()];

			$img = request()->file('img');
			 if($img!=''){
				 $info = $img->rule('date')->move(ROOT_PATH . 'public'.DS.'uploads'.DS.'user');
				 if($info){
						$tt['img']='/public/uploads/user/'.$info->getSavename(); 
				 }
			 }

			if($data['tp']=='1'){

				$tt['pid']=$data['pid'];
				$tt['pname']=db('reg')->where('id',$data['pid'])->value('name');

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

				$tt['pid']=$data['pid'];
				$tt['pname']=db('reg')->where('id',$data['pid'])->value('name');

				$tt['sid']=null;
				$tt['sname']=null;

			}

			$e=db('user')->where('id',input('session.user_auth.id'))->update($tt);
			if($e>0)
			{
				//更新session数据
				session('user_auth.name', $tt['user_name']);
				session('user_auth.user_img', db('user')->where('id',input('session.user_auth.id'))->value('img'));

				$this->success('修改成功','usercontrol/index');
			}else{
				$this->error('修改失败');
			}

		}

		$obj=db('user')->where('id',input('session.user_auth.id'))->find();
		$this->assign('obj',$obj);
		
		$plist=db('reg')->where('pid',null)->where('status',1)->order('back_2')->select();
		$this->assign('plist',$plist);

		if($obj['pid']!=0)
		{
			$clist=db('reg')->where('pid',$obj['pid'])->where('status',1)->order('back_2')->select();
			$this->assign('clist',$clist);
		}

		if($obj['pid']!=0)
		{
			$slist=db('school')->where('cid',$obj['cid'])->where('status',1)->order('id')->select();
			$this->assign('slist',$slist);
		}


		return view();
	}
		
	//账号是否重复
	public function cf()
	{
		$data=input('post.');
		$e=db('user')->where('user_name',$data['aname'])->where('id','neq',$data['aid'])->find();
		if($e!=null)
		{
			return ["e"=>1];
		}else{
			return ["e"=>-1];
		}
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

	//查询社区信息
	public function getss_p()
	{
		$list=db('community')->where('pid',input('post.pid'))->select();
		return ['ls'=>$list];
	}

	public function getshool_p()
	{
		$list=db('school')->where('pid',input('post.pid'))->select();
		return ['ls'=>$list];

	}

	//修改密码
	public function user_pwd()
	{
		if(request()->isPost())
		{
			$data=input('post.');
			$user=db('user')->where('id',input('session.user_auth.id'))->where('status',1)->find();
			if($user){ 
				if(md5($data['jpwd']) == $user['pwd']){
					$tt=['pwd'=>md5($data['pwd']),'up_time'=>time()];
					$e=db('user')->where('id',input('session.user_auth.id'))->update($tt);
					if($e>0)
					{
						$this->success('修改成功','usercontrol/index');
					}else{
						$this->error('修改失败');
					}
				}else { 
					$this->error('密码错误！');
				}
            	
            } else { 
                $this->error('此账号不存在或被冻结！');
            }
			
		}

		return view();
	}

	public function index_player()
	{
		$plist=db('player')->where('user_id',input('session.user_auth.id'))->paginate(15);
		$this->assign('plist',$plist);

		return view();
	}

	//报名信息
	public function player()
	{

		//判断报名状态
		$obj=db('player')->where('id',input('player_id'))->find();
		
		if(!$obj)
		{
			$this->error('请确定是否提交了报名信息');
		}

		if(request()->isPost())
		{
			$data=input('post.');

			//判断报名状态
			if($obj){
				if($obj['status']==1)
				{
					$this->error('报名信息已通过审核,无法重复修改');
				}
			}

			//修改的报名分类是否允许
			$obj_ff=db('player')->where('user_id='.input('session.user_auth.id')." and type=".$data['type']." and maxid=".$data['maxid']." and minid=".$data['minid']." and id!=".$obj['id'])->find();

			if($obj_ff)
			{
				$this->error('您已报名：'.db('type')->where('id',$data['type'])->value('name').' '.db('type')->where('id',$data['maxid'])->value('name').' '.db('type')->where('id',$data['minid'])->value('name').' '.'大赛,无法重复提交');
			}

			

			//作品:wid-----上传作品关联

			$tt=['pid'=>$data['pid'],'pname'=>db('reg')->where('id',$data['pid'])->value('name'),'user_id'=>input('session.user_auth.id'),'user_name'=>$data['user_name'],'user_euname'=>pinyin($data['user_name']),'user_age'=>$data['user_age'],'user_sex'=>$data['user_sex'],'race'=>$data['race'],'user_birth'=> strtotime($data['user_birth']),'site'=>$data['site'],'postcode'=>$data['postcode'],'tel'=>$data['tel'],'unit'=>$data['unit'],'type'=>$data['type'],'type_name'=>db('type')->where('id',$data['type'])->value('name'),'maxid'=>$data['maxid'],'maxname'=>db('type')->where('id',$data['maxid'])->value('name'),'minid'=>$data['minid'],'minname'=>db('type')->where('id',$data['minid'])->value('name'),'esc'=>$data['esc'],'intro'=>$data['intro'],'teacher'=>$data['teacher'],'wname'=>$data['wname'],'rec'=>$data['rec'],'rectel'=>$data['rectel'],'so_open'=>$data['so_open'],'back_4'=>$data['tp'],'add_time'=>time()];

			//审核失败后报名状态修改为二次提交
			if($obj['status']==2)
			{
				$tt['status']=3;
			}

			//学校
			if($data['tp']=='1'){

				$tt['cid']=db('school')->where('id',$data['sid'])->value('cid');
				$tt['cname']=db('school')->where('id',$data['sid'])->value('cname');

				$tt['sid']=$data['sid'];
				$tt['sname']=db('school')->where('id',$data['sid'])->value('name');
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
			
			//身份证正面照
			$img_2 = request()->file('idcard_img');

			if($img_2!=''){
				 $info = $img_2->validate(['ext'=>'jpg,png,jpeg,rar,zip'])->rule('date')->move(ROOT_PATH . 'public'.DS.'uploads'.DS.'player'.DS.'rar');
				 if($info){
						$tt['user_idcard_img']='/public/uploads/player/rar/'.$info->getSavename(); 
				 }else{
						$this->error($img_2->getError());
				 }
			 }

			$e=db('player')->where('id',$obj['id'])->update($tt);

			if($e>0)
			{
				$this->success('修改成功','usercontrol/index_player');
			}else{
				$this->error('修改失败');
			}

		}

		$this->assign('obj',$obj);

		//地区信息
		$plist=db('reg')->where('pid',null)->where('status',1)->order('back_2')->select();
		$this->assign('plist',$plist);
		if($obj['pid']!=0)
		{
			$clist=db('reg')->where('pid',$obj['pid'])->where('status',1)->order('back_2')->select();
			$this->assign('clist',$clist);

			$slist=db('school')->where('pid',$obj['pid'])->where('status',1)->select();
			$this->assign('slist',$slist);

			$sslist=db('community')->where('pid',$obj['pid'])->where('status',1)->select();
			$this->assign('sslist',$sslist);
		}
		
			

		//参赛分类
		$tlist=db('type')->where('pid',null)->where('status',1)->order('back_2')->select();
		$this->assign('tlist',$tlist);

		if($obj['maxid']!=0)
		{
			$maxlist=db('type')->where('pid',$obj['type'])->where('status',1)->order('back_2')->select();
			$this->assign('maxlist',$maxlist);
		}

		if($obj['minid']!=0)
		{
			$minlist=db('type')->where('pid',$obj['maxid'])->where('status',1)->order('back_2')->select();
			$this->assign('minlist',$minlist);
		}

		return view();
	}

	public function player_del()
	{
		$aid=input('post.');
		$e=db('player')->where('id',$aid['aid'])->delete();
		if($e>0)
		{
			return ['msg'=>"删除成功"];
		}
		else
		{
			return ['msg'=>"操作失败"];
		}
	}

	//查询比赛子分类
	public function gettp()
	{
		$ls=db('type')->where('pid',input('post.pid'))->where('status',1)->order('back_2')->select();
		return ['ls'=>$ls];
	}

	//用户通知列表
	public function message()
	{
		$list_message=db('message')->where('user_id',input('session.user_auth.id'))->order('id desc')->paginate(16);
		$this->assign('list_message',$list_message);
		return view();
	}

	//通知删除
	public function message_del()
	{
		$aid=input('post.');
		$e=db('message')->where('id',$aid['aid'])->delete();
		if($e>0)
		{
			return ['msg'=>"删除成功"];
		}
		else
		{
			return ['msg'=>"操作失败"];
		}
	}

	//通知状态修改
	public function message_update()
	{
		$aid=input('post.');
		$e=db('message')->where('id',$aid['aid'])->update(['look'=>1]);
		if($e>0)
		{
			return ['msg'=>"操作成功"];
		}
		else
		{
			return ['msg'=>"操作失败"];
		}
	}

	//用户通知详细
	public function message_info()
	{
		$obj=db('message')->where('id',input('message_id'))->find();
		$this->assign('obj',$obj);

		//已查看
		db('message')->where('id',input('message_id'))->update(['look'=>1]);

		return view();
	}

	//校园投稿列表
	public function module_index()
	{
		$list_record=db('activity')->where('add_id',input('session.user_auth.id'))->order('add_time desc')->paginate(16);

		$this->assign('list_record',$list_record);

		return view();
	}

	//删除投稿
	public function module_del()
	{
		$e=db('activity')->where('id',input('post.aid'))->delete();
		if($e>0)
		{
			return ['msg'=>"删除成功"];
		}
		else
		{
			return ['msg'=>"操作失败"];
		}
	}
	
	//校园投稿
	public function module_add()
	{
		if(Request()->isPost())
		{
			$data=input('post.');
			$tt=['title'=>$data['aname'],'edit'=>$data['edit'],'add_id'=>input('session.user_auth.id'),'add_name'=>input('session.user_auth.user_name'),'keywords'=>$data['keywords'],'description'=>$data['description'],'content'=>$data['content'],'esc'=>$data['esc'],'add_time'=>time()];

			 $img = request()->file('img');

			 if($img!=''){
				 $info = $img->rule('date')->move(ROOT_PATH . 'public'.DS.'uploads'.DS.'activity');
				 if($info){
						$tt['img']='/public/uploads/activity/'.$info->getSavename(); 
				 }else{
						$tt['img']='/public/admin/image/timg.jpg';
				 }
			 }else{
						$tt['img']='/public/admin/image/timg.jpg';
				 }

				if($data['tid']!=0)
				{
					$tt['tid']=$data['tid'];

					if($data['tid']==1){
						$tt['tname']="校园之声";
					}else if($data['tid']==2){
						$tt['tname']="校园院报";
					}
				}

				if($data['pid']!=0)
				{
					$tt['pid']=$data['pid'];
					$tt['pname']=db('reg')->where('id',$data['pid'])->value('name');
				}

				/*if($data['cid']!=0)
				{
					$tt['cid']=$data['cid'];
					$tt['cname']=db('reg')->where('id',$data['cid'])->value('name');
				}*/

				if($data['sid']!=0)
				{
					$tt['cid']=db('school')->where('id',$data['sid'])->value('cid');
					$tt['cname']=db('school')->where('id',$data['sid'])->value('cname');

					$tt['sid']=$data['sid'];
					$tt['sname']=db('school')->where('id',$data['sid'])->value('name');
					
					$school_user=db('school')->where('id',$data['sid'])->where('adm_id',input('session.user_auth.id'))->find();
					if(!$school_user)
					{
						$this->error('您没有所选学校的投稿权限');
					}

				}else{
					$this->error('请选择投稿学校');
				}
			
			//状态
			$tt['status']=1;

			$e=db('activity')->insert($tt);
			if($e>0)
			{
				$this->success('添加成功','usercontrol/module_add');
			}else{
				$this->error('添加失败');
			}

		}

		$plist=db('reg')->where('pid',null)->where('status',1)->order('back_2')->select();
		$this->assign('plist',$plist);

		return view();

	}

	//修改
	public function module_xlx()
	{
		if(Request()->isPost())
		{
			$data=input('post.');
			$tt=['title'=>$data['aname'],'edit'=>$data['edit'],'add_id'=>input('session.user_auth.id'),'add_name'=>input('session.user_auth.id'),'keywords'=>$data['keywords'],'description'=>$data['description'],'content'=>$data['content'],'esc'=>$data['esc'],'up_time'=>time()];

			 $img = request()->file('img');

			 if($img!=''){
				 $info = $img->rule('date')->move(ROOT_PATH . 'public'.DS.'uploads'.DS.'activity');
				 if($info){
						$tt['img']='/public/uploads/activity/'.$info->getSavename(); 
				 }
			 }

				if($data['tid']!=0)
				{
					$tt['tid']=$data['tid'];

					if($data['tid']==1){
						$tt['tname']="校园之声";
					}else if($data['tid']==2){
						$tt['tname']="校园院报";
					}
				}

				if($data['pid']!=0)
				{
					$tt['pid']=$data['pid'];
					$tt['pname']=db('reg')->where('id',$data['pid'])->value('name');
				}

				/*if($data['cid']!=0)
				{
					$tt['cid']=$data['cid'];
					$tt['cname']=db('reg')->where('id',$data['cid'])->value('name');
				}*/

				if($data['sid']!=0)
				{
					$tt['cid']=db('school')->where('id',$data['sid'])->value('cid');
					$tt['cname']=db('school')->where('id',$data['sid'])->value('cname');

					$tt['sid']=$data['sid'];
					$tt['sname']=db('school')->where('id',$data['sid'])->value('name');
					
					$school_user=db('school')->where('id',$data['sid'])->where('adm_id',input('session.user_auth.id'))->find();
					if(!$school_user)
					{
						$this->error('您没有所选学校的投稿权限');
					}

				}else{
					$this->error('请选择投稿学校');
				}
			
			//状态
			$tt['status']=1;

			$e=db('activity')->where('id',input('module_id'))->update($tt);
			if($e>0)
			{
				$this->success('修改成功','usercontrol/module_index');
			}else{
				$this->error('修改失败');
			}

		}
		$obj=db('activity')->where('id',input('module_id'))->find();
		$this->assign('obj',$obj);

		$plist=db('reg')->where('pid',null)->where('status',1)->order('back_2')->select();
		$this->assign('plist',$plist);

		$plist=db('school')->where('pid',$obj['pid'])->where('status',1)->select();
		$this->assign('slist',$plist);

		return view();

	}


	//是否重复
	public function module_cf()
	{
		$data=input('post.');
		$e=db('module')->where('name',$data['aname'])->find();
		if($e!=null)
		{
			return ["e"=>1];
		}else{
			return ["e"=>-1];
		}
	}
	
	//学校管理
	public function module_update()
	{
		if(Request()->isPost())
		{
			$data=input('post.');
			$tt=['esc'=>$data['esc'],'keywords'=>$data['keywords'],'description'=>$data['description'],'up_time'=>time()];

			$img = request()->file('img');

			 if($img!=''){
				 $info = $img->rule('date')->move(ROOT_PATH . 'public'.DS.'uploads'.DS.'module');
				 if($info){
						$tt['img']='/public/uploads/module/'.$info->getSavename(); 
				 }
			 }
	
			$e=db('school')->where('adm_id',input('session.user_auth.id'))->update($tt);
			if($e>0)
			{
				$this->success('修改成功','usercontrol/index');
			}else{
				$this->error('修改失败');
			}


		}

		$uobj=db('school')->where('adm_id',input('session.user_auth.id'))->find();
		$this->assign('obj',$uobj);
		return view();
	}

	//学校相关
	public function school_user()
	{
		if(Request()->isPost())
		{
			$data=input('post.');
			//查询用户账号
			$obj=db('user')->where('name',$data['name'])->where('status',1)->find();
			if($obj)
			{
				$tt=['user_id'=>$obj['id'],'user_name'=>$obj['name'],'name'=>$obj['user_name'],'add_time'=>time()];

				if($data['type']=='0')
				{
					$tt['tid']=0;
					$tt['tname']="志愿者";
				}else if($data['type']=='1'){
					$tt['tid']=1;
					$tt['tname']="记者";
				}

				$uobj=db('school')->where('adm_id',input('session.user_auth.id'))->find();
				if($uobj)
				{
					$tt['sid']=$uobj['id'];
					$tt['sname']=$uobj['name'];

					$e=db('school_user')->insert($tt);
					if($e>0)
					{
						$this->success('添加成功','usercontrol/school_user');
					}else{
						$this->error('操作失败');
					}
				}else{
					$this->error('权限不足！');
				}
				

			}else{
				$this->error('用户不存在或已被冻结！');
			}
		}

		$list_shool_user=db('school_user')->where('sid',db('school')->where('adm_id',input('session.user_auth.id'))->value('id'))->order('id desc')->paginate(16);
		$this->assign('list_shool_user',$list_shool_user);
		return view();
	}

	//校区报名管理
	public function index_player_school()
	{
		//查询管理者所在学校的报名信息
		$plist=db('player')->where('sid',db('school')->where('adm_id',input('session.user_auth.id'))->value('id'))->order('add_time desc')->paginate(15);
		$this->assign('plist',$plist);

		return view();
	}


	//审核报名信息
	public function school_player()
	{
		$obj=db('player')->where('id',input('player_id'))->find();

		if(request()->isPost())
		{
			$data=input('post.');
			$tt=['up_time'=>time()];
	
			$ttm=['add_time'=>time(),'add_id'=>0,'add_name'=>'系统通知','user_id'=>$obj['user_id'],'user_name'=>db('user')->where('id',$obj['user_id'])->value('name')];

			//0未审核,1审核通过,2审核失败
			if($data['stch']=='1')
			{
				
				if($data['cc']==2)
				{
					$ttm['title']="您已被淘汰";
					$ttm['content']="您已被淘汰,账户变更为普通用户";
					$tt['back_2']=$data['cc'];
					$this->player_log($obj['type_name'].'-'.$obj['maxname'].'-'.$obj['minname'],$obj['user_name'],db('user')->where('id',input('session.user_auth.id'))->value('name'),'已淘汰');
				}else{
					$ttm['title']="您的报名信息已通过审核";
					$ttm['content']="您的报名信息已通过审核";
					$tt['status']=1;
					$tt['back_2']=1;
					//发送通知
					if($obj['type']==27||$obj['type']==28||$obj['type']==31){
						send_sms_player_m($obj['tel'],'155304');
					} 

					$this->player_log($obj['type_name'].'-'.$obj['maxname'].'-'.$obj['minname'],$obj['user_name'],db('user')->where('id',input('session.user_auth.id'))->value('name'),'已审核');
				}
			}else{
				$ttm['title']="您的报名信息未通过审核";
			    $ttm['content']="您的报名信息未通过审核,原因：".$data['back_1'];
				$tt['status']=2;
				$tt['back_1']=$data['back_1'];
				$this->player_log($obj['type_name'].'-'.$obj['maxname'].'-'.$obj['minname'],$obj['user_name'],db('user')->where('id',input('session.user_auth.id'))->value('name'),'未通过审核');
			}

			$e=db('player')->where('id',$obj['id'])->update($tt);
			if($e>0)
			{
				//发送通知
				db('message')->insert($ttm);

				$this->success('修改成功','usercontrol/index_player_school');
			}else{
				$this->error('修改失败');
			}
		}

		$this->assign('obj',$obj);
		return view();
	}

	//冻结报名信息
	public function school_player_del()
	{
		$aid=input('post.');
		$e=db('player')->where('id',$aid['aid'])->delete();
		if($e>0)
		{
			return ['msg'=>"删除成功"];
		}
		else
		{
			return ['msg'=>"操作失败"];
		}
	}

	//社区报名管理
	public function index_player_community()
	{
		//查询管理者所在学校的报名信息
		$plist=db('player')->where('ssid',db('community')->where('adm_id',input('session.user_auth.id'))->value('id'))->paginate(15);
		$this->assign('plist',$plist);

		return view();
	}


	//社区审核报名信息
	public function community_player()
	{
		$obj=db('player')->where('id',input('player_id'))->find();

		if(request()->isPost())
		{
			$data=input('post.');
			$tt=['up_time'=>time()];
	
			$ttm=['add_time'=>time(),'add_id'=>0,'add_name'=>'系统通知','user_id'=>$obj['user_id'],'user_name'=>db('user')->where('id',$obj['user_id'])->value('name')];

			//0未审核,1审核通过,2审核失败
			if($data['stch']=='1')
			{
				
				if($data['cc']==2)
				{
					$ttm['title']="您已被淘汰";
					$ttm['content']="您已被淘汰,账户变更为普通用户";
					$tt['back_2']=$data['cc'];
					$this->player_log($obj['type_name'].'-'.$obj['maxname'].'-'.$obj['minname'],$obj['user_name'],db('user')->where('id',input('session.user_auth.id'))->value('name'),'已淘汰');

				}else{
					$ttm['title']="您的报名信息已通过审核";
					$ttm['content']="您的报名信息已通过审核";
					$tt['status']=1;
					$tt['back_2']=1;
					//发送通知
					if($obj['type']==27||$obj['type']==28||$obj['type']==31){
						send_sms_player_m($obj['tel'],'155304');
					} 

					$this->player_log($obj['type_name'].'-'.$obj['maxname'].'-'.$obj['minname'],$obj['user_name'],db('user')->where('id',input('session.user_auth.id'))->value('name'),'已审核');
				}
			}else{
				$ttm['title']="您的报名信息未通过审核";
			    $ttm['content']="您的报名信息未通过审核,原因：".$data['title'];
				$tt['status']=2;
				$tt['back_1']=$data['title'];
				$this->player_log($obj['type_name'].'-'.$obj['maxname'].'-'.$obj['minname'],$obj['user_name'],db('user')->where('id',input('session.user_auth.id'))->value('name'),'未通过审核');
			}

			$e=db('player')->where('id',$obj['id'])->update($tt);
			if($e>0)
			{
				//发送通知
				db('message')->insert($ttm);

				$this->success('修改成功','usercontrol/index_player_community');
			}else{
				$this->error('修改失败');
			}
		}

		$this->assign('obj',$obj);
		return view();
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

	//导出数据
	/**
	 * tp5 使用excel导出
	 * @param
	 * @author staitc7  * @return mixed
	 */
	public function excel() {

	   $name='报名信息';

	   $header=['序号','编号','地区','单位/学校','姓名','汉语拼音','性别','人数','比赛项目','类别','分组','参赛作品','指导老师','通讯地址','邮政编码','联系电话','审核状态','报名时间'];
		
	   $data=db('player')->where('sid',db('school')->where('adm_id',input('session.user_auth.id'))->value('id'))
				->field('pname,cname,sname,unit,user_name,user_euname,user_sex,user_age,race,user_sum,type_name,maxname,minname,wname,teacher,site,postcode,tel,status,back_2,add_time')
				->order('add_time asc')
				->select();

	   $this->ExcelExport($name,$header,$data);
	}

	/**
	 * excel表格导出
	 * @param string $fileName 文件名称
	 * @param array $headArr 表头名称
	 * @param array $data 要导出的数据
	 * @author static7  */
	public function ExcelExport($fileName, $headArr = [], $data = []) {

		$fileName .= "_" . date("Y_m_d", Request::instance()->time()) . ".xls";

		import('PHPExcel', EXTEND_PATH, '.php');
		$objPHPExcel = new \PHPExcel();

		$objPHPExcel->getProperties();
		$key = ord("A"); // 设置表头

		
		foreach ($headArr as $v) {
			$colum = chr($key);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum . '1', $v);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum . '1', $v);

			//字体样式  
			$objPHPExcel->getActiveSheet()->getStyle($colum . '1')->getFont()->setBold(true);
			
			$key += 1;
		}

		$column = 2; 
		$objActSheet = $objPHPExcel->getActiveSheet();

		
		//'pname,cname,sname,user_name,user_euname,user_sex,user_age,race,user_sum,type_name,maxname,minname,wname,teacher,site,postcode,tel,add_time'

		foreach ($data as $key => $rows) { // 行写入
			//序号
			$objActSheet->setCellValue('A'.$column, $key+1);
			//编号
			$objActSheet->setCellValue('B'.$column, "");
			//地区
			$objActSheet->setCellValue('C'.$column, $rows['pname']);
			//单位/学校
			$objActSheet->setCellValue('D'.$column, $rows['sname'].$rows['unit']);
			//姓名
			$objActSheet->setCellValue('E'.$column, $rows['user_name']);
			//汉语拼音
			$objActSheet->setCellValue('F'.$column, $rows['user_euname']);
			//性别
			$objActSheet->setCellValue('G'.$column, $rows['user_sex']);
			//人数
			$objActSheet->setCellValue('H'.$column, $rows['user_sum']);
			//比赛项目1
			$objActSheet->setCellValue('I'.$column, $rows['type_name']);
			//比赛类别2
			$objActSheet->setCellValue('J'.$column, $rows['maxname']);
			//比赛分组3
			$objActSheet->setCellValue('K'.$column, $rows['minname']);
			//参赛作品
			$objActSheet->setCellValue('L'.$column, $rows['wname']);
			//指导老师
			$objActSheet->setCellValue('M'.$column, $rows['teacher']);
			//通讯地址
			$objActSheet->setCellValue('N'.$column, $rows['site']);
			//邮政编码
			$objActSheet->setCellValue('O'.$column, $rows['postcode']);
			//联系电话
			$objActSheet->setCellValue('P'.$column, $rows['tel']);
			//审核状态
			if($rows['status']==1)
			{
				$objActSheet->setCellValue('Q'.$column, "已审核");
			}
			elseif($rows['back_2']==2)
			{
				$objActSheet->setCellValue('Q'.$column, "已淘汰");
			}
			else
			{
				$objActSheet->setCellValue('Q'.$column, "未审核");
			}
			//报名时间
			$objActSheet->setCellValue('R'.$column, date('Y-m-d',$rows['add_time']));

			/*$span = ord("A");
			
				foreach ($rows as $keyName => $value) { // 列写入
				
				if($keyName=='add_time'||$keyName=='user_birth')
				{
					$objActSheet->setCellValue(chr($span) . $column, date('Y-m-d',$value));
				}
				else
				{
					$objActSheet->setCellValue(chr($span) . $column, $value);
				}

				$span++;
			}*/

			$column++;
		}
		$fileName = iconv("utf-8", "gb2312", $fileName); // 重命名表
		$objPHPExcel->setActiveSheetIndex(0); // 设置活动单指数到第一个表,所以Excel打开这是第一个表
		header('Content-Type: application/vnd.ms-excel');
		header("Content-Disposition: attachment;filename='$fileName'");
		header('Cache-Control: max-age=0');
		$objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output'); // 文件通过浏览器下载
		exit();
	}

	public function player_log($type,$pname,$adm,$sts)
	{
		$content="报名分类：".$type.',报名姓名:'.$pname.",操作管理者：".$adm.',报名状态:'.$sts."时间：".date("Y-m-d H:i:s");
		file_put_contents("admin_player_log.txt",$content.PHP_EOL,FILE_APPEND);

	}
	

}