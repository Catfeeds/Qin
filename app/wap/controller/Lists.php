<?php
namespace app\wap\controller;
use think\Controller;
use think\Request;
use think\Db;

class Lists extends Controller
{

	public function list_player()
	{
		$list_all=db('player')->alias('a')->join('ysj_user b ','a.user_id=b.id')
						->field('a.user_id as id,a.user_name,b.img,a.up_time,a.back_3 as look')
					  ->where('a.status=1 and a.back_2!=2 and a.so_open=1')
					  ->order('a.up_time')->paginate(12);
			$this->assign('list_all',$list_all);
			if(input('param.is_ajax')){
				return $this->fetch('ajax_list_player_list');
				exit;
			}

		return $this->fetch();
	}

	public function list_school()
	{
		$list_user_school=db('user')->field('a.sid,b.name,b.img,count(a.id) as ct')
								->alias('a')
								->join('ysj_school b ','b.id=a.sid')
								->group('a.sid')
								->where('a.status',1)
								->where('a.sid','neq',0)
								->order('ct desc')
								->paginate(12);
		$this->assign('list_user_school',$list_user_school);
		

		if(input('param.is_ajax')){
			return $this->fetch('ajax_list_school_list');
			exit;
		}

		return $this->fetch();

	}

}
