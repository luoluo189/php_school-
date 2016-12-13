<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2016/12/12
 * Time: 13:17
 */

namespace Home\Controller;
use Think\Verify;


use Think\Controller;
/*
 * 功能：微信界面加入我们部分
 * 编写者：李雪
 * 状态：
 */

class JoinController extends Controller
{

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

    public function add(){

    }


}