<?php
namespace app\super_admin\controller;
use think\Request;

class Button extends App 
{

	//获取菜单列表
    public function index()
    {
		$list=db('wcbutton')->order('back_1 asc')->paginate(15);

		$this->assign('alist',$list);

        return view();
    }

	//添加按钮
	public function insert()
	{
		if(request()->isPost())
		{
			$data=input('post.');
			
			$tt=['name'=>$data['name'],'pid'=>$data['pid']];
			if($data['pid']=='1')
			{
				$tt['type']=$data['type'];
				$tt['url']=$data['url'];
			}

			if($data['pid']=='2')
			{
				$tt['pname']=$data['pname'];
				$tt['type']=$data['type'];
				$tt['url']=$data['url'];
			}

			//上级权限
			if($data['pid']!='0')
			{
				$obj=db('wcbutton')->where('id',$data['pname'])->find();
				//排序数字
				$objt=db('wcbutton')->where('pname',$data['pname'])->order('back_1 desc')->limit(1)->select();
				if($objt){
					
					$tt['back_1']=$objt[0]['back_1']+1;
				}else{
					$tt['back_1']=$obj['back_1']+1;
				}
			}
			else
			{
				//排序数字
				$obj=db('wcbutton')->where('pid',0)->order('back_1 desc')->limit(1)->select();
				
				if($obj){
					$tt['back_1']=$obj[0]['back_1']+100;
				}else{
					$tt['back_1']=100;
				}
			}

			$e=db('wcbutton')->insert($tt);

			if($e>0){
				$this->success('添加成功！','button/insert');
			}else{
				$this->error('添加失败！');
			}


		}
		//查询所有一级菜单
		$list=db('wcbutton')->where('pid',0)->order('back_1 asc')->select();
		$this->assign('list',$list);

		return view('add');
	}

	//修改
	public function update()
	{
		$obj=db('wcbutton')->where('id',input('bt_id'))->find();
		$this->assign('obj',$obj);

		if(request()->isPost())
		{
			$data=input('post.');
			
			$tt=['name'=>$data['name'],'pid'=>$data['pid']];
			if($data['pid']=='1')
			{
				$tt['type']=$data['type'];
				$tt['url']=$data['url'];
			}
			else if($data['pid']=='2')
			{
				$tt['pname']=$data['pname'];
				$tt['type']=$data['type'];
				$tt['url']=$data['url'];
			}else{
				$tt['pname']=null;
				$tt['type']=null;
				$tt['url']=null;
			}

			//是否更新权限等级
			if($data['pid']==$obj['pid']){
				//上级权限
				if($data['pid']!='0')
				{
					$obj=db('wcbutton')->where('id',$data['pname'])->find();
					//排序数字
					$objt=db('wcbutton')->where('pname',$data['pname'])->order('back_1 desc')->limit(1)->select();
					if($objt){
						
						$tt['back_1']=$objt[0]['back_1']+1;
					}else{
						$tt['back_1']=$obj['back_1']+1;
					}
				}
				else
				{
					//排序数字
					$obj=db('wcbutton')->where('pid',0)->order('back_1 desc')->limit(1)->select();
					
					if($obj){
						$tt['back_1']=$obj[0]['back_1']+100;
					}else{
						$tt['back_1']=100;
					}
				}
			}


			$e=db('wcbutton')->where('id',$obj['id'])->update($tt);

			if($e>0){
				$this->success('修改成功！','button/insert');
			}else{
				$this->error('修改失败！');
			}


		}
		
		//查询所有一级菜单
		$list=db('wcbutton')->where('pid',0)->order('back_1 asc')->select();
		$this->assign('list',$list);
		return view();
	}

	//删除
	public function deletes()
	{
		$e=db('wcbutton')->where('id',input('post.aid'))->delete();
		if($e>0)
		{
			return ['msg'=>"删除成功"];
		}
		else
		{
			return ['msg'=>"操作失败"];
		}
		
	}

	//同步数据到公众号
	public function get_wc_caidan()
	{
		
		//"type"=>"view_limited","name"=>"了解艺术节","media_id"=>"Cyv65nvICSJwS8q1rhIFFJqkFFHzYdKaRhJAOyWmkro",

		//查询一级菜单数据
		$list_t=db('wcbutton')->where('pid','neq','2')->order('back_1 asc')->select();

		$arraylist=[];
		foreach($list_t as $k=>$v)
		{
			//拼接元素
			$ts=[];
			if($v['pid']==0)
			{
				//列表菜单
				$list_s=db('wcbutton')->where('pname','eq',$v['id'])->order('back_1 asc')->select();
				$ts=['name'=>$v['name']];

				$tts=[];

				foreach($list_s as $j=>$s)
				{
					$tss=[];
					if($s['type']=="click"){
						//推送图文
						$tss=["type"=>"click",
							"name"=>$s['name'],
							"key"=>$s['url']];
					}else if($s['type']=="view_limited"){
						//跳转图文
						$tss=["type"=>"view_limited",
							"name"=>$s['name'],
							"media_id"=>$s['url']];
					}else if($s['type']=="view"){
						//跳转网页
						$tss=["type"=>"view",
							"name"=>$s['name'],
							"url"=>$s['url']];
					}
					array_push($tts,$tss);
				}

				$ts['sub_button']=$tts;

			}
			else
			{
				if($v['type']=="click"){
					//推送图文
					$ts=["type"=>"click",
						"name"=>$v['name'],
						"key"=>$v['url']];
				}else if($v['type']=="view_limited"){
					//跳转图文
					$ts=["type"=>"view_limited",
						"name"=>$v['name'],
						"media_id"=>$v['url']];
				}else if($v['type']=="view"){
					//跳转网页
					$ts=["type"=>"view",
						"name"=>$v['name'],
						"url"=>$v['url']];
				}
			}

			//放入大数组中
			array_push($arraylist,$ts);
		}

		$tt=[];
		$tt["button"]=$arraylist;

		$data=json_encode($tt,JSON_UNESCAPED_UNICODE);

		//获取秘钥
		$token=get_token();

		$url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=$token";

		$curl = curl_init();
		curl_setopt($curl,CURLOPT_URL,$url);  //地址
		curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0); //检查认证来源
		curl_setopt($curl,CURLOPT_USERAGENT,$_SERVER['HTTP_USER_AGENT']); //模拟使用用户浏览器
		curl_setopt($curl,CURLOPT_AUTOREFERER,1); //自动跳转
		curl_setopt($curl, CURLOPT_TIMEOUT, 30);//超时限制防止死循环
		curl_setopt($curl,CURLOPT_HEADER,0); //显示header区域内容
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1 );  //以文件流返回结果
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		$res = curl_exec($curl);
		if(curl_error($curl)){
			echo 'Errno'.curl_error($curl);
		}
		curl_close($curl);
		$json_obj = json_decode($res,true);

		if($json_obj['errcode']=="0")
		{
			return ['msg'=>"数据同步成功"];
		}
		else
		{
			return ['msg'=>"数据同步失败"];
		}
	}


	


}