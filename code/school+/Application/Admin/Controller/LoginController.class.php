<?php
namespace Admin\Controller;

use Think\Controller;

class LoginController extends Controller
{
    public function index()
    {
        //$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');





        layout(false);
        $this->display(login);
    }
    public function login(){
        //不显示layout布局
        layout(false);
        //生成验证码


        $this->display();

    }
    public function captcha(){
        //s生成验证码
        $captcha = new Verify();
        $captcha->entry('login');
    }
    public function dologin(){
        //校验验证码
        $captcha = new Verify();
        if($captcha->check(I('post.captcha'),'login')){
            //成功
            $condition = array();
            $condition['name']=I('post.name');
            $condition['pswd']=I('post.pswd','','md5');
            $user = $this->_db->where($condition)->find();
//            $user = $this->_db->where()
            if($user){
                //用户名密码正确
                //把用户名密码写入session
                session('loginedName',I('post.name'));
                //跳转页面
                //
                switch($user['group_id']) {
                    case 1:
                        $jumpUrl = '/admin/';
                        break;
                    case 2:
                        $jumpUrl = '/home/';
                        break;
                    default:
                        $jumpUrl = '/home/';
                        break;
                }
                $this->success('登陆成功！',$jumpUrl);
            }else{
                //用户名密码错误
                echo '用户名密码错误';
            }
        }else{
            //失败
            echo '验证码输入失败';
        }
    }
    public function logout(){
        //注销session
        session('loginedName',null);
    }
}