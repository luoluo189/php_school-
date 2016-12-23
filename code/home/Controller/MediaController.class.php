<?php
namespace Home\Controller;
use Think\Controller;

class MediaController extends Controller{
	public function index(){
		$wechatObj = new \Common\Library\Wechat();
		$accessToken = $wechatObj->getAccessToken();
		//上传永久图片
		//$response=$this->addMedia($accessToken, 'image/png','test1.png');
		//将生成的media_id存到数据库
	//	$data = array();
	//	$data['media_id']=$response['media_id'];
	//	$data['url']=$response['url'];

//		$imagesModel = M('images');
//		$imagesModel->add($data);//添加数据

//		dump($response);
//		获取素材列表
		$response=$this->getMediaList($accessToken,'imagesText',10,100);
		dump($response);
		//添加图文消息
//		$response = $this->addNews($accessToken);
//		dump($response);
	}
	/**
	 * 上传永久素材
	 */
	public function addMedia($accessToken,$type,$filename){
		$wechatObj = new \Common\Library\Wechat();
		$url="https://api.weixin.qq.com/cgi-bin/material/add_material?access_token=$accessToken&type=$type";
		$filePath=$_SERVER['DOCUMENT_ROOT'].'/wechat1011/'.$filename;
		dump($filePath);
		$formData=array(
			'filename'=>$_SERVER['DOCUMENT_ROOT'].$filename,
			'filelengh'=>filesize($filePath),
			'content-type'=>'image/png'
		);
		$result = $wechatObj->addMedia($url,$filePath,$formData);
		return $result;
	}
	/**
	 * 获取素材列表
	 */
	public function getMediaList($accessToken,$type,$offset,$count){	
		$url="https://api.weixin.qq.com/cgi-bin/material/batchget_material?access_token=$accessToken";
		$data = '{"type":"'.$type.'","offset":"'.$offset.'","count":"'.$count.'"}';
		$result=\Common\Library\Wechat::getMediaList($url,$data);
		return $result;  
	}
	/**
	 * 获取素材
	 */
	public function getMedia($media){
		//直接从浏览器访问即可
	}
	/**
	 * 上传图文消息
	 */
	public function addNews($accessToken){
		$wechatObj = new \Common\Library\Wechat();
		$url = "https://api.weixin.qq.com/cgi-bin/material/add_news?access_token=$accessToken";
 		$data = '{
		  "articles": [{
		       "title": "百度",
		       "thumb_media_id": "lsXm_bp5QbGXqv53PEUQblU8so2HUM95YutxtqyLZSk",
		       "author": "张志敏",
		       "digest": "链接到百度网站",
		       "show_cover_pic": 1,
		       "content": "<h1>百度</h1>",
		       "content_source_url": "https://www.baidu.com"
		    },
		    //若新增的是多图文素材，则此处应还有几段articles结构
		 ]
		}';
		$news = $wechatObj->addNews($url,$data);
		return $news;
	}

	/**
	 * 上传永久图片
	 */
	public function addPicture(){
		if($_FILES['picture']){
			$file = $_FILES['picture'];
			$file['name']=iconv("UTF-8","gb2312", $file['name']);
			$filePath = $_SERVER['DOCUMENT_ROOT'].__ROOT__.'/Public/uploads/'.$file['name'];//网站根目录地址
			if(move_uploaded_file($file['tmp_name'], $filePath)){
				$file['name']=iconv("gb2312","UTF-8", $file['name']);
				
				//将文件上传至微信服务器
				$wechatObj = new \Common\Library\Wechat();
				$accessToken =  $wechatObj->getAccessToken();
				$url="https://api.weixin.qq.com/cgi-bin/material/add_material?access_token=$accessToken&type=image";
				$formData=array(
					'filename'=>$filePath,
					'filelengh'=>filesize($filePath),
					'content-type'=>$file['type']
				);
				$result = $wechatObj->addMedia($url,$filePath,$formData);
               // dump($result);
  				$imageModel = M('images');
  				$data=array();
  				$data['mediaId'] = $result['media_id'];
  				$data['picUrl'] = $result['url'];
  				$data['filepath'] = $file['name'];
  				if($imageModel->add($data)){
  					//去管理图片页
  					$images=$imageModel->select();
  					$this->assign('images',$images);
  					$this->display('managePicture');
  				}
			}
		}else{
			$this->display();
		}
		
	}
	public function managePicture(){
		$imageModel = M('images');
		$images=$imageModel->select();
  		$this->assign('images',$images);
  		$this->display();
	}

	/**
	 * 添加图文消息
	 */
	public function addPictureText(){
		if(I('submit')){
			$news = array();
			$obj = array();
			$news['title'] = I('title');
			$news['thumb_media_id']=I('thumb_media_id');
			$news['author'] = I('author');
			$news['digest'] = I('digest');
			$news['show_cover_pic'] = I('show_cover_pic');
			$new['content'] = I('content');
			$news['content_source_url'] = I('content_source_url');
			$news['content'] = I('content');
			$obj['articles'][0] = $news;

			$wechatObj = new \Common\Library\Wechat();
			$accessToken = $wechatObj->getAccessToken();
			$url = "https://api.weixin.qq.com/cgi-bin/material/add_news?access_token=$accessToken";
			$data = json_encode($obj,JSON_UNESCAPED_UNICODE);
			$result=$wechatObj->addNews($url,$data);;
			$resultObj = json_decode($result);
//            dump($resultObj);
			$imagetextModel=M('imagetext');
			$data=array();
			$data['mediaid']=$resultObj->media_id;
			if($imagetextModel->add($data)){
				$medias = $imagetextModel->select();
				$this->assign('medias',$medias);
				$this->display('managePictureText');
			}

		}else{
			$this->display();
		}
		
	}
	public function managePictureText(){
		$imagetextModel=M('imagetext');
		$medias = $imagetextModel->select();
		$this->assign('medias',$medias);
		$this->display('managePictureText');
	}
	public  function deletePicture(){
        $wechatObj = new \Common\Library\Wechat();
        $accessToken = $wechatObj->getAccessToken();
	    $url="https://api.weixin.qq.com/cgi-bin/material/del_material?access_token=$accessToken";
//        $id=I('post.id');
        $id=28;
        $images =M('images');
        $tt['id']=$id;

        $mediaid =$images->where($tt)->select();
        dump($mediaid);
//        exit;
        $mediaid=$mediaid[0]['mediaid'];

        $josn = "{'media_id':'$mediaid'}";
        dump($josn);
//        exit;
        $ret = \Common\Library\Wechat::https_request($url,$josn);
       ;
        $result =$images->where($tt)->delete();
        echo "chegnogng ";
    }
    public  function deletePicturetext(){
        $wechatObj = new \Common\Library\Wechat();
        $accessToken = $wechatObj->getAccessToken();
        $url="https://api.weixin.qq.com/cgi-bin/material/del_material?access_token=$accessToken";
        $id=I('post.id');
//        dump($id);
        $imageText =M('imagetext');
        $tt['id']=$id;
        $mediaid =$imageText->where($tt)->select();
        dump($mediaid);

        $mediaid=$mediaid[0]['mediaid'];

        $josn = "{'media_id':'$mediaid'}";
        dump($josn);
//        exit;
        $ret = \Common\Library\Wechat::https_request($url,$josn);

        $result =$imageText->where($tt)->delete();
        echo "chegnogng ";
    }
}

?>