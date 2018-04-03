<?php
namespace app\wap\controller;
use think\Controller;
use think\Request;
use think\Db;

class Bbs extends Controller
{
    public function index()
    {
		//所有资讯
		$lists=db('series')->where("status=1")->order('back_2')->select();
		$this->assign('lists',$lists);
		return $this->fetch();
	}
	
	public function bbs()
    {
		//所有资讯
		$lists=db('module')->where('status=1 and tid='.input('series_id'))->order('id desc')->select();
		$this->assign('lists',$lists);
		return $this->fetch();
	}
	
	public function lists()
    {
		//模块
		$obj=db('module')->where('id',input('module_id'))->find();
		$this->assign('obj',$obj);
		
		//查询条件
		$map='status=1 and module_id='.input('module_id');
		//排行
		$pp='back_3 desc,back_4 desc,id desc';
		//排序方式
		$type=1;

		if(input('type')==2)
		{
			$map.=" and look>0";
			$pp='look desc';
			$type=2;
		}

		if(input('type')==3)
		{
			$map.=" and back_3=1";
			$type=3;
		}

		if(input('type')==4)
		{
			$pp="id desc";
			if(input('?session.user_auth.id')){$map.=" and user_id=".input('session.user_auth.id');}
			$type=4;
		}


		$this->assign('type',$type);

		//模块动态
		$lists=db('articlem')->where($map)->order($pp)->paginate(10);
		$this->assign('lists',$lists);
		if(input('param.is_ajax')){
			return $this->fetch('ajax_lists_list');
			exit;
		}
		
		//增加浏览量
		db('module')->where('id',input('module_id'))->setInc('look');
		return $this->fetch();
	}
	
	public function art_info()
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

		return $this->fetch();
	}
}
