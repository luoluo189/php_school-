<?php

namespace Home\Controller;
use Think\Controller;
//开启输出缓冲区
ob_start();
//开启会话
session_start();
class JssdkController extends Controller{
    public function index(){
      $jssdk=new \Common\Library\JSSDK( 'wx1c94debc4261784b','807ef7a29813c302316bec00446507c5');

        $signPackage = $jssdk->getSignPackage();
       // dump($signPackage);
        $this->assign('signPackage',$signPackage);
        $this->display();


    }
}