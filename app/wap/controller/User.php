<?php
namespace app\wap\controller;
use think\Controller;
use think\Request;
use think\Db;

class User extends App
{
    public function index()
    {
		
		return $this->fetch();
	}

	public function info()
	{
		if(request()->isPost())
		{
			$data=input('post.');
			
			//'pwd'=>md5($data['pwd']),
			$tt=['user_name'=>$data['user_name'],'user_age'=>$data['user_age'],'user_sex'=>$data['user_sex'],'race'=>$data['race'],'tel'=>$data['tel'],'type'=>$data['tp'],'esc'=>$data['esc'],'up_time'=>time()];

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

				$tt['cid']=db('school')->where('id',$data['sid'])->value('cid');
				$tt['cname']=db('school')->where('id',$data['sid'])->value('cname');

				$tt['sid']=$data['sid'];
				$tt['sname']=db('school')->where('id',$data['sid'])->value('name');

			}else{

				$tt['pid']=$data['pid'];
				$tt['pname']=db('reg')->where('id',$data['pid'])->value('name');

				$tt['sid']=null;
				$tt['sname']=null;

			}

			$e=db('user')->where('id',input('session.m_user_auth.id'))->update($tt);
			if($e>0)
			{
				//更新session数据
				session('m_user_auth.name', $tt['user_name']);
				session('m_user_auth.user_img', db('user')->where('id',input('session.m_user_auth.id'))->value('img'));

				$this->success('修改成功','user/record');
			}else{
				$this->error('修改失败');
			}

		}

		$obj=db('user')->where('id',input('session.m_user_auth.id'))->find();
		$this->assign('obj',$obj);
		
		$plist=db('reg')->where('pid',null)->where('status',1)->order('back_2')->field('id as value,name as text')->select();
	
		$this->assign('plist',json_encode($plist));

		if($obj['pid']!=0)
		{
			$slist=db('school')->where('pid',$obj['pid'])->where('status',1)->order('id')->field('id as value,name as text')->select();
			$this->assign('slist',json_encode($slist));
		}

		return $this->fetch();
	}
	
	
	public function record()
	{
		$lists=db('record')->where('wid',input('session.m_user_auth.id'))->where('type!=1')->order('add_time desc')->paginate(10);

		$this->assign('lists',$lists);
		
		if(input('param.is_ajax')){
			return $this->fetch('ajax_record_list');
			exit;
		}
		return $this->fetch();
	}
	
	public function record_del()
	{
		$data=input('post.');
		$e=db('record')->where('id',$data['id'])->delete();
		if($e>0)
		{
			return json(['status'=>1,'message'=>'删除成功！']);
		}
		else
		{
			return json(['status'=>0,'message'=>'删除失败！']);
		}
	}

	public function article()
	{
		$lists=db('article')->where('user_id',input('session.m_user_auth.id'))->where('status',1)->order('id desc')->paginate(16);

		$lists_json=json_decode(json_encode($lists),true)['data'];
		
		foreach($lists_json as $k=>$v)
		{
			$match = array();
			$pattern="/<img.+src=\"?(.+\.(jpg|png|jpeg))\"?.+>/i";
			preg_match_all($pattern,$v['content'],$match);
			
			if($match[1]!=null)
				$lists_json[$k]['json_img']=$match[1][0];
			else
				$lists_json[$k]['json_img']="/";
		}
		
		
		$this->assign('lists',$lists_json);

		if(input('param.is_ajax')){
			return $this->fetch('ajax_record_list');
			exit;
		}

		return $this->fetch();
	}

	//动态删除
	public function article_del()
	{
		$aid=input('post.');
		$e=db('article')->where('id',$aid['id'])->delete();
		if($e>0)
		{
			//同时删除点赞记录和评论
			db('praise')->where('wid',$aid['id'])->delete();
			db('comments')->where('nid',$aid['id'])->delete();
			
			return json(['status'=>1,'message'=>'删除成功！']);;
		}
		else
		{
			return json(['status'=>1,'message'=>'操作失败！']);;
		}
	}

	public function article_add_from()
	{
		
		return $this->fetch();
	}

	public function article_add()
	{
		
		return $this->fetch();
	}

	//发布动态
	public function user_art_add()
	{
		$data=input('post.');
			
		if($data['content']=='')
		{
			$this->error('内容不能为空！');
		}

		$tt=['content'=>$data['content'],'esc'=>$data['esc'],'user_id'=>input('session.m_user_auth.id'),'user_name'=>input('session.m_user_auth.name'),'add_time'=>time(),'status'=>1];
		$e=db('article')->insert($tt);
		if($e>0)
		{
			//积分+1
			int_number(input('session.user_auth.id'),1);

			$this->success('发布成功！');
		}else{
			$this->error('发布失败！');
		}
	}
	
	public function guestbook()
	{
		//留言列表
		$lists=db('guestbook')->where('wid',input('session.m_user_auth.id'))->where('status',1)->order('id desc')->paginate(10);
		$this->assign('lists',$lists);
		
		if(input('param.is_ajax')){
			return $this->fetch('ajax_guestbook_list');
			exit;
		}
		return $this->fetch();
	}
	
	public function guestbook_del()
	{
		$data=input('post.');
		$e=db('guestbook')->where('id',$data['id'])->delete();
		if($e>0)
		{
			return json(['status'=>1,'message'=>'删除成功！']);
		}
		else
		{
			return json(['status'=>0,'message'=>'删除失败！']);
		}
	}
	
	public function photo()
	{
		if(request()->isPost())
		{
			$data=input('post.');
			$files=request()->file('img');

			if($files==null){
				echo "<script>parent.callback('上传失败！',true)</script>"; return;
			}
			
			//是否有四张
			$content=db('hpoto')->where('user_id',input('session.m_user_auth.id'))->select();
			if(count($content)>=4)
			{
				//echo "<script>parent.callback('最多上传四张',false)</script>"; return;
			}
			$tt=['user_id'=>input('session.m_user_auth.id'),'user_name'=>input('session.m_user_auth.name'),'status'=>1];
			//foreach($files as $file)
			//{
				$info = $files->validate(['size'=>2048000,'ext'=>"jpg,png,jpeg"])->rule('date')->move(ROOT_PATH . 'public'.DS.'uploads'.DS.'photo');
				if($info){
					$tt['add_time']=time();
					$tt['img']='/public/uploads/photo/'.$info->getSavename();
					//$e+=db('photo')->insert($tt);
				}
			//}
			$e=db('hpoto')->insert($tt);
			if($e>0)
			{
				//积分+1
				int_number(input('session.user_auth.id'),1);

				echo "<script>parent.callback('上传成功！',true)</script>"; return;
			}else{
				echo "<script>parent.callback('上传失败,图片大小限制2M之内,且仅限jpg,png,jpeg格式！',false)</script>"; return;
			}
		}
		$lists=db('hpoto')->where('user_id',input('session.m_user_auth.id'))->where('status',1)->order('id desc')->paginate(10);
		$this->assign('lists',$lists);
		
		if(input('param.is_ajax')){
			return $this->fetch('ajax_photo_list');
			exit;
		}
		return $this->fetch();
	}
	
	public function photo_del()
	{
		$data=input('post.');
		$e=db('hpoto')->where('id',$data['id'])->delete();
		if($e>0)
		{
			return json(['status'=>1,'message'=>'删除成功！']);
		}
		else
		{
			return json(['status'=>0,'message'=>'删除失败！']);
		}
	}
	
	public function msg()
    {
		$lists=db('message')->where('user_id',input('session.m_user_auth.id'))->order('id desc')->paginate(10);
		$this->assign('lists',$lists);
		
		if(input('param.is_ajax')){
			return $this->fetch('ajax_msg_list');
			exit;
		}
		return $this->fetch();
	}
	
	//通知删除
	public function msg_del()
	{
		$data=input('post.');
		$e=db('message')->where('id',$data['id'])->delete();
		if($e>0)
		{
			return json(['status'=>1,'message'=>'删除成功！']);
		}
		else
		{
			return json(['status'=>0,'message'=>'删除失败！']);
		}
	}
	
	public function editpwd()
	{
		if(request()->isPost())
		{
			$data=input('post.');
			$user=db('user')->where('id',input('session.m_user_auth.id'))->where('status',1)->find();
			if($user){ 
				if(md5($data['password']) == $user['pwd']){
					$tt=['pwd'=>md5($data['newpassword']),'up_time'=>time()];
					$e=db('user')->where('id',input('session.m_user_auth.id'))->update($tt);
					if($e>0)
					{
						return json(['status'=>1,'message'=>'修改成功！']);
					}else{
						return json(['status'=>0,'message'=>'修改失败']);
					}
				}else { 
					return json(['status'=>0,'message'=>'原密码错误！']);
				}
            	
            } else { 
                return json(['status'=>0,'message'=>'此账号不存在或被冻结！']);
            }
			
		}
		
		return $this->fetch();
	}

	public function index_player()
	{
		$plist=db('player')->where('user_id',input('session.m_user_auth.id'))->paginate(15);
		$this->assign('lists',$plist);
		if(input('param.is_ajax')){
			return $this->fetch('ajax_index_player_list');
			exit;
		}

		return $this->fetch();
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
			$obj_ff=db('player')->where('user_id='.input('session.m_user_auth.id')." and type=".$data['type_id']." and maxid=".$data['maxid']." and minid=".$data['minid']." and id!=".$obj['id'])->find();

			if($obj_ff)
			{
				$this->error('您已报名：'.db('type')->where('id',$data['type'])->value('name').' '.db('type')->where('id',$data['maxid'])->value('name').' '.db('type')->where('id',$data['minid'])->value('name').' '.'大赛,无法重复提交');
			}


			//作品:wid-----上传作品关联
			$tt=['pid'=>$data['pid'],'pname'=>db('reg')->where('id',$data['pid'])->value('name'),'user_id'=>input('session.m_user_auth.id'),'user_name'=>$data['user_name'],'user_euname'=>pinyin($data['user_name']),'user_age'=>$data['user_age'],'user_sex'=>$data['user_sex'],'race'=>$data['race'],'user_birth'=> strtotime($data['user_birth']),'site'=>$data['site'],'postcode'=>$data['postcode'],'tel'=>$data['tel'],'unit'=>$data['unit'],'type'=>$data['type_id'],'type_name'=>db('type')->where('id',$data['type_id'])->value('name'),'maxid'=>$data['maxid'],'maxname'=>db('type')->where('id',$data['maxid'])->value('name'),'minid'=>$data['minid'],'minname'=>db('type')->where('id',$data['minid'])->value('name'),'esc'=>$data['esc'],'intro'=>$data['intro'],'teacher'=>$data['teacher'],'wname'=>$data['wname'],'rec'=>$data['rec'],'rectel'=>$data['rectel'],'back_4'=>$data['tp'],'add_time'=>time()];

			if($data['so_open']=="是"){
				$tt['so_open']=1;
			}else{
				$tt['so_open']=0;
			}

			//审核失败后报名状态修改为二次提交
			if($obj['status']==2)
			{
				$tt['status']=3;
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
			
			$img = request()->file('img');

			if($img!=''){
				 $info = $img->rule('date')->move(ROOT_PATH . 'public'.DS.'uploads'.DS.'player');
				 if($info){
						$tt['img']='/public/uploads/player/'.$info->getSavename(); 
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
				$this->success('修改成功','user/index_player');
			}else{
				$this->error('修改失败');
			}

		}

		
		$this->assign('obj',$obj);

		//地区信息
		$plist=db('reg')->where('pid',null)->where('status',1)->order('back_2')->field('id as value,name as text')->select();
		$this->assign('plist',json_encode($plist));

		$slist=db('school')->where('pid',$obj['pid'])->where('status',1)->order('add_time')->field('id as value,name as text')->select();
		$this->assign('slist',json_encode($slist));

		$sslist=db('community')->where('pid',$obj['pid'])->where('status',1)->order('add_time')->field('id as value,name as text')->select();
		$this->assign('sslist',json_encode($sslist));

		//参赛分类
		$tlist=db('type')->where('pid',null)->where('status',1)->order('back_2')->field('id as value,name as text')->select();
		$this->assign('tlist',json_encode($tlist));

		$mlist=db('type')->where('pid',$obj['type'])->where('status',1)->order('back_2')->field('id as value,name as text')->select();
		$this->assign('mlist',json_encode($mlist));

		
		$nlist=db('type')->where('pid',$obj['maxid'])->where('status',1)->order('back_2')->field('id as value,name as text')->select();
		$this->assign('nlist',json_encode($nlist));
		

		return view();
	}

	public function player_del()
	{
		$aid=input('post.');
		$e=db('player')->where('id',$aid['id'])->delete();
		if($e>0)
		{
			return json(['status'=>1,'message'=>'删除成功！']);
		}
		else
		{
			return json(['status'=>0,'message'=>'删除失败！']);
		}
	}

	//动态图片上传
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
