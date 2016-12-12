<?php
namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $this->display();
    }
    public function sousuo(){
        $this->display();
    }
    public function personal(){
        redirect('/home/personal/personal');
    }
    public function gouwuche(){
        redirect('/home/dingdan/gouwuche_queren');
    }
}