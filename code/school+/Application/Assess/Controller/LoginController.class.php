<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2016/12/15
 * Time: 15:00
 */

namespace Assess\Controller;

//开启输出缓冲区
ob_start();
//开启会话
session_start();

use Think\Verify;
use Think\Controller;
/*
 * 功能：后台登陆
 * 编写者：骆静静
 * 状态：已完成
 */
class LoginController extends Controller
{

    /*
     * 功能：后台登陆页面
     * 编写者：骆静静
     * 状态：已完成
     */
    public function index()
    {
        layout(false);
        $this->display(login);
    }

    /*
     * 功能：后台登陆
     * 编写者：骆静静
     * 状态：已完成
     */

    public function captcha(){
        $captcha = new Verify();//创建验证码对象
        $captcha -> length = 4 ;//验证码长度设置
        $captcha->fontSize = 30;//验证码字体设置
        $captcha->codeSet = '01234567890123456789012345678901234567890123456789';//验证码
        $captcha -> entry('login');//entry：保存验证码到session
    }
    public function dologin(){
        //校验验证码
        $captcha = new Verify();
        if($captcha->check(I('post.captcha'),'login')){
            //成功
            $condition = array();
            $condition['name']=I('post.name');
            $condition['userpwd']=I('post.pswd','','md5');
            $user = M('publisher')->where($condition)->find();
//            $user = $this->_db->where()
            if($user){
                //用户名密码正确
                //把用户名密码写入session
                session('loginedName',I('post.name'));
                session('si_id',$user['si_id']);

                //跳转页面
                switch($user['type']) {
                    case 商品:
                        $jumpUrl = '/Admin/';
                        break;
                    case 理发:
                        $jumpUrl = '/Lifaadmin/seller';
                        break;
                    case 兼职:
                        $jumpUrl = '/ParttimejobAdmin/parttimejob/index';
                        break;
                    case boss:
                        $jumpUrl = '/Assess/assess/assess';
                        break;
                    default:
                        $jumpUrl = '/Home/';
                        break;
                }
                $this->redirect($jumpUrl);
            }else{
                //用户名密码错误
                echo '用户名密码错误';
            }
        }else{
            //失败
           echo "<script> alert('验证码错误，请重新输入');history.go(-1);</script>";
        }
    }
    public function logout(){
        //注销session
        session('loginedName',null);
        session('si_id',null);
        $this->redirect('/Assess/login');
    }
    public function changePwd(){
        layout(false);
        $this->display();
    }
}