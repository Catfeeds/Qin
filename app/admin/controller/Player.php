<?php
namespace app\admin\controller;
use think\Request;

class Player extends App 
{
    public function index()
    {
		//初始化搜索
		$cps='1=1';
		session('cps',$cps);

		if(input('session.admin_auth.sid')!='0')
		{
			$cps.=' and sid='.input('session.admin_auth.sid');
		}else if(input('session.admin_auth.cid')!='0'){
			$cps.=' and cid='.input('session.admin_auth.cid');
		}else if(input('session.admin_auth.pid')!='0'){
			$cps.=' and pid='.input('session.admin_auth.pid');
		}

		//管理者权限
		$juit=" and (";
		$ooo=0;
		$qx=explode(',',db('admin')->where('id',input('session.admin_auth.id'))->value('auth'));

		foreach($qx as $k=>$v)
		{
			if($v=='77')
			{
				$juit.=('back_4=1');
				$ooo.=1;
			}
			else if($v=='78')
			{
				if($ooo==1)
				{
					$juit.=(' or back_4=0');
				}else{
					$juit.=('back_4=0');
				}

			}
		}

		if($ooo==0)
		{
			$juit.=(' back_4=1 or back_4=0');
		}

		$juit.=")";

		$cps.=$juit;

		//分页参数
		$pgs=array();

		if(input('title')&&input('title')!="")
		{
			$cps.=" and (user_name like '%".input('title')."%' or sname like '%".input('title')."%')";
			$pgs['title']=input('title');
		}

		if(input('type')&&input('type')!="")
		{
			$cps.=" and type =".input('type');
			$pgs['type']=input('type');
		}

		if(input('maxid')&&input('maxid')!="")
		{
			$cps.=" and maxid =".input('maxid');
			$pgs['maxid']=input('maxid');
		}

		if(input('minid')&&input('minid')!="")
		{
			$cps.=" and minid =".input('minid');
			$pgs['minid']=input('minid');
		}

		if(input('back_2')&&input('back_2')!="")
		{
			$cps.=" and back_2 =".input('back_2');
			$pgs['back_2']=input('back_2');
		}

		//更新session
		session('cps',$cps);

		
		$list=db('player')
				->where($cps)
				->order('add_time asc')
				->paginate(16,false,['query'=>$pgs]);
		$this->assign('alist',$list);


		//参赛分类
		$tlist=db('type')->where('pid',null)->order('back_2')->select();
		$this->assign('tlist',$tlist);

		
        return view();
    }

	//查询子分类
	public function gettp()
	{
		$list=db('type')->where('pid',input('post.pid'))->order('back_2')->select();
		return ['ls'=>$list];
	}



	//审核
	public function update()
	{
		$obj=db('player')->where('id',input('id'))->find();

		if(request()->isPost())
		{
			$data=input('post.');
			$tt=['up_time'=>time()];
	
			$ttm=['add_time'=>time(),'add_id'=>0,'add_name'=>'系统通知','user_id'=>$obj['user_id'],'user_name'=>db('user')->where('id',$obj['user_id'])->value('name')];

			//0未审核,1审核通过,2审核失败
			if($data['stch']=='1')
			{
				$ttm['title']="您的报名信息已通过审核";
			    $ttm['content']="您的报名信息已通过审核";
				$tt['status']=1;
				$tt['back_2']=1;
				
				//发送通知
				if($obj['type']==27||$obj['type']==28||$obj['type']==31){
					send_sms_player_m($obj['tel'],'155304');
				}
				
				$content="：".$obj['name'].",时间：".date("Y-m-d H:i:s");
				file_put_contents("dx_log_text.txt",$content.PHP_EOL,FILE_APPEND);
				

			}else{
				$ttm['title']="您的报名信息未通过审核";
			    $ttm['content']="您的报名信息未通过审核,原因：".$data['title'];
				$tt['status']=2;
				$tt['back_1']=$data['title'];
			}

			if($data['stch']==1)
			{
				$tt['back_2']=$data['cc'];
				if($data['cc']==2)
				{
					$ttm['title']="您已被淘汰";
					$ttm['content']="您已被淘汰,账户变更为普通用户";
				}
			}

			$e=db('player')->where('id',$data['pid'])->update($tt);
			if($e>0)
			{
				//发送通知
				db('message')->insert($ttm);

				$this->success('修改成功','player/index');
				
			}else{
				$this->error('修改失败');
				
			}
		}

		$this->assign('pobj',$obj);
		return view();
	}

	//审核---弹出层
	public function update_()
	{
		$obj=db('player')->where('id',input('id'))->find();

		if(request()->isPost())
		{
			$data=input('post.');
			$tt=['up_time'=>time()];
	
			$ttm=['add_time'=>time(),'add_id'=>0,'add_name'=>'系统通知','user_id'=>$obj['user_id'],'user_name'=>db('user')->where('id',$obj['user_id'])->value('name')];

			//0未审核,1审核通过,2审核失败
			if($data['stch']=='1')
			{
				
				$tt['status']=1;
				if($data['cc']==2)
				{
					$ttm['title']="您已被淘汰";
					$ttm['content']="您已被淘汰,账户变更为普通用户";
					$tt['back_2']=$data['cc'];
					$this->player_log($obj['type_name'].'-'.$obj['maxname'].'-'.$obj['minname'],$obj['user_name'],db('user')->where('id',input('session.user_auth.id'))->value('name'),'已淘汰');
				}else{
					$ttm['title']="您的报名信息已通过审核";
					$ttm['content']="您的报名信息已通过审核";
					$tt['back_2']=1;
					//发送通知
					if($obj['type']==27||$obj['type']==28||$obj['type']==31){
						send_sms_player_m($obj['tel'],'155304');
					} 

					$this->player_log($obj['type_name'].'-'.$obj['maxname'].'-'.$obj['minname'],$obj['user_name'],db('admin')->where('id',input('session.admin_auth.id'))->value('name'),'已审核');
				}
			}else{
				$ttm['title']="您的报名信息未通过审核";
			    $ttm['content']="您的报名信息未通过审核,原因：".$data['title'];
				$tt['status']=2;
				$tt['back_1']=$data['title'];
				$this->player_log($obj['type_name'].'-'.$obj['maxname'].'-'.$obj['minname'],$obj['user_name'],db('admin')->where('id',input('session.admin_auth.id'))->value('name'),'未通过审核');
			}

			$e=db('player')->where('id',$data['pid'])->update($tt);
			if($e>0)
			{
				//发送通知
				db('message')->insert($ttm);

				//$this->success('修改成功','player/index');
				echo "<script>parent.callback('修改成功',".$data['pid'].",".$data['stch'].",".$data['cc'].");</script>"; return;
			}else{
				//$this->error('修改失败');
				echo "<script>parent.callback('修改失败',".$data['pid'].",".$data['stch'].",".$data['cc'].");</script>"; return;
			}
		}

		$this->assign('pobj',$obj);
		return view();
	}

	//报名信息 
	public function player()
	{
		//判断报名状态
		$obj=db('player')->where('id',input('player_id'))->find();
		
		if(!$obj)
		{
			$this->error('报名信息未找到！');
		}

		if(request()->isPost())
		{
			$data=input('post.');

			//判断报名状态
			if($obj){
				if($obj['status']==1)
				{
					//$this->error('报名信息已通过审核,无法重复修改');
				}
			}

			//作品:wid-----上传作品关联

			$tt=['pid'=>$data['pid'],'pname'=>db('reg')->where('id',$data['pid'])->value('name'),'user_id'=>$obj['user_id'],'user_name'=>$data['user_name'],'user_euname'=>pinyin($data['user_name']),'user_age'=>$data['user_age'],'user_sex'=>$data['user_sex'],'race'=>$data['race'],'user_birth'=> strtotime($data['user_birth']),'site'=>$data['site'],'postcode'=>$data['postcode'],'tel'=>$data['tel'],'unit'=>$data['unit'],'type'=>$data['type'],'type_name'=>db('type')->where('id',$data['type'])->value('name'),'maxid'=>$data['maxid'],'maxname'=>db('type')->where('id',$data['maxid'])->value('name'),'minid'=>$data['minid'],'minname'=>db('type')->where('id',$data['minid'])->value('name'),'esc'=>$data['esc'],'intro'=>$data['intro'],'teacher'=>$data['teacher'],'wname'=>$data['wname'],'rec'=>$data['rec'],'rectel'=>$data['rectel'],'so_open'=>$data['so_open'],'back_4'=>$data['tp'],'add_time'=>time()];

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
				$this->success('修改成功');
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
		$tlist=db('type')->where('pid',null)->order('back_2')->select();
		$this->assign('tlist',$tlist);

		if($obj['maxid']!=0)
		{
			$maxlist=db('type')->where('pid',$obj['type'])->order('back_2')->select();
			$this->assign('maxlist',$maxlist);
		}

		if($obj['minid']!=0)
		{
			$minlist=db('type')->where('pid',$obj['maxid'])->order('back_2')->select();
			$this->assign('minlist',$minlist);
		}

		return view();
	}

	//删除
	public function deletes()
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

	//动态列表
	public function art_list()
    {
		if(request()->isPost())
		{
			$list=db('article')->where('user_id',input('aid'))->where('add_time',input('times'))->order('id desc')->paginate(16);
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
			$e=db('article')->where('id',input('post.aid'))->update(['status'=>input('post.stch'),'up_time'=>time()]);
			if($e>0)
			{
				$this->success('修改成功','player/art_list');
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
		if(request()->isPost()){
			$list=db('comments')->where('nid',input('aid'))->where('add_time',input('times'))->paginate(16);
			$this->assign('alist',$list);
			$this->assign('aid',input('aid'));
		}else{
			$list=db('comments')->where('nid',input('id'))->paginate(16);
			$this->assign('alist',$list);
			$this->assign('aid',input('id'));
		}
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
				$this->success('修改成功','player/p_list');
			}else{
				$this->error('修改失败');
			}
		}
		$obj=db('comments')->where('id',input('id'))->find();
		$this->assign('p',$obj);
		return view();
	}
	//浏览
	public function z_list()
	{
		if(request()->isPost())
		{
			$list=db('praise')->where('wid',input('aid'))->where('add_time',input('times'))->paginate(16);
			$this->assign('alist',$list);
			$this->assign('aid',input('aid'));
		}else{
			$list=db('praise')->where('wid',input('id'))->paginate(16);
			$this->assign('alist',$list);
			$this->assign('aid',input('id'));
		}
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
	//删除浏览
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

	//作品信息
    public function getworks()
	{
		if(request()->isPost())
		{
			$obj=db('works')->where('id',input('wid'))->update(['status'=>input('post.stch'),'up_time'=>time()]);
			if($e>0)
			{
				$this->success('修改成功','player/index');
			}else{
				$this->error('修改失败');
			}
			
		}
		else
		{
			$obj=db('works')->where('id',input('id'))->find();
			$this->assign('w',$obj);
			$obj=db('player')->where('id',input('id'))->find();
			$this->assign('pobj',$obj);
			
		}
		return view('works');
	}

	//短信管理
    public function player_tel()
	{
		if(request()->isPost())
		{
			$data=input('post.');
			return $this->tel_duanxin($data['tid'],$data['type']);	
		}

		return view();
	}


	
	public function getvote()
	{
		return view('vote');
	}

	//批量打印
	public function print_list()
	{
		$cps=session('cps');

		if(input('d1'))
		{
			//按个人
			$obj=db('player')->where($cps)->order('pid desc,cid desc,sid desc,user_id asc,type asc,maxid asc,minid asc,add_time asc')->select();
			$this->assign('obj_list',$obj);
		}
		else
		{
			//按比赛分类
			$obj=db('player')->where($cps)->order('type asc,maxid asc,minid asc,pid desc,cid desc,sid desc,add_time asc')->select();
			$this->assign('obj_list',$obj);
		}
		

		return view();
	}



	//导出数据
	/**
	 * tp5 使用excel导出
	 * @param
	 * @author staitc7  * @return mixed
	 */
	public function excel() {

	   $name='报名信息';

	   $header=['序号','编号','地区','单位/学校','姓名','汉语拼音','性别','人数','比赛项目','类别','分组','参赛作品','指导老师','通讯地址','邮政编码','联系电话','审核状态','比赛状态','报名时间'];

	   $cps=session('cps');

	   $data=db('player')->where($cps)
				->field('pname,cname,sname,unit,user_name,user_euname,user_sex,user_age,race,user_sum,type_name,maxname,minname,wname,teacher,site,postcode,tel,status,back_2,add_time')
				->order('pid desc,cid desc,sid desc,type asc,maxid asc,minid asc,add_time asc')
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
			$objActSheet->setCellValue('A'.$column, $key+=1);
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
			else
			{
				$objActSheet->setCellValue('Q'.$column, "未审核");
			}
			
			//比赛状态
			if($rows['back_2']==0)
			{
				$objActSheet->setCellValue('R'.$column, "未审核");
			}
			else if($rows['back_2']==2)
			{
				$objActSheet->setCellValue('R'.$column, "已淘汰");
			}
			else
			{
				$objActSheet->setCellValue('R'.$column, "已审核");
			}
			
			//报名时间
			$objActSheet->setCellValue('S'.$column, date('Y-m-d',$rows['add_time']));

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
		header("Content-Disposition: attachment;filename=$fileName");
		header('Cache-Control: max-age=0');
		$objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output'); // 文件通过浏览器下载
		exit();
	}


	//短信通知
	public function tel_duanxin($tid,$type=0)
	{	
		$list=db('player')->where('status',1)->field('tel')->group('tel')->select();
		$sum_y=0;
		$sum_n=0;
		foreach($list as $k=>$v)
		{
			$dd=send_sms_player_m($v['tel'],$tid);
			if($dd['status']==1)
			{	
				$sum_y+=1;
			}else{
				$sum_n+=1;
			}
		}

		return ['max'=>count($list),'sum_y'=>$sum_y,'sum_n'=>$sum_n];
	}

	public function player_log($type,$pname,$adm,$sts)
	{
		$content="报名分类：".$type.',报名姓名:'.$pname.",操作管理者：".$adm.',报名状态:'.$sts."时间：".date("Y-m-d H:i:s");
		file_put_contents("admin_player_log.txt",$content.PHP_EOL,FILE_APPEND);

	}


}