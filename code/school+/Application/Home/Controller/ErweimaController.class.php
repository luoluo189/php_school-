<?php
namespace Home\Controller;

use Think\Controller;

class ErweimaController extends Controller
{
    public function index()
    {
	    $wechatObj = new \Common\Library\Wechat();
		$accessToken = $wechatObj->getAccessToken();
		//上传永久图片
		$response=$this->getInfo($accessToken);
		dump($response);

    }
    public function getInfo($accessToken){
    	$wechatObj = new \Common\Library\Wechat();
    	$url="https://api.weixin.qq.com/scan/product/get?access_token=$accessToken";
    	$data='{
                 "keystandard": "ean13",
                 "keystr": "6900873042720"
                }';
		$result = $wechatObj->getInfo($url,$data);
		return $result;

    }
}