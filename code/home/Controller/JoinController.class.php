<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2016/12/12
 * Time: 13:17
 */

namespace Home\Controller;
//开启输出缓冲区
ob_start();
//开启会话
session_start();

use Think\Verify;


use Think\Controller;
/*
 * 功能：微信界面加入我们部分
 * 编写者：李雪
 * 状态：
 */

class JoinController extends Controller
{

    public $userId=1;

    /*
     * 功能：显示加入我们主页面
     * 编写者：李雪
     * 状态：已完成
     */
    public function join(){
        $this->display();
    }
    /*
     * 功能：实现图片验证码
     * 编写者：李雪
     * 状态：已完成
     */
    public function captcha(){
        $captcha = new Verify();//创建验证码对象
        $captcha -> length = 4 ;//验证码长度设置
        $captcha->fontSize = 26;//验证码字体设置
        $captcha->codeSet = '0123456789abcdefghijklmnopqrstuvwxyz';//验证码
        $captcha -> entry('login');//entry：保存验证码到session
    }
    /*
     * 功能：发布者信息插入数据库
     * 编写者：李雪
     * 状态：已完成
     */

    public function store(){
        $captcha = new Verify();
        $result = $captcha->check(I('post.captcha'),'login');
//        dump($result);

        if(isset($_POST['submit'])) {
            if ($result) {
                //校验成功
                $data = I('post.');
                $publisher = M('publisher')->add($data);
                if ($publisher) {
                    header("Location:/index.php/home/join/dialog");
                }
            }
            else {
                //校验失败
                redirect('/index.php/home/join/join', 2, '验证码输入错误，页面跳转中...');
            }
        }
    }
    public function dialog(){
        $this->display();
    }
}