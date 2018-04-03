<?php
namespace app\super_admin\controller;
use think\Request;

class News extends App 
{

	//获取图片素材
    public function index()
    {
		//获取秘钥
		$token=get_token();
		$url = "https://api.weixin.qq.com/cgi-bin/material/batchget_material?access_token=$token";
		$data=["type"=>"news", "offset"=>0, "count"=>15];
		if(input('page'))
		{
			$i=input('page');
			if($i>0)
			{
				$i=$i-1;
			}

			$data=["type"=>"news", "offset"=>$i*15, "count"=>15];
			$this->assign('page',input('page'));
		}else{
			$this->assign('page',1);
		}

		$list=curl_post($url,json_encode($data));

		$this->assign('alist',$list["item"]);
        return view();
    }

	//添加图片素材
	public function insert()
	{
		if(request()->isPost())
		{
			//上传服务器数据
			$tt=['up_time'=>time()]; 

			//图片地址
			$dir=ROOT_PATH . 'images';

			$filename="";
			$content_type="";

			$img = request()->file('img');
			$info = $img->validate(['size'=>'2097152','ext'=>'jpg,png,jpeg'])->move($dir,'');
			if($info){
				$tt['img']='images/'.$info->getFilename();
				$tt['name']=$info->getFilename();

				$filename=$info->getFilename();
				$content_type=$info->getExtension();

			}else{
				$this->error($img->getError());
			}

			

			//获取秘钥
			$token=get_token();
			$url="https://api.weixin.qq.com/cgi-bin/material/add_material?access_token=$token&type=image&media=@/images/".$info->getFilename();
			$real_path='/images/'.$info->getFilename();

			//图片数据
			$file_info=array('filename'=>$filename,
							'filelength'=>filesize('.'.$real_path),
							'content-type'=>'image/'.$content_type);
			//realpath('.'.$real_path)

			$data=array('media'=>'@'.realpath('.'.$real_path),'form-data'=>$file_info);

			$list=curl_post($url,json_encode($data,JSON_UNESCAPED_UNICODE));
			
			dump($data);
			dump($list);
			exit;

			try
			{
				$tt['media_id']=$list['media_id'];
				$tt['url']=$list['url'];

			}
			catch(Exception $e)
			{
				
			}


		}

		return view('add');
	}

	//修改
	public function update()
	{
		

		return view();
	}

	//删除
	public function deletes()
	{
		
	}

	


}