<?php
namespace Home\Controller;
//开启输出缓冲区
ob_start();
//开启会话
session_start();

use Think\Controller;


class IndexController extends Controller
{
    public function _before_index(){

        //接收code的值
        $code=I('code');
        //	dump($code);

        //2、获取access_token的值
        $url="https://api.weixin.qq.com/sns/oauth2/access_token?appid=wx1c94debc4261784b&secret=807ef7a29813c302316bec00446507c5&code=$code&grant_type=authorization_code";
        $curl = curl_init ($url);
        curl_setopt ( $curl, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $curl, CURLOPT_SSL_VERIFYPEER, FALSE );
        curl_setopt ( $curl, CURLOPT_SSL_VERIFYHOST, false );
        $result = curl_exec ($curl);
        curl_close ($curl);
        if(curl_errno()==0){
            $result = json_decode($result);
            //	dump($result);
            //3、拉取用户信息
            $access_token=$result->access_token;
            $openid=$result->openid;
            $url2="https://api.weixin.qq.com/sns/userinfo?access_token=$access_token&openid=$openid&lang=zh_CN";
            $curl = curl_init ($url2);
            curl_setopt ( $curl, CURLOPT_RETURNTRANSFER, 1 );
            curl_setopt ( $curl, CURLOPT_SSL_VERIFYPEER, FALSE );
            curl_setopt ( $curl, CURLOPT_SSL_VERIFYHOST, false );
            $result2 = curl_exec ($curl);
            if(curl_errno()==0){
//                dump(json_decode($result2));
                //分配到视图文件
                $this->assign('user',json_decode($result2));
                $users=json_decode($result2);
//赋值给session
                $_SESSION['openid']=$users->openid;
                $_SESSION['nickname']=$users->nickname;
                $_SESSION['headimgurl']=$users->headimgurl;
//                赋值给cookie
                setcookie('openid', $_SESSION['openid'], time()+3156000);
                setcookie('headimgurl', $_SESSION['headimgurl'], time()+3156000);
//                dump($_SESSION);
//                dump($_COOKIE);

            }else{
                dump(curl_errno($curl));
            }
        }else {
            dump(curl_errno($curl));
        }

    }
    public function index(){
        $_db=M('customer_information');
        $tt['openid']=$_COOKIE['openid'];
        $result=$_db->where($tt)->count();

        if($result==0&&$_SESSION['ci_id']==NULL){
            $news['ci_name']=$_SESSION['nickname'];
            $news['openid']=$_SESSION['openid'];
            if($_SESSION['openid']==NULL){
                echo "<script>alert('请在微信打开');</script>";
            }else{
                $result3=$_db->add($news);
            }
        }
        $usernews=$_db->where($tt)->select();
        setcookie('userid', $usernews[0]['ci_id'], time()+3156000);
        $_SESSION['ci_id']=$_COOKIE['userid'];
        dump($_SESSION);
        $this->display();
    }


    public function sousuo(){
        $this->display();
    }


}