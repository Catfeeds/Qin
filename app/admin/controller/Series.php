<?php
namespace app\admin\controller;

class Series extends App
{
    public function index()
    {
		
		if(input("title")!=null)
		{
			$list=db('series')->where('name','like','%'.input("title").'%')->order('back_2')->paginate(100,false,['query'=>array('title'=>input("title"))]);
			
			$this->assign('alist',$list);
		}
		else
		{
			$list=db('series')->order('back_2')->paginate(100);
			
			$this->assign('alist',$list);
		}
        return view();
    }

	//添加
	public function insert()
	{
		if(Request()->isPost())
		{
			$data=input('post.');

			$tt=['name'=>$data['aname'],'content'=>$data['content'],'add_time'=>time()];

			$img=Request()->file('img');
			if($img!=''){
				 $info = $img->rule('date')->move(ROOT_PATH . 'public'.DS.'uploads'.DS.'series');
				 if($info){
						$tt['img']='/public/uploads/series/'.$info->getSavename(); 
				 }else{
						$tt['img']='/public/admin/image/timg.jpg';
				 }
			 }else{
						$tt['img']='/public/admin/image/timg.jpg';
			}
			
			//上级权限
			if($data['pid']!='0')
			{
				$obj=db('series')->where('id',$data['pid'])->find();
				$tt['pid']=$obj['id'];
				$tt['pname']=$obj['name'];

				//排序数字
				$objt=db('series')->where('pid',$data['pid'])->order('back_2 desc')->limit(1)->select();
				if($objt){
					
					$tt['back_2']=$objt[0]['back_2']+1;
				}else{
					$tt['back_2']=$obj['back_2']+1;
				}
			}
			else
			{
				//排序数字
				$obj=db('series')->where('pid',null)->order('back_2 desc')->limit(1)->select();
				
				if($obj){
					$tt['back_2']=$obj[0]['back_2']+100;
				}else{
					$tt['back_2']=100;
				}
			}

			//状态
			
			if($data['stch']=='1')
			{
				$tt['status']=1;
			}
			else
			{
				$tt['status']=0;
			}

			//是否推荐
		if($data['checks']==1){

			$tt['back_1']=0;
			$tt['back_2']=0;

			foreach($data['check'] as $k=>$v)
			{
				if($v=='1')
				{
					$tt['back_1']=1;
				}
				else if($v=='2')
				{
					$tt['back_2']=1;
				}
				
			}
		}else{
			$tt['back_1']=0;
			$tt['back_2']=0;
		}
			

			$e=db('series')->insert($tt);
			if($e>0)
			{
				$this->success('添加成功','series/insert');
			}
			else
			{
				$this->error('添加失败');
			}

		}
		
		$ll=db('series')->where('pid',null)->where('status',1)->select();
		
		$this->assign('alist',$ll);

		return view('add');
		
	}

	//是否重复
	public function cf()
	{
		$data=input('post.');
		$e=db('series')->where('name',$data['aname'])->where('id','neq',$data['aid'])->find();
		if($e!=null)
		{
			return ["e"=>1];

		}else{
			return ["e"=>-1];
		}
	}

	//修改
	public function update()
	{
		if(Request()->isPost())
		{
			$data=input('post.');
			$oobj=db('series')->where('id',$data['jid'])->find();
			$tt=['name'=>$data['aname'],'content'=>$data['content'],'up_time'=>time()];

			$img=Request()->file('img');
			if($img!=''){
				 $info = $img->rule('date')->move(ROOT_PATH . 'public'.DS.'uploads'.DS.'series');
				 if($info){
						$tt['img']='/public/uploads/series/'.$info->getSavename(); 
				 }
			 }
			
			//是否更新权限等级
			$aa=null;
			if($data['pid']!='0')
			{
				$aa=$data['pid'];
			}

			if($oobj['pid']!=$aa){
				//上级权限
				if($data['pid']!='0')
				{
					$obj=db('series')->where('id',$data['pid'])->find();
					$tt['pid']=$obj['id'];
					$tt['pname']=$obj['name'];

					//排序数字
					$objt=db('series')->where('pid',$data['pid'])->order('back_2 desc')->limit(1)->select();
					if($objt){
						$tt['back_2']=$objt[0]['back_2']+1;
					}else{
						$tt['back_2']=$obj['back_2']+1;
					}
				}
				else
				{
					//排序数字
					$tt['pid']=null;
					$tt['pname']=null;
					$obj=db('series')->where('pid',null)->order('back_2 desc')->limit(1)->select();
					if($obj){
						$tt['back_2']=$obj[0]['back_2']+100;
					}else{
						$tt['back_2']=100;
					}
				}
			}

			
			//状态
			
			if($data['stch']=='1')
			{
				$tt['status']=1;
			}else
			{
				$tt['status']=0;
			}

				//是否推荐
		if($data['checks']==1){

			$tt['back_1']=0;
			$tt['back_2']=0;

			foreach($data['check'] as $k=>$v)
			{
				if($v=='1')
				{
					$tt['back_1']=1;
				}
				else if($v=='2')
				{
					$tt['back_2']=1;
				}
				
			}
		}else{
			$tt['back_1']=0;
			$tt['back_2']=0;
		}
			

			$e=db('series')->where('id',$data['jid'])->update($tt);
			if($e>0)
			{
				$this->success('修改成功','series/index');
			}
			else
			{
				$this->error('修改失败');
			}

		}

		if(!input('id'))
		{
			$this->error('数据传输错误');
		}

		$juris_obj=db('series')->where('id',input('id'))->find();

		$ll=db('series')->where('pid',null)->where('status',1)->select();
		
		$this->assign('alist',$ll);
		$this->assign('jobj',$juris_obj);

		return view();
	}


	//删除
	public function deletes()
	{
		$aid=input('post.');
		$e=db('series')->where('id',$aid['aid'])->delete();
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