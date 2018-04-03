<?php
namespace app\admin\controller;
use think\Request;

class Report extends App 
{
    public function index()
    {
		if(input('title')!=null)
		{
			$list=db('report')->where('type',0)->where("gb_content like '%".input('title')."%' or report like '%".input('title')."%' or user_name like '%".input('title')."%' or wname like '%".input('title')."%'")->order('status asc,add_time  desc')->paginate(16,false,['query'=>array('title'=>input("title"))]);
			
			$this->assign('alist',$list);
		}
		else
		{
			$list=db('report')->where('type',0)->order('status asc,add_time desc')->paginate(16);
			
			$this->assign('alist',$list);
		}
		
        return view();
    }

	 public function index_com()
    {
		if(input('title')!=null)
		{
			$list=db('report')->where('type',1)->where("gb_content like '%".input('title')."%' or report like '%".input('title')."%' or user_name like '%".input('title')."%' or wname like '%".input('title')."%'")->order('status asc,add_time  desc')->paginate(16,false,['query'=>array('title'=>input("title"))]);
			
			$this->assign('alist',$list);
		}
		else
		{
			$list=db('report')->where('type',1)->order('status asc,add_time desc')->paginate(16);
			
			$this->assign('alist',$list);
		}
		
        return view();
    }

	 public function index_art()
    {
		if(input('title')!=null)
		{
			$list=db('report')->where('type',2)->where("gb_content like '%".input('title')."%' or report like '%".input('title')."%' or user_name like '%".input('title')."%' or wname like '%".input('title')."%'")->order('status asc,add_time  desc')->paginate(16,false,['query'=>array('title'=>input("title"))]);
			
			$this->assign('alist',$list);
		}
		else
		{
			$list=db('report')->where('type',2)->order('status asc,add_time desc')->paginate(16);
			
			$this->assign('alist',$list);
		}
		
        return view();
    }

	//修改
	public function update()
	{
		if(request()->isPost())
		{
			$data=input('post.');

			$obj=db('report')->where('id',$data['aid'])->find();

			$tt=['up_time'=>time()];

			$ttm=['add_time'=>time(),'add_id'=>0,'add_name'=>'系统通知','user_id'=>$obj['wid'],'user_name'=>db('user')->where('id',$obj['wid'])->value('name')];

			//是否删除
			$asc=0;

			//是否推荐
			if($data['checks']==1){

				foreach($data['check'] as $k=>$v)
				{
					if($v=='1')
					{
						$e1=db('user')->where('id','eq',$obj['wid'])->update(['status'=>0]);

						$ttm['title']="您的账号已被管理员冻结";
						$ttm['content']="您的账号已被管理员冻结,原因：不正当留言内容。";

						//发送通知
						db('message')->insert($ttm);

					}

					if($v=='2'){
						db('guestbook')->where('id','eq',$obj['gb_id'])->delete();
					}

					if($v=='3'){
						db('report')->where('id','eq',$obj['id'])->delete();

						$asc=1;
					}
					
				}

				$tt['status']=1;

			}
			
			if($asc==0)
			{
				$e=db('report')->where('id',$data['aid'])->update($tt);
				if($e>0)
				{
					$this->success('处理成功','report/index');
				}

			}else{
				$this->success('处理成功','report/index');
			}

			

		}

		$obj=db('report')->where('id',input('id'))->find();
		$this->assign('nobj',$obj);

		return view();
	}

	//修改
	public function update_com()
	{
		if(request()->isPost())
		{
			$data=input('post.');

			$obj=db('report')->where('id',$data['aid'])->find();

			$tt=['up_time'=>time()];

			$ttm=['add_time'=>time(),'add_id'=>0,'add_name'=>'系统通知','user_id'=>$obj['wid'],'user_name'=>db('user')->where('id',$obj['wid'])->value('name')];

			//是否删除
			$asc=0;

			//是否推荐
			if($data['checks']==1){

				foreach($data['check'] as $k=>$v)
				{
					if($v=='1')
					{
						$e1=db('user')->where('id','eq',$obj['wid'])->update(['status'=>0]);

						$ttm['title']="您的账号已被管理员冻结";
						$ttm['content']="您的账号已被管理员冻结,原因：不正当评论内容。";

						//发送通知
						db('message')->insert($ttm);

					}

					if($v=='2'){
						db('comments')->where('id','eq',$obj['gb_id'])->delete();
					}

					if($v=='3'){
						db('report')->where('id','eq',$obj['id'])->delete();

						$asc=1;
					}
					
				}

				$tt['status']=1;

			}
			
			if($asc==0)
			{
				$e=db('report')->where('id',$data['aid'])->update($tt);
				if($e>0)
				{
					$this->success('处理成功','report/index_com');
				}

			}else{
				$this->success('处理成功','report/index');
			}

			

		}

		$obj=db('report')->where('id',input('id'))->find();
		$this->assign('nobj',$obj);

		return view();
	}

	//修改
	public function update_art()
	{
		if(request()->isPost())
		{
			$data=input('post.');

			$obj=db('report')->where('id',$data['aid'])->find();

			$tt=['up_time'=>time()];

			$ttm=['add_time'=>time(),'add_id'=>0,'add_name'=>'系统通知','user_id'=>$obj['wid'],'user_name'=>db('user')->where('id',$obj['wid'])->value('name')];

			//是否删除
			$asc=0;

			//是否推荐
			if($data['checks']==1){

				foreach($data['check'] as $k=>$v)
				{
					if($v=='1')
					{
						$e1=db('user')->where('id','eq',$obj['wid'])->update(['status'=>0]);

						$ttm['title']="您的账号已被管理员冻结";
						$ttm['content']="您的账号已被管理员冻结,原因：发布不正当动态内容。";

						//发送通知
						db('message')->insert($ttm);

					}

					if($v=='2'){
						db('article')->where('id','eq',$obj['gb_id'])->delete();
					}

					if($v=='3'){
						db('report')->where('id','eq',$obj['id'])->delete();

						$asc=1;
					}
					
				}

				$tt['status']=1;

			}
			
			if($asc==0)
			{
				$e=db('report')->where('id',$data['aid'])->update($tt);
				if($e>0)
				{
					$this->success('处理成功','report/index');
				}

			}else{
				$this->success('处理成功','report/index_art');
			}

			

		}

		$obj=db('report')->where('id',input('id'))->find();
		$this->assign('nobj',$obj);

		return view();
	}

	//删除举报信息
	public function deletes()
	{
		$aid=input('post.');
		$e=db('report')->where('id',$aid['aid'])->delete();
		if($e>0)
		{
			return ['msg'=>"删除成功"];
		}
		else
		{
			return ['msg'=>"操作失败"];
		}
	}


}