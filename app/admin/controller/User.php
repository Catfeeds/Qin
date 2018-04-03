<?php
namespace app\admin\controller;
use think\Request;

class User extends App
{
    public function index()
    {
		$cps=" 1=1";

		if(input('session.admin_auth.sid')!='0')
		{
			$cps.=" sid=".input('session.admin_auth.sid');
		}else if(input('session.admin_auth.cid')!='0'){
			$cps.=" cid=".input('session.admin_auth.cid');
		}else if(input('session.admin_auth.pid')!='0'){
			$cps.=" pid=".input('session.admin_auth.pid');
		}

		//区分虚拟用户
		//$cps['identity']=1;

		//分页参数
		$pgs=array();

		if(input('title')&&input('title')!="")
		{
			
			$cps.=" and (name like '%".input('title')."%' or user_name like '%".input('title')."%')";

			$pgs['title']=input('title');
		}

		$list=db('user')->where($cps)->order('id')->paginate(16,false,['query'=>$pgs]);
		$this->assign('alist',$list);
		
        return view();
    }

	//添加
	public function insert()
	{
		if(Request()->isPost())
		{
			$data=input('post.');
			$tt=['name'=>$data['aname'],'pwd'=>md5($data['pwd']),'user_name'=>$data['user_name'],'user_age'=>$data['age'],'user_sex'=>$data['sex'],'race'=>$data['race'],'tel'=>$data['tel'],'type'=>$data['tp'],'esc'=>$data['esc'],'Live'=>$data['live'],'add_time'=>time()];

			 $img = request()->file('img');
			
			 if($img!=''){
				 $info = $img->rule('date')->move(ROOT_PATH . 'public'.DS.'uploads'.DS.'user');
				 if($info){
						$tt['img']='/public/uploads/user/'.$info->getSavename(); 
				 }else{
						$tt['img']='/public/index/user/user_img.png';
				 }
			 }else{
						$tt['img']='/public/index/user/user_img.png';
				 }

			if($data['tp']=='1'){

				$tt['pid']=$data['pid'];
				$tt['pname']=db('reg')->where('id',$data['pid'])->value('name');

				$tt['cid']=$data['cid'];
				$tt['cname']=db('reg')->where('id',$data['cid'])->value('name');

				$tt['sid']=$data['sid'];
				$tt['sname']=db('school')->where('id',$data['sid'])->value('name');

			}else{

				$tt['pid']=$data['pid'];
				$tt['pname']=db('reg')->where('id',$data['pid'])->value('name');

				$tt['cid']=$data['cid'];
				$tt['cname']=db('reg')->where('id',$data['cid'])->value('name');

			}

			//状态
			if($data['stch']=='1')
			{
				$tt['status']=1;
			}else{
				$tt['status']=0;
			}

			$e=db('user')->insert($tt);
			if($e>0)
			{
				$this->success('添加成功','user/insert');
			}else{
				$this->error('添加失败');
			}


		}

		$plist=db('reg')->where('pid',null)->where('status',1)->order('back_2')->select();
		$this->assign('plist',$plist);
		return view('add');
	}

	//删除
	public function deletes()
	{
		$aid=input('post.');
		$e=db('user')->where('id',$aid['aid'])->delete();
		if($e>0)
		{
			//删除相片，留言，动态

			return ['msg'=>"删除成功"];
		}
		else
		{
			return ['msg'=>"操作失败"];
		}
	}

	//账号是否重复
	public function cf()
	{
		$data=input('post.');
		$e=db('user')->where('name',$data['aname'])->where('id','neq',$data['aid'])->find();
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

	//修改
	public function update()
	{
		if(Request()->isPost())
		{
			$data=input('post.');
			//'name'=>$data['aname'],
			$tt=['user_name'=>$data['user_name'],'user_age'=>$data['age'],'user_sex'=>$data['sex'],'race'=>$data['race'],'tel'=>$data['tel'],'type'=>$data['tp'],'esc'=>$data['esc'],'Live'=>$data['live'],'up_time'=>time()];
			if($data['pwd']!="")
			{
				$tt['pwd']=md5($data['pwd']);
			}

			$img = request()->file('img');
			 if($img!=''){
				 $info = $img->rule('date')->move(ROOT_PATH . 'public'.DS.'uploads'.DS.'user');
				 if($info){
						$tt['img']='/public/uploads/user/'.$info->getSavename(); 
				 }else{
						$tt['img']='/public/admin/image/timg.jpg';
				 }
			 }

			if($data['tp']=='1'){

				$tt['pid']=$data['pid'];
				$tt['pname']=db('reg')->where('id',$data['pid'])->value('name');

				$tt['cid']=$data['cid'];
				$tt['cname']=db('reg')->where('id',$data['cid'])->value('name');

				$tt['sid']=$data['sid'];
				$tt['sname']=db('school')->where('id',$data['sid'])->value('name');

			}else{

				$tt['pid']=$data['pid'];
				$tt['pname']=db('reg')->where('id',$data['pid'])->value('name');

				$tt['cid']=$data['cid'];
				$tt['cname']=db('reg')->where('id',$data['cid'])->value('name');

				$tt['sid']=null;
				$tt['sname']=null;

			}

			$ttm=['add_time'=>time(),'add_id'=>0,'add_name'=>'系统通知','user_id'=>$data['uid'],'user_name'=>db('user')->where('id',$data['uid'])->value('name')];

			//状态
			if($data['stch']=='1')
			{
				$tt['status']=1;

				$ttm['title']="您的账号已被管理员冻结";
			    $ttm['content']="您的账号已被管理员冻结";

			}else{
				$tt['status']=0;

				$ttm['title']="您的账号已被管理员冻结";
			    $ttm['content']="您的账号已被管理员冻结";
				
			}

			$e=db('user')->where('id',$data['uid'])->update($tt);
			if($e>0)
			{
				//发送通知
				db('message')->insert($ttm);

				$this->success('修改成功','user/index');
			}else{
				$this->error('修改失败');
			}
		}

		$obj=db('user')->where('id',input('id'))->find();
		$this->assign('uobj',$obj);

		$plist=db('reg')->where('pid',null)->where('status',1)->order('back_2')->select();
		$this->assign('plist',$plist);

		if($obj['pid']!=0)
		{
			$clist=db('reg')->where('pid',$obj['pid'])->where('status',1)->order('back_2')->select();
			$this->assign('clist',$clist);
		}

		if($obj['pid']!=0)
		{
			$slist=db('school')->where('pid',$obj['pid'])->where('status',1)->order('id')->select();
			$this->assign('slist',$slist);
		}

		return view();
	}

	//动态列表
	public function art_list()
    {
		if(input("times")!=null)
		{
			$list=db('article')->where('user_id',input('aid'))->where("FROM_UNIXTIME(add_time, '%Y-%m-%d')=".input('times'))->order('id desc')->paginate(16,false,['query'=>array('times'=>input("times"),'aid'=>input("aid"))]);
			$this->assign('alist',$list);
			$this->assign('aid',input('aid'));
		}else{
			$list=db('article')->where('user_id',input('id'))->order('id desc')->paginate(16);
			$this->assign('alist',$list);
			$this->assign('aid',input('id'));
		}
        return view();
    }

	//修改动态状态
	public function art_update()
	{
		$e=db('article')->where('id',input('post.aid'))->update(['status'=>input('post.stt'),'up_time'=>time()]);
		if($e>0){
			return ['msg'=>"状态修改成功",'codo'=>1];
		}else{
			return ['msg'=>"状态修改失败",'codo'=>0];
		}
		
	}
	//删除动态
	public function art_delete()
	{
		$aid=input('post.');
		$e=db('article')->where('id',$aid['aid'])->delete();
		if($e>0)
		{
			//同时删除收藏记录和评论
			//db('collect')->where('wid',$aid['aid'])->delete();
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

	//详细
	public function art_xx()
	{
		if(request()->isPost()){
			$e=db('article')->where('id',input('id'))->update(['status'=>input('post.stch'),'up_time'=>time()]);
			if($e>0)
			{
				$this->success('修改成功','user/art_list?id='.input('uid'));
			}else{
				$this->error('修改失败');
			}
		}

		$obj=db('article')->where('id',input('id'))->find();
		$this->assign('art',$obj);

		return view();
	}
	//评论
	public function p_list()
	{
		if(input('times')!=null){
			$list=db('comments')->where('nid',input('aid'))->where("FROM_UNIXTIME(add_time, '%Y-%m-%d')=".input('times'))->order('id desc')->paginate(16,false,['query'=>array('times'=>input("times"),'aid'=>input("aid"))]);
			$this->assign('alist',$list);
			$this->assign('aid',input('aid'));
		}else{
			$list=db('comments')->where('nid',input('id'))->order('id desc')->paginate(16);
			$this->assign('alist',$list);
			$this->assign('aid',input('id'));
		}
		$this->assign('uid',input('uid'));

		return view();
	}
	//修改评论状态
	public function p_update()
	{
		$e=db('comments')->where('id',input('post.aid'))->update(['status'=>input('post.stt'),'up_time'=>time()]);
		if($e>0){
			return ['msg'=>"状态修改成功",'codo'=>1];
		}else{
			return ['msg'=>"状态修改失败",'codo'=>0];
		}
		
	}
	//删除评论
	public function p_delete()
	{
		$aid=input('post.');
		$e=db('comments')->where('id',$aid['aid'])->delete();
		if($e>0)
		{
			//同时删除点赞记录和回复记录
			//db('praise')->where('wid',$aid['aid'])->delete();
			//db('comments')->where('pid',$aid['aid'])->delete();
			$this->pra_each_del($aid['aid']);
			

			return ['msg'=>"删除成功"];
		}
		else
		{
			return ['msg'=>"操作失败"];
		}
	}

	public function p_xx()
	{
		if(request()->isPost()){
			$e=db('comments')->where('id',input('post.aid'))->update(['status'=>input('post.stch'),'up_time'=>time()]);
			if($e>0)
			{
				$this->success('修改成功','user/p_list?aid='.input('post.nid'));
			}else{
				$this->error('修改失败');
			}
		}
		$obj=db('comments')->where('id',input('id'))->find();
		$this->assign('p',$obj);
		return view();
	}

	//浏览/点赞
	public function z_list()
	{
		if(input("times")!=null)
		{
			$list=db('praise')->where('wid',input('aid'))->where("FROM_UNIXTIME(add_time, '%Y-%m-%d')=".input('times'))->order('id desc')->paginate(16,false,['query'=>array('times'=>input("times"),'aid'=>input("aid"))]);
			$this->assign('alist',$list);
			$this->assign('aid',input('aid'));
		}else{
			$list=db('praise')->where('wid',input('id'))->order('id desc')->paginate(16);
			$this->assign('alist',$list);
			$this->assign('aid',input('id'));
		}
		$this->assign('uid',input('uid'));

		return view();
	}
	//修改浏览状态
	public function z_update()
	{
		$e=db('praise')->where('id',input('post.aid'))->update(['status'=>input('post.stt'),'up_time'=>time()]);
		if($e>0){
			return ['msg'=>"状态修改成功",'codo'=>1];
		}else{
			return ['msg'=>"状态修改失败",'codo'=>0];
		}
		
	}
	//删除点赞
	public function z_delete()
	{
		$aid=input('post.');
		$e=db('praise')->where('id',$aid['aid'])->delete();
		if($e>0)
		{
			return ['msg'=>"删除成功"];
		}
		else
		{
			return ['msg'=>"操作失败"];
		}
	}

	//相册列表
	public function img_list()
    {
		if(input("times")!=null)
		{
			$list=db('hpoto')->where('user_id',input('aid'))->where("FROM_UNIXTIME(add_time, '%Y-%m-%d')=".input('times'))->order('id desc')->paginate(16,false,['query'=>array('times'=>input("times"),'aid'=>input("aid"))]);
			$this->assign('alist',$list);
			$this->assign('aid',input('aid'));
		}else{
			
			$list=db('hpoto')->where('user_id',input('id'))->order('id desc')->paginate(16);
			$this->assign('alist',$list);
			$this->assign('aid',input('id'));
		}
        return view();
    }

	//修改相册状态
	public function img_update()
	{
		$e=db('hpoto')->where('id',input('post.aid'))->update(['status'=>input('post.stt'),'up_time'=>time()]);
		if($e>0){
			return ['msg'=>"状态修改成功",'codo'=>1];
		}else{
			return ['msg'=>"状态修改失败",'codo'=>0];
		}
		
	}
	//删除相册
	public function img_delete()
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
	public function gb_list()
    {
		if(input("times")!=null)
		{
			$list=db('guestbook')->where('user_id',input('aid'))->where("FROM_UNIXTIME(add_time, '%Y-%m-%d')=".input('times'))->order('id desc')->paginate(16,false,['query'=>array('times'=>input("times"),'aid'=>input("aid"))]);
			$this->assign('alist',$list);
			$this->assign('aid',input('aid'));
		}else{
		
			$list=db('guestbook')->where('user_id',input('id'))->order('id desc')->paginate(16);
			$this->assign('alist',$list);
			$this->assign('aid',input('id'));
		}
        return view();
    }

	//修改留言状态
	public function gb_update()
	{
		$e=db('guestbook')->where('id',input('post.aid'))->update(['status'=>input('post.stt'),'up_time'=>time()]);
		if($e>0){
			return ['msg'=>"状态修改成功",'codo'=>1];
		}else{
			return ['msg'=>"状态修改失败",'codo'=>0];
		}
		
	}
	//删除留言
	public function gb_delete()
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








	//日志
	public function ri_list()
	{
		if(input("times")!=null){
			$list=db('record')->where('user_id',input('aid'))->where("FROM_UNIXTIME(add_time, '%Y-%m-%d')=".input('times'))->order('id desc')->paginate(16,false,['query'=>array('times'=>input("times"),'aid'=>input("aid"))]);
			$this->assign('alist',$list);
			$this->assign('aid',input('aid'));
		}else{
			$list=db('record')->where('user_id',input('id'))->paginate(16);
			$this->assign('alist',$list);
			$this->assign('aid',input('id'));
		}
		return view();
	}
	//删除日志
	public function ri_delete()
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

	//用户账号确定
	public function cof()
	{
		$obj=db('user')->where('name',input('post.uname'))->value('id');
		return ['obj'=>$obj];
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

}