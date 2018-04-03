<?php
namespace app\admin\controller;

class Types extends App
{
    public function index()
    {
		
		if(input("title")!=null)
		{
			$list=db('type')->where('name','like','%'.input("title").'%')->order('back_2')->paginate(100,false,['query'=>array('title'=>input("title"))]);
			
			$this->assign('alist',$list);
		}
		else
		{
			$list=db('type')->order('back_2')->paginate(100);
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

			$tt=['name'=>$data['aname'],'add_time'=>time()];
			
			//上级权限
			if($data['pid']!='0')
			{
				$obj=db('type')->where('id',$data['pid'])->find();
				$tt['pid']=$obj['id'];
				$tt['pname']=$obj['name'];

				//排序数字
				$objt=db('type')->where('pid',$data['pid'])->order('back_2 desc')->limit(1)->select();
				//一级还是二级
				if($obj['pid']==null){
					//二级分类
					if($objt){
						$tt['back_2']=$objt[0]['back_2']+100;
					}else{
						$tt['back_2']=$obj['back_2']+100;
					}
					$tt['back_1']="2";
				}else{
					//三级分类
					if($objt){
						$tt['back_2']=$objt[0]['back_2']+1;
					}else{
						$tt['back_2']=$obj['back_2']+1;
					}
					$tt['back_1']="3";
				}
				
			}
			else
			{
				//排序数字
				$obj=db('type')->where('pid',null)->order('back_2 desc')->limit(1)->select();
				if($obj){
					$tt['back_2']=$obj[0]['back_2']+10000;
				}else{
					$tt['back_2']=10000;
				}

				$tt['back_1']="1";
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
			

			$e=db('type')->insert($tt);
			if($e>0)
			{
				$this->success('添加成功','types/insert');
			}
			else
			{
				$this->error('添加失败');
			}

		}
		
		$ll=db('type')->where('pid',null)->where('status',1)->order('back_2')->select();
		foreach($ll as $kay=>$value)
		{
			$ls=db('type')->where('pid',$value['id'])->where('status',1)->order('back_2')->select();
			if($ls){
				$ll[$kay]['children']=$ls;
			}else{
				$ll[$kay]['children']=0;
			}
		}

		$this->assign('alist',$ll);

		return view('add');
		
	}

	//是否重复
	public function cf()
	{
		$data=input('post.');
		$e=db('type')->where('name',$data['aname'])->where('id','neq',$data['aid'])->find();
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
			$oobj=db('type')->where('id',$data['aid'])->find();
			$tt=['name'=>$data['aname'],'add_time'=>time()];
			
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
					$obj=db('type')->where('id',$data['pid'])->find();
					$tt['pid']=$obj['id'];
					$tt['pname']=$obj['name'];
					//排序数字
					$objt=db('type')->where('pid',$data['pid'])->order('back_2 desc')->limit(1)->select();
					//一级还是二级
					if($obj['pid']==null){
						//二级分类
						if($objt){
							$tt['back_2']=$objt[0]['back_2']+100;
						}else{
							$tt['back_2']=$obj['back_2']+100;
						}
						$tt['back_1']="2";
					}else{
						//三级分类
						if($objt){
							$tt['back_2']=$objt[0]['back_2']+1;
						}else{
							$tt['back_2']=$obj['back_2']+1;
						}
						$tt['back_1']="3";
					}
					
				}
				else
				{
					$tt['pid']=null;
					$tt['pname']=null;
					//排序数字
					$obj=db('type')->where('pid',null)->order('back_2 desc')->limit(1)->select();
					if($obj){
						$tt['back_2']=$obj[0]['back_2']+10000;
					}else{
						$tt['back_2']=10000;
					}
					$tt['back_1']="1";
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

			//同步其下所有子分类
			$slist=db('type')->where("pid",$data['aid'])->select();
			foreach($slist as $k=>$v)
			{
				db('type')->where('id',$v['id'])->update(['status'=>$data['stch'],'up_time'=>time()]);
				$sslist=db('type')->where("pid",$v['id'])->select();
				if($sslist)
				{
					foreach($sslist as $j=>$y)
					{
						db('type')->where('id',$y['id'])->update(['status'=>$data['stch'],'up_time'=>time()]);
					}
				}
			}

			$e=db('type')->where('id',$data['aid'])->update($tt);
			if($e>0)
			{
				$this->success('修改成功','types/index');
			}
			else
			{
				$this->error('修改失败');
			}

		}
		
		$ll=db('type')->where('pid',null)->where('status',1)->order('back_2')->select();
		foreach($ll as $k=>$v)
		{
			$ls=db('type')->where('pid',$v['id'])->where('status',1)->order('back_2')->select();
			if($ls){
				$ll[$k]['children']=$ls;
			}else{
				$ll[$k]['children']=0;
			}
		}
		$this->assign('alist',$ll);

		$type_obj=db('type')->where('id',input('id'))->find();

		$this->assign('tobj',$type_obj);

		return view();
		
	}


	//删除
	public function deletes()
	{
		$aid=input('post.');
		$e=db('type')->where('id',$aid['aid'])->delete();
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