<?php
namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller
{

    public function index(){
        $this->display();
    }
    public function sousuo(){
        $this->display();
    }
    public function personal(){
        redirect('/index.php/home/personal/personal');

    }
    public function gouwuche(){
        redirect('/index.php/home/dingdan/gouwuche_queren');
    }
}