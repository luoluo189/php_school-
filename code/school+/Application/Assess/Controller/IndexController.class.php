<?php
namespace Assess\Controller;

use Think\Controller;

/*
 * 功能： 超级管理员部分
 * 编写者：李雪
 * 简介：管理发布者信息，兼职者的信息，评论部分的内容
 */

class IndexController extends Controller
{
    public function index(){
        $this->display();
    }
}