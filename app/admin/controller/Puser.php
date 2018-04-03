<?php
namespace app\admin\controller;
use think\Request;

class Puser extends App
{
    public function index()
    {
		$cps=array();
		if(input('session.admin_auth.sid')!='0')
		{
			$cps['sid']=input('session.admin_auth.sid');
		}else if(input('session.admin_auth.cid')!='0'){
			$cps['cid']=input('session.admin_auth.cid');
		}else if(input('session.admin_auth.pid')!='0'){
			$cps['pid']=input('session.admin_auth.pid');
		}

		//区分虚拟用户
		$cps['identity']=0;

		//分页参数
		$pgs=array();

		if(input('title')&&input('title')!="")
		{
			$cps.=" and (user_name like '%".input('title')."%' or sname like '%".input('title')."%')";
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

			//账户默认信息
			$tt=['pwd'=>md5(rand(123456,999999)),'user_name'=>'用户昵称','img'=>'/public/index/user/user_img.png','user_age'=>rand(19,24),'race'=>'汉','type'=>$data['tp'],'Live'=>'#','identity'=>0,'add_time'=>time()];

			if(rand(1,2)==1)
			{
				$tt['user_sex']='女';
			}else{
				$tt['user_sex']='男';
			}

			//状态
			if($data['stch']=='1')
			{
				$tt['status']=1;
			}else{
				$tt['status']=0;
			}

			//查询学校条件
			$cps="status=1";

			//判断添加范围
			if($data['sid']!=0)
			{
				$cps.=" and id=".$data['sid'];
			}else if($data['cid']!=0){
				$cps.=" and cid=".$data['cid'];
			}else if($data['pid']!=0){
				$cps.=" and pid=".$data['pid'];
			}

			$school_list=db('school')->where($cps)->select();

			//生成账号/手机号码
			$arr = array(
				130,131,132,133,134,135,136,137,138,139,
				144,147,
				150,151,152,153,155,156,157,158,159,
				176,177,178,
				180,181,182,183,184,185,186,187,188,189,
			);

			//成功次数
			$e=0;
			foreach($school_list as $k=>$v)
			{
				//绑定学校
				$tt['pid']=$v['pid'];
				$tt['pname']=$v['pname'];

				$tt['cid']=$v['cid'];
				$tt['cname']=$v['cname'];

				$tt['sid']=$v['id'];
				$tt['sname']=$v['name'];

				//每所学校添加多少
				for($i=0;$i<$data['number'];$i++){

					$tel=$arr[array_rand($arr)].mt_rand(1000,9999).mt_rand(1000,9999);

					$tt['name'] = $tel;
					$tt['tel'] = $tel;
					
					$e.=db('user')->insert($tt);

				}
			}

			if($e>=count($school_list))
			{
				$this->success('添加成功','puser/insert');

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
			return ['msg'=>"删除成功"];
		}
		else
		{
			return ['msg'=>"操作失败"];
		}
	}

	//批量删除
	public function pl_del()
	{
		$e=db('user')->where('id in ('.input('post.idlist').')')->delete();

		if($e>0)
		{
			return ['msg'=>"删除成功"];
		}
		else
		{
			return ['msg'=>"操作失败"];
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

	

}